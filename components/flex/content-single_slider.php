<?php
$row = get_row_index() - 0;

$singleslider  = get_sub_field('single_image_or_slider');
$singleimage = get_sub_field('single_image');
// end
?>


<section class="full_width two-text-col fade-in "  id="row-<?php echo $row; ?>">
    <div class="container">

    <?php if ($singleslider){?>
        <?php if ( wp_is_mobile() ) : ?>
        <?php if(have_rows('add_images')) : ?>

        <div class="images slider lazy">
            <?php while(have_rows('add_images')) : the_row(); ?>
            <?php $image = get_sub_field('image'); ?>

            <?php $bannerArgs = array(
                    'class' => '' ,
                    'id' => $image,
                    'lazyload' => false
                );
                    echo build_srcset('', $bannerArgs); ?>

            <?php wp_reset_postdata(); ?>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
        <?php else : ?>
        <?php if(have_rows('add_images')) : ?>

        <div class="images images_grid variable">
            <?php while(have_rows('add_images')) : the_row(); ?>
            <?php $image = get_sub_field('image'); ?>

            <?php $bannerArgs = array(
                    'class' => '' ,
                    'id' => $image,
                    'lazyload' => false
                );
                    echo build_srcset('', $bannerArgs); ?>
                    
            <?php wp_reset_postdata(); ?>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    <?php } else { ?>
        <?php $bannerArgs = array(
                    'class' => '' ,
                    'id' => $singleimage,
                    'lazyload' => false
                );
                    echo build_srcset('', $bannerArgs); ?>

    <?php } ?>


    </div>

</section>