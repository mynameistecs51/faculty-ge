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
	$picture = explode(',',substr($listActivity['ac_pict'],0,-1));
	for($i=0; $i < count($picture); $i++):
		?>
	<div class="col-sm-6 col-md-3">
		<div class="thumbnail">
		<img  style="height: 200px; width: 100%; display: block;" src="<?php echo base_url().'assets/files_upload/'.$picture[$i];?>" alt="" data-holder-rendered="true">
		</div>
	</div>
<?php endfor;?>
</div>