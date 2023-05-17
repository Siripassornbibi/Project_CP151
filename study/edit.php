<?php
    // Start the session
    session_start();

    require('./function/dbconnect.php');
    $id = $_GET["idstd"];

    $sql = "SELECT * FROM students WHERE std_id = $id";
    $result = mysqli_query($conn, $sql);

    //array row
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #tableAdd,tr,td{
            border: solid 1px;
            table-layout: auto; 
        }
        .statusText{
            text-align: right;
            padding: 5px;
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
    <hr/>
    <center>
    <h2>Edit Information</h2>
    <div><center>
        <form method='post' action='./function/updateData.php'>
            <table id='tableAdd'>
                <row>
                    <tr>
                        <th><label>ID:</label></th>
                        <th><label>Name:</label></th>
                        <th><label>Last name:</label></th>
                        <th><label>Major:</label></th>
                        <th><label>Date of birth:</label></th>
                        <th><label>Email:</label></th>
                        <th><label>Phone number:</label></th>  
                    </tr>
                </row>
                <row>
                    <tr>
                        <td><input type='text' name='std_id' value='<?php echo $row['std_id'];?>' readonly size="4"/></td>
                        <td><input type='text' name='firstname' value='<?php echo $row['firstname'];?>'/></td>
                        <td><input type='text' name='lastname' value='<?php echo $row['lastname'];?>'/></td>
                        <td>
                            <select name="major">
                                <option value="CS" <?php if($row['major']=='CS'){ echo 'selected="selected"';}?> >CS</option>
                                <option value="Stat" <?php if($row['major']=='Stat'){ echo 'selected="selected"';}?>>Stat</option>
                                <option value="Math" <?php if($row['major']=='Math'){ echo 'selected="selected"';}?>>Math</option>
                                <option value="NULL" <?php if($row['major']=='NULL'){ echo 'selected="selected"';}?>>None</option>
                            </select>
                        </td>
                        <td><input type='date' name='DOB' placeholder="yyyy-mm-dd" value='<?php echo $row['DOB'];?>'/></td>
                        <td><input type='email' name='Email' value='<?php echo $row['Email'];?>'/></td>
                        <td><input type='text' name='phone' placeholder="xxx-xxx-xxxx / xx-xxx-xxxx" value='<?php echo $row['phone'];?>'/></td>
                        <td>
                            <input type="submit" value="Update">
                            <input type="reset" value="Reset">
                        </td>
                    </tr>
                </row>
            </table>
        </form>
    </center></div>
</body>
</html>