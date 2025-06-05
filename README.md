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

`columns` - Can use a number of columns between 1-6.<br>
`per_page` - No limit is set on per_page attribute.<br>
`order` - Uses the following parameters:
    
* ‘ASC‘ – ascending order from lowest to highest values (1, 2, 3; a, b, c).
* ‘DESC‘ – descending order from highest to lowest values (3, 2, 1; c, b, a).

`orderby` - Uses parameters from the following:
    
* ‘none‘ – No order (available since version 2.8).
* ‘name‘ – Order by post name (post slug).
* ‘slug‘ - Order by category slug.
* ‘count‘ - Orders by number of items in category.
* ‘term_id‘ - Orders by the category terms ID.
* ‘description‘ - Orders categories based on their descriptions.
* ‘include‘ - Orders categories based on if they include items.


### Example

```php
[woo_category_grid columns="3" per_page="6" class="columns-3" orderby="name" order="ASC"]
```

### Attributes:
| Attribute | Type   | Default | Description
| --------- | ------ | ------- | -----------
| columns   | int    | 3       | Number of Categories per row
| per_page  | int    | 6       | Categories to load each time
| orderby   | string | name    | How you want the category list to be ordered by
| order     | string | ASC     | Which order you want the categories to show
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
    composer require sml-web-dev/woo-category-grid-loader
```

##### 3. Activate the plugin in WordPress admin (or automate with WP-CLI if needed).

---

## 📄 Licence

The MIT License (MIT) [text](https://rem.mit-license.org/+MIT)
