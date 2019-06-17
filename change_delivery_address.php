<!-- To change delivery address -->

<?php

$active='Address Change';
include("includes/header.php"); 

?>

<?php 

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from tbl_customer where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_name = $row_customer['customer_name'];

$customer_country = $row_customer['customer_country'];

$customer_city = $row_customer['customer_city'];

$customer_contact = $row_customer['customer_contact'];

$customer_address = $row_customer['customer_address'];

?>


<div class="col-md-2"></div>
<div class="col-md-8"><!-- col-md-9 Begin -->
               
    <div class="box"><!-- box Begin -->
                   
     <div class="box-header"><!-- box-header Begin -->

            <h1 align="center"> Edit Your Delivery Address </h1>

            <form action="" method="post" enctype="multipart/form-data"><!-- form Begin -->
                
                <div class="form-group"><!-- form-group Begin -->
                    
                    <label> Your Name: </label>
                    
                    <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name; ?>" required>
                    
                </div><!-- form-group Finish -->
                
                <div class="form-group"><!-- form-group Begin -->
                    
                    <label> Country: </label>
                    
                    <input type="text" name="c_country" class="form-control" value="<?php echo $customer_country; ?>" required>
                    
                </div><!-- form-group Finish -->
                
                <div class="form-group"><!-- form-group Begin -->
                    
                    <label> City: </label>
                    
                    <input type="text" name="c_city" class="form-control" value="<?php echo $customer_city; ?>" required>
                    
                </div><!-- form-group Finish -->
                
                <div class="form-group"><!-- form-group Begin -->
                    
                    <label> Post Code: </label>
                    
                    <input type="text" name="c_contact" class="form-control" value="<?php echo $customer_contact; ?>" required>
                    
                </div><!-- form-group Finish -->
                
                <div class="form-group"><!-- form-group Begin -->
                    
                    <label> Address/Str.: </label>
                    
                    <input type="text" name="c_address" class="form-control" value="<?php echo $customer_address; ?>" required>
                    
                </div><!-- form-group Finish -->
                
                <div class="text-center"><!-- text-center Begin -->
                    
                    <button name="update" class="btn btn-primary"><!-- btn btn-primary Begin -->
                        
                        <i class="fa fa-user-md"></i> Change Now
                        
                    </button><!-- btn btn-primary inish -->
                    
                </div><!-- text-center Finish -->
                
            </form><!-- form Finish -->

        </div><!-- box-header Finish -->
                   
    </div><!-- box Finish -->
               
</div><!-- col-md-9 Finish -->

<?php 

if(isset($_POST['update'])){
    
    $update_id = $customer_id;
    
    $c_name = mysqli_real_escape_string($con, $_POST['c_name']);
    
    $c_country = mysqli_real_escape_string($con, $_POST['c_country']);
    
    $c_city = mysqli_real_escape_string($con, $_POST['c_city']);
    
    $c_address = mysqli_real_escape_string($con, $_POST['c_address']);
    
    $c_contact = mysqli_real_escape_string($con, $_POST['c_contact']);
    
    $update_customer = "update tbl_customer set customer_name='$c_name',customer_country='$c_country',customer_city='$c_city',customer_address='$c_address',customer_contact='$c_contact' where customer_id='$update_id' ";
    
    $run_customer = mysqli_query($con,$update_customer);
    
    if($run_customer){
        
        echo "<script>alert('Your delivery address has been changed.')</script>";
        
        echo "<script>window.open('delivery_address.php','_self')</script>";
        
    }
    
}

?>