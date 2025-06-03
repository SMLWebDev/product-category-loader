# 🚧 Woo Category Grid Loader – Roadmap

This roadmap outlines planned development milestones for both the **free** and **paid (PRO)** versions of the Woo Category Grid Loader WordPress plugin.

---

## ✅ Version 1.0 (Free Plugin – MVP)

A lightweight plugin to display WooCommerce product categories in a grid with AJAX "Load More" functionality.

### Features
- [x] Shortcode: `[wcgl_grid]`
  - Supports attributes: `columns`, `per_page`, `orderby`, `order`
- [x] Responsive Grid Layout
  - CSS grid that adapts to any number of columns
- [x] AJAX Pagination
  - Load more categories dynamically
- [x] Frontend Asset Management
  - Enqueued CSS and JS files
- [x] Admin Page
  - Linked via *Settings > Category Grid Loader*
- [x] Clean Codebase
  - Composer-compatible, modular, and OOP-structured
- [x] GitHub Versioning
  - Semantic versioning using `npm version`
  - Release tags with changelogs
- [x] Shortcode Generator:
  - Form UI that builds a shortcode with live preview
  - Copy shortcode to clipboard

---

## 🧪 Planned for v1.x

Enhancements and quality-of-life improvements post-initial release.

- [ ] Add fallback image for categories without thumbnails
- [ ] Toggle to hide empty categories via shortcode
- [ ] Styling tweaks and accessibility enhancements
- [ ] Better error handling in AJAX responses
- [ ] Optional infinite scroll as alternative to "Load More"

---

## 🚀 Version 2.0 (PRO Plugin)

A premium add-on with advanced customization features, layout options, and admin tooling.

### Admin Features
- [ ] Dedicated Admin Menu Page
- [ ] Tabbed Settings UI:
  - General (default values)
  - Styles (colors, borders, spacing)
  - Shortcode Generator

### Design & Layout
- [ ] Layout presets: Card, Minimal, Shadow
- [ ] Toggle rounded corners, hover effects, image aspect ratios
- [ ] Custom color pickers and spacing controls

### Additional Features
- [ ] Masonry or grid layout toggle
- [ ] Carousel/Slider layout option
- [ ] List view for categories
- [ ] Category count toggle

### Compatibility
- [ ] Gutenberg block support
- [ ] Elementor/Divi integration
- [ ] WPML/Polylang compatibility
- [ ] Accessibility improvements

### Infrastructure
- [ ] Licensing system (e.g., Freemius or custom)
- [ ] Optional telemetry (opt-in usage tracking)

---

## 📝 Notes

- The free plugin will remain focused, fast, and developer-friendly.
- The PRO version will be extensible and built for users who want design control.
- Contributions, issues, and feature requests are welcome via [GitHub Issues](https://github.com/SMLWebDev/woo-category-grid-loader/issues).

---
