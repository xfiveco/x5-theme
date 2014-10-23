<?php
/*
 * WPized Light: Search form
 * 
 * @package WordPress
 * @subpackage WPized_Light
 */
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label for="s" class="assistive-text"><?php _e( 'Search', WP_LIGHT ); ?></label>
  <input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', WP_LIGHT ); ?>" />
  <input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', WP_LIGHT ); ?>" />
</form>

