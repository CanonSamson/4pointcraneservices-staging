<?php	
	function mazo_dzbase()
	{
		return $GLOBALS['_dz_base'];
	}
	
	/** A function to fetch the categories from wordpress */
	function mazo_get_categories($arg = false)
	{	
		global $wp_taxonomies;		

		$mazo_categories_default_args = array(	
				'orderby'            => 'ID',
				'order'              => 'ASC',				
				'hide_empty'         => 1,				
				'hierarchical'       => true,				
		  );
		
		if( ! empty($arg['taxonomy']) && isset($wp_taxonomies[$arg['taxonomy']]) )
		{
			$mazo_categories_default_args['taxonomy'] = $arg['taxonomy'];
		}
		
		$categories = get_categories($mazo_categories_default_args);		
		$cats = array();
		
		if( !is_wp_error( $categories ) ) {
			foreach($categories as $category)
			{
				$cats[$category->slug] = wp_kses($category->name,'string');				
			}
		}
		return $cats;
	}
	
	function mazo_get_the_breadcrumb()
	{	
		global $wp_query;
		
		$queried_object = get_queried_object();		
		$breadcrumb = '';
		$delimiter = ' ';
		$before = '<li>';
		$after = '</li>';
		if( ! is_home())
		{
			$breadcrumb .= '<li class="breadcrumb-item"><a href="'.esc_url(home_url('/')).'"> '.esc_html__('Home', 'mazo').'</a></li>';
			
			/** If category or single post */
			if(is_category())
			{
				$cat_obj = $wp_query->get_queried_object();
				$this_category = get_category( $cat_obj->term_id );
		
				if ( $this_category->parent != 0 ) {
					$parent_category = get_category( $this_category->parent );
					$parent_string = get_category_parents($parent_category, TRUE, '@');			
					$parent_tree = explode('@',$parent_string);
					$parent_tree = array_filter($parent_tree);
					foreach($parent_tree as $cat_link)
					{
						$breadcrumb .= '<li>'. $cat_link .'</li>';	
					}	
				}				
				$single_cat_title = single_cat_title('', FALSE);				
				$breadcrumb .= '<li>'. $single_cat_title.'</li>';
			}
			elseif(is_tax())
			{
				$term_link = get_term_link($queried_object);
				$term_name = $queried_object->name;				
				$breadcrumb .= '<li><a href="'.esc_url($term_link).'">'.$term_name .'</a></li>';
			}
			elseif(is_page()) /** If WP pages */
			{
				global $post;
				
				if($post->post_parent)
				{
					$anc = get_post_ancestors($post->ID);
					foreach($anc as $ancestor)
					{
						$perma_link = get_permalink($ancestor);
						$ancestor_title = get_the_title($ancestor);
						$post_title = get_the_title($post->ID);						
						$breadcrumb .= '<li class="breadcrumb-item"><a href="'.esc_url($perma_link).'">'. $ancestor_title .'</a></li>';
					}
					$breadcrumb .= '<li class="breadcrumb-item">'. wp_kses($post_title,'string') .'</li>';
					
				}else{
					$post_title = get_the_title();
					$breadcrumb .= '<li class="breadcrumb-item">'. wp_kses($post_title,'string') .'</li>';
				}
			}
			elseif (is_singular())
			{
				
				if($category = wp_get_object_terms(get_the_ID(), 'category'))
				{
					if( !is_wp_error($category) )
					{
						$term_link = get_term_link(mazo_set($category, '0'));
						$name = mazo_set( mazo_set($category, '0'), 'name');
						$title = get_the_title();						
						$breadcrumb .= '<li class="breadcrumb-item"><a href="'.esc_url($term_link).'">'. $name .'</a></li>';
						$breadcrumb .= '<li class="breadcrumb-item">'. wp_kses($title,'string') .'</li>';					
					} else{
						$title = get_the_title();
						$breadcrumb .= '<li class="breadcrumb-item">'. wp_kses($title,'string') .'</li>';
					}
				}else{
					$title = wp_title('',false);
					$breadcrumb .= '<li class="breadcrumb-item">'. wp_kses($title,'string') .'</li>';
				}
				}
			elseif(is_tag()){
				$term_link = get_term_link($queried_object);
				$title = single_tag_title('', FALSE);				
				$breadcrumb .= '<li class="breadcrumb-item"><a href="'.esc_url($term_link).'">'. wp_kses($title,'string') .'</a></li>'; /**If tag template*/
			}
			elseif(is_day()){
				$time = get_the_time('F jS, Y');				
				$breadcrumb .= '<li class="breadcrumb-item"><a href="#">'.esc_html__('Archive for ', 'mazo').wp_kses($time,'string').'</a></li>'; /** If daily Archives */
			}
			elseif(is_month()){
				$link = get_month_link(get_the_time('Y'), get_the_time('m'));
				$time = get_the_time('F, Y');				
				$breadcrumb .= '<li class="breadcrumb-item"><a href="' .esc_url($link) .'">'.esc_html__('Archive for ', 'mazo'). wp_kses($time,'string') .'</a></li>'; /** If montly Archives */
			}
			elseif(is_year()){
				$link = get_year_link(get_the_time('Y'));
				$time = get_the_time('Y');	
				$breadcrumb .= '<li class="breadcrumb-item"><a href="'.esc_url($link).'">'.esc_html__('Archive for ', 'mazo'). wp_kses($time,'string') .'</a></li>'; /** If year Archives */
			}
			elseif(is_author()){
				$link = get_author_posts_url( get_the_author_meta( "ID" ) );
				$author = get_the_author();
				$breadcrumb .= '<li class="breadcrumb-item"><a href="'. esc_url( $link ) .'">'.esc_html__('Archive for ', 'mazo'). wp_kses($author,'string') .'</a></li>'; /** If author Archives */
			}
			elseif(is_search()){
				$search_query = get_search_query();
				$breadcrumb .= '<li class="breadcrumb-item">'.esc_html__('Search Results for ', 'mazo'). $search_query .'</li>'; /** if search template */
			}
			elseif(is_404()){
				$breadcrumb .= '<li class="breadcrumb-item">'.esc_html__('404 - Not Found', 'mazo').'</li>'; /** if search template */			
			}elseif(is_shop() && mazo_is_woocommerce_active()){
				$term_name = mazo_get_opt('woocommerce_page_title');
				$breadcrumb .= '<li class="breadcrumb-item"><a href="javascript:void(0)">'.wp_kses($term_name,'string') .'</a></li>'; /** if search template */			
			}
			else{
			
				$link = get_permalink();
				$title = get_the_title();
				if(!empty($title))
				{	
					$breadcrumb .= '<li class="breadcrumb-item"><a href="'.esc_url($link).'">'. esc_html($title) .'</a></li>'; /** Default value */
				}
			}
			
			/* To hide if only one li is available */
			if(substr_count($breadcrumb,'<li class="breadcrumb-item">') <= 1)
			{
				$breadcrumb = '';
			}
		}
		
		if(!empty($breadcrumb)){
			$breadcrumb = '<ul class="breadcrumb">'.$breadcrumb.'</ul>';
		}
		
		return $breadcrumb;
	}

	function mazo_bunch_list_comments($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment; 
		$email = mazo_set( $comment, 'comment_author_email' );		
		$avatar = get_avatar( $email, 130 );
		$comment_id = get_comment_ID();
		$author_link = get_comment_author($comment_id);
		$comment_date_link = get_month_link(get_the_date('Y'), get_the_date('m'));
		$comment_date = get_comment_date('F j, Y', $comment_id);

		$allowed_html_tags = mazo_allowed_html_tag();
		
		?>		
		<li <?php comment_class('comment');?> id="comment-<?php comment_ID(); ?>">
		<div class="comment-body" id="div-comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php echo wp_kses($avatar, $allowed_html_tags); ?>						
				<cite class="fn"><?php echo wp_kses($author_link, $allowed_html_tags); ?></cite> <span class="says"><?php esc_html_e('says:', 'mazo');?></span> 
				<div class="comment-meta"> 
					<a href="<?php echo esc_url($comment_date_link); ?>"><?php echo wp_kses($comment_date, $allowed_html_tags); ?> <?php esc_html_e('at', 'mazo');?> <?php the_time('g:i a'); ?></a> 
				</div>
			</div>
			<div class="comment-content dz-page-text">
				<?php comment_text();?>
			</div>
      <div class="reply"> 
					<?php 
					comment_reply_link(
							array_merge(
								$args,
								array(
								'depth' => $depth,
								'max_depth' => $args['max_depth'],
								'reply_text' => '<i class="fa fa-reply"></i> Reply', 'mazo',
								'add_below' => 'div-comment',
							)
						)
					); 
				?>
				</div>
		</div>				
		<?php	
	}
	
	add_filter( 'comment_form_defaults', 'mazo_move_comment_field' );	
	function mazo_move_comment_field( $input )
	{
		if ( 'comment_form_defaults' === current_filter() && !is_user_logged_in())
		{
			// Copy the field to our internal variable …
			$textarea = $input['comment_field'];
			$input['comment_field'] = '';
			// … and remove it from the defaults array.
			$input['fields']['comment_field'] = $textarea;
			
			
		}
		
		return $input;
	} 
	
	/**
	 * returns the formatted form of the comments
	 *
	 * @param	array	$args		an array of arguments to be filtered
	 * @param	int		$post_id	if form is called within the loop then post_id is optional
	 *
	 * @return	string	Return the comment form
	 */
	function mazo_bunch_comment_form( $args = array(), $post_id = null, $review = false )
	{
		$allowed_html_tags = mazo_allowed_html_tag();
		
		if ( null === $post_id )
		{$post_id = get_the_ID();}
		else
		{$id = $post_id;}
		$commenter = wp_get_current_commenter();
		$user = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';
		$args = wp_parse_args( $args );
		if ( ! isset( $args['format'] ) ){
			$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
		}
		$req      = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$html5    = 'html5' === $args['format'];
		$fields   =  array(
			'author' => '<p class="comment-form-author"><input id="name" placeholder="'. esc_attr__( 'Author', 'mazo' ).'"  name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' /></p>',
			'email'  => ' <p class="comment-form-email"><input id="email" required placeholder="'. esc_attr__( 'Email', 'mazo' ).'" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' /></p>',
			'cookies'=>''
		);
		$required_text = sprintf( ' ' . esc_html__('Required fields are marked %s', 'mazo'), '<span class="required">*</span>' );
		/**
		 * Filter the default comment form fields.
		 *
		 * @since 3.0.0
		 *
		 * @param array $fields The default comment fields.
		 */
		$mazo_col = (is_user_logged_in()) ? 'col-md-12': ''; 
		$fields = apply_filters( 'comment_form_default_fields', $fields );
		$defaults = array(
			'fields'               => $fields,
			'comment_field'        => '<p class="comment-form-comment"><textarea id="comments" placeholder="'. esc_attr__( 'Type Comment Here', 'mazo' ).'" class="form-control4" name="comment" cols="45" rows="3" aria-required="true" required="required"></textarea></p>',
			
			'must_log_in'          => '<p class="col-md-12 col-sm-12">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'mazo' ), esc_url(wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) ) . '</p>',
			'logged_in_as'         => '<p class="col-md-12 col-sm-12">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="'.esc_attr__('Log out of this account','mazo').'">'.esc_html__('Log out?','mazo').'</a>', 'mazo' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'id_form'              => 'comments_form',
			'id_submit'            => 'submit',
			'class_submit'         => 'btn shadow-primary btn-primary',
			'title_reply'          => esc_html__( 'Leave Your Comment', 'mazo' ),
			'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'mazo' ),
			'cancel_reply_link'    => esc_html__( 'Cancel reply', 'mazo' ),
			'label_submit'         => esc_html__( 'Post Comment', 'mazo' ),
			'format'               => 'xhtml',
		);
		/**
		 * Filter the comment form default arguments.
		 *
		 * Use 'comment_form_default_fields' to filter the comment fields.
		 *
		 * @since 3.0.0
		 *
		 * @param array $defaults The default comment form arguments.
		 */
		$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );
		
			
			if ( comments_open( $post_id ) ) : ?>
				<?php
				/**
				 * Fires before the comment form.
				 *
				 * @since 3.0.0
				 */
				do_action( 'comment_form_before' );
				?>					
				 <div class="default-form comment-respond style-1" id="respond">
					<div class="widget-title">
						<h4 class="title" id="reply-title"><?php esc_html( comment_form_title( $args['title_reply'], $args['title_reply_to'] )); ?> <small> <?php esc_url(cancel_comment_reply_link( $args['cancel_reply_link'] )); ?> </small> </h4>
					</div>
					<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
						<?php echo wp_kses($args['must_log_in'], $allowed_html_tags); ?>
						<?php
						/**
						 * Fires after the HTML-formatted 'must log in after' message in the comment form.
						 *
						 * @since 3.0.0
						 */
						do_action( 'comment_form_must_log_in_after' );
						?>
					<?php else : ?>
					<div class="clearfix">
						<?php 
						$args['title_reply'] = '';
						echo comment_form($args, $post_id); 
						?>
					</div>
					<?php endif; ?>
				</div><!-- #respond -->
				<?php
				/**
				 * Fires after the comment form.
				 *
				 * @since 3.0.0
				 */
				do_action( 'comment_form_after' );
			else :
				/**
				 * Fires after the comment form if comments are closed.
				 *
				 * @since 3.0.0
				 */
				do_action( 'comment_form_comments_closed' );
			endif;
	}

	function mazo_the_pagination($query = array(), $args = array(), $echo = 1)
	{
		global $wp_query;
		
		
		if(!empty($query))
		{ 
			$temp_query = $wp_query;
			$wp_query   = NULL;
			$wp_query   = $query;
		}
		
		$paged = get_query_var('paged');
		
		$default =  array(
			'base' => str_replace( 99999, '%#%', esc_url( get_pagenum_link( 99999 ) ) ), 
			'format' => '?paged=%#%', 
			'current' => max( 1, $paged ),
			'total' => $wp_query->max_num_pages,
			'prev_text' => esc_html__('Prev','mazo'), 
			'next_text' => esc_html__('Next','mazo'), 
			'type'=>'list',
			'add_args' => false,			
		);

		$args = wp_parse_args($args, $default);	
		$pagination_link = !empty(paginate_links($args))?paginate_links($args):'';
		$pagination = str_replace("<ul class='page-numbers'", '<ul class="pagination text-center p-t20 mb-lg-0 mb-5"', $pagination_link );		
	    $pagination = $pagination;		
	
		echo wp_kses($pagination, mazo_allowed_html_tag());
	}			
	
	function mazo_trim( $text, $len, $more = null )
	{	
		$text = strip_shortcodes( $text );	
		//$text = apply_filters( 'the_content', $text );
		$text = str_replace(']]>', ']]&gt;', $text);	
		$excerpt_length = apply_filters( 'excerpt_length', $len );	/* Issue Remaining */
		$excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );	
		$excerpt_more = ( $more ) ? $more : '.';	
		$text = wp_trim_words( $text, $len, $excerpt_more );
		
		return $text;	
	}
	
	/**
	*
	* Excerpt More Settings
	*
	*/
	function mazo_excerpt_more()
	{
		return ' ';
	}
	add_filter('excerpt_more', 'mazo_excerpt_more');
  
	/* Used on footer and header area */
	/* Used on footer and header area */
	function mazo_get_social_icons($show_position = 'all',$default_class='')
	{	
		$options = mazo_dzbase()->option();
		
		$output = '';			
		$target = $options['social_link_target'];
		$social_link_options = mazo_social_link_options();
		
		if($show_position == 'header')
		{
			
			/*reCheck function and rebuild it for fast performance */
			
			global $mazo_option;
			$header_social_links = mazo_set($mazo_option,'header_social_links');
			
			
			$header_show_links = []; 
			$updated_social_links = array();
			if(!empty($header_social_links)){
				foreach($header_social_links as $key => $value){
					
					if($value == 1){
						$header_show_links[] = $key; 
					}
				
				}
			}
			if(!empty($social_link_options)){
				foreach($social_link_options as $social_key => $social_link){
					if(in_array($social_link['id'], $header_show_links)){
						$updated_social_links[$social_key] = $social_link;
					}
				}
			}
			
			$social_link_options = $updated_social_links;
			
		}
		
		if(!empty($social_link_options)){
			foreach ($social_link_options as $social_link) {
				
					
					$id = $social_link['id'];
					$sl_id = 'social_' . $id . '_url';
					
					$sl_title = $social_link['title'];

					if(!empty($options[$sl_id]))
					{
						$id = ($id == 'facebook')?'facebook-f':$id;
						$output .= '<li><a target="'. esc_attr($target).'" href="'.esc_url( $options[$sl_id] ).'"  class="'.esc_attr($default_class.' fab fa-'.$id).'"></a></li>'."\n";	
					}
			}
		}
		return $output;
	}

	function mazo_short_description($excerpt = '', $content = '', $limit = 250, $more = null){
		
		if(empty($excerpt) && empty($content)){return false;}
		
		$short_description = '';
		
		if(!empty($excerpt)){
			$short_description = $excerpt;
		}
		else
		{	
			if ( has_blocks( $content ) ) {	
				$blocks = parse_blocks( $content );
				
				foreach($blocks as $k ){
					if ( $k['blockName'] === 'core/paragraph' ) {
						if(!empty($k['innerHTML'])){
							$short_description = $k['innerHTML'];
							break;
						}
					}
				}
			}else{
				$short_description = $content;
			}
		}	
		$short_description = mazo_trim($short_description, $limit, $more);
		
		return $short_description;
	}
	/*
		Ajax - Home pages listing
	*/
	function mazo_load_posts_by_ajax_callback() {	
		check_ajax_referer('ajax_security_key', 'security');   
		global $mazo_query_result;
		
		$post_type = !empty($_POST['post_type'])? $_POST['post_type'] : 'post';
		
		$query_args = array(	
			'post_type' 		=> $post_type,
			'post_status' 		=> 'publish',
			'posts_per_page'   	=> $_POST['posts_per_page'],	
			'paged' 			=> $_POST['page'],	
			'order' 			=> $_POST['post_order'],
			'ignore_sticky_posts' => true,
		);		
	
		if($_POST['posts_image_preference'] == 'image_post_only')
		{
			$query_args['meta_query'] = array(
				array(
				 'key' => '_thumbnail_id',
				 'compare' => 'EXISTS'
				),
			);
		}
		elseif($_POST['posts_image_preference'] == 'text_post_only')
		{
			$query_args['meta_query'] = array(
				array(
				 'key' => '_thumbnail_id',
				 'compare' => 'Not EXISTS'
				),
			);
		}			
			
		if($_POST['posts_in_categories']) 
		{ 
			
			if(!empty($_POST['post_type']) && $_POST['post_type'] != 'post')
			{
				/* This is category searching only for custom post type */
				$cat_arr = explode(',',$_POST['posts_in_categories']);
				
				$taxonomy = get_object_taxonomies($_POST['post_type']);
				
				$taxonomy = !empty($taxonomy[0])?$taxonomy[0]:'category';
				
				$query_args['tax_query'][] = array(
											'taxonomy' => $taxonomy,
											'field' => 'slug',
											'terms' => $cat_arr,
											'operator' => 'IN'
											);
				
			}else{
				$query_args['category_name'] = $_POST['posts_in_categories'];
			}								
		}
		
		if($_POST['post_by_label'] == 'sticky_only')
		{
			$query_args['post__in']	= get_option( 'sticky_posts' );	
			$query_args['ignore_sticky_posts']	= true;
		}
		
		if($_POST['only_featured_post'] == 'yes') { 		
			$query_args['meta_key'] = 'featured_post';		
			$query_args['meta_value'] = 1;				
			$query_args['meta_compare'] = 'LIKE';		
		}
		
		if($_POST['post_order_by'] == 'views_count'){
			$query_args['meta_key']	= '_views_count';
		}
		else{
			$query_args['orderby']	= $_POST['post_order_by'];
		}
		
		$query = new WP_Query( $query_args );	
		
		$mazo_query_result['posts'] = $query->posts;		
		$mazo_query_result['posts_per_page'] = $_POST['posts_per_page'];
		$mazo_query_result['current_page'] = $_POST['page'];
		$mazo_query_result['side_bar'] = $_POST['side_bar'];
		$mazo_query_result['title_text_limit'] = $_POST['title_text_limit'];
		$mazo_query_result['description_text_limit'] = $_POST['description_text_limit'];
		
		$mazo_query_result['show_date'] = !empty($_POST['show_date'])?$_POST['show_date']:'';
		$mazo_query_result['show_author'] = !empty($_POST['show_author'])?$_POST['show_author']:'';
		$mazo_query_result['show_comment'] = !empty($_POST['show_comment'])?$_POST['show_comment']:'';
		$mazo_query_result['show_share'] = !empty($_POST['show_share'])?$_POST['show_share']:'';
		$mazo_query_result['show_column'] = !empty($_POST['show_column'])?$_POST['show_column']:'column_2';
		$mazo_query_result['element_style'] = !empty($_POST['element_style'])?$_POST['element_style']:'style_1';
    
		switch ($_POST['blog_view']) {
			case "post_listing_1": 			
				get_template_part('dz-inc/elementor/ajax/post_listing_1_ajax');
				break;
			case "post_listing_2": 			
				get_template_part('dz-inc/elementor/ajax/post_listing_2_ajax');
				break;
			case "team_listing_1": 			
				get_template_part('dz-inc/elementor/ajax/team_listing_1_ajax');
				break;
			case "portfolio_listing_1": 			
				get_template_part('dz-inc/elementor/ajax/portfolio_listing_1_ajax');
				break;
			case "portfolio_listing_2": 			
				get_template_part('dz-inc/elementor/ajax/portfolio_listing_2_ajax');
				break;
			case "service_listing_1": 			
				get_template_part('dz-inc/elementor/ajax/service_listing_1_ajax');
				break;
			case "service_listing_2": 			
				get_template_part('dz-inc/elementor/ajax/service_listing_2_ajax');
				break;
			case "service_listing_3": 			
				get_template_part('dz-inc/elementor/ajax/service_listing_3_ajax');
				break;
			case "post_listing_3": 			
				get_template_part('dz-inc/elementor/ajax/post_listing_3_ajax');
				break;
			case "post_listing_4": 			
				get_template_part('dz-inc/elementor/ajax/post_listing_4_ajax');
				break;
			case "post_listing_5": 			
				get_template_part('dz-inc/elementor/ajax/post_listing_5_ajax');
				break;
			case "post_listing_6": 			
				get_template_part('dz-inc/elementor/ajax/post_listing_6_ajax');
				break;
			case "post_listing_7": 			
				get_template_part('dz-inc/elementor/ajax/post_listing_7_ajax');
				break;
		}	
		
		unset($GLOBALS['mazo_query_result']);	
		wp_reset_postdata();
		wp_die();
	}
	add_action('wp_ajax_load_posts_by_ajax', 'mazo_load_posts_by_ajax_callback');
	add_action('wp_ajax_nopriv_load_posts_by_ajax', 'mazo_load_posts_by_ajax_callback');
	
	/*
		AJAX - Mega menu
	*/
	function mazo_load_mega_menu_posts_ajax_callback() {
		check_ajax_referer('ajax_security_key', 'security');   
		global $mazo_query_result;		
		$query_args = array(	
			'post_type' 		=> 'post',
			'post_status' 		=> 'publish',
			'posts_per_page'   	=> $_POST['posts_per_page'],	
			'paged' 			=> $_POST['page'],	
			'ignore_sticky_posts' => true,
			'orderby' 			=> 'date',
			'order' 			=> 'DESC',			
		);
		
		if($_POST['posts_in_categories']) { 
			$query_args['cat'] = $_POST['posts_in_categories'];		
		}
		
		if($_POST['mega_menu_images_only'] == 'yes')
		{		
			$query_args['meta_query'] = array(
				array(
				 'key' => '_thumbnail_id',
				 'compare' => 'EXISTS'
				),
			);
		}
		
		$query = new WP_Query( $query_args ); 		
		set_query_var( 'query', $query );	
		get_template_part('dz-inc/ajax/mega_menu_ajax');		
		wp_reset_postdata();
		wp_die();
	}
	add_action('wp_ajax_load_mega_menu_posts_by_ajax', 'mazo_load_mega_menu_posts_ajax_callback');
	add_action('wp_ajax_nopriv_load_mega_menu_posts_by_ajax', 'mazo_load_mega_menu_posts_ajax_callback');

	/*
		AJAX - Categories, Search, Tags, Archive, Author
	*/
	function mazo_load_common_page_posts_ajax_callback() {
		check_ajax_referer('ajax_security_key', 'security'); 		
		$mazo_query_result = array();	
		
		$query_args = array(	
			'post_type' 		=> 'post',
			'post_status' 		=> 'publish',
			'posts_per_page'   	=> $_POST['posts_per_page'],	
			'paged' 			=> $_POST['page'],
			'ignore_sticky_posts' => true,			
		);
		
		$orderby = isset($_POST['orderby'])?$_POST['orderby']:'date';
		$order   = isset($_POST['order'])?$_POST['order']:'DESC';
			
		if($orderby == '_views_count')
		{
		  $query_args['meta_key']	= '_views_count';
		  $query_args['order'] = 'DESC';
		  $query_args['orderby'] = '_views_count';
		}else{
		  $query_args['orderby']	= $orderby;
		}
		
		$query_args['order'] = $order;
		
		$template = '';
		
		if( $_POST['page_view'] == 'author' ) { 		
			$query_args['author'] = $_POST['object_data'];				
			$template = 'author_ajax';
		}		
		if($_POST['page_view'] == 'category') { 
			$query_args['cat'] = $_POST['object_data'];	
			$template = 'category_ajax';	
		}		
		if($_POST['page_view'] == 'search') { 
			$query_args['s'] = $_POST['object_data'];	
			$template = 'search_ajax';
		}		
		if($_POST['page_view'] == 'tag') { 
			$query_args['tag_id'] = $_POST['object_data'];	
			$template = 'tag_ajax';
		}		
		if($_POST['page_view'] == 'archive') { 
			$object_data = explode('/', $_POST['object_data']);
			$query_args['year'] = $object_data[0];	
			
			if( isset($object_data[1]) && !empty($object_data[1]) ){
				$query_args['monthnum'] = $object_data[1];
			}
			
			$template = 'archive_ajax';
		}	
		
		$query = new WP_Query( $query_args );		
		set_query_var( 'mazo_query_result', $query );		
		get_template_part('dz-inc/ajax/'. $template);
		wp_reset_postdata();
		wp_die();
	}
	add_action('wp_ajax_load_common_page_posts_ajax', 'mazo_load_common_page_posts_ajax_callback');
	add_action('wp_ajax_nopriv_load_common_page_posts_ajax', 'mazo_load_common_page_posts_ajax_callback');

	
	/*
		AJAX - index page :-
	*/
	function mazo_load_latest_posts_ajax_callback() {
		check_ajax_referer('ajax_security_key', 'security');		
		$mazo_query_result = array();
		$query_args = array(	
			'post_type' 		=> 'post',
			'post_status' 		=> 'publish',
			'posts_per_page'   	=> $_POST['posts_per_page'],	
			'paged' 			=> $_POST['page'],	
			'orderby' 			=> 'post_date',
			'ignore_sticky_posts' => true,
			'order' 			=> 'DESC',
		);			
		
		$query = new WP_Query( $query_args );			
		set_query_var( 'mazo_query_result', $query );		
		get_template_part('dz-inc/ajax/index_ajax');
		wp_reset_postdata();
		wp_die();
	}
	add_action('wp_ajax_load_latest_posts_ajax', 'mazo_load_latest_posts_ajax_callback');
	add_action('wp_ajax_nopriv_load_latest_posts_ajax', 'mazo_load_latest_posts_ajax_callback');
	
	/* Run Code */
	if( !function_exists( 'mazo_shortcode' ) ) {
		function mazo_shortcode($output) {
			return $output;
		}
	}
	/* Run Code END */
	
