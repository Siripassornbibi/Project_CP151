<?php
    require('dbconnect.php');
    
    $id = $_POST["std_id"];
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $major = $_POST["major"];
    $DOB = $_POST["DOB"];
    $email = $_POST["Email"];
    $phone = $_POST["phone"];

    $sql = "UPDATE students SET firstname ='$firstName',lastname ='$lastName',major ='$major',DOB='$DOB',Email='$email',phone='$phone' WHERE std_id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result){
        header("location: ../adminPage.php");
        exit(0);
        
    }else{
        $sql . "<br>" . $e->getMessage();
    }
?>