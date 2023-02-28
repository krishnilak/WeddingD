

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
                    <a class="nav-link" href="#">Home </a>
                </li>
                <li>
                    <div class="input-group mb-3">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a href="login.php"> Login</a></button>
                    </div>
                </li>
             </ul>

        </div>


    </nav>
    <div>
        <img src="images/bg.png" class="img-fluid" alt="...">
    </div>
    <br><br>
    <div>
        <img src="images/Wedding.jpeg" class="img-fluid" alt="...">
    </div>
    <div class="row row-cols-1 row-cols-md-3 container my-5">
        <div class="col mb-4">
            <div class="card h-100">
                <img src="images/makeup.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="makeup.php">
                        <h5 class="card-title">Makeup Artists</h5></a>
                    <p class="card-text">Enhance your looks with our professional makeup artists on your big day.</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="images/dj.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="dj.php">
                        <h5 class="card-title">Music Band / DJ</h5></a>
                    <p class="card-text">Make your event happening with the best entertainment services</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="images/flower.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="flower.php">
                        <h5 class="card-title">Flower Arrangements</h5></a>
                </div>
            </div>
        </div>
    </div>

    <div>
        <img src="images/lp-wedding-venue.jpeg" width="1200px" class="rounded float-left" alt="...">
    </div>
</div>
</body>
</html>