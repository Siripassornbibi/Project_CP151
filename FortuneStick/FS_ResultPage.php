<?php include('../ServerConnect/server.php'); 
session_start();
include('../ServerConnect/function/countReplay.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FortuneStick Result</title>
    <script src="./FS_Data.js"></script>
    <script>
        let datas_BgColor = ["#088395","#77bfab","#a8dcff","#FFEFD6","#8294C4","#d1b8fc","#212f54","#71417a","#e06060","#3e5bc2","#ffe19c","#FFCCD2"];
        let randomColor = Math.floor(Math.random() * datas_BgColor.length);
        let data_BgColor = datas_BgColor[randomColor];
        

        let randomResult = Math.floor(Math.random() * size);
        let numberShow = dataFS[randomResult].number;
        let dataTHShow = dataFS[randomResult].dataTH;
        let dataENGShow = dataFS[randomResult].dataENG;
        let dataPic = dataFS[randomResult].pic;
    </script>
    <style>

        .container {
            background-color: rgb(239, 239, 239);
            opacity: 0.95;
            width: 600px;
            text-align: center;
            border-radius: 30px;
            padding: 30px;
            margin: auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }

        .panel2 {
            background-color: rgb(255, 255, 255);
            border-radius: 30px;
            padding: 15px;
        }

        #iconCard {
            width: 90px;
            height: 90px;
            position: relative;
            z-index: 2;
        }

        #iconCard:hover {
            width: 100px;
            height: 100px;
        }

        #numberS:hover {
            color:rgb(100, 54, 63);
        }


        .dot {
            position: absolute;
            top: 10;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;

            height: 80px;
            width: 80px;
            
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        #bg_item {
            top: -120px;
            width: 100%;
            position: relative;
            z-index: -1;


        }

        hr {
            position: relative;
            top: -105px;
        }

        .button {
            display: inline-flex;
            height: 40px;
            width: 120px;
            border: 2px solid #000000;
            margin: 40px 13px 20px 13px;
            color: #ffffff;
            background-color: rgb(248, 248, 248);
            text-transform: uppercase;
            text-decoration: none;
            font-size: .8em;
            font-weight: bold;
            letter-spacing: 1.5px;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 3px 3px 0 rgba(0, 0, 0, 0.19);
        }

        a {
            color: #000000;
            text-decoration: none;
            letter-spacing: 1px;
        }

        #button-7 {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        #button-7 a {
            position: relative;
            left: 0;
            transition: all .35s ease-Out;
        }

        #dub-arrow {
            width: 100%;
            height: 100%;
            background: #000000;
            left: -200px;
            position: absolute;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .35s ease-Out;
            bottom: 0;
        }

        #button-7 img {
            width: 23px;
            height: auto;
        }

        #button-7:hover #dub-arrow {
            left: 0;
        }

        #button-7:hover a {
            left: 150px;
        }



        @media (max-width: 600px) {
            .container {
                width: 70%;

            }

            #bg_item {
                top: -20px;
            }

            hr {
            position: relative;
            top: -20px;
            }

        }

        @media (max-width: 450px) {
            .button {
                width: 120px;
                height: 40px;
                margin: 5px;
                margin-top: 30px;
            }
            
        }
        @media (max-width: 400px) {
            .button {
                width: 80%;
                height: 40px;
                margin: 5px;
                margin-top: 30px;
            }
            
        }

        @media (min-width: 600px) {
            h2 {
                font-size: 2.5em;
            }

            p {
                font-size: 1.1em;
            }

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="panel1">
            <span class="dot" id="dot"></span>
            <img src="" id="iconCard"></img>
        </div>

        <div id="numberS"></div>

        <div class="panel2">
            <div id="dataTHS"></div>
            <div id="dataENGS"></div>
        </div>

        <div class="button" id="button-7">
            <div id="dub-arrow" onclick="myFunction()">
                <img src="./pic/HomeIcon.png" alt="" />
            </div>
            <a href="./FS_PageIndex.php">home</a>
        </div>

        <div class="button" id="button-7">
            <div id="dub-arrow" onclick="myFunction2()">
                <img src="./pic/FortuneSI1.PNG" alt="" />
            </div>
            <a href="./FS_Page2.html">Shake Again</a>
        </div>
        

    </div>

    <img src="./pic/BG_Item1.png" id="bg_item"></img>

    <hr>
    <hr style="border: 10px solid white;">

    <script type="text/javascript">
        document.body.style.backgroundColor = data_BgColor;
        document.getElementById("dot").style.backgroundColor = data_BgColor;

        document.getElementById("numberS").innerHTML = "<h2> Stick Number : " + numberShow + "</h2>";
        document.getElementById("dataTHS").innerHTML = "<p>" + dataTHShow + "</p>";
        document.getElementById("dataENGS").innerHTML = "<p>" + dataENGShow + "</p>";
        document.getElementById("iconCard").src = dataPic;

        function myFunction() {
            window.location.href = 'FS_PageIndex.php';
        }

        function myFunction2() {
            window.location.href = 'FS_Page2.html';
        }
    </script>

</body>

</html>