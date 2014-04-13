<header class="banner" role="banner">
  <nav class="navTop" role="navigation">
    <div class="container">
      <?php
        if (has_nav_menu('top_slider_navigation')) :
          wp_nav_menu(array('theme_location' => 'top_slider_navigation', 'menu_class' => 'alignright'));
        endif;
      ?>
    </div>
  </nav>

<?php global $wp_query;
   $page_parent_image = function_exists('get_field') ? get_field('header_image', $wp_query->post->post_parent) : '';
    if ( $page_parent_image ) {
      $slider_or_image =  wp_get_attachment_image( $page_parent_image, 'full' );
      $header_class = 'slider header-img';
    } else {
      $slider_or_image = do_shortcode( '[responsive_slider]' );
      $header_class = 'slider';
    }
?>

  <div class="<?php echo $header_class; ?>">
    <a href="<?php echo home_url(); ?>" class="logo"><?php echo get_bloginfo('name'); ?></a>
    <?php echo $slider_or_image; ?>
  </div>

  <nav class="navMain navbar navbar-default" role="navigation">
    <div class="white-nav-border">
      <a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
        <i class="fa fa-bars"></i>
      </a>
      <div class="container nav-main nav-collapse collapse">
        <?php
          if (has_nav_menu('bottom_slider_navigation')) :
            wp_nav_menu(array('theme_location' => 'bottom_slider_navigation', 'menu_class' => 'main-navigation'));
          endif;
        ?>
      </div>
    </div>

  <?php $options = get_option('plugin_options'); ?>

    <div class="call-to-action-banner">
      <div class="banner-item" style="<?php echo 'background:' . $options['tf_become_fellow_bg_color']; ?>">
        <a target="_blank" href="<?php echo $options['tf_become_fellow_link']; ?>" title="<?php echo $options['tf_become_fellow_text']; ?>" style="<?php echo 'color:' . $options['tf_become_fellow_text_color']; ?>"><?php echo $options['tf_become_fellow_text']; ?></a>
      </div>
      <div class="banner-item donater-link" style="<?php echo 'background:' . $options['tf_become_donator_bg_color']; ?>">
         <a href="<?php echo $options['tf_become_donator_link']; ?>" title="<?php echo $options['tf_become_donator_text']; ?>" style="<?php echo 'color:' . $options['tf_become_donator_text_color']; ?>"><?php echo $options['tf_become_donator_text']; ?></a>
      </div>
    </div>
  </nav>
</header>
