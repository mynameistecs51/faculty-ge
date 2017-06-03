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
							<?php  $showpic = ($picture_name_array[0] == "")?'no-image.jpg' : $picture_name_array[0]; ?>
							<img src="<?php echo base_url().'assets/files_upload/'.$showpic;?>" alt="" style="width:128px;height:90px;"/>	<!-- //โชว์รูปภาพ -->
						</td>
						<td style="text-align:center;">
							<?php echo anchor('Activity/showActivity/'.$activity['ac_id'],'ดูข้อมูลกิจกรรม','class="btn btn-info btn_view"');?>
						</td>
						<td style="text-align:center;">
							<?php echo date("d-M-Y",strtotime($activity['dt_create'])); ?>
						</td>
						<td style="text-align:center;" class="col-sm-2">
							<button class="btn btn-warning btn_edit" value="<?php echo $activity['ac_id']; ?>" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>แก้ไข</button>
							<button class="btn btn-danger btn_delete" value="<?php echo $activity['ac_id']; ?>" title="Delete"><i class="fa fa-bitbucket" aria-hidden="true"></i>ลบ</button>
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
		fnedit();
		fndelete();
	} );

	function 	fnedit() {
		$('.btn_edit').click(function(){
			load_page("<?php echo $url_edit;?>"+$(this).val(),"แก้ไข :: ข้อมูลกิจกรรม ::","<?php echo base_url().$controller.'/saveEdit';?>");
		});
	}

	function 	fndelete() {
		$('.btn_delete').click(function(){
			var chk =  confirm('ยืนยันการลบ ?');
			if(chk == true){
				$.ajax({
					url: '<?php echo base_url().$controller."/deleteActivity/";?>',
					type: "post",
					data: {'ac_id': $(this).val()},
					success: function()
					{
						// alert("ลบข้อมูลเสร็จเรียบร้อย.");
						window.location.reload();
					},
					error:function(err){
						alert("เกิดข้อผิดพลาดในการลบข้อมูล");
						window.location.reload();
					}
				});
			}else{
				return false;
			}
		});

	}

	function add(){
		$('#add').click(function(){
			load_page("<?php echo $url_add; ?>","เพิ่มข้อมูล :: กิจกรรม ::","<?php echo base_url().$controller.'/saveadd';?>");
		});
	}

	function load_page(loadUrl,texttitle,urlsend){
		var screenname= texttitle;
		var url = loadUrl;
		var n=0;
		$('.div_modal').html('');
		modal_form(n,screenname,urlsend);
		$('#myModal'+n+' .modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>assets/images/loader.gif"/>');
		var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
		modal.on('show.bs.modal', function () {
			modalBody.load(url);
		}).modal({backdrop: 'static',keyboard: true});
		setInterval(function(){$('#ajaxLoaderModal').remove()},5100);
	}

	function modal_form(n,screenname,url)
	{
		var div='';
		div+='<form action="'+url+'"  role="form" data-toggle="validator" id="form" method="post" enctype="multipart/form-data">';
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
