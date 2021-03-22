<?php  

    session_start();
    
	// initialize variables
	$username = "";
	$email = "";
    $password = "";
	$usertype = 2;
    $active = 1;


 include('includes/config.php');

    //save button click
	if (isset($_POST['reg_user'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];


	if($username != "" && $email != "" && $password != ""){

	 mysqli_query($db, "INSERT INTO tbuser (username, email, password, usertype, active) VALUES ('$username', '$email',  '$password', '$usertype', '$active')"); 

           $_SESSION['message'] = "Data saved";
        }else{
          $_SESSION['message'] = "Enter Valid Details";
        }
		header('location: register.php');
	}



?>