<?php
  //Footer Widget Start
  
  //Latest Post
  class Mazo_DZ_Recent_Post extends WP_Widget
  {
    /** constructor */
    function __construct()
    {
      parent::__construct( /* Base ID */'Mazo_DZ_Recent_Post', /* Name */esc_html__('Mazo Recent Post','mazo'), array( 'description' => esc_html__('Show the footer recent posts sidebar', 'mazo' )) );
    }
    
    /** @see WP_Widget::widget */
    function widget($args, $instance)
    {
      extract( $args );
      $title = apply_filters( 'widget_title', $instance['title'] );
	  
	  $allowed_html_tags = mazo_allowed_html_tag();
	  
    echo wp_kses($before_widget,  $allowed_html_tags); ?>
    <div class="widget-column">
		
			<?php echo wp_kses($before_title.$title.$after_title,  $allowed_html_tags); ?>
			
      <div class="recent-posts-entry style-1">
		  <?php $query_string = 'posts_per_page='.$instance['number'];
					if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
          
					$this->posts($query_string);  
        ?>
      </div>
    </div>
    
		<?php echo wp_kses($after_widget,  $allowed_html_tags);
    }
    
    /** @see WP_Widget::update */
    function update($new_instance, $old_instance)
    {
      $instance = $old_instance;
      
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['number'] = $new_instance['number'];
      $instance['cat'] = $new_instance['cat'];
      
      return $instance;
    }
    
    /** @see WP_Widget::form */
    function form($instance)
    {
      $title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Recent Post', 'mazo');
      $number = ( $instance ) ? esc_attr($instance['number']) : 3;
    $cat = ( $instance ) ? esc_attr($instance['cat']) : ''; ?>
		
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'mazo'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'mazo'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'mazo'); ?></label>
      <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'mazo'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
    </p>
    
		<?php 
    }
    
    function posts($query_string)
    {
      $query = new WP_Query($query_string);
    if( $query->have_posts() ):?>
    <!-- Title -->
    <?php while( $query->have_posts() ): $query->the_post(); ?>
    <!-- Widget Post -->
    <div class="widget-post-bx">
      <div class="widget-post clearfix">
        <div class="dz-media"> <?php the_post_thumbnail('thumbnail'); ?> </div>
        <div class="dz-info">
          <div class="dz-post-header">
            <h6 class="title"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php echo mazo_trim(get_the_title(),5); ?></a></h6>
          </div>
          <div class="dz-meta">
            <ul>
				<li class="post-date"> 
					<i class="flaticon-calendar"></i>
					<?php echo esc_html(get_the_date()); ?> 
				</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile;
      endif;
      wp_reset_postdata();
    }
  }
  
  
  
  
  
  
  
