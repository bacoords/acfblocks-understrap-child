wp.domReady( () => {
	let blocks = wp.blocks.getBlockTypes().map( ( block ) => block.name );
	blocks.forEach( ( block ) => {
		if ( block.indexOf( 'core/' ) === 0 ) {
			wp.blocks.unregisterBlockType( block );
		}
	});
} );