<?php
declare(strict_types=1);
require_once __DIR__ . '/../Database/mysql-connect.php';
/**
 * @param $registrationNumber
 * @return void
 * function to delete one particular student based on registration number
 */
function deleteStudent($registrationNumber): void
{
    if (isset($_POST['delete'])) {
        $mysqli = connect();
        $sql = "Delete FROM students WHERE registration_number=?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $registrationNumber);
        if ($stmt->execute()) {
            $successMessage = "Student deleted successfully";
            echo '<div class="alert alert-success">' . $successMessage . '</div>';
        } else {
            echo "Error deleting student:" . $stmt->error;
        }
        header("Location: /student_management-app/index.php");
        exit();
    }
}