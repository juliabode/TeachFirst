<?php
/*
Template Name: 5 Tabs mit Inhalt
*/
?>

<div class="clearfix">
  <?php get_template_part('templates/page', 'header'); ?>

  <div class="row-fluid">
    <div class="span12">
      <?php get_template_part('templates/content', 'page'); ?>
    </div>
  </div>

  <?php
      $tabCount = 0;
      $tabHeaderContent = array();

      for ( $i = 1; $i <= 5; $i++ ) {
        $tabHeader = get_field('5-tabs_tab-header-' . $i);
        if (!empty($tabHeader)) {
          $tabHeaderContent[] = $tabHeader;
          $tabCount++;
        }
      }
      $colNumber = ($tabCount == 0) ? 0 : floor(12 / $tabCount);
  ?>

  <div>
    <div id="5-tabs-wrapper">
      <div class="tab-nav clearfix">
        <?php for ($i = 1; $i <= $tabCount; $i++) {
            echo '<a class="tab-header alignleft tab-span' . $colNumber . ' ' . get_field('5-tabs_choose-color') . '" href="#tab' .  $i . '">' . $tabHeaderContent[$i - 1] . '</a>';
        } ?>
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

</div>
