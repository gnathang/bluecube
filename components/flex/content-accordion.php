<?php
$row = get_row_index() - 0;

$title = get_sub_field('title');
$subtitle = get_sub_field('sub_title');
$accordiontitle = get_sub_field('accordion_title');

// end
?>



<section class="full_width two-text-col accordion_wrap fade-in " id="row-<?php echo $row; ?>">
    <div class="container">
        <div class="flex_between">

            <?php if($title) {?><h3 class=""><?php echo $title; ?></h3><?php }?>


            <p><?php echo $subtitle; ?></p>


            <div class="clear"></div>
        </div>
    </div>

    <div class="container">
        <?php if($accordiontitle) {?><h3 class="title two_col_text_title"><?php echo $accordiontitle; ?></h3><?php }?>

        <?php if(have_rows('accordion')) : ?>
        <div class="accordion">
            <?php while(have_rows('accordion')) : the_row(); ?>
            <?php $maintitle = get_sub_field('main_title'); ?>
            <?php $textarea = get_sub_field('text_area'); ?>
            <div class="flex_wrap">
                <div class="arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="29.853" height="29.853" viewBox="0 0 29.853 29.853">
                        <path id="Path_30040" data-name="Path 30040" d="M4.45,0,0,4.688H16.54v16.54l4.45-4.688V0Z"
                            transform="translate(15.011) rotate(45)" fill="#1d1d1b" />
                    </svg>
                </div>
                <div class="content">
                    <h4><?php echo $maintitle; ?></h4>
                    <div class="textarea">
                        <?php echo $textarea; ?>
                    </div>

                </div>

            </div>
            <?php wp_reset_postdata(); ?>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>


    </div>

</section>