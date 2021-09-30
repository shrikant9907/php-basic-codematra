<?php 
/*
* Simple Change Password Form | Site Codematra
*/
include_once('header.php'); 

if(isset($_POST['change_pass'])) {
  $user_id = $_POST['user_id'];    
  $old_password   = $_POST['old_password'];    
  $new_password   = $_POST['new_password'];  
  $confirm_password = $_POST['confirm_password'];      
  change_password($user_id, $old_password, $new_password, $confirm_password);
} 
?>

<div class="container">
  <div class="row">
    <div class="col-12 col-md-4 mx-auto">
    <?php if(isset($_GET['userid'])) { 
        $user_id = $_GET['userid']; ?>
        <form action="change-password.php" method="post" autocomplete="off"> 
          <h2 class="mb-4 text-center">Change Password Form</h2>
          <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
          <div class="form-group">
            <input type="text" id="old_password" maxlength="6" class="form-control" name="old_password" placeholder="Old Password" required="required" autofocus />
          </div>
          <div class="form-group">
            <input type="password" id="new_password" maxlength="6" class="form-control" name="new_password" placeholder="New Password" required="required" />
          </div>
          <div class="form-group">
            <input type="password" id="confirm_password" maxlength="6" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required" />
          </div>
        <button name="change_pass" class="btn btn-primary btn-block" type="submit">Save Change</button>
        </form>
      <?php } else { ?>
        <div class="alert alert-danger">User ID not given. </div>    
      <?php } ?>
    </div>
  </div>
</div>

<?php include_once('footer.php'); ?> 