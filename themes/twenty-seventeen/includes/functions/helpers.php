<?php
/**
 * Helper functions.
 *
 * @package Tag Wall - Twenty Seveteen
 * @since   0.1.0
 */

// Declare helpers file namespace.
namespace Tag_Wall\Twenty_Seventeen\Helpers;

// Since file is namespaced, need to add WP_Query.
use \WP_Query;

/**
 * Allows use of multiple post thumbnails plugin in this file
 * NOTE: needed when dealing with namespaces.
 */
use \MultiPostThumbnails;

/**
 * Return the attached image url with appropriate size dimensions,
 * otherwise return the attached image url.
 *
 * @since  0.1.0
 * @param  int $post wp_post object
 * @uses   wp_get_attachment_image_src(), get_post_thumbnail_id
 * @return string void image url
 */
function tagwall_get_featured_image( $post ) {
	return wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
}

/**
 * If the hero image exists, return the attached image url with the appropriate size dimensions,
 * otherwise return nothing.
 *
 * @since  0.1.0
 * @param  int $post wp_post object
 * @uses   class_exists(), MultiPostThumbnails::has_post_thumbnail(), MultiPostThumbnails::get_post_thumbnail_url
 * @return string void image url
 */
function tagwall_get_hero_image( $post ) {
	return ( class_exists( 'MultiPostThumbnails' ) && MultiPostThumbnails::has_post_thumbnail( $post->post_type, 'hero-image', $post->ID ) ) ?
		MultiPostThumbnails::get_post_thumbnail_url( $post->post_type, 'hero-image', $post->ID, 'full' ) : '';
}

/**
 * If the blueprint image exists, return the attached image url with the appropriate size dimensions,
 * otherwise return nothing.
 *
 * @since  0.1.0
 * @param  int $post wp_post object
 * @param  string $id blueprint image identifier
 * @uses   class_exists(), MultiPostThumbnails::has_post_thumbnail(), MultiPostThumbnails::get_post_thumbnail_url
 * @return string void image url
 */
function tagwall_get_blueprint_image( $post, $id ) {
	return ( class_exists( 'MultiPostThumbnails' ) && MultiPostThumbnails::has_post_thumbnail( $post->post_type, 'blueprint-' . $id . '-image', $post->ID ) ) ?
		MultiPostThumbnails::get_post_thumbnail_url( $post->post_type, 'blueprint-' . $id . '-image', $post->ID, 'full' ) : '';
}

/**
 * Return the featured image for the taxonomy term.
 *
 * @since  0.1.0
 * @param  int $post wp_post object
 * @uses   wp_get_attachment_image_src(), get_post_thumbnail_id
 * @return string void image url
 */
function tagwall_get_term_featured_image( $id ) {
	return get_option( 'taxonomy_term_' . $id )['featured_image_url'];
}

/**
 * TODO
 *
 * @since  0.1.0
 * @param  int $post wp_post object
 * @uses   wp_get_attachment_image_src(), get_post_thumbnail_id
 * @return string void image url
 */
function tagwall_get_term_images( $id, $filter = false ) {
	$images = array();

	$images['image_one'] = get_option( 'taxonomy_term_' . $id )['image_one'];
	$images['image_two'] = get_option( 'taxonomy_term_' . $id )['image_two'];
	$images['image_three'] = get_option( 'taxonomy_term_' . $id )['image_three'];
	$images['image_four'] = get_option( 'taxonomy_term_' . $id )['image_four'];
	$images['image_five'] = get_option( 'taxonomy_term_' . $id )['image_five'];

	return ( $filter ) ? array_filter( $images ) : $images;
}

/**
 * Cater a custom query per post type if taxonomies and terms exist.
 *
 * @since  0.1.0
 * @param  string $post_type post-type
 * @uses   get_object_taxonomies(), get_terms()
 * @return array $args arguements for wp_query
 */
function tagwall_get_query_arguements( $post_type ) {

	// Default arguements for all custom queries.
	$args = array(
		'post_type' => $post_type,
		'order'     => 'ASC'
	);

	// Get the post type taxonomies.
	$taxonomies = get_object_taxonomies( $post_type, 'objects' );

	// If the post type has taxonomies, craft new taxonomy array with associated terms.
	if ( $taxonomies ) :
		foreach( $taxonomies as $taxonomy ) :

			$taxonomy_args[] = array(
				'taxonomy' => $taxonomy->name,
				'terms'    => get_terms( $taxonomy->name, array( 'fields' => 'ids' ) ),
				'operator' => 'NOT IN'
			);

		endforeach;

		// Add the taxonomies and associated terms to the default arguements array.
		$args['tax_query'] = $taxonomy_args;

	endif;

	return $args;
}

/**
 * Get the taxonomies based on post type sent to function.
 *
 * @since  0.1.0
 * @param  string $post_type post-type
 * @uses   get_object_taxonomies(), get_terms()
 * @return array $terms post-type terms
 */
