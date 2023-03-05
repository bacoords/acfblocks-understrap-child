<?php
/**
 * Template name: Landing Page A
 * 
 * The template for displaying all landing pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = ''; // get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-landing-a-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<main class="site-main" id="main">

			<?php
			while ( have_posts() ) {
				the_post();

				if ( have_rows( 'flexible_content' ) ) {
					while ( have_rows( 'flexible_content' ) ) {
						the_row();
						get_template_part( 'acf-rows/row', get_row_layout() );
					}
				}

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			}
			?>

		</main>

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
