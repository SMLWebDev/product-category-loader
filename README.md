# Product Category Loader

A Lightweight, customisable WordPress plugin to display WooCommerce Product Categories in a responsive Layout with pagination.

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

Use the `[pcl_category_loader]` shortcode anywhere on a page or post

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

`hide_empty` - Set to 'true' or 'false' to display empty categories or not.


### Example

```php
[pcl_category_loader columns="3" per_page="6" class="columns-3" orderby="name" order="ASC" hide_empty="false" layout="grid"]
```

### Attributes:
| Attribute  | Type   | Default | Description
| ---------  | ------ | ------- | -----------
| columns    | int    | 3       | Number of Categories per row
| per_page   | int    | 6       | Categories to load each time
| orderby    | string | name    | How you want the category list to be ordered by
| order      | string | ASC     | Which order you want the categories to show
| hide_empty | string | true    | Option to display empty categories or hide them
| layout     | string | grid    | Allows you to pick between different layouts
| class      | string | ''      | Optional extra CSS class for the wrapper

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
            "url": "https://github.com/sml-web-dev/product-category-loader"
        }
    ]
```

##### 2. Require it:
```composer
    composer require sml-web-dev/product-category-loader
```

##### 3. Activate the plugin in WordPress admin (or automate with WP-CLI if needed).

---

## Support
Before reporting issues:
1. Check the [FAQ](https://wordpress.org/plugins/product-category-loader/#faq)
2. Search [WordPress Support](https://wordpress.org/support/plugin/product-category-loader/)
3. For confirmed bugs, use [GitHub Issues](https://github.com/your-repo/issues/new?template=bug_report.md)

## 💬 Community Support
- 🚀 [Showcase your implementation](https://github.com/your-repo/discussions/categories/showcase)
- 💡 [Ask configuration questions](https://github.com/your-repo/discussions/categories/q-a)

---

## 📄 Licence

The MIT License (MIT) [text](https://rem.mit-license.org/+MIT)
