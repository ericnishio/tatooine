<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <section class="section section-narrow">
    <div class="section-inner">
      <div class="row">
        <div class="col-md-12">
          <div class="entry">
            <div class="entry-info">
              <?php edit_post_link(); ?>
              <header>
                <?php if ( is_singular() ) { echo '<h1 class="heading">'; } else { echo '<h2 class="heading">'; } ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a><?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
                <div class="meta-info">
                  <div class="meta-item">
                    <i class="fa fa-user"></i>
                    <?php the_author_posts_link(); ?>
                    </div>
                  <div class="meta-item">
                    <i class="fa fa-tags"></i>
                    <?php the_category(', ') ?>
                    </div>
                  <div class="meta-item">
                    <a href="<?php comments_link(); ?>"><i class="fa fa-comment"></i> <?php comments_number( 'Write a comment', '1', '%' ); ?></a>
                  </div>
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
