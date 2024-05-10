<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/809556e1a2.js" crossorigin="anonymous"></script> 
    <title>view data</title>
    <style>
        table{
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 10px 20px 0 rgba(0,0,0,0.3);
            border-radius:10px;
            margin:auto;
        }

        th,td{
            border: 1px solid #f2f2f2;
            padding: 8px 30px;
            text-align: center;
            color:grey;
        }

        th{
            text-transform: uppercase;
            font-weight:500;
        }

        td{
            font-size:13px;
        }
        .fa{
            font-size:18px;
        }

        .fa-edit{
            color:#63c76a;
        }

        .fa-trash{
            color:#ff0000;
        }
        a{
            text-decoration:none;
        }

        .no_records{
            font-size:17px;
        }

        .home_page{
            color:grey;
            font-size:16px;
            text-align:center;
        }

        #list_of_data{
            text-align:center;
            font-size:20px;
        }

        @media screen and (max-width:768px){
            #list_of_data{
                text-align:center;
                font-size:18px;
            }
        }
 
    </style>
</head>
<body>
    <div class="main-div">
        <h1 id="list_of_data">List of Data</h1>

        <div class="center-div">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Date Of Birth</th>
                            <th colspan="2">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include 'E:\xampp\htdocs\assignment\dbConnect.php';

                        $selectQuery = "SELECT * FROM form";

                        $query = mysqli_query($con, $selectQuery);

                        $nums = mysqli_num_rows($query);

                        if($nums == 0) {
                            echo "<tr><td class='no_records' colspan='6'>No records present</td></tr>";
                        } else {
                            while($res = mysqli_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $res['id']?></td>
                            <td><?php echo $res['name']?></td>
                            <td><?php echo $res['email']?></td>
                            <td><?php echo $res['mobile']?></td>
                            <td><?php echo date('d-M-Y', strtotime($res['dob'])) ?></td>
                            <td><a href="updateData.php?id=<?php echo $res['id'];?>" data-toggle="tooltip" data-placement="bottom" title="UPDATE"><i class="fa fa-edit" aria-hidden="true" style="cursor:pointer"></i></a></td>
                            <td><a href="deleteData.php?id=<?php echo $res['id'];?>" data-toggle="tooltip" data-placement="bottom" title="DELETE"><i class="fa fa-trash" aria-hidden="true" style="cursor:pointer"></i></a></td>
                        </tr>
                    <?php
                            }
                        }
                        echo "<tr><td colspan='7'><a href='http://localhost/assignment/index.php' class='home_page'>Back to Home Page</a></td></tr>";
                    ?>

                    
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>

