
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
</style>
<div class="row">
	<input type="hidden" name="fund_id" value="<?php echo $rowFund['fund_id']; ?>" >
	<div class="form-group col-sm-12">
		<label for="title" class="col-sm-2 control-label">Title/หัวข้อ </label>
		<div class="col-sm-10">
			<input type="text" name='title' class="form-control " id="title" value="<?php echo $rowFund['fund_title'] ?>">
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="source" class="col-sm-2 control-label">ที่มาของทุน(URL)</label>
		<div class="col-sm-10">
			<input type="text" name='source' class="form-control " id="source" value="<?php echo $rowFund['fund_source'] ?>">
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="images" class="col-sm-2 control-label">ไฟล์อัพโหลด</label>
		<div class="col-sm-10">
			<input type="file" id="images[]" class="form-control-file form-control" name="images[]" size="20" multiple=""  />
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="detail" class="col-sm-2 control-label">รายละเอียด</label>
		<div class="col-sm-10">
			<textarea name="detail" class="form-control" rows="15"><?php echo $rowFund['fund_detail'];?></textarea>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<hr>
		<?php
		$picture = explode(',',$rowFund['fund_file']);
		$numpict = array();
		for($i=0; $i < count($picture); $i++):
			array_push($numpict,array('number'=>$i,'namePict'=>$picture[$i]));
			?>
			<div class="col-sm-6 col-md-3"  style="width:304px;height:236xp;">
				<div class="show_images thumbnail">
					<img  src="<?php echo $show = (empty($picture[0]))? base_url().'assets/images/no-image.jpg' : base_url().'assets/files_fund/'.$numpict[$i]['namePict'];?>" alt="" data-holder-rendered="true" style="width: auto;height: 245px;">
					<button type="button" class ="delete btn btn-primary btn-sm" data-id="<?php echo $rowFund['fund_id']; ?>" data-pict="<?php echo $numpict[$i]['namePict']; ?>" data-numpict="<?php echo $numpict[$i]['number']; ?>">
						<i class="fa fa-trash" aria-hidden="true"></i> delete
					</button>
				</div>
			</div>
			<input type="hidden" name="pictureAll" value="<?php echo $rowFund['fund_file'] ;?>">
		<?php endfor;?>
	</div>
</div>
<script  type="text/javascript" charset="utf-8">
	$(function(){
		$('.delete').click(function(){
			var fund_id = $(this).data('id');
			var chk =  confirm('ยืนยันการลบ ?');
			if(chk==true){
				$.ajax({
					url: '<?php echo base_url().$controller."/delEditpict/";?>',
					type: "post",
					data: {'fund_id': $(this).data('id'), 'pictureName': $(this).data('pict'), 'numPict': $(this).data('numpict')},
					success: function(rs)
					{
						// alert("ลบข้อมูลเสร็จเรียบร้อย.");
						load_page("<?php echo $url_editFund;?>"+fund_id,"แก้ไข :: ข้อมูลกิจกรรม ::","<?php echo base_url().$controller.'/saveEdit';?>");
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
