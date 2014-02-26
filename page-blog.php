<?php
/*
Template Name: Blog
*/
?>

<?php query_posts( 'post_type=post&orderby=date' ); ?>

<div class="fluid-row">
  <div class="span8">
    <?php
      $format = have_posts() ? get_post_format() : false;
      get_template_part('templates/content', $format);
    ?>
  </div>

</div>

<?php wp_reset_query(); ?>
