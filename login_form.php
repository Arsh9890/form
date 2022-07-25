<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

$name= mysqli_real_escape_string($conn, $_POST['name']);

$pass= mysqli_real_escape_string($conn,md5($_POST['password']));


$select="SELECT * FROM user_form  WHERE name='$name' && password='$pass'";

$result=mysqli_query($conn,$select);


if(mysqli_num_rows($result) > 0){
    $row=mysqli_fetch_assoc($result);

    $_SESSION['user_id']=$row['id'];
    header('location:admin_page.php');
}else{
    $error[]='Incorrect name or  password!';
}

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>


    <link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body><table>  
    <tr>
        <td>
    <div class="form-container">
        
            
     
        <img src="login.jpeg.jpeg " class="log">
       <div> <p class="link"><a href="register_form.php"><u>create an account </u></a></p></div></td>
      <td>
      <form action="" method="post">
        
        <h1 class="signb">Sign In </h1>

        <div class="input-container1">
        
        <input  class="input-field" type="text" name="name" required Placeholder="Your name" ><i class="fa fa-user icon"></i></div>
        
        <div class="input-container1"><input class="input-field" type="password" name="password" required Placeholder="Enter password">  <i class="fa fa-key fa-lg"></i></div>
        
        <div class="input-container1"><input   type="checkbox" checked="checked"  name="remember"> Remember me</div>
            
    
        <div class="input-container1"><input type="submit" name ="submit"value="Login " class="form-btn">
       


    </form>
    </td></tr></table>
    </div></td></tr></table>
        <?php
        if (isset($error)){
           
            foreach($error as $error){
                echo '<span class="error-msg1" onclick="this.remove">'.$error.'</span>';
            };

        }
        ?>

    
    

    </form></td></tr></table>
    </div>
</body>
</html>