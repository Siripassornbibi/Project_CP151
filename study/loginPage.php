<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
            border: 0.5px solid;
        }
        th{
            text-align: left;
        }
    </style>
</head>
<body>
    <form action="checkuser.php" method="POST">
        <table>
            <tr>
                <th colspan="3">Please Login Here</th>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" required="required" value="<?php echo $_COOKIE['username'];?>"/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password" required="required"/></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit"
                
                value="login"></input></td>
            </tr>
        </table>
    </form>
</body>
</html>
