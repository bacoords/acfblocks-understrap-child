<section class="acf-block-slider container-fluid py-5">

	<?php $logos = get_field( 'gallery' ); ?>

	<?php if ( $logos ) : ?>
			<div class="acf-block-slider-wrapper">
				<?php foreach ( $logos as $logo ) : ?>
					<div class="acf-block-slider-item p-5">
						<?php echo wp_get_attachment_image( $logo, 'medium' ); ?>
					</div>
				<?php endforeach; ?>
			</div>
	<?php endif; ?>

</section>
