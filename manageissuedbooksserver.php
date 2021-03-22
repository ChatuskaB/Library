<?php  

    session_start();
    include('includes/config.php');

          // initialize variables
  $membername = "";
  $memberid = "";
  $bookname = "";
  $bookcode = "";
  $issueddate = "";
  $id = 0;
  $edit_state  = false;


       //display
  $bookresults = mysqli_query($db, "select issuedbookdetails.id,issuedbookdetails.studentid, issuedbookdetails.bookname,issuedbookdetails.bookcode,issuedbookdetails.issueddate,tbuser.username from issuedbookdetails inner join tbuser on issuedbookdetails.studentid = tbuser.id WHERE (issuedbookdetails.issued = '1') ");


    // bookreturn button click
  if (isset($_POST['bookreturn'])) {
    $id = $_POST['id'];
    $fine = $_POST['fine'];
    $bookcode = $_POST['bookcode'];
    
  mysqli_query($db, "UPDATE issuedbookdetails SET issued='0',returndate=NOW(), fine = '$fine'  WHERE bookcode=$bookcode"); 

  mysqli_query($db, "UPDATE addbook SET issued='0' WHERE bookcode=$bookcode");

     $_SESSION['message'] = "Book Returned Successfully!";  
    header('location: manageissuedbooks.php');
  }

?>
