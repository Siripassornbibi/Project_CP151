<?php
    $sql = "SELECT COUNT(idComment) AS commentCount FROM ".$_SESSION['commentTable'].";";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $commentCount = $row['commentCount'];
        $_SESSION['countComment'] = $commentCount;
    } else {
        $_SESSION['countComment'] = 0;
    }
   
?>