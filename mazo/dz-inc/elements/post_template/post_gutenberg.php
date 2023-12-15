<?php 
	global $mazo_option;
	extract($mazo_option);
	$category_on = mazo_get_opt('category_on',true);
	$date_on 	 = mazo_get_opt('date_on',true);
	$page_options = mazo_dzbase()->get_meta();
	$featured_image	= (isset($page_options['featured_image']))?mazo_dzbase()->get_meta('featured_image'):true;
	$featured_img_on 	 = mazo_get_opt('featured_img_on',true); /* From Theme Options */
	$views_arr = get_post_meta(get_the_id(),'_views_count');
	$views = (isset($views_arr[0]))?$views_arr[0]:0;
	$social_shaing = mazo_get_opt('social_shaing_on_post');
?>
<!-- Blog Large -->
<section class="content-inner bg-img-fix" >
	<?php if ($featured_image && $featured_img_on && has_post_thumbnail()) { ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="dz-blog blog-single  mb-5">
						<div class="dz-media ">
							<?php the_post_thumbnail(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<div class="min-container">	
		<div class="row">
			<div class="col-xl-12 col-lg-12">
				<!-- blog start -->
				<?php while( have_posts() ){ the_post();  ?>
				<div class="dz-card blog-single ">
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
			
			<?php get_template_part('dz-inc/elements/author_block_element');  ?>	
			<?php get_template_part('dz-inc/elements/pagination_element'); ?>    
			<?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'mazo'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
			<?php get_template_part('dz-inc/elements/related_element');  ?>	
			<!-- blog END --> 
			<?php comments_template(); ?>					
			
				<?php } ?>
				
			</div>
		</div>
	</div>
</section>
