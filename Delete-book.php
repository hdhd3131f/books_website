<?php
session_start(); // Starting Session
$_SESSION['role'];
if(!isset($_SESSION["login"]))
header("location:login.php");
else
echo " <center><H1> welcome " . $_SESSION["login"]. "</H1></center>";
if($_SESSION['role']==2){
   header("location:login.php");
}
?>
<?php
extract($_GET);
include "config.php";
// sql to delete a record
$sql = "DELETE FROM books WHERE id =".$_GET['id'];

if (mysqli_query($con, $sql)) {
  echo "Record deleted successfully";
  header("location:Showbooks.php") ;
} else {
  echo "Error deleting record: " . mysqli_error($con);
}

mysqli_close($con);
?> 