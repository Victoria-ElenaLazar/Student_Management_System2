<?php
declare(strict_types=1);
require_once __DIR__ . '/../../Database/mysql-connect.php';
/**
 * @return array
 * function to update a classroom
 * update information into the database to be displayed in the table
 */
function updateClassroom(): array
{
    $updatedClassroom = [];
    if (isset($_POST['update'])) {
        $classroomId = $_POST['classroom_id'];
        $classroomName = $_POST['classroom_name'];
        $mysqli = connect();
        $sql = "UPDATE classrooms SET classroom_name=? WHERE classroom_id=?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('si', $classroomName, $classroomId);
        $stmt->execute();
        $result = findClassroomById($classroomId);
        if ($result) {
            $updatedClassroom = $result;
        }
        if ($stmt->execute()) {
            $successMessage = "Classroom updated successfully!";
            echo '<div class="alert alert-success">' . $successMessage . '</div>';
        } else {
            $errorMessage = "Error updating classroom!" . $stmt->error;
            echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
        }
    }
    return $updatedClassroom;
}