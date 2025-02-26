<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <div class="form-box change-form">
        <span class="close-icon">&times;</span>

        <form method="post" action="register.php" class="register-form">
            <h1>Register</h1>
            
            <?php include('errors.php'); ?>

            <div class="input-box">
                <input type="text" name="username" required value="<?php echo isset($username) ? $username : ''; ?>">
                <label>Username</label>
                <ion-icon name="person-outline"></ion-icon>
            </div>

            <div class="input-box">
                <input type="email" name="email" required value="<?php echo isset($email) ? $email : ''; ?>">
                <label>Email</label>
                <ion-icon name="mail-outline"></ion-icon>
            </div>

            <div class="input-box">
                <input type="password" name="password_1" required>
                <label>Password</label>
                <ion-icon name="lock-closed-outline"></ion-icon>
            </div>

            <div class="input-box">
                <input type="password" name="password_2" required>
                <label>Confirm Password</label>
                <ion-icon name="lock-closed-outline"></ion-icon>
            </div>

            <div class="checkbox">
                <span>
                    <input type="checkbox" required>
                    <h5>I agree to the <a href="#">Terms & Conditions</a></h5>
                </span>
            </div>

            <button type="submit" class="submit-btn" name="reg_user">Register</button>

            <div class="login-register">
                <p>Already a member? <a href="login.php">Login</a></p>
            </div>

            <div class="login-guest">
                <p>Continue as Guest? <a href="index.php">Continue</a></p>
            </div>
        </form>
    </div>

</body>
</html>
