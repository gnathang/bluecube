<?php
$row = get_row_index() - 0;

$title = get_sub_field('title');
$content = get_sub_field('content');
$formcode = get_sub_field('form_code');
$address = get_field('text', 'option');
$tel = get_field('tel', 'option');
$email = get_field('email', 'option');
// end
?>



<section class="full_width two-text-col fade-in "  id="row-<?php echo $row; ?>">
    <div class="container">
        
        <div class="two_col_grid">

            <div class="">
                <?php if($title) {?><h3 class="title"><?php echo $title; ?></h3><?php }?>
                <?php if($content) {?><?php echo $content; ?><?php }?>
                <?php if($address) {?><p><?php echo $address; ?><br>
                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><br>
                <?php echo $tel; ?></p><?php }?>

            </div>

            <div class="">
                <?php if($formcode) {?><?php echo do_shortcode( $formcode); ?><?php }?>
            </div>

            <div class="clear"></div>



        </div>
    </div>

</section>