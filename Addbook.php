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
include "config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/addbook.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Add book</title>
</head>
<body>
<a href="admin.php">
  <i class="fa fa-angle-double-left" style="font-size:36px"></i>
</a>
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
  $book =$_FILES['book']['name'];
  $tmp_name_book = $_FILES['book']['tmp_name'];
  $file_size = $_FILES['book']['size'];
  $error = $_FILES['book']['error'];
  
//   $Title=$_POST['btitle'];
//   $Author=$_POST['bauth'];
//   $id=$_POST['bid'];
//   $Description=$_POST['bdes'];
//   $category=$_POST['CatID'];
  $bk=false;
  if($error ===0){
    $book_ex= strtolower(pathinfo($book,PATHINFO_EXTENSION));
    $allowed_ex=array("pdf");
    if(in_array($book_ex,$allowed_ex)){
        move_uploaded_file($tmp_name_book,"Books/$book");

        $bk=true;
        
    }
    else{
        echo "<script>alert('you cannot upload book of this type')</script>";
    }
  }
  

  


 if($img && $bk){
    $sql = "INSERT INTO `books`(`id`, `Title`, `Description`, `Author`, `Catid`, `Cover`,`file`) VALUES ('{$_POST['bid']}' ,'{$_POST['btitle']}','{$_POST['bdes']}','{$_POST['bauth']}', '{$_POST['CatID']}','Images/$cover','Books/$book')";
  $result = mysqli_query($con ,$sql);

 }
  
                               
 
 if($result)              
 {
 echo '<script type="text/javascript"> alert("book is added Successfully .......") </script>';                                     
 header ("Location: Admin.php");
 }
 else
{
echo '<script type="text/javascript"> alert("book not added .......") </script>';
} 

}
?>
<h1>Add a new book   </h1>  
<form action = "" method ="post" enctype="multipart/form-data">
<p>Book ID : <input type = "number" name = "bid" size = "20" required /> </p>
<p>Book Title : <input type = "text" name = "btitle" size = "20" required /> </p>
<p>Book Description : <input type = "text" name = "bdes" size = "20" required /> </p>
<p>Author : <input type = "text" name = "bauth" size = "20" required /> </p>
Category 
<?php 
        $result = mysqli_query($con, "SELECT * FROM Category") 
         or die(mysqli_error($con));
         echo "<select name ='CatID'>";
            while($row = mysqli_fetch_array($result))
             {
              echo "<option value='".$row["id"]."'  >".$row["Description"]. "</option>";
              }                
                   echo "</select>";
    ?>
<p>cover <input type="file" name = "cover"></p>
<p>Book <input type="file" name = "book"></p>
<button  type= "submit" name="submit"> Submit </button>
<button  type= "reset" > Reset </button>
</form>

</body>
</html>