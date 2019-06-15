<?php

  $active='Change Password';
  include("includes/header.php");
  include("includes/db.php");
  session_start();

?>
<div class="col-md-2">
             
</div>

<div class="col-md-8">
             
          
<h1 align="center"> Change Password </h1>


<form action="" method="post"><!-- form Begin -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Your Old Password: </label>
        
        <input type="password" name="old_pass" class="form-control" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Your New Password: </label>
        
        <input type="password" name="new_pass" class="form-control" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Confirm Your New Password: </label>
        
        <input type="password" name="new_pass_again" class="form-control" required>
        
    </div><!-- form-group Finish -->
    
    <div class="text-center"><!-- text-center Begin -->
        
        <button type="submit" name="submit" class="btn btn-primary"><!-- btn btn-primary Begin -->
            
            <i class="fa fa-user-md"></i> Update Now
            
        </button><!-- btn btn-primary inish -->
        
    </div><!-- text-center Finish -->
    
</form><!-- form Finish -->
 </div>


<?php 

if(isset($_POST['submit'])){ 
    
    $a_email = $_SESSION['admin_email'];
    
    $a_old_pass = mysqli_real_escape_string($con, $_POST['old_pass']);
    
    $a_new_pass = mysqli_real_escape_string($con, $_POST['new_pass']);
    
    $a_new_pass_again = mysqli_real_escape_string($con, $_POST['new_pass_again']);
    
    $sel_a_old_pass = "select * from tbl_admin where admin_email='$a_email'";
    
    $run_a_old_pass = mysqli_query($con,$sel_a_old_pass);
    
    $check_a_old_pass = mysqli_fetch_array($run_a_old_pass);

    //De-hashing the password
    $hashedpwdcheck = password_verify($a_old_pass, $check_a_old_pass['admin_pass']);
    
    if ($hashedpwdcheck == false) {
        
        echo "<script>alert('Sorry, your current password is not valid. Please try again')</script>";
        
        exit();
        
    }
    
    if($a_new_pass!=$a_new_pass_again){
        
        echo "<script>alert('Sorry, your new password did not match')</script>";
        
        exit();
        
    }
    
    
    $hashedpwd = password_hash($a_new_pass, PASSWORD_DEFAULT);

    $update_a_pass = "update tbl_admin set admin_pass='$hashedpwd' where admin_email='$a_email'";
    
    $run_a_pass = mysqli_query($con,$update_a_pass);
    
    if($run_a_pass){
        
        echo "<script>alert('Your password has been changed successfully, For security reason please login again.')</script>";
        
        echo "<script>window.open('logout.php','_self')</script>";
        
    }
    
}

?>