<?php include_once('header.php'); ?>

<?php if(isset($_GET['userid'])) { 
    
    $user_id = $_GET['userid'];
    
    $userinfo = get_user_by_id($user_id);
    
    ?>
    <form action="save_user.php" class="form-signin" method="post">
	 <h2 class="form-signin-heading text-center">Edit User Profile</h2>
         
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"  /> 
        <input type="text" id="full_name" value="<?php echo $userinfo['name']; ?>" class="form-control" name="full_name" placeholder="Full Name" required="required" autofocus />
        <input type="email" id="user_email" value="<?php echo $userinfo['email']; ?>" class="form-control" name="user_email" placeholder="User Email" required="required" />
        <input type="text" id="user_phone" value="<?php echo $userinfo['phone']; ?>" maxlength="10" class="form-control" name="user_phone" placeholder="User Phone. Eg 9827098001" />
        <select class="form-control" name="user_role">
            <option value="">-- Select User Role --</option>
            <option value="Manager">Manager</option>
            <option value="Human Resourc">Human Resource</option> 
            <option value="Staff">Staff</option> 
            <option value="Customer">Customer</option> 
        </select>
        <button name="save_user" class="btn btn-lg btn-primary btn-block" type="submit">Update Profile</button>
    </form>
<?php } else {
    echo "User ID Not Given"; 
} ?> 

<?php include_once('footer.php'); ?> 