<?php

  $active='Register';
  include("includes/header.php");

?>  

<?php 

if(isset($_POST['register'])){

    /*include_once 'db.php';
    include_once '../functions/functions.php';*/
    
    $c_name = mysqli_real_escape_string($con, $_POST['c_name']);
    
    $c_email = mysqli_real_escape_string($con, $_POST['c_email']);
    
    $c_pass = mysqli_real_escape_string($con, $_POST['c_pass']);
    
    $c_country = mysqli_real_escape_string($con, $_POST['c_country']);
    
    $c_city = mysqli_real_escape_string($con, $_POST['c_city']);
    
    $c_contact = mysqli_real_escape_string($con, $_POST['c_contact']);
    
    $c_address = mysqli_real_escape_string($con, $_POST['c_address']);
    
    $c_image = $_FILES['c_image']['name'];
    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
    $c_ip = getRealIpUser();
    
    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

    //Error handling
    //Check if email is valid

    if (!filter_var($c_email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('The email address is not valid, please use a valid email address.')</script>";
        
        echo "<script>window.open('customer_register.php','_self')</script>";
    } else{

        //Hashing the password
        $hashedpwd = password_hash($c_pass, PASSWORD_DEFAULT);                    

    

    
    $insert_customer = "insert into tbl_customer (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$hashedpwd','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
    
    $run_customer = mysqli_query($con,$insert_customer);
    
    $sel_cart = "select * from tbl_cart where ip_add='$c_ip'";
    
    $run_cart = mysqli_query($con,$sel_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_cart>0){
        
        /// If register have items in cart ///
        
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('You have been Registered Sucessfully')</script>";
        
        echo "<script>window.open('delivery_address.php','_self')</script>";
        
    }else{
        
        /// If register without items in cart ///
        
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('You have been Registered Sucessfully')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
        
    }

   } 
    
}

