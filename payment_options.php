<div class="box"><!-- box Begin -->
   
   <?php 
    
    $session_email = $_SESSION['customer_email'];
    
    $select_customer = "select * from tbl_customer where customer_email='$session_email'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $row_customer = mysqli_fetch_array($run_customer);
    
    $customer_id = $row_customer['customer_id'];
    
    ?>
    
    <h1 class="text-center">Payment Options For You</h1>
     
     <center><!-- center Begin -->
         
        <p class="lead"><!-- lead Begin -->
            
            <a href="#">
                
                Select your Payment method
                
                <img class="img-responsive" src="images/payment-method-3.png" alt="img-pay">
                
            </a>
            
        </p> <!-- lead Finish -->
         
     </center><!-- center Finish -->  
    
     <p class="lead text-center"><!-- lead text-center Begin -->
         
         <a class="" href="order.php?c_id=<?php echo $customer_id ?>"> Offline Payment </a>
         
     </p><!-- lead text-center Finish -->
    
</div><!-- box Finish -->