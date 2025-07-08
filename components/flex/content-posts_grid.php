<?php $title = get_sub_field('title'); ?>
<?php $subtitle = get_sub_field('subtitle'); ?>
<?php $link = get_sub_field('link'); ?>

<section class="full_width posts_grid">
    <?php if($title) {?>
    <div class="container">
        <div class="title_wrap">
            <h3 class="title two_col_text_title"><?php echo $title; ?></h3>
            <?php if($link) {?><a href="<?php echo $link['url'] ?>" class="btn_fourth"
                target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>"><?php echo $link['title']; ?></a><?php }?>
        </div>
    </div>
    <?php } ?>
    <div class="container blog_loop">
        <?php if(have_rows('post_grid')) : while(have_rows('post_grid')) : the_row(); ?>
        <?php 
            $post_object = get_sub_field('post');
            if( $post_object ):
            $post = $post_object;
            setup_postdata( $post );
        ?>
        <?php $location = get_field('location'); ?>
        <?php $overview = get_field('overview'); ?>
        <?php $external_link = get_field('external_link'); ?>

        <div class="post_wrapper flex_post">
            <div class="post_wrapper_links">
                <?php if($external_link) { ?><a href="<?php echo $external_link['url'] ?>" class="text_link"
                    target="<?php echo $external_link['target'] ? $external_link['target'] : '_self'; ?>">
                    <?php } else { ?>
                    <a class="text_link" href="<?php the_permalink(); ?>">
                        <?php } ?>
                        <?php $thumb = get_post_thumbnail_id(); ?>
                        <?php $bannerArgs = array(
                            'class' => '' ,
                            'id' => $thumb,
                            'lazyload' => false
                        );
                        echo build_srcset('square', $bannerArgs); ?>
                    </a>
                    <?php if($external_link) { ?><a href="<?php echo $external_link['url'] ?>" class="text_link"
                        target="<?php echo $external_link['target'] ? $external_link['target'] : '_self'; ?>">
                        <?php } else { ?>
                        <a class="text_link" href="<?php the_permalink(); ?>">
                            <?php } ?>
                            <div class="post-detail">
                                <h3 class="post-title"><?php the_title(); ?></h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="23.897" height="24.169"
                                    viewBox="0 0 23.897 24.169">
                                    <path id="Path_53164" data-name="Path 53164"
                                        d="M5.066,0,0,5.338H18.831V24.169L23.9,18.831V0Z" fill="#1d1d1b" />
                                </svg>
                                <?php if($overview) { ?><p><?php echo $overview?></p> <?php } ?>
                            </div>
                        </a>
            </div>
            <div class="bottom_wrap">
                <div class="cat_butt">
                    <?php echo $location; ?>
                </div>
                <div class="details">
                    <?php the_time( 'F jS, Y' ); ?>
                </div>
            </div>
        </div>

        <?php 
        wp_reset_postdata();
        endif;
        endwhile; endif; 

    ?>
    </div>
</section>