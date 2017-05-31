<?php //echo $header; ?>
<!-- <div class="container" > -->
<div class="row"  >
	<input type="hidden" name="doc_id" value="<?php echo $dataDoc['doc_id']; ?>">
	<div class="form-group col-sm-12">
		<label for="name" class="col-sm-2 control-label">ชื่อนักวิจัย </label>
		<div class="col-sm-4">
			<input type="text" name='name' class="form-control " id="name" placeholder="ขยัน" autofocus="" required  oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ')" oninput="setCustomValidity('')" value="<?php echo $dataDoc['doc_name']; ?>">
		</div>
		<label for="lastname" class="col-sm-1 control-label">นามสกุล </label>
		<div class="col-sm-4">
			<input type="text" name='lastname' class="form-control " id="lastname" placeholder="ทำวิจัย" required  oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ')" oninput="setCustomValidity('')" value="<?php echo $dataDoc['doc_lastname']; ?>">
		</div>
		<!-- <div class="col-sm-1">
			<button type="button" class="btn btn-warning btn_plus" id="plus0" title="เพิ่มนักวิจัย">
				<i class="fa fa-plus"></i>
			</button>
		</div> -->
	</div>
	<div class="show_add">
		<!-- show data button plus click -->
	</div>
	<div class="form-group col-sm-12">
		<label for="moneySupport" class="col-sm-2 control-label">รับทุนจาก</label>
		<div class="col-sm-4">
			<input type="text" name="moneySupport" id="moneySupport" class="form-control" value="<?php echo $dataDoc['doc_moneySupport']; ?>">
		</div>
		<label for="amount" class="col-sm-1 control-label">จำนวน</label>
		<div class="col-sm-4">
			<div class="input-group col-sm-12">
				<input type="number" class="form-control" name='amount' id="amount" aria-describedby="basic-addon2" value="<?php echo $dataDoc['doc_amount']; ?>">
				<div class="input-group-addon">บาท</div>
			</div>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="publicationWhere" class="col-sm-2 control-label">ได้รับการตีพิมพ์ที่</label>
		<div class="col-sm-8">
			<input type="text" name="publicationWhere" id="publicationWhere" class="form-control" value="<?php echo $dataDoc['doc_publicationWhere']; ?>">
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="researchName" class="col-sm-2 control-label">ชื่องานวิจัย</label>
		 <div class="col-sm-8">
			<textarea class="form-control"  rows="3" id="researchName" name="researchName"><?php echo $dataDoc['doc_researchName']; ?></textarea>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="abstract" class="col-sm-2 control-label">คำจำกัดความ</label>
		<div class="col-sm-8">
			<textarea class="form-control"  rows="3" id="abstract" name="abstract"><?php echo $dataDoc['doc_abstract']; ?></textarea>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="Outline" class="col-sm-2 control-label">อัพเดท เค้าโครง</label>
		<?php	echo $outline = ($dataDoc['doc_outline'] == '')?'':'<span class="fileoutline pull-right col-sm-2" align="center" ><i class="fa fa-file-pdf-o fa-2x " aria-hidden="true" style="color:red;" title="เปิดไฟล์"></i>	<br>'.$dataDoc["doc_outline"].'</span>';?>
		<div class="col-sm-8">
			<input type="file" name="Outline" class="form-control" id="Outline" placeholder="Outline" aria-describedby="Outline" >
			<span id="Outline" class="text-danger"> อัพโหลดไฟล์ .pdf </span>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="Progress" class="col-sm-2 control-label">อัพเดท 3 บท(ความก้าวหน้า)</label>
		<?php	echo $progress = ($dataDoc['doc_progress'] == '')?'':'<span class="fileprogress pull-right col-sm-2" align="center" ><i class="fa fa-file-pdf-o fa-2x " aria-hidden="true" style="color:red;" title="เปิดไฟล์"></i>	<br>'.$dataDoc["doc_progress"].'</span>';?>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="Progress" name="Progress" placeholder="Progress">
			<span id="Progress" class="text-danger"> อัพโหลดไฟล์ .pdf </span>
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="Success" class="col-sm-2 control-label">อัพเดท 5 บท(รูปเล่ม)</label>
		<?php	echo $filesuccess = ($dataDoc['doc_filesuccess'] == '')?'':'<span class="filesuccess pull-right col-sm-2" align="center" ><i class="fa fa-file-pdf-o fa-2x " aria-hidden="true" style="color:red;" title="เปิดไฟล์"></i>	<br>'.$dataDoc["doc_filesuccess"].'</span>';?>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="Success" name="Success" placeholder="Success">
			<span id="Success" class="text-danger"> อัพโหลดไฟล์ .pdf </span>
		</div>
	</div>

</div>
<!-- </div> -->
<?php //echo $footer; ?>
<script type="text/javascript">
	$(function(){
		openfileOutline();
		openfileProgress();
		openfileSuccess();
	});

	function openfileOutline(){
		$('.fileoutline').click(function(){
			window.open("<?php echo base_url('index.php/Document/PDF/'.$dataDoc['doc_outline']); ?>",'_blank');
		});
	}

	function openfileProgress() {
		$('.fileprogress').click(function(){
			window.open("<?php echo base_url('index.php/Document/PDF/'.$dataDoc['doc_progress']); ?>",'_blank');
		});
	}

	function openfileSuccess() {
		$('.filesuccess').click(function(){
			window.open("<?php echo base_url('index.php/Document/PDF/'.$dataDoc['doc_filesuccess']); ?>",'_blank');
		});
	}

	$(function(){
		$(".btn_plus").click(function(){
			var num = $('.rowAdd').length+1;
			var html ='<div class="rowAdd" id="rowAdd'+num+'">';
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
			btn_delete(num);
		});
	});

	function btn_delete(num) {
		$('#delete'+num).click(function(){
			$('#rowAdd'+num).remove();
		});
	}
</script>