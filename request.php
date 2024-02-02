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

    <title>Requests</title>

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
                src="Images/w_profile.svg"
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
          <a class="nav-link" href="#">
            <div class="d-flex align-items-center active-link">
              <img
                src="Images/r_req.svg"
                class="mx-3"
                width="30"
                height="28"
                alt=""
              />
              <div class="sidesize t1color">Requests</div>
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
            <div class="d-flex align-items-center">
              <img
                src="Images/w_regacc.svg"
                class="mx-3"
                width="30"
                height="28"
                alt=""
              />
              <div class="sidesize">Registered Accounts</div>
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
            <h3 class="font-weight-bold lm-1">Requests</h3>

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
    <button class="btn btn-outline-success" type="button" id="searchButton">Search</button>
              </div>


            <!-- DataTables -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 fsml font-weight-bold t1color">Requests List</h6>
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
                  <div class="dropdown d-inline-flex align-items-center">
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
    <th class='text-center'>Patron No.</th>
    <th class='text-center'>Borrower's Name</th>
    <th class='text-center'>Reference No.</th>
	<th class='text-center'>Reading Material Title</th>
    <th class='text-center'>Requested Checked out Date</th>
	<th class='text-center'>Requested Due Date</th>
    <th class='text-center'>Action</th>
</tr>
<?php
$response = file_get_contents('http://localhost/php-crud-api/dis_req_table.php');
$json_data = json_decode($response, true);

if ($json_data !== null && isset($json_data['requests'])) {

    $counter = 1;
    foreach ($json_data['requests'] as $request) {
        // Fetch the borrower's first name and last name from the patron_table
        $borrowerName = fetchBorrowerName($request['pat_id']);
		if ($request['req_status'] === 'Approved' || $request['req_status'] === 'Declined') {
            continue; // Skip this row
        }
        echo "<tr>";
        echo "<td class='text-center'>{$counter}</td>";
        echo "<td class='text-center'>{$request['pat_id']}</td>";
        echo "<td class='text-center'>{$borrowerName}</td>"; // Display combined borrower's name
        echo "<td class='text-center'>{$request['book_id']}</td>";
		echo "<td class='text-center'>" . fetchBookTitle($request['book_id']) . "</td>";
        echo "<td class='text-center'>{$request['date_req']}</td>";
		echo "<td class='text-center'>{$request['due_req']}</td>";
        echo "<td class='text-center'>";
			if ($request['req_status'] == 'Process') {
			echo "<div class='btn-group'>";
			echo "<button class='btn btn-success btn-sm accept-btn' data-id='{$request['req_id']}'>Approve</button>";
			echo "<button class='btn btn-danger btn-sm decline-btn' data-id='{$request['req_id']}' style='margin-left: 5px;'>Decline</button>";
			echo "</div>";
		} else {
			echo $request['req_status'];
		}
		echo "</td>";
        echo "</tr>";
        $counter++;
    }
} else {
    echo "<tr><td colspan='9'>No data available.</td></tr>";
}

// Function to fetch borrower's name from the patron_table using pat_id
// Function to fetch borrower's name from the patron_table using pat_id
function fetchBorrowerName($pat_id) {
    // Set up your database connection here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "php_api";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch borrower's first name and last name and combine them
    $sql = "SELECT CONCAT(fname, ' ', lname) AS full_name FROM patron_table WHERE pat_id = '$pat_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fullName = $row["full_name"];
    } else {
        $fullName = "Unknown"; // Default value if no match found
    }

    // Close the database connection
    $conn->close();

    return $fullName;
}

function fetchBookTitle($bookId) {
    // Set up your database connection here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "php_api";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch the book title using the provided book_id
    $sql = "SELECT title FROM book_table WHERE book_id = '$bookId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row["title"];
    } else {
        $title = "N/A"; // Default value if no match found
    }

    // Close the database connection
    $conn->close();

    return $title;
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
	
	<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm Action</h5>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to <span id="modalAction"></span> this request?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="modalCancelButton">Cancel</button>
                <button type="button" class="btn btn-primary" id="modalConfirmButton" style='background-color: #a82c3c; border-color: #a82c3c;'>Confirm</button>
            </div>
        </div>
    </div>
</div>


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
    <script src="js/demo/datatables-demo.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
	
	 <script>
   $(document).ready(function () {
    var selectedRequestId;
    var selectedRequestStat;

    $('.accept-btn, .decline-btn').click(function () {
        selectedRequestId = $(this).data('id');
        selectedRequestStat = $(this).hasClass('accept-btn') ? "Approved" : "Declined";

        $('#modalAction').text(selectedRequestStat);
        $('#confirmationModal').modal('show');
    });

    $('#modalConfirmButton').click(function () {
        $('#confirmationModal').modal('hide');
        updateRequestStatus(selectedRequestId, selectedRequestStat);
    });

    $('#modalCancelButton').click(function () {
        $('#confirmationModal').modal('hide');
    });

        function updateRequestStatus(requestId, requestStat) {
            $.ajax({
                url: 'http://localhost/php-crud-api/up_req.php',
                type: 'PUT',
                data: JSON.stringify({ req_id: requestId, req_status: requestStat }),
                contentType: 'application/json',
                success: function (response) {
                    if (requestStat === 'Approved') {
                        reMark = "Pending";
                    } else if (requestStat === 'Declined') {
                        reMark = "Declined";
                    }
                    console.log(response);
                    createBorrowRecord(requestId, requestStat, reMark);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                    alert('An error occurred while updating the request status.');
                }
            });
        }

        function createBorrowRecord(requestId, requestStat, reMark) {
            $.ajax({
                url: 'http://localhost/php-crud-api/create_borrow.php',
                type: 'POST',
                data: JSON.stringify({ req_id: requestId, remark: reMark }),
                contentType: 'application/json',
                success: function (response) {
                    console.log(response);
                    // Handle the success of creating a record in the borrow_table
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.error(error);
                    alert('An error occurred while creating a record in the borrow_table.');
                }
            });
        }
    });
	
	function toggleRowsVisibility() {
        const selectValue = $('select[name=dataTable_length]').val();
        const visibleRowCount = (selectValue === 'All') ? $('#dataTable tbody tr').length : parseInt(selectValue);

        $('#dataTable tbody tr').addClass('d-none');
        $('#dataTable tbody tr').slice(0, visibleRowCount).removeClass('d-none');
    }

    // Attach the toggleRowsVisibility function to the change event of the select input
    $('select[name=dataTable_length]').on('change', toggleRowsVisibility);

    // Initial call to set the initial row visibility based on the select input
    toggleRowsVisibility();
	
</script>







	
  </body>
</html>
