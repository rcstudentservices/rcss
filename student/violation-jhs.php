<?php
session_start();

if (!isset($_SESSION['sloggedin']))
{   
    header("Location: ../");
	exit;
}
else if (isset($_SESSION['sloggedin'])) {
    include "../includes/db.php";

    
    $name = $_SESSION['sname'];
    $sql = "SELECT emp_num, emp_fname, emp_mname, emp_lname FROM tbl_emp WHERE emp_num = '$name' ";
    $fetch = $con->query($sql);

    while($row = $fetch->fetch_assoc())
    {
        $emp_fname = $row['emp_fname'];
        $emp_mname = $row['emp_mname'];
        $emp_lname = $row['emp_lname'];
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet"> 
    <link href="../fontawesome/css/all.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<style>
    /* Hide scrollbar for Chrome, Safari and Opera */
    .modal-body::-webkit-scrollbar 
    {
    display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .modal-body 
    {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
    }
</style>
<body id="page-top" onLoad="renderTime(); renderDate();">   


    <!--VIEW REPORTS (DELETE MODAL) -->
    <div class="modal fade" id="deleteviewJHS_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are your sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="viewReports_CRUD.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="rec_id" id="rec_id">
                        <label for="">This data will be deleted immediately. You can't undo this action.</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="deleteJHS" class="btn  btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- VIEW REPORTS (EDIT MODAL) -->
    <div class="modal fade" id="editviewJHS_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="viewReports_CRUD.php" method="POST">
                        <div class="modal-header">
                            <h5>You are viewing student data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                    <div class="modal-body" style=" height: 500px; overflow-y: scroll;">
                        <!-- <input type="hidden" name="stud_id" id="stud_id"> -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- note -->
                                   <label for="" style="color:grey; font-size: 14px;">You are not allowed to modify these data, except <label style="color: #4e73df;">status</label>.</label><br>
                                    <!-- student id -->
                                    <label style="font-weight:500; font-size:14px; ">Student ID:</label>
                                    <input type="text" name="stud_id" id="stud_id" class="form-control" style="background-color: #4e73df;  color:white" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- Grade -->
                                    <label style="font-weight:500; font-size:14px; ">Grade/Section:</label>
                                    <input type="text" name="stud_grade_sec" id="stud_grade_sec" class="form-control" style="background-color: #4e73df; color:white"  readonly>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- cs-status -->
                                <label style="font-weight:500; font-size:14px; color: #4e73df;">CS-Status: <br><em style="color: #858796;">Current Status:  </em><input type="text" id="cs_status" style="border:none; pointer-events: none;   outline: none;" readonly></label>
                                    <select name="cs_status" id="" class="form-control" required>
                                    <option value="" disabled selected value >Select Status...</option>
                                            <option value="Pending" style="background-color: #fdff77;">Pending</option>
                                            <option value="Accomplished" style="background-color: #4afb61;">Accomplished</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="margin-top: 10px;">
                                    <!-- cs-location -->
                                    <label style="font-weight:500; font-size:14px; ">CS-Location:</label>
                                    <input type="text" class="form-control" id="cs_location" name="cs_location" style="background-color: white;" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="margin-top: 10px;">
                                    <!-- cs-hours -->
                                    <label style="font-weight:500; font-size:14px; ">CS-Hours:</label>
                                    <input type="text" class="form-control" id="cs_hours" name="cs_hours" style="background-color: white;" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="margin-top: 10px;">
                                    <!-- rec date -->
                                    <label style="font-weight:500; font-size:14px; ">Record date:</label>
                                    <input type="text" class="form-control" id="rec_date" name="rec_date" style="background-color: white;" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="margin-top: 10px;">
                                    <!-- rec time -->
                                    <label style="font-weight:500; font-size:14px; ">Record time:</label>
                                    <input type="text" class="form-control" id="rec_time" name="rec_time" style="background-color: white;" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!-- student violation type -->
                                    <label style="font-weight:500; font-size:14px; ">Violation:</label>
                                    <textarea type="text" name="violation_type" id="violation_type" rows="2" style="background-color: white;" class="form-control" readonly></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!-- student violation desc-->
                                    <label style="font-weight:500; font-size:14px; ">Description:</label>
                                    <textarea type="text" name="violation_desc" id="violation_desc" rows="2" style="background-color: white;" class="form-control" readonly></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- student disciplinary action -->
                                    <label style="font-weight:500; font-size:14px; ">Disciplinary Action:</label>
                                    <textarea type="text" name="discip_action" id="discip_action" rows="2" style="background-color: white;" class="form-control" readonly></textarea>
                                </div>
                            </div><div class="col-md-12">
                                <div class="form-group">
                                    <!-- involved person -->
                                    <label style="font-weight:500; font-size:14px; ">Involved Person:</label>
                                    <input type="text" name="add_person" id="add_person" rows="2" style="background-color: white;" class="form-control" readonly>
                                </div>
                            <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- employee signatory -->
                                    <label style="font-weight:500; font-size:14px; ">Employee Signatory:</label>
                                    <!-- employee id -->
                                    <input type="text" name="emp_num" id="emp_num" rows="2" style="background-color: white;" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="viewJHS" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


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
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Departments:</h6>
                        <a class="collapse-item active" href="violation-jhs.php">Junior High School</a>
                        <a class="collapse-item" href="violation-shs.php">Senior High School</a>
                        <a class="collapse-item" href="violation-college.php">College & TED</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
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
                            <span>Welcome, <?php echo $stud_fname?></span>
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

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $emp_fname . " " .$emp_mname. ". " . $emp_lname ?></span>
                                
                               
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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">View Reports</h1>
                    <p class="mb-4">This is for Junior High School Department, if you wish to add report(s) <a target="_blank"
                            href="reports.php">click here</a>.</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" style="float:right">Date: <em style="color: #858796" id="dateDisplay"></em> Time: <em style="color: #858796" id="clockDisplay"></em></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Full Name</th>
                                            <th>Grade/Section</th>
                                            <th>Academic Year</th>
                                            <th>Semester</th>
                                            <th>Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th hidden>cs_status</th>
                                            <th hidden>cs_location</th>
                                            <th hidden>cs_hours</th>
                                            <th hidden>rec_date</th>
                                            <th hidden>rec_time</th>
                                            <th hidden>violation_type</th>
                                            <th hidden>violation_desc</th>
                                            <th hidden>discip_action</th>
                                            <th hidden>add_person</th>
                                            <th hidden>emp_num</th>
                                            <th hidden>rec_id</th>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $sql = "SELECT * FROM prefect_reports WHERE dept_code = 'jhs'";
                                    $query = $con->query($sql);
                                    while($row = $query->fetch_assoc()){
                                    echo "
                                        <tr>
                                        <td>".$row['stud_id']."</td>
                                        <td>".$row['stud_name']."</td>
                                        <td>".$row['stud_grade_sec']."</td>
                                        <td>".$row['acad_year']."</td>
                                        <td>".$row['acad_sem']."</td>
                                        <td>".$row['rec_date']."</td>
                                        <td hidden>".$row['cs_status']."</td>
                                        <td hidden>".$row['cs_location']."</td>
                                        <td hidden>".$row['cs_hours']."</td>
                                        <td hidden>".$row['rec_date']."</td>
                                        <td hidden>".$row['rec_time']."</td>
                                        <td hidden>".$row['violation_type']."</td>
                                        <td hidden>".$row['violation_desc']."</td>
                                        <td hidden>".$row['discip_action']."</td>
                                        <td hidden>".$row['add_person']."</td>
                                        <td hidden>".$row['emp_num']."</td>
                                        <td hidden>".$row['rec_id']."</td>
                                        
                                        <td><button type='button' class='btn-circle btn-success viewJHS'></svg><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' width='16' height='16' fill='currentColor' viewBox='0 0 528.899 528.899' style='enable-background:new 0 0 528.899 528.899;' xml:space='preserve'> <g> <path d='M328.883,89.125l107.59,107.589l-272.34,272.34L56.604,361.465L328.883,89.125z M518.113,63.177l-47.981-47.981   c-18.543-18.543-48.653-18.543-67.259,0l-45.961,45.961l107.59,107.59l53.611-53.611   C532.495,100.753,532.495,77.559,518.113,63.177z M0.3,512.69c-1.958,8.812,5.998,16.708,14.811,14.565l119.891-29.069   L27.473,390.597L0.3,512.69z'/></svg></button></td>
                                        
                                        <td><button type='button' class='btn-circle btn-danger deleteJHS'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                        s</svg></button></td>
                                        </tr>";
                                        
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Full Name</th>
                                            <th>Grade/Section</th>
                                            <th>Academic Year</th>
                                            <th>Semester</th>
                                            <th>Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Developed by: Dela Cruz, Noveno, Penales, and Roderno  &copy; 2022</span>
                    </div>
                </div>
            </footer>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
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
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>
</html>
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
<script>
    function renderTime() {
    // <!-- Date -->
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
    myClock.textContent = "" + h + ":" + m + ":" + s;
    myClock.innertText = "" + h + ":" + m + ":" + s;
    setTimeout("renderTime()", 1000);
    }
</script>
<script>
    function renderDate() {
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

    
    var myClock = document.getElementById("dateDisplay");
    myClock.textContent = "" + dayArray[day] + ", " + monthArray[month] + " " + daym + ", " + year;
    myClock.innertText = "" + dayArray[day] + " " + monthArray[month] + " " + daym + ", " + year;
    }
</script>
<script>
    $(document).ready(function () 
    {
        $('.deleteJHS').on('click', function () 
        {
            $('#editviewJHS_modal').modal('hide');
            $('#deleteviewJHS_modal').modal('show');
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#rec_id').val(data[16]);
        }); 
    });
</script>
<script>
    $(document).ready(function () 
    {
    $('.viewJHS').on('click', function () 
    {
        $('#editviewJHS_modal').modal('show');
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        console.log(data);
        
        $('#stud_id').val(data[0]);
        $('#stud_name').val(data[1]);
        $('#stud_grade_sec').val(data[2]);
        $('#cs_status').val(data[6]);
        $('#cs_location').val(data[7]);
        $('#cs_hours').val(data[8]);
        $('#rec_date').val(data[9]);
        $('#rec_time').val(data[10]);
        $('#violation_type').val(data[11]);
        $('#violation_desc').val(data[12]);
        $('#discip_action').val(data[13]);
        $('#add_person').val(data[14]);
        $('#emp_num').val(data[15]);
        $('#emp_name').val(data[16]);
    });
    });
</script>
<?php
    }
}
?>

