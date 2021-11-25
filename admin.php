
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Dashboard</title>
  </head>
  <style>
      .main {
          margin-top: 10vh;
          display: flex;
          justify-content: center;
          flex-direction: column;
          align-items: center;
      }
      .mainh {
          font-size: 40px;
          margin-bottom: 10vh;

      }
      .heading {
          display: flex;
          justify-content: center;
          align-items: center;
          margin-top: 5vh;
      }
      .subheading {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 5vh;
        font-size: 18px;

      }

      .order {
          margin-left: 92vh;
          margin-top: 5vh;

      }
  </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Construct</a>
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
                <li>
                <a class="nav-link" href="http://localhost/cyber/orders.php">Place order</a>
                </li>
                <li>
                <a class="nav-link" href="http://localhost/cyber/msg.php">Team Messages</a>
                </li>
                <li>
                <a class="nav-link" href="http://localhost/cyber/people.php">Employee List</a>
                </li>
                <li class="nav-item">
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
                // if(!$conn) {
                //     die("Unable to Connect");
                // }

                if($_POST) {
                    $searchitem = $_POST['searchitem'];
                    header("Location: http://localhost/cyber/product.php?prod=$searchitem",true,301);
                }
            ?>

            </div>
        </div>
        </nav>

        <?php



            $uname = $_GET['uname'];

            //Fix for URL Manipulation Attack
            // $uname = $_COOKIE["uname"]);
            
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $db_name = "construct";
            $conn = mysqli_connect($hostname, $username, $password, $db_name);
            if(!$conn) {
                die("Unable to Connect");
            }
            echo "<h1 class='heading'> Welcome $uname </h1>";
            $sql = "SELECT * FROM employee WHERE name='$uname'";
            $result = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)) {

                echo "<h2 class='subheading'> Role: ".$row['role']."</h1>";
                echo "<h1 class='subheading'> ID: ".$row['id']."</h1>";
            }


        ?>




        <div class="main">
        <h1 class="mainh"> Materials Available</h1>




        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            </tr>
        </thead>
        <tbody>
       





            <?php
                $hostname = "localhost";
                $username = "root";
                $password = "";
                $db_name = "construct";
                $conn = mysqli_connect($hostname, $username, $password, $db_name);
                if(!$conn) {
                    die("Unable to Connect");
                }

                $sql = "SELECT * FROM material";
                $result = mysqli_query($conn,$sql);

                while($row=mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<th scope='row'>".$row['id']."</th>";
                    echo "<td>".$row['mat_name']."</td>";
                    echo "<td>".$row['price']."</td>";
                    echo "<td>".$row['type']."</td>";
                    echo "</tr>";

                }
            ?>



        </tbody>
        </table>



    </div>

  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

  </body>
</html>




















    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>