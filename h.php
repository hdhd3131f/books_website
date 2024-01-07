<?php
require("config.php");

$s = "SELECT * from users ";
$r = mysqli_query($con,$s);
while($row = mysqli_fetch_array($r)){
    $username = $row['username'];
    $pass = $row['password'];
    $pass = password_hash($pass,PASSWORD_DEFAULT);

    $u = "UPDATE users set password ='$pass' where username = '$username'";
    $e = mysqli_query($con,$u);
}


?>