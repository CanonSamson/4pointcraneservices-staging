<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 */
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ){
	return;
}
 
$comment_count_on = mazo_get_opt('comment_count_on',true);
$comment_view_on = mazo_get_opt('comment_view_on',true);
?>
<?php $protocol = is_ssl() ? 'https://' : 'http://';?>
<?php if ( have_comments() || comments_open()) { ?>
	<div class="clear" id="comment-list">
		<div itemscope itemtype="<?php echo esc_attr($protocol);?>schema.org/Comment" id="comments-div" class="post-comments comments-area style-1 clearfix">

				<?php
					if ( have_comments() ) 
					{
				?>
				
				   <?php if($comment_view_on) { ?>
						<div class="widget-title">
						<h4 class="title">
						<?php
						if($comment_count_on){
							$comments_number = get_comments_number();
							if ( '1' === $comments_number ) {						
								esc_attr_e('1 Comment','mazo');
							} else {							
								echo number_format_i18n( $comments_number ).' '.esc_html__('Comments','mazo');
							}
						}else{
							esc_attr_e('Comments','mazo');
						}
						?>
						</h4>
						<div class="dz-separator style-1 text-primary mb-0"></div>
						</div>
					<?php } ?>
					
					<div id="comment">
						<?php if($comment_view_on) { ?>
						<!-- comment list STARTS -->
						<ol class="comment-list">
							<?php
								wp_list_comments( array(
									'style'       => 'ol',
									'short_ping'  => true,
									'avatar_size' => 74,
									'callback'=>'mazo_bunch_list_comments'
								) );
							?>
							
						</ol>
						<!-- comment list END -->
						<?php } ?>
					   
						<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
						<nav class="navigation comment-navigation clearfix" role="navigation">
							<h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'mazo' ); ?></h1>
							<div class="nav-previous pull-left"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'mazo' ) ); ?></div>
							<div class="nav-next pull-right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'mazo' ) ); ?></div>
						</nav>
						<!-- .comment-navigation -->		
						<?php endif; /* Check for comment navigation */?>
						
						<?php if ( ! comments_open() && get_comments_number() ) : ?>
							<p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'mazo' ); ?></p>
						<?php endif; ?>
					</div> 
		
				
				<?php } ?>

				<?php if ( comments_open()) : ?>
					<?php mazo_bunch_comment_form(); ?>
				<?php endif; ?>
				<!-- Form END -->
		</div>
	</div><!-- #comments --> 
<?php } ?>