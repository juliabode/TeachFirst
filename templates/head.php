<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo get_bloginfo('description'); ?>">

  <meta property="og:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>"/>
  <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>"/>
  <meta property="og:url" content="<?php echo get_permalink() ?>"/>
  <meta property="og:image" content="<?php echo bloginfo('url'); ?>/assets/img/default_thumb.jpg"/>

  <?php wp_head(); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
  <link rel="shortcut icon" href="<?php echo bloginfo('url'); ?>/assets/img/favicon.ico" />
</head>
