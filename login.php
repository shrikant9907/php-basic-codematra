
<?php include_once('header.php'); ?>
<div class="container">
    <div class="row"> 
        <div class="col-12">
        <?php 
        /*
         * Login User 
         */

        if(isset($_POST['login_user_submit'])) {  

            $email = trim($_POST['user_email']); 
            $userpassword = trim($_POST['user_password']);

            // Check if all required value given
            if(($email!='') && ($userpassword!='') ) {

                // User Exists Check 
                $sql = "SELECT id FROM users WHERE email='$email' password='$userpassword'";   
                $result = mysqli_query($connection, $sql);
                if($result) {
                $num_rows = mysqli_num_rows($result);
                    if($num_rows==0) {  

                        if($userpassword) { 

                            // Login  

                        } else {
                            echo "<div class='alert alert-info'>Password not matched.</div>" ;   
                        }
                    }
                } else {
                    echo "<div class='alert alert-danger'>User not registerd with given email id.</div>" ;   
                }

            } 
        }
        ?>

    <form action="" class="form-signin" method="post">
	 <h2 class="form-signin-heading text-center">User Login </h2>
         
        <input type="email" id="user_email" class="form-control" name="user_email" placeholder="User Email" required="required" />
        <input type="password" id="user_password" maxlength="6" class="form-control" name="user_password" placeholder="YOur Password" required="required" />
    
        <button name="login_user_submit" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
            
       </div>
    </div>
</div>     
<?php include_once('footer.php'); ?> 