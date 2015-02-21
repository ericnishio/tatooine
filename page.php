<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <section class="section section-narrow section-more-padding">
    <div class="section-inner">
      <section id="content" class="entry" role="main">
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
      </section>
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
