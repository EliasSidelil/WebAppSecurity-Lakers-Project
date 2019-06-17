<!-- Order review befor placing order and confirming buy -->
<?php

  $active='Review_Order';

  include("includes/header.php");

?>

<div class="col-md-2"></div>

<div class="col-md-6">

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

      <h2>Review Your Order</h2>

      <hr>

      <h3>Delivery Address:</h3>

      <?php echo $customer_name; ?></br>
      
      <?php echo $customer_address; ?></br>
      
      <?php echo $customer_contact; ?>
      
      <?php echo $customer_city; ?></br>
      
      <?php echo $customer_country; ?></br>
      
      <a class="" href="change_delivery_address.php"> Change </a>
      
      <hr>
      
      <h3>Shipping Method:</h3>
      
      Standard Shipping</br>
      
      <a class="" href="delivery_address.php"> Change </a>
      
      
      <hr>
      
      <h3>Payment Method</h3>
      
      Offline Payment</br>
      
      <a class="" href="checkout.php"> Change </a>
  
  </div><!-- box Finish -->

</div>

<?php

  $ip_add = getRealIpUser();

  $select_cart = "select * from tbl_cart where ip_add='$ip_add'";

  $run_cart = mysqli_query($con,$select_cart);

  $count = mysqli_num_rows($run_cart);

  $total = 0;

  while($row_cart = mysqli_fetch_array($run_cart)){

    $pro_id = $row_cart['p_id'];

    $pro_qty = $row_cart['qty'];

    $get_products = "select * from tbl_product where product_id='$pro_id'";

    $run_products = mysqli_query($con,$get_products);

      while($row_products = mysqli_fetch_array($run_products)){

        $product_title = $row_products['product_title'];

        $product_img1 = $row_products['product_img1'];

        $only_price = $row_products['product_price'];

        $sub_total = $row_products['product_price']*$pro_qty;

        $total += $sub_total;
      }
  }

?>

<div class="col-md-4"><!-- col-md-3 Begin -->

  <div id="order-summary" class="box"><!-- box Begin -->

    <div class="box-header"><!-- box-header Begin -->

      <h3>Order Summary</h3>

    </div><!-- box-header Finish -->

    <p class="text-muted"><!-- text-muted Begin -->

      Shipping and additional costs are calculated based on value you have entered

    </p><!-- text-muted Finish -->

    <div class="table-responsive"><!-- table-responsive Begin -->

      <table class="table"><!-- table Begin -->

        <tbody><!-- tbody Begin -->

          <tr><!-- tr Begin -->

            <td> Order All Sub-Total </td>
            <th> €<?php echo $total; ?> </th>

          </tr><!-- tr Finish -->

          <tr><!-- tr Begin -->

            <td> Shipping and Handling </td>
            <td> €0 </td>

          </tr><!-- tr Finish -->

          <tr><!-- tr Begin -->

            <td> Tax </td>
            <th> €0 </th>

          </tr><!-- tr Finish -->

          <tr class="total"><!-- tr Begin -->

            <td> Total </td>
            <th> €<?php echo $total; ?> </th>

          </tr><!-- tr Finish -->

        </tbody><!-- tbody Finish -->

      </table><!-- table Finish -->

    </div><!-- table-responsive Finish -->
  <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->

    <a href="order.php?c_id=<?php echo $customer_id ?>" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->

      <i class="fa fa-confirm"></i>

      <span>Place an Order | Buy Now</span>

  </a><!-- btn navbar-btn btn-primary Finish -->

  </div><!-- navbar-collapse collapse Finish -->

</div><!-- box Finish -->

</div><!-- col-md-3 Finish -->