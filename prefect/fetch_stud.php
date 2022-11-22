<?php
include "../includes/db.php";

$stud_idnum = $_REQUEST['stud_idnum'];

if ($stud_idnum !== "") 
{	
	$queryname = mysqli_query($con, "SELECT CONCAT_WS(' ' , `stud_fname`, `stud_mname`, `stud_lname`) As FullName FROM tbl_student WHERE stud_idnum='$stud_idnum'");
	$querygradeyr = mysqli_query($con, "SELECT CONCAT_WS(' - ' , `yearlevel_code`, `section_code`) As GradeSec FROM tbl_student WHERE stud_idnum='$stud_idnum'");

	$row1 = mysqli_fetch_array($queryname);
	$row2 = mysqli_fetch_array($querygradeyr);

	$stud_name = $row1["FullName"];
	$grade_section = $row2["GradeSec"];
}
$result = array("$stud_name", "$grade_section");

$myJSON = json_encode($result);
echo $myJSON;
?>