<?php include('../ServerConnect/server.php'); ?>
<?php 
    session_start(); 
    $_SESSION['path'] = $_SERVER['REQUEST_URI']; 
    $_SESSION['commentTable'] = 'commentTR'; 
    $_SESSION['participationTable'] = 'countParticipationTR'; 

    //อัปเดตวิว
    include('../ServerConnect/function/countView.php');
    //เอาไว้นับคอมเม้น
    include('../ServerConnect/function/countComment.php');
    //show total view/replay
    include('../ServerConnect/function/showCountVP.php');

    // ปิดการเชื่อมต่อ
    $conn->close();
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarot</title>
    <!--bootstrap5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!--My Comment css-->
    <link rel="stylesheet" type="text/css" href="../css/comment.css">

    <!--heart css-->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../css/heartEffect/styleHeart.css">

    <!--ปุ่มเลื่อนขึ้นไปข้างบน-->
    <link rel="stylesheet" href="../css/scrollTop/scroll.css">

    <!--footer-->
    <link rel="stylesheet" href="../css/footer.css">

    <!--navbar-->
    <link rel="stylesheet" href="../css/navbar.css">

    <!--participation_bar-->
    <link rel="stylesheet" href="../css/showParticipation.css">

    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0em 1em;
            margin-bottom: 0px;
            padding: 0;
            background-color: #fff8eb;
            position: relative; 
        }

        .p1 {
            width: 100%;
            padding: 0;
        }

        .outBox {
            width: 90%;
            border-radius: 30px;
            background-color: white;
            padding: 20px;
            margin: auto;
            margin-top: 30px;
            margin-bottom: 30px;
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }

        .BtnBarItem {
            border-radius: 40px;
            background-color: white;
            border: 2px solid #000000;
            width: 190px;
            height: 45px;
            margin: 10px;
            text-decoration: solid;
            font-weight: bold;
        }

        .BtnBarItem:hover {
            background-color: rgb(0, 0, 0);
            color: white;
        }

        #BtnBar {
            background-color: white;
            z-index: 1;
        }

        hr {
            border: 1px solid rgb(68, 67, 67);
            opacity: 1;
        }
        
    </style>

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">
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
                        <a class="nav-link" href="../Login/menu.php">>MENU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./TR_PageIndex.php">>TAROT</a>
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


    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./compost/TR_BG4.gif" alt="Tarot1" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="./compost/TR_BG3.gif" alt="Tarot2" class="d-block" style="width:100%">
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <div class="showParticipation">
        <ul>
            <li>&#128172 comment (<?php echo $_SESSION['countComment'];?>)</li>
            <li>&#x1F496 love (<span id="heartCount"></span>)</li>
            <li>&#128064 view (<?php echo $sumView;?>)</li>
            <li>&#128257 play (<?php echo $sumReplay;?>)</li>
        </ul>
    </div>

    <div class="container-fluid" id="BtnBar">
        <center>
            <button class="BtnBarItem" type="button" onclick="myFunction1()">DETAIL</button>
            <button class="BtnBarItem" type="button" onclick="myFunction2()">START</button>
            <button class="BtnBarItem" type="button" onclick="myFunction3()">COMMENT</button>
        </center>
    </div>

    <div id="detailCont" class="outBox">
        <h2>DETAIL</h2>
        <hr />
        <p>ไพ่ยิปซีศาสตร์การดูดวงที่มีมาแต่โบราณกาลของชาวยิปซี ซึ่งนิยมแพร่หลายไปทั่วโลก เนื่องจากความแม่นยำ และความศักดิ์สิทธิ์ที่ไม่สามารถอธิบายได้ ไพ่ยิปซีจึงเป็นศาสตร์การ ดูดวง ที่ได้รับความนิยมสูงสุดแบบหนึ่งในปัจจุบัน แม้แต่ในประเทศไทยของเราเอง</p>
        <br>
        <h4>วิธีเล่น</h4>
        <p>มาดูกันซิว่าดวงคุณวันนี้เป็นยังไงบ้าง ตั้งสมาธิให้มั่น แล้วใช้มือซ้าย เลือกไพ่เพียงหนึ่งใบเท่านั้น แล้วไพ่จะบอกสิ่งที่จะเกิดขึ้นให้คุณทราบ</p>
        <br />
        <h4>ข้อควรระวัง</h4>
        <p>ไพ่ยิปซีมีอำนาจลึกลับ จึงไม่ควรดูบ่อยเกินวันละ 1 ครั้ง</p>
        <p style="color:red">**ควรเล่นใน google chrome บน computer**</p>
    </div>


    <!--COMMENT UPDATE FORM-->
    <div id="commentCont" class="outBox">
        <h2>COMMENT (<?php echo $_SESSION['countComment'];?>)</h2>
        <form action="../ServerConnect/function/insertComment.php" method='post'>
            <div class="comment_persons" id="input_comment">
                <fieldset disabled>
                    <div class="input-group flex-nowrap" style="margin:5px 0px;">
                        <span class="input-group-text" id="addon-wrapping">&#128100;</span>
                        <input type="text" class="form-control" aria-describedby="addon-wrapping" value="<?php echo $_SESSION['username']; ?>">
                    </div>
                </fieldset>
                <div class="form-floating">
                    <textarea class="form-control" name='commentTxt' placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Comments</label>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-between m-2">
                    <div>
                        <input type="button" class="btn btn-primary" value="&#8597; sort by date" onclick="sortComment()" id="sortBtn" style="background-color: #19A7CE;"></input>
                    </div>
                    <div>
                        <input class="btnform btn" type="reset"></input>
                        <input class="btnform btn" type="submit" value="Sent"></input>
                    </div>
                </div>
            </div>
        </form>

        <hr />

        <!--COMMENT Display-->
        <div class="comment_persons overflow-scroll" id="comment_persons" style="max-height: 500px;">
        
            <?php 
            if($_SESSION['role']=='admin'){
                $_SESSION['pathComment']='../ServerConnect/function/showComment.php'; 
            }else{
                $_SESSION['pathComment']='../ServerConnect/function/showCommentUser.php'; 
            }
            ?>

            <div id="commentsContainer">
                <!-- ส่วนนี้จะถูกอัปเดตด้วย AJAX เมื่อโหลดหน้าเว็บ -->
            </div>
    
        </div>

    </div>

    <div class="footer">
        <center>
            <p>Copyright©2023 Uuuuu Yang Company</p>
            <p style="background-color: white; color:black; border-radius: 35px; width: 200px;">Version : 0.0.1</p>
        </center>
    </div>

    <!--ปุ่มหัวใจ-->
    <div class='large-font position-fixed bottom-0 end-0' data-bs-toggle="tooltip" title="Like This" style="margin:0 36.5px 80px 0;">
            <ion-icon name="heart">
                <div class='red-bg'></div>
            </ion-icon>
    </div>

    <!--ปุ่มเลื่อนขึ้นกลับไปช้างบน-->
    <button onclick="topFunction()" id="BtnScollUp" title="Go to top">&#8679;</button>
    <script src="../css/scrollTop/scroll.js"></script>
    
    <!--แทรกคอมเม้น+รายงานผลหัวใจที่ไม่ใช่กดปุ่มแบบใช้ Ajax-->
    <script>
        // สร้างตัวแปรเก็บสถานะการเรียงลำดับ
        var sortOrder = 'asc'; // สถานะเริ่มต้นคือ ASC

        function sortComment() {
            // สลับระหว่าง ASC และ DESC
            if (sortOrder === 'asc') {
                sortOrder = 'desc';
            } else {
                sortOrder = 'asc';
            }

            $.ajax({
                url: '<?php echo $_SESSION['pathComment']; ?>',
                method: 'GET',
                data: { sortBy: 'dateandtime', sortOrder: sortOrder }, // ส่งพารามิเตอร์สำหรับเรียงลำดับและสถานะ
                success: function(response) {
                    // Process the response here
                    var commentsContainer = document.getElementById("commentsContainer");
                    commentsContainer.innerHTML = response;
                },
                error: function(xhr, status, error) {
                    // Handle error here
                    console.error(error);
                }
            });
        }

        // เมื่อโหลดหน้าเว็บเรียกฟังก์ชันดึงข้อมูลเพื่อแสดงคอมเมนต์
        $(document).ready(function() {
            $.ajax({
                url: '<?php echo $_SESSION['pathComment']; ?>',
                method: 'GET',
                success: function(response) {
                    // Process the response here
                    var commentsContainer = document.getElementById("commentsContainer");
                    commentsContainer.innerHTML = response;
                },
                error: function(xhr, status, error) {
                    // Handle error here
                    console.error(error);
                }
            });
        });

        //แสดงค่าหัวใจตอนแรก
        let icon = document.querySelector('ion-icon');
        $(document).ready(function() {
            $.ajax({
                url: '../ServerConnect/function/heartStatusPullFirst.php',
                method: 'GET',
                success: function(response) {
                    var heartStatus =  parseInt(response);
                    if (heartStatus === 1) {
                        icon.classList.add('active');
                    } else {
                        icon.classList.remove('active');
                    }  
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        
        //แสดงค่ารวมหัวใจตอนแรก
        $(document).ready(function() {
            $.ajax({
                url: '../ServerConnect/function/gettotalHeartCount.php',
                method: 'GET',
                success: function(response) {
                    var heartTotal = document.getElementById("heartCount");
                    heartTotal.innerHTML = response;
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>

    <!-- carousel เลื่อนเอง -->
    <script>
        // Initialize the carousel
        var myCarousel = document.getElementById('demo');
        var carousel = new bootstrap.Carousel(myCarousel);
    </script>

     <!-- js -->
    <script type="text/javascript">
        function myFunction1() {
            var element = document.getElementById("detailCont");
            element.scrollIntoView({
                behavior: "smooth",
                block: "center",
                inline: "nearest"
            });
        }

        function myFunction2() {
            window.location.href = 'TR_Page2.html';
        }

        function myFunction3() {
            var element = document.getElementById("commentCont");
            element.scrollIntoView({
                behavior: "smooth",
                block: "center",
                inline: "nearest"
            })
        }
        
        //อัพเดตค่าตอนกดปุ่มหัวใจ
        icon.onclick = function() {
            // สลับสีปุ่มหัวใจ
            icon.classList.toggle('active');
            // ส่งคำขอ Ajax
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // อัปเดตค่าหัวใจและแสดงผล
                    document.getElementById("heartCount").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../ServerConnect/function/update_heart.php", true);
            xhttp.send();
        }
    </script>

    <!-- script heart -->
    <script src='https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js'></script>
    

</body>

</html>