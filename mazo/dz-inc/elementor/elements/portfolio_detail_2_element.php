<?php $show_social_icon = mazo_get_opt('show_social_icon'); 
	$allowed_html_tag = mazo_allowed_html_tag();
?>
<!-- Portfolio Details -->
<section class="section-full content-inner port-detail2">
	<div class="container">
		<div class="row">
			<?php if (!empty($portfolio_detail_2_element_image['url'])){
				$image_url = $portfolio_detail_2_element_image['url'];
			?>
				<div class="col-lg-8 m-b30">
					<div class="dz-media" <?php if(!empty($image_url)){ ?> style="background-image: url(<?php echo esc_url($image_url); ?>);" <?php } ?>></div>
				</div>
			<?php } ?>
				
			<div class="col-lg-4 m-b30">
				<div class="dz-port-meta bg-dark" <?php if(!empty($portfolio_detail_2_element_client_bg_img['url'])){ ?> style="background-image: url(<?php echo esc_url($portfolio_detail_2_element_client_bg_img['url']); ?>);" <?php } ?>>	
					<div class="row align-items-center">
						<?php if(!empty($portfolio_detail_2_element_client_title)){ ?>
							<div class="col-lg-12 col-sm-6">
								<div class="meta-info">
									<h4 class="text-white dz-title m-b5">
										<?php echo esc_html__('Project Category','mazo'); ?>
									</h4>
									<span class="text-white sub-title">
										<?php echo wp_kses($portfolio_detail_2_element_client_title,'string'); ?>
									</span>
								</div>
							</div>
						<?php } ?>
						
						<?php if(!empty($portfolio_detail_2_element_client_company)){ ?>
							<div class="col-lg-12 col-sm-6">
								<div class="meta-info">
									<h4 class="text-white dz-title m-b5">
										<?php echo esc_html__('Client Company','mazo'); ?>
									</h4>
									<span class="text-white sub-title">
										<?php echo wp_kses($portfolio_detail_2_element_client_company,'string'); ?>
									</span>
								</div>
							</div>
						<?php } ?>	
							
						<?php if(!empty($portfolio_detail_2_element_client_date)){ ?>
							<div class="col-lg-12 col-sm-6">
								<div class="meta-info">
									<h4 class="text-white dz-title m-b5">
										<?php echo esc_html__('Project Date','mazo'); ?>
									</h4>
									<span class="text-white sub-title">
										<?php echo wp_kses($portfolio_detail_2_element_client_date,'string'); ?>
									</span>
								</div>
							</div>
						<?php } ?>
						
						<?php if($portfolio_detail_2_element_client_social_icon=='yes' && !empty($show_social_icon)){ ?>
							<div class="col-lg-12 col-sm-6">
								<div class="meta-info">
									<ul class="social-list style-1">
										<?php echo mazo_get_social_icons('header') ;?>
									</ul>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="dz-content m-b40">
					<?php if(!empty($portfolio_detail_2_element_title)){ ?>
						<h2 class="title m-b15">
							<?php echo wp_kses($portfolio_detail_2_element_title,'string'); ?>
						</h2>
					<?php } ?>
					
					<?php if(!empty($portfolio_detail_2_element_description)){ ?>
						<p>
							<?php echo wp_kses($portfolio_detail_2_element_description,$allowed_html_tag); ?>
						</p>
					<?php } ?>
				</div>
			</div>
			
			<?php if (!empty($portfolio_detail_2_element_client_image['url'])){
						$image_url = $portfolio_detail_2_element_client_image['url'];
				?>
				<div class="col-lg-12">
					<div class="dz-media m-b30" <?php if(!empty($image_url)){ ?> style="background-image: url(<?php echo esc_url($image_url); ?>);" <?php } ?>></div>
				</div>
			<?php } ?>
			
			
			<?php if(!empty($portfolio_detail_2_element_description2)){ ?>
				<div class="col-lg-12 m-b30">
					<p>
						<?php echo wp_kses($portfolio_detail_2_element_description2,$allowed_html_tag); ?>
					</p>
				</div>
			<?php } ?>
		</div>
	</div>
</section>