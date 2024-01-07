<?php
session_start(); // Starting Session
$_SESSION['role'];
$id=$_SESSION['id'];
// echo"<script>alert($id)</script>";
if(!isset($_SESSION["login"]))
header("location:login.php");
else if($_SESSION['role']==1){
           header("location:login.php");
       }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Css/Feedback.css"/>
    <link rel="stylesheet" href="Css/books.css"/>
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Form Reviews</title>
	<a href="userindex.php">
  <i class="fa fa-angle-double-left" id="back" style="font-size:36px;"></i>
</a>
<style>#back{left:-300px;top:-250px;position:relative;}</style>
</head>
<body>

	<div class="wrapper">
		<h3>Enter your feedback</h3>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

			<div class="rating">
				<input type="number" name="rating" hidden>
				<i class='bx bx-star star' style="--i: 0;"></i>
				<i class='bx bx-star star' style="--i: 1;"></i>
				<i class='bx bx-star star' style="--i: 2;"></i>
				<i class='bx bx-star star' style="--i: 3;"></i>
				<i class='bx bx-star star' style="--i: 4;"></i>
			</div>
			<textarea name="opinion" cols="30" rows="5" placeholder="Your opinion..."></textarea>
			<div class="btn-group">
				<button type="submit" class="btn submit">Submit</button>
				<button class="btn cancel">Cancel</button>
			</div>
		
	</div>

	
</form>

<script src="Feedback.js"></script>

</body>
</html>

<?php
include("config.php");
if (
    isset($_POST["opinion"]) && !empty($_POST["opinion"]) 
    
) {
    extract($_POST);
    $query = "INSERT INTO `feedback`(`uid`, `feedback`, `id`) VALUES ('$id', '$opinion',Null)";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Failed!" . mysqli_error($con));
    }
    echo " your feedback has been inserted!";
}
?>