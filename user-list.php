<?php
/*
* Users List | Site Codematra
*/
include_once('header.php'); 
if(isset($_SESSION['uid'])) {
?>
<?php
// Single Record Delete Option
if(isset($_GET['action']) && ($_GET['action']=='delete') && isset($_GET['userid'])) {
  $user_id = $_GET['userid']; 
  if(isset($_GET['confirmation']) && ($_GET['confirmation']=='yes')) {
    $output = delete_user($user_id);
    if($output) {
      echo "<div class='alert alert-success'>1 record has been deleted.</div>";
    }
  } else {
    echo "<div class='alert alert-warning'>Are you sure? You want to delete this user <a href='user-list.php?action=delete&confirmation=yes&userid=$user_id'>Yes</a> <a href='user-list.php'>No</a></div>";
  }
}
        
// Bulk Record Delete Option
if(isset($_GET['action']) && ($_GET['action']=='deleteall') && isset($_GET['type']) && ($_GET['type']='users')) {
  if(isset($_GET['confirmation']) && ($_GET['confirmation']=='yes')) {
    $output = delete_all_user();
    if($output) {
      echo "<div class='alert alert-success'>All records has been deleted.</div>";
      header("Location: signup.php");
      die();
    }
  } else { 
    echo "<div class='alert alert-warning'>Are you sure? You want to delete all users. <a href='user-list.php?action=deleteall&type=users&confirmation=yes'>Yes</a> <a href='user-list.php'>No</a></div>";
  }
}

$users = get_users(); 
?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-striped bg-white" style="font-size: 12px; " >
        <thead>
          <tr> 
            <th scope="col">S. No.</th>
            <th scope="col">User ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if($users) {
            $count = 1;
            foreach($users as $user) {?>  
            <tr> 
              <td><?php echo $count; ?></td>
              <td><?php echo $user['id']; ?></td>
              <td><?php echo $user['name']; ?></td>
              <td><?php echo $user['email']; ?></td>
              <td><?php echo $user['phone']; ?></td>
              <td><?php echo $user['reg_date']; ?></td> 
              <td >
                <a style="font-size: 10px; " class="btn btn-primary btn-sm" href="edit-user.php?userid=<?php echo $user['id']; ?>">Edit</a>
                <a style="font-size: 10px; " class="btn btn-primary btn-sm" href="change-password.php?userid=<?php echo $user['id']; ?>">Change Password</a>
                <a style="font-size: 10px; " class="btn btn-danger btn-sm" href="user-list.php?action=delete&userid=<?php echo $user['id']; ?>">Delete</a>
              </td> 
            </tr>
            <?php $count++;
              } 
          } ?>
        </tbody>
      </table>
             
    </div>
    <div class="col-12"><a class="btn btn-danger float-right" href="user-list.php?action=deleteall&type=users">Delete All</a></div>
  </div>
</div>
<?php 
} else {
  header("Location: login.php");
  die();
}
include_once('footer.php'); 