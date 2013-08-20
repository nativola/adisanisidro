<?php
/**
 * Custom functions
 */
function detect_mobile()
{
    if(preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|playbook|sagem|sharp|sie-|silk|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT']))
        return true;
 
    else
        return false;
}
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

///Page Navigation
	function wp_pagenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $args['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $args['total'] = $max;
  $args['current'] = $current;
 
  $total = 1;
  $args['mid_size'] = 3;
  $args['end_size'] = 1;
  $args['prev_text'] = '«';
  $args['next_text'] = '»';
 
  if ($max > 1) echo '<div class="wp-pagenavi">';
 	if ($total == 1 && $max > 1)
 		echo paginate_links($args);
 	if ($max > 1) echo '</div>';
}
// Ecerpt Length

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }
//User Addon
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

<h3>Extra profile information</h3>

<table class="form-table">
  <tr>
    <th><label for="twitter"><?php _e('Occupation', 'virtue');?></label></th>
    <td>
      <input type="text" name="occupation" id="occupation" value="<?php echo esc_attr( get_the_author_meta( 'occupation', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Occupation.', 'virtue');?></span>
    </td>
  </tr>
  <tr>
    <th><label for="twitter">Twitter</label></th>
    <td>
      <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Twitter username.', 'virtue'); ?></span>
    </td>
  </tr>
    <tr>
    <th><label for="facebook">Facebook</label></th>
    <td>
      <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Facebook url. (be sure to include http://)', 'virtue'); ?></span>
    </td>
  </tr>
    <tr>
    <th><label for="google">Google Plus</label></th>
    <td>
      <input type="text" name="google" id="google" value="<?php echo esc_attr( get_the_author_meta( 'google', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Google Plus url. (be sure to include http://)', 'virtue'); ?></span>
    </td>
  </tr>
    <tr>
    <th><label for="flickr">Flickr</label></th>
    <td>
      <input type="text" name="flickr" id="flickr" value="<?php echo esc_attr( get_the_author_meta( 'flickr', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Flickr url. (be sure to include http://)', 'virtue'); ?></span>
    </td>
  </tr>
    <tr>
    <th><label for="vimeo">Vimeo</label></th>
    <td>
      <input type="text" name="vimeo" id="vimeo" value="<?php echo esc_attr( get_the_author_meta( 'vimeo', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Vimeo url. (be sure to include http://)', 'virtue'); ?></span>
    </td>
  </tr>
    <tr>
    <th><label for="linkedin">Linkedin</label></th>
    <td>
      <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Linkedin url. (be sure to include http://)', 'virtue'); ?></span>
    </td>
  </tr>
    <tr>
    <th><label for="dribbble">Dribbble</label></th>
    <td>
      <input type="text" name="dribbble" id="dribbble" value="<?php echo esc_attr( get_the_author_meta( 'dribbble', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Dribbble url. (be sure to include http://)', 'virtue'); ?></span>
    </td>
  </tr>
    <tr>
    <th><label for="pinterest">Pinterest</label></th>
    <td>
      <input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'pinterest', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Pinterest url. (be sure to include http://)', 'virtue'); ?></span>
    </td>
  </tr>
  <tr>
    <th><label for="instagram">Instagram</label></th>
    <td>
      <input type="text" name="instagram" id="instagram" value="<?php echo esc_attr( get_the_author_meta( 'instagram', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e('Please enter your Instagram url. (be sure to include http://)', 'virtue'); ?></span>
    </td>
  </tr>
</table>
<?php }
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
  update_user_meta( $user_id, 'occupation', $_POST['occupation'] );
    update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
  update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
  update_user_meta( $user_id, 'google', $_POST['google'] );
  update_user_meta( $user_id, 'flickr', $_POST['flickr'] );
  update_user_meta( $user_id, 'vimeo', $_POST['vimeo'] );
  update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
  update_user_meta( $user_id, 'dribbble', $_POST['dribbble'] );
  update_user_meta( $user_id, 'pinterest', $_POST['pinterest'] );
  update_user_meta( $user_id, 'instagram', $_POST['instagram'] );
}

