<?php echo $header; ?>
<div class="row">
	<div class="panel panel-info">

		<?php foreach ($showAct as $row => $dataAc): ?>
			<div class="panel-heading"><?php echo $dataAc['ac_title']; ?></div>
			<div class="panel-body">
				<?php echo $dataAc['ac_detail']; ?>
				<hr>

				<?php
				$pic_name = explode(',',substr($dataAc['ac_pict'],0,-1));
				for($i=0;$i < count($pic_name) ; $i++){
					echo '<div class="col-sm-6 col-md-3">';
					echo '<div class="thumbnail">';
					echo '<img src="'.base_url().'assets/files_upload/'.$pic_name[$i].'" alt="">';
					echo '</div>';
					echo '</div>';
				}
				?>
			</div>
		</div>
	<?php endforeach ?>

</div>
<?php echo $footer; ?>