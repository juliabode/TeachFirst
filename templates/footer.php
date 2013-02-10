<footer class="content-info" role="contentinfo">
  <div>
    <ul>
      <li>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></li>
      <li><a href="<?php $options = get_option('plugin_options'); echo $options['tf_imprint_link'];?>">Impressum</a></li>
    </ul>
  
  <nav class="navTopFooter" role="navigation">
    <?php
      if (has_nav_menu('top_slider_navigation')) :
        wp_nav_menu(array('theme_location' => 'top_slider_navigation', 'menu_class' => 'nav nav-pills'));
      endif;
    ?>
  </nav>
  </div>
  <nav class="navMainFooter" role="navigation">
    <?php
      if (has_nav_menu('bottom_slider_navigation')) :
        wp_nav_menu(array('theme_location' => 'bottom_slider_navigation', 'menu_class' => 'nav nav-pills'));
      endif;
    ?>
  </nav>
  <?php dynamic_sidebar('sidebar-footer'); ?>
</footer>

<?php if (GOOGLE_ANALYTICS_ID) : ?>
<script>
  var _gaq=[['_setAccount','<?php echo GOOGLE_ANALYTICS_ID; ?>'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php endif; ?>

<?php wp_footer(); ?>