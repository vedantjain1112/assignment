<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .container {
                margin: 20px;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .container {
            animation: slideIn 0.5s ease forwards;
        }

        input[type="date"]::before {
            content: attr(placeholder);
            color: #999;
        }

        input[type="date"]:focus::before,
        input[type="date"]:valid::before {
            display: none;
        }

        .btn_tag {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            box-sizing: border-box;
        }

        .btn_tag:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>User Registration Form</h2>
        <form method='POST'>
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="mobile" placeholder="Mobile Number" required>
            <input type="date" name="dob" placeholder="Date-Of-Birth" required>
            <input type="submit" value="Submit" name='submit'>
        </form>
        <a href="displayData.php" class="btn_tag">View and Edit Data</a>
    </div>

</body>

</html>

<?php 
include 'E:\xampp\htdocs\assignment\dbConnect.php';

if(isset($_POST['submit'])){
    $getNameVal = $_POST['name'];
    $getEmailVal = $_POST['email'];
    $getMobVal = $_POST['mobile'];
    $getDOBVal = $_POST['dob'];

    $addQuery = "INSERT INTO form(name, email, mobile, dob) VALUES ('$getNameVal', '$getEmailVal', '$getMobVal', '$getDOBVal')";

    $res = mysqli_query($con, $addQuery);

    if($res){
        ?>
        <script>alert('Data Submitted Successfully');</script>
        
        <?php
    }else{
        ?>
        <script>
            alert("Error Submitting Form!");
        </script>
        <?php
    }

    
    exit();
}
?>