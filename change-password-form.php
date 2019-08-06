<!doctype html>
<html>
<head>
<title>Registration form</title>

 <!-- Required meta tags -->
 <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
 <title>KPM Boutique</title>
 
 <!--Fonts--> 
 <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,500,700" rel="stylesheet">
 
 <!-- CSS Files -->
 <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" />
 <link type="text/css" href="css/style.css" rel="stylesheet" />
 <link type="text/css" href="css/responsive.css" rel="stylesheet" />
 
 <!-- Script Files --> 
 <script type="text/javascript" src="js/jquery.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
 <script type="text/javascript" src="js/script.js"></script>

 </head>
 <body>
     
    <?php if(isset($_GET['userid'])) { 
        $user_id = $_GET['userid']; ?>
    <form action="change-password.php" class="form-signin" method="post"> 
	<h2 class="form-signin-heading text-center">Change Password Form</h2>
         
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
        <input type="text" id="old_password" maxlength="6" class="form-control" name="old_password" placeholder="Old Password" required="required" autofocus />
        <input type="password" id="new_password" maxlength="6" class="form-control" name="new_password" placeholder="New Password" required="required" />
        <input type="password" id="confirm_password" maxlength="6" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required" />

        <button name="change_password_submit" class="btn btn-lg btn-primary btn-block" type="submit">Save Change</button>
    </form>
    <?php } else { ?>
        <div class="alert alert-danger">User ID not given. </div>    
    <?php } ?>
     
</body>
</html>