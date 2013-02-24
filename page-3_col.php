<?php
/*
Template Name: 3 Spalten
*/
?>

<?php get_template_part('templates/page', 'header'); ?>

<div class="clearfix">
  <div class="span3 alignleft">
    <?php get_template_part('templates/content', 'page'); ?>
  </div>

  <div class="span3 alignleft">
    <?php the_field('3-col-text_col2'); ?>
  </div>

  <div class="span3 alignleft">
    <?php the_field('3-col-text_col3'); ?>
  </div>
</div>
