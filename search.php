<?php get_header(); ?>
<section id="content" class="section section-narrow section-more-padding" role="main">
  <div class="section-inner">
    <div class="entry-list">
      <?php if ( have_posts() ): ?>
        <h1 class="entry-list-heading"><?php printf( __( 'Search Results for: %s', 'tatooine' ), get_search_query() ); ?></h1>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'entry' ); ?>
        <?php endwhile; ?>
      <?php else: ?>
        <article id="post-0" class="post no-results not-found">
          <h2 class="heading"><?php _e( 'Nothing Found', 'tatooine' ); ?></h2>
          <section class="entry-content">
            <p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'tatooine' ); ?></p>
            <?php get_search_form(); ?>
          </section>
        </article>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php if ( have_posts() ): ?>
  <?php get_template_part( 'nav', 'below' ); ?>
<?php endif; ?>
<?php get_footer(); ?>
