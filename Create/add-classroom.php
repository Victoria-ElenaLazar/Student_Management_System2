<?php
require_once __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/../Create/Functions/create_classroom.php';
/**
 * call the function to handle the 'add classroom' action
 */
addClassroom();
?>
    <div class="container">
        <h2 class="text-center">Create a new classroom</h2>
        <form action="add-classroom.php" method="post">
            <div class="form-group">
                <label for="classroom_name">Classroom name:</label>
                <input type="text" name="classroom_name" id="classroom_name" class="form-control"
                       placeholder="Enter the name of your new classroom" required>
            </div>
            <div class="form-group">
                <label for="classroom_date">Created on:</label>
                <input type="date" name="classroom_date" id="classroom_date" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" name="add-classroom" class="btn btn-primary" value="Add classroom">
            </div>
        </form>
        <a href="../index.php">Back to student management system</a>
    </div>


<?php require_once __DIR__ . '/../templates/footer.php';