if(!function_exists('mazo_share_us'))
{

	function mazo_share_us($post_id = '', $post_title = '', $share_on = '')
	{
  
		$social_shaing = mazo_get_opt('social_shaing_on_post');
		
		/* Control Post Sharing */
			if(!$social_shaing)
			{ return false; }
		/* Control Post Sharing END */
		
		$response 			= '';
		$options			= get_option('mazo_theme_options');
		$share_sort_links	= mazo_set($options, 'share_sort_link');
		$social_share_link	= array(
			'facebook'=>'http://www.facebook.com/sharer.php?u='.esc_url(get_permalink($post_id)),
			'twitter'=>'https://twitter.com/share?url='.esc_url(get_permalink($post_id)).'&text='.esc_attr($post_title),
			'google-plus'=>'https://plus.google.com/share?url='.esc_url(get_permalink($post_id)),
			'linkedin'=>'http://www.linkedin.com/shareArticle?url='.esc_url(get_permalink($post_id)).'&title='.esc_attr($post_title),
			'pinterest'=>'http://pinterest.com/pin/create/button/?url='.esc_url(get_permalink($post_id)).'&media='.esc_url(get_the_post_thumbnail_url($post_id)).'&description='.esc_attr($post_title),
			'reddit'=>'http://reddit.com/submit?url='.esc_url(get_permalink($post_id)).'&title='.esc_attr($post_title),
			'tumblr'=>'http://www.tumblr.com/share/link?url='.esc_url(get_permalink($post_id)).'&name='.esc_attr($post_title),
			'digg'=>'http://digg.com/submit?url='.esc_url(get_permalink($post_id)).'&title='.esc_attr($post_title),
		);
		
		if($share_on == 'PostSingle')
		{
			$response = '<div class="dz-share-post"><ul class="dz-social-icon">';
		}else{
			$response = '<div class="dz-share-post"><ul class="dz-social-icon">';
			
		}
		
		if(!empty($share_sort_links))
		{
			foreach($share_sort_links as $icon_key => $icon_value)
			{
			
				$anchor_class = '';
				if($share_on == 'PostSingle')
				{ 
					$icon_key_name = ($icon_key == 'facebook')?'facebook-f':$icon_key;
					$anchor_class = 'fab fa-'.$icon_key_name; 
					
				}else{
					$icon_key_name = ($icon_key == 'facebook')?'facebook-f':$icon_key;
					$anchor_class = 'fab fa-'.$icon_key_name; 
				}
				if($icon_value){
					
					$response .= '<li><a class="'.$anchor_class.'" href="'.esc_url($social_share_link[$icon_key]).'" target="_blank" ></a></li> ';
				}
			}
		}
		if($share_on == 'PostSingle')
		{
			$response .= '</ul></div>';
		}else{
			$response .= '</ul></div>';
		}
		
		return $response;
	}
}

