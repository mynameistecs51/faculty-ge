<!-- <div class="container" > -->
<div class="row"  >
	<!-- <div class='col-sm-12'  > -->
	<!-- <form class="form-horizontal" action=""  id="form" method="post" enctype="multipart/form-data"> -->
	<?php //echo form_open_multipart('Document/createDoc','class="form-horizontal"');?>
	<div class="form-group col-sm-12">
		<label for="name" class="col-sm-2 control-label">ชื่อ </label>
		<div class="col-sm-4">
			<input type="text" name='name' class="form-control " id="name" placeholder="ขยัน" autofocus="" required  oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ')" oninput="setCustomValidity('')">
		</div>
		<label for="lastname" class="col-sm-1 control-label">นามสกุล </label>
		<div class="col-sm-4">
			<input type="text" name='lastname' class="form-control " id="lastname" placeholder="ทำวิจัย" required  oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ')" oninput="setCustomValidity('')">
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="moneySupport" class="col-sm-2 control-label">รับทุนจาก</label>
		<div class="col-sm-4">
			<input type="text" name="moneySupport" id="moneySupport" class="form-control">
		</div>
		<label for="amount" class="col-sm-1 control-label">จำนวน</label>
		<div class="col-sm-4">
			<div class="input-group col-sm-12">
			<input type="number" class="form-control" name='amount' id="amount" aria-describedby="basic-addon2">
				<div class="input-group-addon">บาท</div>
			</div>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="publicationWhere" class="col-sm-2 control-label">ได้รับการตีพิมพ์ที่</label>
		<div class="col-sm-8">
			<input type="text" name="publicationWhere" id="publicationWhere" class="form-control">
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="researchName" class="col-sm-2 control-label">ชื่องานวิจัย</label>
		 <div class="col-sm-8">
			<textarea class="form-control"  rows="3" id="researchName" name="researchName"></textarea>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="abstract" class="col-sm-2 control-label">คำจำกัดความ</label>
		<div class="col-sm-8">
			<textarea class="form-control"  rows="3" id="abstract" name="abstract"></textarea>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="Outline" class="col-sm-2 control-label">เค้าโครง</label>
		<div class="col-sm-8">
			<input type="file" name="Outline" class="form-control" id="Outline" placeholder="Outline" aria-describedby="Outline">
			<span id="Outline" class="text-danger"> อัพโหลดไฟล์ .pdf </span>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="Progress" class="col-sm-2 control-label">3 บท(ความก้าวหน้า)</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="Progress" name="Progress" placeholder="Progress">
			<span id="Progress" class="text-danger"> อัพโหลดไฟล์ .pdf </span>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="Success" class="col-sm-2 control-label">5 บท(รูปเล่ม)</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="Success" name="Success" placeholder="Success">
			<span id="Success" class="text-danger"> อัพโหลดไฟล์ .pdf </span>
		</div>
	</div>
		<!-- <div class="form-group col-sm-12">
			<div class="col-sm-12"><br><br></div>
		</div> -->
		<!-- <div class="form-group col-sm-12">
			<div class="modal-footer col-sm-12" style="text-align:center; background:#A9F5F2;width: 100%;">
				<button type="submit" id="save" class="btn btn-success " style="width: 120px;">
					<span class="glyphicon glyphicon-floppy-saved"> บันทึก</span>
				</button>
				<button type="reset" class="btn btn-warning" style="width: 120px;">
					<span class="glyphicon glyphicon-floppy-remove"> ยกเลิก</span>
				</button>
			</div>
		</div> -->
		<!-- </form> -->
		<?php //echo form_close(); ?>
		<!-- </div> -->
	</div>
<!-- </div> -->