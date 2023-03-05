<?php
/**
 * ACF Row: Hero
 *
 * @package UnderstrapChild
 */

?>
<section class="acf-row-hero bg-primary text-white">
	<div class="container">
		<div class="row py-5 align-items-center">

			<div class="col-12 col-md-6">
				<span>Home &gt; <?php echo esc_html( get_the_title() ); ?></span>
				<h1 class="mb-md-5"><?php the_sub_field( 'headline' ); ?></h1>
				<p class="lead"><?php the_sub_field( 'content' ); ?></p>
			</div>

			<div class="col-12 col-md-6">
				<?php $image = get_sub_field( 'image' ); ?>
				<?php echo wp_get_attachment_image( $image, 'full' ); ?>
			</div>

		</div>
	</div>
</section>
