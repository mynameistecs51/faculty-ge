<input type="hidden" name="link_id" value="<?php echo $linkDetail['link_id']; ?>">
<div class="row"  >
	<div class="form-group col-sm-12">
		<label for="linkName" class="col-sm-2 control-label"> Link Name </label>
		<div class="col-sm-10">
			<input type="text" name='linkName' class="form-control " id="linkName" autofocus="" required  oninvalid="this.setCustomValidity('ชื่อแทน Link ')" oninput="setCustomValidity('')" value="<?php echo $linkDetail['link_name']; ?>">
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label for="linkUrl" class="col-sm-2 control-label">Link Url</label>
		<div class="col-sm-10">
			<input type="text" name='linkUrl' class="form-control " id="linkUrl" value="<?php echo $linkDetail['link_url']; ?>">
		</div>
	</div>
</div>
