<?php

/*
 * Table Creation 
 */
create_user_table();   

/*
 * Create Registration Table 
 */
function create_user_table() { 
    
    global $connection; 
    
    $sql = "SELECT * FROM users";  
    $result = mysqli_query($connection, $sql);
    if(!$result) {
        
    $sql = "CREATE TABLE users (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		registration_id VARCHAR(30) NOT NULL, 
		name VARCHAR(30) NOT NULL,
		email VARCHAR(50),
		phone VARCHAR(50),
		password VARCHAR(50),
		role VARCHAR(50),    
		status VARCHAR(50),
		activation_key VARCHAR(50), 
		reg_date TIMESTAMP 
		)";

    mysqli_query($connection, $sql);   
    
    }
    
}

/*
 * Change Password
 */
function change_password($user_id, $old_password, $new_password, $confirm_password) {
    
    global $connection; 
    
    $sql = "SELECT password FROM users WHERE id='$user_id'";
    $result = mysqli_query($connection, $sql);
    if($result) {
        $num_rows = mysqli_num_rows($result);
        if($num_rows>0) {
           $row = mysqli_fetch_assoc($result);
           $db_password = $row['password'];
        }
    }
    
    // Check Password
    if($db_password===$old_password) {
        // Update Password
        $sql = "UPDATE users
                SET password='$confirm_password'
                WHERE id='$user_id'"; 
        $result = mysqli_query($connection, $sql);
        // It return 1 or 0;  
        if($result) { 
            echo "Password updated successfully."; 
        } else {
            echo "Password not updated. Please try again."; 
        } 
        
    } else { 
        echo "Old Password incorrect.";  
    }
    
}


/*
 * Function For Retrive All Users Information
 */
function get_users() {
    
    global $connection; 
    $rows = array();
    
    $sql = 'SELECT * FROM users';
    $result = mysqli_query($connection, $sql); 
    
    if($result) {
        $num_rows = mysqli_num_rows($result);
        if($num_rows>0) {
             for($r=1;$r<=$num_rows;$r++) {
                  $row = mysqli_fetch_assoc($result);
                  $rows[] = $row;
             }
        }
    }
    
    return $rows; 
}

/*
 * Get User By ID
 */
function get_user_by_id($user_id){
    
    global $connection; 
    
    $sql = "SELECT name, email, phone FROM users WHERE id='$user_id'";  
    $result = mysqli_query($connection, $sql); 
    
    if($result) {
        $row = mysqli_fetch_assoc($result);
    }
    
    return $row; 
    
}

/*
 * Delete User 
 */
function delete_user($user_id) {
    global $connection; 
    $output = 0; 
    if($user_id) {
        $sql = "DELETE FROM users WHERE id='$user_id'";       
        $result = mysqli_query($connection, $sql);
        
        if($result) {
            $output = $result;  
        } 
    } 
    
    return $output;
    
}

/*
 * Delete All User 
 */
function delete_all_user() {
    global $connection; 
 
        $sql = "DELETE FROM users";       
        $result = mysqli_query($connection, $sql);
        
        if($result) {
            $output = $result;  
        } 
    
    return $output;
    
}

/*
 * Drop Table
 */
function drop_table($table_name) { 
     
    global $connection;
    $output = 0;  
    
    if($table_name!='') {
        $sql = "DROP TABLE $table_name";
        $result = mysqli_query($connection, $sql); 

        if($result) {
            // Return 1 if dropped table. 
            $output = $result;
        } 
    }
     
    return $output; 
}