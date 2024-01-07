<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <a href="Showbooks.php">
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
extract($_GET);
extract($_POST);
include "config.php";
if( isset($submit))
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
      $sql = "UPDATE `books` SET `id`='$_POST[theid]',`Title`='$_POST[ffrom]',`Description`='$_POST[to]',`Author`='$_POST[Afrom]',`Catid`='$_POST[CatID]',`Cover`='Images/$cover',`file`='Books/$book' where id ='$_GET[id]'";
    $result = mysqli_query($con ,$sql);
  
   }   


// $result = mysqli_query($con , "update books set id='$_POST[theid]' ,Title ='$_POST[ffrom]' ,description='$_POST[to]', Author ='$_POST[Afrom]' where id ='$_GET[id]'") ;

if($result)              
{
echo '<script type="text/javascript"> alert("book is updated Successfully .......") </script>';                                     
header ("Location: Admin.php");
}
else
{
echo '<script type="text/javascript"> alert("book not updated .......") </script>';
} 
}

 // SQL query to retrieve user data
 $sql = "SELECT * FROM books where id=".$_GET['id'];
 $result = $con->query($sql);

 if ($result->num_rows > 0) {
     echo "<html> <head></head><body>";
    echo " <center><form action='' method='post' enctype='multipart/form-data' >";
    while ($row = mysqli_fetch_object($result)) 
    {
       
       echo "new BookID &nbsp;&nbsp;&nbsp;&nbsp;<input type='num' name='theid' value= $row->id >";      
       echo "<br> new Title <input type='text' name='ffrom' value= $row->Title >";      
       echo "<br>new Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='to' value= $row->Description >";
       echo "<br> new Author <input type='text' name='Afrom' value= $row->Author ><br>"; 
      echo " Category"; 

        $result = mysqli_query($con, "SELECT * FROM Category") 
         or die(mysqli_error($con));
         echo "<select name ='CatID'>";
            while($row = mysqli_fetch_array($result))
             {
              echo "<option value='".$row["id"]."'  >".$row["Description"]. "</option>";
              }                
                   echo "</select>";
                  echo " <p>cover <input type='file' name = 'cover'></p>";
                 echo "  <p>Book <input type='file' name = 'book'></p>";
                 echo "<br><br><input type='submit' name='submit' value='Update'>" ;
                 echo "</form></center></body></html>";

                    
    }

    
    
 } else {
     echo "No books found.";
 }

 // Close the database connection
 $con->close();
 
?> 