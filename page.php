<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <section id="content" class="section section-narrow section-more-padding entry" role="main">
    <div class="section-inner">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="heading"><?php the_title(); ?></h1>
        <div class="meta-info">
          <?php if ( is_post_author() ): ?>
            <div class="meta-item">
              <div class="vertical-align">
                <i class="fa fa-pencil vertical-align-inner"></i>
                <span class="meta-text vertical-align-inner">
                  <?php edit_post_link(); ?>
                </span>
              </div>
            </div>
          <?php endif; ?>
        </div>
        <section class="entry-content">
          <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
          <?php the_content(); ?>
          <div class="entry-links">
            <?php wp_link_pages(); ?>
          </div>
        </section>
      </article>
    </div>
  </section>
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
  <?php if ( comments_open() ): ?>
    <section class="section-secondary section-container">
      <div class="section-inner">
        <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
      </div>
    </section>
  <?php endif; ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
