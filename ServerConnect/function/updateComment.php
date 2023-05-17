<?php session_start();?>
<?php include('../server.php'); ?>

<?php

$idC = $_POST["idComment"];
$newComment = $_POST["commentTxt"];

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE " . $_SESSION['commentTable'] . " SET comment='".$newComment."' WHERE idComment=".$idC;

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
}

$conn->close();

header('location:' . $_SESSION['path']);
die();
?>


