<?php require_once __DIR__ . '/../templates/header.php'; ?>
<?php require_once __DIR__ . '/../Create/Functions/create-student.php'; ?>
<?php require_once __DIR__ . '/../Read/read_classrooms.php' ?>
<?php
/**
 * cal the function to handle the 'add student' action
 */
addStudent(); ?>

<div class="container">
    <h2 class="text-center" style="margin-top: 50px">Create a New Student</h2>
    <form action="add-student.php" method="post">
        <div class="form-group">
            <label for="student_name">Name:</label>
            <input type="text" name="student_name" id="student_name" class="form-control"
                   placeholder="Enter the name of your new student" required>
        </div>
        <div class="form-group">
            <label for="student_grade">Grade:</label>
            <select name="student_grade" id="student_grade" class="form-control" required>
                <option>Select grade</option>
                <?php for ($i = 0; $i <= 10; $i++) {
                    echo "<option value='$i'>$i</option>";
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="student_classroom">Classroom:</label>
            <select name="student_classroom" id="student_classroom" class="form-control" required>
                <option value="">Select classroom</option>
                <?php
                $classrooms = findAllClassrooms();
                $classroomNames = $classrooms;
                foreach ($classroomNames as $classroomName) {
                    echo "<option value='$classroomName[classroom_name]'>$classroomName[classroom_name]</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="created_on">Create:</label>
            <input type="date" name="created_on" id="created_on" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" name="add-student" id="add-student" class="btn btn-primary" value="Add student">
        </div>
    </form>
    <a href="../index.php">Back to student management system</a>
</div>
<?php require_once __DIR__ . '/../templates/footer.php'; ?>
