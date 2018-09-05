<?php echo $header; ?>


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

	<div class="row col-sm-12">
		<!-- <div class="login-box-body"> -->
			<!-- <div class="page-header  "> -->
				<h2 style="margin-top:-30px;"><b style="color:#FF0000"><br><?php echo $error ?></b></h2>
			<!-- </div> -->
		<!-- </div> -->
		<!-- /.login-logo -->
		<div class="col-sm-10" style="margin-bottom: 40px;">
			<form name="form_login" action="<?php echo base_url()?>index.php/authen/checkLogin/" method="post">
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
							</label>
						</div>
					</div>
					<!-- /.col -->

					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat"> LOG IN </button>
					</div>
					<!-- /.col -->
				</div>
				<!-- <div class="row"> -->
					<!-- <div class="col-xs-12" align="right"> <a href="../authen/forgotpassword/"> FOR GOT PASSWORD ? </a>
					</div> -->
				</form>
			</div>
			<!-- /.login-box-body -->
		</div>
		<!-- /.login-box -->

<?php echo $footer;?>
