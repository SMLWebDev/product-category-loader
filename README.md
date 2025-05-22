# Woo Category Grid Loader

A Lightweight, customisable WordPress plugin to display WooCommerce Product Categories in a responsive Grid Layout with pagination.

## 🧩 Features

    - Ajax-powered "Load More" functionality
    - Display product categories in a responsive grid
    - Easily customisable via shortcode attributes
    - Modern, CSS Grid-based layout

---

## 🛠️ Installation

1. Upload the plugin `.zip` file via **Plugins > Add New > Upload Plugin**
2. Or extract the contents into your `wp-content/plugins/` directory
3. Activate the plugin through the **Plugins** menu in WordPress

---

## 🧾 Shortcode Usage

Use the `[woo_category_grid]` shortcode anywhere on a page or post

### Example

```php
[woo_category_grid columns="3" per_page="6" class="columns-3"]
```

### Attributes:
| Attribute | Type   | Default | Description
| --------- | ------ | ------- | -----------
| columns   | int    | 3       | Number of Categories per row
| per_page  | int    | 6       | Categories to load each time
| class     | string | ''      | Optional extra CSS class for the wrapper

---

## 🎨 Styling

Customise layout using CSS or override styles in your theme:
    - Supports columns-2, columns-3, columns-4 classes.
    - Card layout is mobile-responsive and accessible.

---

## Composer Integration (optional)

If you use Composer to manage WordPress:

##### 1. Add this to your site's composer.json:
```json
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/sml-web-dev/woo-category-grid-loader"
        }
    ]
```

##### 2. Require it:
```composer
    composer require sml-web-dev/woo-category-grid-loader:dev-main
```

##### 3. Activate the plugin in WordPress admin (or automate with WP-CLI if needed).

---

## 📄 Licence

The MIT License (MIT) [text](https://rem.mit-license.org/+MIT)