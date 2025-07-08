</main>

<?php 

 $address = get_field('text', 'option');
 $tel = get_field('tel', 'option');
 $email = get_field('email', 'option');
 $linkedin = get_field('linkedin', 'option');
 $instagram = get_field('instagram', 'option');
 $twitter = get_field('twitter', 'option');
 $facebook = get_field('facebook', 'option');
 $youtube = get_field('youtube', 'option');
 $pinterest = get_field('pinterest', 'option');

?>

<footer>

    <div class="container">

        <div class="flex_wrap">
            <div class="logo_legal_wrap">
                <a class="remove_hov_effect" href="/">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/bluecube-logo-coral-full.svg'; ?>"
                        alt="" class="footer_logo">
                </a>
                <div class="legal_pages_wrap">
                    <a href="/privacy">Privacy</a>
                    <a href="/cookies">Cookies</a>
                    <a href="/terms">Terms & Conditions</a>
                </div>
            </div>

            <div class="footer_menu">
                <p class="footer_title">Featured</p>
                <nav>
                    <?php  wp_nav_menu( array(
                        'menu'   => 'Main Menu Left',
                        ) ); ?>
                    <?php  wp_nav_menu( array(
                        'menu'   => 'Main Menu Right',
                        ) ); ?>
                </nav>
            </div>

            <div class="contact">
                <p class="footer_title">Contact</p>
                <ul class="text">
                    <li><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></li>
                    <li><a href="tel:<?php echo $tel ?>"><?php echo $tel ?></a></li>
                </ul>
                <div class="footer_search">
                    <div class="plugsearch">
                        <?php echo do_shortcode( '[ivory-search id="659" title="Default Search Form"]' ); ?>
                    </div>
                </div>
            </div>

            <div class="social">
                <ul>
                    <!-- <li><a href="#">Privacy Policy</a></li>
                        <li><a href="https://designdough.co.uk" target="_blank">Website by designdough</a></li>
                        <li>&copy;<?php bloginfo( 'name' ); ?> <?php echo date("Y"); ?></li> -->
                    <?php if($twitter) {?>
                    <li>
                        <a target="_blank" href="https://twitter.com/<?php echo $twitter; ?>">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/twitter-black.svg'; ?>"
                                alt="" class="">
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($instagram) {?>
                    <li>
                        <a target="_blank" href="https://instagram.com/<?php echo $instagram; ?>">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/instagram-black.svg'; ?>"
                                alt="" class="">
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($facebook) {?>
                    <li>
                        <a target="_blank" href="https://facebook.com/<?php echo $facebook; ?>">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/facebook-black.svg'; ?>"
                                alt="" class="">
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($linkedin) {?>
                    <li>
                        <a target="_blank" href="https://linkedin.com/company/<?php echo $linkedin; ?>">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/linkedin-black.svg'; ?>"
                                alt="" class="">
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($pinterest) {?>
                    <li>
                        <a target="_blank" href="https://pinterest.com/<?php echo $pinterest; ?>">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/pinterest-black.svg'; ?>"
                                alt="" class="">
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($youtube) {?>
                    <li>
                        <a target="_blank" href="https://www.youtube.com/channel/<?php echo $youtube; ?>">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/youtube-black.svg'; ?>"
                                alt="" class="">
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

    </div>
    <?php
                if ( wp_is_mobile() ) { ?>
    <img class="bottom_banner"
        src="<?php echo get_template_directory_uri() . '/assets/images/svg/footer-banner-mob.svg'; ?>" alt="">

    <?php } else { ?>
    <img class="bottom_banner" src="<?php echo get_template_directory_uri() . '/assets/images/svg/coral-lino.svg'; ?>"
        alt="">

    <?php } ?>

</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/ScrollTrigger.min.js"></script>

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src="<?php get_site_url(); ?>/wp-content/themes/designdough/assets/js/froogaloop.js" type="text/javascript"
    charset="utf-8"></script>

<script src="<?php get_site_url(); ?>/wp-content/themes/designdough/assets/js/slick.js" type="text/javascript"
    charset="utf-8"></script>

<script src="<?php get_site_url(); ?>/wp-content/themes/designdough/assets/js/animejs/lib/anime.min.js"
    type="text/javascript">
</script>

<script src="<?php get_site_url(); ?>/wp-content/themes/designdough/assets/js/script.js" type="text/javascript"
    charset="utf-8"></script>

<?php wp_footer(); ?>

</div> <!-- site_bg -->
</body>

</html>