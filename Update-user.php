<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <a href="Showusers.php">
  <i class="fa fa-angle-double-left" style="font-size:36px"></i>
</a>
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
// extract($_GET);
// extract($_POST);
include "config.php";
if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['email'])) {
    $userId = $_POST['id'];
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];

    echo"<script>alert($userId)</script>";
    


    $q = "UPDATE users SET username = '$newUsername', Email = '$newEmail' WHERE id = '$userId'";
    $result=mysqli_query($con,$q);
    if($result){
        echo"<script>alert($userId)</script>";
    }
    else {
        echo"<script>alert('error')</script>";
    }

    $mysqli->close();
}

// if( isset($submit))
// {    

// $result = mysqli_query($con , "update users set id='$_POST[theid]' ,username ='$_POST[ffrom]' ,Email='$_POST[to]' where id ='$_GET[id]'") ;

// if(!$result)
//        {
//             die('Record not updated ...' . mysqli_error($con));        
//        }
//    else
//    {
//        echo " record is updated in users table";   
//        header("location:Showusers.php") ;
//    }
// }

 // SQL query to retrieve user data
//  $sql = "SELECT * FROM users where id=".$_GET['id'];
//  $result = $con->query($sql);

//  if ($result->num_rows > 0) {
//      echo "<html> <head></head><body>";
//     echo " <center><form action='' method='post'  >";
//     while ($row = mysqli_fetch_object($result)) 
//     {
       
//        echo "new UserID &nbsp;&nbsp;&nbsp;&nbsp;<input type='num' name='theid' value= $row->id >";      
//        echo "<br> new Username <input type='text' name='ffrom' value= $row->username >";      
//        echo "<br>new Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='to' value= $row->Email >";             
//     }
    
//     echo "<br><br><input type='submit' name='submit' value='submit'>" ;
//     echo "</form></center></body></html>";
//  } else {
//      echo "No users found.";
//  }

//  // Close the database connection
//  $con->close();
 
?> 