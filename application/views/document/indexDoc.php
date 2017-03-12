<?php echo $header; ?>
<!-- <div class="container" > -->
<!-- <div class="row"  > -->
<div class='col-sm-12'  >
	<form class="form-horizontal">
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">ชื่อ </label>
			<div class="col-sm-3">
				<input type="text" name='name' class="form-control " id="name" placeholder="ขยัน">
			</div>
			<label for="lastname" class="col-sm-1 control-label">นามสกุล </label>
			<div class="col-sm-3">
				<input type="text" name='lastname' class="form-control " id="lastname" placeholder="ทำวิจัย">
			</div>
		</div>
		<div class="form-group">
			<label for="toon" class="col-sm-2 control-label">รับทุนจาก</label>
			<div class="col-sm-3">
				<input type="text" name="toon" id="toon" class="form-control">
			</div>
			<label for="amount" class="col-sm-1 control-label">จำนวน</label>
			<div class="col-sm-3">
				<div class="input-group">
					<input type="number" class="form-control" name='amount' aria-describedby="basic-addon2">
					<span class="input-group-addon" id="basic-addon2">บาท</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="print" class="col-sm-2 control-label">ได้รับการตีพิมพ์ที่</label>
			<div class="col-sm-7">
				<input type="text" name="print" id="print" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="title" class="col-sm-2 control-label">ชื่องานวิจัย</label>
			 <div class="col-sm-8">
				<textarea class="form-control"  rows="3" id="title" name="title"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="subject" class="col-sm-2 control-label">คำจำกัดความ</label>
			<div class="col-sm-7">
				<textarea class="form-control"  rows="3" id="subject" name="subject"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="Outline" class="col-sm-2 control-label">เค้าโครง</label>
			<div class="col-sm-7">
				<input type="file" name="Outline" class="form-control" id="Outline" placeholder="Outline" aria-describedby="Outline">
				<span id="Outline" class="text-danger"> อัพโหลดไฟล์ .pdf </span>
			</div>
		</div>
		<div class="form-group">
			<label for="Progress" class="col-sm-2 control-label">3 บท(ความก้าวหน้า)</label>
			<div class="col-sm-7">
				<input type="file" class="form-control" id="Progress" placeholder="Progress">
				<span id="Progress" class="text-danger"> อัพโหลดไฟล์ .pdf </span>
			</div>
		</div>
		<div class="form-group">
			<label for="Success" class="col-sm-2 control-label">5 บท(รูปเล่ม)</label>
			<div class="col-sm-7">
				<input type="file" class="form-control" id="Success" placeholder="Success">
				<span id="Success" class="text-danger"> อัพโหลดไฟล์ .pdf </span>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12"><br><br></div>
		</div>
		<div class="form-group">
			<div class="modal-footer col-sm-12" style="text-align:center; background:#A9F5F2;width: 100%;">
				<button type="submit" id="save" class="btn btn-success " style="width: 120px;">
					<span class="glyphicon glyphicon-floppy-saved"> บันทึก</span>
				</button>
				<button type="reset" class="btn btn-warning" style="width: 120px;">
					<span class="glyphicon glyphicon-floppy-remove"> ยกเลิก</span>
				</button>
			</div>
		</div>
	</form>
</div>
<!-- </div> -->
<!-- </div> -->
<?php echo $footer; ?>