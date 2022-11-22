<?php include "../includes/db.php";
    session_start();
?>

<?php
$id = $_SESSION['a_id'];

if(isset($_POST['cancel']))
{
    header('Location: add_acadyear.php');
}

if(isset($_POST['submitAcadyear']))
{   
    $acad_year_start = $_POST['acad_year_start'];
    $acad_year_end = $_POST['acad_year_end'];
    $acad_sem = $_POST['acad_sem'];
	
	if(!empty($acad_year_start) && !empty($acad_year_end) && !empty($acad_sem))
	{
		$acad_year = "A.Y. ".$acad_year_start."-".$acad_year_end;
	
		$query_check = "SELECT acadyear_desc, acadyear_sem FROM tbl_academicyear";
		$get_acadyear = mysqli_query($con, $query_check);
		while($row=mysqli_fetch_assoc($get_acadyear))
		{
			if($acad_year == $row['acadyear_desc'] && $acad_sem == $row['acadyear_sem'])
				{
					$flag = 1;
				}
		}
	
		if($flag!=1)
		{
			$query = "INSERT INTO tbl_academicyear VALUES ('','$acad_year','$acad_sem','Not Yet Started'); ";
    		$save_acadyear = mysqli_query($con, $query);

    		if($save_acadyear)
    		{
        		$_SESSION['status'] = "Data Saved!";
        		$_SESSION['status_icon'] = "success";
        		header('Location: add_acadyear.php');
    		}
			else if(!$RESULT)
			{
				die("QUERY FAILED" . mysqli_error($con));
			}
    		else
    		{
        		$_SESSION['status'] = "Data Not Saved!";
        		$_SESSION['status_icon'] = "error";
        		header('Location: add_acadyear.php');
    		}
		}
		else
		{
			$_SESSION['status'] = "Academic Year and Semester already exists!";
			$_SESSION['status_icon'] = "error";
			header('Location: add_acadyear.php');
		}
	}
	else
	{
		$_SESSION['status'] = "Complete all fields!";
		$_SESSION['status_icon'] = "error";
		header('Location: add_acadyear.php');
	}
 
}

if(isset($_POST['updateacadyear']))
{
	$acad_year_modal = $_POST['acad_year_modal'];
	$semester_modal = $_POST['semester_modal'];
	$status_modal = $_POST['status_modal'];
	
	if(!empty($acad_year_modal) && !empty($semester_modal) && !empty($status_modal))
	{
		$updatestat_query = "UPDATE tbl_academicyear SET acadyear_status = '$status_modal' WHERE acadyear_desc ='$acad_year_modal' AND acadyear_sem='$semester_modal'";
		$updated_stat = mysqli_query($con,$updatestat_query);
		
		if($updated_stat)
		{
			$_SESSION['status'] = "Data Updated!";
        	$_SESSION['status_icon'] = "success";
        	header('Location: add_acadyear.php');
		}
		else if(!$RESULT)
		{
			die("QUERY FAILED" . mysqli_error($con));
		}
		else
    		{
        		$_SESSION['status'] = "Data Not Saved!";
        		$_SESSION['status_icon'] = "error";
        		header('Location: add_acadyear.php');
    		}
	}
	else
	{
		$_SESSION['status'] = "Complete all fields!";
		$_SESSION['status_icon'] = "error";
		header('Location: add_acadyear.php');
	}
}
?>