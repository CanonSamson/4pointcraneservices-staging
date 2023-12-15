<?php 
$btn_link = $btn_text = $anchor_attribute = '';
if (!empty($call_to_action_1_element_link_title))
{
	$btn_link = !empty($call_to_action_1_element_link)?$call_to_action_1_element_link:'';
	$btn_text = !empty($call_to_action_1_element_link_title)?$call_to_action_1_element_link_title:'';	
	
	$anchor_attribute = mazo_elementor_get_anchor_attribute($btn_link);
}

if($call_to_action_1_element_style=='style_1'){
?>
	<!-- Call To Action -->
	<section class="claerfix" id="DZSupport1">
		<div class="container">
			<div class="bg-primary call-action">
				<div class="row align-items-center">
					<div class="col-md-7">
						<div class="section-head text-white style-1">
							<?php if(!empty($call_to_action_1_element_subtitle)){ ?>
								<h6 class="text-white sub-title">
									<?php echo wp_kses($call_to_action_1_element_subtitle,'string'); ?>
								</h6>
							<?php } ?>
							
							<?php if(!empty($call_to_action_1_element_title)){ ?>
								<h3 class="title m-b0">
									<?php echo wp_kses($call_to_action_1_element_title,'string'); ?>
								</h3>
							<?php } ?>
						</div>
					</div>
					<?php if(!empty($btn_text)) { ?>
						<div class="col-md-5 text-start text-md-end m-sm-t20">
							<a href="<?php echo esc_url($btn_link['url']); ?>" <?php echo esc_html($anchor_attribute); ?>  class="btn btn-secondary"><?php echo esc_html($btn_text); ?>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

<?php } else if($call_to_action_1_element_style=='style_2'){ ?>
	<section class="content-inner-2"  id="DZSupport2" <?php if(!empty($call_to_action_1_element_bg_img['url'])){ ?> style="background-image:url(<?php echo esc_url($call_to_action_1_element_bg_img['url']); ?>); background-position:right top; background-size:70%; background-repeat:no-repeat;" <?php } ?>>
		<div class="container">
			<div class="row">
				<?php if(!empty($call_to_action_1_element_title)){ ?>
					<div class="col-lg-6">
						<div class="section-head style-3">
							<h2 class="title">
								<?php echo wp_kses($call_to_action_1_element_title,'string'); ?>
							</h2>
						</div>
					</div>
				<?php } ?>
				<div class="col-lg-6">
					<?php if(!empty($call_to_action_1_element_subtitle)){ ?>
						<p>
							<?php echo wp_kses($call_to_action_1_element_subtitle,'string'); ?>
						</p>
					<?php } ?>
					
					<?php if(!empty($btn_text)) { ?>
						<a href="<?php echo esc_url($btn_link['url']); ?>" <?php echo esc_html($anchor_attribute); ?> class="btn btn-primary style-2">
							<?php echo esc_html($btn_text); ?> <i class="m-l5 las la-plus"></i>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
<?php } else { ?>
	<div class="section-full call-action bg-primary wow fadeIn" id="DZSupport3" data-wow-duration="2s" data-wow-delay="0.2s" <?php if(!empty($call_to_action_1_element_bg_img['url'])){ ?> style="background-image:url(<?php echo esc_url($call_to_action_1_element_bg_img['url']); ?>);" <?php } ?>>
		<div class="container">
			<div class="row align-items-center">
				<?php if(!empty($call_to_action_1_element_title) || !empty($call_to_action_1_element_subtitle)){ ?>
					<div class="col-lg-8 text-white text-lg-start text-center mb-lg-0 mb-4">
						<?php if(!empty($call_to_action_1_element_title)){ ?>
							<h2 class="title text-white">
								<?php echo wp_kses($call_to_action_1_element_title,'string'); ?>
							</h2>
						<?php } ?>
					
						<?php if(!empty($call_to_action_1_element_subtitle)){ ?>
							<p class="mb-0">
								<?php echo wp_kses($call_to_action_1_element_subtitle,'string'); ?>
							</p>
						<?php } ?>
					</div>
				<?php } ?>
				
				<?php if(!empty($btn_text)) { ?>
					<div class="col-lg-4 text-lg-end text-center">
						<a href="<?php echo esc_url($btn_link['url']); ?>" class="btn btn-secondary">
							<span><?php echo esc_html($btn_text); ?></span>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>