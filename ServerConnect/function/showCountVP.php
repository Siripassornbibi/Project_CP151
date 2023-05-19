<?php
    $sql = "SELECT SUM(view),SUM(replay),SUM(love) FROM " . $_SESSION['participationTable'] . ";";
    $result = $conn->query($sql);
    $row = $result->fetch_array();
    $sumView = $row[0];
    $sumReplay = $row[1];
    $sumLove = $row[2];
?>