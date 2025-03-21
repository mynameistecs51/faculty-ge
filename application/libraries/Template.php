<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	// protected $ci;

	public function __construct()
	{
		$this->ci =& get_instance();
    $this->ci->load->model('mdl_link');
		// $userID = $this->ci->session->userdata('userID');
		// $userStatus = $this->ci->session->userdata('userStatus');
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
  background:#efefef;
  border : 1px solid #D9DEE4;
}
</style>
</head>
<body>
<!-- Navigation -->

<div class="col-sm-12"  >
<div class="row">
<nav class="navbar" >
<div class="container-fluid">

<div class="row" >
	<img src="'.base_url("assets/images/headerGE.png").'" alt="" >
</div>

<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header ">

<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" >
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar" style="background-color:#fff;"></span>
<span class="icon-bar" style="background-color:#fff;"></span>
<span class="icon-bar" style="background-color:#fff;"></span>
</button>

<!-- <a class="navbar-brand" id="brandner" style="padding-top:20px;"> สำนักวิชาศึกษาทั่วไป</a> -->
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1" >
'.$this->menu($base_url).'
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
</div>
<!-- show body -->
<div class="row" style="background-color:none;padding-top: 10px;margin-top:-30px;">

<div class="content col-sm-3" >  <!--   menu left -->
<div class="panel panel-primary">
<div class="panel-heading"><i class="glyphicon glyphicon-home" aria-hidden="true"></i> เมนู</div>
<div class="panel-body ">
<div>'.anchor("/", "<h4><i class=\"glyphicon glyphicon-hand-right\"></i> หน้าแรก</h4>").'</div>
<div>'.anchor("/", "<h4><i class=\"glyphicon glyphicon-hand-right\"></i> ข่าวสาร</h4>").'</div>
<div>'.anchor("/", "<h4><i class=\"glyphicon glyphicon-hand-right\"></i> แหล่งทุน</h4>").'</div>

'.$this->link().'

</div>
</div>
</div> <!-- ./end content menu left -->

<!-- show body -->
<div class="content col-sm-9" style="background-color: #fff;padding-top:10px;" >

<div class="row">
<div class="col-sm-12">
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
	$html = '
	<ul class="nav navbar-nav navbar-right">
	<!--
	<li ><a href="'.$base_url.'index.php/dashboard"  style="color:#000;"> หน้าแรก</a></li>
	<li><a href="#"  style="color:#000;"> ข่าวสาร</a></li>
	<li><a href="#"  style="color:#000;"> แหล่งทุน</a></li>
	<li><a href="#"  style="color:#000;"> สถาบันวิจัย มรภ.อุดรธานี</a></li>
	<li><a href="http://www.nrct.go.th/%E0%B8%AB%E0%B8%99%E0%B8%B2%E0%B8%AB%E0%B8%A5%E0%B8%81.aspx#.WUH8YpDyjIU"  style="color:#000;" target="_blank"> วช.</a></li>
	<li><a href="http://www.mua.go.th/ohec/"  style="color:#000;" target="_blank"> สกอ.</a></li>
	-->
	';
	if($this->ci->session->userdata('userStatus') == 'admin'){
		$html .= '
		<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#000;"><i class="fa fa-fw fa-gear" aria-hidden="true"></i> SETTING <b class="caret"></b></a>
		<ul class="dropdown-menu ">
		<li>
   <a href="'.base_url().'index.php/Document"><i class="fa fa-fw fa-book" aria-hidden="true"></i> อัพโหลดงานวิจัย</a>
   </li>
   <li>
   <a href="'.base_url().'index.php/Activity"><i class="fa fa-fw fa-image" aria-hidden="true"></i> อัพโหลดกิจกรรม</a>
   </li>
   <li>
   <a href="'.base_url().'index.php/News"><i class="fa fa-newspaper-o" aria-hidden="true"></i> อัพโหลดข่าว</a>
   </li>
   <li>
   <a href="'.base_url().'index.php/Fund"><i class="fa fa-fw fa-money" aria-hidden="true"></i> อัพโหลดแหล่งทุน</a>
   </li>
   <li>
   <a href="'.base_url().'index.php/Link"><i class="fa fa-fw fa-link" aria-hidden="true"></i> อัพโหลดลิงค์</a>
   </li>
   <!--
   <li class="col-sm-12" >
   <a href="'.base_url().'index.php/management"><i class="fa fa-fw fa-gear" aria-hidden="true"></i> Settings</a>
   </li>
   -->
   </ul>
   </li>
   ';
 }

 if($this->ci->session->userdata('userID') != ''):
  $html .= '
  <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="color:#000;"> <i class="fa fa-user " aria-hidden="true"></i> '.$this->ci->session->userdata('username').' <b class="caret"></b></a>
  <ul class="dropdown-menu ">
  <li class="col-sm-12" >
  <a href="'.base_url().'index.php/authen/logout"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
  </li>
  </ul>
  </li>
  ';
