WPized Light
============

WPized Light is supposed to facilitate the creation of simple WordPress based themes and organize the project in logical and consistent inclusions to simplify the development and debugging process among different collaborators.
    
WPized Light contains most common files, used among every projects, ie.

### Most common theme files
- index.php
- style.css
- header.php
- footer.php
- sidebar.php 
- single.php (single post display)
- page.php (single page display)
- search.php (search results display)
- searchform.php (search form display)
- 404.php (404 error page)
- archive.php (archive page display) 
- home.php (home page display if no front page is set) 
- front-page.php (front page display if it’s set on the WP settings page)
- comments.php
- functions.php

Not all of the above files are required but most themes need to have them included to split the layout into parts depending on what we’re trying to see. WordPress will automatically make usage of the proper file. 

### Partial files
- partials/content.php
- partials/content-loop.php

The above partial files should be used via **get_template_part** function call to improve code readability and reduce code repetitions.

Please make sure to understand how does the function work: http://codex.wordpress.org/Function_Reference/get_template_part 

Following the convention make sure that you follow the content-{template} rule, where single, page, archive etc, should be included in their respective counterparts and content-loop would used to within a loop displaying multiple results. 

In case any other precision was required please try to be as descriptive as possible.

In case certain files were growing big, it’s a good practice to use **get_template_part** and split the file into more specific parts. For example having multiple menus or widgetized areas we could simply use:

```php
get_template_part( 'partials/menu1' );
get_template_part( 'partials/menu2' );
```

In the above case make sure to place the files inside the partials subdirectory.

Finally get_template_part can be used while having multiple post formats enabled http://codex.wordpress.org/Post_Formats in that case we can easily use

```php
get_template_part( 'content', get_post_format() ); // having everything taken care of semi-automatically. 
```

http://codex.wordpress.org/Function_Reference/get_post_format

### functions.php file

functions.php is the file where most of the Theme based functions should be placed, by default there’s nothing enabled with WPized Light.

## WPized Light Theme Specific Functionality
WPized Light comes with some default functions that can be enabled with simple function call, placed within the functions.php of the theme:

