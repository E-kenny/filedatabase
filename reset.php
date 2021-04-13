<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Reset</title>
</head>
<body>
<?php

    session_start();
       
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        
        $email =  $_SESSION['email'];
         
        $password =  $_SESSION['password'];
   
        $email =  $_SESSION['email'];
         
        $dataArr = file('database.txt');
               
        global $data; $newArr;
                
        $newArr = array();
                        
                
        foreach ($dataArr as $jsondata) {
                           
                global $data;        
                $data = json_decode($jsondata);
                array_push($newArr,$data);
                
            }
           
            unlink("database.txt");
            
            foreach ($newArr as $key => $value) {
               
                if ($value->email == $email) {
                    $value->password = $_POST['password'];
                    
                }
               
               

                $filepath = fopen("database.txt", "a+");
                fwrite($filepath, json_encode($value)."\n" );
                fclose($filepath);

            }
         
          header("location:login.php");               
                           
        }
    
 ?>
    <h1>zuri Training</h1>
    <hr>
    <h2>Reset password</h2>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password">
        <br>
        <br>
        <input type="submit" name="submit" value="Reset" id="">    
    </form>
    
    <br>
    <a href="login.php">
       
        <input type="submit" name="submit" value="back" id="">    
    </a>

</body>
</html>