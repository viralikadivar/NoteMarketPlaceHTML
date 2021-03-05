<?php

require "../db_connection.php";
global $connection;
$token = $_REQUEST['token'];
$id = sqrt($token);

$query = "SELECT * FROM Users WHERE ID = $id  AND IsEmailVerified = 0 ";
$result = mysqli_query($connection, $query);
$verified = mysqli_num_rows($result);

if ($verified)
    {
    $sql = "UPDATE Users SET IsEmailVerified = 1 WHERE ID = $id ";
    $result = mysqli_query($connection, $sql);
    if ($result)
        {
            mkdir("../members/.$id.", 0700);
            header("location:../login.php");
        }
      else
        {
            header("location:../user/sign-up.php");
        }
    }

?>