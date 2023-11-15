<?php
declare(strict_types=1);
require_once __DIR__ . '/../../Database/mysql-connect.php';
/**
 * @return array
 * function to update a particular student
 * update information to the database to be displayed in the table
 */
function updateStudent(): array
{
    $updatedStudent = [];
    if (isset($_POST['update'])) {
        $registrationNumber = $_POST['registration_number'];
        $studentName = $_POST['student_name'];
        $studentGrade = $_POST['student_grade'];
        $studentClassroom = $_POST['student_classroom'];
        $mysqli = connect();
        $sql = "UPDATE students SET student_name=?, student_grade=?,
                    student_classroom=? WHERE registration_number=?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('siss', $studentName, $studentGrade, $studentClassroom, $registrationNumber);
        $stmt->execute();
        $result = findStudentById($registrationNumber);
        if ($result) {
            $updatedStudent = $result;
        }
        if ($stmt->execute()) {
            $successMessage = "Student updated successfully!";
            echo '<div class="alert alert-success">' . $successMessage . '</div>';
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    return $updatedStudent;
}