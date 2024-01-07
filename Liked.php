<?php
session_start();
extract($_GET);
include "config.php";
$a= $_GET['id'];
$id=$_SESSION['id'];
$like="SELECT * FROM `liked_books` WHERE Uid ='$id'";
$result = mysqli_query($con,$like);
$rows=mysqli_num_rows($result);
  $row = mysqli_fetch_object($result);
        if ($rows>0)
        {
          $valid=$row->booksID;

        }


        if($a==$valid){
          $q="DELETE FROM `liked_books` WHERE booksID ='$a' AND Uid ='$id'";
          if (mysqli_query($con, $q)) {
            echo '<script> alert("book removed from liked books");window.location.href="Likedindex.php" ; </script>';
           
          }

        }
        else {

$sql ="INSERT INTO `liked_books`(`booksID`, `Uid`, `id`) VALUES ('$a','$id',Null)";

if (mysqli_query($con, $sql)) {
  echo '<script type="text/javascript"> alert("bokk added to likde books") </script>';
  header("location:userindex.php") ;
} else {
  echo "Error : " . mysqli_error($con);
}

mysqli_close($con);
        }
      
?> 