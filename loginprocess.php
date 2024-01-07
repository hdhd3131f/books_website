<?php
// session_start() ;
// include("config.php");
// if (isset($_REQUEST['sub']))
// {   $a= $_REQUEST['uname'];
//     $b= $_REQUEST['upassword'];
//   $res = mysqli_query($con , " select * from users where email='$a' or username='$a' and password='$b'");
//   $num = mysqli_num_rows($res);
//   $role = 0;
//   if ($num > 0)
//   { 
//     while($row = mysqli_fetch_array($res)){
//       $role = $row["role"];

//     }
//     if($role == 2){
    
//     header("location:userindex.php") ;
//     }
//     else if($role == 1){
//       header("location:Admin.php") ;
//     }

//    }

//    else	
//    {
//        header("location:login.php?err=1");
       
//    }
   
// }

?>
<?php
session_start() ;
include "config.php";

if (isset($_POST['sub'])) 
{
	if (empty($_POST['uname']) || empty($_POST['upassword']))
  {
		echo '<script type="text/javascript"> alert("NO username or password found") </script>';  	
	}
  else
  {
		$username=$_POST['uname'];
		$password=$_POST['upassword'];
    		
		// To protect MySQL injection for Security purpose
		// $username = stripslashes($username);
		// $password = stripslashes($password);
		
		$sql="select * from users where Email='".$username."'or username='".$username."'";
		$result=mysqli_query($con,$sql);
		$rows=mysqli_num_rows($result);//count the rows
    $row = mysqli_fetch_array($result);
    $role = 0;
    
		if ($rows == 1 && password_verify($password,$row['password'])) 
		{ 

        $role = $row["role"];
        // $_SESSION['users']=$row[0];
        $_SESSION['role']=$role;
        $_SESSION['login']=$username;
        $_SESSION['id']=$row['id'];
        $_SESSION['profile'] = $row['profile'];
        $_SESSION['username']=$row['username'];
  

      if($role == 2){
      
      header("location:userindex.php") ;
      }
      else if($role == 1){
        header("location:Admin.php") ;
      }
  
    }
  
     else	
     {
         header("location:login.php?err=1");
         
     }
     
}

}


  
?>