<?php
session_start();
include "classes/DatabaseHelper.php";
include "classes/Maintenance.php";

$objectMaintenance = new Maintenance();

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from base5builder.com/livedemo/quillpro/v1.7/html/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Aug 2019 05:50:21 GMT -->
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-41035904-17"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-41035904-17');
	</script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="assets/img/favicon.png">

	<title>QuillPro - Bootstrap 4 Dashboard Template</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&amp;subset=latin-ext" rel="stylesheet">

	<!-- CSS - REQUIRED - START -->
	<!-- Batch Icons -->
	<link rel="stylesheet" href="assets/fonts/batch-icons/css/batch-icons.css">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="assets/css/bootstrap/mdb.min.css">
	<!-- Custom Scrollbar -->
	<link rel="stylesheet" href="assets/plugins/custom-scrollbar/jquery.mCustomScrollbar.min.css">
	<!-- Hamburger Menu -->
	<link rel="stylesheet" href="assets/css/hamburgers/hamburgers.css">

	<!-- CSS - REQUIRED - END -->

	<!-- CSS - DEMO - START -->
	<!-- CSS - DEMO - END -->

	<!-- CSS - OPTIONAL - START -->
	<!-- Font Awesome -->
	<link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/plugins/datatables/css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="assets/plugins/datatables/css/responsive.bootstrap4.min.css">
	<!-- CSS - OPTIONAL - END -->

	<!-- QuillPro Styles -->
	<link rel="stylesheet" href="assets/css/quillpro/quillpro.css">

      <!-- Start of Async Drift Code -->
      <script>
      !function() {
        var t;
        if (t = window.driftt = window.drift = window.driftt || [], !t.init) return t.invoked ? void (window.console && console.error && console.error("Drift snippet included twice.")) : (t.invoked = !0, 
        t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ],
        t.factory = function(e) {
          return function() {
            var n;
            return n = Array.prototype.slice.call(arguments), n.unshift(e), t.push(n), t;
          };
        }, t.methods.forEach(function(e) {
          t[e] = t.factory(e);
        }), t.load = function(t) {
          var e, n, o, i;
          e = 3e5, i = Math.ceil(new Date() / e) * e, o = document.createElement("script"), 
          o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + i + "/" + t + ".js", 
          n = document.getElementsByTagName("script")[0], n.parentNode.insertBefore(o, n);
        });
      }();
      drift.SNIPPET_VERSION = '0.3.1';
      drift.load('4n2u4hcda3nb');
      </script>
      <!-- End of Async Drift Code -->

    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
          '../../../../../connect.facebook.net/en_US/fbevents.js');
        fbq('init', '344529832785462');
        fbq('track', 'PageView');
        fbq('track', 'ViewContent', {
          content_ids : 'quillpro_demo',
          content_name : 'quillpro_demo_frontend_version_all',
          content_type : 'product'
        });
      </script>
      <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=344529832785462&amp;ev=PageView&amp;noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->
</head>

<body>

	<div class="container-fluid">
		<div class="row">
			<?php include 'nav.php'?>
			<div class="right-column">
				<nav class="navbar navbar-expand-lg navbar-light bg-white">
					<a class="navbar-brand d-block d-sm-block d-md-block d-lg-none" href="#">
						<img src="assets/img/logo-dark.png" width="145" height="32.3" alt="QuillPro">
					</a>
					<button class="hamburger hamburger--slider" type="button" data-target=".sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle Sidebar">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
					<!-- Added Mobile-Only Menu -->
					<ul class="navbar-nav ml-auto mobile-only-control d-block d-sm-block d-md-block d-lg-none">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" id="navbar-notification-search-mobile" data-toggle="dropdown" data-flip="false" aria-haspopup="true" aria-expanded="false">
								<i class="batch-icon batch-icon-search"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-fullscreen" aria-labelledby="navbar-notification-search-mobile">
								<li>
									<form class="form-inline my-2 my-lg-0 no-waves-effect">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Search for..." aria-label="Search for..." aria-describedby="basic-addon2">
											<div class="input-group-append">
												<button class="btn btn-primary btn-gradient waves-effect waves-light" type="button">
													<i class="batch-icon batch-icon-search"></i>
												</button>
											</div>
										</div>
									</form>
								</li>
							</ul>
						</li>
					</ul>
                    <?php include 'header.php'?>
				</nav>
				<main class="main-content p-5" role="main">
					<div class="row">
						<div class="col-md-12">
							<h1>transaction</h1>
						</div>
					</div>
					<div class="row mb-5">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-lg-12 pb-5">
											<h2>ORCR Registration</h2>
