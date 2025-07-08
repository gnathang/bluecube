<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]-->
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <title><?php

	if (defined('WPSEO_VERSION')) {
		wp_title('');
	} else {

		global $page, $paged;

	wp_title( '|', true, 'right' );

	bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'skeleton' ), max( $paged, $page ) );
	}
	?>
    </title>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#F9FAF7" />
    <meta name="theme-color" content="#F9FAF7" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#222222" media="(prefers-color-scheme: dark)">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" type="text/css"
        href="<?php echo get_template_directory_uri() ?>/assets/js/slick/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="<?php echo get_template_directory_uri() ?>/assets/js/slick/slick/slick-theme.css" />

    <?php wp_head(); ?>

    <?php
	$url = explode('/',$_SERVER['REQUEST_URI']);
	$dir = $url[1] ? $url[1] : 'home';
?>

    <?php if (get_field('field_analytics', 'option')) { ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php the_field('field_analytics', 'option') ?>">
    </script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', '<?php the_field('field_analytics', 'option') ?>');

    gtag('config', 'AW-677088283'); // Google Conversion tag

    <?php if( $post->ID == 16034) { ?>
    gtag('event', 'conversion', {
        'send_to': 'AW-677088283/8APtCNj979IBEJuY7sIC'
    });
    <?php } ?>
    </script>
    <?php } ?>

</head>

<body <?php body_class(); ?> id="<?php echo $dir ?>">
    <div class="site_bg">

        <header>
            <div class="container">
                <div class="header_wrap">
                    <div class="nav nav_left">
                        <nav>
                            <?php  wp_nav_menu( array(
                    'menu'   => 'Main Menu Left',
                    ) ); ?>
                        </nav>
                    </div>
                    <div class="logo">
                        <?php if ( wp_is_mobile() ) : ?>
                        <a class="remove_hov_effect" href="/">
                            <img class="logo_small_mob"
                                src="<?php echo get_template_directory_uri() . '/assets/images/svg/bluecube-logo-coral-shell.svg'; ?>"
                                alt="BlueCube Marine Logo">
                        </a>
                        <?php else : ?>
                        <a class="remove_hov_effect" href="/">
                            <img class="logo_big"
                                src="<?php echo get_template_directory_uri() . '/assets/images/svg/bluecube-logo-coral-full.svg'; ?>"
                                alt="BlueCube Marine Logo">
                        </a>
                        <a class="remove_hov_effect" href="/">
                            <img class="logo_small"
                                src="<?php echo get_template_directory_uri() . '/assets/images/svg/bluecube-logo-coral-shell.svg'; ?>"
                                alt="BlueCube Marine Logo">
                        </a>
                        <?php endif; ?>
                    </div>
                    <div class="menu_icon">
                        <h3><span class="closed">MENU</span> <span class="open">CLOSE</span> <span
                                class="cross">+</span>
                        </h3>
                    </div>
                    <div class="nav nav_right">
                        <nav>
                            <?php  wp_nav_menu( array(
                    'menu'   => 'Main Menu Right',
                    ) ); ?>
                        </nav>
                    </div>
                    <div class="mobile_nav">
                        <nav>
                            <?php  wp_nav_menu( array(
                            'menu'   => 'Mobile Menu',
                            ) ); ?>
                        </nav>
                        <div class="contact">
                            <p><?php echo $address ?></p>
                            <p><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
                            <p><a href="tel:<?php echo $tel ?>"><?php echo $tel ?></a></p>
                        </div>
                        <div class="header_search container">
                            <div class="plugsearch">
                                <?php echo do_shortcode( '[ivory-search id="659" title="Default Search Form"]' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>