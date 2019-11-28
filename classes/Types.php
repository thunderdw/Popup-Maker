<?php

class PUM_Types {

	/**
	 * Hook the initialize method to the WP init action.
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register_post_types' ), 1 );
		add_action( 'init', array( __CLASS__, 'register_taxonomies' ), 0 );
		add_filter( 'post_updated_messages', array( __CLASS__, 'updated_messages' ) );

		add_filter( 'wpseo_accessible_post_types', array( __CLASS__, 'yoast_sitemap_fix' ) );
	}

	/**
	 * Register post types
	 */
	public static function register_post_types() {
		if ( ! post_type_exists( 'popup' ) ) {
			$labels = PUM_Types::post_type_labels( __( 'Popup', 'popup-maker' ), __( 'Popups', 'popup-maker' ) );

			$labels['menu_name'] = __( 'Popup Maker', 'popup-maker' );

			$popup_args = apply_filters( 'popmake_popup_post_type_args', array(
				'labels'              => $labels,
				'public'              => true,
				'publicly_queryable'  => false,
				'query_var'           => false,
				'rewrite'             => false,
				'exclude_from_search' => true,
				'show_in_nav_menus'   => false,
				'show_ui'             => true,
				'menu_icon'           => 'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" width="16" height="16"><defs><path d="M12.67 1.75L13.12 1.83L13.58 1.97L14.04 2.17L14.49 2.43L14.9 2.77L15.26 3.19L15.57 3.71L15.79 4.28L15.93 4.85L15.99 5.41L16 5.95L15.95 6.45L15.88 6.89L15.78 7.27L15.67 7.57L15.57 7.78L15.45 7.95L15.29 8.16L15.1 8.4L14.87 8.67L14.61 8.95L14.32 9.25L14 9.54L13.66 9.84L13.3 10.13L12.94 10.4L12.61 10.65L12.29 10.88L11.99 11.11L11.69 11.35L11.39 11.59L11.08 11.84L10.76 12.11L10.42 12.42L10.04 12.73L9.63 13.02L9.19 13.29L8.72 13.53L8.23 13.75L7.72 13.93L7.21 14.09L6.69 14.2L6.18 14.28L5.6 14.3L4.9 14.25L4.12 14.09L3.31 13.8L2.5 13.36L1.74 12.76L1.07 11.96L0.52 10.94L0.14 9.68L0 8.36L0.12 7.17L0.45 6.12L0.94 5.2L1.54 4.42L2.22 3.78L2.92 3.29L3.59 2.95L4.19 2.76L4.85 2.63L5.7 2.48L6.68 2.33L7.73 2.18L8.78 2.03L9.79 1.9L10.68 1.8L11.4 1.72L11.88 1.7L12.26 1.7L12.67 1.75ZM10.64 2.39L9.62 2.51L8.48 2.66L7.32 2.82L6.22 2.98L5.26 3.13L4.55 3.26L3.91 3.46L3.18 3.83L2.43 4.38L1.72 5.08L1.12 5.95L0.7 6.96L0.51 8.13L0.63 9.43L1 10.67L1.51 11.67L2.14 12.44L2.86 13.02L3.65 13.41L4.49 13.64L5.34 13.73L6.19 13.71L6.97 13.6L7.64 13.44L8.22 13.23L8.73 12.98L9.17 12.71L9.57 12.41L9.95 12.1L10.32 11.78L10.67 11.48L11 11.21L11.32 10.97L11.63 10.73L11.94 10.5L12.27 10.27L12.61 10.03L12.99 9.76L13.36 9.47L13.71 9.18L14.03 8.88L14.32 8.6L14.57 8.32L14.79 8.08L14.96 7.86L15.08 7.69L15.19 7.47L15.3 7.14L15.4 6.72L15.47 6.23L15.48 5.69L15.44 5.11L15.31 4.53L15.08 3.96L14.78 3.45L14.42 3.06L14.04 2.76L13.62 2.55L13.2 2.41L12.78 2.32L12.38 2.28L12 2.27L11.46 2.31L10.64 2.39Z" id="eLoMHfaS"></path><path d="M8.35 6.04L9.08 7.19L9.35 8.59L9.08 9.99L8.35 11.13L7.27 11.91L5.95 12.19L4.62 11.91L3.54 11.13L2.81 9.99L2.54 8.59L2.81 7.19L3.54 6.04L4.62 5.27L5.95 4.99L7.27 5.27L8.35 6.04ZM4.1 6.6L3.54 7.49L3.34 8.58L3.54 9.67L4.1 10.56L4.93 11.17L5.94 11.39L6.96 11.17L7.79 10.56L8.35 9.67L8.55 8.58L8.35 7.49L7.79 6.6L6.96 5.99L5.94 5.77L4.93 5.99L4.1 6.6Z" id="a1xlBX7eUk"></path><path d="M9.04 9.39L8.35 10.9L9.11 11.66C9.12 11.66 9.12 11.66 9.12 11.66C10.01 10.71 10.41 9.4 10.19 8.11C10.19 8.09 10.18 8.04 10.16 7.95L9.11 8.01L9.04 9.39Z" id="e1KfKU9JEu"></path><path d="M3.74 11.08L2.82 9.7L1.78 9.94C1.78 9.94 1.78 9.94 1.78 9.94C2.1 11.2 3 12.24 4.2 12.74C4.23 12.75 4.28 12.77 4.36 12.8L4.87 11.89L3.74 11.08Z" id="aswxBlyrF"></path><path d="M4.96 5.33L6.62 5.17L6.89 4.14C6.89 4.14 6.89 4.14 6.89 4.14C5.62 3.83 4.29 4.14 3.28 4.96C3.26 4.97 3.22 5.01 3.15 5.07L3.72 5.95L4.96 5.33Z" id="aFREkIqrT"></path><path d="M13.56 4.26L13.97 4.89L14.12 5.67L13.97 6.45L13.56 7.09L12.96 7.52L12.23 7.68L11.5 7.52L10.9 7.09L10.49 6.45L10.34 5.67L10.49 4.89L10.9 4.26L11.5 3.83L12.23 3.67L12.96 3.83L13.56 4.26ZM11.88 5.24L11.77 5.44L11.73 5.68L11.77 5.92L11.88 6.12L12.04 6.25L12.23 6.3L12.42 6.25L12.58 6.12L12.69 5.92L12.73 5.68L12.69 5.44L12.58 5.24L12.42 5.11L12.23 5.06L12.04 5.11L11.88 5.24Z" id="amDpzCYZN"></path><path d="M12.51 2.83L13.24 3.05L13.02 4.27L12.02 3.98L12.51 2.83Z" id="c1FHpaNCVv"></path><path d="M14.65 4.57L14.87 5.29L13.73 5.78L13.42 4.79L14.65 4.57Z" id="c59InZ73I"></path><path d="M14.34 7.35L13.77 7.85L12.85 7.02L13.62 6.33L14.34 7.35Z" id="cp1hej6U"></path><path d="M11.95 8.41L11.2 8.27L11.3 7.03L12.32 7.22L11.95 8.41Z" id="akiLoJGaJ"></path><path d="M9.69 6.69L9.58 5.95L10.78 5.62L10.95 6.64L9.69 6.69Z" id="a12HrJSLIM"></path><path d="M10.05 3.9L10.62 3.4L11.54 4.24L10.76 4.93L10.05 3.9Z" id="alSln9w1"></path></defs><g><g><g><use xlink:href="#eLoMHfaS" opacity="1" fill="black" fill-opacity="1"></use></g><g><g><use xlink:href="#a1xlBX7eUk" opacity="1" fill="black" fill-opacity="1"></use></g><g><use xlink:href="#e1KfKU9JEu" opacity="1" fill="black" fill-opacity="1"></use></g><g><use xlink:href="#aswxBlyrF" opacity="1" fill="black" fill-opacity="1"></use></g><g><use xlink:href="#aFREkIqrT" opacity="1" fill="black" fill-opacity="1"></use></g></g><g><g><use xlink:href="#amDpzCYZN" opacity="1" fill="black" fill-opacity="1"></use></g><g><use xlink:href="#c1FHpaNCVv" opacity="1" fill="black" fill-opacity="1"></use></g><g><use xlink:href="#c59InZ73I" opacity="1" fill="black" fill-opacity="1"></use></g><g><use xlink:href="#cp1hej6U" opacity="1" fill="black" fill-opacity="1"></use></g><g><use xlink:href="#akiLoJGaJ" opacity="1" fill="black" fill-opacity="1"></use></g><g><use xlink:href="#a12HrJSLIM" opacity="1" fill="black" fill-opacity="1"></use></g><g><use xlink:href="#alSln9w1" opacity="1" fill="black" fill-opacity="1"></use></g></g></g></g></svg>'),
				'menu_position'       => 20.292892729,
				'supports'            => apply_filters( 'popmake_popup_supports', array(
					'title',
					'editor',
					'revisions',
					'author',
				) ),
				'show_in_rest'        => pum_get_option( 'gutenberg_support_enabled', false ), // Adds support for Gutenberg currently.
			) );

			// Temporary Yoast Fixes
			if ( is_admin() && isset( $_GET['page'] ) && $_GET['page'] === 'wpseo_titles' ) {
				$popup_args['public'] = false;
			}

			register_post_type( 'popup', apply_filters( 'pum_popup_post_type_args', $popup_args ) );
		}

