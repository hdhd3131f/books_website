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
    $password = htmlspecialchars($_POST["password"]); // Using MD5 for demonstration purposes
    $pass = password_hash($password,PASSWORD_DEFAULT);
    $email = htmlspecialchars($_POST["email"]);
    $gender = htmlspecialchars($_POST["gender"]);

    // Insert user data into the database
    $sql = "INSERT INTO users (username, password, Email, gender, role, profile) VALUES ('$username', '$pass', '$email', '$gender', 2, 'Images/user.jpg')";

    if ($con->query($sql) === TRUE) {
        echo "<p>Registration successful! Username: $username</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="Css/Rigister.css" />
    <link rel="stylesheet" href="Css/login.css">
  </head>
  <body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="container">
      <h1 class="form-title">Registration</h1>
      <form action="#">
        <div class="main-user-info">

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
      </form>
    </div>
</form>
<div class="sign-up-link">
            <p>have an account ?<a href="login.php">Login</a></p>
        </div>
  </body>
</html>