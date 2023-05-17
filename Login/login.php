<?php include('../ServerConnect/server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="logre.css">
    <style>
        body {
            background: url("../pic/pic2.JPG") no-repeat center fixed;
            background-size: cover;
        }
    </style>
</head>
<body>
    <form action="login_db.php" method="post">
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
        
        <div class="login">
            <h2>Sign in</h2>
            <div class="input-group">
                <input type="text" name="username" placeholder="Username">
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="input-group">
                <input type="submit" name="login_user" value="Login" id="btn">
            </div>
            <p>Not yet a member? <a href="register.php">Sign up</a></p>
        </div>
    </form>
</body>
</html>