<?php include_once('header.php'); ?>
 
<?php
if(isset($_POST['change_password_submit'])) {

$user_id = $_POST['user_id'];    
$old_password   = $_POST['old_password'];    
$new_password   = $_POST['new_password'];  
$confirm_password = $_POST['confirm_password'];      
 
change_password($user_id, $old_password, $new_password, $confirm_password);

} 

?>

<?php include_once('footer.php');   

