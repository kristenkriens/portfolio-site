<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <!-- stylesheets should be enqueued in functions.php -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php global $post; ?>
<?php
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
?>
<header style="background-image: url(<?php echo $src[0]; ?> );" class="front" id="home">
  <div class="navigation-bar">
    <div class="container">
      <div class="logo">
        <a href="<?php bloginfo( 'url' ) ?>">
          <?php $logo1 = get_field('first_logo', 'option');?>
          <img src="<?php echo $logo1['url'] ?>" alt="<?php echo $logo1['alt'] ?>" title="<?php echo $logo1['title'] ?>">
          <?php $logo2 = get_field('second_logo', 'option');?>
          <img src="<?php echo $logo2['url'] ?>" alt="<?php echo $logo2['alt'] ?>" title="<?php echo $logo2['title'] ?>">
        </a>
      </div>
      <div class="mobile not-clicked">
        <div class="top-bar"></div>
        <div class="middle-bar"></div>
        <div class="bottom-bar"></div>
      </div>
      <nav>
        <?php wp_nav_menu( array(
          'container' => false,
          'theme_location' => 'primary'
        )); ?>
      </nav>
    </div> <!-- /.container -->
  </div> <!-- /.navigation-bar -->

  <div class="container">
    <div class="header-text-outer">
      <div class="header-text">
        <h2><?php the_field('header_text_1', 'option'); ?></h2>
        <h1><?php bloginfo( 'name' ); ?></h1>
        <h2><?php the_field('header_text_2', 'option'); ?></h2>
        <a href="#about"><div class="button header-button"><?php the_field('header_button_text', 'option'); ?></div></a>
      </div>
    </div>
  </div> <!-- /.container -->

</header><!--/.header-->

