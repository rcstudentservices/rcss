<?php
session_start();

if (!isset($_SESSION['loggedin'])){   
    header("Location: ../");
	exit;
}
else if (isset($_SESSION['loggedin'])) {
    include "../includes/db.php";
    
    if (!isset($_SESSION['loggedin']))
    {   
        header("Location: ../index.php");
        exit;
    }
    $stmt = $con->prepare('SELECT emp_fname, emp_mname, emp_lname FROM tbl_emp WHERE id = ?');
    // In this case we can use the account ID to get the account info.
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($emp_fname, $emp_mname, $emp_lname);
    $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content=""> 
    <link rel = "icon" href="../img/logo1.png" type = "image/x-icon">
    <title>RCSS | Prefect Office</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet"> 
    <link href="../fontawesome/css/all.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i><img src="../img/rcss-logo-official.png" alt="" style="width: 40px;"></i>
                </div>
                <div class="sidebar-brand-text">Rogationist College</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Manage Reports
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-file-text"></i>
                    <span>View Reports</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Departments:</h6>
                        <a class="collapse-item" href="violation-jhs.php">Junior High School</a>
                        <a class="collapse-item" href="violation-shs.php">Senior High School</a>
                        <a class="collapse-item" href="violation-college.php">College & TED</a>
                    </div>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="reports.php">
                <i class="fa fa-puzzle-piece"></i>
                <span>Make Report/Referral</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Student Handbook
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa fa-bookmark"></i>
                    <span>Violation</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Departments:</h6>
                        <a class="collapse-item" href="view-violation-jhs.php">Junior High School</a>
                        <a class="collapse-item" href="view-violation-shs.php">Senior High School</a>
                        <a class="collapse-item" href="view-violation-college.php">College & TED</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="statistics.php">
                <i class="fa fa-line-chart"></i>
                    <span>Statistical</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <!-- <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div> -->
                            <span>Student Discipline Records</span>
                        </div>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li> -->

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $emp_fname . " " .$emp_mname. ". " . $emp_lname?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="settings.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            
                
            <div class="container-fluid">
             <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Make Reports</h1>
            
            
            <!-- Dropdown Card Example -->
        <div class="card shadow ">
                <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold">This is for all Departments, you can <a href="view-violation-jhs.php">view handbook-violations</a> for disciplinary actions or offenses.</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Actions:</div>
                        <a class="dropdown-item" onClick="window.location.reload();">Force Refresh</a>
                        <a class="dropdown-item" onclick="change();" id="disabled" value="Disable">Disable</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" >Something else here</a>
                    </div>
                </div>
            </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="post" action="addReports_CRUD.php">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Academic Year</label>
                                <div class="form-group">
                                    <select name="acad_year"  class="form-control" id="acad_year" required>
                                        <option value="" disabled selected value >Select Academic Year</option>
                                        <?php	
                                            require '../includes/db.php';
                                            $query = "SELECT * FROM tbl_academicyear ORDER BY acadyear_desc DESC;";
                                            $all_acadyear = mysqli_query($con,$query);

                                            while ($acadyear = mysqli_fetch_array(
                                            $all_acadyear,MYSQLI_ASSOC)):;
                                        ?>
                                        <option value="<?php echo $acadyear["acadyear_desc"];?>">
                                            <?php echo $acadyear["acadyear_desc"];?>
                                        </option>
                                        <?php
                                            endwhile;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Semester</label>
                                    <select type="text" class="form-control" name="acad_sem" id="acad_sem" required>
                                        <option value="" disabled selected value >Select Semester</option>
                                        <option value="1st Semester">1st Semester</option>
                                        <option value="2nd Semester">2nd Semester</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date Recorded</label>
                                    <input type="date" class="form-control" name="date" id="date" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Time Recorded</label>
                                    <input type="time"  class="form-control" name="time" id="time" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select type="text" class="form-control" name="dept_code" id="dept_code" required>
                                        <option value="" disabled selected value >Select Department</option>
                                        <option value="jhs">Junior High School Deparment</option>
                                        <option value="shs">Senior High School Deparment</option>
                                        <option value="college">College & TED Deparment</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID Number</label>
                                    <input type="text"  class="form-control" name="stud_idnum" id="stud_idnum" placeholder='Enter Student ID' onkeyup="GetDetail(this.value); autoCaps()" value="" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Student Name</label>
                                    <input type="text"  class="form-control" name="stud_name" id="stud_name" placeholder='Student Name' value="" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Grade and Section</label>
                                    <input type="text"  class="form-control" name="grade_section" id="grade_section" placeholder='Grade and Section' value="" required>
                                </div>
                            </div>
                            
                            <script>
                                function GetDetail(str) 
                                {
                                    if (str.length == 0) 
                                    {
                                        document.getElementById("stud_name").value = "";
                                        document.getElementById("grade_section").value = "";
                                        return;
                                    }
                                    else 
                                    {
                                        var xmlhttp = new XMLHttpRequest();
                                        xmlhttp.onreadystatechange = function () 
                                        {
                                            if (this.readyState == 4 && this.status == 200) 
                                            {
                                                var myObj = JSON.parse(this.responseText);
                                                document.getElementById("stud_name").value = myObj[0];
                                                document.getElementById("grade_section").value = myObj[1];
                                            }
                                        };
                                        xmlhttp.open("GET", "fetch_stud.php?stud_idnum=" + str, true);
                                        xmlhttp.send();
                                    }
                                }
                            </script>

                                <?php
                                    $val = $con->prepare('SELECT emp_num, emp_fname, emp_mname, emp_lname FROM tbl_emp WHERE id = ?');
                                    // In this case we can use the account ID to get the account info.
                                    $val->bind_param('i', $_SESSION['id']);
                                    $val->execute();
                                    $val->bind_result($emp_num, $emp_fname, $emp_mname, $emp_lname);
                                    $val->fetch();
                                ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Prefect ID</label>
                                    <input type="text" name="discip-id"  class="form-control" value="<?php echo $emp_num?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name of Prefect</label>
                                    <input type="text" name="discip-officer"  class="form-control" value="<?php echo $emp_fname . " " . $emp_lname?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-12"> <hr></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Violation Type</label>
                                    <select name="violation-type"  class="form-control" id="vio_type" required>
                                        <option value="Minor Offense">Minor Offense</option>
                                        <option value="Major Offense">Major Offense</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Violation Description</label>
                                    <textarea class="form-control" name="violation-desc" id="vio_desc" placeholder="Describe the violation here..."  required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="padding-top: 10px;">Additional Person/s Involved</label>
                                    <textarea class="form-control" name="additional-person"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="padding-top: 10px;">Disciplinary Action / Sanction</label>
                                    <textarea class="form-control" name="discip-action" id="action" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12"><hr><h5 style="margin-top: 5px;">Community Service Information (If applicable)</h5></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" name="cs-loc"  id="loc" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Number of Hours</label>
                                    <input type="number" name="cs-hours"  id="hours" class="form-control" >
                                </div>
                                <div>
                                    <!-- button submit -->
                                    <button type="submit" class="col-md-12 btn btn-primary" name="submitJHS"  id="form_submit">Submit</button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="cs-status" class="form-control" id="status" >
                                        <option value="" disabled selected value>Select Status...</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Accomplished">Accomplished</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Developed by: Dela Cruz, Noveno, Penales, and Roderno  &copy; 2022</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <form action="../includes/logout.php" method="POST">
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="logout" class="btn btn-primary">Logout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>
</html>
<script>
    function autoCaps() 
    {
        var sid = document.getElementById("stud_idnum");
        
        sid.value = sid.value.toUpperCase();
    }
    
    // const disableInputs = function() {
    //     sessionStorage.disableInputs = 'true';
    //     document.getElementById('acad_year').disabled = true;
    //     document.getElementById('acad_sem').disabled = true;
    //     document.getElementById('date').disabled = true;
    //     document.getElementById('time').disabled = true;
    //     document.getElementById('dept_code').disabled = true;
    //     document.getElementById('stud_idnum').disabled = true;
    //     document.getElementById('stud_name').disabled = true;
    //     document.getElementById('grade_section').disabled = true;
    //     document.getElementById('vio_type').disabled = true;
    //     document.getElementById('vio_desc').disabled = true;
    //     document.getElementById('action').disabled = true;
    //     document.getElementById('loc').disabled = true;
    //     document.getElementById('hours').disabled = true;
    //     document.getElementById('form_submit').disabled = true;
    //     document.getElementById('status').disabled = true;
    // };
    // const enableInputs = function() {
    //     sessionStorage.enableInputs = 'true';
    //     document.getElementById('acad_year').disabled = false;
    //     document.getElementById('acad_sem').disabled = false;
    //     document.getElementById('date').disabled = false;
    //     document.getElementById('time').disabled = false;
    //     document.getElementById('dept_code').disabled = true;
    //     document.getElementById('stud_idnum').disabled = false;
    //     document.getElementById('stud_name').disabled = false;
    //     document.getElementById('grade_section').disabled = false;
    //     document.getElementById('vio_type').disabled = false;
    //     document.getElementById('vio_desc').disabled = false;
    //     document.getElementById('action').disabled = false;
    //     document.getElementById('loc').disabled = false;
    //     document.getElementById('hours').disabled = false;
    //     document.getElementById('form_submit').disabled = false;
    //     document.getElementById('status').disabled = false;
    // };

    
    //getting the ID of the disabled button
    var elem = document.getElementById("disabled");
    //check if the button is Disabled then save to session storage and set the value of function to true for storing in local storage
    
    
    
    if (elem.innerHTML=="Disable") {
        document.getElementById('disabled').onclick = switchStatus;
        
        switchStatus();
    }
    // sessionStorage.switchStatus === 'true'
    // switchStatus();
    //set the const to the button id
    // document.getElementById('disabled').onclick = switchStatus;

    const switchStatus = function() 
    {
    //open the session or local storage
    sessionStorage.switchStatus = 'true';
    //condition 
    elem.innerHTML = "Enable";
    }
    
    
    if (sessionStorage.switchStatus === 'true') switchStatus();
    document.getElementById('disabled').onclick = switchStatus;
   

    // if (sessionStorage.disableInputs === 'true') disableInputs();
    // document.getElementById('disabled').onclick = disableInputs;

    // if (sessionStorage.disableInputs === 'false') enableInputs();
    // document.getElementById('disabled').onclick = enableInputs;
    
</script>
<?php	
    if(isset($_SESSION['status']) && $_SESSION['status'] != "")
    {
        ?>
        <script>
            Swal.fire({
            icon: "<?php echo $_SESSION['status_icon']; ?>",
            title: "<?php echo $_SESSION['status']; ?>",
            showConfirmButton: false,
            timer: 2000
            })
        </script>
        <?php
        unset($_SESSION['status']);
    }
?>
<?php
$stmt->close();
}
else {
	header("Location: ../");
} 
?>