<?php 
    session_start();
    include('../ServerConnect/server.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <link rel="stylesheet" href="logre.css">
</head>
<body>
    <img src="../pic/pic2.JPG" class="bg">
    <form action="register_db.php" method="post">
        <?php include('errors.php') ?>
        <?php if(isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']); //ขึ้นแค่รอบเดียว ถ้าrefreshหน้าข้อความก็จะหายไป
                    ?>
                </h3>
            </div>
        <?php endif ?>
        
        <div class="register">
            <h2>Sign up</h2>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username">
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email">
            </div>
            <div class="input-group">
                <label for="pass_1">Password</label>
                <input type="password" name="pass_1">
            </div>
            <div class="input-group">
            <label for="pass_2">Confirm Password</label>
                <input type="password" name="pass_2">
            </div>
            <div class="input-group">
                <input type="submit" name="reg_user" value="Register" id="btn">
            </div>
            <p>Already a member? <a href="login.php">Sign in</a></p> 
        </div>
        
    </form>
</body>
</html>