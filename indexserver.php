<?php  

    session_start();
    
	// initialize variables
	$username = "";
    $password = "";



 include('includes/config.php');

    //Admin Login click
	if (isset($_POST['adminlogin'])) {
		$username = $_POST['username'];
		$password = $_POST['password']; 


	if($username != "" && $password != ""){
     
         $xyz = mysqli_query($db, "SELECT * FROM tbuser WHERE (username='$username' AND password='$password' AND usertype=1)");
         $row = mysqli_fetch_assoc($xyz);
         $rowcount=mysqli_num_rows($xyz);


        if($rowcount >= 1){
        	 	header('location: dashboard.php');

     $id=$row['id'];
     $username=$row['username'];
     $usertype=$row['usertype'];

     $_SESSION['id']=$id;
     $_SESSION['username']=$username;
     $_SESSION['usertype']=$usertype;
     $_SESSION['success']="you are now logged in";

        }else{
           $_SESSION['message'] = "Enter  Valid Details";
           header('location: index.php');
        }

        }else{
          $_SESSION['message'] = "Enter Valid Details";
           header('location: index.php');
        }
	}

    //User Login click
	if (isset($_POST['userlogin'])) {
		$username = $_POST['username'];
		$password = $_POST['password']; 


	if($username != "" && $password != ""){
     
         $xyz = mysqli_query($db, "SELECT * FROM tbuser WHERE (username='$username' AND password='$password' AND usertype=2)");
          $row = mysqli_fetch_assoc($xyz);
         $rowcount=mysqli_num_rows($xyz);


        if($rowcount >= 1){

                  header('location: dashboard.php');



     $id=$row['id'];
     $username=$row['username'];
     $usertype=$row['usertype'];

     $_SESSION['id']=$id;
     $_SESSION['username']=$username;
     $_SESSION['usertype']=$usertype;
     $_SESSION['success']="you are now logged in";


        }else{
           $_SESSION['message'] = "Enter  Valid Details";
            header('location: index.php');
        }

        }else{
          $_SESSION['message'] = "Enter Valid Details";
           header('location: index.php');
        }
	
	}

?>