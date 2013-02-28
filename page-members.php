<?php
/*
Template Name: Mitglieder Übersicht
*/
?>

<?php get_template_part('templates/page', 'header'); ?>

<?php $member = strtolower(get_field('team_or_fellow')); ?>

<div class="clearfix">
  <?php query_posts( 'post_type=tf_members&tf_membership=' . $member . '&orderby=menu_order&posts_per_page=-1' ); ?>
    <?php if (have_posts()) : ?>
      <?php get_template_part('templates/content-members', get_post_format()); ?>
    <?php endif; ?>
  <?php wp_reset_query(); ?>
</div>
