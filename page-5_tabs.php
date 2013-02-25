<?php
/*
Template Name: 5 Tabs mit Inhalt
*/
?>

<div class="clearfix">
  <?php get_template_part('templates/page', 'header'); ?>
  <div>
    <?php get_template_part('templates/content', 'page'); ?>
  </div>

  <div id="5-tabs-wrapper">
    <div class="tab-nav clearfix">
      <a class="tab-header current alignleft" href="#tab1"><?php the_field('5-tabs_tab-header-1'); ?></a>
      <a class="tab-header alignleft" href="#tab2"><?php the_field('5-tabs_tab-header-2'); ?></a>
      <a class="tab-header alignleft" href="#tab3"><?php the_field('5-tabs_tab-header-3'); ?></a>
      <a class="tab-header alignleft" href="#tab4"><?php the_field('5-tabs_tab-header-4'); ?></a>
      <a class="tab-header alignleft" href="#tab5"><?php the_field('5-tabs_tab-header-5'); ?></a>
    </div>

    <div class="tab-content-wrap">
      <div id="tab1">
        <p><?php the_field('5-tabs_tab-text-1'); ?></p>
      </div>
      <div id="tab2" class="hide">
        <p><?php the_field('5-tabs_tab-text-2'); ?></p>
      </div>
      <div id="tab3" class="hide">
        <p><?php the_field('5-tabs_tab-text-3'); ?></p>
      </div>
      <div id="tab4" class="hide">
        <p><?php the_field('5-tabs_tab-text-4'); ?></p>
      </div>
      <div id="tab5" class="hide">
        <p><?php the_field('5-tabs_tab-text-5'); ?></p>
      </div>
    </div>
  </div>

</div>
