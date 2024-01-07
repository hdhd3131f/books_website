<?php
session_start(); // Starting Session
$_SESSION['role'];
if(!isset($_SESSION["login"]))
header("location:login.php");
else
if($_SESSION['role']==2){
   header("location:login.php");
}
?>
<?php
// Database connection settings
include "config.php";

// Define variables to store user input
$username = "";
$password = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirmPassword = htmlspecialchars($_POST["confirmPassword"]);  // Using MD5 for demonstration purposes
    $pass = password_hash($password,PASSWORD_DEFAULT);
    $email = htmlspecialchars($_POST["email"]);
    $gender = htmlspecialchars($_POST["gender"]);

    // Insert user data into the database
    if($password != $confirmPassword){
      echo"<script>alert('Passwords doesnt match');</script>";
    }else{
    $sql = "INSERT INTO users (username, password, Email, gender, role, profile) VALUES ('$username', '$pass', '$email', '$gender', 2, 'Images/user.jpg')";

    if ($con->query($sql) === TRUE) {
        // echo "<p>user added successful! Username: $username</p>";
        // echo '<script type="text/javascript"> alert("user added successful!") </script>';
        echo"<script>alert('user added successful!')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
}
// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Add user Form</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="Css/Rigister.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="jquery-3.1.1.js" type="text/javascript"> </script>           

  </head>
  <body>
    <a href="admin.php">
  <i class="fa fa-angle-double-left" style="font-size:36px"></i>
</a>
<form id="userForm">
    <div class="container">
      <h1 class="form-title">Add user</h1>

        <div class="main-user-info">
          <!-- <div class="user-input-box">
            <label for="fullName">Full Name</label>
            <input type="text"
                    id="fullName"
                    name="fullName"
                    placeholder="Enter Full Name"/>
          </div> -->
          <div class="user-input-box">
            <label for="username">Username</label>
            <input type="text"
                    id="username"
                    name="username"
                    placeholder="Enter Username"
                    required/>
          </div>
          <div class="user-input-box">
            <label for="email">Email</label>
            <input type="email"
                    id="email"
                    name="email"
                    placeholder="Enter Email"
                    required/>
          </div>
          <!-- <div class="user-input-box">
            <label for="phoneNumber">Phone Number</label>
            <input type="text"
                    id="phoneNumber"
                    name="phoneNumber"
                    placeholder="Enter Phone Number"/>
          </div> -->
          <div class="user-input-box">
            <label for="password">Password</label>
            <input type="password"
                    id="password"
                    name="password"
                    placeholder="Enter Password"
                    required/>
          </div>
          <div class="user-input-box">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password"
                    id="confirmPassword"
                    name="confirmPassword"
                    placeholder="Confirm Password"
                    required/>
          </div>
        </div>
        <div class="gender-details-box">
          <span class="gender-title">Gender</span>
          <div class="gender-category">
            <input type="radio" name="gender" id="male">
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female">
            <label for="female">Female</label>

          </div>
        </div>
        <div class="form-submit-btn">
          <input type="submit" value="Register">
        </div>
    </div>
</form>
<a href="ss.php">See users</a>

<script src="script.js"></script>

  </body>
</html>