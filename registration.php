
<?php include_once('header.php'); ?>

    <form action="register_new_user.php" class="form-signin" method="post">
	 <h2 class="form-signin-heading text-center">User Registration</h2>
         
        <input type="text" id="full_name" class="form-control" name="full_name" placeholder="Full Name" required="required" autofocus />
        <input type="email" id="user_email" class="form-control" name="user_email" placeholder="User Email" required="required" />
        <input type="text" id="user_phone" maxlength="10" class="form-control" name="user_phone" placeholder="User Phone. Eg 9827098001" />
        <select class="form-control" name="user_role">
            <option value="">-- Select User Role --</option>
            <option value="Manager">Manager</option>
            <option value="Human Resourc">Human Resource</option> 
            <option value="Staff">Staff</option> 
            <option value="Customer">Customer</option> 
        </select>
        <input type="password" id="new_password" maxlength="6" class="form-control" name="new_password" placeholder="New Password" required="required" />
        <input type="password" id="confirm_password" maxlength="6" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required" />

        <button name="register_user" class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    </form>
     
<?php include_once('footer.php'); ?> 