<?php

?>
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

    <title>Dashboard</title>

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
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
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
              <img src="Images/w_profile.svg" class="mx-3" width="30" height="28" alt="" />
              <div class="ml-md-1 sz">
                  Welcome,<br />
                  Admin Name
              </div>
          </div>
      </a>
  </li>
  <li class="nav-item active">
      <a class="nav-link" href="index.php">
          <div class="d-flex align-items-center active-link">
              <img src="Images/r_dashboard.svg" class="mx-3" width="30" height="28" alt="" />
              <div class="sidesize t1color">Dashboard</div>
          </div>
      </a>
  </li>

        <li class="nav-item active">
            <a class="nav-link" href="reading_mat.php">
                <div class="d-flex align-items-center">
                    <img src="Images/w_readmat.svg" class="mx-3" width="30" height="28" alt="" />
                    <div class="sidesize">Reading Materials</div>
                </div>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="request.php">
                <div class="d-flex align-items-center">
                    <img src="Images/w_req.svg" class="mx-3" width="30" height="28" alt="" />
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
                    <img src="Images/w_regacc.svg" class="mx-3" width="30" height="28" alt="" />
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

            <!-- Topbar Search -->
            <h3 class="font-weight-bold lm-1">Dashboard</h3>

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
          <!-- Body -->
          <div class="d-flex flex-wrap">
            <div class="card cardindex bdcolor1 ml-3 mb-3 mr-1" style="width: 16rem;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title t1color font-weight-bold fsmainborder">Total <br> Reading <br> Materials</h5>
                    </div>
                    <div>
                        <span class="fsizeborder t1color">25</span>
                    </div>
                </div>
            </div>
            <div class="card cardindex bdcolor1 ml-3 mb-3 mr-1" style="width: 16rem;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title t1color font-weight-bold fsmainborder">Borrowed <br> Reading <br> Materials</h5>
                    </div>
                    <div>
                        <span class="fsizeborder t1color">25</span>
                    </div>
                </div>
            </div>
            <div class="card cardindex bdcolor1 ml-3 mb-3 mr-1" style="width: 16rem;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title t1color font-weight-bold fsmainborder">Requested <br> Reading <br> Materials</h5>
                    </div>
                    <div>
                        <span class="fsizeborder t1color">25</span>
                    </div>
                </div>
            </div>
            <div class="card cardindex cardindex bdcolor1 ml-3 mb-3 mr-1" style="width: 16rem;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title t1color font-weight-bold fsmainborder">Overdue <br> Reading <br> Materials</h5>
                    </div>
                    <div>
                        <span class="fsizeborder t1color">25</span>
                    </div>
                </div>
            </div>
        </div>
                
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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

</script>
  </body>
</html>
