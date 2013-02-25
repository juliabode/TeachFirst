<?php if (!have_posts()) : ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Sorry, no results were found.', 'roots'); ?></p>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<ul>
  <?php while (have_posts()) : the_post(); ?>
    <li <?php post_class(); ?>>
      <h2>
        <a href="#"><?php the_title(); ?><span class="acc-arrow">Open or Close</span></a>
      </h2>
      <div class="acc-content">
        <?php the_content(); ?>
      </div>
    </li>
  <?php endwhile; ?>
</ul>
