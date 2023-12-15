<?php 
$section_class = '';
$section_class .= !empty($newsletter_section_1_element_section_padding)?' '.$newsletter_section_1_element_section_padding:'';
?>


<!-- subscrible bx -->
<section class="<?php echo esc_attr($section_class); ?>">
	<div class="container">
		<div class="row ft-subscribe-wrapper justify-content-center text-center">
			<div class="col-xl-8">
				<?php if(!empty($newsletter_section_1_element_title)){ ?>
					<div class="section-head text-center style-3">
						<h2 class="title">
							<?php echo wp_kses($newsletter_section_1_element_title,'string'); ?>
						</h2>
				
						<?php if(!empty($newsletter_section_1_element_description)){ ?>
							<p>
								<?php echo wp_kses($newsletter_section_1_element_description,'string'); ?>
							</p>
						<?php } ?>
					</div> 
				<?php } ?>
				<div class="ft-subscribe style-2">
					<form class="dzSubscribe dz-subscription" action="#" method="post">					
						<div class="input-group">
							<input name="dzEmail" required="required"  class="form-control aos-item"  data-aos="fade-in" data-aos-duration="250" data-aos-delay="100" placeholder="<?php echo esc_attr__('Enter Your Email Address...','mazo'); ?>" type="email">	
							<button name="submit" value="Submit" type="submit" class="btn btn-primary aos-item"  data-aos="fade-right" data-aos-duration="750" data-aos-delay="100">
								<?php echo esc_html__('Subscribe Now','mazo'); ?> <i class="m-l5 las la-plus"></i>								
							</button>
						</div>
						<div class="dzSubscribeMsg dz-subscription-msg"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>