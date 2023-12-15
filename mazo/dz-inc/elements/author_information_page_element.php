<?php 
$author_box_on = mazo_get_opt('author_box_on',false); 
$description = nl2br(get_the_author_meta('description'));

if($author_box_on) {
?>

	<div class="author-box blog-user m-b60">
		<div class="author-profile-info">
			<div class="author-profile-pic">
				<img src="<?php echo esc_url( get_avatar_url(get_the_author_meta('email'),array('size'=>200)) ); ?>" alt="<?php esc_attr_e('Profile Pic', 'mazo');?>" />
			</div>
			<div class="author-profile-content">
				<h6><?php echo ucwords(get_the_author_meta('display_name'));?></h6>
				<p><?php echo wp_kses($description, 'string');?></p>
				<ul class="list-inline m-b0">
					<?php
					$author_social_arr = mazo_author_social_arr();
					
					foreach($author_social_arr as $social_key => $social_value)
						{ 
							$social_url = mazo_get_super_user_data($social_key);
							if(!empty($social_url))
							{
							?>
						<li>
							<a href="<?php echo esc_url($social_url);?>" target="_blank" class="btn-link">
								<i class="<?php echo esc_attr($social_value['icon']); ?>"></i>
							</a>
						</li>
					<?php 	} 
						}
					?>
				</ul>
			</div>
		</div>
	</div>

<?php } ?>