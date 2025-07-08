<?php
$row = get_row_index() + 0;
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$page_header_image = get_sub_field('page_header_image');
$fade_banner = get_sub_field('fade_banner');

?>

<section class="page_header" id="row-<?php echo $row; ?>">
    
    <div class="fade_background <?php if($fade_banner) { ?> fade_banner <?php } ?>"
        style="<?php if ($fade_banner) { ?> background-image: url('<?php echo $fade_banner; ?>'); <?php } ?>"></div>
    <div class="container">
        <div class="page_header_title_wrap <?php if($fade_banner) { ?> full_viewheight <?php } ?>">
            <div class="title_wrap <?php if($fade_banner) { ?> full_viewheight <?php } ?>">
                <h1 class="page_title"><?php echo $title; ?></h1>
                <?php
                // if (!empty($title)) {
                //     // Split the title into an array of characters
                //     $title_chars = preg_split('//u', $title, -1, PREG_SPLIT_NO_EMPTY);

                //     foreach ($title_chars as $char) {
                //         // Check if the character is a space
                //         if ($char === ' ') {
                //             // Output a visible space character (you can customize it)
                //             echo '<h1 class="letter" space-char">&nbsp;</h1>';
                //         } else {
                //             // Output other characters wrapped in a <span> element
                //             echo '<h1 class="letter">' . $char . '</h1>';
                //         }
                //     }
                // }
                // ?>
                <?php if($subtitle) { ?> <p class="subtitle"><?php echo $subtitle; ?></p> <?php } ?>
            </div>
            <a href="#row-2">
                <img class="scroll_arrow"
                    src="<?php echo get_template_directory_uri() . '/assets/images/svg/arrow-down.svg'; ?>">
            </a>
        </div>
        <div class="fade_trigger"></div>
        <?php if($page_header_image) { ?>
        <div class="page_header_image" style="background-image: url('<?php echo $page_header_image; ?>')">
        </div>
        <?php } ?>
    </div>
</section>