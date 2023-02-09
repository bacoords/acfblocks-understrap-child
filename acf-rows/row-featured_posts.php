<section class="acf-row-featured-posts container pt-5 pb-3 bg-light rounded">

	<div class="row">

		<div class="col-12">
			<h2 class="mb-md-4"><?php the_sub_field( 'headline' ); ?></h2>
		</div>

		<?php
		$posts = get_sub_field( 'posts' );
		if ( $posts ) :
			global $post;
			foreach ( $posts as $post ) :
				setup_postdata( $post );
				?>
				<div class="col-12 col-md-6 col-lg-4">
					<?php get_template_part( 'loop-templates/content', 'post' ); ?>
				</div>
				<?php
			endforeach;
			wp_reset_postdata();
		endif;
		?>
	</div>

</section>
