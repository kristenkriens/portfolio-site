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

<header class="front" id="home">
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

</header><!--/.header-->
