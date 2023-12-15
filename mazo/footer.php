<?php 
	global $mazo_option;
	extract($mazo_option);

?>
	<!-- subscribe end -->
	
	</div> <!-- End Content -->

	<!-- main-content / page-content End -->
	<?php	
		if(isWebsiteReadyForVisitor($website_status)){
			if($footer_on) {
				if($footer_style == 'footer_template_1') {
					get_template_part('dz-inc/elements/footer/footer_1');
				}else if($footer_style == 'footer_template_2') {
					get_template_part('dz-inc/elements/footer/footer_2');
				}else if($footer_style == 'footer_template_3') {
					get_template_part('dz-inc/elements/footer/footer_3');
				}else if($footer_style == 'footer_template_4') {
					get_template_part('dz-inc/elements/footer/footer_4');
				}else if($footer_style == 'footer_template_5'){
					get_template_part('dz-inc/elements/footer/footer_5');
				}else if($footer_style == 'footer_template_6'){
					get_template_part('dz-inc/elements/footer/footer_6');
				}else if($footer_style == 'footer_template_7'){
					get_template_part('dz-inc/elements/footer/footer_7');
				}else if($footer_style == 'footer_template_8'){
					get_template_part('dz-inc/elements/footer/footer_8');
				}else if($footer_style == 'footer_template_9'){
					get_template_part('dz-inc/elements/footer/footer_9');
				}else if($footer_style == 'footer_template_10'){
					get_template_part('dz-inc/elements/footer/footer_10');
				}
				
			}
		}
	?>
		
		<button class="scroltop fa fa-arrow-up" ></button>
	</div>
	<!-- page-wraper End -->
	<?php wp_footer(); ?>
	</body>
</html>