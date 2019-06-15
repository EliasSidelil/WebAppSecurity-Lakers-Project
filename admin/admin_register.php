<?php

  $active='Register';
  include("includes/header.php");
  include("includes/db.php");

?>
   
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-2">
             
           </div>
        
        <div class="col-md-8"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <center><!-- center Begin -->
                           
                           <h2> Register a New Admin</h2>
                         
                       </center><!-- center Finish -->
                       
                       <form action="admin_register.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Name</label>
                               
                               <input type="text" class="form-control" name="a_name" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Email</label>
                               
                               <input type="text" class="form-control" name="a_email" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Password</label>
                               
                               <input type="Password" class="form-control" name="a_pass" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Country</label>
                               
                               <input type="text" class="form-control" name="a_country" required>
                               
                           </div><!-- form-group Finish -->
                           
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>About Admin</label>
                               
                               <input type="text" class="form-control" name="a_about" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Contact</label>
                               
                               <input type="text" class="form-control" name="a_contact" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Job</label>
                               
                               <input type="text" class="form-control" name="a_address" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Profile picture</label>
                               
                               <input type="file" class="form-control" name="a_image">
                               
                           </div><!-- form-group Finish -->
                           
                           
                           <div class="text-center"><!-- text-center Begin -->
                               
                               <button type="submit" name="register" class="btn btn-primary">
                               
                               <i class="fa fa-user-md"></i> Register
                               
                               </button>
                               
                           </div><!-- text-center Finish -->
                           
                       </form><!-- form Finish -->
                       
                   </div><!-- box-header Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div> <!-- container Finish -->
   </div><!-- #content Finish -->
  <script src="js/jquery-331.min.js"></script>
  <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>  

<?php 

if(isset($_POST['register'])){

    /*include_once 'db.php';
    include_once '../functions/functions.php';*/
    
    $a_name = mysqli_real_escape_string($con, $_POST['a_name']);
    
    $a_email = mysqli_real_escape_string($con, $_POST['a_email']);
    
    $a_pass = mysqli_real_escape_string($con, $_POST['a_pass']);
    
    $a_country = mysqli_real_escape_string($con, $_POST['a_country']);
    
    $a_about = mysqli_real_escape_string($con, $_POST['a_about']);
    
    $a_contact = mysqli_real_escape_string($con, $_POST['a_contact']);
    
    $a_job = mysqli_real_escape_string($con, $_POST['a_address']);
    
    $a_image = $_FILES['a_image']['name'];
    
    $a_image_tmp = $_FILES['a_image']['tmp_name'];
    
    
    
    move_uploaded_file($a_image_tmp,"admin_images/$a_image");

    //Error handling
    //Check if email is valid

    
        //Hashing the password
        $hashedpwd = password_hash($a_pass, PASSWORD_DEFAULT);                    

    

    
    $insert_admin = "insert into tbl_admin (admin_name,admin_email,admin_pass,admin_image,admin_country,admin_about,admin_contact,admin_job) values ('$a_name','$a_email','$hashedpwd','$a_image','$a_country','$a_about','$a_contact','$a_job')";
    
    $run_admin = mysqli_query($con,$insert_admin);
    
    if ($run_admin) {
     
    
        
        echo "<script>alert('Admin Registered Sucessfully, for security purpose please login again')</script>";
        
         echo "<script>window.open('login.php','_self')</script>";
        
    
       } 
    
    
}


