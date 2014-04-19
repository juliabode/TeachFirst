<?php

function merge_option_default_variables() {
  $options = get_option('plugin_options');

  $defaults = array(
    'tf_facebook_link'          => '',
    'tf_twitter_link'           => '',
    'tf_google_link'            => '',
    'tf_mail_link'              => '',
    'tf_linkedin_link'          => '',
    'tf_xing_link'              => '',
    'tf_skype_link'             => '',
    'tf_youtube_link'           => '',
    'tf_vimeo_link'             => '',
    'tf_flickr_link'            => '',
    'tf_rss_link'               => '',
    'tf_become_fellow_text'       => 'Fellow werden',
    'tf_become_fellow_link'       => '',
    'tf_become_fellow_text_color'       => '#ffffff',
    'tf_become_fellow_bg_color'       => '#93BD10',
    'tf_become_donator_text'      => 'Förderer werden',
    'tf_become_donator_link'       => '',
    'tf_become_donator_text_color'       => '#ffffff',
    'tf_become_donator_bg_color'       => '#07B9E4',
    'imprint_link_setting'        => '',
    'partner_logo_link_setting'        => '',
  );

  return wp_parse_args( $options, $defaults );
}

function create_theme_options_page() {
    // Global variable for Themes' settings page hook
    global $tf_settings_page;

    add_menu_page('Zusätzliche Einstellungen', 'Teachfirst Optionen', 'read', 'tf_options', 'build_options_page', 'dashicons-lightbulb');
}
add_action('admin_menu', 'create_theme_options_page');

function build_options_page() { ?>
  <div id="theme-options-wrap" class="widefat wrap">
    <div class="icon32" id="icon-options-general"><br /></div>
    <h2>Zusätzliche Einstellungen</h2>
    <?php settings_errors(); ?>

    <form method="post" action="options.php" enctype="multipart/form-data">
      <?php settings_fields('plugin_options'); ?>
      <?php do_settings_sections('tf_options'); ?>
      <p class="submit"><input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" /></p>
    </form>
  </div>
<?php }

function register_and_build_fields() {
  register_setting('plugin_options', 'plugin_options', 'validate_setting');

  add_settings_section('social_media_section', 'Social Media Links', 'section_cb', 'tf_options');
  add_settings_field('tf_facebook_link', 'Facebook:', 'tf_facebook_link', 'tf_options', 'social_media_section');
  add_settings_field('tf_twitter_link', 'Twitter:', 'tf_twitter_link', 'tf_options', 'social_media_section');
  add_settings_field('tf_google_link', 'Google+:', 'tf_google_link', 'tf_options', 'social_media_section');
  add_settings_field('tf_mail_link', 'E-Mail:', 'tf_mail_link', 'tf_options', 'social_media_section');
  add_settings_field('tf_linkedin_link', 'LinkedIn:', 'tf_linkedin_link', 'tf_options', 'social_media_section');
  add_settings_field('tf_xing_link', 'Xing:', 'tf_xing_link', 'tf_options', 'social_media_section');
  add_settings_field('tf_skype_link', 'Skype:', 'tf_skype_link', 'tf_options', 'social_media_section');
  add_settings_field('tf_youtube_link', 'Youtube:', 'tf_youtube_link', 'tf_options', 'social_media_section');
  add_settings_field('tf_vimeo_link', 'Vimeo:', 'tf_vimeo_link', 'tf_options', 'social_media_section');
  add_settings_field('tf_flickr_link', 'Flickr:', 'tf_flickr_link', 'tf_options', 'social_media_section');
  add_settings_field('tf_rss_link', 'RSS:', 'tf_rss_link', 'tf_options', 'social_media_section');

  add_settings_section('left_hand_banner', 'Call-to-Action am linken Rand', 'left_hand_banner_content', 'tf_options');
  add_settings_field('tf_become_fellow_text', 'Text für "Fellow"-Feld:', 'tf_become_fellow_text', 'tf_options', 'left_hand_banner');
  add_settings_field('tf_become_fellow_link', 'Link für "Fellow"-Feld::', 'tf_become_fellow_link', 'tf_options', 'left_hand_banner');
  add_settings_field('tf_become_fellow_text_color', 'Textfarbe für "Fellow"-Feld::', 'tf_become_fellow_text_color', 'tf_options', 'left_hand_banner');
  add_settings_field('tf_become_fellow_bg_color', 'Hintergrundfarbe für "Fellow"-Feld::', 'tf_become_fellow_bg_color', 'tf_options', 'left_hand_banner');
  add_settings_field('tf_become_donator_text', 'Text für "Förderer"-Feld::', 'tf_become_donator_text', 'tf_options', 'left_hand_banner');
  add_settings_field('tf_become_donator_link', 'Link für "Förderer"-Feld::', 'tf_become_donator_link', 'tf_options', 'left_hand_banner');
  add_settings_field('tf_become_donator_text_color', 'Textfarbe für "Förderer"-Feld::', 'tf_become_donator_text_color', 'tf_options', 'left_hand_banner');
  add_settings_field('tf_become_donator_bg_color', 'Hintergrundfarbe für "Förderer"-Feld::', 'tf_become_donator_bg_color', 'tf_options', 'left_hand_banner');

  add_settings_section('main_section', 'Einstellungen für den Footer', 'section_cb', 'tf_options');
  add_settings_field('partner_logos_link', 'Link zum Partner-Logo-Banner:', 'partner_logo_link_setting', 'tf_options', 'main_section');
  add_settings_field('imprint_link', 'Link zum Impressum:', 'imprint_link_setting', 'tf_options', 'main_section');
}
add_action('admin_init', 'register_and_build_fields');

