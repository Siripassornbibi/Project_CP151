<?php session_start();?>
<?php include('../server.php'); ?>


<?php
    $comment = $_POST["commentTxt"];
    $id = $_SESSION["id"];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO " . $_SESSION['commentTable'] . " (idComment, comment, idUser, dateandtime)  
    VALUES (NULL, '$comment', $id, NOW())";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
    $conn->close();

    header('location:' . $_SESSION['path']);
    die();

?>