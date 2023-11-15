<?php
declare(strict_types=1);
require_once __DIR__ . '/../../Database/mysql-connect.php';
/**
 * @return void
 * function to create a new student with success alert message
 */
function addStudent(): void
{

    if (isset($_POST['add-student'])) {
        $registrationNumber = uniqid();
        $studentName = filter_input(INPUT_POST, 'student_name');
        $studentGrade = filter_input(INPUT_POST, 'student_grade');
        $studentClassroom = filter_input(INPUT_POST, 'student_classroom');
        $studentDate = filter_input(INPUT_POST, 'created_on');
        $mysqli = connect();
        if (!$mysqli) {
            echo "Failed to connect: " . mysqli_error($mysqli);
        }
        $sql = "INSERT INTO students(registration_number, student_name, student_grade, student_classroom, created_on)
VALUES (?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ssiss', $registrationNumber, $studentName, $studentGrade, $studentClassroom, $studentDate);
        if ($stmt->execute()) {
            $successMessage = "Student added successfully!";
            echo '<div class="alert alert-success">' . $successMessage . '</div>';
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}