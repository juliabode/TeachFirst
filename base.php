<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
<!--<script src="https://www.altruja.de/i/lcov"></script><span id="ef-bl-x7jn2nd9j">Ein <a href="http://www.altruja.de/spendenformular.html" title="Spendenformular online">Spendenformular</a> von Altruja.</span>-->
 <!--[if lt IE 7]><div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</div><![endif]-->

  <div class="wrap" role="document">

    <?php get_template_part('templates/header'); ?>

    <div class="content container-fluid row">

      <?php get_template_part('templates/social_media_icons'); ?>

      <div class="main" role="main">
        <?php include roots_template_path(); ?>
      </div><!-- /.main -->
     
    </div><!-- /.content -->

    <?php get_template_part('templates/footer'); ?>
  </div><!-- /.wrap -->

</body>
</html>
