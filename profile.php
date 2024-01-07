<?php
session_start(); // Starting Session
$_SESSION['role'];
$id=$_SESSION['id'];
if(!isset($_SESSION["login"]))
header("location:login.php");

       if($_SESSION['role']==1){
           header("location:login.php");
       }
?>
<?php
extract($_GET);
include "config.php";
?>
<?php
if (isset($_POST["submit"]))
{   
  $cover =$_FILES['cover']['name'];
  $tmp_name_cover = $_FILES['cover']['tmp_name'];
  $file_size = $_FILES['cover']['size'];
  $error = $_FILES['cover']['error'];
  
//   $Title=$_POST['btitle'];
//   $Author=$_POST['bauth'];
//   $id=$_POST['bid'];
//   $Description=$_POST['bdes'];
//   $category=$_POST['CatID'];
$img=false;
  if($error ===0){
    $cover_ex= strtolower(pathinfo($cover,PATHINFO_EXTENSION));
    $allowed_ex=array("jpg","png","jpeg");
    if(in_array($cover_ex,$allowed_ex)){
        move_uploaded_file($tmp_name_cover,"Images/$cover");

        $img=true;
        
    }
    else{
        echo "<script>alert('you cannot upload images of this type')</script>";
    }
  }
  if($img){
    $sql = "UPDATE `users` SET `profile`='Images/$cover' WHERE `id` ='$id'";
  $result = mysqli_query($con ,$sql);

 }
  
                               
 
 if($result)              
 {
 echo '<script type="text/javascript"> alert("photo is added Successfully .......") </script>';                                     
 header ("Location: profile.php");
 }
 else
{
echo '<script type="text/javascript"> alert("photo not added .......") </script>';
} 

}
  ?>
<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--<title>Profile Card UI Design</title>-->
    <!-- CSS -->
    <link rel="stylesheet" href="Css/profile.css" />
    <!-- Boxicons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
  <?php 

$result = mysqli_query($con, "Select * From users ");
if ($result)
{
    if ($row = mysqli_fetch_object($result)) 
    {
    echo " <form action = '' method ='post' enctype='multipart/form-data'>
    <div class='profile-card'>
      <div class='image'>
      <p class='profile-img'><img src='$row->profile'/></p>
      <p class='profile-img'> <input type='file' name = 'cover'></p>
      
        
        

      </div>
      <br>
      <div class='text-data'>
        <span class='name'>username</span>
        <span class='job'>YouTuber & Blogger</span>
      </div>
      <div class='media-buttons'>
        <a href='#' style='background: #4267b2' class='link'>
          <i class='bx bxl-facebook'></i>
        </a>
        <a href='#' style='background: #1da1f2' class='link'>
          <i class='bx bxl-twitter'></i>
        </a>
        <a href='#' style='background: #e1306c' class='link'>
          <i class='bx bxl-instagram'></i>
        </a>
        <a href='https://www.youtube.com/' style='background: #ff0000' class='link' target='blank'>
          <i class='bx bxl-youtube'></i>
        </a>
      </div>
      <div class='buttons'>
        <button class='button' name='submit'>save</button>
        <button class='button'><a href='userindex.php' <style></style>>back</a></button>
      </div>
      <div class='analytics'>
        <div class='data'>
          <i class='bx bx-heart'></i>
          <span class='number'>60k</span>
        </div>
        <div class='data'>
          <i class='bx bx-message-rounded'></i>
          <span class='number'>20k</span>
        </div>
        <div class='data'>
          <i class='bx bx-share'></i>
          <span class='number'>12k</span>
        </div>
      </div>
    </div>
    </form>";
    }
}
?>

  </body>
</html>