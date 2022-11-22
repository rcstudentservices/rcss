<!-- THIS SECTION IS FOR JUNIOR HIGH SCHOOL ONLY -->
<?php
require '../includes/db.php';
session_start();
if(isset($_POST['addmiJHS']))
{
    $miJHS_desc = $_POST['miJHS_desc'];
    $miJHS_dept = "JHS";
    $miJHS_name = "MINOR OFFENSES";

    $query = "INSERT INTO tbl_violation(`vio_desc`, `vio_dept`, `vio_name`) VALUES ('$miJHS_desc', '$miJHS_dept', '$miJHS_name') ";
    $miJHS_addquery = mysqli_query($con, $query);

    if($miJHS_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}

if(isset($_POST['adddamiJHS']))
{
    $damiJHS_offense = $_POST['damiJHS_offense'];
    $damiJHS_da = $_POST['damiJHS_desc'];
    $damiJHS_dept = "JHS";
    $damiJHS_name = "DISCIPLINARY ACTIONS FOR MINOR OFFENSES";

    $query = "INSERT INTO tbl_violation(`vio_offense`,`vio_da`, `vio_dept`, `vio_name`) VALUES ('$damiJHS_offense','$damiJHS_da', '$damiJHS_dept', '$damiJHS_name')";
    $damiJHS_addquery = mysqli_query($con, $query);

    if($damiJHS_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}

if(isset($_POST['addmaJHS']))
{
    $maJHS_category = $_POST['maJHS_category'];
    $maJHS_desc = $_POST['maJHS_desc'];
    $maJHS_da = $_POST['maJHS_da'];
    $maJHS_conduct = $_POST['maJHS_conduct'];
    $maJHS_dept = "JHS";
    $maJHS_name = "MAJOR OFFENSES";


    $query = "INSERT INTO tbl_violation(`vio_cat`,`vio_desc`,`vio_da`,`vio_conduct`,`vio_dept`,`vio_name`) VALUES ('$maJHS_category','$maJHS_desc','$maJHS_da','$maJHS_conduct','$maJHS_dept','$maJHS_name')";
    $maJHS_addquery = mysqli_query($con, $query);

    if($maJHS_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}

if(isset($_POST['addmiadJHS']))
{
    $miadJHS_desc = $_POST['miadJHS_desc'];
    $miadJHS_dept = "JHS";
    $miadJHS_name = "ADDENDUM TO THE LIST OF MINOR OFFENSES";

    $query = "INSERT INTO tbl_violation(`vio_desc`, `vio_dept`, `vio_name`) VALUES ('$miadJHS_desc', '$miadJHS_dept', '$miadJHS_name')";
    $miadJHS_addquery = mysqli_query($con, $query);

    if($miadJHS_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}

if(isset($_POST['adddamiadJHS']))
{
    $damiadJHS_offense = $_POST['damiadJHS_offense'];
    $damiadJHS_desc = $_POST['damiadJHS_desc'];
    $damiadJHS_dept = "JHS";
    $damiadJHS_name = "DISCIPLINARY ACTIONS FOR ADDENDUM TO THE LIST OF MINOR OFFENSES";

    $query = "INSERT INTO tbl_violation(`vio_offense`,`vio_da`,`vio_dept`,`vio_name`) VALUES ('$damiadJHS_offense','$damiadJHS_desc','$damiadJHS_dept','$damiadJHS_name')";
    $damiadJHS_addquery = mysqli_query($con, $query);

    if($damiadJHS_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}
if(isset($_POST['addmaadJHS']))
{
    $maadJHS_category = $_POST['maadJHS_category'];
    $maadJHS_desc = $_POST['maadJHS_desc'];
    $maadJHS_da = $_POST['maadJHS_da'];
    $maadJHS_conduct = $_POST['maadJHS_conduct'];
    $maadJHS_dept = "JHS";
    $maadJHS_name = "ADDENDUM TO THE LIST OF MAJOR OFFENSES AND DISCIPLINARY ACTIONS";

    $query = "INSERT INTO tbl_violation(`vio_cat`,`vio_desc`,`vio_da`,`vio_conduct`,`vio_dept`,`vio_name`) VALUES ('$maadJHS_category','$maadJHS_desc','$maadJHS_da','$maadJHS_conduct','$maadJHS_dept','$maadJHS_name')";
    $maadJHS_addquery = mysqli_query($con, $query);

    if($maadJHS_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
    }
    else
    {$_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}
// -------------- THIS SECTION IS FOR SENIOR HIGH SCHOOL ONLY -------------- 
if(isset($_POST['addmiSHS']))
{
    $miSHS_desc = $_POST['miSHS_desc'];
    $miSHS_dept = "SHS";
    $miSHS_name = "MINOR OFFENSES";

    $query = "INSERT INTO tbl_violation(`vio_desc`, `vio_dept`, `vio_name`) VALUES ('$miSHS_desc', '$miSHS_dept', '$miSHS_name') ";
    $miSHS_addquery = mysqli_query($con, $query);

    if($miSHS_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}

if(isset($_POST['adddamiSHS']))
{
    $damiSHS_offense = $_POST['damiSHS_offense'];
    $damiSHS_desc = $_POST['damiSHS_desc'];
    $damiSHS_dept = "SHS";
    $damiSHS_name = "DISCIPLINARY ACTIONS FOR MINOR OFFENSES";

    $query = "INSERT INTO tbl_violation(`vio_offense`,`vio_desc`,`vio_dept`,`vio_name`) VALUES ('$damiSHS_offense','$damiSHS_desc','$damiSHS_dept','$damiSHS_name')";
    $damiSHS_addquery = mysqli_query($con, $query);

    if($damiSHS_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}

if(isset($_POST['addmaSHS']))
{
    $maSHS_category = $_POST['maSHS_category'];
    $maSHS_desc = $_POST['maSHS_desc'];
    $maSHS_da = $_POST['maSHS_da'];
    $maSHS_conduct = $_POST['maSHS_conduct'];
    $maSHS_dept= "SHS";
    $maSHS_name = "MAJOR OFFENSES";

    $query = "INSERT INTO tbl_violation(`vio_cat`,`vio_desc`,`vio_da`,`vio_conduct`,`vio_dept`,`vio_name`) VALUES ('$maSHS_category','$maSHS_desc','$maSHS_da','$maSHS_conduct','$maSHS_dept','$maSHS_name')";
    $maSHS_addquery = mysqli_query($con, $query);

    if($maSHS_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}

if(isset($_POST['addmiadSHS']))
{
    $miadSHS_desc = $_POST['miadSHS_desc'];
    $miadSHS_dept = "SHS";
    $miadSHS_name = "ADDENDUM TO THE LIST OF MINOR OFFENSES";

    $query = "INSERT INTO tbl_violation(`vio_desc`, `vio_dept`, `vio_name`) VALUES ('$miadSHS_desc', '$miadSHS_dept', '$miadSHS_name')";
    $miadSHS_addquery = mysqli_query($con, $query);

    if($miadSHS_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}

if(isset($_POST['adddamiadSHS']))
{
    $damiadSHS_offense = $_POST['damiadSHS_offense'];
    $damiadSHS_desc = $_POST['damiadSHS_desc'];
    $damiadSHS_dept = "SHS";
    $damiadSHS_name = "DISCIPLINARY ACTIONS FOR ADDENDUM TO THE LIST OF MINOR OFFENSES";

    $query = "INSERT INTO tbl_violation(`vio_offense`,`vio_desc`,`vio_dept`,`vio_name`) VALUES ('$damiadSHS_offense','$damiadSHS_desc','$damiadSHS_dept','$damiadSHS_name')";
    $damiadSHS_addquery = mysqli_query($con, $query);

    if($damiadSHS_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}
if(isset($_POST['addmaadSHS']))
{
    $maadSHS_category = $_POST['maadSHS_category'];
    $maadSHS_desc = $_POST['maadSHS_desc'];
    $maadSHS_da = $_POST['maadSHS_da'];
    $maadSHS_conduct = $_POST['maadSHS_conduct'];
    $maadSHS_dept = "SHS";
    $maadSHS_name = "ADDENDUM TO THE LIST OF MAJOR OFFENSES AND DISCIPLINARY ACTIONS";

    $query = "INSERT INTO tbl_violation(`vio_cat`,`vio_desc`,`vio_da`,`vio_conduct`,`vio_dept`,`vio_name`) VALUES ('$maadSHS_category','$maadSHS_desc','$maadSHS_da','$maadSHS_conduct','$maadSHS_dept','$maadSHS_name')";
    $maadSHS_addquery = mysqli_query($con, $query);

    if($maadSHS_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}
// -------------- THIS SECTION IS FOR COLLEGE ONLY -------------- 
if(isset($_POST['addmiCOL']))
{
    $miCOL_desc = $_POST['miCOL_desc'];
    $miCOL_dept = "COLLEGE";
    $miCOL_name = "MINOR OFFENSES";

    $query = "INSERT INTO tbl_violation(`vio_desc`, `vio_dept`, `vio_name`) VALUES ('$miCOL_desc', '$miCOL_dept', '$miCOL_name')";
    $miCOL_addquery = mysqli_query($con, $query);

    if($miCOL_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['adddamiCOL']))
{
    $damiCOL_offense = $_POST['damiCOL_offense'];
    $damiCOL_desc = $_POST['damiCOL_desc'];
    $damiCOL_dept = "COLLEGE";
    $damiCOL_name = "DISCIPLINARY ACTIONS FOR ADDENDUM MINOR OFFENSES";
    $query = "INSERT INTO tbl_violation(`vio_offense`,`vio_desc`,`vio_dept`,`vio_name`) VALUES ('$damiCOL_offense','$damiCOL_desc','$damiCOL_dept','$damiCOL_name')";
    $damiCOL_addquery = mysqli_query($con, $query);

    if($damiCOL_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['addmaCOL']))
{
    
    $maCOL_category = $_POST['maCOL_category'];
    $maCOL_desc = $_POST['maCOL_desc'];
    $maCOL_dept= "COLLEGE";
    $maCOL_name = "MAJOR OFFENSES";

    $query = "INSERT INTO tbl_violation(`vio_cat`, `vio_desc`, `vio_dept`, `vio_name`) VALUES ('$maCOL_category', '$maCOL_desc', '$maCOL_dept', '$maCOL_name')";
    $maCOL_addquery = mysqli_query($con, $query);

    if($maCOL_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['adddamaCOL']))
{
    $damaCOL_offense = $_POST['damaCOL_offense'];
    $damaCOL_desc = $_POST['damaCOL_desc'];
    $damaCOL_dept = "COLLEGE";
    $damaCOL_name = "DISCIPLINARY ACTIONS FOR MAJOR OFFENSES";

    $query = "INSERT INTO tbl_violation(`vio_offense`,`vio_desc`,`vio_dept`,`vio_name`) VALUES ('$damaCOL_offense','$damaCOL_desc','$damaCOL_dept','$damaCOL_name')";
    $damaCOL_addquery = mysqli_query($con, $query);

    if($damaCOL_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['addmiadCOL']))
{
    $miadCOL_desc = $_POST['miadCOL_desc'];
    $miadCOL_dept = "COLLEGE";
    $miadCOL_name = "ADDENDUM TO THE LIST OF MINOR OFFENSES";

    $query = "INSERT INTO tbl_violation(`vio_desc`,`vio_dept`,`vio_name`) VALUES ('$miadCOL_desc', '$miadCOL_dept', '$miadCOL_name')";
    $miadCOL_addquery = mysqli_query($con, $query);

    if($miadCOL_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['adddamiadCOL']))
{
    $damiadCOL_offense = $_POST['damiadCOL_offense'];
    $damiadCOL_desc = $_POST['damiadCOL_desc'];
    $damiadCOL_dept = "COLLEGE";
    $damiadCOL_name = "DISCIPLINARY ACTIONS FOR MINOR OFFENSES";

    $query = "INSERT INTO tbl_violation(`vio_offense`,`vio_desc`,`vio_dept`,`vio_name`) VALUES ('$damiadCOL_offense','$damiadCOL_desc','$damiadCOL_dept','$damiadCOL_name')";
    $damiadCOL_addquery = mysqli_query($con, $query);

    if($damiadCOL_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['addmaadCOL']))
{
    $maadCOL_category = $_POST['maadCOL_category'];
    $maadCOL_desc = $_POST['maadCOL_desc'];
    $maadCOL_da = $_POST['maadCOL_da'];
    $maadCOL_conduct = $_POST['maadCOL_conduct'];
    $maadCOL_dept = "COLLEGE";
    $maadCOL_name = "ADDENDUM TO THE LIST OF MAJOR OFFENSES AND DISCIPLINARY ACTIONS";

    $query = "INSERT INTO tbl_violation(`vio_cat`,`vio_desc`,`vio_da`,`vio_conduct`,`vio_dept`,`vio_name`) VALUES ('$maadCOL_category','$maadCOL_desc','$maadCOL_da','$maadCOL_conduct','$maadCOL_dept','$maadCOL_name')";
    $maadCOL_addquery = mysqli_query($con, $query);

    if($maadCOL_addquery)
    {
        $_SESSION['status'] = "Data saved";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
    }
    else
    {
        $_SESSION['status'] = "Data not saved";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

?>

<!-- THIS SECTION IS FOR JUNIOR HIGH SCHOOL ONLY -->
<?php include "../includes/db.php"; ?>

<?php
if(isset($_POST['editmiJHS']))
{   
    $editmiJHS_id = $_POST['miJHS_id'];
    $editmiJHS_desc = $_POST['miJHS_desc'];

    $query = "UPDATE tbl_violation SET vio_desc='$editmiJHS_desc' WHERE id='$editmiJHS_id'  ";
    $miJHS_editquery = mysqli_query($con, $query);

    if($miJHS_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}

if(isset($_POST['editdamiJHS']))
{   
    $editdamiJHS_id = $_POST['damiJHS_id'];
    
    $editdamiJHS_offense = $_POST['damiJHS_offense'];
    $editdamiJHS_desc = $_POST['damiJHS_desc'];

    $query = "UPDATE tbl_violation SET vio_offense='$editdamiJHS_offense', vio_da   ='$editdamiJHS_desc' WHERE id='$editdamiJHS_id'  ";
    $damiJHS_editquery = mysqli_query($con, $query);

    if($damiJHS_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}

if(isset($_POST['editmaJHS']))
{   
    $editmaJHS_id = $_POST['maJHS_id'];
    
    $editmaJHS_category = $_POST['maJHS_category'];
    $editmaJHS_desc = $_POST['maJHS_desc'];
    $editmaJHS_da = $_POST['maJHS_da'];
    $editmaJHS_conduct = $_POST['maJHS_conduct'];

    $query = "UPDATE tbl_violation SET vio_cat='$editmaJHS_category', vio_desc='$editmaJHS_desc', vio_da='$editmaJHS_da', vio_conduct='$editmaJHS_conduct' WHERE id='$editmaJHS_id'  ";
    $maJHS_editquery = mysqli_query($con, $query);

    if($maJHS_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}

if(isset($_POST['editmiadJHS']))
{   
    $editmiadJHS_id = $_POST['miadJHS_id'];
    
    $editmiadJHS_desc = $_POST['miadJHS_desc'];

    $query = "UPDATE tbl_violation SET vio_desc='$editmiadJHS_desc' WHERE id='$editmiadJHS_id'  ";
    $miadJHS_editquery = mysqli_query($con, $query);

    if($miadJHS_editquery)
    {
         $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}

if(isset($_POST['editdamiadJHS']))
{   
    $editdamiadJHS_id = $_POST['damiadJHS_id'];
    $editdamiadJHS_offense = $_POST['damiadJHS_offense'];
    $editdamiadJHS_desc = $_POST['damiadJHS_desc'];

    $query = "UPDATE tbl_violation SET vio_offense='$editdamiadJHS_offense', vio_da='$editdamiadJHS_desc' WHERE id='$editdamiadJHS_id'  ";
    $damiadJHS_editquery = mysqli_query($con, $query);

    if($damiadJHS_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}

if(isset($_POST['editmaadJHS']))
{   
    $editmaadJHS_id = $_POST['maadJHS_id'];
    
    $editmaadJHS_category = $_POST['maadJHS_category'];
    $editmaadJHS_desc = $_POST['maadJHS_desc'];
    $editmaadJHS_da = $_POST['maadJHS_da'];
    $editmaadJHS_conduct = $_POST['maadJHS_conduct'];

    $query = "UPDATE tbl_violation SET vio_cat='$editmaadJHS_category', vio_desc='$editmaadJHS_desc', vio_da='$editmaadJHS_da', vio_conduct='$editmaadJHS_conduct' WHERE id='$editmaadJHS_id'  ";
    $maadJHS_editquery = mysqli_query($con, $query);

    if($maadJHS_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}
// ----------THIS SECTION IS FOR SENIOR HIGH SCHOOL ONLY----------
if(isset($_POST['editmiSHS']))
{   
    $editmiSHS_id = $_POST['miSHS_id'];
    $editmiSHS_desc = $_POST['miSHS_desc'];

    $query = "UPDATE tbl_violation SET vio_desc='$editmiSHS_desc' WHERE id='$editmiSHS_id'  ";
    $miSHS_editquery = mysqli_query($con, $query);

    if($miSHS_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}

if(isset($_POST['editdamiSHS']))
{   
    $editdamiSHS_id = $_POST['damiSHS_id'];
    
    $editdamiSHS_offense = $_POST['damiSHS_offense'];
    $editdamiSHS_desc = $_POST['damiSHS_desc'];

    $query = "UPDATE tbl_violation SET vio_offense='$editdamiSHS_offense', vio_desc='$editdamiSHS_desc' WHERE id='$editdamiSHS_id'  ";
    $damiSHS_editquery = mysqli_query($con, $query);

    if($damiSHS_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}

if(isset($_POST['editmaSHS']))
{   
    $editmaSHS_id = $_POST['maSHS_id'];
    
    $editmaSHS_category = $_POST['maSHS_category'];
    $editmaSHS_desc = $_POST['maSHS_desc'];
    $editmaSHS_da = $_POST['maSHS_da'];
    $editmaSHS_conduct = $_POST['maSHS_conduct'];

    $query = "UPDATE tbl_violation SET vio_cat='$editmaSHS_category', vio_desc='$editmaSHS_desc', vio_da='$editmaSHS_da', vio_conduct='$editmaSHS_conduct' WHERE id='$editmaSHS_id'  ";
    $maSHS_editquery = mysqli_query($con, $query);

    if($maSHS_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}

if(isset($_POST['editmiadSHS']))
{   
    $editmiadSHS_id = $_POST['miadSHS_id'];
    
    $editmiadSHS_desc = $_POST['miadSHS_desc'];

    $query = "UPDATE tbl_violation SET vio_desc='$editmiadSHS_desc' WHERE id='$editmiadSHS_id'  ";
    $miadSHS_editquery = mysqli_query($con, $query);

    if($miadSHS_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}

if(isset($_POST['editdamiadSHS']))
{   
    $editdamiadSHS_id = $_POST['damiadSHS_id'];
    $editdamiadSHS_offense = $_POST['damiadSHS_offense'];
    $editdamiadSHS_desc = $_POST['damiadSHS_desc'];

    $query = "UPDATE tbl_violation SET vio_offense='$editdamiadSHS_offense', vio_desc='$editdamiadSHS_desc' WHERE id='$editdamiadSHS_id'  ";
    $damiadSHS_editquery = mysqli_query($con, $query);

    if($damiadSHS_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}
if(isset($_POST['editmaadSHS']))
{   
    $editmaadSHS_id = $_POST['maadSHS_id'];
    
    $editmaadSHS_category = $_POST['maadSHS_category'];
    $editmaadSHS_desc = $_POST['maadSHS_desc'];
    $editmaadSHS_da = $_POST['maadSHS_da'];
    $editmaadSHS_conduct = $_POST['maadSHS_conduct'];

    $query = "UPDATE tbl_violation SET vio_cat='$editmaadSHS_category', vio_desc='$editmaadSHS_desc', vio_da='$editmaadSHS_da', vio_conduct='$editmaadSHS_conduct' WHERE id='$editmaadSHS_id'  ";
    $maadSHS_editquery = mysqli_query($con, $query);

    if($maadSHS_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}
// ----------THIS SECTION IS FOR COLLEGE ONLY----------
if(isset($_POST['editmiCOL']))
{
    $editmiCOL_id = $_POST['miCOL_id'];
    $editmiCOL_desc = $_POST['miCOL_desc'];

    $query = "UPDATE tbl_violation SET miCOL_desc='$editmiCOL_desc' WHERE miCOL_id='$editmiCOL_id'  ";
    $miCOL_editquery = mysqli_query($con, $query);

    if($miCOL_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['editdamiCOL']))
{   
    $editdamiCOL_id = $_POST['damiCOL_id'];
    
    $editdamiCOL_offense = $_POST['damiCOL_offense'];
    $editdamiCOL_desc = $_POST['damiCOL_desc'];

    $query = "UPDATE tbl_violation SET vio_offense='$editdamiCOL_offense', vio_desc='$editdamiCOL_desc' WHERE id='$editdamiCOL_id'  ";
    $damiCOL_editquery = mysqli_query($con, $query);

    if($damiCOL_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['editmaCOL']))
{   
    $editmaCOL_id = $_POST['maCOL_id'];
    
    $editmaCOL_category = $_POST['maCOL_category'];
    $editmaCOL_desc = $_POST['maCOL_desc'];

    $query = "UPDATE tbl_violation SET vio_cat='$editmaCOL_category', vio_desc='$editmaCOL_desc' WHERE id='$editmaCOL_id'  ";
    $maCOL_editquery = mysqli_query($con, $query);

    if($maCOL_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['editdamaCOL']))
{   
    $editdamaCOL_id = $_POST['damaCOL_id'];
    
    $editdamaCOL_offense = $_POST['damaCOL_offense'];
    $editdamaCOL_desc = $_POST['damaCOL_desc'];

    $query = "UPDATE tbl_violation SET vio_offense='$editdamaCOL_offense', vio_desc='$editdamaCOL_desc' WHERE id='$editdamaCOL_id'  ";
    $damaCOL_editquery = mysqli_query($con, $query);

    if($damaCOL_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['editmiadCOL']))
{
    $editmiadCOL_id = $_POST['miadCOL_id'];
    $editmiadCOL_desc = $_POST['miadCOL_desc'];

    $query = "UPDATE tbl_violation SET vio_desc='$editmiadCOL_desc' WHERE id='$editmiadCOL_id'  ";
    $miadCOL_editquery = mysqli_query($con, $query);

    if($miadCOL_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['editdamiadCOL']))
{   
    $editdamiadCOL_id = $_POST['damiadCOL_id'];
    
    $editdamiadCOL_offense = $_POST['damiadCOL_offense'];
    $editdamiadCOL_desc = $_POST['damiadCOL_desc'];

    $query = "UPDATE tbl_violation SET vio_offense='$editdamiadCOL_offense', vio_desc='$editdamiadCOL_desc' WHERE id='$editdamiadCOL_id'  ";
    $damiadCOL_editquery = mysqli_query($con, $query);

    if($damiadCOL_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['editmaadCOL']))
{   
    $editmaadCOL_id = $_POST['maadCOL_id'];
    
    $editmaadCOL_category = $_POST['maadCOL_category'];
    $editmaadCOL_desc = $_POST['maadCOL_desc'];
    $editmaadCOL_da = $_POST['maadCOL_da'];
    $editmaadCOL_conduct = $_POST['maadCOL_conduct'];

    $query = "UPDATE tbl_violation SET vio_cat='$editmaadCOL_category', vio_desc='$editmaadCOL_desc', vio_da='$editmaadCOL_da', vio_conduct='$editmaadCOL_conduct' WHERE id='$editmaadCOL_id'  ";
    $maadCOL_editquery = mysqli_query($con, $query);

    if($maadCOL_editquery)
    {
        $_SESSION['status'] = "Data updated";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}
?>

<!-- THIS SECTION IS FOR JUNIOR HIGH SCHOOL ONLY -->
<?php
include "../includes/db.php";
?>

<?php
if(isset($_POST['deletemiJHS']))
{
    $deletemiJHS_id = $_POST['miJHS_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletemiJHS_id'";
    $miJHS_deletequery = mysqli_query($con, $query);

    if($miJHS_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}

if(isset($_POST['deletedamiJHS']))
{
    $deletedamiJHS_id = $_POST['damiJHS_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletedamiJHS_id'";
    $damiJHS_deletequery = mysqli_query($con, $query);

    if($damiJHS_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}

if(isset($_POST['deletemaJHS']))
{
    $deletemaJHS_id = $_POST['maJHS_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletemaJHS_id'";
    $damiJHS_deletequery = mysqli_query($con, $query);

    if($damiJHS_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}

if(isset($_POST['deletemiadJHS']))
{
    $deletemiadJHS_id = $_POST['miadJHS_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletemiadJHS_id'";
    $miadJHS_deletequery = mysqli_query($con, $query);

    if($miadJHS_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}

if(isset($_POST['deletedamiadJHS']))
{
    $deletedamiadJHS_id = $_POST['damiadJHS_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletedamiadJHS_id'";
    $damiadJHS_deletequery = mysqli_query($con, $query);

    if($damiadJHS_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}
if(isset($_POST['deletemaadJHS']))
{
    $deletemaadJHS_id = $_POST['maadJHS_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletemaadJHS_id'";
    $damiJHS_deletequery = mysqli_query($con, $query);

    if($damiJHS_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-jhs.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-jhs.php');
    }
}
// <!-- THIS SECTION IS FOR SENIOR HIGH SCHOOL ONLY -->
if(isset($_POST['deletemiSHS']))
{
    $deletemiSHS_id = $_POST['miSHS_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletemiSHS_id'";
    $miSHS_deletequery = mysqli_query($con, $query);

    if($miSHS_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
       
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}

if(isset($_POST['deletedamiSHS']))
{
    $deletedamiSHS_id = $_POST['damiSHS_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletedamiSHS_id'";
    $damiSHS_deletequery = mysqli_query($con, $query);

    if($damiSHS_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
       
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}

if(isset($_POST['deletemaSHS']))
{
    $deletemaSHS_id = $_POST['maSHS_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletemaSHS_id'";
    $damiSHS_deletequery = mysqli_query($con, $query);

    if($damiSHS_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
       
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}

if(isset($_POST['deletemiadSHS']))
{
    $deletemiadSHS_id = $_POST['miadSHS_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletemiadSHS_id'";
    $miadSHS_deletequery = mysqli_query($con, $query);

    if($miadSHS_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
       
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}

if(isset($_POST['deletedamiadSHS']))
{
    $deletedamiadSHS_id = $_POST['damiadSHS_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletedamiadSHS_id'";
    $damiadSHS_deletequery = mysqli_query($con, $query);

    if($damiadSHS_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
       
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}
if(isset($_POST['deletemaadSHS']))
{
    $deletemaadSHS_id = $_POST['maadSHS_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletemaadSHS_id'";
    $damiJHS_deletequery = mysqli_query($con, $query);

    if($damiJHS_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-shs.php');
       
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-shs.php');
    }
}
// <!-- THIS SECTION IS FOR COLLEGE ONLY -->
if(isset($_POST['deletemiCOL']))
{
    $deletemiCOL_id = $_POST['miCOL_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletemiCOL_id'";
    $miCOL_deletequery = mysqli_query($con, $query);

    if($miCOL_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['deletedamiCOL']))
{
    $deletedamiCOL_id = $_POST['damiCOL_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletedamiCOL_id'";
    $damiCOL_deletequery = mysqli_query($con, $query);

    if($damiCOL_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['deletemaCOL']))
{
    $deletemaCOL_id = $_POST['maCOL_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletemaCOL_id'";
    $maCOL_deletequery = mysqli_query($con, $query);

    if($maCOL_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['deletedamaCOL']))
{
    $deletedamaCOL_id = $_POST['damaCOL_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletedamaCOL_id'";
    $damaCOL_deletequery = mysqli_query($con, $query);

    if($damaCOL_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['deletemiadCOL']))
{
    $deletemiadCOL_id = $_POST['miadCOL_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletemiadCOL_id'";
    $miCOL_deletequery = mysqli_query($con, $query);

    if($miCOL_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['deletedamiadCOL']))
{
    $deletedamiadCOL_id = $_POST['damiadCOL_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletedamiadCOL_id'";
    $damiadCOL_deletequery = mysqli_query($con, $query);

    if($damiadCOL_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}

if(isset($_POST['deletemaadCOL']))
{
    $deletemaadCOL_id = $_POST['maadCOL_id'];

    $query = "DELETE FROM tbl_violation WHERE id='$deletemaadCOL_id'";
    $maadCOL_deletequery = mysqli_query($con, $query);

    if($maadCOL_deletequery)
    {
        $_SESSION['status'] = "Data deleted";
        $_SESSION['status_icon'] = "success";
        header('Location: view-violation-college.php');
        
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        $_SESSION['status_icon'] = "error";
        header('Location: view-violation-college.php');
    }
}
?>