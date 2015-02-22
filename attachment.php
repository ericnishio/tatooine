<?php get_header(); ?>
<?php global $post; ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <section id="content" class="section section-narrow section-more-padding" role="main">
    <div class="section-inner">
      <h1 class="heading-1"><?php the_title(); ?> <span class="meta-sep">|</span> <a href="<?php echo get_permalink( $post->post_parent ); ?>" title="<?php printf( __( 'Return to %s', 'tatooine' ), esc_html( get_the_title( $post->post_parent ), 1 ) ); ?>" rev="attachment"><span class="meta-nav">&larr; </span><?php echo get_the_title( $post->post_parent ); ?></a></h1> <?php edit_post_link(); ?>
      <?php get_template_part( 'entry', 'meta' ); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <nav id="nav-above" class="navigation" role="navigation">
          <div class="nav-previous"><?php previous_image_link( false, '&larr;' ); ?></div>
          <div class="nav-next"><?php next_image_link( false, '&rarr;' ); ?></div>
        </nav>
        <section class="entry-content">
          <div class="entry-attachment">
            <?php if ( wp_attachment_is_image( $post->ID ) ) : $att_image = wp_get_attachment_image_src( $post->ID, "large" ); ?>
              <p class="attachment"><a href="<?php echo wp_get_attachment_url( $post->ID ); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo $att_image[0]; ?>" width="<?php echo $att_image[1]; ?>" height="<?php echo $att_image[2]; ?>" class="attachment-medium" alt="<?php $post->post_excerpt; ?>" /></a></p>
            <?php else : ?>
              <a href="<?php echo wp_get_attachment_url( $post->ID ); ?>" title="<?php echo esc_html( get_the_title( $post->ID ), 1 ); ?>" rel="attachment"><?php echo basename( $post->guid ); ?></a>
            <?php endif; ?>
          </div>
          <div class="entry-caption"><?php if ( !empty( $post->post_excerpt ) ) the_excerpt(); ?></div>
          <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
        </section>
      </article>
    </div>
  </section>
  <?php comments_template(); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
