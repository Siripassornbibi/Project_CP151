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
        #studentTable,tr,td{
            border: solid 1px;
            table-layout: auto; 
        }
        tr,th{
            padding: 5px 10px;
        }
        .statusText{
            text-align: right;
            padding: 5px;
        }
        button{
            text-align: left;
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
                </tr>
            <?php } ?>
            </tbody>    
        </table>
        </center>
    </div>
</body>
</html>