<?php
$row = get_row_index() - 0;

$bg_col_image = get_sub_field('colour_or_image');
$bg_color = get_sub_field('text_background');
$bg_image = get_sub_field('text_background_image');
$title = get_sub_field('text_title');
$content = get_sub_field('text_content');
$link = get_sub_field('text_link');


// end
?>

<?php if ($bg_col_image){?>
    
    <section class="full_width big-text fade-in <?php echo $bg_color; ?> <?php if ($full_video){?> full_width <?php } else { ?> <?php } ?>" id="row-<?php echo $row; ?>">

<?php } else { ?>

    <section class="full_width big-text fade-in bg_primary" style="background-image: url('<?php echo $bg_image; ?>')" id="row-<?php echo $row; ?>">

<?php } ?>
        <div class="container">
            <div class="text_pad">
                <?php if($title) {?><h2 class="normal uppercase text_title"><?php echo $title; ?></h2><?php }?>
                <div class="content">
                    <?php if($content) {?><?php echo $content; ?><?php }?>
                    <?php if($link) {?><a href="<?php echo $link['url'] ?>" class="button" target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>"><?php echo $link['title']; ?><?php echo get_template_part('images/arrow.svg') ?></a><?php }?>
                </div>
            </div>
        </div>
</section>