//Footer Nevigation
class Mazo_DZ_Navigation extends WP_Widget
{

/** constructor */
function __construct()
{
  parent::__construct( /* Base ID */'Mazo_DZ_Navigation', /* Name */esc_html__('Mazo Navigation','mazo'), array( 'description' => esc_html__('Show the Navigation', 'mazo' )) );
}

/** @see WP_Widget::widget */
function widget($args, $instance)
{
  extract( $args );
  
  $title = apply_filters( 'widget_title', $instance['title'] );
  
  $allowed_html_tags = mazo_allowed_html_tag();
  
  echo wp_kses($before_widget, $allowed_html_tags);
	
	?>
	
	<div class="sticky-top">
		<?php if($instance['menu_style']=='style_1'){ ?>
			<div class="ext-sidebar-menu">
					<?php 
					if(!empty($title)){
						echo wp_kses($before_title.$title.$after_title, $allowed_html_tags); 
					}
					
					?>
			  <?php 
			  
				$menu_items = wp_get_nav_menu_items($instance['selected_menu']);  
			  ?>
			  <ul>
					<?php 
					
					foreach($menu_items as $menu_item){ 
					$active_class = ( $menu_item->object_id == get_queried_object_id() ) ? 'active' : '';
					?>
					<li class="<?php echo esc_attr($active_class); ?>">
					  <a href="<?php echo esc_url($menu_item->url); ?>"><?php echo esc_html($menu_item->title); ?></a>
					</li>
					<?php } ?>
			  </ul>
			</div>
		<?php } if($instance['menu_style']=='style_2'){ ?>
		<div class="widget_categories">
					<?php 					
						if(!empty($title)){
							echo wp_kses($before_title.$title.$after_title, $allowed_html_tags); 
						}
					?>
			  <?php 
			  
			  $menu_items = wp_get_nav_menu_items($instance['selected_menu']);  
			  ?>
			  <ul class="list-2">
				<?php 
				foreach($menu_items as $menu_item){ 
				?>
				<li>
				  <a href="<?php echo esc_url($menu_item->url); ?>">
					<?php echo esc_html($menu_item->title); ?>
				  </a>
				</li>
				<?php  } ?>
			  </ul>
		</div>
	<?php } ?>
	
	<?php if($instance['menu_style']=='style_3'){ ?>
		<div class="widget_categories">
					<?php 
					
						if(!empty($title)){
							echo wp_kses($before_title.$title.$after_title, $allowed_html_tags); 
						}

					?>
			  <?php 
			  
			  $menu_items = wp_get_nav_menu_items($instance['selected_menu']);  
			  ?>
			  <ul class="list-1">
				<?php 
				
				foreach($menu_items as $menu_item){ 
					
				?>
				<li class="cat-item">
				  <a href="<?php echo esc_url($menu_item->url); ?>">
					<?php echo esc_html($menu_item->title); ?>
				  </a>
				</li>
				<?php  } ?>
			  </ul>
		</div>
	<?php } ?>
	
	
	
	
	
	
	</div>

	<?php
	
	 echo wp_kses($after_widget, $allowed_html_tags);
  
}


/** @see WP_Widget::update */
function update($new_instance, $old_instance)
{
  $instance = $old_instance;
  
  $instance['title'] = strip_tags($new_instance['title']);
  $instance['menu_style'] = strip_tags($new_instance['menu_style']);
  $instance['selected_menu'] = strip_tags($new_instance['selected_menu']);
  
  
  
  return $instance;
}

/** @see WP_Widget::form */
function form($instance)
{
  $title = ($instance) ? esc_attr($instance['title']) : esc_html__('Navigation', 'mazo');
  $selected_menu = ! empty( $instance['selected_menu'] ) ? $instance['selected_menu'] : "";
  $menu_style = ! empty( $instance['menu_style'] ) ? $instance['menu_style'] : "";
?>

<p>
  <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'mazo'); ?></label>
  <input placeholder="<?php esc_attr_e('Menu', 'mazo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
</p>
<p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'Select Menu' ) ); ?>"><?php esc_html_e( 'Select Menu:', 'mazo' ); ?></label> 
  <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'selected_menu' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'selected_menu' ) ); ?>">
			<?php 
				
				$all_menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
				foreach (  $all_menus as $menu ) {
					
				
				$selected = ($selected_menu == $menu->slug )?  ' selected="selected" ':'';
			?>
				<option value="<?php echo esc_attr($menu->slug);?>" <?php echo esc_attr($selected); ?> ><?php echo  esc_html($menu->name); ?></option>
	  <?php 
	  }
	  
	?>
  </select>
</p>
<p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'Select Menu Style' ) ); ?>"><?php esc_html_e( 'Select Menu Style:', 'mazo' ); ?></label> 
  <?php
	$style_arr = array(
					'style_1'=>esc_html__('Style 1','mazo'),
					'style_2'=>esc_html__('Style 2','mazo'),
					'style_3'=>esc_html__('Style 3','mazo'),
				);
  ?>
  <select data="<?php echo esc_attr($menu_style) ?>"
  class="widefat" 
  id="<?php echo esc_attr( $this->get_field_id( 'menu_style' ) ); ?>" 
  name="<?php echo esc_attr( $this->get_field_name( 'menu_style' ) ); ?>"
  >
	<option value=""><?php echo esc_html__('Choose Style','mazo'); ?></option>
	<?php foreach($style_arr as $style_key => $style_value ){ 
		$style_selected = ($style_key == $menu_style)?'selected="selected"':'';
	?>
	<option value="<?php echo sanitize_title($style_key); ?>" <?php echo esc_attr($style_selected); ?> ><?php echo esc_html($style_value); ?></option>
	<?php } ?>
  </select>
