<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Orders</title>
  </head>
  <style>

        form {
            display: flex;
            justify-content: center;
        }

        .order {
            margin-top: 5vh;
            margin-left: 42vh;
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 50%;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .header {
            font-size: 50px;
            font-family: Consolas;
            margin-top: 10vh;
            text-shadow: 4px 8px 12px #aaa;
        }
        .form-box {
            display: flex;
            flex-direction: column;
            font-size: 20px;

            padding: 40px 40px;
            margin-top: 10vh;
            border: 0.2px groove black; 
            box-shadow: 8px 12px 12px #aaa;

        }
        .form-box input {
            padding: 10px 15px;
            font-size: 20px;

        }
        .obtn {
            margin-top: 25px;
            width: 50%;
            align-self: center;
        }
        .error {
            margin-top: 5vh;
            font-size: 20px;
            color: #eee;
            background-color: #dc143c;
            padding: 10px 15px;
            border-radius: 5px 5px 5px 5px 5px;
            box-shadow: 4px 8px 12px #aaa;
        }


  </style>
  <body>





        <h2 class="header">Place Order</h2>

            <form class="form-box" action method="post" >
                <h4>Material</h4>
                    <input type="text" id="material" name="material" />
                <h4>Quantity</h4>
                    <input type="text" name="quantity" id="quantity" />
                <h4>Address</h4>
                    <input type="text" id="addr" name="addr" />
                <h4>Your name</h4>
                    <input type="text" name="name" id="name" />
                <input  class="obtn" type="submit" />
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
                $material = $_POST['material'];
                $quan = $_POST['quantity'];
                $addr = $_POST['addr'];
                $name = $_POST['name'];
                $sql = "SELECT * from material where mat_name='$material'";
                $result = mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($result)) {
                    $price = $row['price'];
                    $total = $price * $quan;
                    $sql1 = "INSERT INTO orders(by_emp,material,total_amt,address) VALUES ('$name','$material','$total','$addr')";
                    $result = mysqli_query($conn,$sql1);
                    if($result.length > 0) {
                        header("Location: http://localhost/cyber/success.php",true,301);
                    }

                }
            }
    ?>







    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

  </body>
</html>