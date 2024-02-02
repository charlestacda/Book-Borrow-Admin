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

    <title>Borrower's Status</title>

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
            <div class="d-flex align-items-center active-link">
              <img
                src="Images/r_status.svg"
                class="mx-3"
                width="30"
                height="28"
                alt=""
              />
              <div class="sidesize t1color">Borrower's Status</div>
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
            <h3 class="font-weight-bold lm-1"> Borrower's Status</h3>

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

            <!-- DataTables -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 fsml font-weight-bold t1color">
                  Borrower's Status List
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
                  <label class="toggle-container">
                    <span class="toggle-label on">Approved</span>
                    <input type="checkbox" id="toggleSwitch" />
                    <div class="toggle-slider"></div>
                    <span class="toggle-label off">Declined</span>
                  </label>
                </div>

                <!---new table --->
               <div class="table-container">
				<table class="table table-bordered" id="dataTableDecline" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th class='text-center'>No.</th>
							<th class='text-center'>Request No.</th>
							<th class='text-center'>Patron No.</th>
							<th class='text-center'>Borrower's Name</th>
							<th class='text-center'>Reference No.</th>
							<th class='text-center'>Reading Material Title</th>
							<th class='text-center'>Checked Out Date</th>
							<th class='text-center'>Due Date</th>
							<th class='text-center'>Remarks</th>
						</tr>
					</thead>
					<tbody>
						<!-- Data will be added here -->
					</tbody>
				</table>
			</div>
				<div class="table-container">
					<table class="table table-bordered" id="dataTableApprove" width="100%" cellspacing="0">
                    <thead>
						<tr>
							<th class='text-center'>No.</th>
							<th class='text-center'>Request No.</th>
							<th class='text-center'>Patron No.</th>
							<th class='text-center'>Borrower's Name</th>
							<th class='text-center'>Reference No.</th>
							<th class='text-center'>Reading Material Title</th>
							<th class='text-center'>Checked Out Date</th>
							<th class='text-center'>Due Date</th>
							<th class='text-center'>Remarks</th>
						</tr>
					</thead>
					<tbody>
						<!-- Data will be added here -->
					</tbody>
				</table>
			</div>
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

	
	<!-- Confirmation Modal -->
<!-- Initial Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm Borrowing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to mark this book as borrowed?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmBorrowButton" style='background-color: #a82c3c; border-color: #a82c3c;'>Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- Return Confirmation Modal -->
<div class="modal fade" id="returnConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="returnConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="returnConfirmationModalLabel">Confirm Returning</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to mark this book as returned?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmReturnButton" style='background-color: #a82c3c; border-color: #a82c3c;'>Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- Overdue Confirmation Modal -->
<div class="modal fade" id="overdueConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="overdueConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="overdueConfirmationModalLabel">Confirm Overdue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to mark this book as overdue?
            </div>
            <div class="modal-footer">
			<!-- Overdue Confirmation Button -->
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
			<button id="overdueConfirmationButton" type="button" class="btn btn-primary" style='background-color: #a82c3c; border-color: #a82c3c;'>Confirm</button>

		</div>
	</div>
    </div>
</div>





<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Include DataTables CSS (if not already included) -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- Include DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- Include your toggle.js script -->
<script src="toggle.js"></script>

<!-- Your custom scripts -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>





