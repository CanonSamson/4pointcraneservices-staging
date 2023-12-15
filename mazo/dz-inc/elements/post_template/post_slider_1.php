<?php 
	global $mazo_option;
	extract($mazo_option);
	$category_on = mazo_get_opt('category_on',true);
	$date_on 	 = mazo_get_opt('date_on',true);
	$featured_img_on 	 = mazo_get_opt('featured_img_on',true); /* From Theme Options */
	
	$post_show_sidebar	= mazo_dzbase()->get_meta('post_show_sidebar');
	$post_sidebar_layout	= mazo_dzbase()->get_meta('post_sidebar_layout');
	$post_sidebar			= mazo_dzbase()->get_meta('post_sidebar');
	
	$page_options = mazo_dzbase()->get_meta();
	$post_type_gallery1	= mazo_dzbase()->get_meta('post_type_gallery1');
	$featured_image			= (isset($page_options['featured_image']))?mazo_dzbase()->get_meta('featured_image'):true;
	
	if( !$post_show_sidebar || empty($post_sidebar) || !is_active_sidebar( $post_sidebar) || $post_sidebar_layout == 'full' || !mazo_is_theme_sidebar_active())
	{
		$is_sidebar = false;
		$classes = 'col-xl-12 col-lg-12';
		$blog_classes = 'dz-card blog-single ';
		
    }else{
		$is_sidebar = true;
		$classes = 'col-xl-8 col-lg-8';
		$blog_classes = 'dz-card blog-single sidebar';
	}
	$social_shaing = mazo_get_opt('social_shaing_on_post');
	$views_arr = get_post_meta(get_the_id(),'_views_count');
	$views = (isset($views_arr[0]))?$views_arr[0]:0;
	
?>
<?php if(!empty($post_type_gallery1)) {  $post_type_gallery1 = explode(',',$post_type_gallery1); ?>
	<div class="container content-inner-1 pb-0 m-b60 m-md-b30">
		<div class="row">
			<div class="dz-media">
				<div class="swiper-container post-swiper">
					<div class="swiper-wrapper">
						<?php foreach($post_type_gallery1 as $image_id) {
						?>
						<div class="swiper-slide">
							<?php echo wp_get_attachment_image($image_id,'large'); ?>
						</div>
						<?php } ?>
					</div>
					<div class="prev-post-swiper-btn"><i class="flaticon-left-arrow"></i></div>
					<div class="next-post-swiper-btn"><i class="flaticon-right-arrow"></i></div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<div class="<?php echo esc_attr(mazo_get_container($is_sidebar)); ?> content-inner pt-0">
	<div class="row">
		<?php if ($post_sidebar_layout == 'left' && $is_sidebar) { ?>
			<!-- Side bar start -->
			<div class="col-xl-4 col-lg-4 m-b30 dz-order-1">
				<aside class="side-bar sticky-top left">
					<?php dynamic_sidebar( $post_sidebar ); ?>
				</aside>
			</div>
			<!-- Side bar END -->
		<?php } ?>
		<div class="<?php echo esc_attr($classes); ?>">
			<?php while( have_posts() ){ the_post();  ?>
				<div class="<?php echo esc_attr($blog_classes); ?>">
					<div class="dz-info">
						<div class="dz-meta">
							<ul>
								<?php if(!empty($date_on)) { ?>
								  <li class="post-date">
									<i class="flaticon-calendar"></i>
									<?php echo the_date(); ?>
								  </li>
								<?php } ?>
								
								<li class="post-user">
									<i class="flaticon-user"></i>
									<?php esc_html_e('By', 'mazo'); ?> 
									<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
										<?php the_author(); ?> 
									</a>
								</li>	
								<?php if($category_on) { ?>
									<li class="post-category">
										<i class="ti-tag"></i>
										<?php echo wp_kses(get_the_category_list(', '),'string'); ?>
									</li>
								<?php } ?>
							</ul>
							<ul>
								<?php echo mazo_show_post_view_count_view($views); ?>
							</ul>
						</div>
						<?php if(!mazo_is_post_banner_enable()){ ?>
							<h1 class="dz-title">
								<?php the_title(); ?>
							</h1>
						<?php } ?>
					</div>
					
					<div class="dz-info">
						<div class="dz-post-text">
							<?php the_content(); ?>
						</div>
						<?php if(has_tag() || $social_shaing) { ?>
							<div class="dz-meta meta-bottom">
								<?php if(has_tag()) { ?>
									<div class="post-tags">
										<?php mazo_get_post_tags(get_the_id()); ?>
									</div>
								<?php } ?>
								<?php echo mazo_share_us(get_the_id(),get_the_title()); ?>
							</div>
						<?php } ?>
					</div>
				</div>
				<?php } 
				get_template_part('dz-inc/elements/author_block_element'); ?>
				<?php get_template_part('dz-inc/elements/pagination_element'); ?>    
				<?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'mazo'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
				<?php get_template_part('dz-inc/elements/related_element');  ?>				
				<?php comments_template(); ?>
			
		</div>
		<?php if ($post_sidebar_layout == 'right' && $is_sidebar) { ?>
			<!-- Side bar start -->
			<div class="col-xl-4 col-lg-4 m-b30 dz-order-1">
					<aside class="side-bar sticky-top right">
					<?php dynamic_sidebar( $post_sidebar ); ?>
				</aside>
			</div>
			<!-- Side bar END -->
		<?php } ?>
	</div>
</div>