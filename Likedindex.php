
<link rel="stylesheet" href="Css/index.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Css/books.css"/>
    <link rel="stylesheet" href="Css/like.css"/>
    <link rel="stylesheet" href="Css/top.css"/>
    <link rel="stylesheet" href="Css/loke.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://kit.fontawesome.com/a54d2cbf95.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <a href="userindex.php">
  <i class="fa fa-angle-double-left" style="font-size:36px"></i>
</a>
<?php
session_start();
$uid=$_SESSION['id'];
include "config.php";
echo " <div class='container'>";

$result = mysqli_query($con, "Select * From liked_books where Uid ='$uid'");
if ($result)
{
    
    while ($row = mysqli_fetch_object($result)) 
    {
        // $d=$row['booksID'];
        $sql= "SELECT * FROM `books` where `id` ='$row->booksID'";
        $res=mysqli_query($con,$sql);
      if ($res){

        while ($rows = mysqli_fetch_object($res)) 
    {

       
        echo "<div class='box-container'>";

        echo " <div class='box'>";
     echo " <a href='Liked.php? id=$rows->id''><i class='fa fa-heart' style='font-size:48px;color:red'></i></a>";

           echo "<img src='$rows->Cover' alt='' width='100px'>";
           echo " <h3>$rows->Title</h3>";
          echo  "<p>$rows->Description</p>";
           echo " <a href='$rows->file' class='btn'>Read</a>";
           echo " <a href='$rows->file' class='btn' Download='$rows->Title'>Download</a>";
       echo "</div>";
       echo "</div>";
    }
    }
    
}



}
echo "</div>";

    

?>