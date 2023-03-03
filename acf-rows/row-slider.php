<section class="acf-row-slider container-fluid py-5">

	<?php $logos = get_sub_field( 'gallery' ); ?>

	<?php if ( $logos ) : ?>
			<div class="acf-row-slider-wrapper">
				<?php foreach ( $logos as $logo ) : ?>
					<div class="acf-row-slider-item p-5">
						<?php echo wp_get_attachment_image( $logo, 'medium' ); ?>
					</div>
				<?php endforeach; ?>
			</div>
	<?php endif; ?>

</section>
