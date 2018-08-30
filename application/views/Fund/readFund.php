<?php echo $header; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="panel-primary" style="margin-top:-40px;">
	<div class="panel-body alert-default">
		<?php echo str_replace(array(' ','\r\n'),array(' ','br'),$fundData[0]['fund_detail']); ?>
		<hr>
		ที่มา:: <?php echo anchor($fundData[0]['fund_source'], $fundData[0]['fund_source'], array('target' => '_blank')); ?>
	</div>
</div>

<?php echo $footer; ?>