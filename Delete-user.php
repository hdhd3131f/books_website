
<?php
include "config.php";
if (isset($_POST['id'])) {
    $userId = $_POST['id'];
    


    $q = "DELETE FROM users WHERE id = '$userId'";
    $result=mysqli_query($con,$q);
    if($result){
      echo"<script>alert($id)</script>";

    }
    else {
      echo"<script>alert('error')</script>";

    }
    // $mysqli->query($q);

    $mysqli->close();
}
?>