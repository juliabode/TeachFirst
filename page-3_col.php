<?php
/*
Template Name: 3 Spalten
*/
?>

<div class="clearfix">
  <?php get_template_part('templates/page', 'header'); ?>

  <div class="row-fluid">
    <div class="span4">
      <?php get_template_part('templates/content', 'page'); ?>
    </div>

    <div class="span4">
      <?php the_field('3-col-text_col2'); ?>
    </div>

    <?php if (get_field('3-col_choose-color') == '#ffffff') { ?>
      <div class="span4">
        <?php the_field('3-col-text_col3'); ?>
      </div>
    <?php } else { ?>
      <div class="span4 p-l-l p-r-l" style="background-color:<?php the_field('3-col_choose-color'); ?>">
        <?php the_field('3-col-text_col3'); ?>
      </div>
    <?php } ?>
  </div>
</div>