		if ( ! post_type_exists( 'popup_theme' ) ) {
			$labels = PUM_Types::post_type_labels( __( 'Popup Theme', 'popup-maker' ), __( 'Popup Themes', 'popup-maker' ) );

			$labels['all_items'] = __( 'Popup Themes', 'popup-maker' );

			$labels = apply_filters( 'popmake_popup_theme_labels', $labels );

			register_post_type( 'popup_theme', apply_filters( 'popmake_popup_theme_post_type_args', array(
				'labels'            => $labels,
				'show_ui'           => true,
				'show_in_nav_menus' => false,
				'show_in_menu'      => 'edit.php?post_type=popup',
				'show_in_admin_bar' => false,
				'query_var'         => false,
				'rewrite'           => false,
				'supports'          => apply_filters( 'popmake_popup_theme_supports', array(
					'title',
					'revisions',
					'author',
				) ),
			) ) );
		}
	}

	/**
	 * @param $singular
	 * @param $plural
	 *
	 * @return mixed
	 */
	public static function post_type_labels( $singular, $plural ) {
		$labels = apply_filters( 'popmake_popup_labels', array(
			'name'               => '%2$s',
			'singular_name'      => '%1$s',
			'add_new_item'       => _x( 'Add New %1$s', 'Post Type Singular: "Popup", "Popup Theme"', 'popup-maker' ),
			'add_new'            => _x( 'Add %1$s', 'Post Type Singular: "Popup", "Popup Theme"', 'popup-maker' ),
			'edit_item'          => _x( 'Edit %1$s', 'Post Type Singular: "Popup", "Popup Theme"', 'popup-maker' ),
			'new_item'           => _x( 'New %1$s', 'Post Type Singular: "Popup", "Popup Theme"', 'popup-maker' ),
			'all_items'          => _x( 'All %2$s', 'Post Type Plural: "Popups", "Popup Themes"', 'popup-maker' ),
			'view_item'          => _x( 'View %1$s', 'Post Type Singular: "Popup", "Popup Theme"', 'popup-maker' ),
			'search_items'       => _x( 'Search %2$s', 'Post Type Plural: "Popups", "Popup Themes"', 'popup-maker' ),
			'not_found'          => _x( 'No %2$s found', 'Post Type Plural: "Popups", "Popup Themes"', 'popup-maker' ),
			'not_found_in_trash' => _x( 'No %2$s found in Trash', 'Post Type Plural: "Popups", "Popup Themes"', 'popup-maker' ),
		) );

		foreach ( $labels as $key => $value ) {
			$labels[ $key ] = sprintf( $value, $singular, $plural );
		}

		return $labels;
	}

	/**
	 * Register optional taxonomies.
	 *
	 * @param bool $force
	 */
	public static function register_taxonomies( $force = false ) {
		if ( ! $force && popmake_get_option( 'disable_popup_category_tag', false ) ) {
			return;
		}

		/** Categories */
		$category_labels = (array) get_taxonomy_labels( get_taxonomy( 'category' ) );

		$category_args = apply_filters( 'popmake_category_args', array(
			'hierarchical' => true,
			'labels'       => apply_filters( 'popmake_category_labels', $category_labels ),
			'public'       => false,
			'show_ui'      => true,
		) );
		register_taxonomy( 'popup_category', array( 'popup', 'popup_theme' ), $category_args );
		register_taxonomy_for_object_type( 'popup_category', 'popup' );
		register_taxonomy_for_object_type( 'popup_category', 'popup_theme' );

		/** Tags */

		$tag_labels = (array) get_taxonomy_labels( get_taxonomy( 'post_tag' ) );

		$tag_args = apply_filters( 'popmake_tag_args', array(
			'hierarchical' => false,
			'labels'       => apply_filters( 'popmake_tag_labels', $tag_labels ),
			'public'       => false,
			'show_ui'      => true,
		) );
		register_taxonomy( 'popup_tag', array( 'popup', 'popup_theme' ), $tag_args );
		register_taxonomy_for_object_type( 'popup_tag', 'popup' );
		register_taxonomy_for_object_type( 'popup_tag', 'popup_theme' );
	}

	/**
	 * Updated Messages
	 *
	 * Returns an array of with all updated messages.
	 *
	 * @since 1.0
	 *
	 * @param array $messages Post updated message
	 *
	 * @return array $messages New post updated messages
	 */
	public static function updated_messages( $messages ) {

		$labels = array(
			1 => _x( '%1$s updated.', 'Post Type Singular: Popup, Theme', 'popup-maker' ),
			4 => _x( '%1$s updated.', 'Post Type Singular: Popup, Theme', 'popup-maker' ),
			6 => _x( '%1$s published.', 'Post Type Singular: Popup, Theme', 'popup-maker' ),
			7 => _x( '%1$s saved.', 'Post Type Singular: Popup, Theme', 'popup-maker' ),
			8 => _x( '%1$s submitted.', 'Post Type Singular: Popup, Theme', 'popup-maker' ),
		);

		$messages['popup']       = array();
		$messages['popup_theme'] = array();

		$popup = __( 'Popup', 'popup-maker' );
		$theme = __( 'Popup Theme', 'popup-maker' );

		foreach ( $labels as $k => $string ) {
			$messages['popup'][ $k ]       = sprintf( $string, $popup );
			$messages['popup_theme'][ $k ] = sprintf( $string, $theme );
		}

		return $messages;
	}

	/**
	 * Remove popups from accessible post type list in Yoast.
	 *
	 * @param array $post_types
	 *
	 * @return array
	 */
	public static function yoast_sitemap_fix( $post_types = array() ) {
		unset( $post_types['popup'] );

		return $post_types;
	}


}
