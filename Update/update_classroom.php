<?php
require_once __DIR__ . '/../Update/Functions/update_classroom.php';
require_once __DIR__ . '/../Read/read_classrooms.php';
/**
 * handle update action and retrieve classroom data to be updated
 */
$classroomId = $_GET['classroom_id'] ?? '';
$classroomData = findClassroomById($classroomId);
if (isset($_POST['update'])) {
    $updateClassroomId = $_POST['classroom_id'];
    $updatedClassroomData = updateClassroom();
}
?>

<?php require_once __DIR__ . '/../templates/header.php'; ?>
<div class="container">
    <h2 class="text-center" style="margin-top: 50px">Update classroom</h2>
    <form method="post" action="update_classroom.php">
        <div class="form-group">
            <label for="classroom_id">Classroom ID: </label>
            <input type="text" name="classroom_id" id="classroom_id" class="form-control"
                   value="<?php echo $classroomData['classroom_id'] ?? '' ?>" readonly>
        </div>
        <div class="form-group">
            <label for="classroom_name">Classroom name: </label>
            <input type="text" name="classroom_name" id="classroom_name" class="form-control"
                   value="<?php echo $classroomData['classroom_name'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <input type="submit" name="update" id="update" class="btn btn-success" value="Update">
        </div>
    </form>
    <a href="../index.php">Back to student management system</a>
</div>