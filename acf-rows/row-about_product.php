<section class="acf-row-about-product">

	<div class="container py-5">

		<div class="row">

			<div class="col-12 col-md-6">
				<h2><?php the_sub_field( 'headline' ); ?></h2>
				<?php $image = get_sub_field( 'image' ); ?>
				<?php echo wp_get_attachment_image( $image ); ?>
			</div>

			<div class="col-12 col-md-6">
				<?php
				$product_highlights = get_sub_field( 'product_highlights' );
				if ( $product_highlights ) :
					foreach ( $product_highlights as $product_highlight ) :
						?>
						<div class="product-highlight">
							<h3><?php echo esc_html( $product_highlight['headline'] ); ?></h3>
							<p><?php echo esc_html( $product_highlight['description'] ); ?></p>
						</div>
						<?php
					endforeach;
				endif;
				?>
			</div>

		</div>

	</div>

</section>
