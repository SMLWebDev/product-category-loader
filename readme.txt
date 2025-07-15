=== Product Category Loader ===
Contributors: simonlowe
Tags: woocommerce, category, load more, shortcode, grid layout
Requires at least: 5.8
Tested up to: 6.8
Requires PHP: 8.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A modern, flexible shortcode plugin that displays WooCommerce product categories in a responsive layout with a "Load More" button.

== Description ==

**Product Category Loader** is a lightweight and customizable plugin for displaying WooCommerce categories in a clean, responsive layout. Great for homepages, landing pages, or product overview sections.

**Features:**
- Display WooCommerce categories in a customizable grid.
- Add "Load More" functionality with AJAX.
- Choose layout (grid or card).
- Shortcode generator in admin panel.
- Fully responsive and modern design.
- Built with performance and extensibility in mind.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/product-category-loader` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the ‘Plugins’ screen in WordPress.
3. Use the shortcode `[product_category_loader]` anywhere you want to display the grid.

== Frequently Asked Questions ==

= How do I use the shortcode? =

Use `[product_category_loader]` with optional attributes:
- `per_page`
- `columns`
- `order`
- `orderby`
- `hide_empty`
- `layout`

Example:
`[product_category_loader per_page="6" columns="3" hide_empty="true" layout="card"]`

= Where is the shortcode generator? =

Go to **Product Category Loader > Shortcode Generator** in the WordPress admin panel.

= Can I change the layout? =

Yes, choose between `grid` or `card` layout using the `layout` attribute in the shortcode.

= Does this support AJAX? =

Yes, categories are loaded using AJAX when you click the "Load More" button.

== Screenshots ==

1. Admin panel shortcode generator
2. Grid layout with categories
3. "Load More" in action

== Changelog ==

= 1.0.0 =
* Initial stable release

== Upgrade Notice ==

= 1.0.0 =
First official release of Product Category Loader.