</p>  



	<?php 
}

}

//Our Portfolio
class Mazo_DZ_project extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Mazo_DZ_project', /* Name */esc_html__('Mazo Our Portfolio','mazo'), array( 'description' => esc_html__('Show the Our Projects', 'mazo' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		$allowed_html_tags = mazo_allowed_html_tag();
		
		echo wp_kses($before_widget, $allowed_html_tags); ?>
        <!-- Our Projects -->
        <div class="widget_gallery gallery-grid-2">
			<?php echo wp_kses($before_title.$title.$after_title, $allowed_html_tags); ?>
				<ul class="lightgallery">
                <?php 
					$args = array('post_type' => 'dz_portfolio', 'showposts'=>$instance['number']);
					if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'portfolio_category','field' => 'id','terms' => (array)$instance['cat']));
					query_posts($args); 
					$this->posts();
					wp_reset_query();
				?>
            </ul>
        </div>

        <?php echo wp_kses($after_widget, $allowed_html_tags);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Our Projects', 'mazo');
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'mazo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'mazo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'mazo'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'mazo'), 'selected'=>$cat, 'taxonomy' => 'portfolio_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts()
	{
		
		if( have_posts() ):?>
			
           	<!-- Title -->
            <?php while( have_posts() ): the_post(); 
				global $post ; 
			?>
            <li><div class="dlab-post-thum dlab-img-effect"><span data-exthumbimage="<?php echo esc_url(get_the_post_thumbnail_url(get_the_id() , 'thumbnail')); ?>" data-src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_id() , 'full')); ?>" class="lightimg" title="<?php echo the_title_attribute(); ?>"> <?php the_post_thumbnail('thumbnail'); ?></span> </div></li>
            <?php endwhile; ?>
                
        <?php endif;
    }	
}


//Contact Us
class Mazo_DZ_Contact_Us extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Mazo_DZ_Contact_Us', /* Name */esc_html__('Mazo Contact Us','mazo'), array( 'description' => esc_html__('Show the information about Contact', 'mazo' )) );
	}
	
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
	
		if(strpos($before_widget,'footer-sidebar-1')){
			$before_widget = str_replace('col-lg-2','col-lg-4',$before_widget);
		}
		$before_widget = str_replace('substitute-class','widget_getintuch',$before_widget);
		
		$allowed_html_tags = mazo_allowed_html_tag();
		
		echo wp_kses($before_widget, $allowed_html_tags); 
		?>
      	
		<?php echo wp_kses($before_title.$title.$after_title, $allowed_html_tags); ?>
			<ul>
				<?php if(!empty($instance['address'])){ ?>
					<li>
						<i class="fas fa-map-marker-alt"></i>
						<span> <?php echo wp_kses($instance['address'],'string'); ?> </span>
					</li>
				<?php } ?>
				
				<?php if(!empty($instance['phone'])){ ?>
					<li>
						<i class="fas fa-phone-alt"></i>
						<span><?php echo wp_kses($instance['phone'],$allowed_html_tags); ?></span>
					</li>
				<?php } ?>
				
				<?php if(!empty($instance['email'])){ ?>
					<li>
						<i class="fas fa-envelope"></i>
						<span><?php echo wp_kses($instance['email'],$allowed_html_tags); ?></span>
					</li>
				<?php } ?>
			</ul>
			<?php if(!empty($instance['btn_url'])){ ?>
				<a class="btn-link style-2" href="<?php echo esc_url($instance['btn_url'],'mazo'); ?>"><?php echo wp_kses($instance['btn_text'],'string'); ?> <i class="m-l5 las la-plus"></i></a>
			<?php } ?>
		<?php echo wp_kses($after_widget, $allowed_html_tags);
	}
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['address'] = $new_instance['address'];
		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];
		$instance['btn_text'] = $new_instance['btn_text'];
		$instance['btn_url'] = $new_instance['btn_url'];

		return $instance;
	}
	
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : esc_html__('CONTACT US', 'mazo');
		$address = !empty($instance['address']) ? $instance['address'] : '';
		$phone = !empty($instance['phone']) ? $instance['phone'] : '';
		$email = !empty($instance['email']) ? $instance['email'] : '';
		$email = !empty($instance['btn_text']) ? $instance['btn_text'] : '';
		$email = !empty($instance['btn_url']) ? $instance['btn_url'] : '';
		
		?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Contact Us:', 'mazo'); ?></label>
            <input placeholder="<?php esc_html_e('Contact us', 'mazo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address Here:', 'mazo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses($address, 'string'); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone Number Here:', 'mazo'); ?></label>
            <input placeholder="<?php esc_attr_e('Enter number', 'mazo'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email Here:', 'mazo'); ?></label>
            <input placeholder="<?php esc_attr_e('Enter email', 'mazo'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_text')); ?>"><?php esc_html_e('Button Text:', 'mazo'); ?></label>
            <input placeholder="<?php esc_html_e('Contact us', 'mazo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_text')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_text')); ?>" type="text" value="<?php echo esc_attr($btn_text); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_url')); ?>"><?php esc_html_e('Button Url:', 'mazo'); ?></label>
            <input placeholder="<?php esc_html_e('https://', 'mazo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_url')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_url')); ?>" type="text" value="<?php echo esc_attr($btn_url); ?>" />
        </p>
		<?php 
	}
}


