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

    //save button click
	if (isset($_POST['booksave'])) {
		$bookname = $_POST['bookname'];
		$author = $_POST['author'];
		$category = $_POST['category'];
		$bookcode = $_POST['bookcode'];

if($bookname != "" && $author != "" && $category != "" && $bookcode != ""){

		mysqli_query($db, "INSERT INTO addbook (bookname, category, author, bookcode,issued) VALUES ('$bookname', '$author','$category','$bookcode','0')"); 
		$_SESSION['message'] = "Book Saved Successfully!"; 
		header('location: addBook.php');
}

	
else{
	       $_SESSION['message'] = "Enter Valid Details";
           header('location: addBook.php');
}
	
	}

     //display
	$bookresults = mysqli_query($db, "SELECT * FROM addbook");

	     //update
    if (isset($_POST['bookupdate'])) {

        $id = $_POST['id'];
		$bookname = $_POST['bookname'];
		$author = $_POST['author'];
		$category = $_POST['category'];
	    $bookcode = $_POST['bookcode'];

	    mysqli_query($db, "UPDATE addbook SET bookname='$bookname', category='$category',author='$author', bookcode='$bookcode' WHERE id=$id");

	$_SESSION['message'] = "Book Updated Successfully!"; 
	header('location: addBook.php');
}


    //delete
	if (isset($_GET['del'])) {
		$id = $_GET['del'];

		mysqli_query($db, "DELETE FROM addbook WHERE  id=$id");
		$_SESSION['message'] = "Book Deleted Successfully!"; 
		header('location: addBook.php');
	}


?>

