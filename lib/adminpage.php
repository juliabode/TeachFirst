<?php

function admin_register_head() {  
  $url = get_bloginfo('template_directory') . '/assets/css/options_page.css';
  echo "<link rel='stylesheet' href='$url' />\n";
}
add_action('admin_head', 'admin_register_head');

function create_theme_options_page() {
  add_dashboard_page('Zusätzliche Einstellungen', 'Theme Options', 'administrator', __FILE__, 'build_options_page');
}
add_action('admin_menu', 'create_theme_options_page');

function build_options_page() { ?>
  <div id="theme-options-wrap" class="widefat wrap">
    <div class="icon32" id="icon-options-general"><br /></div>
    <h2>Zusätzliche Einstellungen</h2>
    <?php settings_errors(); ?>

    <form method="post" action="options.php" enctype="multipart/form-data">
      <?php settings_fields('theme_options'); ?>
      <?php do_settings_sections(__FILE__); ?>
      <p class="submit"><input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" /></p>
    </form>
  </div>
<?php }

function register_and_build_fields() {
  register_setting('plugin_options', 'plugin_options', 'validate_setting');
  add_settings_section('main_section', 'Einstellungen für den Footer', 'section_cb', __FILE__);
  add_settings_field('imprint_link', 'Link zum Impressum:', 'imprint_link_setting', __FILE__, 'main_section');
}
add_action('admin_init', 'register_and_build_fields');

function validate_setting($plugin_options) { return $plugin_options; }

function section_cb() {}

function imprint_link_setting() {
  $options = get_option('plugin_options');
  echo "<input name='plugin_options[tf_imprint_link]' type='text' value='{$options['tf_imprint_link']}' class='regular-text'/>";
}

