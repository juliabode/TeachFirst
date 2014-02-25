
<?php
  $pages = get_posts(array(
       'post_type' => 'page',
	'meta_key' => '_wp_page_template',
	'meta_value' => 'page-members.php'
  ));
  foreach($pages as $page){
	  }
?>

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content clearfix">
      <?php the_content(); ?>
    </div>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
