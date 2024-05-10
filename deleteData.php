<?php 
include 'E:\xampp\htdocs\assignment\dbConnect.php';
            $getIdForDeletion = $_GET['id'];   
            
            $deleteQuery = "Delete from form where id = {$getIdForDeletion}";
            $deleteResult = mysqli_query($con, $deleteQuery);
            header('location: displayData.php');

?>