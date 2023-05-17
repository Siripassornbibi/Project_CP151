<?php
    // Start the session
    session_start();

    $cookie_name = "countBtn";
    $cookie_value = null;
    setcookie($cookie_name, $cookie_value);

    //sort xxx columns 
    // Handle the form submission
    if (isset($_POST['sort_btn'])) {
        $orderby = $_POST['sort_btn'];
        // if the same column was clicked again, toggle the sort order
        if (isset($_COOKIE['countBtn']) && $_COOKIE['countBtn'] === "ASC" && isset($_POST['sort_btn']) && $_POST['sort_btn'] === $orderby) {
            $sort_order = "DESC"; // toggle the sort order
        } else {
            $sort_order = "ASC"; // default sort order
        }
        setcookie("countBtn", $sort_order);
    } else {
        $orderby = "std_id"; // default order by column
        $sort_order = 'ASC'; // default sort order
        setcookie("countBtn", $sort_order);
    }

    //จัดการรับตัวแปรที่ได้มาจาก form และนำมาเช็คตามเงื่อนไข
    $firstName = $lastName = $major = $DOB = $email = $phone = "";
    $firstNameErr = $lastNameErr = $majorErr = $DOBErr = $emailErr= "";
    $successMsg = "";
    $status = "error";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["firstname"])) {
            $firstNameErr = "*";
            } else {
            $firstName = "'".test_input($_POST["firstname"])."'";
            }
            
            if (empty($_POST["lastname"])) {
            $lastNameErr = "*";
            } else {
            $lastName = "'".test_input($_POST["lastname"])."'";
            }
            
            $major = "'".$_POST["major"]."'";
        
            if (empty($_POST["DOB"])) {
            $DOBErr = "*";
            } else {
            $DOB = "'".$_POST["DOB"]."'";
            }
        
            if (empty($_POST["Email"])) {
            $emailErr = "*";
            } else {
            $email = "'".test_input($_POST["Email"])."'";
            }

            if (empty($_POST["phone"])) {
            $phone = NULL;
            } else {
            $phone  = "'".test_input($_POST["phone"])."'";
            }
        }

        if ($firstNameEr== "" && $lastNameErr== "" && $majorErr== "" && $DOBErr== "" && $emailErr== "") {
            $status = "pass";
        }else{
            $status = "error";
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        } 

        function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
            
        // insert data
        $servername = "10.1.3.40";
        $username = "65102010424";
        $password = "65102010424";
        $dbname = "65102010424";
        if ($status == "pass"){
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = ("INSERT INTO students (std_id,firstname, lastname, major, DOB, Email, phone) 
                VALUES (NULL,$firstName, $lastName , $major, $DOB, $email, $phone)");
                // use exec() because no results are returned
                $conn->exec($sql);
                alert("New record created successfully");
              } catch(PDOException $e) {
                alert($sql . "<br>" . $e->getMessage());
              }
              $conn = null;
        }

        //for table
        require('./function/dbconnect.php');
        $sql = "SELECT std_id, firstname, lastname, major, DOB, Email, phone FROM students ORDER BY " . $orderby ." " . $sort_order;
        $result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <style>
        #studentTable,#tableAdd,tr,td{
            border: solid 1px;
            table-layout: auto; 
        }
        tr,th{
            padding: 5px 10px;
        }
        td {
            padding: 5px;
        }
        .statusText{
            text-align: right;
            padding: 5px;
        }
        button{
            text-align: left;
            width: auto;
        }
        .headTable th button{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="statusText">
        <span>Welcome 
        <?php 
            // Echo session variables that were set on previous page
            echo $_SESSION["username"]; 
        ?> 
        (You have <?php echo $_SESSION["role"];?> rights)</span>
        <span>  |  </span>
        <span><a href='./function/logout.php'>Logout</a></span>
    </div>
    <div><center>
        <h2>Add a new student:</h2>
        <form method='post'>
            <table id='tableAdd'>
                <row>
                    <tr>
                        <td><span class="error"><?php echo $firstNameErr;?></span><label>Name:</label></td>
                        <td><input type='text' name='firstname'/></td>
                    </tr>
                </row>
                <row>
                    <tr>
                        <td><span class="error"><?php echo $lastNameErr;?></span><label>Last name:</label></td>
                        <td><input type='text' name='lastname'/></td>
                    </tr>
                </row>
                <row>
                    <tr>
                        <td><label>Major:</label></td>
                        <td>
                            <select name="major">
                                <option value="CS">CS</option>
                                <option value="Stat">Stat</option>
                                <option value="Math">Math</option>
                                <option value="NULL" selected="selected">None</option>
                            </select>
                        </td>
                    </tr>
                </row>
                <row>
                    <tr>
                        <td><?php echo $DOBErr;?><label>Date of birth:</label></td>
                        <td><input type='date' name='DOB' placeholder="yyyy-mm-dd"/></td>
                    </tr>
                </row>
                <row>
                    <tr>
                        <td><?php echo $emailErr;?><label>Email:</label></td>
                        <td><input type='email' name='Email'/></td>
                    </tr>
                </row>
                <row>
                    <tr>
                        <td><label>Phone number:</label></td>
                        <td><input type='text' name='phone' placeholder="xxx-xxx-xxxx / xx-xxx-xxxx"/></td>
                    </tr>
                </row>
                <row>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Insert">
                            <input type="reset" value="Reset">
                        </td>
                    </tr>
                </row>
            </table>
        </form>
        <hr style="width:75%;"/>
        
        <h2>List of all students:</h2>
        <table id='studentTable'>
            <thead>
                <tr class ='headTable'>
                <form method="post">
                    <th><button type="submit" name="sort_btn" value="std_id" formmethod="post">&#8597;<div style="text-align: center;">ID</div></button></th>
                    <th><button type="submit" name="sort_btn" value="firstname" formmethod="post">&#8597;<div style="text-align: center;">Name</div></div></button></th>
                    <th><button type="submit" name="sort_btn" value="lastname" formmethod="post">&#8597;<div style="text-align: center;">Last Name</div></button></th>
                    <th><button type="submit" name="sort_btn" value="major" formmethod="post">&#8597;<div style="text-align: center;">Major</div></button></th>
                    <th><button type="submit" name="sort_btn" value="DOB" formmethod="post">&#8597;<div style="text-align: center;">DOB</div></button></th>
                    <th><button type="submit" name="sort_btn" value="Email" formmethod="post">&#8597;<div style="text-align: center;">Email</div></button></th>
                    <th><button type="submit" name="sort_btn" value="phone" formmethod="post">&#8597;<div style="text-align: center;">Phone</div></button></th>
                    <th></th>
                </form>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td><?php echo $row["std_id"]; ?></td>
                    <td><?php echo $row["firstname"]; ?></td>
                    <td><?php echo $row["lastname"]; ?></td>
                    <td><?php echo $row["major"]; ?></td>
                    <td><?php echo $row["DOB"]; ?></td>
                    <td><?php echo $row["Email"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                    <td>
                        <a href="edit.php?idstd=<?php echo $row["std_id"];?>"><img src="./pic/pencil.png" alt="edit" title="edit" style="width: 27px;"></a>
                        <a href="./function/delete.php?idstd=<?php echo $row["std_id"];?>"
                        onclick="return confirm(' <?php echo 'Are you sure you want to delete this record : STUDENT ID '.$row["std_id"]; ?>')"
                        ><img src="./pic/bin.png" alt="delete" title="delete" style="width: 27px;"></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>    
        </table>
        </center>
    </div>
</body>
</html>