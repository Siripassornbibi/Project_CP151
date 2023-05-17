<?php
session_start();

// clear session
session_unset();
session_destroy();
header("Location: ../loginPage.php");
exit();
?>