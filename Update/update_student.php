<?php
require_once __DIR__ . '/Functions/update_student.php';
require_once __DIR__ . '/../Read/read_classrooms.php';
require_once __DIR__ . '/../Read/read_students.php';
require_once __DIR__ . '/../Update/update_student.php';

/**
 * retrieve registration number in URL and find a particular student by id
 */
$registrationNumber = $_GET['registration_number'] ?? '';
$studentData = findStudentById($registrationNumber);
/**
 * post registration number and update student data
 */
if (isset($_POST['update'])) {
    $updatedRegistrationNumber = $_POST['registration_number'] ?? '';
    $updatedStudentData = updateStudent();

    /**
     *  If the update was successful, use the updated data for rendering
     */
    if ($updatedStudentData) {
        $studentData = $updatedStudentData;
    }
}
?>

<?php require_once __DIR__ . '/../templates/header.php' ?>
    <div class="container">
        <h2 class="text-center" style="margin-top: 50px">Update your student</h2>
        <form method="post" action="update_student.php">
            <div class="form-group">
                <label for="registration_number">Registration Number: </label>
                <input type="text" name="registration_number" id="registration_number"
                       value="<?php echo $studentData['registration_number'] ?? ''; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="student_name">Name: </label>
                <input type="text" name="student_name" id="student_name" class="form-control"
                       value="<?php echo $studentData['student_name'] ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="student_grade">Grade: </label>
                <select name="student_grade" id="student_grade" class="form-control" required>
                    <option value="Select grade">Select grade</option>
                    <?php
                    for ($i = 0; $i <= 10; $i++) {
                        $selected = ($i == $studentData['student_grade']) ? 'selected' : '';
                        echo "<option value='$i' $selected>$i</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="student_classroom">Classroom: </label>
                <select name="student_classroom" id="student_classroom" class="form-control" required>
                    <option value="">Select classroom</option>
                    <?php
                    $classroomNames = findAllClassrooms();
                    foreach ($classroomNames as $classroomName) {
                        $selected = ($classroomName['classroom_name'] == $studentData['student_classroom']) ? 'selected' : '';
                        echo "<option value='{$classroomName['classroom_name']}' $selected>{$classroomName['classroom_name']}</option>";
                    }
                    ?>
                </select>

            </div>
            <div class="form-group">
                <input type="submit" name="update" id="update" class="btn btn-success" value="Update">
            </div>
        </form>
        <a href="../index.php">Back to student management system</a>
    </div>
<?php require_once __DIR__ . '/../templates/footer.php';
