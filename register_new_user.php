<?php include_once('header.php'); ?>

<div class="container">
    <div class="row"> 
        <div class="col-12">
            <?php 
            /*
             * Register New User
             */

            if(isset($_POST['register_user'])) {

                // trim() - It removes extra spaces from left and right side.
                // ucwords() - Convert the first character of each word to uppercase: 
                // . - Concatinate
                // Status 0 = Deactive, 1 = Active  
                // md5() - Hash code generate.

                $name = ucwords(trim($_POST['full_name']));  
                $email = trim($_POST['user_email']); 
                $phone = trim($_POST['user_phone']);
                $user_role = trim($_POST['user_role']);
                $npassword = trim($_POST['new_password']);
                $cpassword = trim($_POST['confirm_password']);

                // Check if all required value given
                if(($name!='') && ($email!='') && ($npassword!='') && ($cpassword!='')) {

                    // Check Duplicate Entry 
                    $sql = "SELECT id FROM users WHERE email='$email'";  
                    $result = mysqli_query($connection, $sql);
                    $num_rows = mysqli_num_rows($result);
                    if($num_rows==0) {  
                    
                        if($npassword===$cpassword) { 

                            // Generate Activation Key
                            $activation_key = md5($email);    

                            $sql2 = "INSERT INTO users 
                                    (registration_id, name, email, phone, password, role, status, activation_key)
                                    VALUES 
                                    ('', '$name', '$email', '$phone', '$npassword', '$user_role', '0', '$activation_key')";

                            $result2 = mysqli_query($connection, $sql2);
                            if ($result2){  
                                echo "<div class='alert alert-success'>You are registered successfully. <a href='user-list.php'>View Users List</a></div>";
                            } else {
                                echo "<div class='alert alert-danger'> Sorry, There is some error. Please try again. <a href='registration.php'>Register Again</a></div>"; 
                            }

                        } else {
                            echo "<div class='alert alert-info'>Password not matched.</div>" ;   
                        }
                    
                    } else {
                        echo "<div class='alert alert-info'>User already exists with given email id. </div>" ;   
                    }

                } 
            }
            ?>

        </div>
    </div>
</div>

<?php include_once('footer.php'); 