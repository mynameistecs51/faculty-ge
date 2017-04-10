<?php echo $header; ?>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo base_url().'assets/fancybox/jquery.fancybox.pack.js?v=2.1.5';?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fancybox/jquery.fancybox.css?v=2.1.5';?>" media="screen" />

<script type="text/javascript">
	$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			 $('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}

		tbody {
			max-width: 700px;
			margin: 0 auto;
		}
	</style>
	<div class="row">
		<div class="panel panel-info">
			<div class="panel-heading"><?php echo $listActivity['ac_title']; ?></div>
			<div class="panel-body">
				<?php echo $listActivity['ac_detail']; ?>
				<hr>

				<?php
				$pic_name = explode(',',$listActivity['ac_pict']);
				for($i=0;$i < count($pic_name) ; $i++){
					$showPicture = ($pic_name[0] == "")?'no-image.jpg': $pic_name[$i];
					echo '<div class="col-sm-6 col-md-3">';
					echo '<div class="thumbnail">';
					echo '<a class="fancybox" href="'.base_url().'assets/files_upload/'.$showPicture.'" data-fancybox-group="gallery" >';
					echo '<img src="'.base_url().'assets/files_upload/'.$showPicture.'" alt="">';
					echo '</a>';
					echo '</div>';
					echo '</div>';
				}
				?>
			</div>
		</div>

	</div>
	<?php echo $footer; ?>