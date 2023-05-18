<!-- เช็คว่าuser login รึยัง ถ้ายังจะเด้งไปหน้าlogin ห้ามเข้าindex -->
<?php include('./ServerConnect/server.php'); ?>
<?php
session_start();
$_SESSION['path'] = $_SERVER['REQUEST_URI']; 

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
      
                <p class="pathTxt">
                    <a class="navbar-brand" href="../index.php" style="font-size:15px; color:white; margin-left:5px"><b>HOMEPAGE</b></a>
                </p>
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
                    <p class="mt-3">Welcome <b><?php echo $_SESSION['username']; ?></b>&nbsp;</p>
                    <?php if ($_SESSION['image'] === '') : ?>
                        <div class="profile-image-container">
                            <a href="./Login/update_profile.php"><img src="./Login/pic/default-image.png" style="border-radius: 100%; height:50px; width:50px;"></a>
                        </div>
                    <?php else: ?>
                        <div class="profile-image-container">
                            <a href="./Login/update_profile.php"><img src="data:image/jpg;charset=utf8;base64,<?php echo $_SESSION['image']; ?>" class="profile-image" style="border-radius: 100%; height:50px; width:50px;"></a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <p>&nbsp&nbsp&nbsp</p>
                <p class="mt-2 me-2"><a href="index.php?logout='1'" class="btn btn-outline-danger">Logout</a></p>

         
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="banner">
            <div class="container-fluid p-5" style="height:950px; width:100%;">
                <div class="txt-group" style="margin-left:5%; margin-top:10%">
                    <p class="one">Free horoscope website</p>
                    <p class="two">Watch anywhere and anytime.</p>
                    <br>
                    <p class="three">Ready to watch? Click here</p>
                    <a class="btn btn-light btn-lg" href="./Login/menu.php">Free Horoscope</a>
                </div>
            </div>
        </div>
    </div>
                        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>