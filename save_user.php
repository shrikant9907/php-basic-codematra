<?php include_once('header.php'); ?>
<?php


if(isset($_POST['save_user'])) {
  
    global $connection; 
    
    $user_id = $_POST['user_id'];
    
    $name = ucwords(trim($_POST['full_name']));  
    $email = trim($_POST['user_email']); 
    $phone = trim($_POST['user_phone']);  
    $role = trim($_POST['user_role']);  
    
    // Update User Profile
    $sql = "UPDATE users
            SET name='$name', email='$email', phone='$phone', role='$role' 
            WHERE id='$user_id'"; 
     
    $result = mysqli_query($connection, $sql);
    
    // It return 1 or 0;  
    if($result) {  
        echo "User Profile Updated. <a href='user-list.php'>View Users List</a>"; 
    } else {
        echo "User Profile not updated. Please try again."; 
    } 
    
} else {
    echo "User ID Not Given"; 
}

?>
<?php include_once('footer.php'); ?> 