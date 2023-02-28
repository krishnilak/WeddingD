<?php
include 'connect.php';
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>CRUD operations</title>
</head>
<body>
<div class="container">

    <div class="container my-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="images/DD.png" width="80" height="90" alt="">
            </a>
            <a class="navbar-brand" href="#">DreamD Wedding Planning</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="main.php">Home </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div>
            <img src="images/bg.png" class="img-fluid" alt="...">
        </div>
    </div>
    <table class="table table-striped my-5">
        <thead>
        <tr>
            <th scope="col">Event Request ID</th>
            <th scope="col">Client Name</th>
            <th scope="col">Date</th>
            <th scope="col">Venue</th>
            <th scope="col">Budget</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $con= new mysqli('localhost','root','', 'weddingd');
        if(!$con)
            die(mysqli_error($con));


        $sql = "select * from event_req where event_req_status='approved'";
        $result = mysqli_query($con, $sql);

        if($result){
            while($row=mysqli_fetch_assoc($result)){


                $id=$row['event_id'];
                $client_id=$row['client_id'];
                $wedding_id = $row['wedding_id'];

                $client_info_sql = "select * from `clients` where client_id=$id";
                $wedding_info_sql = "select * from `wedding` where wedding_id = $wedding_id";

                $client_info_result=mysqli_query($con,$client_info_sql);
                $client_info=mysqli_fetch_assoc($client_info_result);

                $client_name=$client_info['cname'];

                $wedding_info_result=mysqli_query($con, $wedding_info_sql);
                $wedding_info=mysqli_fetch_assoc($wedding_info_result);
                $venue=$wedding_info['venue'];
                $date=$wedding_info['wdate'];
                $budget=$wedding_info['budget'];

                echo '
                    <tr>
                        <th scope="row">'.$id.'</th>
                        <td>'.$client_name.'</td>
                        <td>'.$date.'</td>
                        <td>'.$venue.'</td>
                        <td>'.$budget.'</td>
                        <td>
                        <button class ="btn btn-primary"><a class="text-light" href="BookVendors.php?event_req_id='.$id.'""> Book Vendors </a></button>
                        </td>
                    </tr
            ';

            }
        }

        ?>
        </tbody>
    </table>
</div>

</body>
</html>
