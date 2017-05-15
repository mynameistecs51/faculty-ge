<?php //echo $header; ?>
<!-- <div class="container" > -->
<div class="row"  >

	<script type="text/javascript">
		$(document).ready(function() {

			add();

			btn_delete();
		});

		function count_btnDelete() {
			for (var i = 0; i < $('.plus').length ;i++){

				console.log(i);
			}
		}

		function add(num) {
			$(".btn_plus").click(function(){
				var html = "";
				html+='<div id="rowAdd'+num+'">';
				html+= '<div class="form-group col-sm-12">';
				html+= '	<label for="name" class="col-sm-2 control-label">ชื่อนักวิจัยร่วม </label>';
				html+= '	<div class="col-sm-4">';
				html+= '		<input type="text" name="name" class="form-control " id="name" placeholder="ขยัน" autofocus="" required oninvalid="this.setCustomValidity('+"กรุณากรอกข้อมูล"+')" oninput="setCustomValidity('+""+')" >';
				html+= '	</div>';
				html+= '	<label for="lastname" class="col-sm-1 control-label">นามสกุล </label>';
				html+= '	<div class="col-sm-4">';
				html+= '		<input type="text" name="lastname" class="form-control " id="lastname" placeholder="ทำวิจัย" required  ">';
				html+= '	</div>';
				html+= '	<div class="col-sm-1">';
				html+= '		<button type="button" class="btn btn-danger delete" id="delete'+num+'" title="เพิ่มนักวิจัย">';
				html+= '			<i class="fa fa-minus"></i>';
				html+= '		</button>';
				html+= '	</div>';
				html+= '</div>';
				$('.show_add').append(html);
			});
			for(var i =0 ; i < $('.plus').length ; i++){
				console.log(i);
			}
		}
		function btn_delete() {
			$('.delete').click(function(){
				$(this).remove();
			});
		}
	</script>
	<div class="form-group col-sm-12">
		<label for="name" class="col-sm-2 control-label">ชื่อนักวิจัย </label>
		<div class="col-sm-4">
			<input type="text" name='name' class="form-control " id="name" placeholder="ขยัน" autofocus="" required  oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ')" oninput="setCustomValidity('')">
		</div>
		<label for="lastname" class="col-sm-1 control-label">นามสกุล </label>
		<div class="col-sm-4">
			<input type="text" name='lastname' class="form-control " id="lastname" placeholder="ทำวิจัย" required  oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ')" oninput="setCustomValidity('')">
		</div>
		<div class="col-sm-1">
			<button type="button" class="btn btn-warning btn_plus" id="plus0" title="เพิ่มนักวิจัย">
				<i class="fa fa-plus"></i>
			</button>
		</div>
	</div>
	<div class="show_add">
		<!-- show data button plus click -->
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
			<input type="file" name="Outline" class="form-control" id="Outline" placeholder="Outline" aria-describedby="Outline" required>
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

</div>
<!-- </div> -->
<?php //echo $footer; ?>