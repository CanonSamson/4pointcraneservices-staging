<?php
	global $mazo_option;
	extract($mazo_option);

?>

<?php if($header_top_bar_on) { ?>
<div class="top-bar text-white">
	<div class="container">
		<div class="dz-topbar-inner d-flex justify-content-between align-items-center">
			<div class="dz-topbar-left">
				<ul>
					<?php if(!empty($site_address)) { ?>
							<li>
								<i class="fas fa-map-marker-alt"></i> 
								<?php echo wp_kses($site_address, $allowed_html_tags); ?>
							</li>
					<?php } ?>
				</ul>
			</div>
			<div class="dz-topbar-right">
				<ul>
					<?php if(!empty($site_phone_number)){?>
					<li>
						<a href="<?php echo esc_url('https://rdx-hp/products/mazo/demo/contact-us/')?>">
							<i class="fas fa-phone-alt"></i>
							<?php echo wp_kses($site_phone_number, $allowed_html_tags); ?>
						</a>
					</li>
			
					<?php } if(!empty($site_email)) { ?>
						<li>
							<i class="far fa-envelope-open"></i> 
							<?php echo wp_kses($site_email, $allowed_html_tags); ?>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		
	</div>
</div>
<?php } ?>