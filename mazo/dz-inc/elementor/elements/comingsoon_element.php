<?php 
global $mazo_option;
extract($mazo_option);

$comingsoon_launch_date = mazo_get_opt('comingsoon_launch_date');
$social_link_target = mazo_get_opt('social_link_target');
$date = '';
if(!empty($comingsoon_launch_date))
{
	$date = date("d F Y", strtotime($comingsoon_launch_date));
}
?>
<div class="dz-coming-soon style-4 wow fadeIn" data-wow-duration="0.80s" data-wow-delay="0.50s">
		<div class="sidenav-menu">
			<?php if(!empty($site_logo_icon)){ ?>
				<div class="logo">
					<a href="<?php echo esc_url(home_url('/')); ?>">
						<img src="<?php echo esc_url($site_logo_icon);?>" alt="<?php bloginfo('name');?>"/></a>
				</div>
			<?php } ?>
			
			<ul class="dz-social-icon">
				<?php 
					$social_arr = mazo_author_social_arr(); 
					foreach($social_arr as $social_key => $social)
					{
					
						$social_link = mazo_get_super_user_data($social_key);
							
						if(!empty($social_link))
						{
							echo '<li class="wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="1.0s"><a href="'.esc_url($social_link).'" target="'.$social_link_target.'" class="'.esc_attr($social['text']).'">'.esc_attr($social['text']).'</a></li>';
						}							
					}
					?>
			</ul>
		</div>
		<div class="clearfix dz-coming-bx">
			<div class="dz-content">
				<h2 class="dz-title ml2 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.5s">
					<span><?php echo wp_kses($comingsoon_page_title, $allowed_html_tags); ?></span>
				</h2>
				<div class="countdown" data-date="<?php echo esc_attr($date); ?>">
					<div class="date aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
						<span class="days time"></span>
						<span><?php echo esc_html__('Days', 'mazo'); ?></span>
					</div>
					<div class="date aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
						<span class="hours time"></span>
						<span><?php echo esc_html__('Hours', 'mazo'); ?></span>
					</div>
					<div class="date aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
						<span class="mins time"></span>
						<span><?php echo esc_html__('Minutes', 'mazo'); ?></span>
					</div>
					<div class="date aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000">
						<span class="secs time"></span>
						<span><?php echo esc_html__('Second', 'mazo'); ?></span>
					</div>
				</div>
				<div class="dz-coming-btn aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1200">
					<?php if(!empty($comingsoon_page_url)){ ?>
						<a href="<?php echo esc_url($comingsoon_page_url); ?>"  class="btn btn-primary m-r10 black">
							<?php echo esc_html__('GET IN TOUCH','mazo'); ?>
						</a>
					<?php } ?>
					
					<?php if(!empty($comingsoon_subscribe_on)){ ?>
						<a href="javascript:void();" data-bs-toggle="modal" data-bs-target="#SubscribeModal" class="btn btn-secondary">
							<?php echo esc_html__('SUBSCRIBE NOW','mazo'); ?>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php if(!empty($comingsoon_bg)){ ?>
			<div class="slider-box">
				<img src="<?php echo esc_url($comingsoon_bg); ?>" alt="<?php esc_attr__('Image','mazo'); ?>"/>
			</div>
		<?php } ?>
	</div>