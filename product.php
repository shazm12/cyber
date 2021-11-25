<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Product</title>
  </head>
  <style type="text/css">
    .prod-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .search-h {
        display: flex;
        margin-top: 10vh;
        margin-bottom: 10vh;
    }
  </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">EStore</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                    </li>

                </ul>
                <form class="d-flex" action method="post">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchitem">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <?php

                    $hostname = "localhost";
                    $username = "root";
                    $password = "";
                    $db_name = "construct";
                    $conn = mysqli_connect($hostname, $username, $password, $db_name);
                    if(!$conn) {
                        die("Unable to Connect");
                    }

                    if($_POST) {
                        $searchitem = $_POST['searchitem'];
                        header("Location: http://localhost/cyber/product.php?prod=$searchitem",true,301);
                    }
                ?>

                </div>
            </div>
        </nav>

    <div class="prod-container">
        <h2 class="search-h">Search Results</h2>
            <?php
                $prod = $_GET['prod'];
                $hostname = "localhost";
                $username = "root";
                $password = "";
                $db_name = "construct";
                $conn = mysqli_connect($hostname, $username, $password, $db_name);
                if(!$conn) {
                    die("Unable to Connect");
                }
                
                $sql = "SELECT * FROM material WHERE mat_name='$prod'";
                $result = mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($result);
                // print_r($row);
                 echo "<div class='card' style='width: 18rem;'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>".$row['id']."</h5>";
                echo "<h6 class='card-subtitle mb-2 text-muted'>".$row['mat_name']."</h6>";
                echo "<h6 class='card-subtitle mb-2 text-muted'>".$row['price']."</h6>";
                echo "<h6 class='card-subtitle mb-2 text-muted'>".$row['type']."</h6>";
                echo"</div>";
                echo"</div>";



            ?>

    </div>












    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>