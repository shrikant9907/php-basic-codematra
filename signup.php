<?php 
/*
* Signup Page | Site Codematra
*/
include_once('header.php'); 
if(isset($_POST['signup'])) {

  $validationError = '';
  $name = ucwords(trim($_POST['name']));  
  $email = trim($_POST['email']); 
  $phone = trim($_POST['phone']);
  $npassword = trim($_POST['password']);
  $cpassword = trim($_POST['cpassword']);

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
                ('', '$name', '$email', '$phone', '$npassword', '', '0', '$activation_key')";
        $result2 = mysqli_query($connection, $sql2);
        if ($result2){  
          $validationError = "<div class='alert alert-success'>You are registered successfully.</div>";
          header('Location: login.php');
          die();
        } else {
          $validationError = "<div class='alert alert-danger'> Sorry, There is some error. Please try again.</div>"; 
        }
      } else {
        $validationError = "<div class='alert alert-info'>Password not matched. Try again.</div>" ;   
      }
    } else {
      $validationError = "<div class='alert alert-info'>User already exists with given email id. </div>" ;   
    }
  } 
}
?>
<div class="container">
  <div class="row">
    <div class="col-12 col-md-4 mx-auto">
      <form action="" method="post" autocomplete="off">
        <h2 class="mb-4 text-center">Create an account</h2>
        <?php echo $validationError; ?>
        <div class="form-group">
          <input value="<?php echo $name; ?>" type="text" id="name" class="form-control" name="name" placeholder="Full Name" required="required" autofocus />
        </div>
        <div class="form-group">
          <input value="<?php echo $email; ?>" type="email" id="email" class="form-control" name="email" placeholder="Email Address" required="required" />
        </div>
        <div class="form-group">
          <input value="<?php echo $phone; ?>" type="text" id="phone" maxlength="10" class="form-control" name="phone" placeholder="Phone/Mobile. Eg 9827098001" />
        </div>
        <div class="form-group">
          <input type="password" id="password" maxlength="6" class="form-control" name="password" placeholder="New Password" required="required" />
        </div>
        <div class="form-group">
          <input type="password" id="cpassword" maxlength="6" class="form-control" name="cpassword" placeholder="Confirm Password" required="required" />
        </div>
        <div class="form-group">
         <button name="signup" class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        </div>        
      </form>
    </div>
  </div>
</div>
<?php include_once('footer.php'); 