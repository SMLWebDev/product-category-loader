const fs = require('fs');

const newVersion = process.env.npm_package_version;
const pluginFile = 'woo-category-grid-loader.php';

let content = fs.readFileSync(pluginFile, 'utf-8');
content = content.replace(
    /define\( 'WCGL_VERSION', '.*?' \);/,
    `define( 'WCGL_VERSION', '${newVersion}' );`
);

fs.writeFileSync(pluginFile, content);
console.info(`Updated WCGL_VERSION to ${newVersion}`);