//Contact Us
class Mazo_DZ_Contact_Us2 extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Mazo_DZ_Contact_Us2', /* Name */esc_html__('Mazo Contact Us 2','mazo'), array( 'description' => esc_html__('Show the information about Contact', 'mazo' )) );
	}
	
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
	
		if(strpos($before_widget,'footer-sidebar-1')){
			$before_widget = str_replace('col-lg-2','col-lg-4',$before_widget);
		}
		$before_widget = str_replace('substitute-class','widget_getintuch',$before_widget);
		
		$allowed_html_tags = mazo_allowed_html_tag();
		
		echo wp_kses($before_widget, $allowed_html_tags); 
		?>
      	
		<?php echo wp_kses($before_title.$title.$after_title, $allowed_html_tags); ?>
			<ul>
				<?php if(!empty($instance['address'])){ ?>
					<li>
						<i class="flaticon-placeholder"></i>
						<span> <?php echo wp_kses($instance['address'],'string'); ?> </span>
					</li>
				<?php } ?>
				
				<?php if(!empty($instance['phone'])){ ?>
					<li>
						<i class="flaticon-phone-call"></i>
						<span><?php echo wp_kses($instance['phone'],$allowed_html_tags); ?></span>
					</li>
				<?php } ?>
				
				<?php if(!empty($instance['email'])){ ?>
					<li>
						<i class="flaticon-mail"></i>
						<span><?php echo wp_kses($instance['email'],$allowed_html_tags); ?></span>
					</li>
				<?php } ?>
			</ul>
			<?php if(!empty($instance['btn_url'])){ ?>
				<a class="btn-link style-2" href="<?php echo esc_url($instance['btn_url'],'mazo'); ?>"><?php echo wp_kses($instance['btn_text'],'string'); ?> <i class="m-l5 las la-plus"></i></a>
			<?php } ?>
		<?php echo wp_kses($after_widget, $allowed_html_tags);
	}
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['address'] = $new_instance['address'];
		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];
		$instance['btn_text'] = $new_instance['btn_text'];
		$instance['btn_url'] = $new_instance['btn_url'];

		return $instance;
	}
	
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : esc_html__('CONTACT US', 'mazo');
		$address = !empty($instance['address']) ? $instance['address'] : '';
		$phone = !empty($instance['phone']) ? $instance['phone'] : '';
		$email = !empty($instance['email']) ? $instance['email'] : '';
		$btn_text = !empty($instance['btn_text']) ? $instance['btn_text'] : '';
		$btn_url = !empty($instance['btn_url']) ? $instance['btn_url'] : '';
		
		?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Contact Us:', 'mazo'); ?></label>
            <input placeholder="<?php esc_html_e('Contact us', 'mazo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address Here:', 'mazo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses($address, 'string'); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone Number Here:', 'mazo'); ?></label>
            <input placeholder="<?php esc_attr_e('Enter number', 'mazo'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email Here:', 'mazo'); ?></label>
            <input placeholder="<?php esc_attr_e('Enter email', 'mazo'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_text')); ?>"><?php esc_html_e('Button Text:', 'mazo'); ?></label>
            <input placeholder="<?php esc_html_e('Contact us', 'mazo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_text')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_text')); ?>" type="text" value="<?php echo esc_attr($btn_text); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_url')); ?>"><?php esc_html_e('Button Url:', 'mazo'); ?></label>
            <input placeholder="<?php esc_html_e('https://', 'mazo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_url')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_url')); ?>" type="text" value="<?php echo esc_attr($btn_url); ?>" />
        </p>
		<?php 
	}
}

