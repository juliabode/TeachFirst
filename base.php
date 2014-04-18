<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
 <!--[if lt IE 7]><div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</div><![endif]-->

  <div class="wrap" role="document">

    <?php get_template_part('templates/header'); ?>

    <div class="content container-fluid row">

      <?php get_template_part('templates/social-media-icons'); ?>

      <div class="main" role="main">
        <?php include roots_template_path(); ?>
      </div><!-- /.main -->
     
    </div><!-- /.content -->

    <?php get_template_part('templates/footer'); ?>
  </div><!-- /.wrap -->

</body>
</html>
