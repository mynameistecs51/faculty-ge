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
		<button type="button" id="add" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มเอกสาร</button>
	</div>
	<div class="col-sm-12"><br></div>
	<div class="col-sm-12">
		<table id="example" class="display" cellspacing="0" width="100%" >
			<thead style="background-color:  #cccccc;">
				<tr>
					<th style="text-align:center;"  class="col-sm-2">ชื่อ สกุล</th>
					<th style="text-align:center;" class="col-sm-3">ชื่องานวิจัย</th>
					<!-- <th style="text-align:center;" class="col-sm-2">คำจำกัดความ</th> -->
					<th style="text-align:center;" class="col-sm-1">เค้าโครง</th>
					<th style="text-align:center;"  class="col-sm-1" >3 บท<br>(ความก้าวหน้า)</th>
					<th style="text-align:center;"  class="col-sm-1" >5 บท <br>(รูปเล่ม)</th>
					<th style="text-align: center;" class="col-sm-2">จัดการ</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($getAllDoc as $keyDoc => $rowDoc): ?>
					<tr>
						<td><?php echo $rowDoc['doc_name']." ".$rowDoc['doc_lastname']; ?></td>
						<td><?php echo $rowDoc['doc_researchName']; ?></td>
						<!-- <td><?php echo $rowDoc['doc_abstract']; ?></td> -->
						<td  style="text-align:center;" >
							<?php echo $Outline =($rowDoc['doc_outline'] != null)?'<i class="fa fa-check" aria-hidden="true"></i>':'<i class="fa fa-times" aria-hidden="true"></i>' ;?>
						</td>
						<td  style="text-align:center;" >
							<?php echo $Progress =($rowDoc['doc_progress'] != null)?'<i class="fa fa-check" aria-hidden="true"></i>':'<i class="fa fa-times" aria-hidden="true"></i>' ;?>
						</td>
						<td  style="text-align:center;" >
							<?php echo $Filesuccess =($rowDoc['doc_filesuccess'] != null)?'<i class="fa fa-check" aria-hidden="true"></i>':'<i class="fa fa-times" aria-hidden="true"></i>' ;?>
						</td>
						<td style="text-align: center;">
							<button class="btn btn-danger btn_delete btn-xs" data-delete="<?php echo $rowDoc['doc_id']; ?>" title="ลบ">
								<i class="fa fa-trash" aria-hidden="true" ></i>
							</button>
							<button class="btn btn-success btn_update btn-xs" title="อัพเดท" data-update="<?php echo $rowDoc['doc_id']; ?>">
								<i class="fa fa-edit" aria-hidden="true"></i>
							</button>
							<button class="btn btn-info btn_download btn-xs" title="ดาว์นโหลด" data-download="<?php echo $rowDoc['doc_id']; ?>">
								<i class="fa fa-download" aria-hidden="true"></i>
							</button>
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
			responsive: true,
		});

		add();
		fnupdate();
		fndelete();
		fndownload();
	} );

	function add(){
		$('#add').click(function(){
			load_page("<?php echo $url_add; ?>","เพิ่มข้อมูล :: งานวิจัย ::","<?php echo base_url().$controller.'/createDoc/';?>");
		});
	}

	function fnupdate() {
		$('.btn_update').click(function(){
			load_page("<?php echo $url_update.'/'; ?>"+$(this).data('update'),"อัพเดทข้อมูล :: งานวิจัย ::","<?php echo base_url().$controller.'/saveUpdate';?>");
			// alert("UPDATE"+$(this).data('update'));
		});
	}

	function fndelete() {
		$('.btn_delete').click(function(){
			// console.log($(this).data('delete'));
			var cfm = confirm("ยืนยันการ ลบ!");
			if(cfm ){
				$.ajax({
					url: '<?php echo base_url().$controller.'/deleteDoc' ?>',
					type: 'POST',
				// dataType: 'json',
				data: {'del_id': $(this).data('delete')},
				success: function(rs)
				{
					alert("ลบข้อมูลเสร็จเรียบร้อย.");
					window.location.reload();
				},
				error:function(err){
					alert("เกิดข้อผิดพลาดในการลบข้อมูล");
					window.location.reload();
				}
			});
			}
		});
	}

	function fndownload(){
		$('.btn_download').click(function(){
			window.open('<?php echo base_url()."$controller/downloadFile/";?>'+$(this).data('download'));
			// $.ajax({
			// 	url: '<?php //echo base_url().$controller."/downloadFile/";?>',
			// 	type: 'POST',
			// 	data: {'docID': $(this).data('download')},
			// })
			// .done(function(rs) {
			// 	// alert("OK");
			// 	console.log(rs);
			// })
			// .fail(function() {
			// 	console.log("error");
			// });
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