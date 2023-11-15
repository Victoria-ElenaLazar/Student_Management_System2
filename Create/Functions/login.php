<?php
declare(strict_types=1);
require_once __DIR__ . '/../../Database/mysql-connect.php';

/**
 * @return void
 * function to log in user and to introduce into the database information about credentials and time for logging in
 * created some validations if the password is less than 3 characters the user is relocated to the login page and the insertions
 * into the database in stopped
 */
function login(): void
{
    if (isset($_POST['login'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $userDate = date('Ymd');
        $insertData = true;
        $errorMessage = '';
        if (strlen($password) < 3) {
            $errorMessage = "Password should be longer than 3 characters. Please try again!";
            echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
            header("Location: /student_management-app/Create/login.php");
            $insertData = false;
        }
        if ($insertData) {
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);
            $mysqli = connect();
            $sql = "INSERT INTO users (email, password, created_on) VALUES (?, ?, ?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('sss', $email, $hashedPass, $userDate);
            if ($stmt->execute()) {
                header("Location: /student_management-app/index.php");
                exit();
            }
        }
    }
}