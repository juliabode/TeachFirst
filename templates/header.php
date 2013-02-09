<header class="banner" role="banner">
  <div class="container">
    <nav class="navTop" role="navigation">
      <?php
        if (has_nav_menu('top_slider_navigation')) :
          wp_nav_menu(array('theme_location' => 'top_slider_navigation', 'menu_class' => 'nav nav-pills'));
        endif;
      ?>
    </nav>
    <div class="slider"><?php echo do_shortcode( '[responsive_slider]' ); ?></div>
    <nav class="navMain" role="navigation">
      <?php
        if (has_nav_menu('bottom_slider_navigation')) :
          wp_nav_menu(array('theme_location' => 'bottom_slider_navigation', 'menu_class' => 'nav nav-pills'));
        endif;
      ?>
    </nav>
  </div>
</header>