<script>
$(document).ready(function () {
    var selectedBorrowRowData; // Store data for the Borrow button clicked
    var selectedReturnRowData; 


    function initializeDataTable(tableId, urlParam) {
        console.log(`Starting AJAX request for ${tableId} table`);
        $.ajax({
            url: `http://localhost/php-crud-api/dis_stat.php?table=${urlParam}`,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(`AJAX request successful for ${tableId} table`, response);
                if (response.ok && response.status === 200 && response.posts && response.posts.posts) {
                    console.log(`Response data is valid for ${tableId} table`);
                    var posts = response.posts.posts;

                    // Define column headers and data keys
                    var columns = [
                        { title: "No.", data: null },
						{ title: "Request No.", data: "req_id" },
                        { title: "Patron No.", data: "patron_no" },
                        { title: "Borrower's Name", data: "borrower_name" },
                        { title: "Reference No.", data: "reference_no" },
                        { title: "Reading Material Title", data: "reading_material_title" },
                        { title: "Checked Out Date", data: "checked_out_date" },
                        { title: "Due Date", data: "due_date" },
                        {
                            title: "Remarks",
                            data: "remark",
                            render: function (data, type, row) {
								if (type === "display") {
									if (data === "Pending") {
										return `<button class="btn btn-primary btn-sm borrow-button" data-toggle="modal" data-target="#confirmationModal" data-row-data='${JSON.stringify(row)}'>Pending</button>`;
									} else if (data === "Borrowed") {
										if (row.due_date) {
											var dueDate = new Date(row.due_date);
											var currentDate = new Date();
											var timeDifference = dueDate - currentDate;
											var daysRemaining = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

											if (daysRemaining > 0) {
												return `<button class="btn btn-success btn-sm return-button" data-toggle="modal" data-target="#returnConfirmationModal" data-row-data='${JSON.stringify(row)}'>${daysRemaining} ${daysRemaining === 1 ? 'day' : 'days'} left</button>`;
											} else {
												return `<button class="btn btn-danger btn-sm overdue-button" data-toggle="modal" data-target="#overdueConfirmationModal" data-row-data='${JSON.stringify(row)}'>Overdue</button>`;
											}
										} else {
											return `<button class="btn btn-success btn-sm">${data}</button>`;
										}
									} else if (data === "Returned") {
										return `<span class="text-success">${data}</span>`;
									} else {
										return data;
									}
								}
								return data; // For other data types, return original data
							},
                        },
                    ];

                    // Initialize DataTable with specified column headers
                    var dataTable = $(`#${tableId}`).DataTable({
                        paging: false,
                        searching: false,
                        info: false,
                        data: posts,
                        columns: columns,
                        columnDefs: [{ className: "text-center", targets: "_all" }],
                    });

                    // Automatically generate a sequence number for each row
                    dataTable.on("order.dt search.dt", function () {
                        dataTable
                            .column(0, { search: "applied", order: "applied" })
                            .nodes()
                            .each(function (cell, i) {
                                cell.innerHTML = i + 1;
                            });
                    }).draw();
                } else {
                    // Handle no data or incorrect response
                    console.log(`Response data for ${tableId} table is not valid`, response);
                    $(`#${tableId}Container`).html(`<p>No data available for ${tableId} table.</p>`);
                }
            },
            error: function (xhr, status, error) {
                console.error(`AJAX request error for ${tableId} table`, error);
                // Handle error case
                $(`#${tableId}Container`).html(`<p>An error occurred for ${tableId} table.</p>`);
            },
        });
    }

    // Initialize and populate Declined table
    initializeDataTable("dataTableDecline", "declined");

    // Initialize and populate Approved table
    initializeDataTable("dataTableApprove", "approved");

    var selectedRowData;

    // Borrow and Return button click handlers
    $("#dataTableApprove tbody").on("click", ".borrow-button, .return-button, .overdue-button", function () {
        var dataTable = $(this).closest("table").DataTable();
        var rowData = dataTable.row($(this).closest("tr")).data();

        // Store the selected row data for later use
        selectedRowData = {
            rowIdx: dataTable.row($(this).closest("tr")).index(),
            borr_id: rowData.borr_id,
            action: $(this).hasClass("borrow-button") ? "Borrowed" : ($(this).hasClass("return-button") ? "Returned" : "Overdue"),
            modalId: $(this).data("target"),
        };

        $(selectedRowData.modalId).modal("show");
    });

     // Confirm Borrow Button
	$("#confirmBorrowButton").click(function () {
        if (selectedRowData && selectedRowData.borr_id && selectedRowData.action) {
            updateDateReqAndDueReq(selectedRowData.borr_id, selectedRowData.modalId, selectedRowData.action, selectedRowData);
        }
    });




    // Return Confirmation Button
    $("#confirmReturnButton").click(function () {
        if (selectedRowData && selectedRowData.borr_id && selectedRowData.action === "Returned") {
            updateRemarkAndCloseModal("Returned", selectedRowData.modalId, selectedRowData);
        }
    });
	
// Overdue Confirmation Button
$("#overdueConfirmationButton").click(function () {
    if (selectedRowData && selectedRowData.borr_id && selectedRowData.action === "Overdue") {
        updateRemarkAndCloseModal("Overdue", selectedRowData.modalId, selectedRowData);
    }
});

	

	
	function updateDateReqAndDueReq(borrId, modalId, action, rowInfo) {
    var currentDate = new Date();

    // Get the selected row's data
    var dataTable = $("#dataTableApprove").DataTable();
    var rowData = dataTable.row(rowInfo.rowIdx).data();

    // Calculate the difference in days between the current due_date and the updated date_req
    var currentDueDate = new Date(rowData.due_date);
    var checkedOutDate = new Date(rowData.checked_out_date);
    var timeDifference = currentDueDate - checkedOutDate;
    var daysDifference = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

    // Calculate the new due_date based on the updated date_req and existing daysDifference
    var newDueDate = new Date(currentDate);
    newDueDate.setDate(newDueDate.getDate() + daysDifference);

    var newDateReq = currentDate.toISOString().split('T')[0];
    var newDueReq = newDueDate.toISOString().split('T')[0];

    // Prepare the JSON request
    var requestData = {
        req_id: rowData.req_id,
        date_req: newDateReq,
        due_req: newDueReq
    };

    $.ajax({
        url: "http://localhost/php-crud-api/change_date.php",
        type: "PUT",
        data: JSON.stringify(requestData),
        contentType: "application/json",
        success: function (response) {
            console.log("Date_req and Due_req updated successfully:", response);

            // Update the displayed date values in the table
            var dataTable = $("#dataTableApprove").DataTable();
            var row = dataTable.row(rowInfo.rowIdx);

            if (row && row.length) {
                var updatedRowData = row.data();
                updatedRowData.date_req = newDateReq;
                updatedRowData.due_req = newDueReq;
                row.data(updatedRowData).draw();

                // Close the modal
                $(modalId).modal("hide");

                // Call updateRemarkAndCloseModal after updating the table
                updateRemarkAndCloseModal(action, modalId, rowInfo);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error updating date_req and due_req:", error);
        }
    });
}


function updateRemarkAndCloseModal(remark, modalId, rowInfo) {
    $.ajax({
        url: "http://localhost/php-crud-api/up_stat.php",
        type: "PUT",
        data: JSON.stringify({ borr_id: rowInfo.borr_id, remark: remark }),
        contentType: "application/json",
        success: function (response) {
            console.log("Remark updated successfully:", response);

            var dataTable = $("#dataTableApprove").DataTable();
            var row = dataTable.row(rowInfo.rowIdx);

            if (row && row.length) {
                    var rowData = row.data();
                    rowData.remark = remark;
                    row.data(rowData).draw();

                    // Close the modal
                    $(modalId).modal("hide");

                // Reload the DataTable after both functions are executed
               location.reload();
            }
        },
        error: function (xhr, status, error) {
            console.error("Error updating remark:", error);
        },
    });
}

});

</script>






<style>
    .table-bordered.dataTable tbody td, .table-bordered.dataTable tbody th {
        border: 1px solid #dee2e6 !important;
    }
</style>



  </body>
</html>