if(!function_exists('mazo_author_social_link'))
{

	function mazo_author_social_arr()
	{
		$author_social_arr = array(
								'url'=>array('icon'=>'fas fa-globe','text'=>'Globe'),
								'facebook'=>array('icon'=>'fab fa-facebook-f','text'=>'Facebook'),
								'twitter'=>array('icon'=>'fab fa-twitter','text'=>'Twitter'),
								'linkedin'=>array('icon'=>'fab fa-linkedin-in','text'=>'Linkedin'),
								'dribbble'=>array('icon'=>'fab fa-dribbble','text'=>'Dribble'),
								'github'=>array('icon'=>'fab fa-github','text'=>'Github'),
								'flickr'=>array('icon'=>'fab fa-flickr','text'=>'Flickr'),
								'google-plus'=>array('icon'=>'fab fa-google-plus','text'=>'Google Plus'),
								'youtube'=>array('icon'=>'fab fa-youtube','text'=>'Youtube'),
								);
								
		return $author_social_arr;
	}
}


function mazo_get_website_logo($logo_key = 'header_logo', $logoclass = '') 
{
	global $mazo_option;
	extract($mazo_option);
	$page_logo_setting = $output = '';
	// Logo Class 
	$class = '';
	
	if($logoclass != 'none' && $logo_key == 'site_other_logo'){
		$class = 'light-logo logo-white';
	}else if($logoclass != 'none' && $logo_key == 'site_logo'){
		$class = 'dark-logo logo-dark';
	}
	$class = !empty($class)?'class="'.$class.'"':'';
	
	// Logo URL
	$logo_url = $$logo_key;
	
	if($logo_type == 'text_logo') 
	{
		$logo_text 	= 	mazo_get_opt('logo_text',esc_html__('Mazo','mazo'));
		$logo_tag 	= 	mazo_get_opt('tag_line',esc_html__('Architecture Theme','mazo'));
		
		$output .= '<div class="text-logo">';
		if(!empty($logo_text)) {
			$output .= '<h1 class="site-title">';
			$output .= '<a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr($logo_title).'">';
			$output .= esc_html($logo_text);
			$output .= '</a>';
			$output .= '</h1>';
		}
		if(!empty($logo_tag)) {
			$output .= '<p class="site-description">';
			$output .= esc_html($logo_tag);
			$output .= '</p>';
		}
		$output .= '</div>';
	}
	else {
		$output .= '<a href="'.esc_url( home_url( '/' ) ).'" '.$class.' title="'.esc_attr($logo_title).'">';
		$output .= '<img src="'.esc_url($logo_url).'" alt="'.esc_attr($logo_alt).'"/>';
		$output .= '</a>';
	}

	echo wp_kses($output, $allowed_html_tags);
}
add_action('mazo_get_logo', 'mazo_get_website_logo',10,4);


