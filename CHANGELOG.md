# Changelog

All notable changes to this project will be documented in this file.

The format is base on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),  
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## Unreleased

- Add fallback image for categories without thumbnails which overrided WooCommerce.
- Styling tweaks and accessibilty enhancements.
- Improve error handling in AJAX responses.
- Optional Infinite Scroll as alternative to "Load More".

---

## [1.0.0] - 2023-06-19

### Added
- Initial plugin release with core functionality:
  - Dynamic WooCommerce category loading system
  - Shortcode implementation (`[product_category_loader]`)
  - Admin configuration panel with settings for:
    - Items per page
    - Display columns
    - Sorting options
    - Empty category visibility toggle
  - Multiple layout options (grid/card views)
  - AJAX-powered "Load More" functionality
  - Mobile-responsive designs
  - Nonce security for all AJAX requests
  - Tested compatibilty with:
    - WordPress 6.8.1+
    - WooCommerce 9.8.5+
    - Elementor 3.29.1+
    - Beaver Builder 2.9.0.5+
    - PHP 8.4.4+

### Changed
- Improved architecture for future extensibility.

### Deprecated

### Removed

### Fixed
- Resolved initial bug with 'hide_empty' parameter handling.
- Corrected mobile layout issues in card view.

### Security

---