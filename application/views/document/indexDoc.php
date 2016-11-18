<?php echo $header; ?>
<style type="text/css">
	.form_input{
		width:100%;
		/*border: 1px solid;*/
		margin-top:0px;
		/*margin-left:1%;*/
	}
	.form_input p{
		width:100%;
		text-align:left;
		margin:5px;
		color:#6E6E6E;
		/*color:#208ae6;*/
	}
</style>
<div class="row">
	<div class="col-sm-12">
		<div class="row form_input" style="text-align:left; margin-bottom:20px">
			<div class="col-md-3" >
				<p>สำนักงาน/สาขา</p>
				<!-- <p class="required">*</p> -->
				<select name="id_mbranch" class ="form-control" required>
					<option value="">--เลือก--</option>
					<?php
					foreach ($listMbranch as $Mbranch)
					{
						echo "<option value='".$Mbranch->id_mbranch."'>".$Mbranch->mbranch_name."</option>";
					}
					?>
				</select>
			</div>
			<div class="col-md-3" >
				<p>เลขประจำตัวประชาชน</p>
				<!-- <p class="required">*</p> -->
				<input type="text" class="form-control" name="idcard_num"  required>
			</div>
			<div class="col-md-3" >
				<p>คำนำหน้าชื่อ</p>
				<select name="id_mmember_tit" class ="form-control" required>
					<option value="">--เลือก--</option>
					<option value="1"> นาย </option>
					<option value="2"> นาง </option>
					<option value="3"> นางสาว </option>
				</select>
			</div>
			<div class="col-md-3" >
				<p>ชื่อ </p>
				<!-- <p class="required">*</p> -->
				<input type="text" class="form-control"  name="firstname" placeholder="ชื่อ" required>
			</div>
			<div class="col-md-3" >
				<p>นามสกุล </p>
				<!-- <p class="required">*</p> -->
				<input type="text" class="form-control"  name="lastname" placeholder="สกุล" required>
			</div>
			<div class="col-md-3" >
				<p>วันเกิด</p>
				<p class="required"></p>
				<input type="text" class="form-control" name="birthdate" id="birthdate"  >
			</div>
			<div class="col-md-3" >
				<p>เลขใบอนุญาตขับขี่</p>
				<input type="text" class="form-control" name="drv_lcn_num" >
			</div>
			<div class="col-md-3" >
				<p>อีเมลล์ <b ID="valid_email"></b></p>
				<!-- <p class="required">*</p> -->
				<input type="email" class="form-control" name="email" ID="email"  required>
			</div>
			<div class="col-md-3" >
				<p>โทรศัพท์</p>
				<input type="text" class="form-control" name="telephone"  >
			</div>
			<div class="col-md-3" >
				<p>มือถือ <b ID="valid_mobile"></b></p>
				<!-- <p class="required">*</p> -->
				<input type="text" class="form-control" ID="mobile" name="mobile" required>
			</div>
			<div class="col-md-3" >
				<p>แฟกซ์</p>
				<input type="text" class="form-control" name="fax" >
			</div>
			<div class="col-md-3" >
				<p>ชื่อเข้าใช้ระบบ <b ID="valid"></b></p>
				<!-- <p class="required">*</p> -->
				<input type="text" class="form-control" name="username" ID="user" required>
			</div>
			<div class="col-md-3" >
				<p>รหัสผ่าน</p>
				<!-- <p class="required">*</p> -->
				<input type="password" class="form-control" name="password" id="userpassword" required>
			</div>
			<div class="col-md-3" >
				<p>ยืนยันรหัสผ่าน</p>
				<!-- <p class="required">*</p> -->
				<input type="password" class="form-control" name="con_pass" id="confirmpw" required>
			</div>
			<div class="col-md-6" >
				<p>ที่อยู่ (ตามสำเนาทะเบียนบ้าน)</p>
				<!-- <p class="required">*</p> -->
				<textarea  class="form-control" rows='3' name="adr_line1" required></textarea>
			</div>
			<div class="col-md-6" >
				<p>ที่อยู่ (ปัจจุบัน)</p>
				<!-- <p class="required">*</p> -->
				<textarea  class="form-control" rows='3' name="adr_line2" ></textarea>
			</div>
			<div class="col-md-12" >
				<p>หมายเหตุ</p>
				<textarea  class="form-control" rows='3' name="comment"></textarea>
			</div>
		</div>
	</div>
	<?php echo $footer; ?>