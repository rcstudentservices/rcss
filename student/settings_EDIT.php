<?php include "../includes/db.php";
    session_start();
?>

<?php
$id = $_SESSION['sid'];

if(isset($_POST['cancel']))
{
    header('Location: profile.php');
}

if(isset($_POST['update_acc']))
{   
    $emp_fname = $_POST['emp_fname'];
    $emp_mname = $_POST['emp_mname'];
    $emp_lname = $_POST['emp_lname'];
    $job_code = $_POST['job_code'];
    $emp_email = $_POST['emp_email'];
    $emp_contactnum = $_POST['emp_contactnum'];
    $emp_address = $_POST['emp_address'];

    $query = "UPDATE tbl_emp SET emp_fname='$emp_fname', emp_mname='$emp_mname', emp_lname='$emp_lname', job_code='$job_code', emp_email='$emp_email', emp_contactnum='$emp_contactnum', emp_address='$emp_address' WHERE id='$id' ";
    $acc_editquery = mysqli_query($con, $query);

    if($acc_editquery)
    {
        $_SESSION['status'] = "Data Updated!";
        $_SESSION['status_icon'] = "success";
        header('Location: profile.php');
    }
    else
    {
        $_SESSION['status'] = "Data Not Updated!";
        $_SESSION['status_icon'] = "error";
        header('Location: profile.php');
    }
}

else if(isset($_POST['update_pass']))
{   
    $old_pass = $_POST['oldpass'];
	$new_pass = $_POST['newpass'];  
    $emp_password = password_hash($new_pass, PASSWORD_DEFAULT); // Creates a password hash
	$confirm_pass = $_POST['confpass'];
	
	$get_old_password = "SELECT emp_password FROM tbl_emp WHERE id=$id; ";
	
	$existing_pass = mysqli_query($con, $get_old_password);
		
	while ($previous_pass = mysqli_fetch_array($existing_pass,MYSQLI_ASSOC)):;
		$fromdb_password = $previous_pass['emp_password'];
	endwhile;
	
	if($old_pass == $fromdb_password)
	{
		if($new_pass == $confirm_pass)
		{
			$change_pass_query = "UPDATE tbl_emp SET emp_password='$emp_password' WHERE id='$id' ";
    		$pass_change = mysqli_query($con, $change_pass_query);
			
			if($pass_change)
            {
                $_SESSION['status'] = "Password Updated!";
                $_SESSION['status_icon'] = "success";
                header('Location: settings.php');
            }
            else
            {
                $_SESSION['status'] = "Password Not Updated!";
                $_SESSION['status_icon'] = "error";
                header('Location: settings.php');
                // echo ('<script> alert("Data Not Updated"); location.replace("profile.php");</script>');
            }
		}
		else
		{
			$_SESSION['status'] = "Ooops! Password does not match";
            $_SESSION['status_icon'] = "error";
            header('Location: settings.php');
		}
	}
	else{
		$_SESSION['status'] = "Ooops! Incorrect old password";
        $_SESSION['status_icon'] = "error";
        header('Location: settings.php');
	}
}
?>