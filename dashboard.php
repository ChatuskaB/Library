 <?php  
     session_start();
    



 include('includes/config.php');

  ?>

<!DOCTYPE html>
<html>
<head>
  <title>LMS</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

<?php if (isset($_SESSION['username'])): ?>
  <div class="msg">
 <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
  </div>
<?php endif ?>



          <?php   if($_SESSION['usertype'] == 1)
          {
            ?>
          <div class="box1">
    <h2><a href="addBook.php"> Add Books </a></h2>
  </div>
        <?php }?>




          <?php   if($_SESSION['usertype'] == 1)
          {
            ?>
           <div class="box2">
  <h2><a href="members.php"> Members </a></h2>
  </div>
        <?php }?>


     <?php   if($_SESSION['usertype'] == 1)
          {
            ?>
           <div class="box3">
  <h2><a href="issuenewbook.php"> Issue New Book </a></h2>
  </div>
        <?php }?>

            <?php   if($_SESSION['usertype'] == 1)
          {
            ?>
           <div class="box4">
  <h2><a href="manageissuedbooks.php"> Manage Issued Books </a></h2>
  </div>
        <?php }?>






          <?php   if($_SESSION['usertype'] == 2)
          {
            ?>
           <div class="box3">
    <h2><a href="userprofile.php"> User Profile </a></h2>
  </div> 
        <?php }?>


                <?php   if($_SESSION['usertype'] == 2)
          {
            ?>
            <div class="box4">
    <h2><a href="issuedbooks.php"> Issued Books </a></h2>
  </div>
        <?php }?>

</body>
</html>