<?php echo $header; ?>
<!-- Bootstrap DataTable CSS -->
<link href="<?php echo base_url();?>assets/dataTable/css/jquery.dataTables.min.css" rel="stylesheet">
<!-- ./ End css -->
<div class="row">
	<!-- add activity -->
	<div class="col-sm-12">
		<button type="button" id="add" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มกิจกรรม</button>
		<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มกิจกรรม</button> -->
	</div>
	<div class="col-sm-12"><br></div>
	<div class="col-sm-12">
		<table id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr  style="text-align:center;">
					<th   style="text-align:center;" >หัวข้อกิจกรรม</th>
					<th style="text-align:center;" class="col-sm-1">ภาพ</th>
					<th style="text-align:center;" class="col-sm-1">รายละเอียด</th>
					<th style="text-align:center;" class="col-sm-2">อัพเดทเมื่อ</th>
					<th style="text-align:center;"  class="col-sm-2" >แก้ไข</th>
					<th style="text-align:center;"  class="col-sm-1" >ผู้โพส</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($getAll_activity as $key => $activity) :?>
					<tr>
						<td><?php echo $activity['ac_title']; ?></td>
						<td style="text-align:center;">
							<?php $picture_name_array = explode(',', $activity['ac_pict']);?>
							<img src="<?php echo base_url().'assets/files_upload/'.$picture_name_array[0];?>" alt="" style="width:128px;height:90px;"/>	<!-- //โชว์รูปภาพ -->
						</td>
						<td style="text-align:center;">
							<?php echo anchor('Activity/showActivity/'.$activity['ac_id'],'ดูข้อมูลกิจกรรม','class="btn btn-info btn_view"');?>
						</td>
						<td style="text-align:center;">
							<?php echo date("d-M-Y",strtotime($activity['dt_create'])); ?>
						</td>
						<td style="text-align:center;">
							<button class="btn btn-warning btn_edit" id="btnEdit[]">	แก้ไข</button>
							<!-- <input type="hidden" id="editID<?php //echo $activity['ac_id'];?>" value="<?php //echo $activity['ac_id'];?>"> -->
						</td>
						<td style="text-align:center;">
							<?php echo $activity['ip_create']; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

</div> <!-- /. end div row -->

<!-- /. show modal add activity -->
<div class="div_modal">
</div>
<!-- ./ end show activity -->

<?php echo $footer; ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable({
			"language": {
				"zeroRecords": "==========> ไม่พบข้อมูลที่ต้องการ <========== "
			},
			"lengthMenu": [ 25,50, 100, "All"],
			scrollX: true,//2
			responsive: true,
		});
		// add activity
		add();
		edit();
	} );

	function 	edit() {
		var table = $('#example').DataTable();
		$('#btnEdit').click(function(){
			var row  = $(this).parents('tr');
			console.log(table.row('tr').data()[3]);
		});
	}

	function add(){
		$('#add').click(function(){
			load_page();
		});
	}

	function load_page(){
		var screenname="เพิ่มข้อมูล :: กิจกรรม ::";
		var url = "<?php echo $url_add; ?>";
		var n=0;
		$('.div_modal').html('');
		modal_form(n,screenname);
		$('#myModal'+n+' .modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>assets/images/loader.gif"/>');
		var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
		modal.on('show.bs.modal', function () {
			modalBody.load(url);
		}).modal({backdrop: 'static',keyboard: true});
		setInterval(function(){$('#ajaxLoaderModal').remove()},5100);
	}

	function modal_form(n,screenname)
	{
		var div='';
		div+='<form action="<?php echo base_url().$controller.'/saveadd';?>"  role="form" data-toggle="validator" id="form" method="post" enctype="multipart/form-data">';
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