/* Booking Contact Start */
//Contact Us
class Mazo_DZ_Contact_Us3 extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Mazo_DZ_Contact_Us3', /* Name */esc_html__('Mazo Contact Us 3','mazo'), array( 'description' => esc_html__('Show the information about Contact', 'mazo' )) );
	}
	
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
	
		$allowed_html_tags = mazo_allowed_html_tag();
		
		echo wp_kses($before_widget, $allowed_html_tags); 
		?>
      	<div class="booking-contact widget_getintuch">
		<?php echo wp_kses($before_title.$title.$after_title, $allowed_html_tags); ?>
			<ul>
				<?php if(!empty($instance['address'])){ ?>
					<li>
						<i class="fas fa-map-marker-alt"></i>
						<span> <?php echo wp_kses($instance['address'],$allowed_html_tags); ?> </span>
					</li>
				<?php } ?>
				
				<?php if(!empty($instance['phone'])){ ?>
					<li>
						<i class="fas fa-phone-alt"></i>
						<span><?php echo wp_kses($instance['phone'],$allowed_html_tags); ?></span>
					</li>
				<?php } ?>
				
				<?php if(!empty($instance['email'])){ ?>
					<li>
						<i class="fas fa-envelope"></i>
						<span><?php echo wp_kses($instance['email'],$allowed_html_tags); ?></span>
					</li>
				<?php } ?>
			</ul>
		</div>
		<?php echo wp_kses($after_widget, $allowed_html_tags);
	}
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['address'] = $new_instance['address'];
		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];

		return $instance;
	}
	
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : esc_html__('CONTACT US', 'mazo');
		$address = !empty($instance['address']) ? $instance['address'] : '';
		$phone = !empty($instance['phone']) ? $instance['phone'] : '';
		$email = !empty($instance['email']) ? $instance['email'] : '';
		
		?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Contact Us:', 'mazo'); ?></label>
            <input placeholder="<?php esc_html_e('Contact us', 'mazo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address Here:', 'mazo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses($address, 'string'); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone Number Here:', 'mazo'); ?></label>
            <input placeholder="<?php esc_attr_e('Enter number', 'mazo'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email Here:', 'mazo'); ?></label>
            <input placeholder="<?php esc_attr_e('Enter email', 'mazo'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
        </p>
       
		<?php 
	}
}
/* Booking Contact End */

