<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $address=$_POST['address'];
    $date=$_POST['date'];
    $venue=$_POST['venue'];
    $estimate=$_POST['cost'];
    $flower=$_POST['flower'];
    $makeup=$_POST['makeup'];
    $music=$_POST['music'];

    $sql1= "insert into `clients` (cname, address) values ('$name','$address')";
    $sql2= "insert into `wedding` (wdate, venue, budget) values ('$date','$venue','$estimate')";
    $result=mysqli_query($con, $sql1);
    $client_id = mysqli_insert_id($con);

    $result2=mysqli_query($con, $sql2);
    $wedding_id = mysqli_insert_id($con);

    $sql3= "insert into `event_req` (client_id, wedding_id, makeup, flower, music, event_req_status) values 
                                                                                             ('$client_id','$wedding_id',
                                                                                              '$makeup','$flower',
                                                                                              '$music', 'created')";
    $result3 = mysqli_query($con, $sql3);
    if($result){
        header('location:client_req_status.php?client_req_status=created');
    } else {
        die($mysqli_error($con));
    }
}
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>CRUD operations</title>
</head>
<body>

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
    <br><br>
    <form method="POST">
        <div class="mb-3">
            <label>Client Name</label>
            <input type="text" class="form-control" placeholder="Enter the Name" name="name" autocomplete="off">
        </div>
        <div class="mb-3">
            <label>Client Address</label>
            <input type="text" class="form-control" placeholder="Enter the Address" name="address" autocomplete="off">
        </div>
        <div class="mb-3">
            <label>Wedding Date</label>
            <input type="date" id="date" class="form-control" placeholder="Enter the expected wedding date" name="date" autocomplete="off">
        </div>
        <div class="mb-3">
            <label>Wedding Location</label>
            <input type="text" class="form-control" placeholder="Enter the wedding venue" name="venue" autocomplete="off">
        </div>
        <div class="mb-3">
            <label>Projected Cost</label>
            <input type="text" class="form-control" placeholder="Enter the projected cost" name="cost" autocomplete="off">
        </div>
        <div>
            <label>Mention Required Resources</label><br><br>
            <label>Flower Arrangement for Hotel</label><br>
            <label>Flower Arrangement for Church</label><br>
            <label>Flower Arrangement for Poruwa</label><br>
            <label>Bridal Dress / Saree</label><br>
            <label>Bridal Bocquet</label><br>
            <label>Champaign Fountain</label><br>
            <input type="text" class="form-control" placeholder="Enter flower requirements" name="flower" autocomplete="off">
        </div>
        <br>
        <div>
            <label>Select Required Services</label>
            <br><br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="makeup" id="makeup">
                <label class="form-check-label" for="makeup">
                    Makeup Artist
                </label>
            </div>
            <div>
                <label>Mention Required Resources</label><br><br>
                <label>DJ</label><br>
                <label>Band</label><br>
                <label>Both</label><br>
                <input type="text" class="form-control" placeholder="Enter makeup / salon requirements" name="music" autocomplete="off">
            </div>
            <div>
                <input class="form-check-input" type="checkbox" value="photo" id="photo">
                <label class="form-check-label" for="defaultCheck10">
                    Photographer
                </label>
            </div>

        </div>
        <br><br>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

</div>
</body>
</html>