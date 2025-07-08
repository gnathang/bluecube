<?php
/**
 * Flex Template : Banner
 */


$row = get_row_index() - 0;

$size = get_sub_field('slide_size');
$width = get_sub_field('slider_width');

// end
?>

<?php if ($width){?>

<section class="lazy slider banner row <?php if ($size){?>full_height<?php } else { ?>half_height<?php } ?>" id="row-<?php echo $row; ?>">

    <?php
    if(have_rows('slides')) {
        while(have_rows('slides')) {
            the_row();

            $image = get_sub_field('image');
            $title = get_sub_field('title');
            $textArea = get_sub_field('text_area');
            $link = get_sub_field('button');
            $colourselect = get_sub_field('colour_select');
            $textposition = get_sub_field('text_posititon');

            if($imagePosition === '') {
                $imagePosition = 'top';
            }
            ?>
        <div  id="<?php echo $rowIndex ?>">
            <div class="slide_image_wrap <?php if ($colourselect){?>color<?php } else { ?>bandw<?php } ?>">
                <?php $bannerArgs = array(
                    'class' => '' ,
                    'id' => $image,
                    'lazyload' => false
                );
                    echo build_srcset('banner', $bannerArgs); ?>
            </div>

            <div class="slide_box">
                <div class="container">

                    <div class="image_text_area">
                        
                        <div class="image_text_area_bg <?php echo $textposition; ?>">
                            <div class="slide_count slide_<?php echo get_row_index(); ?>">
                                0<?php echo get_row_index(); ?>
                            </div>
                        <?php if($title){?>
                            <h2><?php echo $title; ?></h2>
                        <?php } ?>


                        <?php if($textArea){?>
                            <p><?php echo $textArea; ?></p>
                        <?php } ?>
                        <?php 
                        $link = get_sub_field('button');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                        </div>


                    </div>
                </div>

            </div>

        </div>      
        <?php
            wp_reset_postdata(); 
            }
        }  ?>  
    </div> 

</section>

<?php } else { ?>

<section class="banner row row-<?php echo $row; ?> <?php if ($size){?>full_height<?php } else { ?>half_height<?php } ?>">
    <div class="container">

        <div class="lazy slider ">
            <?php
        if(have_rows('slides')) {
            while(have_rows('slides')) {
                the_row();

                $image = get_sub_field('image');
                $title = get_sub_field('title');
                $textArea = get_sub_field('text_area');
                $link = get_sub_field('button');
                $colourselect = get_sub_field('colour_select');
                $textposition = get_sub_field('text_posititon');

                if($imagePosition === '') {
                    $imagePosition = 'top';
                }
                ?>
            <div  id="<?php echo $rowIndex ?>">
                <div class="slide_image_wrap <?php if ($colourselect){?>color<?php } else { ?>bandw<?php } ?>">
                    <?php $bannerArgs = array(
                        'class' => '' ,
                        'id' => $image,
                        'lazyload' => false
                    );
                        echo build_srcset('banner', $bannerArgs); ?>
                </div>

                <div class="slide_box">
                    <div class="container">

                        <div class="image_text_area">

                            <div class="image_text_area_bg <?php echo $textposition; ?>">
                                <div class="slide_count slide_<?php echo get_row_index(); ?>">
                                    0<?php echo get_row_index(); ?>
                                </div>
                            <?php if($title){?>
                                <h2><?php echo $title; ?></h2>
                            <?php } ?>


                            <?php if($textArea){?>
                                <p><?php echo $textArea; ?></p>
                            <?php } ?>
                            <?php 
                            $link = get_sub_field('button');
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                            </div>


                        </div>
                    </div>

                </div>

            </div>      
            <?php
                wp_reset_postdata();
            }
        }  ?>
        </div>
        
    </div>

</section>


<?php } ?>      
      

