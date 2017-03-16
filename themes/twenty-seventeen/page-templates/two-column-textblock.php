<?php
/**
* Template Name: Two Column Textblock
*
* @package    Studio Tag - Twenty Seventeen
* @subpackage Studio Wall - Twenty Seventeen
* @since      0.1.0
*/
?>

<?php get_header(); ?>

<main class="two-column-textblock">
	<?php if ( have_posts() ) : ?>
		<?php while( have_posts() ) : the_post(); ?>

			<?php
				// Get the 'hero-image' from the post.
				$hero_image = studio_tag\Studio_Wall\Twenty_Seventeen\Helpers\studiowall_get_hero_image( $post );

				// Get the 'featured' image from the post.
				$image = studio_tag\Studio_Wall\Twenty_Seventeen\Helpers\studiowall_get_featured_image( $post );
			?>

			<figure class="hero-image settings">
				<div style="background-image: url( '<?php echo esc_attr( $hero_image ); ?>' );"></div>
			</figure>

			<figure class="featured-image settings">
				<div style="background-image: url( '<?php echo esc_attr( $image ); ?>' );"></div>
			</figure>

			<section class="content-container row">
				<div class="content col-xs-12 col-sm-offset-4 col-sm-8">
					<?php the_content(); ?>
				</div>
			</section>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>
</main>

<?php get_footer(); ?>