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
`order` - This uses WordPress builtin parameter for WP_Query()[^1]. It can include the follow:
    
* ‘ASC‘ – ascending order from lowest to highest values (1, 2, 3; a, b, c).
* ‘DESC‘ – descending order from highest to lowest values (3, 2, 1; c, b, a).

`orderby` - This uses WordPress builtin parameter for WP_Query()[^1]. It can include any of the following:
    
* ‘none‘ – No order (available since version 2.8).
* ‘ID‘ – Order by post id. Note the capitalization.
* ‘author‘ – Order by author.
* ‘title‘ – Order by title.
* ‘name‘ – Order by post name (post slug).
* ‘type‘ – Order by post type (available since version 4.0).
* ‘date‘ – Order by date.
* ‘modified‘ – Order by last modified date.
* ‘parent‘ – Order by post/page parent id.
* ‘rand‘ – Random order.
* ‘comment_count‘ – Order by number of comments (available since version 2.9).
* ‘relevance‘ – Order by search terms in the following order: First, whether the entire sentence is matched. Second, if all the search terms are within the titles. Third, if any of the search terms appear in the titles. And, fourth, if the full sentence appears in the contents.
* ‘menu_order‘ – Order by Page Order. Used most often for pages (Order field in the Edit Page Attributes box) and for attachments (the integer fields in the Insert / Upload Media Gallery dialog), but could be used for any post type with distinct ‘menu_order‘ values (they all default to 0).
* ‘meta_value‘ – Note that a ‘meta_key=keyname‘ must also be present in the query. Note also that the sorting will be alphabetical which is fine for strings (i.e. words), but can be unexpected for numbers (e.g. 1, 3, 34, 4, 56, 6, etc, rather than 1, 3, 4, 6, 34, 56 as you might naturally expect). Use ‘meta_value_num‘ instead for numeric values. You may also specify ‘meta_type‘ if you want to cast the meta value as a specific type. Possible values are ‘NUMERIC’, ‘BINARY’, ‘CHAR’, ‘DATE’, ‘DATETIME’, ‘DECIMAL’, ‘SIGNED’, ‘TIME’, * ‘UNSIGNED’, same as in ‘$meta_query‘.
* ‘meta_value_num‘ – Order by numeric meta value (available since version 2.8). Also note that a ‘meta_key=keyname‘ must also be present in the query. This value allows for numerical sorting as noted above in ‘meta_value‘.
* ‘post__in‘ – Preserve post ID order given in the post__in array (available since version 3.5). Note – the value of the order parameter does not change the resulting sort order.
* ‘post_name__in‘ – Preserve post slug order given in the ‘post_name__in’ array (available since Version 4.6). Note – the value of the order parameter does not change the resulting sort order.
* ‘post_parent__in‘ -Preserve post parent order given in the ‘post_parent__in’ array (available since Version 4.6). Note – the value of the order parameter does not change the resulting sort order.

[^1]: Details taken from WordPress.org [here]("https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters")


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