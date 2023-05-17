<?php
// Start the session
session_start();

//store name of user
$cookie_name = "username";
?>

<?php 
//input form the form
$username =  $_REQUEST["username"];
$password =  $_REQUEST["password"];

//Connect to DB
$servername = "10.1.3.40";
$dbuser = "65102010424";
$dbpassword = "65102010424";

try {
    $conn = new PDO("mysql:host=$servername;dbname=65102010424", $dbuser, $dbpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

    //check the user name and password in the user table
    $stmt = $conn->prepare("SELECT username, password, role FROM users WHERE username = '".$username."' and password = md5('".$password."')");
    $stmt->execute();

    //count the number of rows
    $count = $stmt->rowCount();
    //echo $count;
    if ($count == 1){
        //echo "Correct";

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set session variables
        $_SESSION["username"] = $row["username"];
        $_SESSION["role"] = $row["role"];
        setcookie($cookie_name, $row["username"]);

        if ($_SESSION["role"] == 'admin'){
            header("Location:adminPage.php");
            exit();
        } else {
            header("Location:userPage.php");
            exit();
        }
    } else {
        include('./function/incorrect.php');
    }
    }

    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


?>