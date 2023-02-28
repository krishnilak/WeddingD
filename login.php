<?php
include 'connect.php';
?>

<?php
if(isset($_POST['submit'])){
    $uname=$_POST['username'];
    $password=$_POST['password'];

    if(($uname == 'sm') && ($password == 'sm')){
        header('location:plan_events.php');
    }else if(($uname == 'consultant') && ($password == 'consultant')){
        header('location:All_requests.php');
    }else {
        $client_id = $uname;
        $check_client_exist_sql = "select * from `event_req` where client_id=$client_id";
        $check_client_exist_result = mysqli_query($con, $check_client_exist_sql);
        $check_client_exist=mysqli_fetch_assoc($check_client_exist_result);
        $client_req_status = $check_client_exist['event_req_status'];
        echo $client_req_status;
        if($client_req_status == 'pending_approval'){
            header('location:client_approval.php?client_id='.$uname.'&client_req_status='.$client_req_status.'');
        }else if((($client_req_status == 'processing') || ($client_req_status == 'finalized')) ||
            (($client_req_status == 'created') || ($client_req_status == 'altered'))){
            header('location:client_req_status.php?client_req_status='.$client_req_status.'');
        }else{
            header('location:client_req.php');
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
    <title>Login</title>
</head>
<body>
<div class="container my-5">
    <form method="POST">
        <div class="mb-3">
            <label>User Name</label>
            <input type="text" class="form-control" placeholder="Enter the Username" name="username" autocomplete="off">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Enter the Password" name="password" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

</div>
</body>
</html>