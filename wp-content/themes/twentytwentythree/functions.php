<?php
// Add a shortcode to get user meta by email
function get_user_meta_by_email($atts) {
    // Extract the shortcode attributes
    $atts = shortcode_atts(array(
        'email' => ''
    ), $atts, 'user_meta_by_email');

    // If no email is provided, return an error message
    if (empty($atts['email'])) {
        return "Error: No email address provided.";
    }

    // Get the user data by email
    $user = get_user_by('email', $atts['email']);

    // If the user does not exist, return an error message
    if (!$user) {
        return "Error: User not found.";
    }

    // Get all user meta data
    $user_meta = get_user_meta($user->ID);

    // Prepare the output
    $output = "<ul>";
    foreach ($user_meta as $key => $value) {
        $output .= "<li><strong>" . esc_html($key) . "</strong>: " . esc_html(implode(', ', $value)) . "</li>";
    }
    $output .= "</ul>";

    return $output;
}
add_shortcode('user_meta_by_email', 'get_user_meta_by_email');

function pmpro_add_wysiwyg_editor_to_checkout() {
  global $current_user;

  // Get the current user's rich text content
  $rich_text_content = get_user_meta($current_user->ID, 'rich_text_content', true);
  ?>
<div class="pmpro_checkout" id="pmpro_rich_text_content">
  <h3>
    <span class="pmpro_checkout-h3-name">Rich Text Content</span>
  </h3>
  <div class="pmpro_checkout-fields">
    <label for="rich_text_content">Your Rich Text Content:</label>
    <?php
          wp_editor(
              $rich_text_content,
              'rich_text_content',
              [
                  'textarea_name' => 'rich_text_content',
                  'editor_class' => 'pmpro_required',
                  'textarea_rows' => 10,
              ]
          );
          ?>
    <div class="pmpro_clear"></div>
  </div> <!-- end pmpro_checkout-fields -->
</div> <!-- end pmpro_rich_text_content -->
<?php
}
add_action('pmpro_checkout_after_user_fields', 'pmpro_add_wysiwyg_editor_to_checkout');

function pmpro_save_wysiwyg_editor_content($user_id) {
  if (isset($_REQUEST['rich_text_content'])) {
      $rich_text_content = $_REQUEST['rich_text_content'];
      update_user_meta($user_id, 'rich_text_content', $rich_text_content);
  }
}
add_action('pmpro_checkout_before_processing', 'pmpro_save_wysiwyg_editor_content');