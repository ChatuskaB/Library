
 <?php  

  include('issuenewbookserver.php');

   if(isset($_GET['edi'])){
    $id = $_GET['edi'];
    $edit_state  = true;
    $xyz = mysqli_query($db,"SELECT * FROM addbook WHERE id = $id");
    $record = mysqli_fetch_assoc($xyz);
    $bookname = $record['bookname'];
    $bookcode = $record['bookcode'];
    $id = $record['id'];

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
    <h2>ISSUE A NEW BOOK</h2>
  </div>

<?php if (isset($_SESSION['message'])): ?>
  <div class="msg">
    <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    ?>
  </div>
<?php endif ?>


    <form id="myForm" method="post" action="issuenewbookserver.php"  autocomplete="off">

    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="input-group">
      <label>Book Name</label>
      <input type="text" name="bookname"  value="<?php echo $bookname; ?>"  readonly>
    </div>
    <div class="input-group">
      <label>Book Code</label>
      <input type="text" name="bookcode" value="<?php echo $bookcode; ?>" readonly>
    </div>
    <div class="input-group">
      <label>Member ID</label>
      <input type="text" name="memberid">
    </div>
    <div class="input-group">
      <?php if ($edit_state == true): ?>
  <button class="btn" type="submit" name="bookupdate" style="background: #556B2F;" >Issue Book</button>
<?php else: ?>
<?php endif ?>
    </div>
  </form>


<table>
  <thead>
    <tr>
      <th>Book Name</th>
      <th>Author</th>
      <th>Category</th>
      <th>Book Code</th>
      <th >Issue</th>
    </tr>
  </thead>
  
<tbody>
    <?php while ($row = mysqli_fetch_array($bookresults)) { ?>
  <tr>
      <td><?php echo $row['bookname']; ?></td>
      <td><?php echo $row['author']; ?></td>
      <td><?php echo $row['category']; ?></td>      
      <td><?php echo $row['bookcode']; ?></td>
     <td>
        <a  class="edit_btn" href="issuenewbook.php?edi=<?php echo $row['id']; ?>">Issue</a>
     </td>
  </tr>
    <?php } ?>
</tbody>
</table>

</body>
</html>


