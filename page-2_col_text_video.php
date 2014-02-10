<?php
/*
Template Name: 2 Spalten: Text und Video
*/
?>

<div class="clearfix">
  <?php get_template_part('templates/page', 'header'); ?>

  <div class="row-fluid">
    <div class="span5">
      <?php get_template_part('templates/content', 'page'); ?>
    </div>

    <div class="span7">
      <?php the_field('2-col-text-video_video'); ?>
    </div>
  </div>
</div>
