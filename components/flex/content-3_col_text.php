<?php
$row = get_row_index() - 0;

$title = get_sub_field('title');
$subtitle = get_sub_field('sub_title');
$bgcolour = get_sub_field('background_colour');

// end
?>



<section class="full_width three_col_text fade-in <?php echo $bgcolour; ?>"  id="row-<?php echo $row; ?>">
    <div class="container">
        <div class="flex_between col_header">
            <?php if($title) {?><h3 class=""><?php echo $title; ?></h3><?php }?>
            <?php if($subtitle) {?><p><?php echo $subtitle; ?></p><?php }?>
        </div>
        <div class="three_col_grid">

            <div class="three_col">
                <?php if(have_rows('columns')) : ?>
                    <?php while(have_rows('columns')) : the_row(); ?>
                        <?php $title = get_sub_field('title');
                         $text = get_sub_field('text_area'); ?>
                            <div class="col_item">
                                <?php if($title) {?><h3><?php echo $title; ?></h3><?php }?>
                                <?php if($text) {?><p><?php echo $text; ?></p><?php }?>
                            </div>
                        <?php wp_reset_postdata(); ?>
                    <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>


</section>