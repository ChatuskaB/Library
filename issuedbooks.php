 <?php  

     session_start();

 include('includes/config.php');

 $id = $_SESSION['id'];
 $bookresults = mysqli_query($db, "SELECT * FROM issuedbookdetails WHERE studentid = $id");


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
    <h2>Issued Books</h2>
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
      <th>Book Name</th>
      <th>Book Code</th>
      <th>Issued Date</th>
      <th>Return Date</th>
      <th>Fine</th>
    </tr>
  </thead>
  
<tbody>
    <?php while ($row = mysqli_fetch_array($bookresults)) { ?>
  <tr>
      <td><?php echo $row['bookname']; ?></td>
      <td><?php echo $row['bookcode']; ?></td>
      <td><?php echo $row['issueddate']; ?></td>
       <td><?php echo $row['returndate']; ?></td>
      <td><?php echo $row['fine']; ?></td>
  </tr>
    <?php } ?>
</tbody>
</table>






</body>
</html>