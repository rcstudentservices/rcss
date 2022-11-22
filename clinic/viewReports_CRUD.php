<!-- EDIT -->
<!-- THIS SECTION IS FOR JHS ONLY -->
<?php include "../includes/db.php"; 
session_start();
?>

<?php
if(isset($_POST['viewJHS']))
{   
    $stud_id = $_POST['stud_id'];
    $cs_status = $_POST['cs_status'];
    $rec_time = $_POST['rec_time'];
    $rec_date = $_POST['rec_date'];

    $query = "UPDATE prefect_reports SET cs_status='$cs_status', rec_time=NOW(), rec_date=NOW() WHERE stud_id='$stud_id'";
    $COL_editquery = mysqli_query($con, $query);

    if($COL_editquery)
    {
        $_SESSION['status'] = "Data Updated!";
        $_SESSION['status_icon'] = "success";
        header("Location: violation-jhs.php");

    }
    else
    {
        $_SESSION['status'] = "Data Not Updated!";
        $_SESSION['status_icon'] = "error";
        header("Location: violation-jhs.php");
    }
}
//  THIS SECTION IS FOR SHS ONLY 

if(isset($_POST['viewSHS']))
{   
    $stud_id = $_POST['stud_id'];
    $cs_status = $_POST['cs_status'];
    $rec_time = $_POST['rec_time'];
    $rec_date = $_POST['rec_date'];

    $query = "UPDATE prefect_reports SET cs_status='$cs_status', rec_time=NOW(), rec_date=NOW() WHERE stud_id='$stud_id'";
    $COL_editquery = mysqli_query($con, $query);

    if($COL_editquery)
    {
        $_SESSION['status'] = "Data Updated!";
        $_SESSION['status_icon'] = "success";
        header("Location: violation-shs.php");
    }
    else
    {
        $_SESSION['status'] = "Data Not Updated!";
        $_SESSION['status_icon'] = "error";
        header("Location: violation-shs.php");
    }
}

// THIS SECTION IS FOR COLLEGE ONLY

if(isset($_POST['viewCOL']))
{   
    $stud_id = $_POST['stud_id'];
    $cs_status = $_POST['cs_status'];
    $rec_time = $_POST['rec_time'];
    $rec_date = $_POST['rec_date'];

    $query = "UPDATE prefect_reports SET cs_status='$cs_status', rec_time=NOW(), rec_date=NOW() WHERE stud_id='$stud_id'";
    $COL_editquery = mysqli_query($con, $query);

    if($COL_editquery)
    {
        $_SESSION['status'] = "Data Updated!";
        $_SESSION['status_icon'] = "success";
        header("Location: violation-college.php");
    }
    else
    {
        $_SESSION['status'] = "Data Not Updated!";
        $_SESSION['status_icon'] = "error";
        header("Location: violation-college.php");
    }
}
?>
<!-- DELETE -->
<!--THIS SECTION IS FOR JHS ONLY -->
<?php
include "db.php";

if(isset($_POST['deleteJHS']))
{
    $rec_id = $_POST['rec_id'];

    $query = "DELETE FROM prefect_reports WHERE rec_id = '$rec_id'";
    $JHS_deletequery = mysqli_query($con, $query);

    if($JHS_deletequery) 
    {
        $_SESSION['status'] = "Data Deleted!";
        $_SESSION['status_icon'] = "success";
        header('Location: violation-jhs.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data Not Deleted!";
        $_SESSION['status_icon'] = "error";
        header('Location: violation-jhs.php');
    }
}
// THIS SECTION IS FOR SHS ONLY
if(isset($_POST['deleteSHS']))
{
    $rec_id = $_POST['rec_id'];

    $query = "DELETE FROM prefect_reports WHERE rec_id = '$rec_id'";
    $SHS_deletequery = mysqli_query($con, $query);

    if($SHS_deletequery) 
    {
        $_SESSION['status'] = "Data Deleted!";
        $_SESSION['status_icon'] = "success";
        header('Location: violation-shs.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data Not Deleted!";
        $_SESSION['status_icon'] = "error";
        header('Location: violation-shs.php');
    }
}
// THIS SECTION IS FOR COLLEGE ONLY
if(isset($_POST['deleteCOL']))
{
    $rec_id = $_POST['rec_id'];

    $query = "DELETE FROM prefect_reports WHERE rec_id = '$rec_id'";
    $COL_deletequery = mysqli_query($con, $query);

    if($COL_deletequery) 
    {
        $_SESSION['status'] = "Data Deleted!";
        $_SESSION['status_icon'] = "success";
        header('Location: violation-college.php');
    }
    else
    {
        $_SESSION['status'] = "Data Not Deleted!";
        $_SESSION['status_icon'] = "error";
        header('Location: violation-college.php');
    }
}
?>