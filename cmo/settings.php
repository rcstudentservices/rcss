<?php      
  include "../includes/db.php";
    session_start();
  if (!isset($_SESSION['cloggedin']))
  {   
      header("Location: ../index.php");
      exit;
  }
  else if (isset($_SESSION['cloggedin'])) {
 $val = $con->prepare('SELECT emp_num, emp_fname, emp_mname, emp_lname, job_code, emp_address, emp_email, emp_contactnum FROM tbl_emp WHERE id = ?');
  // In this case we can use the account ID to get the account info.
  $val->bind_param('i', $_SESSION['cid']);
  $val->execute();
  $val->bind_result($emp_num, $emp_fname, $emp_mname, $emp_lname,$job_code, $emp_address, $emp_email, $emp_contactnum);
  $val->fetch();
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
</head>
<style>
    #wrapper #content-wrapper #content {
    flex: 0 0 auto;
    }
    body.sidebar-toggled footer.sticky-footer {
    width: 100%;
    margin-top: 197px;
}
</style>
<body id="page-top" class="sidebar-toggled">
    <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
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
                            <span>Campus Ministry Office Records</span>
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

            <div class="container">
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right" style="max-width: 391px">
					<div class="p-4 text-center" style="">
						<div class="img-circle text-center mb-3">
							<img src="img/user2.jpg" alt="Image" class="shadow">
						</div>
						<h4 class="text-center"><?php echo $emp_fname . " " . $emp_mname . " " . $emp_lname?></h4>
						<div class="profile-container">
								<div class="label-grid" style="padding: 20px; font-size: 15px; text-align: left;">
                                    <div class="row" style="text-align:center;">
                                        <div class="col-md-12">
                                            <label>Username:</label>
                                            <label><strong><?php echo $emp_num?></strong></label>
                                        </div>
                                        <div class="col-md-12">
											<label>Job Position:</label>
											<label><strong><?php echo $job_code?></strong></label>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Address:</label>
                                            <label><strong><?php echo $emp_address?></strong></label>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Contact Number:</label>
                                            <label><strong><?php echo $emp_contactnum?></strong></label>
                                        </div>
                                        <div class="col-md-12">
											<label>Email:</label>
											<label><strong><?php echo $emp_email?></strong></label>
                                        </div>
                                    </div>
								</div>
							</div>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						
						<a class="nav-link active" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Password
						</a>
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Password Settings</h3>
						<form action="settings_EDIT.php" method="POST">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Old password</label>
										<input type="password" name="oldpass" class="form-control" id="id_password1" placeholder="Enter Your Old Password" style="padding-right: 50px" required>
										<span class="p-viewer">
											<i class="far fa-eye" id="togglePassword1" aria-hidden="true"></i>
										</span>
									</div>
								</div>	
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>New password</label>
										<input type="password" name="newpass" class="form-control" id="id_password2" placeholder="Enter Your New Password" style="padding-right: 50px" required>
										<span class="p-viewer2">
											<i class="far fa-eye" id="togglePassword2" aria-hidden="true"></i>
										</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Confirm new password</label>
										<input type="password" name="confpass" class="form-control" id="id_password3" placeholder="Enter Your Confirm Password" style="padding-right: 50px" required>
										<span class="p-viewer3">
											<i class="far fa-eye" id="togglePassword3" aria-hidden="true"></i>
										</span>
									</div>
								</div>
							</div>
							<div>
								<button class="btn btn-primary" name="update_pass">Update</button>
								<button class="btn btn-light" name="cancel">Cancel</button>
							</div>
						</form>	
						<!-- for password scripts -->
                        
						<script>
							const togglePassword1 = document.querySelector('#togglePassword1');
							const password1 = document.querySelector('#id_password1');

							togglePassword1.addEventListener('click', function (e) {
								// toggle the type attribute
								const type1 = password1.getAttribute('type') === 'password' ? 'text' : 'password';
								password1.setAttribute('type', type1);
								// toggle the eye slash icon
								this.classList.toggle('fa-eye-slash');
							});

							const togglePassword2 = document.querySelector('#togglePassword2');
							const password2 = document.querySelector('#id_password2');

							togglePassword2.addEventListener('click', function (e) {
								// toggle the type attribute
								const type2 = password2.getAttribute('type') === 'password' ? 'text' : 'password';
								password2.setAttribute('type', type2);
								// toggle the eye slash icon
								this.classList.toggle('fa-eye-slash');
							});

							const togglePassword3 = document.querySelector('#togglePassword3');
							const password3 = document.querySelector('#id_password3');

							togglePassword3.addEventListener('click', function (e) {
								// toggle the type attribute
								const type3 = password3.getAttribute('type') === 'password' ? 'text' : 'password';
								password3.setAttribute('type', type3);
								// toggle the eye slash icon
								this.classList.toggle('fa-eye-slash');
							});
						</script>
					</div>
					<style>
						.p-viewer, .p-viewer2, .p-viewer3{
						float: right;
						margin-top: -30px;
						margin-right: 20px;
						position: relative;
						z-index: 1;
						cursor:pointer;
						}
						.fa-eye{
							color: #ff8e2b;
						}
					</style>
					
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
<?php
$val->close();
}
?>

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