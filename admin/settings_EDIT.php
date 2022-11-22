<?php include "../includes/db.php";
    session_start();
?>

<?php
$id = $_SESSION['a_id'];

if(isset($_POST['cancel']))
{
    header('Location: profile.php');
}

if(isset($_POST['update_acc']))
{   
    $admin_fname = $_POST['admin_fname'];
    $admin_midname = $_POST['admin_midname'];
    $admin_lname = $_POST['admin_lname'];
    $admin_email = $_POST['admin_email'];
    $admin_contnum = $_POST['admin_contnum'];
    $admin_address = $_POST['admin_address'];

    $query = "UPDATE admin SET firstname='$admin_fname', midname='$admin_midname', lastname='$admin_lname',  address='$admin_address', contact_num='$admin_contnum', email='$admin_email' WHERE id='$id' ";
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
    $encrypted_pass = password_hash($new_pass, PASSWORD_DEFAULT); // Creates a password hash
	$confirm_pass = $_POST['confpass'];
	
	$get_old_password = "SELECT password FROM admin WHERE id='$id'; ";
	
	$existing_pass = mysqli_query($con, $get_old_password);
		
	while ($previous_pass = mysqli_fetch_array($existing_pass,MYSQLI_ASSOC)):;
		$fromdb_password = $previous_pass['password'];
	endwhile;
	
	if($old_pass == $fromdb_password)
	{
		if($new_pass == $confirm_pass)
		{
			$change_pass_query = "UPDATE admin SET password='$encrypted_pass' WHERE id='$id' ";
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