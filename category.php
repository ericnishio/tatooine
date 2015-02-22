<?php get_header(); ?>
<section id="content" class="section section-narrow" role="main">
  <div class="section-inner">
    <div class="entry-list">
      <h1 class="entry-list-heading"><?php _e( 'Category: ', 'tatooine' ); ?><?php single_cat_title(); ?></h1>
      <?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'entry' ); ?>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
<?php get_template_part( 'nav', 'below' ); ?>
<?php get_footer(); ?>
