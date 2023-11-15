<?php
declare(strict_types=1);
require_once __DIR__ . '/../Database/mysql-connect.php';
/**
 * @param $classroomName
 * @return array
 * function to find student sorted by classroom
 * use JOIN table find the classroom by name
 */
function findStudentsByClassroom($classroomName): array
{
    $mysqli = connect();
    $sql = "SELECT students.*, classrooms.classroom_name
            FROM students
            JOIN classrooms ON students.student_classroom = classrooms.classroom_name
            WHERE classrooms.classroom_name=?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $classroomName);
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$result) {
        return [];
    }
    $students = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }
    return $students;
}