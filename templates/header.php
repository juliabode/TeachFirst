<header class="banner" role="banner">
  <nav class="navTop" role="navigation">
    <div class="container">
      <?php
        if (has_nav_menu('top_slider_navigation')) :
          wp_nav_menu(array('theme_location' => 'top_slider_navigation', 'menu_class' => 'nav nav-pills'));
        endif;
      ?>
    </div>
  </nav>
  <div class="slider">
    <a href="<?php echo home_url(); ?>"><img class="logo" style="" src="<?php echo get_bloginfo("template_url");?>/assets/img/TFD-logo-weiss.png" /></a>
    <a href="https://bewerbung.teachfirst.de/"><img class="apply-now" src="<?php echo get_bloginfo("template_url");?>/assets/img/stoerer.png" />
    <?php echo do_shortcode( '[responsive_slider]' ); ?>
  </div>
  <nav class="navMain" role="navigation">
    <div class="container">
      <?php
        if (has_nav_menu('bottom_slider_navigation')) :
          wp_nav_menu(array('theme_location' => 'bottom_slider_navigation', 'menu_class' => 'nav nav-pills'));
        endif;
      ?>
    </div>
  </nav>
</header>
