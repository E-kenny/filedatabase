<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Register</title>
</head>
<body>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $date = $_POST['date'];

                $eachArray = array('firstname'=>$firstname, 'lastname'=>$lastname, 'password'=>$password, 'email'=>$email, 'date'=>$date);

                file_put_contents("database.txt", json_encode($eachArray)."\n", FILE_APPEND);
                
                header("location:login.php");
                exit;
            }
            
        ?>
    <h1>zuri Training</h1>
    <hr>
    <h2>Register here</h2>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <label for="firstname">firstname</label><br>
        <input type="text" name="firstname" value="" id="name" required>
        
        <br>
        <br>
        <label for="lastname">lastname</label><br>
        <input type="text" name="lastname" value="" id="lastname" required>
        
        <br>
        <br>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" value="" required>
        
        <br>
        <br>
        <label for="date">date</label><br>
        <input type="date" name="date" id="date" required>
        
        <br>
        <br>
        
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required>
        
        <br>
        <br>
        <input type="submit" name="submit" value="Register" id="">

    </form>
        <br>
    <div>Already have an account?
            <a href="login.php">
                 <input type="submit"  value="Login" >    
            </a>    
    </div>

</body>
</html>