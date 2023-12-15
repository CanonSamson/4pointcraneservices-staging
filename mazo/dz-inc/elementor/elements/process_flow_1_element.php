<?php if(!empty($process_flow_1_element_item)){ ?>	
<!-- Icon Box -->
<div class="section-full content-inner-1" >
	<div class="container">
		<?php if(!empty($process_flow_1_element_subtitle) || !empty($process_flow_1_element_title) || !empty($process_flow_1_element_description)){ ?>
			<div class="section-head style-6 text-center">
				<?php if(!empty($process_flow_1_element_subtitle)){ ?>	
					<h5 class="sub-title"><?php echo esc_html($process_flow_1_element_subtitle); ?></h5>
				<?php } 
					if(!empty($process_flow_1_element_title)){ ?>
					<h2 class="title"><?php echo esc_html($process_flow_1_element_title); ?></h2>
				<?php }
					if(!empty($process_flow_1_element_description)){ ?>
					<p><?php echo esc_html($process_flow_1_element_description); ?></p>
				<?php } ?>
			</div>
		<?php } ?>

		<div class="row">
		<?php 
			$count = 1;
			foreach($process_flow_1_element_item as $processItem){
			if(!empty($processItem['process_flow_1_element_item_title']) && !empty($processItem['process_flow_1_element_item_description'])){ ?>
				<div class="col-xl-4 col-lg-6">
					<div class="icon-bx-wraper style-20 left m-b30">
						<div class="icon-content bg-white">
							<?php if(!empty($processItem['process_flow_1_element_item_title'])){ ?>
								  <h4 class="title"><?php echo esc_html($processItem['process_flow_1_element_item_title']); ?></h4>
							<?php } 
								if(!empty($processItem['process_flow_1_element_item_description'])){ ?>
								  <p><?php echo esc_html($processItem['process_flow_1_element_item_description']); ?></p>
							<?php } ?>
						</div>
						<?php if(!empty($processItem['process_flow_1_item_step_text'])){ ?>	
						<div class="icon-bx">
							<h3 class="dz-title"><?php echo esc_html('0'.$count) ?></h3>
							<p><?php echo esc_html($processItem['process_flow_1_item_step_text']); ?></p>
						</div>
						<?php } ?>
					</div>
				</div>
			<?php }
				$count++; 
			} ?>
		</div>
	</div>
</div>
<?php } ?>