<?php


require_once('includes/AdminUserDAO.php');
session_start();
session_regenerate_id(false);
//echo session_id();

if(isset($_SESSION['AdminID'])){
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


<form method="POST" action="" id="deleteform" name="deleteform">

    <h1>To delete a customer enter customerID</h1>
    <input type="text" name="id">

    <input type="submit" name="submit" value="submit">



</form>




<?php

include "includes/dbh.php";
if (isset($_POST['submit']))
{
$connection = new Dbh("localhost:8889", "root", "root", "wp_eatery");

$id = $_POST['id'];

$connection->deleteUser($id);
}


echo "<p class='adminInfo'> Session AdminID = " . $_SESSION ['AdminID']->getAdminId () . "<br>";
echo "Session id = " . session_id () . "<br>";
echo "Last Login  - " . $_SESSION['AdminID']->getLastLogin()."</p>";



?>

</body>
</html>