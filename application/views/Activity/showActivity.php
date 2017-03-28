<?php echo $header; ?>
<div class="row">
	<div class="panel panel-info">
		<div class="panel-heading"><?php echo $listActivity['ac_title']; ?></div>
		<div class="panel-body">
			<?php echo $listActivity['ac_detail']; ?>
			<hr>

			<?php
			$pic_name = explode(',',substr($listActivity['ac_pict'],0,-1));
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

</div>
<?php echo $footer; ?>