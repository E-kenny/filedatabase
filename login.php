<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>

<body>
    <?php 
        session_start();
         $errorMessage ='';
        
       
            if( !isset($_SESSION['errorMessage']) ){
                
                $errorMessage ='';
                
        }else{
            $errorMessage = $_SESSION['errorMessage'];
           
            
        }   
        
    ?>
    <h1>zuri Training</h1>
    <hr>
    <h2>Login here</h2>

    <form action="index.php" method="post">
        <h4 class="err"><?php echo $errorMessage ; ?></h4>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" value="" required>
        
        <br>
        <br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required>
        
        <br>
        <br>
        <input type="submit" name="login" value="login" id="">

     </form>
     <br>
     <div>  Don't have an account yet?
            <a href="register.php">
                 <input type="submit"  value="Sign up" >    
            </a>    
     </div>
    
           
</body>
</html>