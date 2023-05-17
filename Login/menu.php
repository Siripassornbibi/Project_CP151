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
        <div class="container-fluid connav">
            <p class="pathTxt">
                <a class="navbar-brand ms-5" href="../index.php" style="font-size:15px">HOMEPAGE &nbsp ></a>
                <u><a class="navbar-brand" href="menu.html" style="font-size:15px">MENU</a></u>
            </p>
            <div class="d-flex justify-content-md-center" style="position: absolute;left:47%;z-index: 1;">
                <a href="./index.php">
                    <img src="../pic/logo/logo2.png" alt="logo web" width="85">
                </a>
            </div>
            <div class="d-flex me-2">
                <?php if (isset($_SESSION['username'])) : ?>
                    <p class="mt-3">Welcome <?php echo $_SESSION['username']; ?>&nbsp;</p>
                    <?php if ($_SESSION['image'] === '') : ?>
                        <div class="profile-image-container">
                            <a href="./update_profile.php"><img src="./pic/default-image.png" height="50px" border-radius="50%"></a>
                        </div>
                    <?php else: ?>
                        <div class="profile-image-container">
                            <a href="./update_profile.php"><img src="uploaded_img/<?php echo $_SESSION['image']; ?>" class="profile-image" height="50px" border-radius="50%"></a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <p>&nbsp&nbsp&nbsp</p>
                <p class="mt-2 me-2"><a href="index.php?logout='1'" class="btn btn-outline-danger">Logout</a></p>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
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