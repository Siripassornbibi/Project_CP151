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

    // ตรวจสอบสถานะปุ่มหัวใจที่กด
    if ($_SESSION['heartStatus'] == 1) {
        // อัปเดตค่าในฐานข้อมูลเป็น 0
        $sql = "UPDATE ".$_SESSION['participationTable']." SET love = 0 WHERE id_user=".$_SESSION['id'].";";
        $conn->query($sql);
        $_SESSION['heartStatus'] = 0;
    } else {
        // อัปเดตค่าในฐานข้อมูลเป็น 1
        $sql = "UPDATE ".$_SESSION['participationTable']." SET love = 1 WHERE id_user=".$_SESSION['id'].";";
        $conn->query($sql);
        $_SESSION['heartStatus'] = 1;
    }

    // ดึงค่าหัวใจจากฐานข้อมูล
    $sql = "SELECT SUM(love) FROM ".$_SESSION['participationTable'].";";
    $result = $conn->query($sql);
    $row = $result->fetch_array();
    $heartCount = $row[0];

    // ส่งค่ากลับให้กับ JavaScript
    echo $heartCount;

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
?>
