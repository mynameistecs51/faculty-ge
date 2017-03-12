  <div class="row">
  	<?php echo form_open_multipart('#',' class="form-horizontal" role="form" ');?>
  	<div class="form-group col-sm-6">
  		<label for="input_detail" class="col-sm-2 control-label">หัวข้อข่าว </label>
  		<div class="col-sm-10">
  			<input type="text" class="form-control" id="input_title" name="input_title" value=""> <br/>
  		</div>
  		<label for="input_detail" class="col-sm-2 control-label">รายละเอียด </label>
  		<div class="col-sm-10">
  			<textarea class="form-control" rows="6" cols="50" id="input_detail" name="input_detail" ></textarea>
  		</div>
  	</div>
  	<div class="form-group col-xs-6">
  		<label for="input_picture" class="col-sm-2 control-label">รูปภาพ   </label>
  		<div class="col-sm-8">
  			<img id="show_pic" name="show_pic" src="<?php echo base_url().'assets/images/no-image.jpg';?>" alt=""  /><br/><br/>
  			<input type="file" id="images[]" class="form-control" name="images[]" size="20" onchange="PreviewImage();" multiple=""/>

  		</div>
  	</div>
  	<div>
  	</div>
  	<div class="col-sm-offset-8  col-xs-4">
  		<button type="reset" class="btn btn-warning" value="reset">reset</button>
  		<button type="submit" class="btn btn-success" value="save">save</button>
  	</div>
  	<?php echo form_close(); ?>
  </div>