function mazo_get_super_user_data($userMeta='') {
	
	$admin_email = get_option('admin_email');
	$adminDetail = get_user_by('email',$admin_email);
	if(isset($adminDetail->data->ID)){
		$userMetaValue = get_the_author_meta($userMeta,$adminDetail->data->ID);
		return $userMetaValue;
	}
}

function mazo_get_super_user_displayname($userMeta="") {
	
	$admin_email = get_option('admin_email');
	$adminDetail = get_user_by('email',$admin_email);

	return $adminDetail->data->display_name;
}

function mazo_get_super_user_description() {
	
	$admin_email = get_option('admin_email');
	$adminDetail = get_user_by('email',$admin_email);
	$meta = get_user_meta($adminDetail->data->ID);
	$description = !empty($meta['description'][0])?$meta['description'][0]:''; 
	return $description;
}

function mazo_get_domain($url)
{
    $pieces = parse_url($url);
    $domain = isset($pieces['host']) ? $pieces['host'] : '';
    if(preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)){
        return $regs['domain'];
    }
    return false;
}
function mazo_get_youtube_video_id($video_url){
	$res = 0;
	if(preg_match("/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/", $video_url, $res)){
		return $res[4];
	}else{
		return 0;
	}
}

/* Show Only One Category : only for demo */
function mazo_get_the_category_list($cat_list,$b)
{
	$category = array();
	$category[] = $cat_list[0]; 
	return $category;
}


/* Show Only One Category : only for demo END */

/* Hide Some Category From Widget : only for demo */
function mazo_exclude_widget_categories($args)
{
	$hide_selected_cat 	= mazo_get_opt('hide_selected_cat');
    if(!empty($hide_selected_cat))
	{
			$hide_selected_cat = implode(',',$hide_selected_cat);
			$args['exclude'] = $hide_selected_cat;
			return $args;
	}
}

/* Hide Some Category From Widget : only for demo END */

/* Show Feature Image In Post Listing */
function mazo_custom_columns( $columns ) 
{
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'featured_image' => 'Image',
        'title' => 'Title',
        'comments' => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
        'author' => 'Author',
        'categories' => 'Cateogies',
        'tags' => 'Tags',
		'date' => 'Date',
     );
    return $columns;
}


function mazo_custom_columns_data( $column, $post_id )
{
    switch ( $column ) {
    case 'featured_image':
        the_post_thumbnail( 'thumbnail' );
        break;
    }
}
/* Show Feature Image In Post Listing END */


function mazo_ext_options()
{
	$show_only_one_cat 			= mazo_get_opt('show_only_one_cat');
	$hide_cat_from_widget 		= mazo_get_opt('hide_cat_from_widget');
	$show_image_on_post_list 	= mazo_get_opt('show_image_on_post_list');
	
	if($show_only_one_cat){
		add_action( 'the_category_list' , 'mazo_get_the_category_list', 10, 2 );
	}
	
	if($hide_cat_from_widget){
		add_filter('widget_categories_args','mazo_exclude_widget_categories');
	}
	if($show_image_on_post_list)
	{
		add_filter('manage_post_posts_columns' , 'mazo_custom_columns');
		add_action( 'manage_post_posts_custom_column' , 'mazo_custom_columns_data', 10, 2 );
	}
}

add_action( 'init' , 'mazo_ext_options');


function mazo_is_theme_sidebar_active(){
	return mazo_get_opt('show_sidebar',true);
}

function mazo_show_post_view_count_view($views)
{
	$post_view_on = mazo_get_opt('post_view_on',false);
	
	$view_html = '';
	if($post_view_on)
	{
		$post_start_view = mazo_get_opt('post_start_view',0);
		$views	= $views + $post_start_view;
		
		$view_html = '<li class="post-view"><i class="ti-eye"></i> <a href="javascript:void(0);"><span>'.wp_kses($views,'string').'</span></a></li>';
	}
	
	return $view_html;
}

