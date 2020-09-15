<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from base5builder.com/livedemo/quillpro/v1.7/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Aug 2019 05:45:50 GMT -->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="assets/img/favicon.png">

	<title>QuillPro - Bootstrap 4 Dashboard Template</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&amp;subset=latin-ext"
		rel="stylesheet">

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

	<!-- CSS - OPTIONAL - START -->
	<!-- Font Awesome -->
	<link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
	<!-- JVMaps -->
	<link rel="stylesheet" href="assets/plugins/jvmaps/jqvmap.min.css">
	<!-- CSS - OPTIONAL - END -->

	<!-- QuillPro Styles -->
	<link rel="stylesheet" href="assets/css/quillpro/quillpro.css">


</head>

<body>

	<div class="container-fluid">
		<div class="row" id="app">
			@include('layouts.components.nav')
			<div class="right-column">
				@include('layouts.components.header')
				<main class="main-content p-5" role="main">
					<router-view name="dashboard"></router-view>
					<router-view></router-view>
				</main>
			</div>
		</div>
	</div>

	<!-- SCRIPTS - REQUIRED START -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- Bootstrap core JavaScript -->
	<script src="{{ mix('js/app.js') }}?"></script>
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
	<!-- jQuery Visible -->
	<script type="text/javascript" src="assets/plugins/jquery_visible/jquery.visible.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script type="text/javascript" src="assets/js/misc/ie10-viewport-bug-workaround.js"></script>

	<!-- SCRIPTS - REQUIRED END -->

	<!-- SCRIPTS - OPTIONAL START -->
	<!-- ChartJS -->
	<script type="text/javascript" src="assets/plugins/chartjs/chart.bundle.min.js"></script>
	<!-- JVMaps -->
	<script type="text/javascript" src="assets/plugins/jvmaps/jquery.vmap.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jvmaps/maps/jquery.vmap.usa.js"></script>
	<!-- Image Placeholder -->
	<script type="text/javascript" src="assets/js/misc/holder.min.js"></script>
	<!-- SCRIPTS - OPTIONAL END -->

	<!-- QuillPro Scripts -->
	<script type="text/javascript" src="assets/js/scripts.js"></script>

	<!-- Fullstory Session - Start -->

	<!-- Fullstory Session - End -->
</body>

<!-- Mirrored from base5builder.com/livedemo/quillpro/v1.7/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Aug 2019 05:47:14 GMT -->

</html>