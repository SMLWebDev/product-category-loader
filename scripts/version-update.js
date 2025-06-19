const fs = require('fs');

const newVersion = process.env.npm_package_version;
if (!newVersion) {
  console.error('No version found from npm.');
  process.exit(1);
}

// 1. Update composer.json
const composerPath = './composer.json';
const composerJson = JSON.parse(fs.readFileSync(composerPath, 'utf8'));
composerJson.version = newVersion;
fs.writeFileSync(composerPath, JSON.stringify(composerJson, null, 2));

// 2. Update woo-category-grid-loader.php
const pluginFilePath = './woo-category-loader.php';
let pluginFile = fs.readFileSync(pluginFilePath, 'utf8');

// Replace the header version
pluginFile = pluginFile.replace(
  /^( \* Version:\s*)([\d.]+)/m,
  `$1${newVersion}`
);

// Replace the WCL_VERSION constant
pluginFile = pluginFile.replace(
  /define\(\s*'WCL_VERSION'\s*,\s*'[\d.]+'\s*\)/,
  `define( 'WCL_VERSION', '${newVersion}' )`
);

fs.writeFileSync(pluginFilePath, pluginFile);

console.log(`Updated version to ${newVersion} in composer.json and woo-category-loader.php`);