//Get WordPress default webpack config
const defaultConfig = require("./node_modules/@wordpress/scripts/config/webpack.config");

const path = require('path');

// Export a function. Accept the base config as the only param.
module.exports = () => {
  // `mode` has a value of 'DEVELOPMENT' or 'PRODUCTION'
  // You can change the configuration based on that.
  // 'PRODUCTION' is used when building the static version of storybook.

  // Make whatever fine-grained changes you need
  defaultConfig.module.rules.push({
		test: /\.tsx?$/,
		loader: 'awesome-typescript-loader',
		include: __dirname
	}, {
		test: /\.css$/,
		loader: [
			'style-loader',
			'raw-loader',
		],
 })

	defaultConfig.resolve = {
		extensions: [ '.tsx', '.ts', '.js' ],
	}
	
	defaultConfig.entry = {
		//Block editor, what WordPress does by default
		index: path.resolve( process.cwd(), 'src', 'index.tsx' ),
		//Create a front-end JavaScript bundle
		// front: path.resolve( process.cwd(), 'src', 'front.ts' ),
	}

  // Return the altered config
  return defaultConfig
}