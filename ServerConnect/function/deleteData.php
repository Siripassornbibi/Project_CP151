<?php session_start(); ?>
<?php include('../server.php'); ?>


<?php
    $idC = $_GET["IdComment"];

    // sql to delete a record
    $sql = "DELETE FROM ".$_SESSION['commentTable']." WHERE idComment=$idC";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    $conn->close();
    header('location:' . $_SESSION['path']);
    die();
?>