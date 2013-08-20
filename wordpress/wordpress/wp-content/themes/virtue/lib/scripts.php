<?php
/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/bootstrap.css
 * 2. /theme/assets/css/bootstrap-responsive.css
 * 3. /theme/assets/css/virtue.css
 * 4. /theme/assets/css/skin.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.9.1.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.6.2.min.js
 * 3. /theme/assets/js/plugins.js (in footer)
 * 4. /theme/assets/js/main.js    (in footer)
 */
function kadence_scripts() {
  wp_enqueue_style('kadence_bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', false, null);
  wp_enqueue_style('kadence_bootstrap_responsive', get_template_directory_uri() . '/assets/css/bootstrap-responsive.css', array('kadence_bootstrap'), null);
  wp_enqueue_style('kadence_app', get_template_directory_uri() . '/assets/css/virtue.css', false, null);
global $smof_data; if($smof_data['skin_stylesheet'] != '') {$skin = $smof_data['skin_stylesheet'];} else { $skin = 'default.css';} 
 wp_enqueue_style('virtue_skin', get_template_directory_uri() . '/assets/css/skins/'.$skin.'', false, null);

  // jQuery is loaded using the same method from HTML5 Boilerplate:
  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', false, null, false);
    add_filter('script_loader_src', 'kadence_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.6.2.min.js', false, null, false);
  wp_register_script('kadence_plugins', get_template_directory_uri() . '/assets/js/plugins.js', false, null, true);
  wp_register_script('kadence_main', get_template_directory_uri() . '/assets/js/main.js', false, null, true);
  wp_enqueue_script('jquery');
  wp_enqueue_script('modernizr');
  wp_enqueue_script('kadence_plugins');
  wp_enqueue_script('kadence_main');
}
add_action('wp_enqueue_scripts', 'kadence_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function kadence_jquery_local_fallback($src, $handle) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/vendor/jquery-1.9.1.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}

function kadence_google_analytics() { ?>
<script>
  var _gaq=[['_setAccount','<?php echo GOOGLE_ANALYTICS_ID; ?>'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php }
if (GOOGLE_ANALYTICS_ID) {
  add_action('wp_footer', 'kadence_google_analytics', 20);
}
