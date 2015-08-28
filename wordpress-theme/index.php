<?php get_header(); ?>
    <div class="jumbotron" <? if (get_theme_mod('header_image')) {echo "style='background-image: url(" . get_theme_mod('header_image') . ")'";}; ?> >
    <? if (get_theme_mod('theme_logo')): ?>
        <div class="logo">
            <img src="<?echo get_theme_mod('theme_logo') ?>" alt="Logo">
        </div>
    <? endif;?>
      <div class="description">
        <h3><?php bloginfo('name'); ?></h3>
        <p><?php bloginfo('description'); ?></p>
        <p>
        * Please come with any comfortable shoes.</p>
        <div class="button"><a href='#register_block' class="fancybox">22 february</a><br><a>11.00-14.00</a></div>
      </div>
    </div>
    <!-- Start cigun block -->
    <div class="cigun_block">
      <div class="caption">
        <h3>Features</h3>
      </div>
      <div class="center">
      <?
    		$args = array( 'post_type' => 'features');
    		$loop = new WP_Query( $args );
    		while ( $loop->have_posts() ): 
          $loop->the_post();
    		  echo '<div class="column wow zoomIn">';
          if ( has_post_thumbnail() ) {
            the_post_thumbnail(array('36', '36'));
          } else {
            echo "<img src='" . get_template_directory_uri() . "/assets/img/icon_1.png'"  . 'alt="">';
          }
    			the_title('<h3>', '</h3>');
    			echo "<p>";
    			the_content();
    			echo "</p></div>";
    		endwhile;
      ?>
      </div>
    </div>
    <!-- End cigun block -->

    <!-- Start citate block -->
    <?
      $args = array( 'post_type' => 'citates', 'orderby' => 'rand', 'posts_per_page' => '1');
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ): 
        echo '<div class="quote_block"><div class="center">';
        $loop->the_post();
          echo '<div class="photo">';
          if ( has_post_thumbnail() ) {
            the_post_thumbnail();
          } else {
            echo "<img src='" . get_template_directory_uri() . "/assets/img/photo1.png'"  . 'alt="">';
          }
          echo '</div><div class="quote"><blockquote class="wow zoomIn">';
          the_content();
          echo '<div class="line"></div>';
          the_title('<div class="author">', '</div>');
        echo "</div></div></div>";
      endwhile;
    ?>
    <!-- End citate block -->

    <div class="attention_block">
      <h4>students, teachers</h4>
      <h4>Free entrance</h4>
      <div class="line"></div>
    </div>
    <? if (get_theme_mod('google_map')):?>
      <div id="map">
        <?php echo do_shortcode(get_theme_mod('google_map'));?>
      </div>
    <? endif; ?>
    <div class="adres">
      <div class="description">
        <div class="caption">Full adress</div>
        <h4>Directions:</h4>
        <p>Direction 1</p>
        <p>Direction 2</p>
        <a href="#register_block" class="button fancybox"><span>22 february</span><br><span>11.00-14.00</span></a>
      </div>
    </div>
<?php get_footer(); ?>