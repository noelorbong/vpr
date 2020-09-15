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
											<h2>License Registration</h2>
<!--                                            <button type="button" class="btn btn-primary btn-gradient btn-sm" data-toggle="modal" data-target="#exampleModalCenter">ADD NEW OWNER</button>-->
                                            <button type="button" class="btn btn-primary btn-gradient btn-sm" data-toggle="modal" data-target="#exampleModalCenterLicense">ADD NEW LICENSE</button>

											<div class="table-responsive">
                                                <div class="table-responsive">
                                                    <table id="datatable-1" class="table table-datatable table-striped table-hover">

                                                        <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Full Name</th>
                                                            <th>License Number</th>
                                                            <th>Complete Address</th>
                                                            <th>Registration Date</th>
                                                            <th>Expiration Date</th>
                                                            <th align="right">&nbsp;</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        if($objectMaintenance->selectAllRecords("tbl_license") != 0) {
                                                            foreach ($objectMaintenance->selectAllRecords("tbl_license") as $value) {
                                                                ?>
                                                                <tr onclick="viewDetails(<?php print $value["id"];?>)">
                                                                    <td><?php print $value["id"]?></td>
                                                                    <td><?php print $value["last_name"].", ".$value["first_name"]." ".$value["middle_name"]?></td>
                                                                    <td><?php print $value["license_no"]?></td>
                                                                    <td><?php print $value["address"]?></td>
                                                                    <td><?php print $value["reg_date"]?></td>
                                                                    <td><?php print $value["expiration_date"]?></td>
                                                                    <td align="right">
                                                                        <button onclick="editOwner(<?php print $value["id"]?>)" type="button" class="btn btn-orange btn-gradient btn-sm" >Edit</button>
                                                                        <button onclick="deleteOwner(<?php print $value["id"]?>)" type="button" class="btn btn-danger active btn-sm">Delete</button>
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
                        <h5 class="modal-title" id="exampleModalLongTitle">License Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Full Name</label>
                                <input type="text" class="form-control" id="txtFullName">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">License Number</label>
                                <input type="text" class="form-control" id="txtLicense">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Contact</label>
                                <input type="number" class="form-control" id="txtContact">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Address</label>
                                <textarea class="form-control" id="txtAddress" rows="3"></textarea>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button onclick="addNewOwner()" class="btn btn-primary">Save changes</button>
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
                            <label for="exampleFormControlInput1">Full Name</label>
                            <input type="text" class="form-control" id="txtFullNameUpdate">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">License Number</label>
                            <input type="text" class="form-control" id="txtLicenseUpdate">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Contact</label>
                            <input type="number" class="form-control" id="txtContactUpdate">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Address</label>
                            <textarea class="form-control" id="txtAddressUpdate" rows="3"></textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onclick="updateOwner()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenterLicense" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitleLicense" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitleLicense">Lincense Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Last Name</label>
                            <input type="text" class="form-control" id="txtLastName">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">First Name</label>
                            <input type="text" class="form-control" id="txtFirstName">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Middle Name</label>
                            <input type="text" class="form-control" id="txtMiddleName">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">License No.</label>
                            <input type="text" class="form-control" id="txtLicense1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nationalty</label>
                            <input type="text" class="form-control" id="txtNationality">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Gender</label>
                            <select class="form-control" id="txtGender">
                                <option value='Male'>Male</option>
                                <option value='FeMale'>FeMale</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Date of Birth</label>
                            <input type="date" class="form-control" id="txtBirthDate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Weight</label>
                            <input type="text" class="form-control" id="txtWeight">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Height</label>
                            <input type="text" class="form-control" id="txtHeight">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Address</label>
                            <input type="text" class="form-control" id="txtAddress1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Expiration Date</label>
                            <input type="date" class="form-control" id="txtExpDate">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Blood Type</label>
                            <input type="text" class="form-control" id="txtBloodType">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Eye Color</label>
                            <input type="text" class="form-control" id="txtEyeColor">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Restrictions</label>
                            <input type="text" class="form-control" id="txtRestrictions">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Conditions</label>
                            <input type="text" class="form-control" id="txtConditions">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onclick="addNewLicense()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="modalShowDetails" tabindex="-1" role="dialog" aria-labelledby="modalShowDetails" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalShowDetails">License Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="datatable-1" class="table table-datatable table-striped table-hover">
                            <thead>
                            <tr>
                                <th align="right">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody id="loadLicenseDetails">

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
        function addNewOwner(){
            var txtFullname = document.getElementById("txtFullName").value;
            var txtLicense = document.getElementById("txtLicense").value;
            var txtContact = document.getElementById("txtContact").value;
            var txtAddress = document.getElementById("txtAddress").value;

            $.ajax({
                method: "GET",
                url: "ajax-insert-maitenance.php",
                data: {fullname: txtFullname, license: txtLicense, contact: txtContact, address: txtAddress, action: 'owner-add'},
                success: function(){
                    alert("Success");
                    location.reload();
                }
            });
        }

        function addNewLicense(){
            var txtLastName = document.getElementById("txtLastName").value;
            var txtFirstName = document.getElementById("txtFirstName").value;
            var txtMiddleName = document.getElementById("txtMiddleName").value;
            var txtNationality = document.getElementById("txtNationality").value;
            var txtGender = document.getElementById("txtGender").value;
            var txtBirthDate = document.getElementById("txtBirthDate").value;
            var txtWeight = document.getElementById("txtWeight").value;
            var txtHeight = document.getElementById("txtHeight").value;
            var txtAddress = document.getElementById("txtAddress1").value;
            var txtExpDate = document.getElementById("txtExpDate").value;
            var txtBloodType = document.getElementById("txtBloodType").value;
            var txtEyeColor = document.getElementById("txtEyeColor").value;
            var txtRestrictions = document.getElementById("txtRestrictions").value;
            var txtConditions = document.getElementById("txtConditions").value;
            var txtLicense = document.getElementById("txtLicense1").value;

            $.ajax({
                method: "GET",
                url: "ajax-insert-maitenance.php",
                data: {lastname: txtLastName, firstname: txtFirstName, middlename: txtMiddleName, nationality: txtNationality, gender: txtGender, bdate: txtBirthDate, weight: txtWeight, height: txtHeight, address: txtAddress, expdate: txtExpDate, bloodtype: txtBloodType, eyecolor: txtEyeColor, restrictions: txtRestrictions, conditions: txtConditions, license: txtLicense, action: 'license-add'},
                success: function(){
                    alert("Success");
                    location.reload();
                }
            });
        }
    </script>
    <script>
        function editOwner($id){
            document.getElementById("txtID").value = $id;
            $(document).ready(function(){
                $('#exampleModalCenterUpdate').modal('show');
            });

        }

        function updateOwner() {
            var Id = document.getElementById("txtID").value;
            var txtFullname = document.getElementById("txtFullNameUpdate").value;
            var txtLicense = document.getElementById("txtLicenseUpdate").value;
            var txtContact = document.getElementById("txtContactUpdate").value;
            var txtAddress = document.getElementById("txtAddressUpdate").value;

            $.ajax({
                method: "GET",
                url: "ajax-update-maitenance.php",
                data: {id: Id, fullname: txtFullname, license: txtLicense, contact: txtContact, address: txtAddress, action: 'owner-update'},
                success: function(){
                    alert("Success");
                    location.reload();
                }
            });

        }

        function deleteOwner($id) {
            if (confirm("Are you sure you want to delete")) {
                var txtID = $id;
                $.ajax({
                    method: "GET",
                    url: "ajax-delete-maitenance.php",
                    data: {id: txtID, action: 'owner-delete'},
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
            $("#loadLicenseDetails").load("showLicenseDetails.php?x="+x);

            $(document).ready(function(){
                $('#modalShowDetails').modal('show');
            });


        }
    </script>
</body>

<!-- Mirrored from base5builder.com/livedemo/quillpro/v1.7/html/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Aug 2019 05:50:26 GMT -->
</html>
