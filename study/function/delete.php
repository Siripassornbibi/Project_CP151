<?php
require('dbconnect.php');
$id = $_GET["idstd"];

$sql = "DELETE FROM students WHERE std_id = $id";

$result = mysqli_query($conn,$sql);

if ($result){
    header("location:../adminPage.php");
    exit(0);
    
}else{
    $sql . "<br>" . $e->getMessage();
}

?>