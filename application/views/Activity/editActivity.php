<style type="text/css">
	.delete ,.update{
		color:red;
		display: none;
		top: -10px;
		width: auto;
		height: auto;
		position:absolute;
	}
	.show_images:hover .delete{

		width: auto;
		height: auto;
		display: inline-block;
		top:0px;
		right: 0px;
		/*left: 0px;*/
	}
	/*.show_images:hover .update{

		width: auto;
		height: auto;
		top:0px;
		right: 0px;
		display: inline-block;

	}*/
</style>
<div class="row">
	<div class="form-group col-sm-6">
		<label for="input_title" class="col-sm-2 control-label">หัวข้อกิจกรรม </label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="input_title" name="input_title" value="<?php echo $listActivity['ac_title']; ?>" required  oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล หัวข้อกิจกรรม')" oninput="setCustomValidity('')">
			<br>
		</div>
		<label for="input_detail" class="col-sm-2 control-label">รายละเอียด </label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="6" cols="50" id="input_detail" name="input_detail" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลรายละเอียดกิจกรรม  ')" oninput="setCustomValidity('')"><?php echo $listActivity['ac_detail']; ?></textarea>
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label for="input_picture" class="col-sm-2 control-label">รูปภาพ   </label>
		<div class="col-sm-8">
			<img id="show_pic" name="show_pic" src="<?php echo base_url().'assets/images/no-image.jpg';?>" alt=""  /><br/><br/>
			<input type="file" id="images[]" class="form-control" name="images[]" size="20" multiple=""  />
		</div>
	</div>
	<hr>
	<?php
	$picture = ($listActivity['ac_pict'] == '')?'no-image.jpg':explode(',',$listActivity['ac_pict']);
	$numpict = array();
	for($i=0; $i < count($picture); $i++):
		array_push($numpict,array('number'=>$i,'namePict'=>$picture[$i]));
	?>
	<div class="col-sm-6 col-md-3"  style="width:304px;height:236xp;">
		<div class="show_images thumbnail">
			<img  src="<?php echo base_url().'assets/files_upload/'.$numpict[$i]['namePict'];?>" alt="" data-holder-rendered="true">
			<!-- <button type="button" class="btn btn-primary btn-sm update" data-toggle="modal" data-target="#myModal">
				update
			</button> -->
			<button type="button" class ="delete btn btn-primary btn-sm" data-id="<?php echo $listActivity['ac_id']; ?>" data-pict="<?php echo $numpict[$i]['namePict']; ?>" data-numpict="<?php echo $numpict[$i]['number']; ?>">
				<i class="fa fa-trash" aria-hidden="true"></i> delete
			</button>
		</div>
	</div>
	<input type="hidden" name="pictureAll" value="<?php echo $listActivity['ac_pict'] ;?>">
	<input type="hidden" name="ac_id" value="<?php echo $listActivity['ac_id']; ?>">
<?php endfor;?>
</div>
<script  type="text/javascript" charset="utf-8">
	$(function(){
		$('.delete').click(function(){
			var ac_id = $(this).data('id');
			var chk =  confirm('ยืนยันการลบ ?');
			if(chk==true){
				$.ajax({
					url: '<?php echo base_url().$controller."/delEditpict/";?>',
					type: "post",
					data: {'ac_id': $(this).data('id'), 'pictureName': $(this).data('pict'), 'numPict': $(this).data('numpict')},
					success: function(rs)
					{
						// alert("ลบข้อมูลเสร็จเรียบร้อย.");
						load_page("<?php echo $url_edit;?>"+ac_id,"แก้ไข :: ข้อมูลกิจกรรม ::","<?php echo base_url().$controller.'/saveEdit';?>");
					},
					error:function(err){
						console.log(err);
					}
				});
			}else{
				return false;
			}
		});
	});

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
		div+='<button type="reset" onclick="reload();" class="btn btn-modal" data-dismiss="modal"><span class="   glyphicon glyphicon-floppy-remove"> ยกเลิก</span></button>';
		div+='</div>';
		div+='</div><!-- /.modal-content -->';
		div+='</div><!-- /.modal-dialog -->';
		div+='</div><!-- /.modal -->';
		div+='</form>';
		$('.div_modal').html(div);
	}

	function reload(){
		window.location.reload();
	}
</script>