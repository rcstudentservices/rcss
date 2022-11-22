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
	$stmt->close();
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
    <title>RCSS | Add New Academic Year</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet"> 
    <link href="../fontawesome/css/all.min.css" rel="stylesheet">
</head>
<body id="page-top">
	
	<!--edit acad year modal-->
	<div class="modal fade" id="editviewCOL_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="save_new_acadyear.php" method="POST">
                        <div class="modal-header">
                            <h5>You are viewing student data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                    <div class="modal-body" style=" height: 300px; overflow-y: scroll;">
                        <!-- <input type="hidden" name="stud_id" id="stud_id"> -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- note -->
                                   <label for="" style="color:grey; font-size: 14px;">You are not allowed to modify these data, except <label style="color: #4e73df;">status</label>.</label><br>
                                    <!-- student id -->
                                </div>
                            </div>
							
							<div class="col-md-6">
                                <div class="form-group" style="margin-top: 10px;">
                                    <!-- cs-location -->
                                    <label style="font-weight:500; font-size:14px; ">Academic Year:</label>
                                    <input type="text" class="form-control" id="cs_location" name="acad_year_modal" style="background-color: white;" readonly>
                                </div>
                            </div>
							
							<div class="col-md-6">
                                <div class="form-group" style="margin-top: 10px;">
                                    <!-- cs-hours -->
                                    <label style="font-weight:500; font-size:14px; ">Semester:</label>
                                    <input type="text" class="form-control" id="cs_hours" name="semester_modal" style="background-color: white;" readonly>
                                </div>
                            </div>
                           
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- cs-status -->
                                <label style="font-weight:500; font-size:14px; color: #4e73df;">Status: <br><em style="color: #858796;">Current Status:  </em><input type="text" id="cs_status" style="border:none; pointer-events: none;   outline: none;" readonly></label>
                                    <select name="status_modal" id="" class="form-control" required>
                                    <option value="" disabled selected value >Select Status...</option>
                                            <option value="Not Yet Started" style="background-color: #fdff77;">Not Yet Started</option>
                                            <option value="Active" style="background-color: #4afb61;">Active</option>
										<option value="Done" style="background-color: #BFBFBF;">Done</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                       <button type='button' class='btn btn-danger mr-auto deleteCOL'>Delete</button></td>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="updateacadyear" class="btn btn-primary">Update</button>
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
			
			<li class="nav-item active">
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
            
                
            <div class="container-fluid mt-4">
             <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Add New Academic Year & Semester</h1>
            
            
            <!-- Adding Acad Year form -->
        <div class="card shadow ">
            
                <!-- Card Body -->
                <div class="card-body">
                    <form method="post" action="save_new_acadyear.php">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Academic Year - Start</label>
                                <input type="text" onkeypress='validate(event)' name="acad_year_start" required minlength="4" maxlength="4" placeholder="Start of Academic Year" class="form-control wow fadeInUp" title="Example: 200xx">
                            </div>
							<div class="col-md-4">
                                <label>Academic Year - End</label>
								<input type='text' name="acad_year_end" required minlength="4" maxlength="4" placeholder="End of Academic Year" onkeypress='validate(event)' class="form-control wow fadeInUp" title="Example: 200xx">
                                
								<script>
									function validate(evt) {
  									var theEvent = evt || window.event;

  									// Handle paste
  									if (theEvent.type === 'paste') {
      									key = event.clipboardData.getData('text/plain');
  									} else {
  									// Handle key press
      									var key = theEvent.keyCode || theEvent.which;
      									key = String.fromCharCode(key);
  									}
  									var regex = /[0-9]|\./;
  									if( !regex.test(key) ) {
    									theEvent.returnValue = false;
    									if(theEvent.preventDefault) theEvent.preventDefault();
  									}
									}
								</script>
								
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Semester</label>
                                    <select type="text" class="form-control" name="acad_sem" id="acad_sem" required>
                                        <option value="" disabled selected value >Select Semester</option>
                                        <option value="1st Semester">1st Semester</option>
                                        <option value="2nd Semester">2nd Semester</option>
                                    </select>
                                </div>
                            </div>
                        </div>
						<div>
                                    <!-- button submit -->
                                    <center><button type="submit" class="col-md-6 btn btn-primary" name="submitAcadyear"  id="form_submit">Save</button></center>
                            </div>
                    </form>
                </div>
            </div>  
        </div>
			
			<div class="container-fluid">
             <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Academic Year & Semester</h1>
            
            
            <!-- View All Acad Year -->
        <div class="card shadow ">  
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
											<th>Academic Year</th>
                                            <th>Semester</th>
                                            <th>Status</th>
											<th>Edit</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query_acadyear = "SELECT acadyear_desc, acadyear_sem, acadyear_status FROM tbl_academicyear ORDER BY acadyear_desc DESC";
											$get_acadyear = $con->query($query_acadyear);
											
											while($row = $get_acadyear->fetch_assoc())
											{
												
												echo"
												<tr>
												<td>".$row['acadyear_desc']."</td>
												<td>".$row['acadyear_sem']."</td>
												<td>".$row['acadyear_status']."</td>
												";
												
												echo"<td><button type='button' class='btn-circle btn-success viewCOL'></svg><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' width='16' height='16' fill='currentColor' viewBox='0 0 528.899 528.899' style='enable-background:new 0 0 528.899 528.899;' xml:space='preserve'> <g> <path d='M328.883,89.125l107.59,107.589l-272.34,272.34L56.604,361.465L328.883,89.125z M518.113,63.177l-47.981-47.981   c-18.543-18.543-48.653-18.543-67.259,0l-45.961,45.961l107.59,107.59l53.611-53.611   C532.495,100.753,532.495,77.559,518.113,63.177z M0.3,512.69c-1.958,8.812,5.998,16.708,14.811,14.565l119.891-29.069   L27.473,390.597L0.3,512.69z'/></svg></button></td>
												</tr>";
											}
										?>
									</tbody>
									<tfoot>
										<tr>
											<th>Academic Year</th>
                                            <th>Semester</th>
                                            <th>Status</th>
											<th>Edit</th>
										</tr>
									</tfoot>
						</table>
											
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
	
	<!-- MODAL SCRIPT FOR EDITING ACAD YEAR -->
	<script>
    $(document).ready(function () 
    {
    $('.viewCOL').on('click', function () 
    {
        $('#editviewCOL_modal').modal('show');
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        console.log(data);

		
		$('#cs_location').val(data[0]);
        $('#cs_hours').val(data[1]);
		$('#cs_status').val(data[2]);
    });
    });
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

}
else {
	header("Location: ../");
} 
?>