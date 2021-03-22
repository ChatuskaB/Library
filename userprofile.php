<?php 

     session_start();

 include('includes/config.php');

    $id = $_SESSION['id'];
    $xyz = mysqli_query($db,"SELECT * FROM tbuser WHERE id = $id");
    $record = mysqli_fetch_assoc($xyz);
    $username = $record['username'];
    $email = $record['email'];
    $password = $record['password'];

           //update
    if (isset($_POST['btnupdate'])) {

    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

  mysqli_query($db, "UPDATE tbuser SET username='$username', email='$email',password='$password' WHERE id=$id");
  $_SESSION['message'] = "Details Updated Successfully!"; 
}


?>



<!DOCTYPE html>
<html>
<head>
  <title>LMS</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

 <?php 
 include('includes/header.php');
 ?>

<div class="row">
  <div class="column">&nbsp;</div>
  <div class="column">&nbsp;</div>
  <div class="column">&nbsp;</div>
</div>
        <div class="regheader">
    <h2>User Details</h2>
  </div>

<?php if (isset($_SESSION['message'])): ?>
  <div class="msg">
    <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    ?>
  </div>
<?php endif ?>
  
  <form method="post" action="userprofile.php" autocomplete="off">
 <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" value="<?php echo $username; ?>" >
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="text" name="email" value="<?php echo $email; ?>" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password" value="<?php echo $password; ?>">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="btnupdate" >Update</button>
    </div>
  </form>
</body>
</html>