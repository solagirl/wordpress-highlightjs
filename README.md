# wordpress-highlightjs
Highlight code with highlight.js for WordPress blog posts. Code can be copied via clipboard.js

## How to use
* Put the plugins folder to the activated theme's root directory.
* Put the code below in the theme's functions.php.
* Here is a [demo](https://www.solagirl.net/woocommerce-custom-checkout-fields-2021.html).
```php
require get_stylesheet_directory() . '/plugins/highlightjs/syntax-highlighting.php';
```
* When editing a post, insert a code block and put your codes in it. The hightlight.js can automatically detect language.

## Themes
Find the code below
```php
$('head').append('<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/plugins/highlightjs/styles/github.min.css" type="text/css" />');
```
Replace github.min.css with your desired theme stylesheet.
To view all styles supported, visit https://highlightjs.org/static/demo/
