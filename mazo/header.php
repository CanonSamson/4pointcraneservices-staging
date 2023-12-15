<?php 
mazo_bunch_global_variable();
global $mazo_option;
extract($mazo_option);
?>
<!DOCTYPE html>
<html <?php language_attributes(); theme_direction(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ){ ?>
	<link rel="shortcut icon" href="<?php echo esc_url($site_favicon);?>" type="image/x-icon">
	<link rel="icon" href="<?php echo esc_url($site_favicon);?>" type="image/x-icon">
<?php } ?>
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- MOBILE SPECIFIC -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php wp_head(); ?>
</head>

<body id="bg" <?php body_class();  mazo_body_layout_style(); ?> >
	<?php 
	wp_body_open(); 
	
	do_action( 'mazo_subscription'); 
	?>
	<div  class="page-wraper">		
<?php 
if(isWebsiteReadyForVisitor($website_status)){
	/* Pre-loader */
	mazo_get_loader();
	/* Pre-loader END */
	if(!empty($header_style)) 
	{
		get_template_part('dz-inc/elements/header/'.$header_style);
	}
}
?>

<div class="page-content bg-white">
<?php
do_action('mazo_website_status');


