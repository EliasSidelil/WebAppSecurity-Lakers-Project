<div class="box"><!-- box Begin -->
   
   <?php 
    
    $session_email = $_SESSION['customer_email'];
    
    $select_customer = "select * from tbl_customer where customer_email='$session_email'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $row_customer = mysqli_fetch_array($run_customer);
    
    $customer_id = $row_customer['customer_id'];

    $customer_name = $row_customer['customer_name'];
                                
    $customer_address = $row_customer['customer_address'];
                                
    $customer_contact = $row_customer['customer_contact'];
                                
    $customer_city = $row_customer['customer_city'];
                                
    $customer_country = $row_customer['customer_country'];
    
    ?>

    <h3>Delivery Address:</h3>

        <?php echo $customer_name; ?></br>
        <?php echo $customer_address; ?></br>
        <?php echo $customer_contact; ?>
        <?php echo $customer_city; ?></br>
        <?php echo $customer_country; ?></br>
        <a class="" href="change_delivery_address.php"> Change </a>

    <hr>

    <h3>Choose a Shipping Method:</h3>

         <select name="shipping" id="" class="form-control"><!-- select Begin -->
         <option>Standard Shipping</option>
         <option>Premium Shipping</option>
         </select><!-- select Finish -->
    <hr>
    <h3>Payment Options For You</h3>
    <hr>
     
        <p class="lead"><!-- lead Begin -->
            
            <a href="#">
                
                Bank Account:

            </a>
            
        </p> <!-- lead Finish -->

        IBAN: 
                <input type="text" name="iban">

             
        <a href="#" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                                   
            <i class="fa fa-confirm"></i>
                                   
                 <span>Check</span>
                                   
        </a><!-- btn navbar-btn btn-primary Finish -->
     
        <hr>

        <p class="lead"><!-- lead Begin -->
            
            <a href="#">
                
                Credit Cards:
                
                <img class="img-responsive" src="images/payment-method-3.png" alt="img-pay">
                
            </a>
            
        </p> <!-- lead Finish -->

        Card Number:
                <input type="text" name="iban">
               
        <a href="#" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                                   
            <i class="fa fa-confirm"></i>
                                   
                 <span>Check</span>
                                   
        </a><!-- btn navbar-btn btn-primary Finish -->
               
   
        <hr>

        <p class="lead"><!-- lead Begin -->
            
            <a href="#">
                
                Offline Payment:

            </a>
            
        </p> <!-- lead Finish -->
         
     <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
        <a href="review_order.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                                   
            <i class="fa fa-confirm"></i>
                                   
                 <span>Continue</span>
                                   
        </a><!-- btn navbar-btn btn-primary Finish -->
               
    </div><!-- navbar-collapse collapse Finish -->
    
</div><!-- box Finish -->