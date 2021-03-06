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


<?php 

if(isset($_POST['submit'])){ 
    
    $c_email = $_SESSION['customer_email'];
    
    $c_old_pass = mysqli_real_escape_string($con, $_POST['old_pass']);
    
    $c_new_pass = mysqli_real_escape_string($con, $_POST['new_pass']);
    
    $c_new_pass_again = mysqli_real_escape_string($con, $_POST['new_pass_again']);
    
    $sel_c_old_pass = "select * from tbl_customer where customer_email='$c_email'";
    
    $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);
    
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);

    //De-hashing the password
    $hashedpwdcheck = password_verify($c_old_pass, $check_c_old_pass['customer_pass']);
    
    if ($hashedpwdcheck == false) {
        
        echo "<script>alert('Sorry, your current password is not valid. Please try again')</script>";
        
        exit();
        
    }
    
    if($c_new_pass!=$c_new_pass_again){
        
        echo "<script>alert('Sorry, your new password did not match')</script>";
        
        exit();
        
    }
    
    
    $hashedpwd = password_hash($c_new_pass, PASSWORD_DEFAULT);

    $update_c_pass = "update tbl_customer set customer_pass='$hashedpwd' where customer_email='$c_email'";
    
    $run_c_pass = mysqli_query($con,$update_c_pass);
    
    if($run_c_pass){
        
        echo "<script>alert('Your password has been changed successfully')</script>";
        
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        
    }
    
}

?>