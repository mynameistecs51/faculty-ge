
<!-- <div class="container" > -->
<div class="row">
	<input type="hidden" name="id_fund" value="<?php echo $rowFund['fund_id']; ?>" >
	<div class="form-group col-sm-12">
		<label for="title" class="col-sm-2 control-label">Title/หัวข้อ </label>
		<div class="col-sm-10">
			<input type="text" name='title' class="form-control " id="title" value="<?php echo $rowFund['fund_title'] ?>">
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="source" class="col-sm-2 control-label">ที่มาของทุน</label>
		<div class="col-sm-10">
			<input type="text" name='source' class="form-control " id="source" value="<?php echo $rowFund['fund_source'] ?>">
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="detail" class="col-sm-2 control-label">รายละเอียด</label>
		<div class="col-sm-10">
			<textarea name="detail" class="form-control" rows="15"><?php echo $rowFund['fund_detail'];?></textarea>
		</div>
	</div>
</div>
