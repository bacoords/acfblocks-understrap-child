<?php
/**
 * About Product Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */
?>
<section class="acf-block-about-product container my-5 py-5">

	<div class="row align-items-center">

		<div class="col-12 col-md-6">
			<h2><?php the_field( 'headline' ); ?></h2>
			<?php $image = get_field( 'image' ); ?>
			<?php echo wp_get_attachment_image( $image, 'full', false, array( 'class' => 'shadow rounded' ) ); ?>
		</div>

		<div class="col-12 col-md-6">
			<?php
			$product_highlights = get_field( 'product_highlights' );
			if ( $product_highlights ) :
				?>
				<div class="accordion border-0" id="#accordionExample">
					<?php
					foreach ( $product_highlights as $product_highlight ) :
						?>
						<div class="accordion-item border-0">
							<h3 class="accordion-header " id="heading-<?php echo esc_attr( sanitize_title( $product_highlight['headline'] ) ); ?>">
								<button class="accordion-button collapsed fw-bold fs-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo esc_attr( sanitize_title( $product_highlight['headline'] ) ); ?>" aria-expanded="false" aria-controls="collapse-<?php echo esc_attr( sanitize_title( $product_highlight['headline'] ) ); ?>">
									<?php echo esc_html( $product_highlight['headline'] ); ?>
								</button>
							</h3>
							<div id="collapse-<?php echo esc_attr( sanitize_title( $product_highlight['headline'] ) ); ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo esc_attr( sanitize_title( $product_highlight['headline'] ) ); ?>" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<?php echo esc_html( $product_highlight['description'] ); ?>
								</div>
							</div>
						</div>
						<?php
					endforeach;
					?>
				</div>
			<?php endif; ?>
		</div>

	</div>

</section>
