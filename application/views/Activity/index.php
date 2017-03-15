<?php echo $header; ?>
<!-- Bootstrap DataTable CSS -->
<link href="<?php echo base_url();?>assets/dataTable/css/jquery.dataTables.min.css" rel="stylesheet">
<!-- ./ End css -->
<div class="row">
	<!-- add activity -->
	<div class="col-sm-12">
		<button type="button" id="add" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มกิจกรรม</button>
	</div>
	<div class="col-sm-12"><br></div>
	<div class="col-sm-12">
		<table id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr  style="text-align:center;">
					<th class="col-sm-1">#</th>
					<th   style="text-align:center;" >หัวข้อกิจกรรม</th>
					<th style="text-align:center;">ภาพ</th>
					<th style="text-align:center;">อัพเดทเมื่อ</th>
					<th style="text-align:center;">รายละเอียด</th>
					<th style="text-align:center;">แก้ไข</th>
					<th class="col-sm-1" style="text-align:center;">ผู้โพส</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>

<!-- /. show modal add activity -->
<div class="div_modal">
</div>
<!-- ./ end show activity -->

<?php echo $footer; ?>
<!-- Bootstrap DataTable JS -->
<script src="<?php echo base_url();?>assets/dataTable/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable({
			"language": {
				"zeroRecords": "==========> ไม่พบข้อมูลที่ต้องการ <========== "
			},
			"lengthMenu": [ 25,50, 100, "All"],
		});
		// add activity
		add();

	} );

	function add(){
		$('#add').click(function(){
			var screenname="เพิ่มข้อมูล :: กิจกรรม ::";
			var url = "<?php echo $url_add; ?>";
			// alert(url);
			var n=0;
			$('.div_modal').html('');
			modal_form(n,screenname);
			$('#myModal'+n+' .modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>assets/images/loader.gif"/>');
			var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
			modal.on('show.bs.modal', function () {
				modalBody.load(url);
			}).modal({backdrop: 'static',keyboard: true});
			setInterval(function(){$('#ajaxLoaderModal').remove()},5100);
		});
	}
	function modal_form(n,screenname)
	{
		var div='';
		div+='<form  role="form" data-toggle="validator" id="form" method="post" enctype="multipart/form-data">';
		div+='<!-- Modal -->';
		div+='<div class="modal modal-wide fade" id="myModal'+n+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
		div+='<div class="modal-dialog" style="width:90%;">';
		div+='<div class="modal-content">';
		div+='<div class="modal-header" style="background:#d9534f;color:#FFFFFF;">';
		div+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
		div+='<h4 class="modal-title">'+screenname+'</h4>';
		div+='</div>';
		div+='<div class="modal-body">';
		div+='</div>';
		div+='<div class="modal-footer" style="text-align:center; background:#F6CECE;">';
		div+='<button type="submit" id="save" class="btn btn-modal"><span class="   glyphicon glyphicon-floppy-saved"> บันทึก</span></button>';
		div+='<button type="reset" class="btn btn-modal" data-dismiss="modal"><span class="   glyphicon glyphicon-floppy-remove"> ยกเลิก</span></button>';
		div+='</div>';
		div+='</div><!-- /.modal-content -->';
		div+='</div><!-- /.modal-dialog -->';
		div+='</div><!-- /.modal -->';
		div+='</form>';
		$('.div_modal').html(div);
	}

</script>
