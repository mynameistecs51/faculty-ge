<?php echo $header; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="panel-primary" style="margin-top:-40px;">
	<div class="panel-body alert-default">
		<?php if(!empty($fundData[0]['fund_file'])): ?>
			<div class="col-sm-12">
				<?php
				$pic_name = explode(',',$fundData[0]['fund_file']);
				for($i=0;$i < count($pic_name) ; $i++){
					$showPicture = ($pic_name[0] == "")?'no-image.jpg': $pic_name[$i];
					echo '<div class="col-sm-3"  > ';
					echo '<a class="fancybox" href="'.base_url().'assets/files_fund/'.$showPicture.'" data-fancybox-group="gallery" >';
					echo '<img class="img-rounded   " src="'.base_url().'assets/files_fund/'.$showPicture.'" alt="" style="width:200px;height:200px;display:block;margin-top:5px;" > ';
					echo '</a>';
					echo '</div>';
				}
				?>
			</div>
		<?php endif; ?>
		<div class="col-sm-12" style="margin-top: 10px;">
			<?php echo str_replace(array(' ',"\r\n"),array("&nbsp;",'<br>'),$fundData[0]['fund_detail']); ?>
			<hr>
			ที่มา:: <?php echo anchor($fundData[0]['fund_source'], $fundData[0]['fund_source'], array('target' => '_blank')); ?>
		</div>
	</div>
</div>

<?php echo $footer; ?>