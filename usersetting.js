$(function() {
	showDatagroup();
	reload();
});

function showDatagroup() {
	$("#group").change(function() {
		if (this.value == '') {
			$('.manageMenu').hide();
			$('input[name="menuID[]"]').removeAttr('checked');
		} else {
			$('.manageMenu').show();
			$.ajax({
				type: "POST",
				url: base_url+layout+'getDataSelect',
				data: {idSelect: this.value,status: '0'},
				// dataType: 'TEXT',
				success: function(rs){
					console.log(rs);
					$('input[type="checkbox"]').removeAttr('checked');

					$.each( rs,function( key, row )
					{
						$('#menu'+row.menuID).attr('checked','checked');
						$('#menu'+row.menuID).change(function(){
							if($(this).prop('checked') == '' ){
								$.ajax({
									type: "POST",
									url: base_url+layout+'updateRole',
									data: {idSelect: $('#menu'+row.menuID).prop('value'),status:'OFF',group: $('#group').val()},
									dataType: 'json',
									success:function(dataRlt){
										$.each(dataRlt, function(i,k){
											console.log(i+"="+k);
										});
									},
									erro:function(){
										console.log("error");
									}
								});
							}else{
								$.ajax({
									type: "POST",
									url: base_url+layout+'updateRole',
									data: {idSelect: $('#menu'+row.menuID).prop('value'),status:'ON',group: $('#group').val()},
									dataType: 'json',
									success:function(dataRlt){
										$.each(dataRlt, function(i,k){
											console.log(i+"="+k);
										});
									},
									erro:function(){
										console.log("error");
									}
								});
							}
						});
					});
				},
				error: function(err) {
					alert("#เกิดข้อผิดพลาด");
				}
			});
		}
	});
}

function reload() {
	$('.reset').click(function(){
		location.reload();
	});
}
