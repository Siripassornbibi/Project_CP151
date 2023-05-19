<?php
    session_start();
    include('../ServerConnect/server.php');
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass_1 = mysqli_real_escape_string($conn, $_POST['pass_1']);
        $pass_2 = mysqli_real_escape_string($conn, $_POST['pass_2']);
        $fileName = basename($_FILES["image"]["name"]);
		$fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $image = $_FILES['image']['tmp_name'];

        // if(empty($username)) {
        //     array_push($errors, "*Username is required");
        // }
        // if(empty($email)) {
        //     array_push($errors, "*Email is required");
        // }
        // if(empty($pass_1)) {
        //     array_push($errors, "*Password is required");
        // }
        // if(empty($pass_2)) {
        //     array_push($errors, "*Please confirm password");
        // }
        if($pass_1 != $pass_2) {
            array_push($errors, "The two password do not match");
        }

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' ";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) {
            if ($result['username'] === $username) { //มีชื่อนี้อยู่ในระบบแล้วมั้ย กันusernameซ้ำ
                array_push($errors, "Username already exists");
            }
            if ($result['email'] === $email) { //มีemailนี้อยู่ในระบบแล้วมั้ย ไม่ให้ใช้mailเดิมสมัคร
                array_push($errors, "Email already exists");
            }
        }

        if (count($errors) == 0) { //if no error
            $password = md5($pass_1);

            if (empty($image)) {
                $defaultImage = "./pic/default-image.png";
                $imgContent = addslashes(file_get_contents($defaultImage));
            } else {
                $imgContent = addslashes(file_get_contents($image));
            }

           

            $sql = "INSERT INTO user (username, email, password,role,image) VALUES ('$username', '$email', '$password','user','".$imgContent."')";
            mysqli_query($conn,$sql);

            //update countParticipationTR table and countParticipationFS
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);
            
            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['image'] = base64_encode($row['image']);
                $_SESSION['success'] = "You are now logged in";
                //countParticipationTR
                $sql = "INSERT INTO countParticipationTR (id_user,view,replay,love) VALUES ('".$_SESSION['id']."',0,0,0)";
                mysqli_query($conn,$sql);
                $sql = "INSERT INTO countParticipationFS (id_user,view,replay,love) VALUES ('".$_SESSION['id']."',0,0,0)";
                mysqli_query($conn,$sql);
            }

            mysqli_close($conn);
            
            header('location: ./login.php');
        } else {
            $_SESSION['error'] = $errors;
            header('location: register.php');
        }
    }
?>