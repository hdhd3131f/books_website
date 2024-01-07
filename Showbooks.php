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
            <th>Title</th>
            <th>Descrpition</th>
            <th>Author</th>
            <th>Catid</th>
            <th>cover</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "config.php";
        // Populate HTML table with user data
        $result = mysqli_query($con, "Select * From books ");
        if ($result)
        {
            while ($row = mysqli_fetch_object($result)) 
            {
               echo "<tr > ";
               echo "<td > $row->id </td>";      
               echo "<td> $row->Title </td>"; 
               echo "<td> $row->Description </td>"; 
               echo "<td> $row->Author </td>";
               echo "<td> $row->Catid </td>"; 
               echo "<td align='center'><img src='$row->Cover' alt=''height='100px' ></td>";
               echo "<td><a href='Delete-book.php? id=$row->id' >DELETE </a> </td>"; 
               echo "<td><a href='Update-book.php? id=$row->id' >UPDATE </a> </td>"; 
               echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
<center>


