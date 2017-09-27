<?php echo $header; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="panel-primary" style="margin-top:-40px;">
	<div class="panel-body alert-default">
		<?php echo str_replace(array('\n',' '),array('<br>','&nbsp; '),$fundData[0]['fund_detail']); ?>
	</div>
</div>

<?php echo $footer; ?>