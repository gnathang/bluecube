<?php
$row = get_row_index() - 0;

$title = get_sub_field('title');
$subtitle = get_sub_field('sub_title');
$content = get_sub_field('content');
$address = get_field('text', 'option');
$tel = get_field('tel', 'option');
$email = get_field('email', 'option');

// end
?>



<section class="full_width contact_section fade-in coral" id="row-<?php echo $row; ?>">
    <div class="container">
        <?php if($title) {?><h2 class="title"><?php echo $title; ?></h2><?php }?>
        <div class="two_col_grid">

            <div class="get_in_touch">
                <?php if($subtitle) {?><h3><?php echo $subtitle; ?></h3><?php }?>
                <?php if($content) {?><p><?php echo $content; ?></p><?php }?>
            </div>

            <div class="address">
                <?php if($address) {?><p><?php echo $address; ?><br>
                    <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><br>
                    <?php echo $tel; ?>
                </p><?php }?>

                <?php if($email) {?><p><a class="btn_third" href="mailto:<?php echo $email; ?>">Get in touch</a></p>
                <?php }?>

            </div>

            <div class="clear"></div>

        </div>
    </div>
</section>