else:
  $html .= '
  <li > <a class="btn "  style="color:#000;font-weight:bold;" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-sign-in" aria-hidden="true"></i> Sign In</a>'.$this->loginForm().'</li>
  </ul>
  ';
endif;

return $html;
}

public function link()
{
  $html ='';
  $link = $this->ci->mdl_link->getLink();
  foreach ($link as $row) {
    $html .= '<div>'.anchor($row->link_url, "<h4><i class=\"glyphicon glyphicon-hand-right\"></i> ".$row->link_name." </h4>",'target="_blank"').'</div>';
  }
  return $html;
}

function loginForm()
{
	$html = '
	<!-- Modal Login-->
	<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">
	<!-- Modal content-->
	<div class="modal-content">

	<div class="modal-body">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" class="active"><a href="#SignIn" aria-controls="SignIn" role="tab" data-toggle="tab">SignIn</a></li>
	<li role="presentation"><a href="#SignUp" aria-controls="SignUp" role="tab" data-toggle="tab">SignUp</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content ">
	<div role="tabpanel" class="tab-pane active" id="SignIn">
	<div class="col-sm-6">
	<img src="'.base_url().'/assets/images/user.png" class=" col-sm-9 text-center" >
	</div>
	'.form_open('authen/checkLogin' ).'
	<div class="form-group col-sm-6">
	<label for="username" style="color:#222;">Username :</label>
	<input type="text" class="form-control" id="username" name="username" placeholder="Username">
	</div>
	<div class="form-group col-sm-6">
	<label for="password" style="color:#222;">Password :</label>
	<input type="password" class="form-control" id="password" name="password" placeholder="Password">
	</div>
	<div class="orm-group   text-center">
	<button type="reset" class="btn btn-warning" data-dismiss="modal">Cancel</button>
	<button type="submit" class="btn btn-success">Login</button>
	</div>
	'.form_close().'
	</div> <!-- / end login \-->

	<div role="tabpanel" class="tab-pane" id="SignUp">

	'.form_open('account/Register',"class='row-fluid'").'
	<div class="form-group ">
	<label for="username" style="color:#222;">Username :</label>
	<input type="text" class="form-control" id="username" name="username" placeholder="Username">
	</div>
	<div class="form-group ">
	<label for="password" style="color:#222;">Password :</label>
	<input type="password" class="form-control" id="password" name="password" placeholder="Password">
	</div>
	<div class="form-group ">
	<label for="email" style="color:#222;">E-mail :</label>
	<input type="email" class="form-control" id="email" name="email" placeholder="Email@myemail.com">
	</div>
	<div class="row">
	<div class="form-group col-sm-6">
	<label for="name" style="color:#222;">Name :</label>
	<input type="text" class="form-control" id="name" name="name" placeholder="">
	</div>
	<div class="form-group col-sm-6">
	<label for="lastname" style="color:#222;">Lastname :</label>
	<input type="text" class="form-control" id="lastname" name="lastname" placeholder="">
	</div>
	</div>
	<div class="orm-group text-right">
	<button type="reset" class="btn btn-warning" data-dismiss="modal">Cancel</button>
	<button type="submit" class="btn btn-success">Save</button>
	</div>
	'.form_close().'

	</div> <!-- / End  Register \ -->

	</div>
	</div>
	</div>
	</div>
	</div>
	';

	return $html;
}

}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
