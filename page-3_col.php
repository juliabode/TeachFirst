<?php
/*
Template Name: 3 Spalten
*/
?>

<div class="column1">
	<?php get_template_part('templates/page', 'header'); ?>
	<div class="keyvisual"></div>
  <?php get_template_part('templates/content', 'page'); ?>
	
</div>
<div class="column2">
  <?php the_field('2-col-text-video_video'); ?>
</div>
<br class="clearfix">
