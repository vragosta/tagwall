<?php
/**
 * The template for displaying the header.
 *
 * @package Tag Wall - Twenty Seventeen
 * @since   0.1.0
 * @uses    language_attributes(), wp_head(), body_class(), is_front_page(), get_template_part()
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header>
			<?php if ( is_front_page() ) : ?>
				<?php get_template_part( 'partials/content', 'header-navigation-front-page' ); ?>
			<?php else : ?>
				<?php get_template_part( 'partials/content', 'header-navigation' ); ?>
			<?php endif; ?>
		</header>
