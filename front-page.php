<?php get_header('front');  ?>

<main id="main" class="main home">
  <?php global $post; ?>
  <?php $heroImage = get_field('hero_image'); ?>
  <section class="hero" style="background-image: url(<?php echo $heroImage['url']; ?> );">
    <div class="hero-text">
      <h2>
        <span class="name"><?php the_field('hero_primary_text'); ?></span>
        <?php the_field('hero_secondary_text'); ?>
      </h2>
      <a href="#about" class="button hero-button" role="button"><?php the_field('hero_button_text'); ?></a>
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
          <?php if( have_rows('about_image_credit') ): ?>
            <?php while( have_rows('about_image_credit') ): the_row(); ?>
              <div>Photo credit: <a href="<?php the_sub_field('link'); ?>" target="_blank"><?php the_sub_field('name'); ?></a></div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <div class="about-text">
          <div class="about-text-top">
            <?php the_field('about_text'); ?>
          </div>
          <div class="about-text-bottom">
            <div class="about-links-cv">
              <p>Download My CV</p>
              <a href="<?php the_field('about_cv_link'); ?>" title="Kristen Kriens CV" target="_blank">
                <div class="about-link">
                  <i class="fa fa-download" aria-hidden="true"></i>
                </div>
              </a>
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
            <a href="<?php the_field('about_cv_link'); ?>" title="Kristen Kriens CV" target="_blank">
              <div class="about-link">
                <i class="fa fa-download" aria-hidden="true"></i>
              </div>
            </a>
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
            if(have_rows('skills')) {
              while(have_rows('skills')) {
                the_row();
                ?>
                <li class="icons">
                  <i class="devicon-<?php the_sub_field('slug'); ?>-plain" aria-hidden="true"></i>
                  <p><?php the_sub_field('name'); ?></p>
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

      <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ) ?>" class="button" role="button">View All Posts</a>
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
              <a href="<?php echo get_field('live_link') ?>" target="_blank" class="button" role="button">Live Site</a>
              <?php if( get_field('github_link') ): ?>
                <a href="<?php echo get_field('github_link') ?>" target="_blank" class="button" role="button">GitHub</a>
              <?php endif; ?>
            </div>
            <div class="portfolio-item-image">
              <?php $image = get_field('image') ?>
              <a href="<?php echo get_field('link') ?>" target="_blank"><img src="<?php echo $image['sizes']['large'] ?>" alt="<?php echo $image['alt'] ?>" title="<?php echo $image['title'] ?>"></a>
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
      <h3>I'd love to hear from you! Email me at <a href="mailto:<?php the_field('my_email') ?>"><?php the_field('contact_email') ?></a> or fill out the following form.</h3>
      <div class="contact-form">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Contact Form Widget Area") ) : ?>
        <?php endif;?>
       </div>
    </div> <!-- /.container -->
  </section>
  <!-- <section id="map"></section> -->

</main> <!-- /.main -->

<?php get_footer(); ?>
