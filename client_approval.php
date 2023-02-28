

<?php
include 'connect.php';
if(isset($_GET['client_id'])) {
    $id = $_GET['client_id'];
    $event_status = $_GET['client_req_status'];

    echo "A";

    $sql = "select * from `event_req` where client_id=$id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $event_req_id = $row['event_id'];

    $wedding_id = $row['wedding_id'];
    $makeup = $row['makeup'];
    $music = $row['music'];
    $flower = $row['flower'];

    $client_info_sql = "select * from `clients` where client_id=$id";
    $wedding_info_sql = "select * from `wedding` where wedding_id = $wedding_id";

    $client_info_result = mysqli_query($con, $client_info_sql);
    $client_info = mysqli_fetch_assoc($client_info_result);
    $client_name = $client_info['cname'];
    $client_address = $client_info['address'];

    $wedding_info_result = mysqli_query($con, $wedding_info_sql);
    $wedding_info = mysqli_fetch_assoc($wedding_info_result);
    $venue = $wedding_info['venue'];
    $date = $wedding_info['wdate'];
    $budget = $wedding_info['budget'];
echo "C";
echo $event_req_id;
    $event_plan_sql = "select * from `event_plan` where event_req_id=$event_req_id";
    $event_plan_sql_result = mysqli_query($con, $event_plan_sql);
    $event_plan_info = mysqli_fetch_assoc($event_plan_sql_result);
    $makeup_pkg_id = $event_plan_info['makeup_id'];
    $flower_pkg_id = $event_plan_info['flower_id'];
    $music_pkg_id = $event_plan_info['music_id'];

    $makeup_query = "SELECT * FROM makeup where makeup_id=$makeup_pkg_id";
    $music_query = "SELECT * FROM music where music_id=$music_pkg_id";
    $flower_query = "SELECT * FROM flower where flower_id=$flower_pkg_id";


    $makeup_query_result = mysqli_query($con, $makeup_query);
    $makeup_pkg_info = mysqli_fetch_assoc($makeup_query_result);
    $makeup_pkg_name = $makeup_pkg_info['name'];
    $makeup_pkg_mobile = $makeup_pkg_info['mobile'];
    $makeup_pkg_email = $makeup_pkg_info['email'];
    $makeup_pkg_address = $makeup_pkg_info['address'];
    $makeup_pkg_price = $makeup_pkg_info['price'];
    $makeup_pkg_includes = $makeup_pkg_info['includes'];

    $music_query_result = mysqli_query($con, $music_query);

    $music_pkg_info = mysqli_fetch_assoc($music_query_result);
    $music_pkg_name = $music_pkg_info['name'];
    $music_pkg_mobile = $music_pkg_info['mobile'];
    $music_pkg_email = $music_pkg_info['email'];
    $music_pkg_address = $music_pkg_info['address'];
    $music_pkg_price = $music_pkg_info['price'];
    $music_pkg_includes = $music_pkg_info['includes'];

    $flower_query_result = mysqli_query($con, $flower_query);

    $flower_pkg_info = mysqli_fetch_assoc($flower_query_result);
    $flower_pkg_name = $flower_pkg_info['name'];
    $flower_pkg_mobile = $flower_pkg_info['mobile'];
    $flower_pkg_email = $flower_pkg_info['email'];
    $flower_pkg_address = $flower_pkg_info['address'];
    $flower_pkg_price = $flower_pkg_info['price'];
    $flower_pkg_includes = $flower_pkg_info['includes'];


    $actual_price = $makeup_pkg_price + $music_pkg_price + $flower_pkg_price;

    if (isset($_POST['client_approve'])) {
        $update_event_req_sql = "update `event_req` set event_req_status = 'approved' where event_id=$event_req_id";
        $result = mysqli_query($con, $update_event_req_sql);
        if ($result) {
            header('location:client_req_status.php?client_req_status=approved');

        } else {
            die($mysqli_error($con));
        }
    }

    if (isset($_POST['client_decline'])) {
        $update_event_req_sql = "update `event_req` set event_req_status = 'altered' where event_id=$event_req_id";
        $result = mysqli_query($con, $update_event_req_sql);
        if ($result) {
            header('location:client_req_status.php?client_req_status=altered');
        } else {
            die($mysqli_error($con));
        }
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
    <div>
        <form method="POST">
            <div class="mb-3">
                <br><br>
                <label><b>Client Details</b></label>
                <br><br>
                <label>Client Name : </label>
                <label><?php echo $client_name; ?></label>
                <br>
                <label>Client Address : </label>
                <label><?php echo $client_address; ?></label>
                <br>
                <br>
                <label><b>Wedding Details</b></label>
                <br><br>
                <label>Wedding Date : </label>
                <label><?php echo $date; ?></label>
                <br>
                <label>Wedding Venue : </label>
                <label><?php echo $venue; ?></label>
                <br>

                <br>
                <label><b>Makeup Requirement : </b></label>
                <label><?php echo $makeup; ?></label>
                <br><br>
                <br>
                <label><b>Selected Makeup Package </b></label>
                <br>
                <label><b>Makeup Package ID : </b></label>
                <label><?php echo $makeup_pkg_id; ?></label>
                <br>
                <label><b>Makeup Package Name : </b></label>
                <label><?php echo $makeup_pkg_name; ?></label>
                <br>
                <label><b>Makeup Package Mobile : </b></label>
                <label><?php echo $makeup_pkg_mobile; ?></label>
                <br>
                <label><b>Makeup Package Email : </b></label>
                <label><?php echo $makeup_pkg_email; ?></label>
                <br>
                <label><b>Makeup Package Address : </b></label>
                <label><?php echo $makeup_pkg_address; ?></label>
                <br>
                <label><b>Makeup Package Price : </b></label>
                <label><?php echo $makeup_pkg_price; ?></label>
                <br>
                <label><b>Makeup Package Includes : </b></label>
                <label><?php echo $makeup_pkg_includes; ?></label>
                <br>
                <br>
                <label><b>Music Requirement : </b></label>
                <label><?php echo $music; ?></label>
                <br><br>

                <br>
                <label><b>Makeup Requirement : </b></label>
                <label><?php echo $makeup; ?></label>
                <br><br>
                <label><b>Selected Makeup Package </b></label>
                <br>
                <label><b>Makeup Package ID : </b></label>
                <label><?php echo $makeup_pkg_id; ?></label>
                <br>
                <label><b>Makeup Package Name : </b></label>
                <label><?php echo $makeup_pkg_name; ?></label>
                <br>
                <label><b>Makeup Package Mobile : </b></label>
                <label><?php echo $makeup_pkg_mobile; ?></label>
                <br>
                <label><b>Makeup Package Email : </b></label>
                <label><?php echo $makeup_pkg_email; ?></label>
                <br>
                <label><b>Makeup Package Address : </b></label>
                <label><?php echo $makeup_pkg_address; ?></label>
                <br>
                <label><b>Makeup Package Price : </b></label>
                <label><?php echo $makeup_pkg_price; ?></label>
                <br>
                <label><b>Makeup Package Includes : </b></label>
                <label><?php echo $makeup_pkg_includes; ?></label>
                <br>
                <br>
                <br>
                <label><b>Music Requirement : </b></label>
                <label><?php echo $music; ?></label>
                <br><br>
                <br>
                <label><b>Selected Music Package </b></label>
                <br>
                <label><b>Music Package ID : </b></label>
                <label><?php echo $music_pkg_id; ?></label>
                <br>
                <label><b>Music Package Name : </b></label>
                <label><?php echo $music_pkg_name; ?></label>
                <br>
                <label><b>Music Package Mobile : </b></label>
                <label><?php echo $music_pkg_mobile; ?></label>
                <br>
                <label><b>Music Package Email : </b></label>
                <label><?php echo $music_pkg_email; ?></label>
                <br>
                <label><b>Music Package Address : </b></label>
                <label><?php echo $music_pkg_address; ?></label>
                <br>
                <label><b>Music Package Price : </b></label>
                <label><?php echo $music_pkg_price; ?></label>
                <br>
                <label><b>Music Package Includes : </b></label>
                <label><?php echo $music_pkg_includes; ?></label>
                <br>
                <br>
                <br>
                <label><b>Flower Requirement : </b></label>
                <label><?php echo $flower; ?></label>
                <br><br>
                <label><b>Selected Flower Package </b></label>
                <br>
                <label><b>Flower Package ID : </b></label>
                <label><?php echo $flower_pkg_id; ?></label>
                <br>
                <label><b>Flower Package Name : </b></label>
                <label><?php echo $flower_pkg_name; ?></label>
                <br>
                <label><b>Flower Package Mobile : </b></label>
                <label><?php echo $flower_pkg_mobile; ?></label>
                <br>
                <label><b>Flower Package Email : </b></label>
                <label><?php echo $flower_pkg_email; ?></label>
                <br>
                <label><b>Flower Package Address : </b></label>
                <label><?php echo $flower_pkg_address; ?></label>
                <br>
                <label><b>Flower Package Price : </b></label>
                <label><?php echo $flower_pkg_price; ?></label>
                <br>
                <label><b>Flower Package Includes : </b></label>
                <label><?php echo $flower_pkg_includes; ?></label>
                <br><br><br>
                <br>
                <label>Wedding Budget : </label>
                <label><?php echo $budget; ?></label>
                <br>
                <br>
                <label>Actual Cost : </label>
                <label><?php echo $actual_price; ?></label>
                <br>
<br><br>
                <button type="submit" class="btn btn-primary" name="client_approve">Approve</button>
                <button type="submit" class="btn btn-danger" name="client_decline">Decline</button>

        </form>
    </div>
</body>
</html>