function tagwall_get_terms( $post_type, $include_children = false ) {

	// Define local variables.
	$terms = array();
	$count = 0;

	// Get the post type taxonomies.
	$taxonomies = get_object_taxonomies( $post_type, 'objects' );

	// If the post type has taxonomies, add all of the taxonomy terms to the terms array.
	if ( $taxonomies ) :
		foreach( $taxonomies as $taxonomy ) :

			// Get the taxonomy terms.
			$tax_terms = get_terms( array(
				'taxonomy'   => $taxonomy->name,
				'hide_empty' => false,
				'parent'     => 0,
				'orderby' => 'ID'
			) );

			// In the event that multiple terms are returned per taxonomy, we need to iterate through those as well.
			foreach( $tax_terms as $term ) :
				$terms[] = $term;
			endforeach;

			if ( $include_children ) :
				// Get term children.
				foreach( $terms as $term ) :
					$children = get_term_children( $term->term_id, $taxonomy->name );

					// Iterate through the child terms and add them to the end of the $terms array.
					foreach( $children as $child ) :
						$child_term = get_term_by( 'id', $child, $taxonomy->name );
						$terms[]    = $child_term;
					endforeach;
				endforeach;
			endif;

		endforeach;
	endif;

	return $terms;
}

/**
 * Get the term children.
 *
 * @since  0.1.0
 * @param  array $terms TODO
 * @uses   TODO
 * @return TODO
 */
function tagwall_get_term_children( $terms ) {

	$children = array();

	// Get term children.
	foreach( $terms as $term ) :
		$taxonomy      = get_taxonomy( $term->taxonomy );
		$term_children = get_term_children( $term->term_id, $taxonomy->name );

		// Iterate through the child terms and add them to the end of the $terms array.
		foreach( $term_children as $child ) :
			$child_term = get_term_by( 'id', $child, $taxonomy->name );
			$children[] = $child_term;
		endforeach;
	endforeach;

	return $children;
}


/**
 * Create an array that holds specific post type information.
 *
 * @since  0.1.0
 * @param  string $post_type post-type
 * @uses   tagwall_get_query_arguements(), tagwall_get_terms()
 * @return array $terms post-type terms
 */
function tagwall_get_post_type_object( $post_type ) {

	$terms = tagwall_get_terms( $post_type->name );

	$custom = (object) array(
		'name'        => $post_type->name,
		'label'       => $post_type->label,
		'slug'        => $post_type->rewrite['slug'],
		'query'       => new WP_Query( tagwall_get_query_arguements( $post_type->name ) ),
		'taxonomies'  => get_object_taxonomies( $post_type->name, 'objects' ),
		'terms'       => $terms,
		'child_terms' => tagwall_get_term_children( $terms ),
		'all_terms'   => tagwall_get_terms( $post_type->name, true ),
	);

	return $custom;
}

/**
 * Create an array that holds all post type information.
 *
 * @since  0.1.0
 * @param  void
 * @uses   get_post_types(), array_shift(), tagwall_get_query_arguements(), tagwall_get_terms()
 * @return array $terms post-type terms
 */
function tagwall_get_post_type_objects() {

	// Define local variables.
	$custom = array();

	// Get all custom post types.
	$post_types = get_post_types(
		array( '_builtin' => false ),
		'objects'
	);

	// Remove the first element of the array [CPT: system].
	array_shift( $post_types );

	// Foreach custom post type, set the respective arguements and terms.
	foreach( $post_types as $post_type ) :

		$terms = tagwall_get_terms( $post_type->name );

		$custom[] = (object) array(
			'name'        => $post_type->name,
			'label'       => $post_type->label,
			'slug'        => $post_type->rewrite['slug'],
			'query'       => new WP_Query( tagwall_get_query_arguements( $post_type->name ) ),
			'taxonomies'  => get_object_taxonomies( $post_type->name, 'objects' ),
			'terms'       => $terms,
			'child_terms' => tagwall_get_term_children( $terms ),
			'all_terms'   => tagwall_get_terms( $post_type->name, true )
		);

	endforeach;

	return $custom;
}

/**
 * Return all terms based on post type, term taxonomy and term ID.
 *
 * @since  0.1.0
 * @param  string $post_type post-type to query
 * @param  object $term post-type term object
 * @uses   void
 * @return array $terms post-type terms
 */
function tagwall_get_post_type_term_query( $post_type, $term ) {

	// Arguements for woodgrain query.
	$args = array(
		'post_type' => $post_type,
		'order'     => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => $term->taxonomy,
				'terms'    => $term->term_id,
				'operator' => 'IN'
			)
		)
	);

	return new WP_Query( $args );
}

/**
 * Returns the appropriate title HTML with slash CSS.
 *
 * @since  0.1.0
 * @param  string $title wall / $title
 * @uses   sprintf()
 * @return string void title HTML with slash
 */
function tagwall_get_wall_title() {
	global $post;

	$html = '
		<section class="wall-title %2$s">
			<h1>Wall</h1>

			<div class="slash">
				<hr />
				<hr />
				<hr />
			</div>

			<h1>%1$s</h1>

		</section>
	';

	return sprintf( $html, $post->post_title, $post->post_name );
}

// TODO
function tagwall_var_dump( $custom, $toggle = false ) {
	echo '<pre>';
	var_dump( $custom );
	echo '</pre>';
	( $toggle ) ? exit() : '';
}
