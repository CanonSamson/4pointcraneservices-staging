<?php 
  $post_id = get_the_ID();
  $categories = get_the_category($post_id);
  $related_post_on = mazo_get_opt('related_post_on',false);
  $related_post_layout = mazo_get_opt('related_post_layout'); 
  
  if ($categories) {
    
    $category_ids = array();
    
    foreach($categories as $individual_category){ 
      $category_ids[] = $individual_category->term_id;
	  
    }
    
    $args = array(
		'category__in'     => $category_ids,
		'post__not_in'     => array($post_id),
		'posts_per_page'   => 2,
		'ignore_sticky_posts' => 1,
		'orderby' => 'rand',		
    );
    $args['meta_query'] = array(
		array(
    'key' => '_thumbnail_id',
    'compare' => 'EXISTS'
		),
    );
    
    $related_query = new wp_query( $args );
    if( $related_query->have_posts() ) { 
      
     
    if($related_post_on){
    ?>
		<div class="widget-title">
			<h4 class="title">
			  <?php echo esc_html__('Related Blogs','mazo');?>
			</h4>
		</div>
		<div class="row extra-blog style-1">
		
      <?php 
	  $count=1;
	  while( $related_query->have_posts() ) {
        $related_query->the_post();
        $post_title = (has_post_thumbnail()) ? mazo_trim(get_the_title(), 6) : get_the_title();
        $post_desc = (has_post_thumbnail()) ? mazo_trim(get_the_content(), 16) : get_the_content();
        $author_name = get_the_author_meta('display_name', $post->post_author);
        $no_image_class = '';
		$class = ($count==1)?'m-sm-b30':'';
        if(!has_post_thumbnail())
        {
          $no_image_class = 'no-image-box';	
        }	
		
		if($related_post_layout=='post_related_1'){
      ?>
      <div class="col-lg-6 col-md-6">
        <div class="dz-card blog-grid style-1 shadow <?php echo esc_attr($class); ?>">
          <?php if(has_post_thumbnail()) { ?>
            <div class="dz-media <?php echo esc_attr($no_image_class); ?>">					
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
						<?php esc_html_e('By', 'mazo'); ?> 
						<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"> 
							<?php echo esc_html($author_name);?>
						</a>
					</li>
				</ul>
			</div>
            <h5 class="dz-title">
              <a href="<?php echo esc_url(get_permalink()); ?>">
                <?php echo esc_html($post_title); ?>
              </a>
            </h5>
			<div class="dz-post-text text">
				<p>
					<?php echo esc_html($post_desc); ?>
				</p>
			</div>
			<a href="<?php echo esc_url(get_permalink()); ?>" class="btn-link"><?php echo esc_html__('READ MORE','mazo'); ?> <i class="flaticon-right-arrow"></i>	</a>
            
          </div>
        </div>
      </div>
		<?php } else if($related_post_layout=='post_related_2'){ ?>
			<div class="col-lg-6 col-md-6 m-b30">
				<div class="dz-card blog-grid style-3 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
					<?php if(has_post_thumbnail()) { ?>
						<div class="dz-media <?php echo esc_attr($no_image_class); ?>">					
						  <?php the_post_thumbnail('mazo_555x400'); ?>
						</div>
					<?php } ?>
					<div class="dz-info text-center">
						<div class="dz-meta">
							<ul>
								<li class="post-date">
									<?php echo esc_html(get_the_date()); ?>
								</li>
							</ul>
						</div>
						<h5 class="dz-title">
							<a href="<?php echo esc_url(get_permalink()); ?>">
								<?php echo esc_html($post_title); ?>
							</a>
						</h5>
						<div class="dz-post-text text">
							<p>
								<?php echo esc_html($post_desc); ?>
							</p>
						</div>
						<a href="<?php echo esc_url(get_permalink()); ?>" class="btn-link"><?php echo esc_html__('Read More','mazo'); ?> <i class="fas fa-arrow-right m-l5"></i></a>
					</div>
				</div>
			</div>
		<?php } else if($related_post_layout=='post_related_3'){ ?>
			<div class="col-md-6 card-container">
				<div class="dz-card blog-grid style-4 aos-item m-b30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="200">
					<?php if(has_post_thumbnail()) { ?>
						<div class="dz-media <?php echo esc_attr($no_image_class); ?>">					
						  <?php the_post_thumbnail('mazo_555x400'); ?>
						</div>
					<?php } ?>
					<div class="dz-info">
						<div class="dz-meta">
							<ul>
								<li class="post-date">
									<?php echo esc_html(get_the_date()); ?>
								</li>
								<li class="post-user">
									<?php esc_html_e('By', 'mazo'); ?> 
									<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"> 
										<?php echo esc_html($author_name);?>
									</a>
								</li>
							</ul>
						</div>
						<h5 class="dz-title">
							<a href="<?php echo esc_url(get_permalink()); ?>">
								<?php echo esc_html($post_title); ?>
							</a>
						</h5>
						<div class="dz-post-text text">
							<p>
								<?php echo esc_html($post_desc); ?>
							</p>
						</div>
						<a href="<?php echo esc_url(get_permalink()); ?>" class="btn shadow-primary icon-btn btn-primary"><i class="fas fa-caret-right"></i></a>
					</div>
				</div>
			</div>
		<?php } else if($related_post_layout=='post_related_4'){ ?>
			<div class="col-md-6">
				<div class="dz-card blog-grid style-2 text-center m-b10">
					<?php if(has_post_thumbnail()) { ?>
						<div class="dz-media <?php echo esc_attr($no_image_class); ?>">					
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
							</ul>
						</div>
						<h4 class="dz-title">
							<a href="<?php echo esc_url(get_permalink()); ?>">
								<?php echo esc_html($post_title); ?>
							</a>
						</h4>
						<a href="<?php echo esc_url(get_permalink()); ?>" class="btn-link"><i class="flaticon-chevron"></i> <?php echo esc_html__('READ MORE','mazo'); ?></a>
					</div>
				</div>
			</div>
		<?php } ++$count; } ?>
    </div>
		<?php
    } }
  }
wp_reset_postdata();?>