
const defaultConfig = require('@wordpress/scripts/config/webpack.config');

module.exports = {
    ...defaultConfig,
    entry: {
        'index': './src/index.js',
        'dashboard': './src/dashboard-index.js',
        'location': './src/location.js',
        'dentists': './src/findDentist.js',
        'events': './src/events.js',
        'clamp': './src/clamp.min.js',
        'locationPost': './src/locationPost.js', 
    },
    module: {
        ...defaultConfig.module,
        rules: [
            ...defaultConfig.module.rules,
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-react']
                    }
                }
            },
            {
                test: /\.(gltf)$/,
                loader: "gltf-loader",
            },
            {
                test: /\.(bin|png|jpe?g)$/,
                type: "asset/resource",
            },
        ],
    },
}