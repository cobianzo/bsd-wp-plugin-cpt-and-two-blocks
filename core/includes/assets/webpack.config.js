const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );

module.exports = {
	...defaultConfig,
	entry: {
		...defaultConfig.entry,
		block1: path.resolve( process.cwd(), 'src', 'block1/index.js' ),
		block2: path.resolve( process.cwd(), 'src', 'block2/index.js' ),
	},
};
