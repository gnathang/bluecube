<?php
$row = get_row_index() - 0;

$title = get_sub_field('title');
$subtitle = get_sub_field('sub_title');
$colcount = get_sub_field('cta_column_count');
$colcta = get_sub_field('call_to_action');



// end
?>


    
<section class="full_width cta_columns fade-in " id="row-<?php echo $row; ?>">

    <div class="container">

        <?php if($title) {?><h2 class=""><?php echo $title; ?></h2><?php }?>
        <?php if($subtitle) {?><h4 class=""><?php echo $subtitle; ?></h4><?php }?>

        <div class="cta_wrap <?php echo $colcount; ?>">
           <?php
            if(have_rows('call_to_action')) {
                while(have_rows('call_to_action')) {
                    the_row();

                    $image = get_sub_field('cta_image');
                    $title = get_sub_field('cta_title');
                    $subtitle = get_sub_field('cta_sub_title');
                    $text = get_sub_field('cta_main_text');
                    $link = get_sub_field('cta_link');

                    ?>
                    <div class="cta_col">
                        <?php $bannerArgs = array(
                                'class' => '' ,
                                'id' => $image,
                                'lazyload' => false
                            );
                            echo build_srcset('banner', $bannerArgs); ?>
                        <?php if($title){?>
                            <p><strong><?php echo $title; ?></strong></p>
                        <?php } ?>
                        <?php if($subtitle){?>
                            <p><?php echo $subtitle; ?></p>
                        <?php } ?>
                        <?php if($text){?>
                            <p><?php echo $text; ?></p>
                        <?php } ?>
                         <?php 
                        $link = get_sub_field('cta_link');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="btn_default" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>

                    </div>
                <?php
                    wp_reset_postdata();
                }
            }  ?>
        </div>
    </div>

</section>