function mazo_get_banner()
{
	global $mazo_option;
	
	$header_style = isset($mazo_option['header_style'])?$mazo_option['header_style']:'header_1';
	
	$theme_options = mazo_get_theme_option();
	
	$template_name = 'page_general';
	if(is_page())
	{ 
		$template_name 			= 'page_general';
		$page_banner_setting	= mazo_dzbase()->get_meta('page_banner_setting'); 
	}
	
	$page_banner_setting	= !empty($page_banner_setting)?$page_banner_setting:'theme_default';
	
	$title_prefix			= '';
	
	if(is_author()){
		$template_name	= 'author_page';
		$title_prefix	= esc_html__('Author :', 'mazo');
	}else if(is_search()){
		$template_name	= 'search_page';
		$title_prefix	= esc_html__('Search :', 'mazo');
	}else if(is_category()){
		$template_name	= 'category_page';
		$title_prefix	= esc_html__('Category :', 'mazo');
	}else if( mazo_is_woocommerce_active() && ((function_exists('is_shop') && is_shop()) || (function_exists('is_product_category') && is_product_category()))){
		$template_name	= 'woocommerce_page';
		$title_prefix	= esc_html__('Product :', 'mazo');
	}else if(is_tag()){
		$template_name	= 'tag_page';
		$title_prefix	= esc_html__('Tag :', 'mazo');
	}else if(function_exists('tribe_is_event') && tribe_is_event()){
			
		$template_name	= 'archive_page';
		$title_prefix	= '';
	}else if(is_archive()){
		
		$template_name	= 'archive_page';
		$title_prefix	= esc_html__('Archive :', 'mazo');
	}

	$page_banner_title = $page_banner_sub_title = '';
	
if($page_banner_setting == 'custom')
	{
		$show_banner			= mazo_dzbase()->get_meta('page_banner_on');
		$banner_type			= mazo_dzbase()->get_meta('page_banner_type');
		$banner_layout			= mazo_dzbase()->get_meta('page_banner_layout');
		$banner_height			= mazo_dzbase()->get_meta('page_banner_height');
		$custom_height			= mazo_dzbase()->get_meta('page_banner_custom_height');
		$banner_image			= mazo_dzbase()->get_meta('page_banner');
		$banner_hide			= mazo_dzbase()->get_meta('page_banner_hide');
		$page_banner_title		= mazo_dzbase()->get_meta('page_banner_title');
		$page_banner_sub_title	= mazo_dzbase()->get_meta('page_banner_sub_title');		
		$show_breadcrumb 		= mazo_dzbase()->get_meta('page_breadcrumb');
		$banner_image			= mazo_set($banner_image,'url');
		
	}
	else
	{
		$title_prefix   		= mazo_set($theme_options,$template_name.'_title',$title_prefix);
		$show_banner   			= mazo_set($theme_options,$template_name.'_banner_on',true);
		$banner_type   			= mazo_set($theme_options,$template_name.'_banner_type','image');
		$banner_layout  		= mazo_set($theme_options,$template_name.'_banner_layout','banner_layout_1');
		$banner_height  		= mazo_set($theme_options,$template_name.'_banner_height','page_banner_medium');
		$custom_height  		= mazo_set($theme_options,$template_name.'_banner_custom_height','100');	
		$banner_image   		= mazo_set($theme_options,$template_name.'_banner');
		$banner_image   		= mazo_set($banner_image,'url');
		$show_breadcrumb 		= mazo_set($theme_options,'show_breadcrumb',true);
		$banner_hide   			= mazo_set($theme_options,$template_name.'_banner_hide');
		
	}
	
	$page_heading_classes = 'dz-bnr-inr-entry';
	
	//$banner_class = (empty($banner_image)) ?'bnr-no-img ':'';
	$banner_class = '';
	if($banner_height == 'page_banner_big') {
		$banner_class .= 'dz-bnr-inr overlay-black-middle dz-bnr-inr-lg ';
		$page_heading_classes = 'dz-bnr-inr-entry';
	}else if($banner_height == 'page_banner_medium'){
		$banner_class .= 'dz-bnr-inr overlay-black-middle dz-bnr-inr-md ';
	}else if($banner_height == 'page_banner_small'){
		$banner_class .= 'dz-bnr-inr overlay-black-middle dz-bnr-inr-sm ';
	}else if($banner_height == 'page_banner_custom'){
		//but you can't add height attribute here as per themeforest requirement
		$banner_class .= 'dz-bnr-inr overlay-black-middle ';
	}
	
	if($show_banner)
		{
			if($banner_type == 'image' )
			{
				
				if($banner_layout == 'banner_layout_1'){
					$banner_class .= 'dz-bnr-inr style-1 overlay-black-middle';
					$page_heading_classes = 'dz-bnr-inr-entry';
				}else if($banner_layout == 'banner_layout_2'){
					$banner_class .= 'dz-bnr-inr style-2 overlay-black-middle';
				}else if($banner_layout == 'banner_layout_3'){
					$banner_class .= 'dz-bnr-inr text-center overlay-black-middle';
				}
				
				
				
			?>
      <!-- Banner  -->
	
		<div class="<?php echo esc_attr($banner_class); ?>" <?php if(!empty($banner_image) && empty($banner_hide)) { ?>style="background-image:url(<?php echo esc_url($banner_image); ?>);<?php if($banner_height == 'page_banner_custom'){ ?> height:<?php echo esc_attr($custom_height) ?>px; <?php } ?>" <?php } ?>>
			<div class="container">
				<div class="<?php echo esc_attr($page_heading_classes); ?>">
					<?php if($banner_layout == 'banner_layout_3'){ ?>
					<h1 class="text-white">
					<?php } else { ?>
					<h1>
					<?php } ?>
							<?php 
							
							if(is_page() || is_single()){
								global $post;
								$title = isset($post->post_title)?$post->post_title:'';	
							}else{
								$title = wp_title('',0); 
							}
							
							if($title)
							{
								if(
									mazo_is_woocommerce_active() &&
									(
										(function_exists('is_shop') && is_shop()) || 
										(function_exists('is_product_category') && is_product_category())
									)
								  )
								{
									$title_prefix = ''; /* To remove extra product word from title */
                  
									$page_banner_title = mazo_set($theme_options,'woocommerce_page_title');
								}
								
								if(!empty($page_banner_title))
								{
									$title = $page_banner_title;
								}else{
									$title = $title_prefix.' '.$title;	
								}
								
								echo wp_kses($title,'string');
							}else{
								echo mazo_set($theme_options,'blog_page_title',esc_html__('Blog','mazo'));
							}
							?>
						</h1>
						
						<?php 
							$breadcrumb_class = 'breadcrumb-row';
						?>
						
						<!-- Breadcrumb row -->
						<?php if($show_breadcrumb) { ?>
							<nav aria-label="breadcrumb" class="<?php echo esc_attr($breadcrumb_class); ?>">
								<?php echo mazo_get_the_breadcrumb(); ?>
							</nav>
						<?php } ?>
						<!-- Breadcrumb row END -->
				</div>
			</div>
			<?php if($banner_layout == 'banner_layout_2'){ ?>
				<div class="shap-bx">
					<div class="bg-shape-left"></div>
					<div class="bg-shape-right"></div>
				</div>
			<?php } ?>
		</div>
	
			<?php	
			}		
		}
	
}

function mazo_get_post_banner()
{
	if(!is_single()){ return false; }
	
	global $mazo_option;
	
	$theme_options = mazo_get_theme_option();
	
	$post_key = 'post';
	
	if(is_singular('dz_service')){
		
		$post_key = 'service_post';
		$post_banner_setting	= mazo_dzbase()->get_meta('service_post_banner_setting'); 
		$post_banner_setting	= !empty($post_banner_setting)?$post_banner_setting:'theme_default';
		
	}elseif(is_singular('dz_portfolio')){
		
		$post_key = 'portfolio_post';
		$post_banner_setting	= mazo_dzbase()->get_meta('portfolio_post_banner_setting'); 
		$post_banner_setting	= !empty($post_banner_setting)?$post_banner_setting:'theme_default';
		
	}else{
		$post_banner_setting	= mazo_dzbase()->get_meta('post_banner_setting'); 
		$post_banner_setting	= !empty($post_banner_setting)?$post_banner_setting:'theme_default';
	}
	
	$site_email				= mazo_set($theme_options,'site_email');
	$site_phone_number		= mazo_set($theme_options,'site_phone_number');
	
	
	if($post_banner_setting == 'custom')
		{
			$show_banner	 		= mazo_dzbase()->get_meta($post_key.'_banner_on');
			$banner_layout			= mazo_dzbase()->get_meta($post_key.'_banner_layout');
			$banner_image	 		= mazo_dzbase()->get_meta($post_key.'_banner');
			$banner_height	 		= mazo_dzbase()->get_meta($post_key.'_banner_height');
			$custom_height			= mazo_dzbase()->get_meta($post_key.'_banner_custom_height');
			$banner_image	 		= mazo_set($banner_image,'url');
			$show_breadcrumb 		= mazo_dzbase()->get_meta($post_key.'_breadcrumb');
		}
		else
		{
			$show_banner   		 	= mazo_set($theme_options,'post_general_banner_on',false);
			$banner_height  		= mazo_set($theme_options,'post_general_banner_height','page_banner_medium');
			$custom_height  		= mazo_set($theme_options,'post_general_banner_custom_height','100');	
			$banner_layout  		= mazo_set($theme_options,'post_banner_layout','banner_layout_1');
			$banner_image    		= mazo_set($theme_options,'post_general_banner');
			$banner_image    		= mazo_set($banner_image,'url');
			$show_breadcrumb 		= mazo_set($theme_options,'show_breadcrumb',true);
		}
		
	
	//$banner_class = (empty($banner_image)) ?'bnr-no-img ':'';
	$banner_class =  '';
	if($banner_height == 'page_banner_big') {
		$banner_class .= 'dz-bnr-inr overlay-black-middle dz-bnr-inr-lg ';
		$page_heading_classes = 'dz-bnr-inr-entry';
	}else if($banner_height == 'page_banner_medium'){
		$banner_class .= 'dz-bnr-inr overlay-black-middle dz-bnr-inr-md ';
	}else if($banner_height == 'page_banner_small'){
		$banner_class .= 'dz-bnr-inr overlay-black-middle dz-bnr-inr-sm ';
	}else if($banner_height == 'page_banner_custom'){
		//but you can't add height attribute here as per themeforest requirement
		$banner_class .= 'dz-bnr-inr overlay-black-middle ';
	}
	
	if($show_banner){
			
				if($banner_layout == 'banner_layout_1'){
					$banner_class .= 'dz-bnr-inr style-1 overlay-black-middle';
					$page_heading_classes = 'dz-bnr-inr-entry';
				}else if($banner_layout == 'banner_layout_2'){
					$banner_class .= 'dz-bnr-inr style-2 overlay-black-middle';
				}else if($banner_layout == 'banner_layout_3'){
					$banner_class .= 'dz-bnr-inr text-center overlay-black-middle';
				}
				
			?>
			
      <!-- Banner  -->
	 
		<div class="<?php echo esc_attr($banner_class); ?> " <?php if(!empty($banner_image)) { ?>style="background-image:url(<?php echo esc_url($banner_image); ?>);<?php if($banner_height == 'page_banner_custom'){ ?> height:<?php echo esc_attr($custom_height) ?>px; <?php } ?>" <?php } ?>>
			<div class="container">
				<div class="dz-bnr-inr-entry">
					<?php if($banner_layout == 'banner_layout_3'){ ?>
						<h1 class="text-white">
					<?php } else { ?>
						<h1>
					<?php } ?>
							<?php 
							if(is_home()){
								$posts_page_id = get_option( 'page_for_posts');
								$posts_page = get_page( $posts_page_id);
								$title = isset($posts_page->post_title)?$posts_page->post_title:'';
							}else{
								global $post;
								$title = isset($post->post_title)?$post->post_title:'';								
							}
							
							if($title){
								echo wp_kses($title,'string');
							}else{
								echo mazo_set($theme_options,'blog_page_title',esc_html__('Blog','mazo'));
							}
							?>
						</h1>
						
						<!-- Breadcrumb row -->
						<?php if($show_breadcrumb) { ?>
							<nav aria-label="breadcrumb" class="breadcrumb-row">
								<?php echo mazo_get_the_breadcrumb(); ?>
							</nav>
						<?php } ?>
						<!-- Breadcrumb row END -->
				</div>
			</div>
			
			<?php if($banner_layout == 'banner_layout_2'){ ?>
				<div class="shap-bx">
					<div class="bg-shape-left"></div>
					<div class="bg-shape-right"></div>
				</div>
			<?php } ?>
		</div>
			<?php	
					
		}
	
}



