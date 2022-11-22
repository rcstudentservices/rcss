<?php
session_start();

if (!isset($_SESSION['a_loggedin'])){   
    header("Location: ../admin.php");
	exit;
}
else if (isset($_SESSION['a_loggedin'])) {
    require_once "../includes/db.php";


    if (!isset($_SESSION['a_loggedin']))
    {   
        header("Location: ../admin.php");
        exit;
    }
    $stmt = $con->prepare('SELECT firstname, midname, lastname FROM admin WHERE id = ?');
    // In this case we can use the account ID to get the account info.
    $stmt->bind_param('i', $_SESSION['a_id']);
    $stmt->execute();
    $stmt->bind_result($firstname,$midname, $lastname);
    $stmt->fetch();
?>
<!DOCTYPE php>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content=""> 
    <link rel = "icon" href="../img/logo1.png" type = "image/x-icon">
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>RCSS | Admininstrator</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet"> 
    <link href="../fontawesome/css/all.min.css" rel="stylesheet">
</head>
<body id="page-top" onload="renderTime();">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i><img src="../img/rcss-logo-official.png" alt="" style="width: 40px;"></i>
                </div>
                <div class="sidebar-brand-text">Rogationist College</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Manage Accounts
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-file-text"></i>
                    <span>Add Accounts</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Account Type:</h6>
                        <a class="collapse-item" href="add_employee.php">Employee</a>
                        <a class="collapse-item" href="add_admin.php">Administrator</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <i class="fa fa-puzzle-piece"></i>
                    <span>Prefect Accounts</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="#">
                <i class="fa fa-puzzle-piece"></i>
                    <span>Health Services Accounts</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="#">
                <i class="fa fa-puzzle-piece"></i>
                    <span>Campus Ministry Accounts</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1"
                    aria-expanded="true" aria-controls="collapseTwo1">
                    <i class="fa fa-file-text"></i>
                    <span>Student Accounts</span>
                </a>
                <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Department:</h6>
                        <a class="collapse-item" href="#">Junior High School</a>
                        <a class="collapse-item" href="#">Senior High School</a>
						<a class="collapse-item" href="#">College & TED</a>
                    </div>
                </div>
            </li>
			
			<hr class="sidebar-divider">
            <div class="sidebar-heading">
                Manage Academic Year
            </div>
			
			<li class="nav-item">
                <a class="nav-link" href="add_acadyear.php">
                <i class="fa fa-puzzle-piece"></i>
                    <span>Academic Year & Sem</span></a>
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
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="../img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2">The researcher's provide a web-based system <strong>(RCSS)</strong> that is centralize in gathering student information dedicated for different offices. </p>
                <a class="btn btn-success btn-sm" href="../about-us.php">Connect with us!</a>
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
                          
                            <span>Administrator</span>
                        </div>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $firstname . " ";
	  							if($midname != 'n/a'){
									 echo $midname;
								}
								echo " " . $lastname;?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
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


                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <?php   
                            $row = $a->prepare("SELECT acadyear_desc, acadyear_sem FROM tbl_academicyear WHERE acadyear_status = 'active'");
                            $row->execute();
                            $result = $row->get_result();
                            $row = $result->fetch_assoc();

                            $year = $row['acadyear_desc'];
                            $sem = $row['acadyear_sem'];
                            
                            echo "<h1 class='h3 mb-0 text-gray-800'>".$year." - <em style='font-size: 23px; color:#858796'>".$sem."</em></h1>";
                       
                        ?>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Violators (Current Semester)</div>

                                                <?php
                                                    $row = $a->prepare("SELECT * FROM prefect_reports WHERE acad_year = '$year' AND acad_sem = '$sem'");
                                                    $row->execute();
                                                    $result = $row->get_result();

                                                    echo "<div class='h5 mb-0 mr-3 font-weight-bold text-gray-800'>".$result->num_rows."</div>";
                                                ?>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Violators
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <?php
                                                        $row = $a->prepare("SELECT * FROM prefect_reports");
                                                        $row->execute();
                                                        $result = $row->get_result();

                                                        echo "<div class='h5 mb-0 mr-3 font-weight-bold text-gray-800'>".$result->num_rows."</div>";
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas  fa-flag fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Status</div>
                                                <?php
                                                        $row = $a->prepare("SELECT * FROM prefect_reports WHERE cs_status = 'Pending' ");
                                                        $row->execute();
                                                        $result = $row->get_result();

                                                        echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>".$result->num_rows."</div>";
                                                    ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas  fa-folder-open fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" onclick="window.location='https://calendar.google.com/calendar/u/0/r?pli=1';" title="Click to view Google Calendar">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Calendar</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 container" style="font-size: 14px; padding: 0px" id="clockDisplay"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-days fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Violations Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Violators Status</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
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

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

    <script>
        function renderTime() {
        // <!-- Date -->
        var myDate = new Date();
        var year = myDate.getYear();
        if(year < 1000) {
            year +=1900
        }
        var day = myDate.getDay();
        var month = myDate.getMonth();
        var daym = myDate.getDate();
        var dayArray = new Array("Sunday", "Monday", "Tuesday","Wednesday","Thursday","Friday","Saturday");
        var monthArray = new Array("January","February","March","April","May","June","July","August","September","October","November","December");
        // <!-- Time -->
        var currentTime = new Date();
        var h = currentTime.getHours();
        var m = currentTime.getMinutes();
        var s = currentTime.getSeconds();
        if(h == 24) {
        h=0;
        }
        else if(h > 12) {
        h= h - 0;
        }
        if(h < 10) {
        h = "0" + h;
        }
        if(m < 10) {
        m = "0" + m;
        }
        if(s < 10) {
        s = "0" + s;
        }
        
        var myClock = document.getElementById("clockDisplay");
        myClock.textContent = "" + dayArray[day] + ", " + monthArray[month] + " " + daym + ", " + year + "  " + h + ":" + m + ":" + s;
        myClock.innertText = "" + dayArray[day] + " " + daym + monthArray[month] + " " + year + "  " + h + ":" + m + ":" + s;
        setTimeout("renderTime()", 1000);
        }
    </script>

</body>
</html>
<?php
$stmt->close();
}
else {
	header("Location: ../");
} 
?>