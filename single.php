<?php get_header(); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <section id="content" class="section section-narrow section-more-padding" role="main">
        <div class="section-inner">
          <?php get_template_part( 'entry' ); ?>
        </div>
      </section>
      <?php if ( ! post_password_required() ): ?>
        <section class="section section-container section-secondary section-more-padding">
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
        <?php comments_template( '', true ); ?>
      <?php endif; ?>
    <?php endwhile; endif; ?>
<?php get_footer(); ?>
