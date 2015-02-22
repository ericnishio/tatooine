<?php get_header(); ?>
<section id="content" class="section section-narrow section-more-padding" role="main">
  <div class="section-inner">
    <div class="entry-list">
      <h1 class="entry-list-heading"><?php
      if ( is_day() ) { printf( __( 'Daily Archives: %s', 'tatooine' ), get_the_time( get_option( 'date_format' ) ) ); }
      elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'tatooine' ), get_the_time( 'F Y' ) ); }
      elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'tatooine' ), get_the_time( 'Y' ) ); }
      else { _e( 'Archives', 'tatooine' ); }
      ?></h1>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'entry' ); ?>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
<?php get_template_part( 'nav', 'below' ); ?>
<?php get_footer(); ?>
