<?php
/*
Template Name: 2 Spalten: Text und Video
*/
?>

<div class="clearfix">
  <div class="column1">
    <?php get_template_part('templates/page', 'header'); ?>
    <div class="keyvisual"></div>
    <?php get_template_part('templates/content', 'page'); ?>
    
  </div>
  <div class="columnWide">
    <?php the_field('2-col-text-video_video'); ?>
  </div>
</div>
