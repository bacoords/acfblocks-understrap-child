<section class="acf-row-hero bg-primary text-white">

	<div class="container">

		<div class="row py-5">

			<div class="col-12 col-md-6">
				<span>Home &gt; <?php echo get_the_title(); ?></span>
				<h1><?php the_sub_field( 'headline' ); ?></h1>
				<p class="lead"><?php the_sub_field( 'content' ); ?></p>
			</div>

			<div class="col-12 col-md-6">
				<?php $image = get_sub_field( 'image' ); ?>
				<?php echo wp_get_attachment_image( $image ); ?>
			</div>

		</div>
	</div>

</section>
