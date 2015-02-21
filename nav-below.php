  <?php global $wp_query; ?>
  <?php if ( $wp_query->max_num_pages > 1 ): ?>
    <section class="section section-secondary section-container section-more-padding">
      <nav id="nav-below" class="page-navigation" role="navigation">
        <div class="nav-previous"><?php next_posts_link(sprintf( __( '%s older', 'tatooine' ), '<i class="fa fa-angle-left"></i>' ) ); ?></div>
        <div class="nav-next"><?php previous_posts_link(sprintf( __( 'newer %s', 'tatooine' ), '<i class="fa fa-angle-right"></i>' ) ); ?></div>
      </nav>
    </section>
  <?php endif; ?>
