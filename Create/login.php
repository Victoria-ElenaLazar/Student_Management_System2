<?php
require_once __DIR__ . '/../Create/Functions/login.php';
/**
 * cal the function to handle the 'log in' action
 */
login();
?>

<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container">
    <h2 class="text-center">Login</h2>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Won't tell anyone"
                   required>
        </div>
        <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
        <div class="form-group">
            <input type="submit" name="login" id="login" class="btn btn-primary" value="Login">
        </div>
    </form>
</div>
