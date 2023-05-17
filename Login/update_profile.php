<?php
    session_start();
    include('../ServerConnect/server.php');
    
    if (isset($_POST['update_profile'])) {
        $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
        $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
        
        $user_id = $_SESSION['id'];
        mysqli_query($conn, "UPDATE `user` SET `username`='$update_name', `email`='$update_email' WHERE `id`='$user_id'");
    
        $update_image = $_FILES['update_image']['name'];
        $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
        $update_image_folder = './uploaded_img/'.$update_image;

        if(!empty($update_image)){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
            mysqli_query($conn, "UPDATE `user` SET `image`='$update_image' WHERE `id`='$user_id'");
            $_SESSION['image'] = $update_image;
        }
        $_SESSION['username'] = $update_name;
        $_SESSION['email'] = $update_email;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upadte Profile</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <div class="update-profile">
        <div class="pic">
            <?php 
                $user_id = $_SESSION['id'];
                $select = mysqli_query($conn, "SELECT email FROM `user` WHERE `id`='$user_id'");
                $fetch = mysqli_fetch_assoc($select);
                
            ?>
            
        </div>
        
        <form action="" method="post" enctype="multipart/form-data">
            <?php if ($_SESSION['image'] === '') : ?>
                <div class="profile-image-container">
                    <img src="./pic/default-image.png" height="50px">
                </div>
            <?php else: ?>
                <div class="profile-image-container">
                    <img src="./uploaded_img/<?php echo $_SESSION['image']; ?>" class="profile-image" height="50px">
                </div>
            <?php endif; ?>
            <div class="input-group">
                <span>Username:</span>
                <input type="text" name="update_name" value="<?php echo $_SESSION['username']; ?>" class="box">
                <br>
                <span>Email:</span>
                <input type="text" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
                <br>
                <span>Profile picture:</span>
                <input type="file" name="update_image" class="box">
            </div>
            <input type="submit" value="update profile" name="update_profile" class="update-button">
            <a href="../index.php" class="delete-button">cancel</a>

        </form>
    </div>
</body>
</html>