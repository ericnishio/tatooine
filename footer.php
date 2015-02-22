      <div class="clear"></div>
    </div>
    <footer id="footer" class="footer" role="contentinfo">
      <section class="section section-container section-footer section-dark">
        <div class="section-inner">
          <div class="footer-columns">
            <div class="footer-column">
              <?php if ( is_active_sidebar( 'footer_column_1' ) ) : ?>
                <?php dynamic_sidebar( 'footer_column_1' ); ?>
              <?php endif; ?>
            </div>
            <div class="footer-column">
              <?php if ( is_active_sidebar( 'footer_column_2' ) ) : ?>
                <?php dynamic_sidebar( 'footer_column_2' ); ?>
              <?php endif; ?>
            </div>
            <div class="footer-column">
              <?php if ( is_active_sidebar( 'footer_column_3' ) ) : ?>
                <?php dynamic_sidebar( 'footer_column_3' ); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-container section-shallow section-copyright section-darker">
        <div class="section-inner">
          <div class="copyright-columns">
            <div class="copyright-column">
              <?php if ( is_active_sidebar( 'footer_bottom' ) ) : ?>
                <?php dynamic_sidebar( 'footer_bottom' ); ?>
              <?php endif; ?>
            </div>
            <div class="copyright-column">
              <div id="copyright" class="copyright">
                <?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'tatooine' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    </footer>
  </div>
  <?php wp_footer(); ?>
</body>
</html>