<!--                                            <button type="button" class="btn btn-primary btn-gradient btn-sm" data-toggle="modal" data-target="#exampleModalCenter">ADD NEW VEHICLE</button>-->
                                            <button type="button" class="btn btn-primary btn-gradient btn-sm" data-toggle="modal" data-target="#exampleModalCenterORCR">ADD NEW ORCR</button>

											<div class="table-responsive">
												<table id="datatable-1" class="table table-datatable table-striped table-hover">
                                                    <thead>
														<tr>
                                                            <th>ID</th>
                                                            <th>CR NO.</th>
                                                            <th>Plate NO.</th>
                                                            <th>My File No.</th>
                                                            <th>Year Model</th>
                                                            <th>OR No.</th>
                                                            <th>OR Date</th>
                                                            <th>Amount</th>
                                                            <th align="right">&nbsp;</th>
														</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    $sqlStatement = "SELECT * FROM tbl_orcr";
                                                    if($objectMaintenance->selectWithJoin($sqlStatement) != 0) {
                                                        foreach ($objectMaintenance->selectWithJoin($sqlStatement) as $value) {
                                                            ?>
                                                            <tr onclick="viewDetails(<?php print $value["id"]?>)">
                                                                <td><?php print $value["id"]?></td>
                                                                <td><?php print $value["cr_no"]?></td>
                                                                <td><?php print $value["plate_no"]?></td>
                                                                <td><?php print $value["my_file_no"]?></td>
                                                                <td><?php print $value["year_model"]?></td>
                                                                <td><?php print $value["or_no"]?></td>
                                                                <td><?php print $value["or_date"]?></td>
                                                                <td><?php print $value["amount"]?></td>
                                                                <td align="right">
                                                                    <button onclick="editVehicle(<?php print $value["id"]?>)" type="button" class="btn btn-orange btn-gradient btn-sm" >Edit</button>
                                                                    <button onclick="deleteVehicle(<?php print $value["id"]?>)" type="button" class="btn btn-danger active btn-sm">Delete</button>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    </tbody>

												</table>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php include 'footer.php'?>
				</main>
			</div>
		</div>
	</div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Vehicle Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Owner Full Name</label>
                                <select id="txtFullName" name="txtFullName" class="form-control">
                                    <option>Select</option>
                                    <?php
                                    if($objectMaintenance->selectAllRecords("tbl_owner") != 0) {
                                        foreach ($objectMaintenance->selectAllRecords("tbl_owner") as $value) {
                                            ?>
                                            <option value="<?php print $value["id"]?>"><?php print $value["owner_name"]?></option>
                                            <?php
                                        }
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Plate Number</label>
                                <input type="text" class="form-control" id="txtPlateNumber">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Vehicle Description</label>
                                <input type="text" class="form-control" id="txtVehicleDesc">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button onclick="addNewVehicle()" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    <div class="modal fade" id="exampleModalCenterUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit User Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">ID</label>
                            <input type="text" class="form-control" id="txtID" readonly>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Plate Number</label>
                            <input type="text" class="form-control" id="txtPlateNumberUpdate">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Vehicle Description</label>
                            <input type="text" class="form-control" id="txtVehicleDescUpdate">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onclick="updateVehicle()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenterORCR" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ORCR Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>


                        <div class="form-group">
                            <label for="exampleFormControlInput1">CR No.</label>
                            <input type="text" class="form-control" id="txtCrNo">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">My File No.</label>
                            <input type="text" class="form-control" id="txtFileNo">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Plate No.</label>
                            <input type="text" class="form-control" id="txtPlateNo">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Engine No.</label>
                            <input type="text" class="form-control" id="txtEngineNo">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Chassis No.</label>
                            <input type="text" class="form-control" id="txtChassisNo">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Denomination</label>
                            <input type="text" class="form-control" id="txtDenomination">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Pistion Displacement</label>
                            <input type="text" class="form-control" id="txtPistonDisplacement">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">No. of Cylinders</label>
                            <input type="text" class="form-control" id="txtCylindersNo">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Fuel</label>
                            <input type="text" class="form-control" id="txtFuel">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Make</label>
                            <input type="text" class="form-control" id="txtMake">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Series</label>
                            <input type="text" class="form-control" id="txtSeries">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Body Type</label>
                            <input type="text" class="form-control" id="txtBodyType">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Body No.</label>
                            <input type="text" class="form-control" id="txtBodyNo">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Year Model</label>
                            <select class="form-control" id="txtYearModel">
                               <?php
                               for($i=1928;$i<=date('Y');$i++)
                               {
                                   echo '<option value='.$i.'>'.$i.'</option>';
                               }
                               ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Gross Wt.</label>
                            <input type="number" class="form-control" id="txtGrossWt">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Net Wt.</label>
                            <input type="number" class="form-control" id="txtNetWt">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Shipping Wt.</label>
                            <input type="number" class="form-control" id="txtShippingWt">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Net Capacity</label>
                            <input type="number" class="form-control" id="txtNetCapacity">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Complete Owner's Name</label>
                            <input type="text" class="form-control" id="txtOwnerName">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Complete Address</label>
                            <textarea class="form-control" id="txtCompleteAddress" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">OR No.</label>
                            <input type="text" class="form-control" id="txtOrNo">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">OR Date</label>
                            <input type="date" class="form-control" id="txtORdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Amount</label>
                            <input type="number" class="form-control" id="txtAmount">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onclick="addNewOR()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenterORCRUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitleUpdate" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ORCR Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">ID</label>
                            <input type="text" class="form-control" id="txtIDD" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">CR No.</label>
                            <input type="text" class="form-control" id="txtCrNoUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">My File No.</label>
                            <input type="text" class="form-control" id="txtFileNoUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Plate No.</label>
                            <input type="text" class="form-control" id="txtPlateNoUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Engine No.</label>
                            <input type="text" class="form-control" id="txtEngineNoUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Chassis No.</label>
                            <input type="text" class="form-control" id="txtChassisNoUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Denomination</label>
                            <input type="text" class="form-control" id="txtDenominationUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Pistion Displacement</label>
                            <input type="text" class="form-control" id="txtPistonDisplacementUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">No. of Cylinders</label>
                            <input type="text" class="form-control" id="txtCylindersNoUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Fuel</label>
                            <input type="text" class="form-control" id="txtFuelUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Make</label>
                            <input type="text" class="form-control" id="txtMakeUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Series</label>
                            <input type="text" class="form-control" id="txtSeriesUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Body Type</label>
                            <input type="text" class="form-control" id="txtBodyTypeUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Body No.</label>
                            <input type="text" class="form-control" id="txtBodyNoUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Year Model</label>
                            <select class="form-control" id="txtYearModelUpdate">
                                <?php
                                for($i=1928;$i<=date('Y');$i++)
                                {
                                    echo '<option value='.$i.'>'.$i.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Gross Wt.</label>
                            <input type="number" class="form-control" id="txtGrossWtUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Net Wt.</label>
                            <input type="number" class="form-control" id="txtNetWtUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Shipping Wt.</label>
                            <input type="number" class="form-control" id="txtShippingWtUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Net Capacity</label>
                            <input type="number" class="form-control" id="txtNetCapacityUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Complete Owner's Name</label>
                            <input type="text" class="form-control" id="txtOwnerNameUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Complete Address</label>
                            <textarea class="form-control" id="txtCompleteAddressUpdate" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">OR No.</label>
                            <input type="text" class="form-control" id="txtOrNoUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">OR Date</label>
                            <input type="date" class="form-control" id="txtORdateUpdate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Amount</label>
                            <input type="number" class="form-control" id="txtAmountUpdate">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onclick="updateVehicle()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="modalORCR" tabindex="-1" role="dialog" aria-labelledby="modalORCR" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ORCR Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-datatable table-striped table-hover">
                            <thead>
                            <tr>
                                <th align="right">&nbsp</th>
                            </tr>
                            </thead>
                            <tbody id="loadORCR">

                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

	<!-- SCRIPTS - REQUIRED START -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- Bootstrap core JavaScript -->
	<!-- JQuery -->
	<script type="text/javascript" src="assets/js/jquery/jquery-3.1.1.min.js"></script>
	<!-- Popper.js - Bootstrap tooltips -->
	<script type="text/javascript" src="assets/js/bootstrap/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="assets/js/bootstrap/mdb.min.js"></script>
	<!-- Velocity -->
	<script type="text/javascript" src="assets/plugins/velocity/velocity.min.js"></script>
	<script type="text/javascript" src="assets/plugins/velocity/velocity.ui.min.js"></script>
	<!-- Custom Scrollbar -->
	<script type="text/javascript" src="assets/plugins/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<!-- jQuery Visible -->
	<script type="text/javascript" src="assets/plugins/jquery_visible/jquery.visible.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script type="text/javascript" src="assets/js/misc/ie10-viewport-bug-workaround.js"></script>

	<!-- SCRIPTS - REQUIRED END -->

	<!-- SCRIPTS - OPTIONAL START -->
	<!-- Image Placeholder -->
	<script type="text/javascript" src="assets/js/misc/holder.min.js"></script>
	<!-- Datatables -->
	<script type="text/javascript" src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="assets/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="assets/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<!-- <script type="text/javascript" src="assets/plugins/datatables/js/responsive.bootstrap4.min.js"></script> -->
	<!-- SCRIPTS - OPTIONAL END -->

	<!-- QuillPro Scripts -->
	<script type="text/javascript" src="assets/js/scripts.js"></script>
	<!-- Fullstory Session - Start -->
	<script>
	window['_fs_debug'] = false;
	window['_fs_host'] = 'fullstory.com';
	window['_fs_org'] = '626JC';
	window['_fs_namespace'] = 'FS';
	(function(m,n,e,t,l,o,g,y){
	    if (e in m) {if(m.console && m.console.log) { m.console.log('FullStory namespace conflict. Please set window["_fs_namespace"].');} return;}
	    g=m[e]=function(a,b,s){g.q?g.q.push([a,b,s]):g._api(a,b,s);};g.q=[];
	    o=n.createElement(t);o.async=1;o.src='https://'+_fs_host+'/s/fs.js';
	    y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y);
	    g.identify=function(i,v,s){g(l,{uid:i},s);if(v)g(l,v,s)};g.setUserVars=function(v,s){g(l,v,s)};g.event=function(i,v,s){g('event',{n:i,p:v},s)};
	    g.shutdown=function(){g("rec",!1)};g.restart=function(){g("rec",!0)};
	    g.consent=function(a){g("consent",!arguments.length||a)};
	    g.identifyAccount=function(i,v){o='account';v=v||{};v.acctId=i;g(o,v)};
	    g.clearUserCookie=function(){};
	})(window,document,window['_fs_namespace'],'script','user');
	</script>
	<!-- Fullstory Session - End -->

    <script>
        function addNewVehicle(){
            var txtId = document.getElementById("txtFullName").value;
            var txtPlateNumber = document.getElementById("txtPlateNumber").value;
            var txtVehicleDesc = document.getElementById("txtVehicleDesc").value;

            $.ajax({
                method: "GET",
                url: "ajax-insert-maitenance.php",
                data: {platenumber: txtPlateNumber, vehicledesc: txtVehicleDesc, owner: txtId, action: 'vehicle-add'},
                success: function(){
                    alert("Success");
                    location.reload();
                }
            });
        }

        function addNewOR(){
            var cr_no = document.getElementById("txtCrNo").value;
            var my_file_no = document.getElementById("txtFileNo").value;
            var plate_no = document.getElementById("txtPlateNo").value;
            var engine_no = document.getElementById("txtEngineNo").value;
            var chassis_no = document.getElementById("txtChassisNo").value;
            var denomination = document.getElementById("txtDenomination").value;
            var piston_displacement = document.getElementById("txtPistonDisplacement").value;
            var cylinders_no = document.getElementById("txtCylindersNo").value;
            var fuel = document.getElementById("txtFuel").value;
            var make = document.getElementById("txtMake").value;
            var series = document.getElementById("txtSeries").value;
            var body_type = document.getElementById("txtBodyType").value;
            var body_no = document.getElementById("txtBodyNo").value;
            var year_model = document.getElementById("txtYearModel").value;
            var gross_wt = document.getElementById("txtGrossWt").value;
            var net_wt = document.getElementById("txtNetWt").value;
            var shipping_wt = document.getElementById("txtShippingWt").value;
            var net_capacity = document.getElementById("txtNetCapacity").value;
            var owner_name = document.getElementById("txtOwnerName").value;
            var complete_address = document.getElementById("txtCompleteAddress").value;
            var or_no = document.getElementById("txtOrNo").value;
            var or_date = document.getElementById("txtORdate").value;
            var amount = document.getElementById("txtAmount").value;

            $.ajax({
                method: "GET",
                url: "ajax-insert-maitenance.php",
                data: {crno: cr_no, myfileno: my_file_no, plateno: plate_no, engineno: engine_no, chasisno: chassis_no, demonitation: denomination, pistiondisplacement: piston_displacement, cylindersno: cylinders_no, fuel: fuel, make: make, series: series, bodytype: body_type, bodyno: body_no, yearmodel: year_model, grosswt: gross_wt, netwt: net_wt, shippingwt: shipping_wt, netcapacity: net_capacity, ownername: owner_name, completeaddress: complete_address, orno: or_no, ordate: or_date, amount: amount, action: 'orcr-add'},
                success: function(){
                    alert("Success");
                    location.reload();
                }
            });
        }

    </script>
    <script>
        function editVehicle($id){
            document.getElementById("txtIDD").value = $id;
            $(document).ready(function(){
                $('#exampleModalCenterORCRUpdate').modal('show');
            });

        }

        function updateVehicle() {
            var Id = document.getElementById("txtIDD").value;
            var cr_no = document.getElementById("txtCrNoUpdate").value;
            var my_file_no = document.getElementById("txtFileNoUpdate").value;
            var plate_no = document.getElementById("txtPlateNoUpdate").value;
            var engine_no = document.getElementById("txtEngineNoUpdate").value;
            var chassis_no = document.getElementById("txtChassisNoUpdate").value;
            var denomination = document.getElementById("txtDenominationUpdate").value;
            var piston_displacement = document.getElementById("txtPistonDisplacementUpdate").value;
            var cylinders_no = document.getElementById("txtCylindersNoUpdate").value;
            var fuel = document.getElementById("txtFuelUpdate").value;
            var make = document.getElementById("txtMakeUpdate").value;
            var series = document.getElementById("txtSeriesUpdate").value;
            var body_type = document.getElementById("txtBodyTypeUpdate").value;
            var body_no = document.getElementById("txtBodyNoUpdate").value;
            var year_model = document.getElementById("txtYearModelUpdate").value;
            var gross_wt = document.getElementById("txtGrossWtUpdate").value;
            var net_wt = document.getElementById("txtNetWtUpdate").value;
            var shipping_wt = document.getElementById("txtShippingWtUpdate").value;
            var net_capacity = document.getElementById("txtNetCapacityUpdate").value;
            var owner_name = document.getElementById("txtOwnerNameUpdate").value;
            var complete_address = document.getElementById("txtCompleteAddressUpdate").value;
            var or_no = document.getElementById("txtOrNoUpdate").value;
            var or_date = document.getElementById("txtORdateUpdate").value;
            var amount = document.getElementById("txtAmountUpdate").value;

            $.ajax({
                method: "GET",
                url: "ajax-update-maitenance.php",
                data: {id: Id, crno: cr_no, myfileno: my_file_no, plateno: plate_no, engineno: engine_no, chasisno: chassis_no, demonitation: denomination, pistiondisplacement: piston_displacement, cylindersno: cylinders_no, fuel: fuel, make: make, series: series, bodytype: body_type, bodyno: body_no, yearmodel: year_model, grosswt: gross_wt, netwt: net_wt, shippingwt: shipping_wt, netcapacity: net_capacity, ownername: owner_name, completeaddress: complete_address, orno: or_no, ordate: or_date, amount: amount, action: 'vehicle-update'},
                success: function(){
                    alert("Success");
                    location.reload();
                }
            });

        }

        function deleteVehicle($id) {
            if (confirm("Are you sure you want to delete")) {
                var txtID = $id;
                $.ajax({
                    method: "GET",
                    url: "ajax-delete-maitenance.php",
                    data: {id: txtID, action: 'vehicle-delete'},
                    success: function(){
                        alert("Success");
                        location.reload();
                    }
                });

            }
            else {
            }
        }

    </script>
    <script>
        function viewDetails($id){
            var x = $id;
            $("#loadORCR").load("showORCRDetails.php?x="+x);

            $(document).ready(function(){
                $('#modalORCR').modal('show');
            });


        }
    </script>
</body>

<!-- Mirrored from base5builder.com/livedemo/quillpro/v1.7/html/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Aug 2019 05:50:26 GMT -->
</html>
