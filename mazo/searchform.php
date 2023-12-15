<!-- Search -->
<div class="search-bx style-1">
    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="input-group">
           <input type="search" name="s" class="form-control" value="" placeholder="<?php esc_attr_e('Search Here', 'mazo'); ?>" required>
			<span class="input-group-btn">
				<button type="submit" class="btn radius-no"><i class="la la-search scale3"></i></button>
			</span>
        </div>
    </form>
</div>


