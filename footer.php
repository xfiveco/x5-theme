<?php
/**
 * WPized Light: Footer
 *
 * Remember to always include the wp_footer() call before the </body> tag
 *
 * @package WordPress
 * @subpackage WPized_Light
 */
?>

<footer id="footer">
  <p id="copyrights">
    &copy; <?php echo date( 'Y' ) . " " . get_bloginfo( 'name' ); ?>
  </p>
</footer>

<?php
// do not remove
wp_footer();
?>

</body>
</html>
