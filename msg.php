<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Message</title>
</head>
<body>

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
    font-size: 18px;

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

.msg-box {

    height: 35vh;
    width: 80vh;
    border: 1px solid black;
    margin-top: 5vh;
    margin-bottom: 5vh;

    justify-content: center;
    align-self: center;
    align-items: center;
    

}

.heading {
    
    font-size: 20px;
    width: 20vh;
    font-weight: bold;
    margin-left: 2vh;
    float:left;

}

.subheading {
    margin-left: 2vh;
    width: 15vh;
    text-wrap: break-word;
    
}

.imag {
    float: right;
    height: 20vh;
    margin-top: -12vh;
}

.main-header {
    font-size: 25px;
    text-align: center;
    margin-top: 8vh;
}






</style>
    <section>
        <h1 class="main-header">Send a Message</h1>

        <div class="form">
            <form class="form-box" action method="post" >
                    <h4>Message</h4>
                        <input type="text" id="message" name="message" />
                    <h4>Your Name</h4>
                        <input type="text" name="name" id="name" />
                    <h4>Image Link</h4>
                        <input type="text" id="img" name="img" />
                    <input  class="obtn" type="submit" />
                </form>

        </div>


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
                $msg = $_POST['message'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $sql = "INSERT INTO team_msg(by_emp,msg,img) VALUES ('$name','$msg','$img')";
                $result = mysqli_query($conn,$sql);
                if($result.length > 0) {
                    header("Location: http://localhost/cyber/success.php",true,301);
                }
            }
        ?>


        <div>

        <h1 class="main-header">Team Messages</h1>

        <?php




            $hostname = "localhost";
            $username = "root";
            $password = "";
            $db_name = "construct";
            $conn = mysqli_connect($hostname, $username, $password, $db_name);
            if(!$conn) {
                die("Unable to Connect");
            }
            $sql = "SELECT * FROM team_msg";
            $result = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)) {
                echo "<div class='msg-box'>";
                echo "<h3 class='heading'> From: ".$row['by_emp']." </h3>";
                echo "<h3 class='subheading'>".$row['msg']."</h3>";
                echo "<img class='imag' src=".$row['img']." alt='no image attached' />";
                echo "</div>";
            }


        ?>

        </div>


    </section>
    
</body>
</html>