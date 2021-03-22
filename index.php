<?php include('indexserver.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>LMS</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>



<div class="row">
  <div class="column">&nbsp;</div>
  <div class="column">&nbsp;</div>
  <div class="column">&nbsp;</div>
</div>
        <div class="regheader">
    <h2>Log In</h2>
  </div>


<?php if (isset($_SESSION['message'])): ?>
  <div class="msg">
    <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    ?>
  </div>
<?php endif ?>
  
  <form method="post" action="indexserver.php" autocomplete="off">

    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="adminlogin">Admin Login</button>
      <button type="submit" class="btn" name="userlogin">User Login</button>
    </div>
    <p>
      Not Yet a Member? <a href="register.php">Sign up</a>
    </p>
  </form>
</body>
</html>