//About Us
class Mazo_DZ_About_Us extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Mazo_DZ_About_Us', /* Name */esc_html__('Mazo About Us','mazo'), array( 'description' => esc_html__('Show the information about company', 'mazo' )) );
	}
	
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$allowed_html_tags = mazo_allowed_html_tag();
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo wp_kses($before_widget,$allowed_html_tags); 
		$show_social_icon = mazo_get_opt('show_social_icon');
		?>
			<?php if(!empty($title)){ ?>
				<?php echo wp_kses($before_title.$title.$after_title, $allowed_html_tags); ?>
			<?php } ?>
		
			<?php if(!empty($instance['logo_url'])){ ?>
				<div class="footer-logo">
					<a href="<?php echo esc_url(home_url('/')); ?>">
					<img src="<?php echo esc_url($instance['logo_url']); ?>" alt="<?php echo esc_attr__('Image','mazo'); ?>">
					</a>
				</div>
			<?php } ?>
			<p><?php echo wp_kses($instance['content'],'string'); ?></p>
			
			
			<?php if($show_social_icon && $instance['social_icon']){ ?>
				<ul class="social-list">
					<?php echo mazo_get_social_icons('header','btn btn-primary') ;?>
				</ul>
			<?php } ?>
			
		
        
		<?php echo wp_kses($after_widget,$allowed_html_tags);
	}
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['logo_url'] = $new_instance['logo_url'];
		$instance['content'] = $new_instance['content'];
		$instance['social_icon'] = $new_instance['social_icon'];

		return $instance;
	}
	
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : esc_html__('About Us', 'mazo');
		$logo_url = !empty($instance['logo_url']) ? $instance['logo_url'] : '';
		$content = !empty($instance['content']) ? $instance['content'] : 'We woke reasonably late following the feast and free flowing wine the night before. After gathering ourselves and our packs, we headed down to.';
		$social_icon = isset($instance['social_icon']) ? esc_attr($instance['social_icon']) : '';
		?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('logo_url')); ?>"><?php esc_html_e('Logo url here:', 'mazo'); ?></label>
            <input placeholder="<?php esc_attr_e('Logo url', 'mazo'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_url')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_url')); ?>" type="text" value="<?php echo esc_attr($logo_url); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('About Us:', 'mazo'); ?></label>
            <input placeholder="<?php esc_html_e('About us', 'mazo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'mazo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('social_icon')); ?>"><?php esc_html_e('Show Social Icons:', 'mazo'); ?></label>
			<?php $selected = ($social_icon) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('social_icon')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('social_icon')); ?>" type="checkbox" value="true" />
        </p>
        
		<?php 
	}
}


//About Us
class Mazo_DZ_Ad extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Mazo_DZ_Ad', /* Name */esc_html__('Mazo Ads','mazo'), array( 'description' => esc_html__('Show Ads', 'mazo' )) );
	}
	
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$allowed_html_tags = mazo_allowed_html_tag();	
		echo wp_kses($before_widget, $allowed_html_tags); 
		?>
      	<?php if(!empty($instance['bg_url'])){ ?>
			<div class="quote-bx overlay-black-dark" style="background-image:url(<?php echo esc_url($instance['bg_url']); ?>);">
			
				<h4 class="text-white m-b15">
					<?php echo wp_kses($instance['title'],'string'); ?>
				</h4>
				<p class="m-b20">
					<?php echo wp_kses($instance['content'],'string'); ?>
				</p>
				<a href="<?php echo esc_url($instance['btn_url']); ?>" class="btn btn-primary"><?php echo esc_html__('GET A QUOTE','mazo'); ?></a>
			</div>
        <?php } ?>
		<?php echo wp_kses($after_widget, $allowed_html_tags);
	}
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['bg_url'] = $new_instance['bg_url'];
		$instance['content'] = $new_instance['content'];
		$instance['title'] = $new_instance['title'];
		$instance['btn_url'] = $new_instance['btn_url'];

		return $instance;
	}
	
	/** @see WP_Widget::form */
	function form($instance)
	{
		$bg_url = !empty($instance['bg_url']) ? $instance['bg_url'] : get_template_directory_uri().'/assets/images/pic4.jpg';
		$content = !empty($instance['content']) ? $instance['content'] : esc_html('You can drag and drop an image from your computer onto the editing.','mazo');
		$title = !empty($instance['title']) ? $instance['title'] : esc_html('Do You Have Any Question ?','mazo');
		$btn_url = !empty($instance['btn_url']) ? $instance['btn_url'] : '';
		
		?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('bg_url')); ?>"><?php esc_html_e('Background url here:', 'mazo'); ?></label>
            <input placeholder="<?php esc_attr_e('Background url', 'mazo'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('bg_url')); ?>" name="<?php echo esc_attr($this->get_field_name('bg_url')); ?>" type="text" value="<?php echo esc_attr($bg_url); ?>" />
        </p>
		
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'mazo'); ?></label>
            <input placeholder="<?php esc_html_e('Title', 'mazo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Description:', 'mazo'); ?></label>
			<input placeholder="<?php esc_attr_e('Description', 'mazo'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" type="text" value="<?php echo esc_attr($content); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_url')); ?>"><?php esc_html_e('Button url here:', 'mazo'); ?></label>
            <input placeholder="<?php esc_attr_e('Button url', 'mazo'); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_url')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_url')); ?>" type="text" value="<?php echo esc_attr($btn_url); ?>" />
        </p>
        
		<?php 
	}
}


