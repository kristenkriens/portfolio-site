<?php get_header('front');  ?>

<main class="main home">
  <?php global $post; ?>
  <?php
  $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
  ?>
  <section class="hero" style="background-image: url(<?php echo $src[0]; ?> );">
    <div class="hero-text">
      <h2>
        <?php the_field('hero_text_1', 'option'); ?>
        <span class="name"><?php bloginfo( 'name' ); ?></span>
        <?php the_field('hero_text_2', 'option'); ?>
      </h2>
      <button href="#about" class="button hero-button"><?php the_field('hero_button_text', 'option'); ?></button>
    </div>
  </section>

  <?php // Start the loop ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <section id="about">
      <div class="container">
        <h2 class="subtitle"><span class="accent">About</span> Me</h2>
        <div class="about-image">
          <?php $aboutImage = get_field('about_image'); ?>
          <img src="<?php echo $aboutImage['url'] ?>" alt="<?php echo $aboutImage['alt'] ?>" title="<?php echo $aboutImage['title'] ?>">
          <?php the_field('about_image_credit'); ?>
        </div>
        <div class="about-text">
          <div class="about-text-top">
            <?php
              if(have_rows('about_text')) {
                while(have_rows('about_text')) {
                  the_row();
                  ?>
                    <p><?php the_sub_field('about_sentence'); ?></p>
                  <?php
                } // end while
              } // end if
            ?>
          </div>
          <div class="about-text-bottom">
            <div class="about-links-cv">
              <p>Download My CV</p>
              <?php
                if(have_rows('about_links_cv')) {
                  while(have_rows('about_links_cv')) {
                    the_row();
                    ?>
                    <a href="<?php the_sub_field('about_link_cv_url'); ?>" title="Kristen Kriens CV" target="_blank">
                      <div class="about-link">
                        <i class="fa fa-<?php the_sub_field('about_link_cv_name'); ?>" aria-hidden="true"></i>
                      </div>
                    </a>
                    <?php
                  } // end while
                } // end if
              ?>
            </div>
            <div class="about-links-social">
              <p>View My Profiles</p>
              <?php
                if(have_rows('social_links', 'options')) {
                  while(have_rows('social_links', 'options')) {
                    the_row();
                    ?>
                    <a href="<?php the_sub_field('social_link_url', 'options'); ?>" title="<?php the_sub_field('social_link_name', 'options'); ?>" target="_blank">
                      <div class="about-link">
                        <i class="fa fa-<?php the_sub_field('social_link_name', 'options'); ?>" aria-hidden="true"></i>
                      </div>
                    </a>
                    <?php
                  } // end while
                } // end if
              ?>
            </div>
          </div>
        </div>
        <div class="about-text-bottom mobile-links">
          <div class="about-links-cv">
            <p>Download My CV</p>
            <?php
              if(have_rows('about_links_cv')) {
                while(have_rows('about_links_cv')) {
                  the_row();
                  ?>
                  <a href="<?php the_sub_field('about_link_cv_url'); ?>" target="_blank">
                    <div class="about-link">
                      <i class="fa fa-<?php the_sub_field('about_link_cv_name'); ?>"></i>
                    </div>
                  </a>
                  <?php
                } // end while
              } // end if
            ?>
          </div>
          <div class="about-links-social">
            <p>View My Profiles</p>
            <?php
              if(have_rows('social_links', 'options')) {
                while(have_rows('social_links', 'options')) {
                  the_row();
                  ?>
                  <a href="<?php the_sub_field('social_link_url', 'options'); ?>" target="_blank">
                    <div class="about-link">
                      <i class="fa fa-<?php the_sub_field('social_link_name', 'options'); ?>" aria-hidden="true"></i>
                    </div>
                  </a>
                  <?php
                } // end while
              } // end if
            ?>
          </div>
        </div>
      </div> <!-- /.container -->
    </section> <!-- /.about -->

    <section id="skills">
      <div class="container">
        <h2 class="grey-bg subtitle">My <span class="accent">Skills</span> & Tools</h2>
        <ul class="skills-icons">
          <?php
            if(have_rows('skills_links')) {
              while(have_rows('skills_links')) {
                the_row();
                ?>
                <li class="icons">
                  <i class="devicons devicons-<?php the_sub_field('skill_name'); ?>" aria-hidden="true"></i>
                  <p><?php the_sub_field('skill_name_2') ?></p>
                </li>
                <?php
              } // end while
            } // end if
          ?>
        </ul>
      </div> <!-- /.container -->
    </section>

  <?php endwhile; // end the loop?>

  <section id="blog">
    <div class="container">
      <h2 class="subtitle">Recent <span class="accent">Blog</span> Posts</h2>
      <?php $blog = new WP_Query(
        array(
          'post_type' => 'post',
          'posts_per_page' => -1, // -1 means all posts
          'order' => 'ASC'
        )
      ); ?>

      <?php if ($blog->have_posts()): ?>
        <?php while($blog->have_posts()) : $blog->the_post(); ?>
          <article class="<?php echo $post->post_name ?> blog-post">

            <h3 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
            <div class="entry-meta"><?php hackeryou_posted_on(); ?></div><!-- .entry-meta -->

            <?php the_excerpt() ?>
          </article>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>

      <button href="<?php echo get_permalink( get_option( 'page_for_posts' ) ) ?>" class="button">View All Posts</button>
    </div> <!-- /.container -->
  </section>


  <section id="portfolio">
    <div class="container">
      <h2 class="grey-bg subtitle">Check Out My <span class="accent">Portfolio</span></h2>
      <?php $portfolio = new WP_Query(
        array(
          'post_type' => 'portfolio',
          'posts_per_page' => -1, // -1 means all posts
          'order' => 'ASC'
        )
      ); ?>

      <?php if ($portfolio->have_posts()): ?>
        <?php while($portfolio->have_posts()) : $portfolio->the_post(); ?>
          <div class="<?php echo $post->post_name ?> portfolio-item">
            <div class="portfolio-item-text">
              <h3><?php the_title() ?></h3>
              <ul>
                <?php
                  if(have_rows('skills_tools')) {
                    while(have_rows('skills_tools')) {
                      the_row();
                      ?>
                      <li><?php the_sub_field('skills_tools_item') ?></li>
                      <?php
                    } // end while
                  } // end if
                ?>
              </ul>
              <?php the_content() ?>
              <button href="<?php echo get_field('link') ?>" target="_blank" class="button">View Live Site</button>
            </div>
            <div class="portfolio-item-image">
              <?php while( have_rows('images') ): the_row(); ?>
                <?php $image = get_sub_field('image') ?>
                <a href="<?php echo get_field('link') ?>" target="_blank"><img src="<?php echo $image['sizes']['large'] ?>" alt="<?php echo $image['alt'] ?>" title="<?php echo $image['title'] ?>"></a>
              <?php endwhile ?>
            </div>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>

    </div> <!-- /.container -->
  </section>

  <section id="contact">
    <div class="container">
      <h2 class="subtitle"><span class="accent">Contact</span> Me</h2>
      <h3>I'd love to hear from you! Email me at <a href="mailto:<?php the_field('my_email') ?>"><?php the_field('my_email') ?></a> or fill out the following form.</h3>
      <div class="contact-form">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Contact Form Widget Area") ) : ?>
        <?php endif;?>
       </div>
    </div> <!-- /.container -->
  </section>
  <section id="map"></section>

</main> <!-- /.main -->

<?php get_footer(); ?>
