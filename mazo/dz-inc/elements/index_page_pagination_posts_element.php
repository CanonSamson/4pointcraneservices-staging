  <?php while( have_posts() ){ the_post();
    
    $post_id = get_the_ID();
    
    $post_title = (has_post_thumbnail()) ? mazo_trim(get_the_title(), 7) : get_the_title();
    
    $views_arr = get_post_meta(get_the_id(),'_views_count');
    $views = (isset($views_arr[0]))?$views_arr[0]:0;
    
    $excerpt = get_the_excerpt();
    $content = get_the_content();
    $short_description = mazo_short_description($excerpt, $content, 20, '...');
    $author_name = get_the_author_meta('display_name', $post->post_author);
    $featured = get_post_meta(get_the_ID(), 'featured_post');
    $featured_class = (!empty($featured) && $featured[0] == 1) ? ' featured ' : '';
    
    $no_image_class = (!has_post_thumbnail())?'no-image':'';
  ?>
<!-- blog post item -->
<div id="post-<?php the_ID(); ?>" <?php echo post_class('dz-card blog-half style-1 shadow m-b50 aos-item ' . $featured_class . ' ' . $no_image_class); ?>  data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
	<?php if(has_post_thumbnail()) { ?>
		<div class="dz-media">
			<?php the_post_thumbnail('mazo_555x400'); ?>
		</div>
	<?php } ?> 
	<div class="dz-info">
		<div class="dz-meta">
			<ul>
				<li class="post-date">	
					<i class="flaticon-calendar"></i>
					<?php echo esc_html(get_the_date()); ?>
				</li>
				<li class="post-user">
					<i class="flaticon-user"></i>
					<?php esc_html_e('By', 'mazo'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
					<?php echo esc_html($author_name);?></a>
				</li>
			</ul>
		</div>
		<h3 class="dz-title">
			<a href="<?php echo esc_url(get_permalink()); ?>">
				<?php echo wp_kses($post_title, mazo_allowed_html_tag()); ?>
			</a>
		</h3>
		<div class="dz-post-text text">
			<p>
				<?php echo esc_html( $short_description );?>
			</p>
		</div>
		<a href="<?php echo esc_url(get_permalink()); ?>" class="btn-link"><?php echo esc_html__('READ MORE','mazo'); ?> <i class="flaticon-right-arrow"></i>	</a>
	</div>
  <?php
    if (is_sticky())
    {
        echo '<span class="sticky-icon"><i class="fas fa-thumbtack"></i></span>';
    }
?>
</div>
	<!-- End Post -->
<?php } ?>