<?php echo $header; ?>
<style type="text/css">
	tbody td, thead th{
		font-size: 12px;
	}
</style>
<!-- Bootstrap DataTable CSS -->
<link href="<?php echo base_url();?>assets/dataTable/css/jquery.dataTables.min.css" rel="stylesheet">
<!-- ./ End css -->
<div class="row">
	<!-- add activity -->
	<div class="col-sm-12">
		<button type="button" id="add" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มแหล่งทุน</button>
	</div>
	<div class="col-sm-12"><br></div>
	<div class="col-sm-12">
		<table id="example" class="display" cellspacing="0" width="100%" >
			<thead style="background-color:  #cccccc;">
				<tr>
					<th style="text-align:center;" class="col-sm-2">หัวข้อ</th>
					<th style="text-align:center;" class="col-sm-4">รายละเอียด</th>
					<th style="text-align:center;" class="col-sm-2">ที่มา</th>
					<th style="text-align:center;" class="col-sm-1">วันที่</th>
					<th style="text-align:center;" class="col-sm-2 text-center">ลบ/แก้ไข</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($getFund as $rowFund): ?>
					<tr>
						<td><?php echo substr($rowFund['fund_title'],0,100).'...'; ?></td>
						<td class="text-center"><?php echo substr($rowFund['fund_detail'],0,100).'...'; ?></td>
						<td class="text-center"><?php echo substr($rowFund['fund_source'],0,50).'...'; ?></td>
						<td class="text-center"><?php echo date_format(date_create($rowFund['dt_update']), 'd/m/Y'); ?></td>
						<td class='text-center'>
							<button class="btn btn-danger btn-xs btn_delete" data-delid="<?php echo $rowFund['id_fund']; ?>"><i class="fa fa-trash"></i> ลบ</button>
							&nbsp;
							<button class="btn btn-warning btn-xs btn_edit" data-editid="<?php echo $rowFund['id_fund']; ?>"><i class="fa fa-edit"></i> แก้ไข</button>
						</td>
					</tr>
				<?php endforeach ?>
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
			scrollY:true,
			responsive: true,
		});

		// add();
		// fnupdate();
		// fndelete();
	} );

	function add(){
		$('#add').click(function(){
			load_page("<?php echo $url_addFund; ?>","เพิ่มข้อมูล :: ข่าวสาร ::","<?php echo base_url().'index.php/'.$controller.'/saveAdd/';?>");
		});
	}

	function fnupdate() {
		$('.btn_edit').click(function(){
			load_page("<?php echo $url_editFund;?>"+$(this).data('editid'),"อัพเดทข้อมูล :: ข้อมูลข่าวสาร ::","<?php echo $saveEdit; ?>");
			// alert("UPDATE"+$(this).data('update'));
		});
	}

	function fndelete() {
		$('.btn_delete').click(function(){
			// console.log($(this).data('delete'));
			var cfm = confirm("ยืนยันการ ลบ!");
			if(cfm ){
				$.ajax({
					url: '<?php echo $url_deleteFund;?>',
					type: 'POST',
				// dataType: 'json',
				data: {'id_fund': $(this).data('delid')},
				success: function(rs)
				{
					// alert("ลบข้อมูลเสร็จเรียบร้อย.");
					window.location.reload();
				},
				error:function(err){
					alert("เกิดข้อผิดพลาดในการลบข้อมูล" +err);
					window.location.reload();
				}
			});
			}
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
		div+='<form action="'+url+'"  role="form" data-toggle="validator" id="form" method="post" enctype="multipart/form-data" class="form-horizontal">';
		div+='<!-- Modal -->';
		div+='<div class="modal modal-wide fade" id="myModal'+n+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
		div+='<div class="modal-dialog" style="width: 80%;">';
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