 <!DOCTYPE html>
 <html>
 <head>

 </head>
 <body>

 	<div class="row">

 		<div class="form-group col-sm-6">
 			<label for="input_title" class="col-sm-2 control-label">หัวข้อกิจกรรม </label>
 			<div class="col-sm-10">
 				<input type="text" class="form-control" id="input_title" name="input_title" value=""> <br/>
 			</div>
 			<label for="input_detail" class="col-sm-2 control-label">รายละเอียด </label>
 			<div class="col-sm-10">
 				<textarea class="form-control" rows="6" cols="50" id="input_detail" name="input_detail" ></textarea>
 			</div>
 		</div>
 		<div class="form-group col-xs-6">
 			<label for="input_picture" class="col-sm-2 control-label">รูปภาพ   </label>
 			<div class="col-sm-8">
 				<img id="show_pic" name="show_pic" src="<?php echo base_url().'assets/images/no-image.jpg';?>" alt=""  /><br/><br/>
 				<input type="file" id="images" class="form-control" name="images[]" size="20" multiple  />

 			</div>
 		</div>

 	</div>
 	<script type="text/javascript">
 		$(function(){
 			saveData();
 		});

 		function saveData()
 		{
 			$('form#form').on('submit', function (e) {
 				if (e.isDefaultPrevented()) {
 					alert("ผิดพลาด : กรุณาตรวจสอบข้อมูลให้ถูกต้อง !");
              // handle the invalid form...
            } else {
              // everything looks good!
              e.preventDefault();
             // var form = $('#form').serialize();
             $.ajax(
             {
             	url: '<?php echo base_url().$controller."/saveadd/"; ?>',
             	type: 'POST',
	                data: {title: $('#input_title').val(), detail: $('#input_detail').val(), picture: $('#images').attr('files'),}, //your form datas to post
	                cache: false,
	                success: function(rs)
	                {
	                	// $('.modal').modal('hide');
	                	// location.reload();
	                	// alert("#บันทึกข้อมูล เรียบร้อย !");
	                	console.log(rs);
	                },
	                error: function()
	                {
	                	alert("#เกิดข้อผิดพลาด");
	                }
	              });
           }
         });
 		}

 	</script>

 </body>
 </html>