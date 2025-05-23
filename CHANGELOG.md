# Changelog

All notable changes to this project will be documented in this file.

The format is base on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),  
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [1.1.3] - 23-05-2025
## Fix
- Fixed error where check_ajax_referer was not defined.
- Updated frontend.js to show correct data.

---

## [1.1.2] - 23-05-2025
## Fix
- Added Vendor folder to fix fatal_error on activation in WordPress.

--- 

## [1.1.1] - 23-05-2025
## Patch
- Patched mix matched versions across composer.json, package.json and woo-category-grid-loader.php

## Fix
- Fixed version-update.js to update all three files with correct version number to allow composer update to work as expected.

---

## [1.1.0] - 22-05-2025
## Fix
- Fixed README.md file showing wrong composer link to add.

---

## [1.0.0] - 22-05-2025
## Change
- Made plugin live as v1

---

## [0.2.0] - 22-05-2025
### Added
- Admin settings page under **Settings > Category Grid Loader**
- Admin UI with shortcode instructions and attribute descriptions
- Composer support for installation via VCS
- Plugin autoloading with PSR-4 in `src/` directory
- Version bump automation using `npm version` and custom script

### Changed
- Renamed shortcode to `[woo_category_grid]` for clarity
- Reorganized codebase to follow best practices

---

## [0.1.0] - 22-05-2025

### Added
- Initial structure created.