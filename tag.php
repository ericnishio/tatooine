<?php get_header(); ?>
<section id="content" class="section section-narrow section-more-padding" role="main">
  <div class="section-inner">
    <div class="entry-list">
    <h1 class="entry-list-heading"><?php _e( 'Tag Archives: ', 'tatooine' ); ?><?php single_tag_title(); ?></h1>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'entry' ); ?>
    <?php endwhile; endif; ?>
    </div>
  </div>
</section>
<?php get_template_part( 'nav', 'below' ); ?>
<?php get_footer(); ?>
