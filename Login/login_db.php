<?php
    session_start();
    include('../ServerConnect/server.php');
    $errors = array();

    if(isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // if(empty($username)) {
        //     array_push($errors, "*Username is required");
        // }
        // if(empty($password)) {
        //     array_push($errors, "*Password is required");
        // }
        if (count($errors) == 0) { //if no error
            $password = md5($password);
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);
            
            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $row['email'];
                $_SESSION['image'] = base64_encode($row['image']);
                $_SESSION['success'] = "You are now logged in";
                header('location: ../index.php');
            } else {
                array_push($errors, "Wrong username or password");
                $_SESSION['error'] = "Wrong username or password. Please try again";
                header('location: login.php');
            }
        }
        else {
            $_SESSION['errors'] = $errors;
            header('location: login.php');
        }
    }
?>