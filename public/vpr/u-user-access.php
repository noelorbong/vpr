<?php
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
							<h1>User</h1>
						</div>
					</div>
					<div class="row mb-5">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-lg-12 pb-5">
											<h2>User Credential</h2>
                                            <button type="button" class="btn btn-primary btn-gradient btn-sm" data-toggle="modal" data-target="#exampleModalCenter">ADD NEW USER CREDENTIAL</button>

											<div class="table-responsive">
												<table id="datatable-1" class="table table-datatable table-striped table-hover">

                                                    <thead>
														<tr>
                                                            <th>ID</th>
                                                            <th>Full Name</th>
                                                            <th>User Name</th>
                                                            <th>Password</th>
                                                            <th align="right">&nbsp;</th>
														</tr>
													</thead>
													<tbody>
                                                    <?php
                                                    $sqlStatement = "SELECT * FROM tbl_user JOIN tbl_user_info ON tbl_user.user_info_id = tbl_user_info.id ORDER BY tbl_user.ID DESC";
                                                    if($objectMaintenance->selectWithJoin($sqlStatement) != 0) {
                                                        foreach ($objectMaintenance->selectWithJoin($sqlStatement) as $value) {
                                                            ?>
                                                            <tr>
                                                                <td><?php print $value["id"]?></td>
                                                                <td><?php print $value["info_lastname"].", ".$value["info_firstname"]." ".$value["info_middlename"]?></td>
                                                                <td><?php print $value["user_name"]?></td>
                                                                <td><?php print $value["user_password"]?></td>
                                                                <td align="right">
                                                                    <button type="button" class="btn btn-orange btn-gradient btn-sm" onclick="editUserAccess(<?php print $value["id"]?>)">Edit</button>
                                                                    <button type="button" class="btn btn-danger active btn-sm" onclick="deleteUserAccess(<?php print $value["id"]?>)">Delete</button>
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
                        <h5 class="modal-title" id="exampleModalLongTitle">User Credential</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Full Name</label>
                                <select id="txtFullName" name="txtFullName" class="form-control">
                                    <option>Select</option>
                                    <?php
                                    if($objectMaintenance->selectAllRecords("tbl_user_info") != 0) {
                                        foreach ($objectMaintenance->selectAllRecords("tbl_user_info") as $value) {
                                            ?>
                                            <option value="<?php print $value["id"]?>"><?php print $value["info_lastname"].", ".$value["info_firstname"]." ".$value["info_middlename"]?></option>
                                            <?php
                                        }
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">User Name</label>
                                <input type="text" class="form-control" id="txtUserName">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Password</label>
                                <input type="password" class="form-control" id="txtPassword">
                            </div>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button onclick="addUserAccess()" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    <div class="modal fade" id="exampleModalCenterUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">User Credential</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">User ID</label>
                            <input type="text" class="form-control" id="txtID" readonly>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">User Name</label>
                            <input type="text" class="form-control" id="txtUserNameUpdate">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Password</label>
                            <input type="password" class="form-control" id="txtPasswordUpdate">
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onclick="updateUserAccess()" class="btn btn-primary">Save changes</button>
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
        function addUserAccess(){
            var txtUserName = document.getElementById("txtUserName").value;
            var txtPassword = document.getElementById("txtPassword").value;
            var txtFullName = document.getElementById("txtFullName").value;

            $.ajax({
                method: "GET",
                url: "ajax-insert-maitenance.php",
                data: {username: txtUserName, password: txtPassword, infoid: txtFullName, action: 'user-access'},
                success: function(){
                    alert("Success");
                    location.reload();
                }
            });
        }

        function editUserAccess($id){
            document.getElementById("txtID").value = $id;

            $(document).ready(function(){
                $('#exampleModalCenterUpdate').modal('show');
            });

        }

        function updateUserAccess() {
            var txtID = document.getElementById("txtID").value;
            var txtUserName = document.getElementById("txtUserNameUpdate").value;
            var txtPassword = document.getElementById("txtPasswordUpdate").value;

            $.ajax({
                method: "GET",
                url: "ajax-update-maitenance.php",
                data: {id: txtID,  username: txtUserName, password: txtPassword , action: 'user-access-update'},
                success: function(){
                    alert("Success");
                    location.reload();
                }
            });

        }

        function deleteUserAccess($id) {
            if (confirm("Are you sure you want to delete")) {
                var txtID = $id;
                $.ajax({
                    method: "GET",
                    url: "ajax-delete-maitenance.php",
                    data: {id: txtID, action: 'user-access-delete'},
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
</body>

<!-- Mirrored from base5builder.com/livedemo/quillpro/v1.7/html/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Aug 2019 05:50:26 GMT -->
</html>
