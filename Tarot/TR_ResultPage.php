<?php include('../ServerConnect/server.php'); ?>
<?php
    session_start();
    include('../ServerConnect/function/countReplay.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Result Tarot Card</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--BS5 ใช้บ่ได้เด้อ-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!--ปุ่มเลื่อนขึ้นไปข้างบน-->
    <link rel="stylesheet" href="../css/scrollTop/scroll.css">

    <!--footer-->
    <link rel="stylesheet" href="../css/footer.css">

    <!--เชื่อมข้อมูล-->
    <script src="./TR_Data.js"></script>
    <script>
        let randomResult = Math.floor(Math.random() * size);
        /*let numberShow = dataTR[randomResult].number;*/
        let NameCardShow = dataTR[randomResult].NameCard;
        let dataWorkShow = dataTR[randomResult].dataWork;
        let dataFinanceShow = dataTR[randomResult].dataFinance;
        let dataLoveShow = dataTR[randomResult].dataLove;
        let dataHealthShow = dataTR[randomResult].dataHealth;
        let dataPic = dataTR[randomResult].pic;
    </script>

    <!--navbarบน-->
    <style type="text/css">
        navbar{
            background-color: #fff;
        }
        .navbarTop{
            height: 85px;
        }
        .navbarTop:hover{
             background-color: rgb(203, 184, 216);
         }
        .pathTxt{
            font-size: 5px;
        }
        .logo{
            margin: auto;
            text-align: center;
        }
        #navDown{
            background-color: #fff;
        }
        @font-face {
            font-family: thFont1;
            src: url(../font/PK\ Maehongson\ Medium.ttf);
        }

        @font-face {
            font-family: thFont2;
            src: url(../font/SOV_Vimamsa.ttf);
        }
        h1{
            font-family: thFont2;
        }
        p{
            font-family: thFont1;
        }
    </style>

    <style type="text/css">
        <!--ส่วนnavbarล่าง และตัวเอกสาร-->
        body{
            position:relative;
        }
        #section1,#section2,#section3,#section4{
            padding: 160px 50px;
            font-size: 24px;
            height: auto;
        }

        #section0{
            padding-top: 150px;
            padding-bottom:50px;
            height:auto;
            color:#fff;
            background-image: url("./compost/bg1_result.jpg");
            background-size: cover;
            background-repeat: no-repeat;

            text-align: center;
        }
        #section1 {
            color: #fff;
            background-color: rgb(114, 134, 211);
        }
        #section2 {
            color:black;
            background-color:rgb(229, 224, 255);
        }
        #section3{
            color:#fff;
            background-color:rgb(142, 167, 233);
        }
        #section4 {
            color:black;
            background-color:rgb(255, 242, 242);
        }
        #Card {
            width: 20%;
        }
        @media (max-width:600px){
            #Card {
                width:70%;
            }
        }
        #navDown a:hover{
            color:black;
        }
        .backBtn {
            background-color: #5C469C;
            color: white;
        }

        .backBtn:hover {
            background-color: #D4ADFC !important;
        }
    </style>

    <style>
        .smallpic_result{
            width: 250px;
            border-radius: 100%;
        }
        .col-sm-4{
            text-align: center;
        }

    </style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <nav class="navbar navbar-inverse navbar-fixed-top w-100">
        <!--nav บน-->
        <div class="row">
            <div class="container-fluid navbarTop"> 
                <div class="d-flex justify-content-md-center logo">
                    <a href="../index.php">
                        <img src="../pic/logo/logo2.png" alt="logo web" width="85">
                    </a>
                </div>
            </div>    
        </div>
        <!--nav ล่าง-->
        <div class="row">
            <div class="container-fluid" id="navDown">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">
                        <b><?php echo $_SESSION['username']?></b> : You Got <b><span id=nameCardNav></span></b> Card
                    </a>
                </div>
                <div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#section0" class="scroll-link">&#127183; Card</a></li>
                        <li><a href="#section1" class="scroll-link">&#128188; Work</a></li>
                        <li><a href="#section2" class="scroll-link">&#128184; Finance</a></li>
                        <li><a href="#section3" class="scroll-link">&#128152; Love</a></li>
                        <li><a href="#section4" class="scroll-link">&#129658; Health</a></li>
                        <li><a href="./TR_PageIndex.php" class="scroll-link backBtn" style="color:white">BACK</a></li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div id="section0" class="container-fluid">
        <h1>
            <div id="NameCardS"></div>
        </h1>
        <img src="" id="Card"></img>
    </div>

    <!--แบ่งตามหมวด-->
    <div id="section1" class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <img src="./compost/smallpic_in_result/work.jpg" class="smallpic_result">
            </div>
            <div class="col-sm-8">
                <h1>WORK</h1>
                <p><span id="dataWork"></span></p>
            </div>
        </div>
    </div>

    <div id="section2" class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <h1>FINANCE</h1>
                <p><span id="dataFinance"></span></p>
            </div>
            <div class="col-sm-4">
                <img src="./compost/smallpic_in_result/money.jpg" class="smallpic_result">
            </div>
        </div>
    </div>

    <div id="section3" class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <img src="./compost/smallpic_in_result/love.jpg" class="smallpic_result">
            </div>
            <div class="col-sm-8">
                <h1>LOVE</h1>
                <p><span id="dataLove"></span></p>
            </div>
        </div>
    </div>

    <div id="section4" class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <h1>HEALTH</h1>
                <p><span id="dataHealth"></span></p>
            </div>
            <div class="col-sm-4">
                <img src="./compost/smallpic_in_result/health.jpg" class="smallpic_result">
            </div>
        </div>
    </div>

    <div class="footer">
        <center>
            <p>Copyright©2023 Uuuuu Yang Company</p>
            <p style="background-color: white; color:black; border-radius: 35px; width: 200px;">Version : 0.0.1</p>
        </center>
    </div>
    
    <!--ปุ่มเลื่อนขึ้นกลับไปช้างบน-->
    <button onclick="topFunction()" id="BtnScollUp" title="Go to top">&#8679;</button>
    <script src="../css/scrollTop/scroll.js"></script>

    <script type="text/javascript">

        document.getElementById("NameCardS").innerHTML = NameCardShow;
        document.getElementById("dataWork").innerHTML = dataWorkShow ;
        document.getElementById("dataFinance").innerHTML = dataFinanceShow ;
        document.getElementById("dataLove").innerHTML = dataLoveShow ;
        document.getElementById("dataHealth").innerHTML = dataHealthShow ;
        document.getElementById("Card").src = dataPic;

        document.getElementById("nameCardNav").innerHTML = NameCardShow;

        function myFunction() {
            window.location.href = 'Tarot.html';
        }

    </script>
    
   

</body>

</html>