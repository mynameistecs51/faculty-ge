<!--  <!DOCTYPE html>
 <html>
 <head>

 </head>
 <body> -->

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
 				<input type="file" id="images[]" class="form-control" name="images[]" size="20" multiple  />

 			</div>
 		</div>

 	</div>
 	<script type="text/javascript">
 		$(function(){
 			saveData();
 		});

 		function saveData()
 		{
 			$("#form").validate({
 				submitHandler: function (form){

 					$('#form button#save').prop("disabled",true);
 					startloading();


 					var dataForm = new FormData();
 					for (var i = 0, len = window.storedFiles_files.length; i < len; i++) {
 						dataForm.append('images[]', window.storedFiles_files[i]);
 					}

 					var form = $('#form').serializeArray();
 					$.each(form,function(key,input){
 						dataForm.append(input.name,input.value);
 					});

 					$.ajax(
 					{
 						type: 'POST',
 						url: '<?php echo base_url().$controller."/saveadd/"; ?>',
 						data: dataForm,
 						contentType: false,
 						processData: false,
 						success: function(rs)
 						{
 							// console.log(rs);
 							stoploading();
 						},
 						error: function()
 						{
 							bootbox.alert("#เกิดข้อผิดพลาด");
 						}
 					});
 				}
 			});
 		}

 	</script>
<!--
 </body>
 </html> -->