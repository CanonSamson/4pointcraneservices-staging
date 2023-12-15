<?php
/**
 * Helper functions for the theme
 *
 * @package Mazo
 */
/**
 * Get theme option based on its id.
 *
 * @param  string $opt_id Required. the option id.
 * @param  mixed $default Optional. Default if the option is not found or not yet saved.
 *                         If not set, false will be used
 *
 * @return mixed
 */
function mazo_get_opt( $opt_id, $default = false ) {
	$opt_name = mazo_get_opt_name();
	if ( empty( $opt_name ) ) {
		return $default;
	}

	global ${$opt_name};
	if ( ! isset( ${$opt_name} ) || ! isset( ${$opt_name}[ $opt_id ] ) ) {
		$options = get_option( $opt_name );
	} else {
		$options = ${$opt_name};
	}
	if ( ! isset( $options ) || ! isset( $options[ $opt_id ] ) || $options[ $opt_id ] === '' ) {
		return $default;
	}
	if ( is_array( $options[ $opt_id ] ) && is_array( $default ) ) {
		foreach ( $options[ $opt_id ] as $key => $value ) {
			if ( isset( $default[ $key ] ) && $value === '' ) {
				$options[ $opt_id ][ $key ] = $default[ $key ];
			}
		}
	}

	return $options[ $opt_id ];
}

/**
 * Get theme option based on its id.
 *
 * @param  string $opt_id Required. the option id.
 * @param  mixed $default Optional. Default if the option is not found or not yet saved.
 *                         If not set, false will be used
 *
 * @return mixed
 */
function mazo_get_page_opt( $opt_id, $default = false ) {
	$page_opt_name = mazo_get_page_opt_name();
	if ( empty( $page_opt_name ) ) {
		return $default;
	}
	$id = get_the_ID();
	if ( ! is_archive() && is_home() ) {
		if ( ! is_front_page() ) {
			$page_for_posts = get_option( 'page_for_posts' );
			$id             = $page_for_posts;
		}
	}

	return $options = ! empty($id) ? get_post_meta( intval( $id ), $opt_id, true ) : $default;
}

/**
 * Get theme option based on its id.
 *
 * @param  string $opt_id Required. the option id.
 * @param  mixed $default Optional. Default if the option is not found or not yet saved.
 *                         If not set, false will be used
 *
 * @return mixed
 */
function mazo_get_post_opt( $opt_id, $default = false ) {
	$post_opt_name = mazo_get_post_opt_name();
	if ( empty( $post_opt_name ) ) {
		return $default;
	}
	$id = get_the_ID();
	if ( ! is_archive() && is_home() ) {
		if ( ! is_front_page() ) {
			$page_for_posts = get_option( 'page_for_posts' );
			$id             = $page_for_posts;
		}
	}
	return $options = ! empty($id) ? get_post_meta( intval( $id ), $opt_id, true ) : $default;
}


/**
 * Get opt_name for Redux Framework options instance args and for
 * getting option value.
 *
 * @return string
 */
function mazo_get_opt_name() {
	return apply_filters( 'mazo_opt_name', 'mazo_theme_options' );
}

/**
 * Get opt_name for Redux Framework options instance args and for
 * getting option value.
 *
 * @return string
 */
function mazo_get_page_opt_name() {
	return apply_filters( 'mazo_page_opt_name', 'mazo_page_options' );
}

/**
 * Get opt_name for Redux Framework options instance args and for
 * getting option value.
 *
 * @return string
 */
function mazo_get_post_opt_name() {
	return apply_filters( 'mazo_post_opt_name', 'mazo_post_options' );
}

/**
 * Get opt_name for Redux Framework options instance args and for
 * getting option value.
 *
 * @return string
 */
function mazo_get_cpt_opt_name() {

	$temp_cpt_data = mazo_get_opt('cpt_data');
	$temp_cpt_data = unserialize($temp_cpt_data);

	if ($temp_cpt_data) {
	
	    foreach ($temp_cpt_data as $cpt) {

            $cpt_id = $cpt['cpt_id'];
            $mazo_cpt_opt[] = 'cpt_'.$cpt_id.'_option';
		}

		return apply_filters( 'mazo_cpt_opt_name', $mazo_cpt_opt );
	}	

}
