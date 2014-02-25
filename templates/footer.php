<footer class="content-info clearfix" role="contentinfo">
 <?php $options = get_option('plugin_options'); ?>

  <div class="container">
    <div class="clearfix">
      <ul class="copyright alignleft">
        <li>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></li>
      </ul>
      <div class="alignright">
        <?php dynamic_sidebar('sidebar-footer'); ?>
      </div>
    </div>

    <div class="clearfix">
      <nav class="navMainFooter" role="navigation">
        <?php
          if (has_nav_menu('bottom_slider_navigation')) :
            wp_nav_menu(array('theme_location' => 'bottom_slider_navigation', 'menu_class' => ''));
          endif;
        ?>
      </nav>
    </div>
  </div>

  <div class="partner-banner"><?php if ($options['tf_partner_logo_link']) : echo '<img src="' . $options['tf_partner_logo_link'] . '">'; endif;?></div>
  <div class="teach-for-all">
      <?php _e('Partner des globalen Netzwerks für Bildung', 'roots'); ?>
      <a class="teach-for-all-link" href="http://teachforallnetwork.org/" target="_blank"><?php _e('Teach For All', 'roots'); ?></a>
  </div>
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
