<?php include "../includes/db.php"; ?>

<?php
session_start();

$id = $_SESSION['a_id'];

//get admin who's creating the account
$get_admin = $con -> prepare('SELECT username FROM admin WHERE id = ?');
$get_admin->bind_param('s', $id);
   $get_admin->execute();
   $get_admin->store_result();

if ($get_admin->num_rows > 0) 
{
	$get_admin->bind_result($admin_username_active);
    $get_admin->fetch();
}


//get today's date
$created_on = date('Y-m-d');

if(isset($_POST['submitAdmin']))
{
	$default_password = password_hash('rogate', PASSWORD_DEFAULT);
    $admin_username = $_POST['admin_username'];
	$admin_fname = $_POST['admin_fname'];
	$admin_mname = $_POST['admin_mname'];
	$admin_lname = $_POST['admin_lname'];
	$admin_email = $_POST['admin_email'];
	$admin_contnum = $_POST['admin_contnum'];
	$admin_address = $_POST['admin_address'];
	
	
	
	//To check if required fields have contents
	if(!empty($admin_username) && !empty($admin_fname) && !empty($admin_lname) && !empty($admin_email) && !empty($admin_contnum) && !empty($admin_address) )
	{
		if(empty($admin_mname))
		{
			$admin_mname = 'n/a';
		}
		
		//check 
		$get_admin_id = "SELECT username from admin";
		
		$get_id_result = mysqli_query($con, $get_admin_id);
		
		while($id_result = mysqli_fetch_assoc($get_id_result))
		{
			if($admin_username == $id_result['username'])
			{
				$flag = 1;
			}
		} 
		
		if($flag != 1)
		{
			//MAIN INSERTION QUERY
			$query = "INSERT INTO admin VALUES('', '$admin_username', '$default_password', '$admin_fname', '$admin_mname', '$admin_lname', '$admin_address', '$admin_contnum', '$admin_email', '', '$created_on', '$admin_username_active');";

			$RESULT = mysqli_query($con, $query);

			if($RESULT)
			{
				$_SESSION['status'] = "Record saved!";
				$_SESSION['status_icon'] = "success";
				header('Location: add_admin.php');
			}
			else if(!$RESULT)
			{
				die("QUERY FAILED" . mysqli_error($con));
			}
			else
    		{
       	 		$_SESSION['status'] = "Record was not saved!";
				$_SESSION['status_icon'] = "error";
				header('Location: add_admin.php');
    		}
		}
		else
		{
			$_SESSION['status'] = "ID Number already exists!";
			$_SESSION['status_icon'] = "error";
			header('Location: add_admin.php');
		}
	}
	else
		{
		$_SESSION['status'] = "Complete all fields!";
		$_SESSION['status_icon'] = "error";
		header('Location: add_admin.php');
		}
}
?>