function validate_setting($plugin_options) { return $plugin_options; }

function section_cb() {}

function left_hand_banner_content() {
  echo "<p class='description'>Farben können in folgenden Formen eingegen werden: 'black'; 'rgb(0,0,0)'; 'rgba(0,0,0,0)'; '#000000' und 'hsl(354, 100%, 0%)'.</p>";
}

function imprint_link_setting() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_imprint_link]' type='text' value='{$options['tf_imprint_link']}' class='regular-text'/>";
}

function partner_logo_link_setting() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_partner_logo_link]' type='text' value='{$options['tf_partner_logo_link']}' class='regular-text'/>";
}

function tf_facebook_link() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_facebook_link]' type='text' value='{$options['tf_facebook_link']}' class='regular-text'/>";
}

function tf_twitter_link() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_twitter_link]' type='text' value='{$options['tf_twitter_link']}' class='regular-text'/>";
}

function tf_google_link() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_google_link]' type='text' value='{$options['tf_google_link']}' class='regular-text'/>";
}

function tf_mail_link() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_mail_link]' type='text' value='{$options['tf_mail_link']}' class='regular-text'/>";
}

function tf_linkedin_link() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_linkedin_link]' type='text' value='{$options['tf_linkedin_link']}' class='regular-text'/>";
}

function tf_xing_link() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_xing_link]' type='text' value='{$options['tf_xing_link']}' class='regular-text'/>";
}

function tf_skype_link() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_skype_link]' type='text' value='{$options['tf_skype_link']}' class='regular-text'/>";
}

function tf_youtube_link() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_youtube_link]' type='text' value='{$options['tf_youtube_link']}' class='regular-text'/>";
}

function tf_vimeo_link() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_vimeo_link]' type='text' value='{$options['tf_vimeo_link']}' class='regular-text'/>";
}

function tf_flickr_link() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_flickr_link]' type='text' value='{$options['tf_flickr_link']}' class='regular-text'/>";
}

function tf_rss_link() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_rss_link]' type='text' value='{$options['tf_rss_link']}' class='regular-text'/>";
}

function tf_become_fellow_text() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_become_fellow_text]' type='text' value='{$options['tf_become_fellow_text']}' class='regular-text'/>";
}

function tf_become_fellow_link() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_become_fellow_link]' type='text' value='{$options['tf_become_fellow_link']}' class='regular-text'/>";
}

function tf_become_fellow_text_color() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_become_fellow_text_color]' type='text' value='{$options['tf_become_fellow_text_color']}' class='regular-text'/>";
}

function tf_become_fellow_bg_color() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_become_fellow_bg_color]' type='text' value='{$options['tf_become_fellow_bg_color']}' class='regular-text'/>";
}

function tf_become_donator_text() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_become_donator_text]' type='text' value='{$options['tf_become_donator_text']}' class='regular-text'/>";
}

function tf_become_donator_link() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_become_donator_link]' type='text' value='{$options['tf_become_donator_link']}' class='regular-text'/>";
}

function tf_become_donator_text_color() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_become_donator_text_color]' type='text' value='{$options['tf_become_donator_text_color']}' class='regular-text'/>";
}

function tf_become_donator_bg_color() {
  $options = merge_option_default_variables();
  echo "<input name='plugin_options[tf_become_donator_bg_color]' type='text' value='{$options['tf_become_donator_bg_color']}' class='regular-text'/>";
}