//Newsletter
class Mazo_DZ_Newsletter extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Mazo_DZ_Newsletter', /* Name */esc_html__('Mazo Footer Newsletter 1','mazo'), array( 'description' => esc_html__('Show the Newsletter', 'mazo' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		$allowed_html_tags = mazo_allowed_html_tag();
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo wp_kses($before_widget, $allowed_html_tags);?>
		
		
		<div>
			<?php echo wp_kses($before_title.$title.$after_title, $allowed_html_tags); ?>
			<p class="text m-b20"><?php echo wp_kses($instance['content'], $allowed_html_tags); ?></p>
			<div class="ft-subscribe">
				<form class="dzSubscribe dz-subscription" action="#" method="post">
					<div class="dzSubscribeMsg dz-subscription-msg"></div>
					<div class="input-group">
						<input name="dzEmail" required="required"  class="form-control" placeholder="<?php echo esc_attr__('Email Address','mazo'); ?>" type="email">
						<button name="submit" value="Submit" type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i></button>
					</div>
				</form>
			</div>
		</div>
		<?php
		
		echo wp_kses($after_widget, $allowed_html_tags);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : esc_html__('Our Newsletter', 'mazo');
		$content = ($instance) ? esc_attr($instance['content']) : esc_html__('Nullam vel massa hendrerit libero auctor volutpat', 'mazo');
	?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'mazo'); ?></label>
            <input placeholder="<?php esc_html_e('Subscribe To Our Newsletter', 'mazo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Contents:', 'mazo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
       
                
		<?php 
	}
	
}





//Newsletter
class Mazo_DZ_Newsletter2 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Mazo_DZ_Newsletter2', /* Name */esc_html__('Mazo Footer Newsletter 2','mazo'), array( 'description' => esc_html__('Show the Newsletter', 'mazo' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		$allowed_html_tags = mazo_allowed_html_tag();
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		if(strpos($before_widget,'footer-sidebar-2')){
			$before_widget = str_replace('col-md-6','col-md-12',$before_widget);
		}
		
		echo wp_kses($before_widget, $allowed_html_tags);?>
		
		
		<div>
			<?php echo wp_kses($before_title.$title.$after_title, $allowed_html_tags); ?>
			<p class="text m-b20"><?php echo wp_kses($instance['content'], $allowed_html_tags); ?></p>
			<div class="ft-subscribe">
				<form class="dzSubscribe dz-subscription" action="#" method="post">
					<div class="dzSubscribeMsg dz-subscription-msg"></div>
					<div class="input-group">
						<input name="dzEmail" required="required"  class="form-control" placeholder="<?php echo esc_attr__('Email Address','mazo'); ?>" type="email">
						<button name="submit" value="Submit" type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i></button>
					</div>
				</form>
			</div>
		</div>
		<?php
		
		echo wp_kses($after_widget, $allowed_html_tags);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : esc_html__('Our Newsletter', 'mazo');
		$content = ($instance) ? esc_attr($instance['content']) : esc_html__('Nullam vel massa hendrerit libero auctor volutpat', 'mazo');
	?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'mazo'); ?></label>
            <input placeholder="<?php esc_html_e('Subscribe To Our Newsletter', 'mazo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Contents:', 'mazo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
       
                
		<?php 
	}
	
}

?>