<?php $counter = 0; ?>
<div class="members">

  <?php while (have_posts()) : the_post(); ?>
    <?php if ( $counter == 5 ) { echo '</div><div class="members">'; $counter = 0; } ?>
      <article class="alignleft member-wrap">
        <div class="member-portraits">
          <header>
            <?php the_post_thumbnail( array(180,180) ); ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          </header>
          <div class="entry-summary">
            <a href="<?php the_permalink(); ?>">
              <?php the_excerpt(); ?>
              <h2><?php the_title(); ?></h2>
            </a>
          </div>
        </div>
      </article>
    <?php $counter++; ?>
  <?php endwhile; ?>

</div>
