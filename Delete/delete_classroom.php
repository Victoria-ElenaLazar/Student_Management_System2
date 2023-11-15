<?php
declare(strict_types=1);
require_once __DIR__ . '/../Database/mysql-connect.php';
/**
 * @param $classroomId
 * @return void
 * function to delete one particular classroom based on classroom id
 */
function deleteClassroom($classroomId): void
{
    if (isset($_POST['delete_classroom'])) {
        $mysqli = connect();
        $sql = "DELETE FROM classrooms WHERE classroom_id=?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $classroomId);
        if ($stmt->execute()) {
            $successMessage = "Classroom deleted successfully!";
            echo '<div class="alert alert-success">' . $successMessage . '</div>';
        } else {
            $errorMessage = "Couldn't delete this classroom: " . $stmt->error;
            echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
        }
        header("Location: /student_management-app/index.php");
        exit();
    }
}