<?php
/**
 * Flex Template : Banner
 */


$row = get_row_index() - 0;

$bgcolour = get_sub_field('background_colour');
$layout = get_sub_field('text_layout');

// end
?>


      

  <section class="lazy slider testimonial row <?php echo $bgcolour; ?>" id="row-<?php echo $row; ?>">
      
      
    <?php
    if(have_rows('testimonials')) {
        while(have_rows('testimonials')) {
            the_row();

            $textarea = get_sub_field('testimonial');
            $name = get_sub_field('name');
            $jobtitle = get_sub_field('job_title');

            ?>
        <div  id="<?php echo $rowIndex ?>">

            <div class="slide_box">
                <div class="container">
                    <div class="text_pad <?php echo $layout; ?>">

                        <?php if($textarea){?>
                            <h3><?php echo $textarea; ?></h3>
                        <?php } ?>
                        <?php if($name){?>
                            <p><strong><?php echo $name; ?></strong></p>
                        <?php } ?>
                        <?php if($jobtitle){?>
                            <p><?php echo $jobtitle; ?></p>
                        <?php } ?>

                    </div>
                </div>

            </div>

        </div>      
        <?php
            wp_reset_postdata();
        }
    }  ?>

</section>
