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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <a href="admin.php">
  <i class="fa fa-angle-double-left" style="font-size:36px"></i>
</a>
<center>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Delete or Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "config.php";
        // Populate HTML table with user data
        // $result = mysqli_query($con, "Select * From users ");
        // $users = array();

        $sql = "SELECT * FROM users";
        $result = $con->query($sql);
        
        $users = array();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
foreach ($users as $user) {
    echo "<tr>";
    echo "<td>{$user['id']}</td>";
    echo "<td>{$user['username']}</td>";
    echo "<td>{$user['Email']}</td>";
    echo"<td><button class='delete-btn' data-id='{$user['id']}'>Delete</button><button class='update-btn' data-id='{$user['id']}'>Edit</button></td>";             
    echo "</tr>";
}
        // if ($result)
        // {
        //     while ($row = mysqli_fetch_object($result)) 
        //     {
        //        echo "<tr > ";
        //        echo "<td > $row->id </td>";      
        //        echo "<td> $row->username </td>"; 
        //        echo "<td> $row->Email </td>";  
        //     //    echo " <td><button class='delete-btn' data-id='{$row->id}'>Delete</button></td>";
        //        echo "<td><a href='Delete-user.php? id=$row->id' >DELETE </a> </td>"; 
        //        echo "<td><a href='Update-user.php? id=$row->id' >UPDATE </a> </td>"; 
        //        echo "</tr>";
        //     }
        // }
        ?>
    </tbody>
</table>
<center>


