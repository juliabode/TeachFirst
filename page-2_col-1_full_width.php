<?php
/*
Template Name: 2 Spalten, 1 volle Breite
*/
?>

<div class="clearfix">
  <?php get_template_part('templates/page', 'header'); ?>

  <div class="row-fluid">
    <div class="span6">
      <?php the_field('2-col_1-full-width-text_col1'); ?>
    </div>

    <div class="span6">
      <?php the_field('2-col_1-full-width-text_col2'); ?>
    </div>
  </div>

  <div>
    <?php get_template_part('templates/content', 'page'); ?>
  </div>
</div>
