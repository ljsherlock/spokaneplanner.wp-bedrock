module.exports = (config, env) => {
  // `mode` has a value of 'DEVELOPMENT' or 'PRODUCTION'
  // You can change the configuration based on that.
  // 'PRODUCTION' is used when building the static version of storybook.

  const path = require('path');

  // // Make whatever fine-grained changes you need
  config.module.rules.push({
    test: /\.ts|\.tsx$/,
    use: 'awesome-typescript-loader',
    include: __dirname
  }, {
   	test: /\.css$/,
		use: [
			'style-loader',
			'raw-loader',
		],
  })
  
  config.resolve = {
		extensions: [ '.tsx', '.ts', '.js' ],
  }
  
  config.entry = {
		//Block editor, what WordPress does by default
		index: path.resolve( process.cwd(), 'src', 'index.tsx' ),
	}
  
  // Return the altered config
  return config
}