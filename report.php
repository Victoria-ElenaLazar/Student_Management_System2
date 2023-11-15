<?php
global $classroomId;
require_once __DIR__ . '/Read/read_classrooms.php';
require_once __DIR__ . '/Read/read_students.php';
require_once __DIR__ . '/Read/read_student_by_classroom.php';
?>

<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container">
    <h2 class="text-center">Student management system report</h2>
    <form action="report.php" method="post">
        <div class="form-group">
            <label for="classroom_filter">Filter by Classroom:</label>
            <select name="classroom_filter" id="classroom_filter" class="form-control">
                <option value="">All Classrooms</option>
                <?php
                $classrooms = findAllClassrooms();
                foreach ($classrooms as $classroom) {
                    echo "<option value='{$classroom['classroom_name']}'>{$classroom['classroom_name']}</option>";
                }
                ?>
            </select>
            <button type="submit" name="filter" id="filter" class="btn btn-primary mt-2">Apply Filter</button>
        </div>
    </form>
    <?php
    if (isset($_POST['filter'])) {
        $classroomName = $_POST['classroom_filter'];
        echo "<p>Selected Classroom: $classroomName</p>";
        if (!empty($classroomName)) {
            $students = findStudentsByClassroom($classroomName);
        }
        if (!empty($students)) {
            echo '<h3 class="mt-4">Students List</h3>';
            echo '<table class="table table-bordered table-hover">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th>Registration Number</th>';
            echo '<th>Name</th>';
            echo '<th>Grade</th>';
            echo '<th>Classroom</th>';
            echo '<th>Created On</th>';
            echo '<th>Actions</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($students as $student) {
                echo '<tr>';
                echo '<td>' . $student['registration_number'] . '</td>';
                echo '<td>' . $student['student_name'] . '</td>';
                echo '<td>' . $student['student_grade'] . '</td>';
                echo '<td>' . $student['student_classroom'] . '</td>';
                echo '<td>' . $student['created_on'] . '</td>'; ?>
                <td>
                    <div class="form-group">
                        <form action="index.php" method="post" class="form-inline">
                            <a href="Update/update_student.php?registration_number=<?php echo $student['registration_number']; ?>"
                               class="btn btn-primary">Update</a>
                            <input type="hidden" name="registration_number"
                                   value="<?php echo $student['registration_number']; ?>">
                            <button type="submit" name="delete" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this student?')">Delete
                            </button>
                        </form>
                    </div>
                </td>
                <?php
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No students found for the selected classroom.</p>';
        }
    }
    ?>
    <a href="index.php">Back to student management system</a>
</div>
