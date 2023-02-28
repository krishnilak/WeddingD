

<?php
include 'connect.php';
if(isset($_GET['client_req_status'])) {
    $estatus = $_GET['client_req_status'];
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
                <br>
                <br>
                <label>Event request status : </label>
                <label><?php echo $estatus; ?></label>
                <br>
                <br>
            </div>
        </form>
    </div>
</div>
</body>
</html>