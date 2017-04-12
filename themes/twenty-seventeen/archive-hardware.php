<?php
/**
 * Template: Archive - Hardware
 * Template for displaying the hardware archive.
 *
 * @package Tag Wall - Twenty Seventeen
 * @since   0.1.0
 * @uses    get_header(), get_template_part(), tagwall_get_featued_image(), wp_trim_words(), the_permalink(),
 *          get_the_permalink(), esc_html(), wp_reset_postdata(), get_footer()
 */
?>

<?php

	get_header();

	// Initialize the local count variable.
	$count = 1;

	// Get the custom catered post type object based off the archive template we are on.
	$custom = Tag_Wall\Twenty_Seventeen\Helpers\tagwall_get_post_type_object( get_queried_object() );

	// Tag_Wall\Twenty_seventeen\Helpers\tagwall_var_dump( get_terms( array( 'taxonomy' => 'ladder_pull', 'hide_empty' => false ) ), true );
	// Tag_Wall\Twenty_seventeen\Helpers\tagwall_var_dump( $custom->terms, true );
	// Tag_Wall\Twenty_seventeen\Helpers\tagwall_var_dump( $custom->all_terms, true );
	// Tag_Wall\Twenty_seventeen\Helpers\tagwall_var_dump( $custom->terms, true );
	// Tag_Wall\Twenty_seventeen\Helpers\tagwall_var_dump( $custom, true );

	// Include content/details partial.
	include( 'partials/content-details.php' );

?>

<div class="archive-container hardware">
	<?php foreach( $custom->terms as $term ) : ?>

		<section class="<?php echo esc_attr( $term->slug ); ?>">
			<div class="title">
				<h1><a name="<?php echo esc_attr( $term->slug ); ?>"><?php echo esc_html( $term->name ); ?></a></h1>
			</div>

			<?php if ( $term->slug === 'electronic-ladder-pull' ) : ?>

				<?php include( 'partials/content-hardware-electronic-ladder-pull.php' ); ?>

			<?php elseif ( $term->slug === 'klo-ladder-pull' ) : ?>

				<?php include( 'partials/content-hardware-klo-ladder-pull.php' ); ?>

			<?php elseif ( $term->slug === 'hgu-view' ) : ?>

				<?php include( 'partials/content-hardware-hgu-views.php' ); ?>

			<?php endif; ?>

		</section>

	<?php endforeach; ?>
</div>

<?php get_footer(); ?>
