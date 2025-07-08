<?php
$row = get_row_index() - 0;

$title = get_sub_field('title');
$content = get_sub_field('content');
$teamtitle = get_sub_field('team_title');

// end
?>



<section class="full_width two-text-col team_members fade-in " id="row-<?php echo $row; ?>">
    <div class="container">
        <?php if($title) {?><h3 class="title two_col_text_title"><?php echo $title; ?></h3><?php }?>
        <div class="two_col_grid">

            <div class="">

            </div>

            <div class="">

                <?php if($content) {?><?php echo $content; ?></h4><?php } ?>

            </div>

            <div class="clear"></div>
        </div>
    </div>

    <div class="container">
        <?php if($teamtitle) {?><h4 class="title"><?php echo $teamtitle; ?></h4><?php }?>

        <?php if(have_rows('team')) : ?>
        <div class="team_wrap flex_wrap">
            <?php while(have_rows('team')) : the_row(); ?>
            <?php $photo = get_sub_field('photo'); ?>
            <?php $name = get_sub_field('name'); ?>
            <?php $job = get_sub_field('job'); ?>
            <?php $textarea = get_sub_field('text_area'); ?>
            <div class="content">
                <?php $bannerArgs = array(
                            'class' => '' ,
                            'id' => $photo,
                            'lazyload' => false
                        );
                            echo build_srcset('landscape', $bannerArgs); ?>
                <h4><?php echo $name; ?>, <?php echo $job; ?></h4>
                <div class="textarea">
                    <p><?php echo $textarea; ?></p>
                </div>

            </div>

            <?php wp_reset_postdata(); ?>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>


    </div>

</section>