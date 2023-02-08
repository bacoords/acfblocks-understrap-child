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
<section class="acf-block-about-product">

<div class="container py-5">

	<div class="row">

		<div class="col-12 col-md-6">
			<h2><?php the_field( 'headline' ); ?></h2>
			<?php $image = get_field( 'image' ); ?>
			<?php echo wp_get_attachment_image( $image ); ?>
		</div>

		<div class="col-12 col-md-6">
			<?php
			$product_highlights = get_field( 'product_highlights' );
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
