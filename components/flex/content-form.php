<?php
$row = get_row_index() - 0;

$bg_color = get_sub_field('background_colour');
$title = get_sub_field('title');
$content = get_sub_field('content');
$form = get_sub_field('form_select');
$contact = get_sub_field('contact_form');
$newsletter = get_sub_field('newsletter_signup_form');


// end
?>


    
<section class="full_width form <?php if ($bg_color){?>bg_black<?php } else { ?>bg_white<?php } ?> fade-in" id="row-<?php echo $row; ?>">
        <div class="container">
            <div class="content">
                <div class="one_half left">
                    <div class="text_area">
                        <?php if($title) {?><h2 class=""><?php echo $title; ?></h2><?php }?>
                        <?php if($content) {?><?php echo $content; ?><?php }?>                    
                    </div>
                </div>

                <div class="one_half left last form_area">
                    <div class="form_area">
                        <?php if ($form){?>
                            <?php echo $newsletter; ?>
                        <?php } else { ?>
                            <?php echo do_shortcode("$contact"); ?>                            
                        <?php } ?>                    
                    </div>
                </div>
            </div>            
        </div>
</section>
