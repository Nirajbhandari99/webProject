<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Welcome</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<header>
    <nav>
        <a href="index.php">Home</a>
        <a href="#">Profile</a>
        <a href="index.php?logout='1'" style="color: red;">Logout</a>
    </nav>
</header>

<div class="form-box">
    <h1>Welcome</h1>

    <!-- Notification Message -->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
            <h3>
                <?php 
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <!-- Logged in user information -->
    <?php if (isset($_SESSION['username'])) : ?>
        <p class="welcome-text">Hello, <strong><?php echo $_SESSION['username']; ?></strong>!</p>
        <p>Thank you for logging in.</p>
    <?php endif ?>
</div>

</body>
</html>
