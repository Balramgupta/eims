@extends('admin.layout.sidebar')
@extends('admin.layout.header')
<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Dashtic - Bootstrap Webapp Responsive Dashboard Simple Admin Panel Premium HTML5 Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="Admin, Admin Template, Dashboard, Responsive, Admin Dashboard, Bootstrap, Bootstrap 4, Clean, Backend, Jquery, Modern, Web App, Admin Panel, Ui, Premium Admin Templates, Flat, Admin Theme, Ui Kit, Bootstrap Admin, Responsive Admin, Application, Template, Admin Themes, Dashboard Template"/>

		<!-- Title -->
		<title>EIMS</title>

		<!--Favicon -->
		<link rel="icon" href="{{asset('admin/assets/images/brand/favicon.ico')}}" type="image/x-icon"/>

		<!-- Bootstrap css -->
		<link href="{{asset('admin/assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" />

		<!-- Style css -->
		<link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" />

		<!-- Dark css -->
		<link href="{{asset('admin/assets/css/dark.css')}}" rel="stylesheet" />

		<!-- Skins css -->
		<link href="{{asset('admin/assets/css/skins.css')}}" rel="stylesheet" />

		<!-- Animate css -->
		<link href="{{asset('admin/assets/css/animated.css')}}" rel="stylesheet" />

		<!--Sidemenu css -->
        <link id="theme" href="{{asset('admin/assets/css/sidemenu.css')}}" rel="stylesheet">

		<!-- P-scroll bar css-->
		<link href="{{asset('admin/assets/plugins/p-scrollbar/p-scrollbar.css')}}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{asset('admin/assets/plugins/web-fonts/icons.css')}}" rel="stylesheet" />
		<link href="{{asset('admin/assets/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{asset('admin/assets/plugins/web-fonts/plugin.css')}}" rel="stylesheet" />

		<!--Daterangepicker css-->
		<link href="{{asset('admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

		<!--Mutipleselect css-->
		<link rel="stylesheet" href="{{asset('admin/assets/plugins/multipleselect/multiple-select.css')}}">

		<!-- Jquery js-->
		<script src="{{asset('admin/assets/js/vendors/jquery-3.5.1.min.js')}}"></script>

		<style type="text/css">
			.side-menu__item i{font-size: 22px; margin-right: 8px; color: #97a0de;}
		</style>

	</head>

	<body class="app sidebar-mini light-mode default-sidebar">

		<!---Global-loader-->
		<div id="global-loader" >
			<img src="{{asset('admin/assets/images/svgs/loader.svg')}}" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">
				@section('sidebar')

				@show

				<div class="app-content main-content">
					<div class="side-app">

						@section('header')

						@show

						<div style="margin-bottom: 30px;"></div>

						@section('content')

						@show
					</div>
				</div><!-- end app-content-->
			</div>

			<!--Footer-->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
							Copyright © 2020 <a href="#">Dashtic</a>. Designed by <a href="#">Spruko Technologies Pvt.Ltd</a> All rights reserved.
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer-->

		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top">
			<svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
		</a>

		

		<!-- Bootstrap4 js-->
		<script src="{{asset('admin/assets/plugins/bootstrap/popper.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!-- Font Awesome -->
		<script src="{{asset('admin/assets/plugins/fontawesome.js')}}"></script>

		<!--Othercharts js-->
		<script src="{{asset('admin/assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

		<!-- Circle-progress js-->
		<script src="{{asset('admin/assets/js/vendors/circle-progress.min.js')}}"></script>

		<!-- Jquery-rating js-->
		<script src="{{asset('admin/assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!--Sidemenu js-->
		<script src="{{asset('admin/assets/plugins/sidemenu/sidemenu.js')}}"></script>

		<!-- P-scroll js-->
		<script src="{{asset('admin/assets/plugins/p-scrollbar/p-scrollbar.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/p-scrollbar/p-scroll1.js')}}"></script>

		<!--Moment js-->
		<script src="{{asset('admin/assets/plugins/moment/moment.js')}}"></script>

		<!-- Daterangepicker js-->
		<script src="{{asset('admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
		<script src="{{asset('admin/assets/js/daterange.js')}}"></script>

		<!-- ECharts js-->
		<script src="{{asset('admin/assets/plugins/echarts/echarts.js')}}"></script>

		<!--Chart js -->
		<script src="{{asset('admin/assets/plugins/chart/chart.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/chart/chart.extension.js')}}"></script>

		<!-- Index js-->
		<script src="{{asset('admin/assets/js/index4.js')}}"></script>

		<!-- Multiple select js -->
		<script src="{{asset('admin/assets/plugins/multipleselect/multiple-select.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/multipleselect/multi-select.js')}}"></script>

		<!-- Custom js-->
		<script src="{{asset('admin/assets/js/custom.js')}}"></script>
		
		<!-- Show Image -->
		<script type="text/javascript">
		  $(document).ready(function(){
		    $('#Image').change(function(e){
		      var reader = new FileReader();
		      reader.onload = function(e){
		        $('#showImage').attr('src', e.target.result);
		      }
		      reader.readAsDataURL(e.target.files['0']);
		    });
		  });
		</script>

	</body>
</html>