function mazo_is_post_banner_enable()
{
	if(!is_single()){ return false; }
	
	$post_banner_setting	= mazo_dzbase()->get_meta('post_banner_setting'); 
	$post_banner_setting	= !empty($post_banner_setting)?$post_banner_setting:'theme_default';
	
	if($post_banner_setting == 'custom'){
		$show_banner = mazo_dzbase()->get_meta('post_banner_on');
	}else{
		$show_banner = mazo_get_opt('post_general_banner_on');
	}
	$show_banner = (class_exists("ReduxFramework"))?$show_banner:false;
	return $show_banner;
}


function mazo_get_loader()
{
	global $mazo_option;
	$theme_options 	= mazo_get_theme_option();
	$page_loading_on	= mazo_set($mazo_option,'page_loading_on');
	
	if($page_loading_on == 1)
		{
			$page_loader_type	= mazo_set($mazo_option,'page_loader_type','loading_image');
			if($page_loader_type == 'loading_image')
			{
				$custom_preloader = mazo_set($mazo_option['custom_page_loader_image'],'url');
				if($custom_preloader) 
				{
					$preloader = $custom_preloader;
				
				}else{
					$page_loader_image = mazo_set($mazo_option, 'page_loader_image', 'loading1');
					$preloader 	= get_template_directory_uri().'/dz-inc/assets/images/loading-images/'.$page_loader_image.'.svg';
					
					$loader1_default = '';
					if($page_loader_image == 'loading5'){
						$loader1_default = get_template_directory_uri().'/dz-inc/assets/images/loading-images/loading5.gif';
					}elseif($page_loader_image == 'loading6'){
						$loader1_default = get_template_directory_uri().'/dz-inc/assets/images/loading-images/loading6.gif';
					}
				}
			}	
			elseif($page_loader_type == 'advanced_loader')
			{
				$page_loader = mazo_set($mazo_option, 'advanced_page_loader_image', 'loading1');
			}	
		}
	?>


	<?php if($page_loading_on == 1) { ?>
	
	<?php if($page_loader_type == 'loading_image') { 
    
		  $loading_class = '';
		  if($page_loader_image == 'loader_1'){
			$loading_class = 'loading-01';
		  }elseif($page_loader_image == 'loader_2'){
			$loading_class = 'loading-02';
		  }else{
			$loading_class = 'loading-03';
		  }
    
    ?>
	
	<?php if($page_loader_image=='loading1'){  
		
		$site_name = get_bloginfo('name');
		$chars = str_split($site_name);
	?>
		<div id="loading-area">
			<div class="loading-inner style-1">
				<div class="wrapper">
					<svg class="img1" version="1.0" xmlns="http://www.w3.org/2000/svg"
						 width="100.000000pt" height="100.000000pt" viewBox="0 0 100.000000 100.000000"
						 preserveAspectRatio="xMidYMid meet">

						<g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)"
						fill="var(--primary)" stroke="none">
						<path d="M402 988 c-41 -8 -52 -13 -48 -25 21 -53 19 -62 -16 -76 -32 -13 -33
						-13 -52 17 -10 17 -20 33 -21 34 -2 2 -23 -10 -47 -26 -48 -34 -103 -90 -138
						-141 -25 -36 -25 -36 26 -66 14 -9 15 -16 7 -40 -10 -31 -26 -36 -70 -21 -19
						6 -23 2 -30 -31 -10 -47 -10 -165 0 -216 8 -36 9 -37 49 -35 37 3 42 0 51 -27
						8 -24 7 -31 -7 -40 -51 -30 -51 -29 -18 -77 34 -50 111 -122 153 -144 25 -13
						27 -12 45 21 10 19 20 35 22 35 11 0 62 -32 62 -40 0 -5 -5 -21 -10 -36 -6
						-15 -9 -28 -7 -30 2 -2 36 -8 76 -14 66 -9 195 0 210 16 2 2 -1 20 -6 39 -11
						35 -11 36 24 50 20 9 37 14 38 13 1 -2 10 -18 19 -36 l17 -33 31 18 c41 23
						138 120 161 161 l18 31 -33 17 c-18 9 -34 18 -36 19 -2 2 4 17 13 35 17 32 27
						34 78 14 20 -7 33 63 30 161 -3 84 -15 131 -34 127 -58 -14 -66 -13 -71 5 -3
						10 -9 25 -12 34 -5 11 4 20 29 32 l36 17 -18 32 c-24 42 -120 139 -160 161
						l-32 18 -17 -33 c-9 -18 -18 -34 -19 -36 -1 -2 -18 5 -37 14 -34 16 -35 18
						-25 50 6 19 8 36 5 39 -8 9 -109 25 -147 24 -20 -1 -60 -6 -89 -11z m233 -130
						c111 -41 209 -149 235 -259 20 -80 9 -196 -24 -263 -36 -73 -109 -146 -183
						-183 -53 -25 -68 -28 -163 -28 -92 0 -112 3 -160 26 -119 57 -199 163 -222
						296 -48 281 245 514 517 411z"/>
						</g>
					</svg>
					
					<svg class="img2" version="1.0" xmlns="http://www.w3.org/2000/svg"
						 width="100.000000pt" height="100.000000pt" viewBox="0 0 100.000000 100.000000"
						 preserveAspectRatio="xMidYMid meet">

						<g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)"
						fill="var(--primary)" stroke="none">
						<path d="M294 728 c-4 -7 -7 -76 -6 -154 3 -141 3 -141 -22 -158 -14 -9 -28
						-16 -30 -16 -3 0 -7 53 -9 118 l-3 117 -2 -117 -2 -118 -30 0 c-16 0 -30 -2
						-30 -5 0 -3 11 -28 25 -56 34 -67 95 -125 164 -158 48 -22 69 -26 151 -26 84
						0 102 3 152 28 66 33 146 115 170 176 l16 41 -29 0 -29 0 0 100 0 100 -50 0
						-50 0 0 40 c0 39 -1 40 -34 40 -31 0 -34 -3 -40 -40 -5 -32 -10 -40 -28 -40
						-11 0 -27 8 -34 18 -16 21 -47 6 -52 -27 -2 -12 -11 -21 -22 -21 -10 0 -20 -7
						-24 -15 -3 -8 -15 -15 -26 -15 -18 0 -21 5 -19 38 1 20 2 65 1 100 -2 55 -4
						63 -19 60 -16 -3 -19 -21 -23 -158 -7 -204 -23 -205 -30 -1 -3 104 -9 156 -17
						158 -6 2 -15 -2 -19 -9z m306 -168 c0 -13 -7 -20 -20 -20 -13 0 -20 7 -20 20
						0 13 7 20 20 20 13 0 20 -7 20 -20z m160 -1 c0 -17 -5 -20 -37 -17 -27 2 -39
						8 -41 21 -3 14 4 17 37 17 35 0 41 -3 41 -21z m-320 -90 c0 -43 -3 -50 -17
						-47 -14 2 -19 15 -21 51 -3 42 -1 47 17 47 18 0 21 -6 21 -51z m145 14 c-12
						-66 -24 -73 -25 -15 0 41 3 52 16 52 13 0 15 -7 9 -37z m175 -23 c0 -33 -4
						-60 -10 -60 -5 0 -10 5 -10 10 0 6 -6 10 -14 10 -8 0 -17 14 -21 33 -4 17 -9
						40 -11 50 -4 14 1 17 30 17 l36 0 0 -60z"/>
						</g>
					</svg>
					
				</div>
				<?php if(!empty($site_name)){ ?>
					<div class="load-text">
						<?php foreach($chars as $name){ ?>
								<span data-text="<?php echo esc_attr($name); ?>" class="text-load">
									<?php echo esc_html($name); ?>
								</span>
					<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } else if($page_loader_image=='loading2'){ 
	
		
	
	?>
		<div id="loading-area" class="loading-dark-bg">
			<div class="loading-inner style-3">
				<div class="wrapper">
					<span class="loading-text"><?php echo esc_html__('loading','mazo'); ?></span>
					<p class="counter-text"><span class="counter">100</span>%</p>
					<div class="progress"></div>
				</div>
			</div>
		</div>
	<?php } else if($page_loader_image=='loading3'){ 
	
		$site_name = get_bloginfo('name');
		$chars = str_split($site_name);
	?>
		<div id="loading-area">
			<div class="loading-inner style-2">
				<div class="wrapper">
					<img src="<?php echo MAZO_URL ?>assets/images/cloud.png" class="cloud" alt="<?php echo esc_attr__('Image','mazo') ?>">
					<img src="<?php echo esc_url($preloader);?>" alt="<?php echo esc_attr__('Image','mazo') ?>">
				</div>
				<?php if(!empty($site_name)){ ?>
					<div class="load-text">
						<?php foreach($chars as $name){ ?>
								<span data-text="<?php echo esc_attr($name); ?>" class="text-load">
									<?php echo esc_html($name); ?>
								</span>
					<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } else if($page_loader_image=='loading4'){ ?>
		<div id="loading-area">
			<div class="loading-inner style-4">
				<svg width="240px" height="120px" viewBox="0 0 240 120" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<path id="dzloop" class="st1" d="M120.5,60.5L146.48,87.02c14.64,14.64,38.39,14.65,53.03,0s14.64-38.39,0-53.03s-38.39-14.65-53.03,0L120.5,60.5L94.52,87.02c-14.64,14.64-38.39,14.64-53.03,0c-14.64-14.64-14.64-38.39,0-53.03c14.65-14.64,38.39-14.65,53.03,0z">
						<animate attributeName="stroke-dasharray" from="500, 50" to="450 50" begin="0s" dur="2s" repeatCount="indefinite" />
						<animate attributeName="stroke-dashoffset" from="-40" to="-540" begin="0s" dur="2s" repeatCount="indefinite" />
					</path>
					<path id="dzloopoff" d="M146.48,87.02c14.64,14.64,38.39,14.65,53.03,0s14.64-38.39,0-53.03s-38.39-14.65-53.03,0L120.5,60.5L94.52,87.02c-14.64,14.64-38.39,14.64-53.03,0c-14.64-14.64-14.64-38.39,0-53.03c14.65-14.64,38.39-14.65,53.03,0L120.5,60.5L146.48,87.02z"></path>
					<path id="dzsocket" d="M7.5,0c0,8.28-6.72,15-15,15l0-30C0.78-15,7.5-8.28,7.5,0z">
						<animateMotion dur="2s" repeatCount="indefinite" rotate="auto" keyTimes="0;1" keySplines="0.42, 0.0, 0.58, 1.0">
							<mpath xlink:href="#dzloopoff"/>
						</animateMotion>
					</path>
					<path id="dzplug" d="M0,9l15,0l0-5H0v-8.5l15,0l0-5H0V-15c-8.29,0-15,6.71-15,15c0,8.28,6.71,15,15,15V9z">
						<animateMotion dur="2s" rotate="auto" repeatCount="indefinite" keyTimes="0;1" keySplines="0.42, 0, 0.58, 1">
							<mpath xlink:href="#dzloop"/>
						</animateMotion>
					</path>
				</svg>
			</div>
		</div>
	<?php } else if($page_loader_image=='loading5'){ ?>
		<div id="loading-area" class="food-loading" style="background-image: url(<?php echo esc_url($loader1_default);?>);background-repeat: no-repeat; background-position: center;"></div>
	<?php } else if($page_loader_image=='loading6'){ ?>
		<div id="loading-area" class="agriculture-loading" style="background-image: url(<?php echo esc_url($loader1_default);?>);background-repeat: no-repeat; background-position: center;"></div>
	<?php } else {  ?>
	<!-- Preloader -->
	<div id="loading-area" class="<?php echo esc_attr($loading_class); ?>"  style="background-image: url(<?php echo esc_url($preloader);?>);background-repeat: no-repeat; background-position: center;"></div>
	<?php } } ?>
	
	<?php 
	if($page_loader_type == 'advanced_loader' && $page_loader == 'loading1') {
		wp_enqueue_style( 'mazo-loading1', get_template_directory_uri() . '/assets/css/loader/loading1.css' );
	?>
	<div id="loading-area" class="loader2">
		<div class="box-load">
			<div class="load-logo"><?php do_action( 'mazo_get_logo','site_other_logo'); ?></div>
			<h1 class="ml12"><?php echo esc_html__('Your Wait Is Going To Finish','mazo'); ?></h1>
		</div>	
	</div>
	<?php 
		wp_enqueue_script( 'mazo-anime', get_template_directory_uri().'/assets/js/loading/anime.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'mazo-anime-app3', get_template_directory_uri().'/assets/js/loading/anime-app3.js', array( 'jquery' ), '1.0', true );
	}elseif($page_loader_type == 'advanced_loader' && $page_loader == 'loading2') {
		wp_enqueue_style( 'mazo-loading2', get_template_directory_uri() . '/assets/css/loader/loading2.css' );
	?>
	<div id="loading-area" class="line-loader">
		<svg viewBox="0 0 960 300">
			<symbol id="s-text">
				<text text-anchor="middle" x="50%" y="80%"><?php echo get_bloginfo('name'); ?></text>
			</symbol>
			<g class = "g-ants">
				<use xlink:href="#s-text" class="text-copy"></use>
				<use xlink:href="#s-text" class="text-copy"></use>
				<use xlink:href="#s-text" class="text-copy"></use>
				<use xlink:href="#s-text" class="text-copy"></use>
				<use xlink:href="#s-text" class="text-copy"></use>
			</g>
		</svg>
	</div>
	<?php 
		}  
	} 
}


function mazo_isAMultipleOf4($n) 
{ 
    // if true, then 'n' is a multiple of 4 
    if (($n & 3) == 0) 
        return true; 
  
    // else 'n' is not a multiple of 4 
    return false; 
} 

/* Change Default WordPress Pages Sorting */
function mazo_change_default_pages_post_order( $query ) 
{
	$template_name = '';
	
	if($query->is_author() && $query->is_main_query() ){
		$template_name	= 'author_page';
	}else if($query->is_search() && $query->is_main_query() ){
		$template_name	= 'search_page';
	}else if( $query->is_category() && $query->is_main_query() ){
		$template_name	= 'category_page';
	}else if($query->is_tag() && $query->is_main_query() ){
		$template_name	= 'tag_page';
	}else if($query->is_archive() && $query->is_main_query() ){
		$template_name	= 'archive_page';
	}
	
	if(!empty($template_name) && !is_admin() && function_exists('is_shop') && !is_shop())
	{
		$sorting_on = mazo_get_opt($template_name.'_sorting_on');
		if($sorting_on)
		{
			$sorting	= mazo_get_opt($template_name.'_sorting');
			
			if($sorting	== 'most_visited')
			{
				$order	=	'asc';
				$query->set('meta_key', '_views_count');
				$query->set('orderby', 'meta_value_num');	
				
			}else{
				$sort_arr	= explode('_',$sorting);
				$orderby 	= !empty($sort_arr[0]) ? $sort_arr[0]:'date';
				$order 		= !empty($sort_arr[1]) ? $sort_arr[1]:'DESC';	
				
				$query->set('orderby', $orderby);	
			}
			
			$query->set('order', $order);	
		}
	}
}

add_action( 'pre_get_posts', 'mazo_change_default_pages_post_order' );
/* Change Default WordPress Pages Sorting END */

/* Change Body Layout */
function mazo_body_layout_class( $classes ) {
	
	global $mazo_option;
	
	$theme_layout = mazo_get_opt('theme_layout','theme_layout_1');
	$theme_corner = mazo_set($mazo_option, 'theme_corner', 'sharped');
	$theme_font_style = mazo_set($mazo_option, 'theme_font_style', 'default');
	if(!empty($theme_layout))
	{
		$class = '';
		if($theme_layout == 'theme_layout_2') 
		{
			/* Boxed Layout */
			$class .= 'boxed';	
		}else if($theme_layout == 'theme_layout_3')
		{
			/* Frame Layout */
			$class .= 'frame';
		}
		
		
		if($theme_corner == 'rounded'){
		$class .= ' theme-rounded';
		}else if($theme_corner == 'sharped'){
			$class .= ' theme-sharped';
		}else{
			$class .= ' theme-rounded';
		}
        
        
        if($theme_font_style == 'oswald_style'){
            $class .= ' font-style-1';
		}else if($theme_font_style == 'montserrat_style'){
			$class .= ' font-style-2';
		}else{
			$class .= '';
		}
		
		return array_merge( $classes, array( $class ) );
	}
    
    
	
	return $classes;
	
}
add_filter( 'body_class', 'mazo_body_layout_class');

function mazo_body_layout_class_not_in_use( $classes ) 
{
	$class = '';
	
	$theme_layout = mazo_get_opt('theme_layout');
	$theme_mode = mazo_get_opt('theme_mode');
	
	// Theme Layout
	if(!empty($theme_layout))
	{
		
		if($theme_layout == 'theme_layout_2') 
		{
			/* Boxed Layout */
			$class .= ' boxed';	
		}else if($theme_layout == 'theme_layout_3')
		{
			/* Frame Layout */
			$class .= ' frame';
		}
		
	}
	
	//Theme Mode
	if(!empty($theme_mode) && $theme_mode == 'dark')
	{
		$class .= ' layout-dark';	
	}
	
	if(!empty($_GET['theme_mode']) && $_GET['theme_mode'] == 'dark'){
		$class .= ' layout-dark';
	}else{
		$class .= ' layout-light';
	}
	
	return array_merge( $classes, array( $class ) );
	
}
/* Change Body Layout END */

/* Change Body Layout Style */
function mazo_body_layout_style() 
{
	$theme_options = mazo_get_theme_option();
	$theme_layout  = mazo_set($theme_options,'theme_layout','theme_layout_1');
	$style = '';
	if(!empty($theme_layout) && $theme_layout != 'theme_layout_1')
	{
		$output   = '';
		$bg_type  = mazo_set($theme_options,'body_boxed_bg_type');
		if($bg_type == 'bg_type_color')
		{
			$bg_color  = mazo_set($theme_options,'boxed_layout_bg_color');
			$custom_bg_color  = mazo_set($theme_options,'boxed_layout_custom_bg_color');
			
			if(!empty($custom_bg_color['color']))
			{
				$output = 'background-color:'.$custom_bg_color['color'].';';
			}else if(!empty($bg_color))
			{
				$output = 'background-color:'.$bg_color.';';
			}
		}else if($bg_type == 'bg_type_image')
		{
			$bg_image  = mazo_set($theme_options,'boxed_layout_bg_image');
			$custom_bg_image  = mazo_set($theme_options,'boxed_layout_custom_bg_image');
			
			if(!empty($custom_bg_image['url']))
			{
				$output = 'background-image:url('.$custom_bg_image['url'].'); background-size: auto;';
			}else if(!empty($bg_image))
			{
				$bg_image = get_template_directory_uri().'/assets/images/switcher/background/'.$bg_image.'.jpg';
				$output = 'background-image:url('.$bg_image.'); background-size: auto;';
			} 
			
		}else if($bg_type == 'bg_type_pattern')
		{
			$bg_pattern  = mazo_set($theme_options,'boxed_layout_bg_pattern');
			$custom_bg_pattern  = mazo_set($theme_options,'boxed_layout_custom_bg_pattern');
			
			$custom_bg_pattern_padding  = mazo_set($theme_options,'boxed_layout_bg_pattern_padding');
			
			if(!empty($custom_bg_pattern['url']))
			{
				$output = 'background-image:url('.$custom_bg_pattern['url'].'); background-size: auto;';
			}else if(!empty($bg_pattern))
			{
				$bg_pattern = get_template_directory_uri().'/assets/images/switcher/pattern/'.$bg_pattern.'.jpg';
				$output = 'background-image:url('.$bg_pattern.'); background-size: auto;';
			}			
		}
		
		if($theme_layout == 'theme_layout_3' && !empty($custom_bg_pattern_padding)){
			$output .= 'padding:'.$custom_bg_pattern_padding.'px;';
		}
		$style = 'style="'.$output.'"';	
				
		
	}
	
	echo wp_kses($style, mazo_allowed_html_tag());
}
/* Change Body Layout Style END */


/* Get Post Meta Data */
function mazo_get_post_meta( $post_id, $meta_key ) 
{
	$value = get_post_meta($post_id,$meta_key);
	$value = !empty($value[0])?$value[0]:'';
	return $value;
}
/* Get Post Meta Data END */


function mazo_get_category_by_post_id($post_id)
    {
       $cats = '';
       $cat_list = get_the_category($post_id);
        if(!empty($cat_list))
        {
          foreach($cat_list as $cat)
          {
              $cats .= '<a href="'.esc_url(get_category_link($cat->term_id)).'" class="post-link-in">'.esc_html($cat->name).'</a>';
          }
        }
        
        return $cats;
    }
	
function mazo_get_cpt_category($cat_list, $seprator=' ')
    {
       $cats = '';
       if(!empty($cat_list))
        {
          foreach($cat_list as $cat)
          {
			$cats .= '<a href="'.esc_url(get_category_link($cat->term_id)).'">'.esc_html($cat->name).'</a>'.$seprator;
		  }
		  $cats = rtrim($cats,$seprator);
        }
        return $cats;
    }	
	

function mazo_filtered_output($output) {
    return apply_filters('mazo_filtered_output', $output);
}

function mazo_generate_uniq_id($atts)
{
    $atts = (gettype($atts) == 'object') ? json_decode(json_encode($atts), true) : $atts;
    return 'a' . md5(implode($atts));
}

if( !function_exists( 'mazo_generate_rand_number' ) )
{
	function mazo_generate_rand_number($digit=6)
	{
	  $no = substr(strtoupper(md5(uniqid(rand()))),0,$digit);
	  return $no;
	}
}

if( !function_exists( 'mazo_get_container' ) )
{
	function mazo_get_container($is_sidebar)
	{
	  $container = ($is_sidebar)?'container':'min-container';
	  return $container;
	}
}

if(!function_exists( 'mazo_get_post_tags' ) )
{
	function mazo_get_post_tags($post_id)
	{
		 $tag_arr = get_the_tags($post_id);
		 
		$output = '';
		if(!empty($tag_arr))
		{
			 $tag_count = count($tag_arr);
			 $output = '<strong>'.esc_html__('Tags:','mazo').'</strong> ';
			 foreach($tag_arr as $tag_index => $tag)
			 {
				$tag_name = ($tag_index+1 == $tag_count) ? $tag->name : $tag->name; 
				$output .= '<a href="'.esc_url(get_tag_link($tag->term_id)).'">'.esc_html($tag_name).'</a>';
			 }
			 $output .= '';
		}
		
		echo wp_kses($output, mazo_allowed_html_tag());
	}
}

if(!function_exists( 'mazo_get_cat_id_by_slug' ) )
{
	/* Slugs may be array or comma seperated string */
	function mazo_get_cat_id_by_slug($slugs,$taxonomy='category')
	{	
		$cat_id = array();
		if(!is_array($slugs)){
			$slugs = explode(',',$slugs);
		}
		
		if(!empty($slugs)){
			foreach($slugs as $slug){
				$category	= get_term_by('slug',$slug,$taxonomy);
				if(!empty($category->term_id)){
					$cat_id[]	= $category->term_id;
				}
			}
		}
		
		return $cat_id;
	}
}

/* Deafault Search Filter: remove pages from search */

add_filter('register_post_type_args', 'mazo_filter_search_result', 10, 2);

if(!function_exists( 'mazo_filter_search_result' ) )
{
	function mazo_filter_search_result($args, $post_type) 
	{
		if (!is_admin() && $post_type == 'page') 
		{
			$args['exclude_from_search'] = true;
		}
		return $args;
	}
}



if(!function_exists( 'mazo_allowed_html_tag' ) )
{
	function mazo_allowed_html_tag() 
	{
		global $mazo_option;
		
		if(!empty($mazo_option)){
		    $allowed_html_tags = mazo_set($mazo_option,'allowed_html_tags');
		}else{
		    $allowed_html_tags = wp_kses_allowed_html('post');
		}
		$allowed_html_tags = !empty($allowed_html_tags)?$allowed_html_tags:'string';
		return $allowed_html_tags;
	}
}

/* Elementor Function */
function mazo_elementor_get_anchor_attribute($btn_link)
{
	$anchor_attribute = '';
	
	if(isset($btn_link['is_external']) && $btn_link['is_external']=='on'){
		$anchor_attribute .= ' target=_blank ';
	}
	
	if(isset($btn_link['nofollow']) && $btn_link['nofollow']=='on'){
		$anchor_attribute .= ' rel=nofollow';
	}
	
	if(!empty($btn_link['custom_attributes'])){
		$attr_arr = explode(',',$btn_link['custom_attributes']);
		
		if(!empty($attr_arr)){
			foreach($attr_arr as $key => $value){
				$attr_data = explode('|',$value);
				$anchor_attribute .= ' '.$attr_data[0].'='.$attr_data[1].'';
			}
		}
	}
	
	return $anchor_attribute;
}


/* CPT Team Social Links */
function mazo_get_team_social_link($post_id){
	$team_social_data = array(
							'any_fill'=>false,
							'data'=>array()
						);
	
	$team_socials	= array(
		'facebook'=>array(
			'key'  => 'team_social_facebook',	
			'class'=> 'fab fa-facebook-f',
			'url'=> ''
		),
		'twitter'=>array(
			'key'=>'team_social_twitter',	
			'class'=>'fab fa-twitter',
			'url'=> ''
		),
		'instagram'=>array(
			'key'=>'team_social_instagram',
			'class'=>'fab fa-instagram',
			'url'=> ''
		),
		'youtube'=>array(
			'key'=>'team_social_youtube',	
			'class'=>'fab fa-youtube',
			'url'=> ''
		)
	);
					
	
	foreach($team_socials as $key => $value){
		$team_socials[$key]['url'] = mazo_get_post_meta($post_id,$value['key']);
		
		if(!empty($team_socials[$key]['url'])){
			$team_social_data['any_fill'] = true;
		}
	}
	
	$team_social_data['data'] = $team_socials;
	
	return $team_social_data;
	
}


/* Change Theme Direction LTR - RTL */
function theme_direction(){
	global $mazo_option;
	
	$rtl = mazo_set($mazo_option, 'rtl_on');
	
	if($rtl){
		echo 'dir="rtl"';
	}
	
	return false;
}

/**
 * Check if plugin is active
 **/
function mazo_check_plugin_active($plugin){
	if ( in_array( $plugin, apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		return true;
	}else{
		return false;
	}
}

/* Get lazy loading image url */

function dz_get_lazy_loading_image_url() {
    return MAZO_URL . 'assets/images/loading.svg';
}



/* Get background image with placeholder loading image */

function dz_get_lazy_loading_bg_img($attachment_id, $size="thumbnail", $attr=NULL) {

    $lazy_load_image =  dz_get_lazy_loading_image_url();
    return 'style="background-image: url('.esc_url($lazy_load_image).');'.$attr.'" data-src="'.esc_url(wp_get_attachment_image_url($attachment_id,$size)).'"';
}

/* Get get image */

function dz_get_image($attachment_id, $size="thumbnail", $attr=NULL, $icon = false, $echo = true) {
    
    $allowed_html_tag = mazo_allowed_html_tag();
    $imgTag = wp_get_attachment_image($attachment_id, $size, $icon, $attr);

    if($echo) {
        echo wp_kses($imgTag,$allowed_html_tag);
    } else {
        return wp_kses($imgTag,$allowed_html_tag);
    }
}

function isWebsiteReadyForVisitor($website_status)
{
	if($website_status == 'live_mode'  
		|| (in_array($website_status, array('comingsoon_mode','maintenance_mode')) && is_user_logged_in())
	) 
	{
		return true;
	}else{
		return false;
	}
} 

function pr($value){
	echo '<pre>';
	print_r($value);
	echo '</pre>';
}