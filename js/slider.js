const options = {
	cellAlign: 'left',
	wrapAround: true,
	pageDots: false,
	autoPlay: true,
}
if ( document.getElementsByClassName('acf-row-slider-wrapper').length > 0 ) {
	var flkty = new Flickity( '.acf-row-slider-wrapper', options );
}
if ( document.getElementsByClassName('acf-block-slider-wrapper').length > 0 ) {
	var flkty = new Flickity( '.acf-block-slider-wrapper', options );
}