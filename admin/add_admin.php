<?php
session_start();

if (!isset($_SESSION['a_loggedin'])){   
    header("Location: ../admin.php");
	exit;
}
else if (isset($_SESSION['a_loggedin'])) {
    include "../includes/db.php";
    
    if (!isset($_SESSION['a_loggedin']))
    {   
        header("Location: ../admin.php");
        exit;
    }
    $stmt = $con->prepare('SELECT username, firstname, midname, lastname FROM admin WHERE id = ?');
    // In this case we can use the account ID to get the account info.
    $stmt->bind_param('i', $_SESSION['a_id']);
    $stmt->execute();
    $stmt->bind_result($admin_username, $admin_fname, $admin_midname, $admin_lname);
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
                    <span>Health Services Accounts</span></a>
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
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $admin_fname . " ";
	  							if($admin_midname != 'n/a'){
									 echo $admin_midname;
								}
								echo " " . $admin_lname;?></span>
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
            
                
            <div class="container-fluid">
             <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">New Administrator Account</h1>

            <!-- Dropdown Card Example -->
        <div class="card shadow ">
			<div class="card-body">
            	<form method="post" action="save_new_admin.php">
                	<div class="row">
                    	<div class="col-md-4">
                                <div class="form-group">
                                    <label>Username</label>
							<input type="text"  class="form-control" name="admin_username" placeholder="Enter Admin Username" required>
                                </div>
                            </div>
						<br>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>First Name</label>
						<input type="text"  class="form-control" name="admin_fname"
						placeholder="Enter Admin's First Name"  required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Middle Name</label>
						<input type="text"  class="form-control" name="admin_mname" placeholder="Enter Admin's Middle Name" >
                                </div>
							</div>
							
							<div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Name</label>
						<input type="text"  class="form-control" name="admin_lname" placeholder="Enter Admin's Last Name" value="" required >
                                </div>
                            </div>
							
							
							
							<div class="col-md-4">
                                <div class="form-group">
                                    <label>Email Address</label>
						<input type="email" name="admin_email"  class="form-control" placeholder="Enter Admin's Email Address">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile Number</label>
						<input type="tel" name="admin_contnum" required minlength="11" maxlength="13" placeholder="Enter Admin's Mobile Number" class="form-control wow fadeInUp" oninput="this.value = this.value.replace(/[^0-9+()]/g, '');" pattern="^(09|\+639)\d{9}$" title="09XXXXXXXXX OR +63XXXXXXXXXX">
                                </div>
                            </div>
						
						<div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
						 <textarea class="form-control" name="admin_address" placeholder="Enter Admin's Address Here..." required></textarea>
                                </div>
                            </div>
						
                        </div>
                            <div>
                                    <!-- button submit -->
                                    <center><button type="submit" class="col-md-6 btn btn-primary" name="submitAdmin"  id="form_submit">Submit</button></center>
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