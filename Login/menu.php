<?php
session_start();
include('../ServerConnect/server.php');
$_SESSION['path'] = $_SERVER['REQUEST_URI']; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <!--navbar-->
    <link rel="stylesheet" href="../css/navbar.css">

    <!--footer-->
    <link rel="stylesheet" href="../css/footer.css">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!--ปุ่มเลื่อนขึ้นไปข้างบน-->
    <link rel="stylesheet" href="../css/scrollTop/scroll.css">

    <!--ปุ่มแสดงบนภาพในcarousel-->
    <link rel="stylesheet" href="./css/btnPlay_Incarousel/btnplay.css">
    <script src="./css/btnPlay_Incarousel/btnplay.js"></script>

    <style>
        @font-face {
            font-family: thFont2;
            src: url(../font/SOV_Vimamsa.ttf);
        }

        body{
            margin:0px;
            padding: 0px;
            background-color: #FFFAF6;
        }

        .container-fluid {
            width: 100%;
            padding: 10px;
        }

        h1 {
            font-family: thFont2;
        }

        .btnCarousel:hover{
            padding: 20px;
            border-radius: 100%;
            background-color: black;
            opacity: 0.9;
        }


        .bandnerPic {
            width: 100%;
            padding: 0;
        }

        .bandnerContainer{
            width: 98.5%;
            background-color: black;
            border-radius: 25px;
            margin: 20px 10px;
            padding: 50px;
        }
        .bg{
            width: 100%;
        }
        .link{
            display: inline;
        }
        .link{
            border: solid 5px black;
            text-decoration: none;
            color: white;
            font-size: 70px;
            padding: 5px 30px;
            border-radius: 100%;
        }
        .link:hover{
            background-color: rgb(0, 0, 0);
            color: black;
            background-color: white;
            opacity: 1;
        }

        .picTop {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bgT {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            width: 30%;
        }

        .bg {
            width: 100%;
        }

        
        @media (max-width: 750px) {
            .link{
                font-size: 25px;
                padding: 2px 10px;
            }
            .bandnerContainer{
                padding: 5px 20px;
                margin: 10px 5px;
                border-radius: 10px;
            }
            .btn-play2{
                padding: 0px;
            }
            .bandnerPic{
                border-radius: 5px;
                padding: 10px;
            }
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbarTop">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">>HOMEPAGE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./menu.php">>MENU</a>
                    </li>
                </ul>
            </div>
            <a class="navbar-brand" href="../index.php" style="position: absolute; left: 50%; transform: translateX(-50%);">
                <img src="../pic/logo/logo2.png" alt="logo web" width="85">
            </a>
            <?php if (isset($_SESSION['username'])) : ?>
                <div class="d-flex me-2">
                    <p class="mt-3 me-2">username: <b><?php echo $_SESSION['username']; ?></b></p>
                    <?php if ($_SESSION['image'] === '') : ?>
                        <div class="profile-image-container">
                            <a href="../Login/update_profile.php">
                                <img src="../Login/pic/default-image.png" style="border-radius: 100%; height:50px; width:50px;">
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="profile-image-container">
                            <a href="../Login/update_profile.php">
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo $_SESSION['image']; ?>" class="profile-image" style="border-radius: 100%; height:50px; width:50px;">
                            </a>
                        </div>
                    <?php endif; ?>
                    <p class="mt-2 me-2"><a href="../ServerConnect/logout.php" class="btn btn-outline-danger">Logout</a></p>
                </div>
            <?php endif; ?>
        </div>
    </nav>

    <div class="container-fluid picTop">
        <img src="../pic/bigpic.png" class="bgT">
        <img src="./pic/bg1.jpg" class="bg">
    </div>
    <center>
        <h1>&#10037;  Welcome To Website  &#10037;</h1>
    </center>

    <div class="container-fluid">
        <div id="carouselExample" class="carousel slide multi-item-carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col position-relative fadeblock">
                            <a href="../FortuneStick/FS_PageIndex.php" class="BtnPlay_InCarousel position-absolute top-50 start-50 translate-middle">&#9654;</a>
                            <img src="./pic/slidepic/1.jpg" class="d-block w-100" alt="Image 1">
                        </div>
                        <div class="col fadeblock">
                            <img src="./pic/slidepic/2.jpg" class="d-block w-100" alt="Image 2">
                        </div>
                        <div class="col position-relative fadeblock">
                            <a href="../Tarot/TR_PageIndex.php" class="BtnPlay_InCarousel position-absolute top-50 start-50 translate-middle">&#9654;</a>
                            <img src="./pic/slidepic/3.jpg" class="d-block w-100" alt="Image 3">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col fadeblock">
                            <img src="./pic/slidepic/2.jpg" class="d-block w-100" alt="Image 4">
                        </div>
                        <div class="col position-relative fadeblock">
                            <a href="../Tarot/TR_PageIndex.php" class="BtnPlay_InCarousel position-absolute top-50 start-50 translate-middle">&#9654;</a>
                            <img src="./pic/slidepic/3.jpg" class="d-block w-100" alt="Image 3">
                        </div>
                        <div class="col fadeblock">
                            <img src="./pic/slidepic/4.jpg" class="d-block w-100" alt="Image 6">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col position-relative fadeblock">
                            <a href="../Tarot/TR_PageIndex.php" class="BtnPlay_InCarousel position-absolute top-50 start-50 translate-middle">&#9654;</a>
                            <img src="./pic/slidepic/3.jpg" class="d-block w-100" alt="Image 3">
                        </div>
                        <div class="col fadeblock">
                            <img src="./pic/slidepic/4.jpg" class="d-block w-100" alt="Image 5">
                        </div>
                        <div class="col position-relative fadeblock">
                            <a href="../FortuneStick/FS_PageIndex.php" class="BtnPlay_InCarousel position-absolute top-50 start-50 translate-middle">&#9654;</a>
                            <img src="./pic/slidepic/1.jpg" class="d-block w-100" alt="Image 1">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col fadeblock">
                            <img src="./pic/slidepic/4.jpg" class="d-block w-100" alt="Image 4">
                        </div>
                        <div class="col position-relative fadeblock">
                            <a href="../FortuneStick/FS_PageIndex.php" class="BtnPlay_InCarousel position-absolute top-50 start-50 translate-middle">&#9654;</a>
                            <img src="./pic/slidepic/1.jpg" class="d-block w-100" alt="Image 1">
                        </div>
                        <div class="col fadeblock">
                            <img src="./pic/slidepic/2.jpg" class="d-block w-100" alt="Image 6">
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon btnCarousel" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon btnCarousel" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </div>

        <div class="container-fluid position-relative bandnerContainer">
            <div class="row d-flex">
              <div class="col-9 p-0">
                <img src="./pic/block2/BG2.gif" class="bandnerPic m-0 p-0">
              </div>
              <div class="col btn-play2 d-flex justify-content-center align-items-center">
                <a href="../FortuneStick/FS_PageIndex.php" style="display: inline;" class="link">&#9654;</a>
              </div>
            </div>
        </div>
        
        <div class="container-fluid position-relative bandnerContainer">
            <div class="row d-flex">
                <div class="col btn-play2 d-flex justify-content-center align-items-center">
                    <a href="../Tarot/TR_PageIndex.php" style="display: inline;" class="link">&#9654;</a>
                </div>
                <div class="col-9 p-0">
                    <img src="./pic/block3/BD3.gif" class="bandnerPic m-0 p-0">
                </div>
            </div>
        </div>
    
        <div class="footer">
            <center>
                <p>Copyright©2023 Uuuuu Yang Company Group</p>
                <p style="background-color: white; color:black; border-radius: 35px; width: 200px;">Version : 0.0.1
                </p>
            </center>
        </div>

         <!--ปุ่มเลื่อนขึ้นกลับไปช้างบน-->
        <button onclick="topFunction()" id="BtnScollUp" title="Go to top">&#8679;</button>
        <script src="../css/scrollTop/scroll.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>

        <script>
            // เริ่มเล่นอัตโนมัติทันทีเมื่อหน้าเว็บโหลดเสร็จ
            document.addEventListener("DOMContentLoaded", function() {
                var myCarousel = document.getElementById('carouselExample');
                var carousel = new bootstrap.Carousel(myCarousel, {
                interval: 2000, // เปลี่ยนภาพทุก 2 วินาที
                wrap: true // เล่นแบบวนซ้ำ
                });
            });
        </script>

</body>

</html>