<?php
/*
Template Name: 2 Spalten: Text und Video
*/
?>

<?php get_template_part('templates/page', 'header'); ?>

<div class="span3">
  <?php get_template_part('templates/content', 'page'); ?>
</div>
<div class="span9">
  <?php the_field('2-col-text-video_video'); ?>
</div>
