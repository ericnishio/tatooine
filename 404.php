<?php get_header(); ?>
  <section id="content" class="section section-narrow" role="main">
    <div class="section-inner">
      <article id="post-0" class="post not-found">
        <h1 class="heading-1"><?php _e( 'Not Found', 'tatooine' ); ?></h1>
        <section class="entry-content">
          <p><?php _e( 'Nothing found for the requested page. Try a search instead?', 'tatooine' ); ?></p>
          <?php get_search_form(); ?>
        </section>
      </article>
    </div>
  </section>
<?php get_footer(); ?>
