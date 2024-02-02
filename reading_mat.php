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

    <title>Reading Materials</title>

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
            // Event handler for status change
            $(document).on('change', '.book-status', function() {
                var bookId = $(this).data('id');
                var newStatus = $(this).val();
                
                // Send AJAX request to update book status
                $.ajax({
                    url: 'http://localhost/php-crud-api/update.php',
                    type: 'PUT',
                    data: JSON.stringify({ book_id: bookId, book_status: newStatus }),
                    contentType: 'application/json',
                    success: function(response) {
                        // Handle the response here if needed
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle error here if needed
                        console.error(error);
                    }
                });
            });
            
            // Event handler for search button
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
    var bookId = document.getElementById("book_id").value;
    var title = document.getElementById("title").value;
    var author = document.getElementById("author").value;
    var publisher = document.getElementById("publisher").value;
    var content = document.getElementById("content").value;
    var category = document.getElementById("category").value;
    var pubDate = document.getElementById("pub_date").value;
    var empId = document.getElementById("id_emp").value;
    var password = document.getElementById("password").value;
    var conPassword = document.getElementById("conPassword").value;

    if (bookId === "" || title === "" || author === "" || publisher === "" || content === "" || category === "Choose..." || pubDate === "") {
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
    if (confirm("Are you sure you want to add the Reading Material?")) {
        return true; // The form will be submitted
    } else {
        return false; // The form will not be submitted
    }
}

function validateEdit(bookId) {
    var empId = document.getElementById("id_emp2_" + bookId).value;
    var password = document.getElementById("password2_" + bookId).value;
    var conPassword = document.getElementById("conPassword2_" + bookId).value;

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
	
	if (confirm("Are you sure you want to edit the Reading Material?")) {
        submitUpdateForm(bookId); // The form will be submitted
    } else {
        return false; // The form will not be submitted
    }
    
}

function validateArchive(bookId) {
    var conPassword = document.getElementById("conPassword3_" + bookId).value;

	
	if (conPassword === "") {
        alert("Please Confirm your Password");
        return false;
    }

    // Check library ID and password
    if (conPassword !== "0000") {
        alert("Wrong password.");
        return false;
    }
	
	if (confirm("Are you sure you want to archive the Reading Material?")) {
        submitArhiveForm(bookId); // The form will be submitted
    } else {
        return false; // The form will not be submitted
    }
    
}

