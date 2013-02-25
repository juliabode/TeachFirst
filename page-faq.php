<?php
/*
Template Name: FAQ
*/
?>

<?php get_template_part('templates/page', 'header'); ?>

<div class="clearfix">
  <div class="accordion vertical" id="accordion">
    <?php query_posts( 'post_type=tf_faq&orderby=menu_order' ); ?>

    <?php if (have_posts()) : ?>
      <?php get_template_part('templates/content-faq', get_post_format()); ?>
    <?php endif; ?>

    <?php wp_reset_query(); ?>
  </div>
</div>
