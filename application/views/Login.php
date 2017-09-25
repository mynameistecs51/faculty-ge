<!DOCTYPE html>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
<!-- <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">-->

<!-- Bootstrap DataTable CSS -->
<link href="<?php echo base_url();?>assets/dataTable/css/jquery.dataTables.min.css" rel="stylesheet">
<!-- ./ End css -->

<!-- Jquery UI -->
<link href="<?php echo base_url();?>assets/css/jquery-ui.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<style >
@font-face {
	font-family: TH_Charmonman;
	src: url("<?php echo base_url();?>assets/fonts/TH Charmonman.ttf");
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
<body >

	<br><br>
	<div class="login-box col-sm-4">
		<div class="login-box-body">
			<div class="page-header bg-primary">
				<h1>general education faculty</h1>
			</div>
			<!-- <a href="<?php echo base_url()?>dashboard/"> -->
				<!-- <img src="<?php echo base_url()?>assets/images/janjao-logo.png" height="45"> -->
			<!-- </a> -->
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body" style="margin-top: -40px;">
			<!-- <span style="color:#333"><h3>PLEASE LOGIN</h3></span> -->
			<b style="color:#FF0000"><br><?php echo $error ?></b>
			<form name="form_login" action="<?php echo base_url()?>authen/checkLogin/" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="username" name="username"   autofocus="autofocus" required autocomplete="off" style="height: 45px;font-size: 20px;">
					<span class="glyphicon lyphicon glyphicon-user form-control-feedback" style="margin-top:5px;"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="password" name="password" autocomplete="off" required style="height: 45px;font-size: 20px;">
					<span class="glyphicon glyphicon-lock form-control-feedback" style="margin-top:5px;"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<input type="hidden"   name="rememberme" value="Yes">
						<div class="checkbox icheck">
							<label>
								<!--   <input type="checkbox" name="rememberme" value="Yes" checked="checked"> Keep me logged in-->
							</label>
						</div>
					</div>
					<!-- /.col -->

					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat"> LOG IN </button>
					</div>
					<!-- /.col -->
				</div>
				<div class="row">
					<div class="col-xs-12" align="right"> <a href="../authen/forgotpassword/"> FOR GOT PASSWORD ? </a>
					</div>
				</form>
			</div>
			<!-- /.login-box-body -->
		</div>
		<!-- /.login-box -->

		<!-- Bootstrap Core JS -->
		<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

		<!-- Juqery UI -->
		<!-- <script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script> -->

		<!-- Bootstrap DataTable JS -->
		<script src="<?php echo base_url();?>assets/dataTable/js/jquery.dataTables.min.js"></script>
		<!-- ./ End Js dataTable -->

	</body>
	</html>
