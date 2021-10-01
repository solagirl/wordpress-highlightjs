# wordpress-highlightjs
Highlight code with highlight.js for WordPress blog posts

# How to use
* Put the plugins folder to the activated theme's root directory.
* Put the code below in the theme's functions.php.
```php
require get_stylesheet_directory() . '/plugins/highlightjs/syntax-highlighting.php';
```
* When editing a post, insert a code block and put your codes in it. The hightlight.js can automatically detect language.
