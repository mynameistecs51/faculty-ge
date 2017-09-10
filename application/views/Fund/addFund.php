
<!-- <div class="container" > -->
<div class="row"  >
	<div class="form-group col-sm-12">
		<label for="title" class="col-sm-2 control-label">Title/หัวข้อ </label>
		<div class="col-sm-10">
			<input type="text" name='title' class="form-control " id="title" placeholder="หัวข้อทุนวิจัย" autofocus="" required  oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ')" oninput="setCustomValidity('')">
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="source" class="col-sm-2 control-label">ที่มาของทุน</label>
		<div class="col-sm-10">
			<input type="text" name='source' class="form-control " id="source" placeholder="แหล่งที่มาของทุน">
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="detail" class="col-sm-2 control-label">รายละเอียด</label>
		<div class="col-sm-10">
			<textarea name="detail" class="form-control" rows="15"></textarea>
		</div>
	</div>
</div>
