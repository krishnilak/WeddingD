

<?php
include 'connect.php';
if(isset($_GET['event_req_id'])) {
    $id = $_GET['event_req_id'];

    $sql = "select * from `event_req` where event_id=$id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $client_id = $row['client_id'];
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

    $makeup_query = "SELECT makeup_id, price FROM `makeup`";
    $music_query = "SELECT music_id, price FROM `music`";
    $flower_query = "SELECT flower_id, price FROM `flower`";

    $makeup_query_result = mysqli_query($con, $makeup_query);
    $music_query_result = $con->query($music_query);
    $flower_query_result = $con->query($flower_query);

    if (isset($_POST['client_approve'])) {

        $flower_pkg = $_POST['flower_pkg'];
        $music_pkg = $_POST['music_pkg'];
        $makeup_pkg = $_POST['makeup_pkg'];


        $flower_pkg_id = substr($flower_pkg, 0, 1);
        $music_pkg_id = substr($music_pkg, 0, 1);
        $makeup_pkg_id = substr($makeup_pkg, 0, 1);

        $prev_state_sql = "select * from `event_req` where event_id=$id";
        $event_plan_sql_update = "update `event_plan` set (makeup_id, music_id, flower_id) values ($makeup_pkg_id,
                                                                $music_pkg_id, $flower_pkg_id) where event_req_id=$id";
        $event_plan_sql_insert = "insert into `event_plan` (event_req_id, flower_id, makeup_id, music_id) values ($id,
                                                                                       $flower_pkg_id, $makeup_pkg_id,
                                                                                       $music_pkg_id)";


        $update_event_req_sql = "update `event_req` set event_req_status = 'pending_approval' where event_id=$id";

        $prev_status_sql_result = mysqli_query($con, $prev_state_sql);

        if ($prev_status_sql_result) {
            $prev_status = mysqli_fetch_assoc($prev_status_sql_result)['event_req_status'];
            if ($prev_status = 'created') {
                $result = mysqli_query($con, $event_plan_sql_insert);
            } else{
                $result = mysqli_query($con, $event_plan_sql_update);
            }
            if ($result) {
                $result1 = mysqli_query($con, $update_event_req_sql);
                if ($result1) {
                    header('location:All_Requests.php');
                } else {
                    die($mysqli_error($con));
                }

            } else {
                die($mysqli_error($con));
            }



        }else {
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
                    <label>Wedding Budget : </label>
                    <label><?php echo $budget; ?></label>
                    <br>
                    <br>
                    <label><b>Makeup Requirement : </b></label>
                    <label><?php echo $makeup; ?></label>
                    <br><br>
                    <select name="makeup_pkg">
                        <option>Select Suitable Makeup Package</option>
                        <?php
                        foreach ($makeup_query_result as $option) {
                            ?>
                            echo $option;
                            <option><?php echo $option['makeup_id']; echo " : LKR "; echo $option['price']; ?> </option>
                            <?php
                        }
                        ?>
                    </select>
                    <br>
                    <br>
                    <label><b>Music Requirement : </b></label>
                    <label><?php echo $music; ?></label>
                    <br><br>
                    <select name="music_pkg">
                        <option>Select Suitable Music Package</option>
                        <?php
                        foreach ($music_query_result as $option) {
                            ?>
                            echo $option;
                            <option><?php echo $option['music_id']; echo " : LKR "; echo $option['price']; ?> </option>
                            <?php
                        }
                        ?>
                    </select>
                    <br>
                    <br>
                    <label><b>Flower Requirement : </b></label>
                    <label><?php echo $flower; ?></label>
                    <br><br>
                    <select name="flower_pkg">
                        <option>Select Suitable Flower Package</option>
                        <?php
                        foreach ($flower_query_result as $option) {
                            ?>
                                echo $option;
                            <option><?php echo $option['flower_id']; echo " : LKR "; echo $option['price']; ?> </option>
                            <?php
                        }
                        ?>
                    </select>
                    <br><br><br>

                <button type="submit" class="btn btn-primary" name="client_approve">Send to Client Approval</button>
            </form>
        </div>
    </body>
</html>
