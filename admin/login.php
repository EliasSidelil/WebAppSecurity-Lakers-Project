<?php 

    session_start();
    include("includes/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
   
   <div class="container"><!-- container begin -->
       <form action="" class="form-login" method="post"><!-- form-login begin -->
           <h2 class="form-login-heading"> Lakers Webshop </h2>

           <h2 class="form-login-heading"> Admin Login </h2>
           
           <input type="text" class="form-control" placeholder="Email Address" name="admin_email" required>
           
           <input type="password" class="form-control" placeholder="Your Password" name="admin_pass" required>
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login"><!-- btn btn-lg btn-primary btn-block begin -->
               
               Login
               
           </button><!-- btn btn-lg btn-primary btn-block finish -->
           
       </form><!-- form-login finish -->
   </div><!-- container finish -->
    
</body>
</html>


<?php 

    if(isset($_POST['admin_login'])){
        
        $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
        
        $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
        
        $get_admin = "select * from tbl_admin where admin_email='$admin_email'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $count = mysqli_num_rows($run_admin);


        if($count==0){
        
        echo "<script>alert('Your email or password is wrong1')</script>";
        
        exit();
        
    } else{
    
        if($row = mysqli_fetch_assoc($run_admin)){
        
          //De-hashing the password
          $hashedpwdcheck = password_verify($admin_pass, $row['admin_pass']);

          if ($hashedpwdcheck == false) {
            echo "<script>alert('Your email or password is wrong2')</script>";
        
          exit();
          } elseif ($hashedpwdcheck == true) {
            //Login the user here
              
              $_SESSION['admin_email']=$admin_email;
            
            echo "<script>alert('Welcome Admin')</script>";
            
            echo "<script>window.open('index.php?dashboard','_self')</script>";

            }
    }
  }

        
        
        
    }

?>