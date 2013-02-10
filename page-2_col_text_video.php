<?php
/*
Template Name: 2 Spalten: Text und Video
*/
?>

<div class="column1">
	<?php get_template_part('templates/page', 'header'); ?>
	<div class="keyvisual">
  <?php get_template_part('templates/content', 'page'); ?>
	</div>
</div>
<div class="column2">
  <?php the_field('2-col-text-video_video'); ?>
</div>
