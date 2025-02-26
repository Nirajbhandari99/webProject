<?php
include('server.php');

$errors = array();

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Check if username exists
    $query = "SELECT * FROM users WHERE username='$username'";
    $results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php'); // Redirect to home page
    } else {
        array_push($errors, "Wrong username/password combination");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Login</h1>
        <nav>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="service.php">Services</a>
            <a href="login.php" class="login-nav-btn">Login</a>
        </nav>
    </header>

    <div class="form-box change">
        <form class="login-form" action="login.php" method="post">
            <h1>Login</h1>

            <!-- Display Errors -->
            <?php if (count($errors) > 0) : ?>
                <div class="error">
                    <?php foreach ($errors as $error) : ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>

            <div class="input-box">
                <input type="text" name="username" required>
                <label for="username">Username</label>
                <ion-icon name="person-outline"></ion-icon>
            </div>

            <div class="input-box">
                <input type="password" name="password" required>
                <label for="password">Password</label>
                <ion-icon name="lock-closed-outline"></ion-icon>
            </div>

            <div class="checkbox">
                <span>
                    <input type="checkbox" id="login-check">
                    <label for="login-check">Remember me</label>
                </span>
                <h5><a href="#">Forgot password?</a></h5>
            </div>
            <button type="submit" class="submit-btn" name="login_user">Login</button>

            <div class="login-register">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
            <div class="login-guest">
                <p>Continue as Guest? <a href="index.php">Continue</a></p>
            </div>
        </form>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>
</html>
