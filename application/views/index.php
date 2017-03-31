<?php echo $header;  ?>
<div class="row">
	<!-- news -->
	<div class="col-sm-6 pull-left" >
		<div class="col-sm-12 well" style="height: 420px;overflow-y: scroll;">
			<p>	<h3> <i class="fa fa-newspaper-o"> ข่าวสาร</i></h3></p>
			<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
			</div>
		</div>
	</div>
	<!-- /.news -->

	<!-- ทุน -->
	<div class="col-sm-6 pull-right">
		<div class="col-sm-12 well" style="height: 420px;overflow-y: scroll;">
			<p>	<h3><i class="fa fa-money"> แหล่งทุน</i></h3></p>
			<div class=" alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
			</div>
		</div>
	</div>
	<!-- /.ทุน -->
	<!-- /. activity -->
	<div class="col-sm-12">
		<p><h3><i class="fa fa-link" aria-hidden="true"></i> กิจกรรม</h3><hr></p>
		<div class="row">

			<?php foreach ($getAll_activity as $key => $activity) :?>
				<?php $pic_name = explode(',', $activity['ac_pict']);?>
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<img  style="height: 200px; width: 100%; display: block;" src="<?php echo base_url().'assets/files_upload/'.$pic_name[0];?>" alt="" data-holder-rendered="true">
						<h5 class="pull-right"><?php echo count($pic_name)." รูป"; ?></h5>
						<div class="caption">
							<h3><?php echo $activity['ac_title']; ?></h3>
							<p><?php echo $activity['ac_detail']; ?></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div>
	<!-- ./ end activity -->
</div>
<?php echo $footer; ?>