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
		left: 0px;
	}
	.show_images:hover .update{

		width: auto;
		height: auto;
		top:0px;
		right: 0px;
		display: inline-block;

	}
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
	<div class="col-sm-6 col-md-3">
		<div class="show_images thumbnail">
			<img  style="height: 200px; width: 100%; display: block;" src="<?php echo base_url().'assets/files_upload/'.$numpict[$i]['namePict'];?>" alt="" data-holder-rendered="true">
			<button type="button" class="btn btn-primary btn-sm update" data-toggle="modal" data-target="#myModal">
				update
			</button>
			<button type="button" class ="delete btn btn-primary btn-sm" data-id="<?php echo $listActivity['ac_id']; ?>" data-pict="<?php echo $numpict[$i]['namePict']; ?>" data-numpict="<?php echo $numpict[$i]['number']; ?>">
				delete
			</button>
			<!-- <a class="delete btn btn-primary btn-sm" href="#">delate</a> -->
			<!-- <?php echo anchor('#','delete','class ="delete btn btn-primary btn-sm"');?> -->
		</div>
	</div>
	<input type="hidden" name="pictureAll" value="<?php echo $listActivity['ac_pict'] ;?>">
<?php endfor;?>
</div>
<script  type="text/javascript" charset="utf-8">
	$(function(){
		$('.delete').click(function(){
			// console.log($(this).data('id')+'  '+ $(this).data('pict'));
			$.ajax({
				url: '<?php echo base_url().$controller."/delEditpict/";?>',
				type: "post",
				data: {'ac_id': $(this).data('id'), 'pictureName': $(this).data('pict'), 'numPict': $(this).data('numpict')},
				success: function(rs)
				{
					// console.log(rs);
					alert("ลบข้อมูลเสร็จเรียบร้อย."+rs);
					// window.location.reload();
				},
				error:function(err){
					console.log(err);
					// alert("เกิดข้อผิดพลาดในการลบข้อมูล");
					// window.location.reload();
				}
			});
		});
	});
</script>