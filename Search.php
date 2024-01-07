<html>
<link rel="stylesheet" href="Css/index.css"/>
    <link rel="stylesheet" href="Css/books.css"/>
    <link rel="stylesheet" href="Css/like.css"/>
    <link rel="stylesheet" href="Css/top.css"/>
    <link rel="stylesheet" href="Css/search.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://kit.fontawesome.com/a54d2cbf95.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class='container'>
<div class='box-container'>
<?php
    if(isset($_POST["search_text"])) {
        $mysqli = new mysqli('localhost', 'root', '', 'project');

        if($mysqli->connect_error) {
            die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        $search_text = $_POST["search_text"];
        $query = "SELECT * FROM books WHERE Title LIKE '%$search_text%'";
        $result = $mysqli->query($query);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // echo "<div style='border:1px solid black;'>";
                // echo "<h3>" . $row["Title"] . "</h3>";
                // echo "</div>";
                echo " <div class='box'>";
                echo "<div class='heart'>❤</div>
                    <script>
                        var animated = false;
                        $('.heart').click(function () {
                            if (!animated) {
                                $(this).addClass('happy').removeClass('broken');
                                animated = true;
                            }
                            else {
                                $(this).removeClass('happy').addClass('broken');
                                animated = false;
                            }
                        }); 
                    </script>";
                    echo "<img src='".$row["Cover"]."' alt='' width='100px'>";
                    echo " <h3>".$row["Title"]."</h3>";
                   echo  "<p>".$row["Description"]."</p>";
                    echo " <a href='".$row["file"]."' class='btn'>Read</a>";
                    echo " <a href='".$row["file"]."' class='btn' Download='".$row["Title"]."'>Download</a>";
                echo "</div>";
             
             
                    }
         echo "</div>";
         
         echo "</div>";
            
        } else {
            echo "No results found.";
        }
    }
?>
</div>
</div>
</html>