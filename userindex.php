<?php
session_start(); // Starting Session
$_SESSION['role'];
$uuid=$_SESSION["id"];
if(!isset($_SESSION["login"]))
header("location:login.php");
else
echo " <center><H1> welcome " . $_SESSION["username"]. "</H1></center>";

       if($_SESSION['role']==1){
           header("location:login.php");
       }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="Css/index.css"/>
    <link rel="stylesheet" href="Css/books.css"/>
    <link rel="stylesheet" href="Css/like.css"/>
    <link rel="stylesheet" href="Css/top.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://kit.fontawesome.com/a54d2cbf95.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
 


</head>
<body>
<?php
include "config.php";
echo "<nav>";

        // Populate HTML table with user data
        $result = mysqli_query($con, "Select * From users");
        $rows=mysqli_num_rows($result);
        $row = mysqli_fetch_object($result);
        if ($rows>0)
        {

           echo " <a href='profile.php? id=$row->id' class='logo'>";
            // echo "<img src='Images/user_icon.jpg'/>";
            echo "
            
            <p class='pimg'><img src='$row->profile'/></p>
    ";
           echo " </a>";
         
            
           echo " <ul class='menu'>
                <li><a href='#' class='active'>books</a></li>
                <li><a href='Feedback.php'>add feedback</a></li>
                <li><a href='Likedindex.php'>liked book</a></li>
                <li><a href='logout.php' class='active2'>logout</a></li>
            </ul>
        </nav>";
    }

        ?>
      
<div class='container'>

    <!-- <h1 class='heading'>our services</h1> -->
     <h1 class='heading'><input type="text" id="search_text" placeholder="Search" />
    <div id="result"></div>

<script>
    $(document).ready(function(){
        $('#search_text').keyup(function(){
            var search_text = $(this).val();
            if(search_text != '') {
                $.ajax({
                    url:"search.php",
                    method:"POST",
                    data:{search_text:search_text},
                    success:function(data) {
                        $('#result').html(data);
                    }
                });
            } else {
                $('#result').html('');
            }
        });
    });
</script>
</h1>

    <div class='box-container'>
        
   <?php 

$result = mysqli_query($con, "Select * From books ");
if ($result)
{
    while ($row = mysqli_fetch_object($result)) 
    {
        $sql="SELECT * FROM `liked_books` WHERE booksID= '$row->id' AND Uid='$uuid'";
        $res=mysqli_query($con,$sql);
        $num=mysqli_num_rows($res);
        if($num>0){
            $q="<i class='fa fa-heart' style='font-size:48px;color:red'></i>";
        }else{$q="<i class='fa fa-heart' style='font-size:48px;color:black'></i>";}
      echo " <div class='box'>";
     echo " <a href='Liked.php? id=$row->id''><i class='material-icons' style='font-size:36px'>$q</i></a>";
    //    echo "<div class='heart'>❤</div>
    //        <script>
    //            var animated = false;
    //            $('.heart').click(function () {
    //                if (!animated) {
    //                    $(this).addClass('happy').removeClass('broken');
    //                    animated = true;
    //                }
    //                else {
    //                    $(this).removeClass('happy').addClass('broken');
    //                    animated = false;
    //                }
    //            }); 
    //        </script>";
           echo "<img src='$row->Cover' alt='' width='100px'>";
           echo " <h3>$row->Title</h3>";
          echo  "<p>$row->Description</p>";
           echo " <a href='$row->file' class='btn'>Read</a>";
           echo " <a href='$row->file' class='btn' Download='$row->Title'>Download</a>";
       echo "</div>";
    }
}

echo "</div>";

echo "</div>";
?>
<a href="#" class="to-top">
    ^
    <i class="fas fa-chevron-up"></i>
  </a>

  <script src="main.js"></script>
        <!-- <div class="box">
            <img src="Images/icon-2.png" alt="">
            <h3>CSS 3</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div>

        <div class="box">
            <img src="Images/icon-3.png" alt="">
            <h3>JavaScript</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div>

        <div class="box">
            <img src="Images/icon-4.png" alt="">
            <h3>SASS</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div>

        <div class="box">
            <img src="Images/icon-5.png" alt="">
            <h3>JQuery</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div>

        <div class="box">
            <img src="Images/icon-6.png" alt="">
            <h3>React.js</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div>

        <div class="box">
            <img src="Images/icon-1.png" alt="">
            <h3>HTML 5</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div>

        <div class="box">
            <img src="Images/icon-2.png" alt="">
            <h3>CSS 3</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div>

        <div class="box">
            <img src="Images/icon-3.png" alt="">
            <h3>JavaScript</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div>

        <div class="box">
            <img src="Images/icon-4.png" alt="">
            <h3>SASS</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div>

        <div class="box">
            <img src="Images/icon-5.png" alt="">
            <h3>JQuery</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div>

        <div class="box">
            <img src="Images/icon-6.png" alt="">
            <h3>React.js</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div>

        <div class="box">
            <img src="Images/icon-1.png" alt="">
            <h3>HTML 5</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div>

        <div class="box">
            <img src="Images/icon-2.png" alt="">
            <h3>CSS 3</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div>

        <div class="box">
            <img src="Images/icon-3.png" alt="">
            <h3>JavaScript</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div>

        <div class="box">
            <img src="Images/icon-4.png" alt="">
            <h3>SASS</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div>

        <div class="box">
            <img src="Images/icon-5.png" alt="">
            <h3>JQuery</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div>

        <div class="box">
            <img src="Images/icon-6.png" alt="">
            <h3>React.js</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="#" class="btn">Read</a>
            <a href="#" class="btn">Download</a>
            <a href="#" class="btn">Add</a>
        </div> -->

    </div>

</div>

</body>
</html>