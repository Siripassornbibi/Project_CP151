<?php
    // เชื่อมต่อฐานข้อมูลและตั้งค่าอื่น ๆ ตามที่คุณต้องการ
    include('../server.php');
    session_start();

    $sql = "SELECT love FROM ".$_SESSION['participationTable']." WHERE id_user=".$_SESSION['id'].";";
    $result = $conn->query($sql);
    $conn->query($sql);
    $row = $result->fetch_array();
    $heartCount = $row['love'];
    $_SESSION['heartStatus'] = $heartCount;

    // ส่งค่ากลับให้กับ JavaScript
    echo $heartCount;

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
?>