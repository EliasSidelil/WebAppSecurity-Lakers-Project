<?php

  $active='Address';
  include("includes/header.php");

?>

<?php

  if(!isset($_SESSION['customer_email'])){
                       
      echo "Welcome: Guest";
                       
  }else{

      $customer_session = $_SESSION['customer_email'];
                                
      $get_customer = "select * from tbl_customer where customer_email='$customer_session'";
                                
      $run_customer = mysqli_query($con,$get_customer);
                                
      $row_customer = mysqli_fetch_array($run_customer);
                                
      $customer_name = $row_customer['customer_name'];
                                
      $customer_address = $row_customer['customer_address'];
                                
      $customer_contact = $row_customer['customer_contact'];
                                
      $customer_city = $row_customer['customer_city'];
                                
      $customer_country = $row_customer['customer_country'];
      
    }
    
?>
   
   
   <div id="content"><!-- #content Begin -->

       <div class="container"><!-- container Begin -->

           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Address
                   </li>
               </ul><!-- breadcrumb Finish -->
           </div><!-- col-md-12 Finish -->
           <div class="col-md-2">
             
           </div>
        
           <div class="col-md-8"><!-- col-md-9 Begin -->

             <div class="box">
                           
                           <h3>Delivery Address:</h3>

                            <?php echo $customer_name; ?></br>
                            <?php echo $customer_address; ?></br>
                            <?php echo $customer_contact; ?>
                            <?php echo $customer_city; ?></br>
                            <?php echo $customer_country; ?></br></br>
                            <a class="" href="change_delivery_address.php"> Change </a>

                            <hr>    
                           
                           <h3>Choose a Shipping Method:</h3>

                                           <select name="" id="" class="form-control"><!-- select Begin -->
                                           <option>Standard Shipping</option>
                                           <option>Premium Shipping</option>
                                           </select><!-- select Finish -->

                           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
                              <a href="checkout.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                                   
                                   <i class="fa fa-confirm"></i>
                                   
                                   <span>Continue</span>
                                   
                               </a><!-- btn navbar-btn btn-primary Finish -->
               
                           </div><!-- navbar-collapse collapse Finish -->

                    </div><!-- box finish -->
               
           </div><!-- col-md-9 Finish -->

       </div> <!-- container Finish -->

   </div><!-- #content Finish -->

  <script src="js/jquery-331.min.js"></script>
  <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>