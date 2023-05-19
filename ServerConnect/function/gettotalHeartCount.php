<?php
    // เชื่อมต่อฐานข้อมูลและตั้งค่าอื่น ๆ ตามที่คุณต้องการ
    include('../server.php');
    session_start();

    // ดึงค่าหัวใจจากฐานข้อมูล
    $sql = "SELECT SUM(love) FROM ".$_SESSION['participationTable'].";";
    $result = $conn->query($sql);
    $row = $result->fetch_array();
    $heartCountTotal = $row[0];

    // ส่งค่ากลับให้กับ JavaScript
    echo $heartCountTotal;

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
?>