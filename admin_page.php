<?php

include 'config.php';
session_start();
$user_id=$_SESSION['user_id'];

if(!isset($user_id)){

    header('location: login_form.php');
};

if (isset($_GET['logout'])){
  unset($user_id);
  session_destroy();
  header('location:login.php');
}


  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
     
    <script>

      body{
        background-color:
      }

      </script>
    <!-- <script> 
    * {
    box-sizing: border-box;
  }

  input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

  </script> -->
</head>
<body class="bd">

    <div class="container">
    <div class="content">
      <?php
        $select=mysqli_query($conn,"SELECT * FROM `user_form` WHERE Id='$user_id'")or die('query failed');
        
        if(mysqli_num_rows($select)>0){
          $fetch=mysqli_fetch_assoc($select);
        }


      ?>

<div class="dropdown">
  <button class="dropbtn">welcome <?php echo $fetch['name'];?></button>
  <div class="dropdown-content">
    
    <a  href="login_form.php?logout=<?php echo $user_id; ?>">logout</a>
  </div>
</div>
    <h1 class="form"> <?php echo $fetch['name'];?></h1>
    <hr>
    
    <p><b> Profile Info</b></p><hr>
    <form class="row g-3">
  <div class="col-md-6">
   <div> <label for="inputname1" class="form-label"> first Name</label></div>
    <div><input type="text" class="form-control1" id="inputname4" ></div>
  </div>
    

  
  <div class="col-md-6">
    <div><label for="inputname1" class="form-label"> Last Name</label></div>
    <div><input type="text" class="form-control1" id="inputEmail4"></div>
  </div>


  <div class="col-md-6">
   <div> <label for="" class="form-label">Gender</label></div>
   <div> <select id="" class="form-select">
      <option selected>select Gender</option>
      <option>Male</option>
      <option>Female</option>
    </select></div>
  </div>

  <div class="col-md-4">
  <div>  <label for="inputdate" class="form-label1">Birth date</label></div>
  <div>  <input type="date" class="form-control3" id=""></div>
  </div>

  <div class="col-md-6">
    <div><label for="inputname1" class="form-label"> Phone Number</label></div>
    <div><input type="text" class="form-control1" id=""></div>
  </div>

  <div class="col-md-6">
    
    <div><input type="submit"  name="update" value="Save Changes"class="form-control2" id=""></div>
  </div>



 

  </form></div>

    
    </div>

    
    
</body>
</html>