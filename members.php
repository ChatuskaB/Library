 <?php  

     session_start();


 include('includes/config.php');

 $bookresults = mysqli_query($db, "SELECT * FROM tbuser");




    //delete
  if (isset($_GET['del'])) {
    $id = $_GET['del'];

    mysqli_query($db, "DELETE FROM tbuser WHERE  id=$id");
    $_SESSION['message'] = "Member Deleted Successfully"; 
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
    <h2>Manage Members</h2>
  </div>

<?php if (isset($_SESSION['message'])): ?>
  <div class="msg">
    <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    ?>
  </div>
<?php endif ?>




<table>
  <thead>
    <tr>
      <th>Member ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Delete</th>
    </tr>
  </thead>
  
<tbody>
    <?php while ($row = mysqli_fetch_array($bookresults)) { ?>
  <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['email']; ?></td>
            <td>
      <a class="del_btn" href="members.php?del=<?php echo $row['id']; ?>">Delete</a>
     </td>
  </tr>
    <?php } ?>
</tbody>
</table>






</body>
</html>