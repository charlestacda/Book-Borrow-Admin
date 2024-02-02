<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Registered Accounts</title>

    <!-- Custom fonts for this template -->
    <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link
      href="vendor/datatables/dataTables.bootstrap4.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
	
	<style>
.table{
	font-size: 15px;
}

.modal-header .close {
			display: none;
		}
		
		.modal-dialog {
			display: flex;
			align-items: center;
			min-height: calc(100% - 1rem);
			margin: 0 auto;
		}

	</style>
	
  	<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
  ></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<script>
	$(document).ready(function() {
  $('#searchButton').click(function() {
    var searchValue = $('#searchInput').val().toLowerCase().replace(/\s+/g, '');

    $('#dataTable tbody tr').each(function() {
      var rowText = $(this).text().toLowerCase().replace(/\s+/g, '');
      if (rowText.indexOf(searchValue) === -1) {
        $(this).hide();
      } else {
        $(this).show();
      }
    });
  });
});
    function validateForm() {
        var patId = document.getElementById("pat_id").value;
        var lname = document.getElementById("lname").value;
        var fname = document.getElementById("fname").value;
        var mname = document.getElementById("mname").value;
        var patronType = document.getElementById("patron_type").value;
        var course = document.getElementById("course").value;
        var email = document.getElementById("email").value;
        var regDate = document.getElementById("reg_date").value;
        var empId = document.getElementById("empId").value;
        var password = document.getElementById("pass").value;
        var conPassword = document.getElementById("conPass").value;

        if (patId === "" || lname === "" || fname === "" || mname === "" || patronType === "Choose..." || course === "Choose..." || email === "" || regDate === "") {
            alert("Please fill in all the required fields.");
            return false;
        }

        if (empId === "" || password === "") {
            alert("Please fill the Employee ID and Password");
            return false;
        }

        if (conPassword === "") {
            alert("Please Confirm your Password");
            return false;
        }

        if (password !== conPassword) {
            alert("Passwords do not match.");
            return false;
        }

        // Check library ID and password
        if (empId !== "1234" || password !== "0000") {
            alert("Invalid library ID or password.");
            return false;
        }

        // Show confirmation dialog before submitting
        if (confirm("Are you sure you want to register the account?")) {
            return true; // The form will be submitted
        } else {
            return false; // The form will not be submitted
        }
    }
	</script>
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <ul
        class="navbar-nav sidebar sidebar-dark accordion"
        id="accordionSidebar"
      >
        <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
				<div class="sidebar-brand-icon">
					<img src="Images/logo.png" alt="" style="width: 110px; height: 50px;" />
				</div>
          </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <div class="d-flex align-items-center">
              <img
                src="Images/nins.jpg"
                style="border-radius: 50px;"
                class="mx-3"
                width="30"
                height="28"
                alt=""
              />
              <div class="ml-md-1 sz">
                Welcome,<br />
                Admin Name
              </div>
            </div>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <div class="d-flex align-items-center">
              <img
                src="Images/w_dashboard.svg"
                class="mx-3"
                width="30"
                height="28"
                alt=""
              />
              <div class="sidesize">Dashboard</div>
            </div>
          </a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="reading_mat.php">
            <div class="d-flex align-items-center">
              <img
                src="Images/w_readmat.svg"
                class="mx-3"
                width="30"
                height="28"
                alt=""
              />
              <div class="sidesize">Reading Materials</div>
            </div>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="request.php">
            <div class="d-flex align-items-center">
              <img
                src="Images/w_req.svg"
                class="mx-3"
                width="30"
                height="28"
                alt=""
              />
              <div class="sidesize">Requests</div>
            </div>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="borr_status.php">
            <div class="d-flex align-items-center">
              <img
                src="Images/w_status.svg"
                class="mx-3"
                width="30"
                height="28"
                alt=""
              />
              <div class="sidesize">Borrower's Status</div>
            </div>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="reg_acc.php">
            <div class="d-flex align-items-center active-link">
              <img
                src="Images/r_regacc.svg"
                class="mx-3"
                width="30"
                height="28"
                alt=""
              />
              <div class="sidesize t1color">Registered Accounts</div>
            </div>
          </a>
        </li>
      </ul>
      <!-- Divider -->
      <hr class="sidebar-divider" />
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav
            class="navbar navbar-expand navbar-light mainc topbar mb-4 static-top shadow"
          >
            <!-- Sidebar Toggle (Topbar) -->
            <form class="form-inline">
              <button
                id="sidebarToggleTop"
                class="btn btn-link d-md-none rounded-circle mr-3"
              >
                <i class="fa fa-bars"></i>
              </button>
            </form>

            <!-- Topbar Search -->
            <h3 class="font-weight-bold lm-1">Registered Accounts</h3>

            <!-- Logout Button -->
            <div class="ml-auto">
              <button class="btn btn-outline-light btn-sm" type="button" data-bs-toggle="modal" data-bs-target= "#logoutModal" >
						Log Out
					</button>
            </div>
          </nav>
          <!-- End of Topbar -->
          <!-- Begin Page Content -->
          <div class="container-fluid">
    <label>Search:
      <input
        type="search"
        class="form-control form-control-sm mb-4"
        placeholder=""
        aria-controls="dataTable"
        id="searchInput"
      />
    </label>
                <button
                  class="btn btn-outline-success"
                  type="button" id="searchButton"
                >
                  Search
                </button>
                    <button
			  type="button"
			  class="btn btn-outline-secondary ml-auto"
			  data-bs-toggle="modal" 
                      data-bs-target="#addreadmat"
                    >
                      Add Registered Account
                    </button>

                

            <!-- DataTables -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 fsml font-weight-bold t1color">
                  Registered Accounts List
                </h6>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="d-inline-flex align-items-center">
                    <label class="mr-2">Show</label>
                    <select
                      name="dataTable_length"
                      aria-controls="dataTable"
                      class="custom-select custom-select-sm form-control form-control-sm mr-2 mb-2"
                    >
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select>
                    <label>entries</label>
                  </div>
                </div>

                <div class="modal fade" id="addreadmat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title t1color" id="exampleModalLabel">Add Registered Account</h5>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form id="addregAcc" onsubmit="return validateForm();" class="row g-3" action="create_acc.php" method="POST" enctype="multipart/form-data">
                                <div class="col-md-4">
                                    <label for="pat_id" class="form-label">ID No.</label>
                                    <input type="text" class="form-control" id="pat_id" name="pat_id" >
                                </div>
                                    <div class="col-md-4">
                                    <label for="lname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lname" name="lname">
                                    </div>
                                <div class="col-md-4">
                                    <label for="fname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname">
                                </div>
                                <div class="col-md-4 mg-20">
                                  <label for="mname" class="form-label">Middle Name</label>
                                  <input type="text" class="form-control" id="mname" name="mname">
                              </div>
							   <div class="col-md-4 mg-20">
                                  <label for="patron_type" class="form-label">Patron Type</label>
								  <select id="patron_type" class="form-select form-control" name="patron_type">
										<option selected>Choose...</option>
										<option>Student</option>
										<option>Alumni</option>
										<option>Faculty</option>
										<option>Staff</option>
									</select>
                              </div>
                                <div class="col-md-4 mg-20">
                                  <label for="course" class="form-label">Course/Program</label>
                                  <select id="course" class="form-select form-control" name="course">
									<option selected>Choose...</option>
									<option>BS Architecture</option>
									<option>BS Civil Engineering</option>
									<option>BS Computer Engineering</option>
									<option>BS Electrical Engineering</option>
									<option>BS Electronics Engineering</option>
									<option>BS Mechanical Engineering</option>
									<option>BS Industrial Engineering</option>
									<option>BS Computer Science/option>
									<option>BS Information Technology</option>
									<option>BS Library and Information Science</option>
								</select>
                              </div>
                              <div class="col-md-4 mg-20">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                                <div class="col-md-4 mg-20">
                                  <label for="reg_date" class="form-label">Date of Registration</label>
                                  <input class="form-control" type="date" id="reg_date" name="reg_date" value="<?php echo date('Y-m-d'); ?>">
                              </div>
							   <div class="col-md-4 mg-20">
                                  <label for="empId" class="form-label">Employee ID</label>
                                  <input type="text" class="form-control" id="empId" name="empid">
                              </div>
                                <div class="col-md-4 mg-20">
                                  <label for="pass" class="form-label">Password</label>
                                  <input type="password" class="form-control" id="pass">
                              </div>
                              <div class="col-md-4 mg-20">
                                <label for="conPass" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="conPass">
                            </div>
                            
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" style='background-color: #a82c3c; border-color: #a82c3c;' name="submit">Register the Account</button>
                                </div>
                            </form>
                    </div>
                    </div>
                </div>

                <div class="table-responsive">
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
        <tr>
    <th class='text-center'>No.</th>
    <th class='text-center'>Patron ID</th>
    <th class='text-center'>Last Name</th>
    <th class='text-center'>First Name</th>
	<th class='text-center'>Middle Name</th>
	<th class='text-center'>Patron Type</th>
    <th class='text-center'>Course/Program</th>
    <th class='text-center'>E-mail Address</th>
	<th class='text-center'>Date of Registration</th>
	<th class='text-center'>Action</th>
