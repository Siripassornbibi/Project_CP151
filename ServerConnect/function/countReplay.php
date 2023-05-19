<?php
    $sql = "UPDATE ".$_SESSION['participationTable']." SET replay = replay + 1 WHERE id_user=".$_SESSION['id'].";";
    $result = $conn->query($sql);

?>