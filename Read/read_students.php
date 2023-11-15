<?php
declare(strict_types=1);
require_once __DIR__ . '/../Database/mysql-connect.php';
/**
 * @return array
 * function to find all students
 * retrieve information from database
 */
function findAllStudents(): array
{
    $mysqli = connect();
    $sql = "SELECT * FROM students";
    $result = $mysqli->query($sql);

    if (!$result) {
        echo "Error executing query: " . $mysqli->error;
        return [];
    }

    $students = [];
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }

    if (empty($students)) {
        $errorMessage = "No students found";
        echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
    }

    return $students;
}

/**
 * @param $registrationNumber
 * @return array
 * function to find one particular student based on registration number
 */
function findStudentById($registrationNumber): array
{
    $mysqli = connect();
    $sql = "SELECT * FROM students WHERE registration_number=?";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        echo "Error preparing statement: " . $mysqli->error;
        return [];
    }
    $stmt->bind_param('s', $registrationNumber);
    $stmt->execute();

    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    if (!$student) {
        return [];
    }
    return $student;
}
