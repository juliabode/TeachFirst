<header class="banner" role="banner">
  <nav class="navTop" role="navigation">
    <div class="container">
      <?php
        if (has_nav_menu('top_slider_navigation')) :
          wp_nav_menu(array('theme_location' => 'top_slider_navigation', 'menu_class' => 'alignright nav nav-pills'));
        endif;
      ?>
    </div>
  </nav>

  <div class="slider">
    <a href="<?php echo home_url(); ?>"><img class="logo" style="" src="<?php echo get_bloginfo("template_url");?>/assets/img/TFD-logo-weiss.png" /></a>
    <a href="https://bewerbung.teachfirst.de/"><img class="apply-now" src="<?php echo get_bloginfo("template_url");?>/assets/img/stoerer.png" /></a>
    <?php global $wp_query;
          $page_parent_image = get_field('header_image', $wp_query->post->post_parent);
      if ( $page_parent_image ) {
        echo wp_get_attachment_image( $page_parent_image, 'full' );
      } else {
        echo do_shortcode( '[responsive_slider]' );
      } ?>
  </div>

  <nav class="navMain" role="navigation">
    <div class="white-nav-border">
      <div class="container">
        <?php
          if (has_nav_menu('bottom_slider_navigation')) :
            wp_nav_menu(array('theme_location' => 'bottom_slider_navigation', 'menu_class' => 'main-navigation nav nav-pills'));
          endif;
        ?>
        <?php $options = get_option('plugin_options'); ?>
        <ul class="social-media-links">
          <li class="facebook-icon"><a href='<?php echo $options['tf_facebook_link']; ?>' target='_blank'></a></li>
          <li class="twitter-icon"><a href='<?php echo $options['tf_twitter_link'];?>' target='_blank'></a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>
