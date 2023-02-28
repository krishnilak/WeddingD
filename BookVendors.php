

<?php
include 'connect.php';
if(isset($_GET['event_req_id'])) {
    $id = $_GET['event_req_id'];


    if (isset($_POST['submit'])) {
        $sql = "update `event_req` set event_req_status = 'finalised' where event_id= $id";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $sql1 = "select * from `event_plan` where event_req_id= $id";
            $result1 = mysqli_query($con, $sql1);
            if ($result1) {
                $event_plan_info=mysqli_fetch_assoc($result1);
                $makeup_id = $event_plan_info['makeup_id'];
                $flower_id = $event_plan_info['flower_id'];
                $music_id = $event_plan_info['music_id'];


                $sql_makeup = "update `makeup` set status='Sold' where makeup_id=$makeup_id";
                $sql_flower = "update `flower` set status='Sold' where flower_id=$flower_id";
                $sql_music = "update `music` set status='Sold' where music_id=$music_id";

                $result2 = mysqli_query($con, $sql_makeup);
                if ($result2) {
                    $result3 = mysqli_query($con, $sql_flower);
                    if ($result3) {
                        $result4 = mysqli_query($con, $sql_music);
                        if ($result4) {
                            header('location:plan_events.php');
                        } else {
                            mysqli_error($con);
                        }
                    } else {
                        mysqli_error($con);
                    }
                } else {
                    mysqli_error($con);
                }
            } else {
                mysqli_error($con);
            }
        } else {
            mysqli_error($con);
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
            <div>
            <br><br><br>
                <button type="submit" class="btn btn-primary" name="submit">Book Vendors</button>
            <br><br><br>
            </div>
        </form>
    </div>
</body>
</html>
