<?php get_header(); ?>
  <section id="content" class="section section-narrow" role="main">
    <div class="section-inner">
      <div class="entry-list">
        <?php the_post(); ?>
        <h1 class="entry-list-heading"><?php _e( 'Author Archives', 'tatooine' ); ?>: <?php the_author_link(); ?></h1>
        <?php if ( '' != get_the_author_meta( 'user_description' ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . get_the_author_meta( 'user_description' ) . '</div>' ); ?>
        <?php rewind_posts(); ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'entry' ); ?>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
<?php get_template_part( 'nav', 'below' ); ?>
<?php get_footer(); ?>
