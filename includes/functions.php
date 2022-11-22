<?php
function confirmQuery($RESULT)
{
    global $con;
    if(!$RESULT)
    {
        die("QUERY FAILED" . mysqli_error($con));
    }
}
?>
<!-- THIS IS FOR LOGIN SECTION -->

