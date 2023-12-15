<?php 
get_header();
mazo_get_post_banner();
global $mazo_option;
extract($mazo_option);

the_content();
		
wp_reset_postdata();
get_footer();