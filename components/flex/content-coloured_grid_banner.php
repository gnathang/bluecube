<?php 

$row = get_row_index() - 0;

$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$background_colour = get_sub_field('background_color'); 
$stats_or_values = get_sub_field('stats_or_values'); 
$slider_or_static = get_sub_field('slider_or_static');

?>

<section
    class="section_coloured_grid_banner <?php if($background_colour == true) { ?> green_bg <?php } else { ?> blue_bg <?php } ?>" id="row-<?php echo $row; ?>">
    <div class="container">
        <div class="title_wrap">
            <h3 class="title"><?php echo $title; ?></h3>
            <?php if($subtitle) { ?>
            <p class="subtitle"><?php echo $subtitle; ?></p>
            <?php } ?>
        </div>



        <?php if($stats_or_values == false) { ?>
        <?php if(have_rows('stats')) : ?>
        <div class="stats_grid <?php if($slider_or_static == false) { ?> slider lazy <?php } ?>">
            <?php while(have_rows('stats')) : the_row(); ?>
            <?php $stat = get_sub_field('stat');
                $above_text = get_sub_field('above_text');
                $below_text = get_sub_field('below_text');
                $footnote = get_sub_field('source_footnote');

                $value_title = get_sub_field('value_title');
                $value_body_text = get_sub_field('value_body_text');
                ?>

            <div class="cell stats_cell">
                <h4 class="above_text"><?php echo $above_text; ?></h4>
                <h2 class="stat"><?php echo $stat; ?></h2>
                <h4 class="below_text"><?php echo $below_text; ?></h4>
                <p><?php echo $footnote; ?></p>
            </div>
            <?php 
                wp_reset_postdata();
                endwhile; 
            ?>

        </div>
        <?php endif; ?>
        <?php } else { ?>
        <div class="values_grid <?php if($slider_or_static == false) { ?> slider lazy <?php } ?>">
            <?php if(have_rows('values')) : while(have_rows('values')) : the_row(); ?>
            <?php $stat = get_sub_field('stat');
                    $above_text = get_sub_field('above_text');
                    $below_text = get_sub_field('below_text');

                    $value_title = get_sub_field('value_title');
                    $value_body_text = get_sub_field('value_body_text');
                ?>
            <div class="cell values_cell">
                <h2 class="title"><?php echo $value_title; ?></h2>
                <p><?php echo $value_body_text; ?></p>
            </div>
            <?php 
                wp_reset_postdata();
                endwhile;
                endif; ?>
        </div>
        <?php } ?>
    </div>
</section>