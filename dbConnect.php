<?php
$username = "root";
$password = ""; 
$server = 'localhost';
$db = 'crud'; 


$con = mysqli_connect($server, $username, $password, $db);

if($con){
    ?>
    <script>
        alert("Successfully Connected to Database");
    </script>
    <?php 
}else{
    die("Error connecting to Database." . mysqli_connect_error()); 
}

?>