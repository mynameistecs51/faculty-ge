<?php echo $header; ?>
<div class="row">
	<div class="panel panel-info">
		<div class="panel-heading"><?php echo $listActivity['ac_title']; ?></div>
		<div class="panel-body">
			<?php echo $listActivity['ac_detail']; ?>
			<hr>

			<?php
			$pic_name = explode(',',$listActivity['ac_pict']);
			for($i=0;$i < count($pic_name) ; $i++){
				$showPicture = ($pic_name[0] == "")?'no-image.jpg': $pic_name[$i];
				echo '<div class="col-sm-6 col-md-3">';
				echo '<div class="thumbnail">';
				echo '<img src="'.base_url().'assets/files_upload/'.$showPicture.'" alt="">';
				echo '</div>';
				echo '</div>';
			}
			?>
		</div>
	</div>

</div>
<?php echo $footer; ?>