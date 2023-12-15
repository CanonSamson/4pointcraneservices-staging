<?php /* Template Name: Mazo Template No Header-Footer */
get_header('one') ;
global $mazo_option;
extract($mazo_option);

if(isWebsiteReadyForVisitor($website_status)){

mazo_get_banner(); 	
	
	while( have_posts() )
	{ 
		the_post(); 
		the_content();
	}
}

get_footer('one'); ?>