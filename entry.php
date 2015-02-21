<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="row">
    <div class="col-md-12">
      <div class="entry">
        <div class="entry-info">
          <header>
            <?php if ( is_singular() ): ?>
              <h1 class="heading">
            <?php else: ?>
              <h2 class="heading">
            <?php endif; ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
            <?php if ( is_singular() ): ?>
              </h1>
            <?php else: ?>
              </h2>
            <?php endif; ?>
            <div class="meta-info">
              <div class="meta-item">
                <div class="vertical-align">
                  <i class="fa fa-user vertical-align-inner"></i>
                  <span class="meta-text vertical-align-inner"><?php the_author_posts_link(); ?></span>
                </div>
              </div>
              <div class="meta-item">
                <div class="vertical-align">
                  <i class="fa fa-tags vertical-align-inner"></i>
                  <span class="meta-text vertical-align-inner"><?php the_category(', ') ?></span>
                </div>
              </div>
              <div class="meta-item">
                <div class="vertical-align">
                  <i class="fa fa-comments vertical-align-inner"></i>
                  <span class="meta-text vertical-align-inner">
                    <a href="<?php comments_link(); ?>" ><?php comments_number( 'Write a comment', '1', '%' ); ?></a>
                  </span>
                </div>
              </div>
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
          </header>
        </div>
        <?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
      </div>
    </div>
  </div>
</article>
