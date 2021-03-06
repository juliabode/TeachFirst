<?php
/*
Template Name: 2 Spalten
*/
?>

<div class="clearfix">
  <?php get_template_part('templates/page', 'header'); ?>

  <div class="row-fluid">
    <div class="span6">
      <?php get_template_part('templates/content', 'page'); ?>
    </div>

    <div class="span6">
      <?php the_field('2-col-text_col2'); ?>
    </div>
  </div>
</div>
