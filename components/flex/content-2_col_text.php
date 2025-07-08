<?php
$row = get_row_index() - 0;

$title = get_sub_field('title');
// $subtitle = get_sub_field('sub_title');
$colcheck = get_sub_field('column_check');
$colcount = get_sub_field('col_count');
$coltext = get_sub_field('col_text_area');
$collink = get_sub_field('col_link');
$leftcol = get_sub_field('left_column');
$leftlink = get_sub_field('left_col_link');
$rightcol = get_sub_field('right_column');
$rightlink = get_sub_field('right_col_link');
$singleslider  = get_sub_field('single_image_or_slider');
$singleimage = get_sub_field('single_image');
// end
?>



<section class="full_width two-text-col fade-in " id="row-<?php echo $row; ?>">
    <div class="container">
        <?php if($title) {?><h3 class="two_col_text_title"><?php echo $title; ?></h3><?php }?>
        <div class="two_col_grid">

            <div class="">
                <?php echo $leftcol; ?>
                <?php if($leftlink) {?><a href="<?php echo $leftlink['url'] ?>" class="btn_default"
                    target="<?php echo $leftlink['target'] ? $leftlink['target'] : '_self'; ?>"><?php echo $leftlink['title']; ?></a><?php }?>

            </div>

            <div class="">

                <?php echo $rightcol; ?>
                <?php if($rightlink) {?><a href="<?php echo $rightlink['url'] ?>" class="btn_default"
                    target="<?php echo $rightlink['target'] ? $rightlink['target'] : '_self'; ?>"><?php echo $rightlink['title']; ?></a><?php }?>

            </div>

            <div class="clear"></div>

            <!-- <div class="auto_content <?php echo $colcount; ?>">

                <?php if($coltext) {?><?php echo $coltext; ?><?php }?>

            </div> -->

            <?php if($collink) {?><a href="<?php echo $collink['url'] ?>" class="btn_default"
                target="<?php echo $collink['target'] ? $collink['target'] : '_self'; ?>"><?php echo $collink['title']; ?></a><?php }?>

        </div>
    </div>


    <?php if ($singleslider){?>
    <div class="container">
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
                    'class' => 'slide_image' ,
                    'id' => $image,
                    'lazyload' => false
                );
                    echo build_srcset('', $bannerArgs); ?>

            <?php wp_reset_postdata(); ?>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php } else { ?>
    <div class="container">

        <?php if($singleimage) {?>
        <?php $bannerArgs = array(
                        'class' => 'singleimage' ,
                        'id' => $singleimage,
                        'lazyload' => false
                    );
            echo build_srcset('', $bannerArgs); ?>
        <?php } ?>
    </div>

    <?php } ?>



</section>