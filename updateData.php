<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update data</title>
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
    </style>
</head>

<body>

    <div class="container">
        <h2>Update Data</h2>
        <form method='POST'>
        <?php
        include 'E:\xampp\htdocs\assignment\dbConnect.php';

        $ids = $_GET['id'];

        $showquery = "SELECT * FROM form WHERE id ={$ids}";

        $showdata = mysqli_query($con, $showquery);

        $arrData = mysqli_fetch_array($showdata);

        
        if(isset($_POST['submit'])){
            $idUpdate = $_GET['id'];
            $getNameVal = $_POST['name'];
            $getEmailVal = $_POST['email'];
            $getMobNumVal = $_POST['mobile'];
            $getDOBValue = $_POST['dob'];

    
            $updateQuery = "UPDATE form SET id=$idUpdate, name='$getNameVal', email='$getEmailVal', mobile='$getMobNumVal', dob='$getDOBValue' WHERE id=$idUpdate";


            $res = mysqli_query($con, $updateQuery);

            if($res){
                ?>
                <script>
                    console.log("Form Updated Successfully!");
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Error Updating Form!");
                </script>
                <?php
            }


            header("Location: success_two.php");
            exit();
        }

       

        ?>
            <input type="text" name="name" placeholder="Name" value="<?php echo $arrData['name']?>" required>
            <input type="email" name="email" placeholder="Email" value="<?php echo $arrData['email']?>" required>
            <input type="tel" name="mobile" placeholder="Mobile Number" value="<?php echo $arrData['mobile']?>" required>
            <input type="date" name="dob" placeholder="Date-Of-Birth" value="<?php echo $arrData['dob']?>" required>
            <input type="submit" value="Update" name='submit'>
        </form>
    </div>

</body>

</html>