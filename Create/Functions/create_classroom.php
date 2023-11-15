<?php
declare(strict_types=1);
require_once __DIR__ . '/../../Database/mysql-connect.php';
/**
 * @return void
 * function to create a new classroom with success alert message
 */
function addClassroom(): void
{
    if (isset($_POST['add-classroom'])) {
        if (!empty($_POST['classroom_name'])) {
            $classroomName = filter_input(INPUT_POST, 'classroom_name');
            $classroomDate = filter_input(INPUT_POST, date('Ymd'));
            $classroomDate = $_POST['classroom_date'];
            $mysqli = connect();
            if (!$mysqli) {
                echo "Failed to connect!" . $mysqli->connect_error;
            }
            $sql = "INSERT INTO classrooms (classroom_name, created_on) VALUES (?, ?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('ss', $classroomName, $classroomDate);
            if ($stmt->execute()) {
                $successMessage = "Record created successfully!";
                echo '<div class="alert alert-success">' . $successMessage . '</div>';
            } else {
                echo "Error: " . $stmt->error;
            }
        }
    }
}
