<?php
/**
 * Partial used on all archive-{wall-details} templates.
 *
 * @package Tag Wall - Twenty Seventeen
 * @since   0.1.0
 * @uses    post_type_archive_title(), home_url(), wp_reset_postdata()
 */
?>

<div class="details-container <?php echo esc_attr( $post_type->name ); ?> row">
	<div class="col-xs-12 col-sm-6">
		<h1><?php post_type_archive_title(); ?></h1>
	</div>
	<div class="col-xs-12 col-sm-6">
		<ul>

			<?php if ( $query->have_posts() ) : ?>
				<?php while( $query->have_posts() ) : $query->the_post(); ?>
					<li><a href="<?php echo esc_attr( '#' . $post->post_name ); ?>"><?php echo esc_html( $post->post_title ); ?></a></li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

			<a href="<?php echo home_url( '/details/' ); ?>" class="back">Go Back to Wall Details</a>

		</ul>
	</div>
</div>