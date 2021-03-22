 <?php  

  include('manageissuedbooksserver.php');

   if(isset($_GET['edi'])){
    $id = $_GET['edi'];
    $edit_state  = true;
    $xyz = mysqli_query($db,"select issuedbookdetails.studentid, issuedbookdetails.bookname,issuedbookdetails.bookcode,issuedbookdetails.issueddate,tbuser.username from issuedbookdetails inner join tbuser on issuedbookdetails.studentid = tbuser.id WHERE issuedbookdetails.id = $id");
    $record = mysqli_fetch_assoc($xyz);
    $membername = $record['username'];
    $memberid = $record['studentid'];
    $bookname = $record['bookname'];
    $bookcode = $record['bookcode'];
    $issueddate = $record['issueddate'];
    // $id = $record['id'];

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
    <h2>MANAGE ISSUED BOOKS</h2>
  </div>

<?php if (isset($_SESSION['message'])): ?>
  <div class="msg">
    <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    ?>
  </div>
<?php endif ?>


  <form method="post" action="manageissuedbooksserver.php"  autocomplete="off">

    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="input-group">
      <label>Member Name</label>
      <input type="text" name="membername" value="<?php echo $membername; ?>"  readonly>
    </div>
    <div class="input-group">
      <label>Member ID</label>
      <input type="text" name="memberid" value="<?php echo $memberid; ?>" >
    </div>
    <div class="input-group">
      <label>Book Name</label>
      <input type="text" name="bookname" value="<?php echo $bookname; ?>" readonly>
    </div>
    <div class="input-group">
      <label>Book Code</label>
      <input type="text" name="bookcode" value="<?php echo $bookcode; ?>" readonly>
    </div>
    <div class="input-group">
      <label>Issued Date</label>
      <input type="text" name="issueddate" value="<?php echo $issueddate; ?>" readonly>
    </div>
    <div class="input-group">
      <label>Fine</label>
      <input type="text" name="fine">
    </div>

    <div class="input-group">
      <?php if ($edit_state == true): ?>
  <button class="btn" type="submit" name="bookreturn" style="background: #556B2F;" >Return Book</button>
<?php else: ?>
<?php endif ?>
    </div>
  </form>


<table>
  <thead>
    <tr>
      <th>Member Name</th>
      <th>Member ID</th>
      <th>Book Name</th>
      <th>Book Code</th>
      <th>Issued Date</th>
      <th >Return</th>
    </tr>
  </thead>
  
<tbody>
    <?php while ($row = mysqli_fetch_array($bookresults)) { ?>
  <tr>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['studentid']; ?></td>
      <td><?php echo $row['bookname']; ?></td>      
      <td><?php echo $row['bookcode']; ?></td>
      <td><?php echo $row['issueddate']; ?></td>
     <td>
        <a  class="edit_btn" href="manageissuedbooks.php?edi=<?php echo $row['id']; ?>">Return</a>
     </td>
  </tr>
    <?php } ?>
</tbody>
</table>

</body>
</html>