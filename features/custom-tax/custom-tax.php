<?php

if ( current_theme_supports( 'custom-tax' ) ) {

	$taxonomies = get_theme_support( 'custom-tax' );

	// have we defined any custom taxonomies?
	if ( is_array( $taxonomies[0] ) ) {

		$taxonomies = $taxonomies[0];

		$defaults = array(
		'public' => true,
		'hierarchical' => true,
		'query_var' => true,
		'show_admin_column' => true,
		);

		// iterate through every custom taxonomy
		foreach ( $taxonomies as $key => $tax ) {

			$labels = array(
			'name' => $tax['plural'],
			'singular_name' => $tax['singular'],
			'search_items' => 'Search ' . $tax['plural'],
			'all_items' => 'All ' . $tax['plural'],
			'edit_item' => 'Edit ' . $tax['singular'],
			'update_item' => 'Update ' . $tax['singular'],
			'add_new_item' => 'Add new ' . $tax['singular'],
			'new_item_name' => 'New ' . $tax['singular'],
			'menu_name' => isset( $tax['menu_name'] ) ? $tax['menu_name'] : $tax['plural'],
			'parent_item' => 'Parent ' . $tax['singular'],
			'parent_item_colon' => 'Parent ' . $tax['singular'],
			'separate_items_with_commas' => 'Separate tags with commas ' . $tax['plural'],
			'add_or_remove_items' => 'Add or remove ' . $tax['plural'],
			'choose_from_most_used' => 'Choose from most used ' . $tax['plural'],
			);

			// merge the defaults and provided arguments
			$args = wp_parse_args( $tax, $defaults );

			// in case taxonomies were not hierarchical auto add extra info that's useful on the tag page
			if ( false === $args['hierarchical'] ) {
				$labels['popular_items'] = 'Popular ' . $tax['plural'];
				if ( ! isset( $tax['update_count_callback'] ) ) {
					$args['update_count_callback'] = '_update_post_term_count';
				}
			}

			$args['labels'] = $labels;

			// register the taxonomy
			register_taxonomy( $key, $tax['posts'], $args );
		}
	}
}
