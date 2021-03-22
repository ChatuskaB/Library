 <?php  

  include('bookserver.php');

   if(isset($_GET['edi'])){
    $id = $_GET['edi'];
    $edit_state  = true;
    $xyz = mysqli_query($db,"SELECT * FROM addbook WHERE id = $id");
    $record = mysqli_fetch_assoc($xyz);
    $bookname = $record['bookname'];
    $author = $record['author'];
    $category = $record['category'];
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
    <h2>Add Books</h2>
  </div>


<?php if (isset($_SESSION['message'])): ?>
  <div class="msg">
    <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    ?>
  </div>
<?php endif ?>





  <form method="post" action="bookserver.php"  autocomplete="off">

    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="input-group">
      <label>Book Name</label>
      <input type="text" name="bookname" value="<?php echo $bookname; ?>">
    </div>
    <div class="input-group">
      <label>Author</label>
      <input type="text" name="author" value="<?php echo $author; ?>">
    </div>
    <div class="input-group">
      <label>Category</label>
      <input type="text" name="category" value="<?php echo $category; ?>">
    </div>
        <div class="input-group">
      <label>Book Code</label>
      <input type="number" name="bookcode" value="<?php echo $bookcode; ?>">
    </div>
    <div class="input-group">
      <?php if ($edit_state == true): ?>
  <button class="btn" type="submit" name="bookupdate" style="background: #556B2F;" >update</button>
<?php else: ?>
  <button class="btn" type="submit" name="booksave" >Save</button>
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
      <th >Edit</th>
      <th >Delete</th>
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
        <a  class="edit_btn" href="addBook.php?edi=<?php echo $row['id']; ?>">Edit</a>
     </td>
      <td>
      <a class="del_btn" href="bookserver.php?del=<?php echo $row['id']; ?>">Delete</a>
     </td>
  </tr>
    <?php } ?>
</tbody>
</table>






</body>
</html>