<?php
declare(strict_types=1);
require_once __DIR__ . '/../Database/mysql-connect.php';
/**
 * @return array
 * function to find all classroom, retrieve information from database
 */
function findAllClassrooms(): array
{
    $mysqli = connect();
    if (!$mysqli) {
        echo "Failed to connect: " . $mysqli->connect_error;
        return [];
    }
    $sql = "SELECT * FROM classrooms";
    $result = mysqli_query($mysqli, $sql);

    if (!$result) {
        echo "Cannot find classrooms: " . mysqli_error($mysqli);
        return [];
    }
    $classrooms = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $classrooms[] = $row;
    }
    return $classrooms;
}

/**
 * @param $classroomId
 * @return array
 * function to find one particular classroom base on classroom id
 */
function findClassroomById($classroomId): array
{
    $mysqli = connect();
    if (!$mysqli) {
        echo "Failed to connect: " . mysqli_error($mysqli);
        return [];
    }
    $sql = "SELECT * FROM classrooms WHERE classroom_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $classroomId);
    $stmt->execute();

    $result = $stmt->get_result();
    $classroom = $result->fetch_assoc();

    if (!$classroom) {
        return [];
    }
    return $classroom;
}

