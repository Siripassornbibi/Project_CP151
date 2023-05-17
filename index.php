<!-- เช็คว่าuser login รึยัง ถ้ายังจะเด้งไปหน้าlogin ห้ามเข้าindex -->
<?php include('./ServerConnect/server.php'); ?>
<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must login first";
    header('location: ./Login/login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: ./ServerConnect/logout.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="./css/index.css">
    <!--navbar css-->
    <link rel="stylesheet" href="./css/navbar.css">
    <!--footer-->
    <link rel="stylesheet" href="./css/footer.css">
    
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        .navbar{
            color:white;
        }
    </style>
</head>

<body class="index">
    <nav class="navbar navbar-expand-lg fixed-top navbarTop">
        <div class="container-fluid">
            <div class="d-flex justify-content-between flex-fill">
                <a class="navbar-brand ms-5" href="index.php" style="font-size:15px; text-decoration: underline;color: white;">HOMEPAGE</a>
                <div class="d-flex justify-content-md-center" style="position: absolute;left:47%;top:0;z-index: 1;margin:0">
                    <a href="./index.php">
                        <img src="./pic/logo/logo2.png" alt="logo web" width="85">
                    </a>
                </div>
                <div class="d-flex">
                    <!-- ขึ้นข้อความว่าloginแล้ว -->
                    <?php if (isset($_SESSION['success'])) : ?>
                        <div class="success">
                            <p class="mt-3"><strong>
                                    <?php
                                    echo $_SESSION['success'];
                                    unset($_SESSION['success']); //ขึ้นแค่รอบเดียว ถ้าrefreshหน้าข้อความก็จะหายไป
                                    ?>
                                </strong>
                            </p>
                        </div>
                        <p>&nbsp&nbsp&nbsp</p>
                    <?php endif ?>


                    <?php if (isset($_SESSION['username'])) : ?>
                    <p class="mt-3">Welcome <?php echo $_SESSION['username']; ?>&nbsp;</p>
                    <?php if ($_SESSION['image'] === '') : ?>
                        <div class="profile-image-container">
                            <a href="update_profile.php"><img src="./Login/pic/default-image.png" height="50px" border-radius="50%"></a>
                        </div>
                    <?php else: ?>
                        <div class="profile-image-container">
                            <a href="./Login/update_profile.php"><img src="./Login/uploaded_img/<?php echo $_SESSION['image']; ?>" class="profile-image" height="50px" border-radius="50%"></a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <p>&nbsp&nbsp&nbsp</p>
                <p class="mt-2 me-2"><a href="index.php?logout='1'" class="btn btn-outline-danger">Logout</a></p>

                </div>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="banner">
            <div class="container-fluid p-5">
                <p class="one">Free horoscope website</p>
                <p class="two">Watch anywhere and anytime.</p>
                <br>
                <p class="three">Ready to watch? Click here</p>
                <a class="btn btn-light btn-lg" href="./Login/menu.php">Free Horoscope</a>
            </div>
        </div>
    </div>
                        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>