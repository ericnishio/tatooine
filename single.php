<?php get_header(); ?>
<section id="content" role="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'entry' ); ?>
    <?php if ( ! post_password_required() ): ?>
      <section class="section section-container section-secondary">
        <div class="section-inner">
          <div class="below-post">
            <div class="below-post-left">
              <?php render_sidebar( 'below_post_left' ); ?>
            </div>
            <div class="below-post-right">
              <?php render_sidebar( 'below_post_right' ); ?>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-container">
        <div class="section-inner">
          <?php comments_template( '', true ); ?>
        </div>
      </section>
    <?php endif; ?>
  <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>
