<?php
require_once __DIR__ . '/Read/read_students.php';
require_once __DIR__ . '/Read/read_classrooms.php';
require_once __DIR__ . '/Delete/delete_student.php';
require_once __DIR__ . '/Delete/delete_classroom.php';
/**
 * handle the delete action for students and for classrooms
 */
$students = findAllStudents();
if (isset($_POST['delete'])) {
    $registrationNumberDeleted = $_POST['registration_number'];
    deleteStudent($registrationNumberDeleted);
}
$classrooms = findAllClassrooms();
if (isset($_POST['delete_classroom'])) {
    $classroomIdDeleted = $_POST['classroom_id'];
    deleteClassroom($classroomIdDeleted);
}
?>

<?php require_once __DIR__ . '/templates/header.php' ?>
<div class="container-fluid">
    <h2 class="text-center" style="margin-top: 50px">Student Management System</h2>
    <div class="row" style="margin-top: 20px">
        <aside class="col-md" style="margin-left: 20px">
            <h3 class="text-center">Students</h3>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>Registration Number</th>
                    <th>Name</th>
                    <th>Grade</th>
                    <th>Classroom</th>
                    <th>Created On</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?php echo $student['registration_number'] ?></td>
                        <td><?php echo $student['student_name'] ?></td>
                        <td><?php echo $student['student_grade'] ?></td>
                        <td><?php echo $student['student_classroom'] ?></td>
                        <td><?php echo $student['created_on'] ?></td>
                        <td>
                            <div class="form-group">
                                <form action="index.php" method="post" class="form-inline">
                                    <a href="Update/update_student.php?registration_number=<?php echo $student['registration_number']; ?>"
                                       class="btn btn-primary">Update</a>
                                    <input type="hidden" name="registration_number"
                                           value="<?php echo $student['registration_number']; ?>">
                                    <button type="submit" name="delete" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this student?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="Create/add-student.php">Create a new student</a><br>
        </aside>
        <aside class="col-md" style="margin-right: 20px">
            <h4 class="text-center">Classrooms</h4>

            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>Classroom ID</th>
                    <th>Classroom name</th>
                    <th>Created on</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php foreach ($classrooms

                    as $classroom): ?>
                    <td><?php echo $classroom['classroom_id'] ?></td>
                    <td><?php echo $classroom['classroom_name'] ?></td>
                    <td><?php echo $classroom['created_on'] ?></td>
                    <td>
                        <form action="index.php" method="post">
                            <a href="Update/update_classroom.php?classroom_id=<?php echo $classroom['classroom_id']; ?>"
                               class="btn btn-primary">Update</a>
                            <input type="hidden" name="classroom_id" value="<?php echo $classroom['classroom_id']; ?>">
                            <button type="submit" name="delete_classroom" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this classroom?')">Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="Create/add-classroom.php">Create a new classroom</a><br>
            <a href="report.php">View report</a>
        </aside>
    </div>
    <a href="Create/login.php" class="btn btn-danger">Logout</a>
</div>
<br>
<br>
<?php require_once __DIR__ . '/templates/footer.php'; ?>
