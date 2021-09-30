<?php
/*
* Simple Edit User Page | Site Codematra
*/
include_once('header.php'); 
$validationError = '';
if(isset($_POST['update'])) {
  global $connection; 
  $user_id = $_POST['user_id'];
  $name = ucwords(trim($_POST['name']));  
  $phone = trim($_POST['phone']);  
  
  // Update User Profile
  $sql = "UPDATE users
          SET name='$name', phone='$phone'
          WHERE id='$user_id'"; 
   
  $result = mysqli_query($connection, $sql);
  
  // It return 1 or 0;  
  if($result) {  
    header("Location: edit-user.php?update=true&userid=$user_id");
    die();
  } else {
    $validationError = "<div class='alert alert-success'>User Profile not updated. Please try again.</div>"; 
  } 
  
} else {
  $validationError = "<div class='alert alert-success'>User ID Not Given</div>"; 
}

if (isset($_GET['update'])) {
  $validationError = "<div class='alert alert-success'>User Profile Updated.</div>"; 
}

if(isset($_GET['userid'])) { 
  $user_id = $_GET['userid'];
  $userinfo = get_user_by_id($user_id);
  $name = $userinfo['name'];
  $email = $userinfo['email'];
  $phone = $userinfo['phone'];
  ?>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-4 mx-auto">
        <form action="" method="post" autocomplete="off">
          <h2 class="mb-4 text-center">Edit User Profile</h2>
          <?php echo $validationError; ?>
          <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"  /> 
          <div class="form-group">
            <input value="<?php echo $name; ?>" type="text" id="name" class="form-control" name="name" placeholder="Full Name" required="required" autofocus />
          </div>
          <div class="form-group">
            <input value="<?php echo $phone; ?>" type="text" id="phone" maxlength="10" class="form-control" name="phone" placeholder="Phone/Mobile. Eg 9827098001" />
          </div>
          <div class="form-group">
            <input readonly value="<?php echo $email; ?>" type="email" id="email" class="form-control bg-light" name="email" placeholder="Email Address" required="required" />
          </div>
          <div class="form-group">
          <button name="update" class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
          </div>        
        </form>
      </div>
    </div>
  </div>  
  <?php 
  } else {
  echo "User ID Not Given"; 
} ?> 

<?php include_once('footer.php');