<?php echo $header; ?>
<!-- <div class="container" > -->
	<!-- <div class="row"  > -->
		<div class='col-sm-12' >
			<form class="form-horizontal">
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