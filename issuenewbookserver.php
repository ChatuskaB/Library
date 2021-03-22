<?php  

    session_start();

  // initialize variables
  $bookname = "";
  $author = "";
  $category = "";
  $bookcode = "";
  $id = 0;
  $edit_state  = false;


 include('includes/config.php');

        //display
  $bookresults = mysqli_query($db, "SELECT * FROM addbook WHERE   issued= '0' ");




    //save button click
  if (isset($_POST['bookupdate'])) {
    $bookname = $_POST['bookname'];
    $bookcode = $_POST['bookcode'];
    $memberid = $_POST['memberid'];


    if($memberid != ""){
        mysqli_query($db, "INSERT INTO issuedbookdetails (bookname, bookcode,studentid,issued,issueddate) VALUES ('$bookname','$bookcode','$memberid','1',NOW())"); 

  mysqli_query($db, "UPDATE addbook SET issued='1' WHERE bookcode=$bookcode");

     $_SESSION['message'] = "Book Issued Successfully!";  
    header('location: issuenewbook.php');

    }
    else{

	       $_SESSION['message'] = "Enter Valid Details";
           header('location: issuenewbook.php');
    }

  }
  
?>

