<?php  if( get_field('post_type') == 'externallink' ) { ?>

<?php $description = get_field('short_description'); ?>
<?php $externalurl = get_field('external_url'); ?>
<div class="post_wrapper external_link">
    <div class="post_wrapper_links">
        <a class="img_link" href="<?php echo $externalurl; ?>" target="_blank">
            <?php $thumb = get_post_thumbnail_id(); ?>
            <?php $bannerArgs = array(
                    'class' => '' ,
                    'id' => $thumb,
                    'lazyload' => false
                );
                
                echo build_srcset('square', $bannerArgs); ?>
        </a>
        <a class="text_link" href="<?php echo $externalurl; ?>" target="_blank">
            <div class="post-detail">
                <h3 class="post-title"><?php the_title(); ?></h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="23.897" height="24.169" viewBox="0 0 23.897 24.169">
                    <path id="Path_53164" data-name="Path 53164" d="M5.066,0,0,5.338H18.831V24.169L23.9,18.831V0Z"
                        fill="#1d1d1b" />
                </svg>
                <p><?php echo $description; ?></p>
            </div>
        </a>
    </div>
    <div class="bottom_wrap">
        <div class="cat_butt">
            <?php if ( get_post_type() === 'post' ) { ?>
            <a class="btn_fourth news_butt" href="/news/">News</a>
            <?php } elseif ( get_post_type() === 'event' ) { ?>
            <a class="btn_fourth events_butt" href="/events/">Events</a>
            <?php } elseif ( get_post_type() === 'view' ) { ?>
            <a class="btn_fourth views_butt" href="/views/">Views</a>
            <?php } else { ?>
            <?php printf( __( '%s', 'textdomain' ), get_post_type( get_the_ID() ) ); ?>
            <?php } ?>
        </div>
        <div class="details">
            <?php the_time( 'F jS, Y' ); ?>
        </div>
    </div>
</div>

<?php } elseif( get_field('post_type') == 'simplepost' ) { ?>

<?php $description = get_field('short_description'); ?>
<div class="post_wrapper simple_post">
    <div class="post_wrapper_links">
        <a class="img_link" href="<?php the_permalink(); ?>">
            <?php $thumb = get_post_thumbnail_id(); ?>
            <?php $bannerArgs = array(
                    'class' => '' ,
                    'id' => $thumb,
                    'lazyload' => false
                );
                
                echo build_srcset('square', $bannerArgs); ?>
        </a>
        <a class="text_link" href="<?php the_permalink(); ?>">
            <div class="post-detail">
                <h3 class="post-title"><?php the_title(); ?></h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="23.897" height="24.169" viewBox="0 0 23.897 24.169">
                    <path id="Path_53164" data-name="Path 53164" d="M5.066,0,0,5.338H18.831V24.169L23.9,18.831V0Z"
                        fill="#1d1d1b" />
                </svg>
                <p><?php echo $description; ?></p>
            </div>
        </a>
    </div>
    <div class="bottom_wrap">
        <div class="cat_butt">
            <?php if ( get_post_type() === 'post' ) { ?>
            <a class="btn_fourth news_butt" href="/news/">News</a>
            <?php } elseif ( get_post_type() === 'event' ) { ?>
            <a class="btn_fourth events_butt" href="/events/">Events</a>
            <?php } elseif ( get_post_type() === 'view' ) { ?>
            <a class="btn_fourth views_butt" href="/views/">Views</a>
            <?php } else { ?>
            <?php printf( __( '%s', 'textdomain' ), get_post_type( get_the_ID() ) ); ?>
            <?php } ?>
        </div>
        <div class="details">
            <?php the_time( 'F jS, Y' ); ?>
        </div>
    </div>
</div>


<?php } elseif( get_field('post_type') == 'flexpost' ) { ?>

<?php $description = get_field('short_description'); ?>
<div class="post_wrapper flex_post">
    <div class="post_wrapper_links">
        <a class="img_link" href="<?php the_permalink(); ?>">
            <?php $thumb = get_post_thumbnail_id(); ?>
            <?php $bannerArgs = array(
                    'class' => '' ,
                    'id' => $thumb,
                    'lazyload' => false
                );
                
                echo build_srcset('square', $bannerArgs); ?>
        </a>
        <a class="text_link" href="<?php the_permalink(); ?>">
            <div class="post-detail">
                <h3 class="post-title"><?php the_title(); ?></h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="23.897" height="24.169" viewBox="0 0 23.897 24.169">
                    <path id="Path_53164" data-name="Path 53164" d="M5.066,0,0,5.338H18.831V24.169L23.9,18.831V0Z"
                        fill="#1d1d1b" />
                </svg>
                <p><?php echo $description; ?></p>
            </div>
        </a>
    </div>
    <div class="bottom_wrap">
        <div class="cat_butt">
            <?php if ( get_post_type() === 'post' ) { ?>
            <a class="btn_fourth news_butt" href="/news/">News</a>
            <?php } elseif ( get_post_type() === 'event' ) { ?>
            <a class="btn_fourth events_butt" href="/events/">Events</a>
            <?php } elseif ( get_post_type() === 'view' ) { ?>
            <a class="btn_fourth views_butt" href="/views/">Views</a>
            <?php } else { ?>
            <?php printf( __( '%s', 'textdomain' ), get_post_type( get_the_ID() ) ); ?>
            <?php } ?>
        </div>
        <div class="details">
            <?php the_time( 'F jS, Y' ); ?>
        </div>
    </div>
</div>

<?php } else { ?>

<?php $description = get_field('short_description'); ?>
<div class="post_wrapper">
    <div class="post_wrapper_links">
        <?php if(has_post_thumbnail()) { ?>
        <a class="img_link" href="<?php the_permalink(); ?>">
            <?php $thumb = get_post_thumbnail_id(); ?>
            <?php $bannerArgs = array(
                    'class' => '' ,
                    'id' => $thumb,
                    'lazyload' => false
                );
                
                echo build_srcset('square', $bannerArgs); ?>
        </a>
        <?php } else { ?>
        <div class="image_placeholder">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/image-placeholder-coral.svg'; ?>"
                alt="">
        </div>
        <?php } ?>
        <a class="text_link" href="<?php the_permalink(); ?>">
            <div class="post-detail">
                <h3 class="post-title"><?php the_title(); ?></h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="23.897" height="24.169" viewBox="0 0 23.897 24.169">
                    <path id="Path_53164" data-name="Path 53164" d="M5.066,0,0,5.338H18.831V24.169L23.9,18.831V0Z"
                        fill="#1d1d1b" />
                </svg>
                <p><?php echo $description; ?></p>
            </div>
        </a>
    </div>
    <div class="bottom_wrap">
        <div class="cat_butt">
            <?php if ( get_post_type() === 'post' ) { ?>
            <a class="btn_fourth news_butt" href="/news/">News</a>
            <?php } elseif ( get_post_type() === 'event' ) { ?>
            <a class="btn_fourth events_butt" href="/events/">Events</a>
            <?php } elseif ( get_post_type() === 'view' ) { ?>
            <a class="btn_fourth views_butt" href="/views/">Views</a>
            <?php } else { ?>
            <?php printf( __( '%s', 'textdomain' ), get_post_type( get_the_ID() ) ); ?>
            <?php } ?>
        </div>
        <div class="details">
            <?php the_time( 'F jS, Y' ); ?>
        </div>
    </div>
</div>


<?php } ?>