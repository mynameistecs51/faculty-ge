<div class="row">
	<div class="form-group col-sm-6">
		<label for="input_title" class="col-sm-2 control-label">หัวข้อกิจกรรม </label>
		<div class="col-sm-10">
			<?php echo form_error('input_title'); ?>
			<input type="text" class="form-control" id="input_title" name="input_title" required  oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล หัวข้อกิจกรรม')" oninput="setCustomValidity('')">
			<br>
		</div>
		<label for="input_detail" class="col-sm-2 control-label">รายละเอียด </label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="6" cols="50" id="input_detail" name="input_detail" required oninvalid="this.setCustomValidity('กรุณากรอกข้อมูลรายละเอียดกิจกรรม  ')" oninput="setCustomValidity('')"></textarea>
		</div>
	</div>
	<div class="form-group col-sm-6">
		<label for="input_picture" class="col-sm-2 control-label">รูปภาพ   </label>
		<div class="col-sm-8">
			<img id="show_pic" name="show_pic" src="<?php echo base_url().'assets/images/no-image.jpg';?>" alt=""  /><br/><br/>
			<input type="file" id="images[]" class="form-control" name="images[]" size="20" multiple=""  />
		</div>
	</div>
</div>
