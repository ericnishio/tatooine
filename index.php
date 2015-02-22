<?php get_header(); ?>
  <section id="content" class="section section-narrow" role="main">
    <div class="section-inner">
      <div class="entry-list">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'entry' ); ?>
          <?php comments_template(); ?>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </section>
  <?php get_template_part( 'nav', 'below' ); ?>
<?php get_footer(); ?>