</tr>
<?php
$response = file_get_contents('http://localhost/php-crud-api/get_pat.php');
$json_data = json_decode($response, true);

if ($json_data !== null && isset($json_data['posts'])) {
    $counter = 1;
    foreach ($json_data['posts'] as $post) {
	$patId = $post['pat_id'];
	
        echo "<tr>";
        echo "<td class='text-center'>{$counter}</td>";
        echo "<td class='text-center'>{$post['pat_id']}</td>";
        echo "<td class='text-center'>{$post['lname']}</td>";
        echo "<td class='text-center'>{$post['fname']}</td>";
        echo "<td class='text-center'>{$post['mname']}</td>";
		echo "<td class='text-center'>{$post['patron_type']}</td>";
        echo "<td class='text-center'>{$post['course']}</td>";
        echo "<td class='text-center'>{$post['email']}</td>";
        echo "<td class='text-center'>{$post['reg_date']}</td>";		
        echo "<td class='text-center'>";
        echo    "<button type='button' class='btn btn-sm btn-info ml-auto mb-2 mr-1' data-bs-toggle='modal' data-bs-target='#editEmp'> Edit <i class='fa-solid fa-pen'></i></button>";
		echo    "<button type='button' class='btn btn-sm btn-danger ml-auto mb-2 mr-1' data-bs-toggle='modal' data-bs-target='#archiveEmp'> Archive </button>";
        echo "</td>";
        echo "</tr>";
        $counter++;
    }
} else {
    echo "<tr><td colspan='9'>No data available.</td></tr>";
}
?>



    </table>
                  <div class="d-flex justify-content-between">
                    <div
                      class="dataTables_info"
                      id="dataTable_info"
                      role="status"
                      aria-live="polite"
                    >
                      Showing 1 to 5 of 5 entries
                    </div>
                    <ul class="pagination">
                      <li
                        class="paginate_button page-item previous disabled"
                        id="dataTable_previous"
                      >
                        <a
                          href="#"
                          aria-controls="dataTable"
                          data-dt-idx="0"
                          tabindex="0"
                          class="page-link"
                          >Previous</a
                        >
                      </li>
                      <li class="paginate_button page-item active">
                        <a
                          href="#"
                          aria-controls="dataTable"
                          data-dt-idx="1"
                          tabindex="0"
                          class="page-link"
                          >1</a
                        >
                      </li>
                      <li
                        class="paginate_button page-item next disabled"
                        id="dataTable_next"
                      >
                        <a
                          href="#"
                          aria-controls="dataTable"
                          data-dt-idx="2"
                          tabindex="0"
                          class="page-link"
                          >Next</a
                        >
                      </li>
                    </ul>
                  <!-- Modal (Edit Data) -->
                  <div class="modal fade" id="editEmp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title t1color" id="exampleModalLabel">Edit Registered Account</h5>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form onsubmit="return confirm('Are you sure you want to edit this registered Account?')" class="row g-3" action="add_employee.php" method="POST" enctype="multipart/form-data">
                                <div class="col-md-4">
                                    <label for="fname" class="form-label">ID No.</label>
                                    <input type="text" class="form-control" id="fname" name="fname" >
                                </div>
                                    <div class="col-md-4">
                                    <label for="middleName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="middleName" name="midname">
                                    </div>
                                <div class="col-md-4">
                                    <label for="lastName" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="lastName" name="lname">
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="lastName" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lname">
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="lastName" class="form-label">Course/Program</label>
                                    <input type="text" class="form-control" id="lastName" name="lname">
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="lastName" class="form-label">Email Address</label>
                                    <input type="text" class="form-control" id="lastName" name="lname">
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="bday" class="form-label">Date of Registration</label>
                                    <input class="form-control" type="date" id="bday" name="bday">
                                </div>
                                <div class="col-md-4 mg-20">
                                    <label for="id" class="form-label">Employee ID</label>
                                    <input type="text" class="form-control" id="id" name="id_emp">
                                </div>
                                <div class="col-md-4 mg-20">
                                  <label for="password" class="form-label">Password</label>
                                  <input type="password" class="form-control" id="password">
                              </div>
                              <div class="col-md-4 mg-20">
                                <label for="conPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="conPassword">
                            </div>
                            
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn modal-title t1color" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn" name="submit">Edit Registered Account</button>
                                </div>
                            </form>
                    </div>
                    </div>
                </div>

          <!-- Modal (Archive)-->
          <div
            class="modal fade"
            id="archiveEmp"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5
                    class="modal-title"
                    id="exampleModalLabel"
                    style="color: #1d668c"
                  >
                    Archive
                  </h5>
                  <button
                    type="button"
                    class="btn"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  >
                    <i class="fa-solid fa-xmark"></i>
                  </button>
                </div>
                <div class="modal-body centered">
                  <p>
                    You are about to archive a registered account record in the system.
                    Are you sure you want to archive this record?
                  </p>

                  <form class="row g-3 justify-content-center">
                    <div class="col-md-8 mg-20">
                      <input
                        type="password"
                        class="form-control"
                        id="inputPassword4"
                        placeholder="Confirm your Password"
                      />
                    </div>
                  </form>

                  <div class="mg-40">
                    <p>NOTE: THIS ACTION CANNOT BE REVERTED ONCE CONFIRMED</p>
                  </div>
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="btn tcolor pbtn"
                    data-bs-dismiss="modal"
                  >
                    Close
                  </button>
                  <button type="button" class="btn btnc tcolor">
                    Confirm
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
        <!-- End of Main Content -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Select "Logout" below if you are ready to end your current session.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" style='background-color: #a82c3c; border-color: #a82c3c;' href="login.php">Logout</a>
      </div>
    </div>
  </div>
</div>



  </body>
</html>
