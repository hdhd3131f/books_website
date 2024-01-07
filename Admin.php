<?php
session_start(); // Starting Session
$_SESSION['role'];
if(!isset($_SESSION["login"]))
header("location:login.php");
else
echo " <center><H1> welcome " . $_SESSION["username"]. "</H1></center>";
if($_SESSION['role']==2){
   header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/index.css"/>
    <link rel="stylesheet" href="Css/books.css"/>
    
    <title>Admin</title>
</head>
<body>
<ul class='menu'>
<li><a href='logout.php' class='active2'>logout</a></li>
</ul>
<div class='container'>

<h1 class='heading'>Admin</h1>

<div class='box-container'>
<div class="box">
            <img src="Images/Adduser.png" alt="">
            <h3>Users</h3>
            <p>You can add users in this page</p>
            <a href="Adduser.php" class="btn">Add User</a>
            
        </div>

        <div class="box">
            <img src="Images/Deleteuser.png" alt="">
            <h3>Users</h3>
            <p>You can delete users in this page</p>
            <a href="ss.php" class="btn">Delete user</a>
            
        </div>

        <div class="box">
            <img src="Images/Edituser.png" alt="">
            <h3>Users</h3>
            <p>You can edit users in this page</p>
            <a href="ss.php" class="btn">Edit user</a>
            
        </div>

        <div class="box">
            <img src="Images/Addbook.jpg" alt="">
            <h3>Books</h3>
            <p>You can add books in this page</p>
            <a href="Addbook.php" class="btn">Add book</a>
            
        </div>

        <div class="box">
            <img src="Images/Deletebook.jpg" alt="">
            <h3>Books</h3>
            <p>You can delete books in this page</p>
            <a href="Showbooks.php" class="btn">Delete book</a>
            
        </div>

        <div class="box">
            <img src="Images/Editbook.jpg" alt="">
            <h3>Books</h3>
            <p>You can edit books in this page</p>
            <a href="Showbooks.php" class="btn">Edit book</a>
            
        </div>

       

</div>
</div>
    
</body>
</html>