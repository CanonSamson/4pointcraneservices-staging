<?php
global $mazo_option;
extract($mazo_option);
$theme_options = mazo_get_theme_option();
$footer_template_6_info_field_1_text = mazo_set($theme_options,'footer_template_6_info_field_1_text');
$footer_template_6_info_field_1_content = mazo_set($theme_options,'footer_template_6_info_field_1_content');
$footer_template_6_info_field_2_text = mazo_set($theme_options,'footer_template_6_info_field_2_text');
$footer_template_6_info_field_2_content = mazo_set($theme_options,'footer_template_6_info_field_2_content');
$footer_template_6_info_field_3_text = mazo_set($theme_options,'footer_template_6_info_field_3_text');
$footer_template_6_info_field_3_content = mazo_set($theme_options,'footer_template_6_info_field_3_content');

$allowed_html_tag = mazo_allowed_html_tag();
?>
<!-- Footer -->
<footer class="site-footer style-5">
	<div class="footer-top bg-white">
		<div class="container">
			<div class="row d-flex align-items-center">
				<?php if(!empty($footer_template_6_info_field_1_text)) { ?>
					<div class="col-xl-3 col-12 col-lg-3 col-md-6 col-sm-6">
						<div class="widget">
							<div class="widget-title">
								<h6 class="title">
									<?php echo wp_kses($footer_template_6_info_field_1_text,'string'); ?>
								</h6>
							</div>	
							<ul>
								<li>
									<?php echo wp_kses($footer_template_6_info_field_1_content, $allowed_html_tag); ?>
								</li>
							</ul>
						</div>
					</div>
				<?php } if(!empty($footer_template_6_info_field_2_text)) { ?>
					<div class="col-xl-3 col-12 col-lg-3 col-md-6 col-sm-6">
						<div class="widget">
							<div class="widget-title">
								<h6 class="title">
									<?php echo wp_kses($footer_template_6_info_field_2_text,'string'); ?>
								</h6>
							</div>
							<ul>
								<li>
									<?php echo wp_kses($footer_template_6_info_field_2_content, $allowed_html_tag); ?>
								</li>
							</ul>
						</div>
					</div>
				<?php } if(!empty($footer_template_6_info_field_3_text)) { ?>
					<div class="col-xl-4 col-12 col-lg-3 col-md-6 col-sm-6">
						<div class="widget">
							<div class="widget-title">
								<h6 class="title">
									<?php echo wp_kses($footer_template_6_info_field_3_text,'string'); ?>
								</h6>
							</div>
							<ul>
								<li>
									<?php echo wp_kses($footer_template_6_info_field_3_content, $allowed_html_tag); ?>
								</li>
							</ul>
						</div>
					</div>
				<?php } if(!empty($footer_button_1_text)) { ?>
					<div class="col-xl-2 col-12 col-lg-3 col-md-6 col-sm-6">
						<div class="widget">
							<a href="<?php echo esc_url($footer_button_1_url); ?>" target="<?php echo esc_attr($footer_button_1_target); ?>" class="btn btn-primary"><?php echo esc_html($footer_button_1_text); ?></a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</footer>
<!-- Our Portfolio END -->