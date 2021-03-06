<?php 

session_start(); 
include("includes/db.php");
include("functions/functions.php")

?>

<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from tbl_product where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $pro_title = $row_product['product_title'];
    
    $pro_price = $row_product['product_price'];
    
    $pro_desc = $row_product['product_desc'];
    
    $pro_img1 = $row_product['product_img1'];
    
    $pro_img2 = $row_product['product_img2'];
    
    $pro_img3 = $row_product['product_img3'];
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My account</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
   
 <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
      
               <h3 href="#"> LAKERS WEBSHOP </h3>
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->

                    <ul class="menu">
                       
                      <li>
                       <a>
                         
                         <?php 
                   
                            if(!isset($_SESSION['customer_email'])){
                       
                                echo "Welcome: Guest";
                       
                           }else{

                                if ((time() - $_SESSION['last_time']) > 3600) {

                                   include("session_logout.php");

                                 }else{

                                $customer_session = $_SESSION['customer_email'];
                                
                                $get_customer = "select * from tbl_customer where customer_email='$customer_session'";
                                
                                $run_customer = mysqli_query($con,$get_customer);
                                
                                $row_customer = mysqli_fetch_array($run_customer);
                                
                                $customer_name = $row_customer['customer_name'];

                                echo "Welcome: $customer_name";
                                
                              //   <!-- echo "Welcome: " . $_SESSION['customer_email'] . ""; -->//

                              }
                             }
                   
                           ?>

                       </a>
                      </li>

                   </ul>
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <a href="../customer_register.php">Register</a>
                   </li>
                   <li>
                       <a href="my_account.php">My Account</a>
                   </li>
                   <li>
                       <a href="../cart.php">Go To Cart</a>
                   </li>
                   <li>
                       <a href="../checkout.php">
                         
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='checkout.php'> Login </a>";

                               }else{

                                echo " <a href='logout.php'> Log Out </a> ";

                               }
                           
                           ?>
                       </a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
   
    <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="../index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="images/lakers-logo.png" alt="Lakers Logo" class="hidden-xs">
                   <img src="images/lakers-logo-mobile.png" alt="Lakers Logo Mobile" class="visible-xs">
                   
               </a><!-- navbar-brand home Finish -->
               
            
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
            
               
               <a href="../cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php items(); ?> Items In Your Cart</span>
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
              
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->