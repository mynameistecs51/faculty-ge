<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	// protected $ci;

	public function __construct()
	{
		$this->ci =& get_instance();
	}

	public function getHeader($base_url,$TEXTTITLE)
	{
		return '
		<!DOCTYPE html>
		<html lang="en">

		<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">

			<title>สำนักวิชาศึกษาทั่วไป</title>

			<!-- Bootstrap Core CSS -->
			<link href="'.$base_url.'assets/css/bootstrap.min.css" rel="stylesheet">

			<!-- Custom CSS -->
			<link href="'.$base_url.'assets/css/sb-admin.css" rel="stylesheet">

			<!-- Morris Charts CSS -->
			<link href="'.$base_url.'assets/css/plugins/morris.css" rel="stylesheet">

			<!-- Custom Fonts -->
			<link href="'.$base_url.'assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

			<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
			<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->

			<!-- jQuery -->
			<script src="'.$base_url.'assets/js/jquery.js"></script>

			<script type="text/javascript">
				$( document ).ready(function() {
					var url = window.location;
               // Will only work if string in href matches with location
					$(\'.side-nav a[href="\'+ url +\'"]\').parent().addClass(\'active\');
					$(\'.thispages\').html($(\'.side-nav a[href="\'+ url +\'"]\').html());

              // Will also work for relative and absolute hrefs
					$(\'.side-nav a\').filter(function() {
						return this.href == url;
					}).parent().addClass(\'active\');
				});
			</script>
		</head>

		<body style ="height:100%;">

			<div id="wrapper" >

				<!-- Navigation -->
				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="ctl_dashboard">สำนักวิชาศึกษาทั่วไป <br> มหาวิทยาลัยราชภัฏอุดรธานี</a>
					</div>
					<!-- Top Menu Items -->
					<ul class="nav navbar-right top-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
							<ul class="dropdown-menu message-dropdown">
								<li class="message-preview">
									<a href="#">
										<div class="media">
											<span class="pull-left">
												<img class="media-object" src="http://placehold.it/50x50" alt="">
											</span>
											<div class="media-body">
												<h5 class="media-heading"><strong>John Smith</strong>
												</h5>
												<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
												<p>Lorem ipsum dolor sit amet, consectetur...</p>
											</div>
										</div>
									</a>
								</li>
								<li class="message-preview">
									<a href="#">
										<div class="media">
											<span class="pull-left">
												<img class="media-object" src="http://placehold.it/50x50" alt="">
											</span>
											<div class="media-body">
												<h5 class="media-heading"><strong>John Smith</strong>
												</h5>
												<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
												<p>Lorem ipsum dolor sit amet, consectetur...</p>
											</div>
										</div>
									</a>
								</li>
								<li class="message-preview">
									<a href="#">
										<div class="media">
											<span class="pull-left">
												<img class="media-object" src="http://placehold.it/50x50" alt="">
											</span>
											<div class="media-body">
												<h5 class="media-heading"><strong>John Smith</strong>
												</h5>
												<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
												<p>Lorem ipsum dolor sit amet, consectetur...</p>
											</div>
										</div>
									</a>
								</li>
								<li class="message-footer">
									<a href="#">Read All New Messages</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
							<ul class="dropdown-menu alert-dropdown">
								<li>
									<a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
								</li>
								<li>
									<a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
								</li>
								<li>
									<a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
								</li>
								<li>
									<a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
								</li>
								<li>
									<a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
								</li>
								<li>
									<a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="#">View All</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
								</li>
								<li>
									<a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
								</li>
								<li>
									<a href="Management"><i class="fa fa-fw fa-gear"></i> Settings</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
					</ul>
					<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
					<div class="collapse navbar-collapse navbar-ex1-collapse ">
						'.$this->menu().'
					</div>
					<!-- /.navbar-collapse -->
				</nav>

				<div id="page-wrapper" >

					<div class="container-fluid" >

						<!-- Page Heading -->
						<div class="row">
							<div class="col-lg-12">
								<h1 class="page-header">
									'. $TEXTTITLE.'
								</h1>
							</div>
						</div>
						<!-- /.row -->
						';
					}
					public function getFooter($base_url)
					{
						return '
						<!-- Footer -->
						<footer style="clear: both;bottom:0px;right:0px;" >
							<div class="row">
								<div class="col-lg-12" >
									<p class="pull-right" >Copyright &copy; Webdeveloper By Mr.Chaiwat Homsang</p>
								</div>
							</div>
							<!-- /.row -->
						</footer>
						<!-- /. end footer -->

					</div>
					<!-- /.container-fluid -->

				</div>
				<!-- /#page-wrapper -->

			</div>
			<!-- /#wrapper -->

			<!-- Bootstrap Core JavaScript -->
			<script src="'.$base_url.'assets/js/bootstrap.min.js"></script>
		</body>

		</html>

		';
	}

	public function menu()
	{
		return '
		<ul class="nav navbar-nav side-nav ">
			<li >
				<a href="Ctl_dashboard" ><i class="fa fa-fw fa-book"></i> หน้าแรก</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-fw fa-bullhorn"></i> ประกาศทุน</a>
			</li>
			<li>
				<a href="Ctl_document"><i class="fa fa-fw fa-folder"></i> จัดเก็บเอกสาร</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-fw fa-money"></i> งบประมาณ</a>
			</li>
			<li>
				<a href="http://rdi.udru.ac.th/" target="_blank"><i class="fa fa-fw fa-money"></i> สถาบันวิจัย มรภ.อุดรธานี</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
			</li>
			<li class="divider"> </li>
			<li>
				<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
				<ul id="demo" class="collapse">
					<li>
						<a href="#">Dropdown Item</a>
					</li>
					<li>
						<a href="#">Dropdown Item</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
			</li>
			<li>
				<a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
			</li>
		</ul>

		';
	}
}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
