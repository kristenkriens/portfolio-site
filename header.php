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
	<!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-71145610-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-71145610-1');
  </script>
</head>

<body <?php body_class(); ?>>

<a href="#main" class="skipnav accessible">Skip to Main Content</a>

<header id="home">
  <div class="navigation-bar">
    <div class="container">
			<h1 class="accessible"><?php  wp_title('|', true, 'right'); ?></h1>
      <a href="<?php bloginfo( 'url' ) ?>" title="Kristen Kriens Logo" class="logo">
        <?php $logo1 = get_field('first_logo', 'option');?>
        <img src="<?php echo $logo1['url'] ?>" aria-hidden="true">
        <?php $logo2 = get_field('second_logo', 'option');?>
        <img src="<?php echo $logo2['url'] ?>" aria-hidden="true">
      </a>
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
				<div class="underline"></div>
      </nav>
    </div> <!-- /.container -->
  </div> <!-- /.navigation-bar -->

</header><!--/.header-->
