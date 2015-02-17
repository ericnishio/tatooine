<aside id="sidebar" role="complementary">
  <section class="section section-container section-secondary">
    <div class="section-inner">
      <?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
        <div id="primary" class="widget-area">
          <ul class="xoxo">
            <?php dynamic_sidebar( 'primary-widget-area' ); ?>
          </ul>
        </div>
      <?php endif; ?>
    </div>
  </section>
</aside>
