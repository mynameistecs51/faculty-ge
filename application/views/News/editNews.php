
<!-- <div class="container" > -->
<div class="row"  >
	<?php foreach ($news_detail as $rowNews): ?>
		<input type="hidden" name="id_news" value="<?php echo $rowNews['id_news'];?>" >
		<div class="form-group col-sm-12">
			<label for="title" class="col-sm-2 control-label">Title/หัวข้อ </label>
			<div class="col-sm-10">
				<input type="text" name='title' class="form-control " id="title" placeholder="เพิ่มหัวข้อที่เกี่ยวข้องกับข่าว" autofocus="" required  oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ')" oninput="setCustomValidity('')" value="<?php echo $rowNews['news_title']; ?>">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="detail" class="col-sm-2 control-label">รายละเอียด</label>
			<div class="col-sm-10">
				<textarea name="detail" class="form-control" rows="15"><?php echo  str_replace(array("<br>"," "),array('', "&nbsp;"),$rowNews['news_detail']); ?></textarea>
			</div>
		</div>

	<?php endforeach ?>
</div>
