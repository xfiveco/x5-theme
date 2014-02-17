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
WPized Light comes with some default functions that can be enabled with simple function call, placed within the functions.php of the theme.

### wp_light_seo_title

Will print a SEO friendly and optimized title between the `<title> </title>` tags instead of the default WordPress title.

```php
add_theme_support( 'wp_light_seo_title' ); 
```

### wp_light_threaded_comments

Will enable threaded comments (reply link and dynamic .js)

```php
add_theme_support( 'wp_light_threaded_comments' );
```

### wp_light_comment_form_defaults

Will enable default styling of the comment form and will also add default form fields

```php
add_theme_support( 'wp_light_comment_form_defaults' );
```

### wp_light_default_sidebar

Will make the theme sidebar ready by adding the Widgets section to the Appearance -> Widgets, file which displays the sidebar is sidebar.php 

```php
add_theme_support( 'wp_light_default_sidebar' ); 
```

### wp_light_default_menu

Will add Appearance -> Menus entry, giving you the ability to add menu entries. The menu, if filled with content will be automatically printed in header.php line 42.

```php
add_theme_support( 'wp_light_default_menu' );
```

Each of these functions (exculding seo-title, threaded-comments, comments) has an optional second parameter in the form of an array that lets one overwrite the defaults. 

By default functions.php supply default values. For instance:

```php
add_theme_support( 'sidebars', array(
    array(),
    array(),
    array()
));
```

Would register 3 different sidebars with default values: (Sidebar-1, Sidebar-2, Sidebar-3), the function behind is using [register_sidebar( $sidebar );](http://codex.wordpress.org/Function_Reference/register_sidebar) hence the argument is an array of comma separated arrays, where each array stands for a sidebar. Passing some extra arguments can overwrite the defaults. Say:

```php
add_theme_support( 'sidebars', array(
    array(),
    array(),
    array(
        'name' => __( "Sidebar-Rafal", WP_LIGHT ),
        'id' => "sidebar-rafal",
    )
));
```

Would create a differently named 3rd Sidebar.

The same pattern applies to all other functionalities. That is 

```php
add_theme_support( 'menus', array(
    'navigation-top' => __( 'Top Navigation Menu' ),
    'navigation-foot' => __( 'Footer Navigation Menu' ),
));
```

makes usage of the [register_nav_menus( $menus );](http://codex.wordpress.org/Function_Reference/register_nav_menus) 

If navigation-top was present it will be automatically rendered at within the header.php file starting line 42.

```php
add_theme_support( 'images', array(
    '400x500' => array(
        'width' => '400',
        'height' => '500',
        'crop' => true,
    )
));
```    

Makes usage of [add_image_size();](http://codex.wordpress.org/Function_Reference/add_image_size) function, automatically adding support for post thumbnails.

```php
add_theme_support( 'cpt', array(
	// team post
	'wp-light-team' => array(
		'singular' => 'Team Member',
		'plural' => 'Team Members',
		'rewrite' => array( 'slug' => 'team', 'with_front' => true, 'publicly_queryable' => true ),
	),
) );
```  

Makes usage of [register_post_type();](http://codex.wordpress.org/Function_Reference/register_post_type) function. The posts are named after each array key passed (hence wp-light-team will be this Post Type's prefix.

Similarly: 

```php
add_theme_support( 'custom-tax', array(
	// taxonomy like category
	'wp-light-team-tag' => array(
		'singular' => 'Member Category',
		'plural' => 'Member Categories',
		'rewrite' => array( 'slug' => 'category', 'with_front' => false ),
		'posts' => array( 'wp-light-team' ),
	),
		)
);
```  

Makes usage of [register_taxonomy();](http://codex.wordpress.org/Function_Reference/register_taxonomy) function.

Please avoid adding any config directly to the functions.php file. Every extra, theme specific functions should be stored within includes directory, given a descriptive name.

For example sidebars.php would only contain logic related to sidebars (as register_sidebar), nav-menus would solely contain logic related to navigation menus etc.
