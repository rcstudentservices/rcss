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
	$get_admin->bind_result($admin_username);
    $get_admin->fetch();
}


//get today's date
$created_on = date('Y-m-d');

if(isset($_POST['submitJHS']))
{
	$default_password = password_hash('rogate', PASSWORD_DEFAULT);
    $emp_num = $_POST['emp_num'];
	$job_code = $_POST['job_code'];
	$emp_office = $_POST['emp_office'];
	$emp_fname = $_POST['emp_fname'];
	$emp_mname = $_POST['emp_mname'];
	$emp_lname = $_POST['emp_lname'];
	$emp_address = $_POST['emp_address'];
	$emp_email = $_POST['emp_email'];
	$emp_contactnum = $_POST['emp_contactnum'];
	
	//To check if required fields have contents
	if(!empty($emp_num) && !empty($job_code) && !empty($emp_office) && !empty($emp_fname) && !empty($emp_lname) && !empty($emp_address) && !empty($emp_email) && !empty($emp_contactnum))
	{
		if(empty($emp_mname))
		{
			$emp_mname = 'n/a';
		}
		
		//check 
		$get_all_id = "SELECT emp_num from tbl_emp";
		$get_id_result = mysqli_query($con, $get_all_id);
		while($id_result = mysqli_fetch_assoc($get_id_result))
		{
			if($emp_num == $id_result['emp_num'])
			{
				$flag = 1;
			}
		} 
		
		if($flag != 1)
		{
			//MAIN INSERTION QUERY
			$query = "INSERT INTO tbl_emp VALUES('', '$emp_num', '$default_password', '$job_code', '$emp_office', '$emp_lname', '$emp_fname', '$emp_mname', '$emp_address', '$emp_contactnum', '$emp_email', '', '$created_on', '$admin_username');";

			$RESULT = mysqli_query($con, $query);

			if($RESULT)
			{
				$_SESSION['status'] = "Record saved!";
				$_SESSION['status_icon'] = "success";
				header('Location: add_employee.php');
			}
			else if(!$RESULT)
			{
				die("QUERY FAILED" . mysqli_error($con));
			}
			else
    		{
       	 		$_SESSION['status'] = "Record was not saved!";
				$_SESSION['status_icon'] = "error";
				header('Location: add_employee.php');
    		}
		}
		else
		{
			$_SESSION['status'] = "ID Number already exists!";
			$_SESSION['status_icon'] = "error";
			header('Location: add_employee.php');
		}
	}
	else
		{
		$_SESSION['status'] = "Complete all fields!";
		$_SESSION['status_icon'] = "error";
		header('Location: reports.php');
		}
}
?>