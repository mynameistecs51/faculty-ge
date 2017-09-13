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
		<html>
		<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">

			<title> สำนักวิชาศึกษาทั่วไป</title>

			<!-- Bootstrap Core CSS -->
			<link href="'.$base_url.'assets/css/bootstrap.css" rel="stylesheet">
			<!-- <link href="'.$base_url.'assets/css/bootstrap.min.css" rel="stylesheet">-->

			<!-- Bootstrap DataTable CSS -->
			<link href="'.$base_url.'assets/dataTable/css/jquery.dataTables.min.css" rel="stylesheet">
			<!-- ./ End css -->

			<!-- Jquery UI -->
			<link href="'.$base_url.'assets/css/jquery-ui.min.css" rel="stylesheet">

			<!-- Custom Fonts -->
			<link href="'.$base_url.'assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

			<script src="'.$base_url.'assets/js/jquery.min.js"></script>
			<style >
				@font-face {
					font-family: TH_Charmonman;
					src: url("'.$base_url.'assets/fonts/TH Charmonman.ttf");
				}

			#brandner{
				font-family: TH_Charmonman;
				font-size: 30px;
				padding-left:30px;
				font-weight: bold;
				color:white;
			}
			title{
				font-family: TH_Charmonman;
			}
			body {
				background:#fff;
				border : 1px solid #D9DEE4;
			}
		</style>
	</head>
	<body>
		<!-- Navigation -->
		<div class="col-sm-12"  >
			<div class="row">
				<nav class="navbar bg-primary " >
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" id="brandner"> สำนักวิชาศึกษาทั่วไป</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1" >
							'.$this->menu($base_url).'
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
			<!-- show body -->
			<div class="row   style="background-color:none;padding: 20px;">

				<div class="content col-sm-3" >  <!--   menu left -->
					<div class="panel panel-primary">
						<div class="panel-heading"><i class="glyphicon glyphicon-home" aria-hidden="true"></i> เมนู</div>
						<div class="panel-body ">
							<div>'.anchor("/", "<h4><i class=\"glyphicon glyphicon-hand-right\"></i> หน้าแรก</h4>").'</div>
							<div>'.anchor("/", "<h4><i class=\"glyphicon glyphicon-hand-right\"></i> ข่าวสาร</h4>").'</div>
							<div>'.anchor("/", "<h4><i class=\"glyphicon glyphicon-hand-right\"></i> แหล่งทุน</h4>").'</div>
							<div>'.anchor("/", "<h4><i class=\"glyphicon glyphicon-hand-right\"></i> สถาบันวิจัย มรภ.อุดรธานี</h4>").'</div>
							<div>'.anchor("http://www.nrct.go.th/%E0%B8%AB%E0%B8%99%E0%B8%B2%E0%B8%AB%E0%B8%A5%E0%B8%81.aspx#.WUH8YpDyjIU", "<h4><i class=\"glyphicon glyphicon-hand-right\"></i> วช.</h4>",'target="_blank"').'</div>
							<div>'.anchor("http://www.mua.go.th/ohec/", "<h4><i class=\"glyphicon glyphicon-hand-right\"></i> สกอ.</h4>",'target="_blank"').'</div>
						</div>
					</div>
				</div> <!-- ./end content menu left -->

				<!-- show body -->
				<div class="content col-sm-9" >

					<div class="row" >
						<div class="col-sm-12" >
							<h1 class="page-header" style="margin-top:0px;">
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
				</div> <!-- /. end content body -->
			</div>	<!-- end /. row -->
			<!-- Bootstrap Core JS -->
			<script src="'.$base_url.'assets/js/jquery.js"></script>
			<script src="'.$base_url.'assets/js/bootstrap.min.js"></script>

			<!-- Juqery UI -->
			<!-- <script src="'.$base_url.'assets/js/jquery-ui.min.js"></script> -->

			<!-- Bootstrap DataTable JS -->
			<script src="'.$base_url.'assets/dataTable/js/jquery.dataTables.min.js"></script>
			<!-- ./ End Js dataTable -->

		</body>
		</html>
		';
	}

	public function menu($base_url)
	{
		return '
		<ul class="nav navbar-nav navbar-right">
			<li ><a href="'.$base_url.'index.php/dashboard"  style="color:#000;"> หน้าแรก</a></li>
			<li><a href="#"  style="color:#000;"> ข่าวสาร</a></li>
			<li><a href="#"  style="color:#000;"> แหล่งทุน</a></li>
			<li><a href="#"  style="color:#000;"> สถาบันวิจัย มรภ.อุดรธานี</a></li>
			<li><a href="http://www.nrct.go.th/%E0%B8%AB%E0%B8%99%E0%B8%B2%E0%B8%AB%E0%B8%A5%E0%B8%81.aspx#.WUH8YpDyjIU"  style="color:#000;" target="_blank"> วช.</a></li>
			<li><a href="http://www.mua.go.th/ohec/"  style="color:#000;" target="_blank"> สกอ.</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="color:#000;"> SETTING <b class="caret"></b></a>
				<ul class="dropdown-menu ">
					<li class="col-sm-12" >
						<a href="'.base_url().'index.php/management"><i class="fa fa-fw fa-gear"></i> Settings</a>
					</li>
				</ul>
			</li>
			<li > <a class="btn "  style="color:#000;" data-toggle="modal" data-target="#myModal">Sign In</a>'.$this->loginForm().'</li>
		</ul>

		';
	}

	public function loginForm()
	{
		echo '

		<!-- Modal Login-->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-sm">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"> Login เพื่อเข้าสู่ระบบ</h4>
					</div>
					<div class="modal-body">
						<div class="col-sm-12">
							<img src="'.base_url().'/assets/images/user.png" class="img-circle col-sm-7 col-sm-offset-2" >
						</div>
						<form method="post">
							<div class="form-group">
								<label for="username">Username :</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Username">
							</div>
							<div class="form-group">
								<label for="password">Password :</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>
							<button type="reset" class="btn btn-warning">Cancel</button>
							<button type="submit" class="btn btn-success">Login</button>
						</form>

					</div>
					<div class="modal-footer ">
						<p class="help-block ">register </p>
					</div>
				</div>

			</div>
		</div>
		';
	}
}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
