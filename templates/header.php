<header class="banner" role="banner">
  <div class="container">
    <nav class="navTop" role="navigation">
      <?php
        if (has_nav_menu('top_slider_navigation')) :
          wp_nav_menu(array('theme_location' => 'top_slider_navigation', 'menu_class' => 'nav nav-pills'));
        endif;
      ?>
    </nav>
       		<a href="https://bewerbung.teachfirst.de"><img style="position:absolute; z-index:5; margin:20px 0 0 22px;" src="<?php echo get_bloginfo("template_url");?>/assets/img/TFD-logo-weiss.png" />
            <img style="position:absolute; z-index:5; margin:300px 0 0 0;" src="<?php echo get_bloginfo("template_url");?>/assets/img/stoerer.png" />
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
