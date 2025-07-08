<?php
$row = get_row_index() - 0;

$finaltitle = get_sub_field('final_title');
$finalcontent = get_sub_field('final_text');
$finalbg = get_sub_field('final_background_colour');


// end
?>

<section class="full_width staggered_section " id="row-<?php echo $row; ?>">

    <?php if(have_rows('main_block')) : ?>
    <?php while(have_rows('main_block')) : the_row(); ?>
    <?php $backgroundcolour = get_sub_field('background_colour'); ?>
    <?php $title = get_sub_field('title'); ?>
    <?php $logo = get_sub_field('logo'); ?>
    <?php $text = get_sub_field('text'); ?>
    <?php $accordion_or_content = get_sub_field('accordion_or_content'); ?>
    <?php $content = get_sub_field('content'); ?>
    <?php $rowcount = get_row_index() - 0;?>


    <div class="full_width stag_trig stag_trig_<?php echo $rowcount; ?> <?php echo $backgroundcolour; ?> ">
        <div class="container">

            <?php if($title) {?><div class="flex_start">
                <p>0<?php echo $rowcount; ?></p>
                <h2 class="staggered_cards_title"><?php echo $title; ?></h2>
                <?php if($logo) { ?>
                <img src="<?php echo $logo; ?>" alt="logo" style="max-width: 100px; height: auto;">
                <?php } ?>
            </div><?php } ?>
            <?php if($text) {?><div class="pre_text"><?php echo $text; ?></div><?php } ?>

            <?php if ( wp_is_mobile() ) : ?>

            <?php if ($accordion_or_content){?>
            <div class="text_wrap">
                <?php if($content) {?><?php echo $content; ?><?php } ?>
            </div>
            <?php } else { ?>
            <?php if(have_rows('accordion')) : ?>
            <div class="">
                <?php while(have_rows('accordion')) : the_row(); ?>
                <?php $maintitle = get_sub_field('accordion_title'); ?>
                <?php $textarea = get_sub_field('accordion_text'); ?>
                <div class="slide_wrap">
                    <div class="flex_wrap">
                        <div class="arrow">

                        </div>
                        <div class="content">
                            <h3><?php echo $maintitle; ?></h3>
                            <div class="textarea">
                                <?php echo $textarea; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <?php wp_reset_postdata(); ?>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <?php } ?>


            <?php else : ?>

            <?php if ($accordion_or_content){?>
            <div class="text_wrap">
                <?php if($content) {?><?php echo $content; ?><?php } ?>
            </div>
            <?php } else { ?>
            <?php if(have_rows('accordion')) : ?>
            <div class="regular slider">
                <?php while(have_rows('accordion')) : the_row(); ?>
                <?php $maintitle = get_sub_field('accordion_title'); ?>
                <?php $textarea = get_sub_field('accordion_text'); ?>
                <div class="slide_wrap">
                    <div class="flex_wrap">
                        <div class="arrow">

                        </div>
                        <div class="content">
                            <h3><?php echo $maintitle; ?></h3>
                            <div class="textarea">
                                <?php echo $textarea; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <?php wp_reset_postdata(); ?>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <?php } ?>

            <?php endif; ?>


        </div>
    </div>
    <?php endwhile; ?>

    <!-- <div class="full_width stag_trig stag_trig_last <?php echo $finalbg; ?>">
        <div class="container">
            <div class="flex_start">
                <h3 class="title"><?php echo $finaltitle; ?></h2>
            </div>

            <div class="one_half right">
                <?php echo $finalcontent; ?>
            </div>


        </div>
    </div> -->
    <?php endif; ?>

</section>