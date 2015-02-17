<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <section class="section section-narrow">
    <div class="section-inner">
      <div class="row">
        <div class="col-md-12">
          <div class="entry">
            <div class="post-info">
              <header>
                <?php if ( is_singular() ) { echo '<h1 class="heading">'; } else { echo '<h2 class="heading">'; } ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a><?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
                <div class="meta-info">
                  <i class="fa fa-user"></i>
                  <span class="info-text"><?php the_author_posts_link(); ?></span>
                  <i class="fa fa-tags"></i>
                  <span class="info-text"><?php the_category(', ') ?></span>
                  <i class="fa fa-comment"></i>
                  <span class="info-text"><a href="<?php comments_link(); ?>"><?php comments_number( 'Write a comment', '1', '%' ); ?> </a></span>
                  <?php edit_post_link(); ?>
                </div>
              </header>
            </div>
            <?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</article>
