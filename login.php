<?php
/*
* Simple Login Page | Site Codematra
*/
include_once('header.php'); 

$validationError = '';
if(isset($_POST['login'])) {  
  $email = trim($_POST['email']); 
  $userpassword = trim($_POST['password']);
  if(($email!='') && ($userpassword!='') ) {
    $sql = "SELECT id FROM users WHERE email='$email' AND password='$userpassword'";   
    $result = mysqli_query($connection, $sql);
    if($result) {
      $num_rows = mysqli_num_rows($result);
      if($num_rows>0) {  
        $validationError = "<div class='alert alert-success'>You are logged in successfully.</div>" ;   
        header("Location: dashboard.php");
      }
    } else {
      $validationError = "<div class='alert alert-danger'>Email or Password incorrect.</div>" ;   
    }
  } 
}

?>
<div class="container">
  <div class="row"> 
    <div class="col-12 col-md-4 mx-auto">
      <form action="" method="post" autocomplete="off">
        <h2 class="mb-4 text-center">User Login </h2>
        <?php echo $validationError; ?>
        <div class="form-group">
          <label for="email">Email <span class="text-danger">*</span></label>
          <input type="email" id="email" class="form-control" name="email" placeholder="Email" required="required" />
        </div>
        <div class="form-group">
          <label for="email">Password <span class="text-danger">*</span></label>
          <input type="password" id="password" maxlength="6" class="form-control" name="password" placeholder="Password" required="required" />
        </div>
        <button name="login" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>
    </div>
  </div>
</div>     
<?php include_once('footer.php');