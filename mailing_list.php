<?php


require_once('includes/AdminUserDAO.php');
session_start();
session_regenerate_id(false);

if(isset($_SESSION['AdminID']))
{
        if(!$_SESSION['AdminID']->isAuthenticated()){
        header('Location:userLogin.php');
    }
} else {
    header('Location:userLogin.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php
    include 'header.php';
    ?>
</head>
<body>

<style>
    .adminInfo {
        -webkit-text-fill-color: cornflowerblue;
    }
</style>

<?php

include "includes/dbh.php";

$connection = new Dbh("localhost:8889", "root", "root", "wp_eatery");
$connection->displayAllUsers();

echo "<p class='adminInfo'> Session AdminID = " . $_SESSION ['AdminID']->getAdminId () . "<br>";
echo "Session id : " . session_id () . "<br>";
echo "Last Login  : " . $_SESSION['AdminID']->getLastLogin()."</p>";



?>

</body>
</html>