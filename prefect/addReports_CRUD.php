<?php include "../includes/db.php"; 
session_start();

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
if(isset($_POST['submitJHS']))
{
	$acad_year = $_POST['acad_year'];
    $acad_sem = $_POST['acad_sem'];
    $rep_date = $_POST['date'];
    $rep_time = $_POST['time'];
    $dept_code = $_POST['dept_code'];
    $stud_id = $_POST['stud_idnum'];
    $stud_name = $_POST['stud_name'];
    $grade_section = $_POST['grade_section'];
    $vio_type = $_POST['violation-type'];
    $vio_desc = $_POST['violation-desc'];
    $additional_person = $_POST['additional-person'];
    $discip_action = $_POST['discip-action'];
    $cs_location = $_POST['cs-loc'];
    $cs_hours = $_POST['cs-hours'];
    $cs_status = $_POST['cs-status'];
	$discip_id = $_POST['discip-id'];
	
	//To check if required fields have contents
	if(!empty($acad_year) && !empty($acad_sem) &&!empty($rep_date) && !empty($rep_time) && !empty($dept_code) && !empty($stud_id) && !empty($stud_name) && !empty($grade_section) && !empty($vio_type) && !empty($vio_desc) && !empty($discip_action) && !empty($discip_id))
	{
		//for non-required fields
		if(empty($additional_person))
		{
			$additional_person = 'n/a';
		}

		if(empty($cs_location))
		{
			$cs_location = 'n/a';
		}

		if(empty($cs_hours))
		{
			$cs_hours = 0;
		}

		if(empty($cs_status))
		{
			$cs_status = 'n/a';
		}
		
		//MAIN INSERTION QUERY
		$query = "INSERT INTO prefect_reports VALUES('', '$acad_year', '$acad_sem', '$dept_code', '$rep_date', '$rep_time', '$stud_id', '$stud_name', '$grade_section', '$vio_type', '$vio_desc', '$additional_person', '$discip_action', '$cs_location', '$cs_hours', '$cs_status', '$discip_id');";

		$RESULT = mysqli_query($con, $query);
		
		// if(mysqli_query($con, $query))
		// {
		if($RESULT)
		{
			$_SESSION['status'] = "Record saved!";
			$_SESSION['status_icon'] = "success";
			header('Location: reports.php');
		}
		else if(!$RESULT)
		{
			die("QUERY FAILED" . mysqli_error($con));
		}
		else
    	{
			$_SESSION['status'] = "Record was not saved!";
			$_SESSION['status_icon'] = "error";
			header('Location: reports.php');
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