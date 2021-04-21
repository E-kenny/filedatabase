<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Zuri Task</title>
</head>
<body>
    <?php 
        session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_SESSION['email'])){
               
        if($_POST){
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = md5($_POST['password']);
               
        }

        $email =  $_SESSION['email'];
         
        $password =  $_SESSION['password'];

       
        $filePath = fopen("database.txt", "r");
        
        $seq = json_decode(fgets($filePath));

        $err = true;
        
        
        while(! feof($filePath)){

                $databaseemail = $seq->email;
                $databasePassword = $seq->password;
           
                $seq = json_decode(fgets($filePath));            
                 
                if( $databasePassword == $password && $databaseemail == $email ){
                    
                echo  "<h1>zuri Training</h1>
                <hr>
                <h2>Dashboard</h2>
                <a href=\"reset.php\">
                    <input type=\"submit\"  value=\"Reset\" >    
                </a>
                
                <a href=\"logout.php\">
                     <input type=\"submit\"  value=\"logout\" >    
                </a>

                <p>Your email is: <strong>$email</strong></p>
                <p>Your password is: <strong>$password</strong><p>
            </body>
            </html>";
                    
                 global  $err;
                 $err = false;
                 $_SESSION['errorMessage'] = '';

                 break;
            };

        };
        
        fclose($filePath);
        
        if($err){
        
                    $_SESSION['errorMessage'] = 'Wrong password or email';

                
                    header("location:login.php");
                    exit;
                }
        
    }else{
       
        header("location:login.php");

    }
   
        
    ?>

    