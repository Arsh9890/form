<?php

@include 'config.php';

if(isset($_POST['submit'])){

$name= mysqli_real_escape_string($conn, $_POST['name']);
$email= mysqli_real_escape_string($conn, $_POST['email']);
$pass= mysqli_real_escape_string($conn, md5($_POST['password']));
$cpass= mysqli_real_escape_string($conn, md5($_POST['cpassword']));

$select="SELECT * FROM user_form  WHERE name='$name' && password='$pass'";

$result=mysqli_query($conn,$select);

if(mysqli_num_rows($result)>0){

    $error[]= 'User already exists! please sign up...';

} else {

    if ($pass != $cpass){
        $error[]='password does not matched!';
    }
    
    else {
        $insert="INSERT INTO  user_form(name,email,password)VALUES('$name','$email','$pass')";
        mysqli_query($conn,$insert);
        header('location:login_form.php');
    }
}



};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>
    <link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <table>
        <tr>
            <td>
    <div class="form-container">

      <form action="" method="post" enctype="multipart/form-data">
        <h2 class="sign">Sign up </h1>
        
        <div class="input-container"><i class="fa fa-user icon"></i>
        <input  class=" input-field" type="text" name="name" required Placeholder="Your name" class="box"></div>
        <div class="input-container"><i class="fa fa-envelope icon"></i>
        <input  class=" input-field" type="email" name="email" required Placeholder="Your email" class="box"></div>
        <div class="input-container"><i class="fa fa-key icon"></i>
        <input  class=" input-field" type="password" name="password" required Placeholder="Enter password" class="box"></div>
        <div class="input-container"><i class="fa fa-key icon"></i>
        <input  class=" input-field" type="password" name="cpassword" required Placeholder="Repeat password" class="box"></div>
        <div class="input-container">
        <input   type="checkbox" required> I agreed all statement in terms policy</div>
        <div class="input-container">
        <input   type="submit" name ="submit"value="Register " class="form-btn"></td></div>
        <td><img src="logout.jpeg.jpeg"> 
        <p class="member"><a href="login_form.php"><u>I am already member</u></a></p></td>
       
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg" onclick="this.remove">'.$error.'</span>';
            };

        };
        
        ?>
       
    </form>
    </div></tr>
    </table>
</body>
</html>