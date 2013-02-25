<?php
/*
Template Name: 3 Spalten
*/
?>

<div class="clearfix">
  <?php get_template_part('templates/page', 'header'); ?>
  <div class="span4 alignleft">
    <?php get_template_part('templates/content', 'page'); ?>
  </div>

  <div class="span4 alignleft">
    <?php the_field('3-col-text_col2'); ?>
  </div>

  <div class="span4 alignleft">
    <?php the_field('3-col-text_col3'); ?>
  </div>
</div>
