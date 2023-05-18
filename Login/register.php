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
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <img src="../pic/pic2.JPG" class="bg">
    <form action="register_db.php" method="post" enctype="multipart/form-data">
        <div class="register">
            <h2>Sign up</h2>

            <?php if(isset($_SESSION['error'])) : ?>
                <div class="error">
                    <h4 style="color: #a94442; border: 1px solid #a94442; background: #f2dede; border-radius: 5px; text-align: center; padding: 10px; margin-bottom: 10px;">
            <?php
            foreach ($_SESSION['error'] as $error) {
                echo $error . "<br>";
            }
            unset($_SESSION['error']);
            ?>
        </h4>
    </div>
<?php endif ?>
        
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="pass_1">Password</label>
                <input type="password" name="pass_1" required>
            </div>
            <div class="input-group">
                <label for="pass_2">Confirm Password</label>
                <input type="password" name="pass_2" required>
            </div>
            <div class="input-group">
                <label for="image">Profile image</label>
                <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
            </div>
            <div class="input-group">
                <input type="submit" name="reg_user" value="Register" id="btn">
            </div>
            <p>Already a member? <a href="login.php">Sign in</a></p> 
        </div>
        
    </form>
</body>
</html>