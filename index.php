<!DOCTYPE html>
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<style type="text/css">
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
    .btn {
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
    <h2 class="header">Login</h2>

        <form class="form-box" action method="post" >
            <h2>Username</h2>
                <input type="text" id="email" name="uname" />
            <h2>Password</h2>
                <input type="password" name="password" id="password" />
            <input  class="btn" type="submit" />
        </form>

    <?php
        // Initialize the session
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $db_name = "construct";
        $conn = mysqli_connect($hostname, $username, $password, $db_name);
        if(!$conn) {
            die("Unable to Connect");
        }

        if($_POST) {
            $uname = $_POST['uname'];
            $pass = $_POST['password'];
            //Fix for SQL injection
            // $uname = $mysqli->real_escape_string($_POST['email']);
            // $pass = $mysqli->real_escape_string($_POST['password']);
            
            $sql = "SELECT email from employee WHERE name='$uname' AND password='$pass'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) >= 1) {
                echo "Welcome user";

                // Fix for URL Manipulation Attack
                // setcookie("uname", "$uname");  
                
                header("Location: http://localhost/cyber/dashboard.php?uname=$uname",true,301);
            } else {
                echo "<h2 class='error'>Wrong credentials</h2>";
            }
        }


    ?>

</body>
</html>