function submitArhiveForm(bookId) {
        var status = "Archived";

        var updateData = {
            book_id: bookId,
            book_status: status
        };

        $.ajax({
            url: 'http://localhost/php-crud-api/update.php',
            type: 'PUT', // Use PUT method
            data: JSON.stringify(updateData),
            contentType: 'application/json',
            success: function(response) {
                console.log(response);
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }


		
		// Function to handle the update form submission
function submitUpdateForm(bookId) {
        var title = $('#title2_' + bookId).val();
        var category = $('#category2_' + bookId).val();
        var author = $('#author2_' + bookId).val();
		var crtAt = $('#created_at2_' + bookId).val();
        var content = $('#content2_' + bookId).val();
        var pubDate = $('#pub_date2_' + bookId).val();
        var publisher = $('#publisher2_' + bookId).val();

        var updateData = {
            book_id: bookId,
            title: title,
            category: category,
            author: author,
			created_at: crtAt,
            content: content,
            pub_date: pubDate,
            publisher: publisher
        };

        $.ajax({
            url: 'http://localhost/php-crud-api/edit.php',
            type: 'PUT', // Use PUT method
            data: JSON.stringify(updateData),
            contentType: 'application/json',
            success: function(response) {
                console.log(response);
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
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
          <a class="nav-link" href="#">
            <div class="d-flex align-items-center active-link">
              <img
                src="Images/r_readmat.svg"
                class="mx-3"
                width="30"
                height="28"
                alt=""
              />
              <div class="sidesize t1color">Reading Materials</div>
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
            <h3 class="font-weight-bold lm-1">Reading Materials</h3>

            <!-- Logout Button -->
            <div class="ml-auto">
				<form id="logoutForm">
				  <button class="btn btn-outline-light btn-sm" type="button" data-bs-toggle="modal" data-bs-target= "#logoutModal" >
						Log Out
					</button>
				</form>
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
            <button
			  type="button"
			  class="btn btn-outline-secondary ml-auto"
			  data-bs-toggle="modal" 
			  data-bs-target="#addreadmat"
			>
			  Add New Reading Material
			</button>
            <!-- DataTables -->
            <div class="modal fade" id="addreadmat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title t1color" id="exampleModalLabel">Add Reading Materials</h5>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    </div>
                    <div class="modal-body">
    <form id="addreadmatForm" onsubmit="return validateForm();" action="create.php" method="POST" enctype="multipart/form-data">
	<div class='row'>
        <div class="col-md-6 mg-20">
            <label for="book_id" class="form-label">Reference No.</label>
            <input type="text" class="form-control" id="book_id" name="book_id">
        </div>
        <div class="col-md-6 mg-20">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
	</div>
	<div class='row'>
        <div class="col-md-6 mg-20">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author">
        </div>
        <div class="col-md-6 mg-20">
            <label for="publisher" class="form-label">Publisher</label>
            <input type="text" class="form-control" id="publisher" name="publisher">
        </div>
	</div>
	<div class='row'>
        <div class="col-md-12 mg-20">
            <label for="content" class="form-label">Summary</label>
            <textarea class="form-control" id="content" name="content" rows="4"></textarea>
        </div>
	</div>
	<div class='row'>
        <div class="col-md-4 mg-20">
            <label for="category" class="form-label">Category</label>
            <select id="category" class="form-select form-control" name="category">
                <option selected>Choose...</option>
                <option>Circulation Books</option>
                <option>Reserve Books</option>
                <option>Multimedia Materials</option>
                <option>Audio-visuals Materials</option>
            </select>
        </div>
        <div class="col-md-4 mg-20">
            <label for="pub_date" class="form-label">Publishing Year</label>
            <select id="pub_date" class="form-select form-control" name="pub_date">
                <option value="" selected>Select Year</option>
                <?php
                $currentYear = date('Y');
                for ($year = $currentYear; $year >= 1900; $year--) {
                    echo "<option value='$year'>$year</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-4 mg-20">
            <label for="created_at" class="form-label">Date Acquired</label>
            <input class="form-control" type="date" id="created_at" name="created_at" value="<?php echo date('Y-m-d'); ?>">
        </div>
	</div>
	<div class='row'>
        <div class="col-md-4 mg-20">
            <label for="id_emp" class="form-label">Employee ID</label>
            <input type="text" class="form-control" id="id_emp" name="id_emp">
        </div>
        <div class="col-md-4 mg-20">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="col-md-4 mg-20">
            <label for="conPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="conPassword" name="conPassword">
        </div>
	</div>
        <div class="modal-footer custom-modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary" style='background-color: #a82c3c; border-color: #a82c3c;' name="submit">Add Reading Material</button>
</div>
    </form>
	</div>
                </div>
                </div>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 fsml font-weight-bold t1color">
                  Reading Materials Lists
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

                <div class="table-responsive">
				  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
        <tr>
            <th class='text-center'>No.</th>
            <th class='text-center'>Reference No.</th>
            <th class='text-center'>Title</th>
            <th class='text-center'>Category</th>
            <th class='text-center'>Author/s</th>
            <th class='text-center'>Publisher/s</th>
            <th class='text-center'>Publishing Date</th>
            <th class='text-center'>Date Acquired</th>
            <th class='text-center'>Status</th>
			<th class='text-center'>Action</th> 
        </tr>
         <?php
        $response = file_get_contents('http://localhost/php-crud-api/get.php');
        $json_data = json_decode($response, true);

        if ($json_data !== null && isset($json_data['posts'])) {
    $counter = 1;
    foreach ($json_data['posts'] as $post) {
		$bookId = $post['book_id'];
		
//Archive Modal
echo "<div class='modal fade' id='archivereadmat{$post['book_id']}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
echo "    <div class='modal-dialog modal-dialog-centered'>";
echo "        <div class='modal-content'>";
echo "            <div class='modal-header'>";
echo "                <h5 class='modal-title t1color' id='exampleModalLabel'>Archive</h5>";
echo "                <button type='button' class='btn' data-bs-dismiss='modal' aria-label='Close'>";
echo "                    <i class='fa-solid fa-xmark'></i>";
echo "                </button>";
echo "            </div>";
echo "            <div class='modal-body text-center'>";
echo "                <p>You are about to archive a reading material record in the system. Are you sure you want to archive this record?</p>";
echo "                <form class='row g-3 justify-content-center'>";
echo "                    <div class='col-md-12 text-center'>"; 
echo "                        <input type='password' class='form-control' id='conPassword3_{$bookId}' placeholder='Confirm your Password'/>";
echo "                    </div>";
echo "                </form>";
echo "                <div class='mg-40'>";
echo "                    <p>NOTE: THIS ACTION CANNOT BE REVERTED ONCE CONFIRMED</p>";
echo "                </div>";
echo "            </div>";
echo "            <div class='modal-footer'>";
echo "                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>";
echo "                    Cancel";
echo "                </button>";
echo "                <button type='button' class='btn btn-primary' style='background-color: #a82c3c; border-color: #a82c3c;' onclick='validateArchive(\"{$post['book_id']}\")'>";
echo "                    Confirm";
echo "                </button>";
echo "            </div>";
echo "        </div>";
echo "    </div>";
echo "</div>";


//Edit Modal
echo "<div class='modal fade' id='editreadmat{$post['book_id']}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
    echo "<div class='modal-dialog modal-lg'>";
    echo "<div class='modal-content'>";
    echo "<div class='modal-header'>";
    echo "<h5 class='modal-title t1color' id='exampleModalLabel'>Edit Reading Material</h5>";
    echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
    echo "</div>";
    echo "<div class='modal-body'>";
echo "<form id='editreadmatForm{$post['book_id']}' class='row g-3' enctype='multipart/form-data' method='POST'>";
    echo "<input type='hidden' name='_method' value='PUT'>";
    echo "<input type='hidden' name='book_id' value='{$post['book_id']}'>"; // Add the hidden input for book_id
	echo "<div class='row'>";
	echo "<div class='col-md-6 mg-20'>";
	echo "<label for='book_id' class='form-label'>Reference No.</label>";
	echo "<input type='text' class='form-control' id='book_id2' name='book_id' value='{$post['book_id']}' readonly>";
	echo "</div>";
    echo "<div class='col-md-6 mg-20'>";
    echo "<label for='title' class='form-label'>Title</label>";
    echo "<input type='text' class='form-control' id='title2_{$bookId}' name='title' value='{$post['title']}'>";
    echo "</div>";
	echo "</div>";
echo "<div class='row'>";
echo "<div class='col-md-6 mg-20'>";
echo "<label for='author' class='form-label'>Author</label>";
echo "<input type='text' class='form-control' id='author2_{$bookId}' name='author' value='{$post['author']}'>";
echo "</div>";
echo "<div class='col-md-6 mg-20'>";
echo "<label for='publisher' class='form-label'>Publisher</label>";
echo "<input type='text' class='form-control' id='publisher2_{$bookId}' name='publisher' value='{$post['publisher']}'>";
echo "</div>";
echo "</div>";
echo "<div class='mg-20'>";
echo "<label for='content' class='form-label'>Summary</label>";
echo "<textarea class='form-control' id='content2_{$bookId}' name='content' rows='4'>{$post['content']}</textarea>";
echo "</div>";
echo "<div class='row'>";
echo "<div class='col-md-4 mg-20'>";
echo "<label for='category' class='form-label'>Category</label>";
echo "<select id='category2_{$bookId}' class='form-select form-control' name='category'>";
echo "<option>Circulation Books</option>";
echo "<option>Reserve Books</option>";
echo "<option>Multimedia Materials</option>";
echo "<option>Audio-visuals Materials</option>";
echo "</select>";
echo "</div>";
echo "<div class='col-md-4 mg-20'>";
echo "<label for='pub_date' class='form-label'>Publishing Year</label>";
echo "<select id='pub_date2_{$bookId}' class='form-select form-control' name='pub_date'>";
echo "<option value='' selected>Select Year</option>";
$currentYear = date('Y');
for ($year = $currentYear; $year >= 1900; $year--) {
    echo "<option value='$year' " . ($post['pub_date'] == $year ? 'selected' : '') . ">$year</option>";
}
echo "</select>";
echo "</div>";
echo "<div class='col-md-4 mg-20'>";
echo "<label for='created_at' class='form-label'>Date Acquired</label>";
echo "<input class='form-control' type='date' id='created_at2_{$bookId}' name='created_at' value='{$post['created_at']}'>";
echo "</div>";
echo "</div>";
echo "<div class='row'>";
echo "<div class='col-md-4 mg-20'>";
echo "<label for='id_emp' class='form-label'>Employee ID</label>";
echo "<input type='text' class='form-control' id='id_emp2_{$bookId}' name='id_emp'>";
echo "</div>";
echo "<div class='col-md-4 mg-20'>";
echo "<label for='password' class='form-label'>Password</label>";
echo "<input type='password' class='form-control' id='password2_{$bookId}' name='password'>";
echo "</div>";
echo "<div class='col-md-4 mg-20'>";
echo "<label for='conPassword' class='form-label'>Confirm Password</label>";
echo "<input type='password' class='form-control' id='conPassword2_{$bookId}' name='conPassword'>";
echo "</div>";
echo "</div>";
echo "<div class='modal-footer'>";
    echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>";
    echo "<button type='button' class='btn btn-primary' style='background-color: #a82c3c; border-color: #a82c3c;' onclick='validateEdit(\"{$post['book_id']}\")'>Update Reading Material</button>";
    echo "</div>";
    echo "</form>";
echo "</div>";
echo "</div>";	

        echo "<tr>";
        echo "<td class='text-center'>{$counter}</td>";
        echo "<td class='text-center'>{$post['book_id']}</td>";
        echo "<td class='text-center'>{$post['title']}</td>";
        echo "<td class='text-center category-cell'>{$post['category']}</td>";
        echo "<td class='text-center'>{$post['author']}</td>";
        echo "<td class='text-center'>{$post['publisher']}</td>";
        echo "<td class='text-center'>{$post['pub_date']}</td>";
        echo "<td class='text-center'>{$post['created_at']}</td>";
        echo "<td class='text-center'>";
        echo "<select class='form-select book-status' data-id='{$post['book_id']}'>";
        echo "<option value='Available' " . ($post['book_status'] === 'Available' ? 'selected' : '') . ">Available</option>";
        echo "<option value='Unavailable' " . ($post['book_status'] === 'Unavailable' ? 'selected' : '') . ">Unavailable</option>";
        echo "<option value='Borrowed' " . ($post['book_status'] === 'Borrowed' ? 'selected' : '') . ">Borrowed</option>";
        echo "<option value='Missing' " . ($post['book_status'] === 'Missing' ? 'selected' : '') . ">Missing</option>";
        echo "</select>";
        echo "</td>";
		 echo "<td class='text-center'>";
                echo "<button class='btn btn-sm btn-info ml-auto mb-2 mr-1' data-bs-toggle='modal' data-bs-target='#editreadmat{$post['book_id']}'>Edit</button>";
                echo "<button class='btn btn-sm btn-danger ml-auto mb-2 mr-1' data-bs-toggle='modal' data-bs-target='#archivereadmat{$post['book_id']}'>Archive</button>";
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



    <!-- ... (your existing HTML code) ... -->








</body>
</html>