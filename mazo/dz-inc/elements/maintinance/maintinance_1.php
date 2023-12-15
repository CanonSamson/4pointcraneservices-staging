<?php 	
	global $mazo_option;
	extract($mazo_option);
	
	$maintenance_title  = !empty($maintenance_title)?$maintenance_title:esc_html__('Site Is Down', 'mazo').' <br/>'.esc_html__('For Maintenance', 'mazo');
	$maintenance_desc  = !empty($maintenance_desc)?$maintenance_desc:esc_html__('This is the Technical Problems Page.', 'mazo').' <br/>'.esc_html__('Or any other page.', 'mazo');
	$allowed_html_tag = mazo_allowed_html_tag();
?>
<div class="under-construct" <?php if(!empty($maintenance_bg)){ ?> style="background-image:url(<?php echo esc_url($maintenance_bg); ?>);  background-repeat:no-repeat; background-size:cover; background-position:bottom;" <?php } ?>>
	<div class="inner-box">
		
		<div class="logo-header">
			<?php do_action( 'mazo_get_logo','site_logo'); ?>
		</div>	
		<div class="dz-content">
			<?php if(!empty($maintenance_title)){ ?>
				<h2 class="dz-title">
					<?php echo wp_kses($maintenance_title,$allowed_html_tag); ?>
				</h2>
			<?php } ?>
			
			<?php if(!empty($maintenance_desc)){ ?>
				<p>
					<?php echo wp_kses($maintenance_desc,$allowed_html_tag); ?> 
				</p>
			<?php } ?>
		</div>
	</div>
</div>	