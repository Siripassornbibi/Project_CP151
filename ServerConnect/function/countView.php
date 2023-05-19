<?php
    $sql = "UPDATE ".$_SESSION['participationTable']." SET view = view + 1 WHERE id_user=".$_SESSION['id'].";";
    $result = $conn->query($sql);
?>