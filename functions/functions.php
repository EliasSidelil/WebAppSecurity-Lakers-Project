<!-- Most Custom made functions start from here -->

<?php 



$db = mysqli_connect("localhost","root","","lakers_webshop");

/// begin getRealIpUser functions ///

function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}

/// begin add_cart functions -- To add products to Cart from details ///

function add_cart(){
    
    global $db;
    
    if(isset($_GET['add_cart'])){
        
        $ip_add = getRealIpUser();
        
        $p_id = $_GET['add_cart'];



        
        $product_qty = $_POST['product_qty'];
        
        $check_product = "select * from tbl_cart where ip_add='$ip_add' AND p_id='$p_id'";
        
        $run_check = mysqli_query($db,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('This product has already added in cart')</script>";

            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }else{
            


            $get_products = "select * from tbl_product where product_id='$p_id'";
    
            $run_products = mysqli_query($db,$get_products);
    
            $row_products=mysqli_fetch_array($run_products);

            $pro_title = $row_products['product_title'];
            
            $pro_stock = $row_products['stock'];

            if ($pro_stock < 1) {

                echo "<script>alert('We are very Sorry, you have requested $product_qty $pro_title but we have only $pro_stock of this item in stock.')</script>";

                echo "<script>window.open('index.php','_self')</script>";
            }else{
                
                if ($product_qty < $pro_stock) {
                 
            
                
            $query = "insert into tbl_cart (p_id,ip_add,product_name,qty) values ('$p_id','$ip_add','$pro_title','$product_qty')";
            
            $run_query = mysqli_query($db,$query);
            
            echo "<script>alert('An item has been added to your cart')</script>";

            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";




            }
            }
            
        }
        
    }
    
}

/// finish add_cart functions ///

/// finish getRealIpUser functions ///

/// begin getPro functions - To display products on the front page from database ///

function getPro(){
    
    global $db;
    
    $get_products = "select * from tbl_product order by 1 DESC LIMIT 0,8";
    
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        
        $pro_price = $row_products['product_price'];
        
        $pro_img1 = $row_products['product_img1'];
        
        echo "
        
        <div class='col-md-4 col-sm-6 single'>
        
            <div class='product'>
            
                <a href='details.php?pro_id=$pro_id'>
                
                    <img class='img-responsive' src='admin/product_images/$pro_img1'>
                
                </a>
                
                <div class='text'>
                
                    <h3>
            
                        <a href='details.php?pro_id=$pro_id'>

                            $pro_title

                        </a>
                    
                    </h3>
                    
                    <p class='price'>
                    
                        € $pro_price
                    
                    </p>
                    
                    <p class='button'>
                    
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                            View Details

                        </a>
                    
                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                            <i class='fa fa-shopping-cart'></i> Add to Cart

                        </a>
                    
                    </p>
                
                </div>
            
            </div>
        
        </div>
        
        ";
        
    }
    
}

/// Begin items function - To make total number of items in the cart icon dynamic///

function items(){
    
    global $db;
    
    $ip_add = getRealIpUser();
    
    $get_items = "select * from tbl_cart where ip_add='$ip_add'";
    
    $run_items = mysqli_query($db,$get_items);
    
    $count_items = mysqli_num_rows($run_items);
    
    echo $count_items;
    
}

/// End items function///

/// begin total_price functions - To make total price icon dynamic ///

function total_price(){
    
    global $db;
    
    $ip_add = getRealIpUser();
    
    $total = 0;
    
    $select_cart = "select * from tbl_cart where ip_add='$ip_add'";
    
    $run_cart = mysqli_query($db,$select_cart);
    
    while($record=mysqli_fetch_array($run_cart)){
        
        $pro_id = $record['p_id'];
        
        $pro_qty = $record['qty'];
        
        $get_price = "select * from tbl_product where product_id='$pro_id'";
        
        $run_price = mysqli_query($db,$get_price);
        
        while($row_price=mysqli_fetch_array($run_price)){
            
            $sub_total = $row_price['product_price']*$pro_qty;
            
            $total += $sub_total;
            
        }
        
    }
    
    echo "€" . $total;
    
}

/// finish total_price functions ///

?>