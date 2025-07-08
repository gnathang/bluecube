<?php
$row = get_row_index() - 0;

$title = get_sub_field('title');
$content = get_sub_field('text');
$image = get_sub_field('image');


// end
?>


    
<section class="full_width multiple_links fade-in" id="row-<?php echo $row; ?>">

        <div class="container">
            
            <div class="">
                <div class="content">
                    <div class="one_third left">
                    
                        <?php $bannerArgs = array(
                            'class' => '' ,
                            'id' => $image,
                            'lazyload' => false
                        );
                        
                        echo build_srcset('banner', $bannerArgs); ?>
                    
                    </div>
                    
                    <div class="two_thirds left last">
                        <?php if($title) {?><h2 class=""><?php echo $title; ?></h2><?php }?>
                        <?php if($content) {?><?php echo $content; ?><?php }?>
                      <?php
                        if(have_rows('link_list')) {
                            ?>
                            <ul>
                            <?php while(have_rows('link_list')) {
                                the_row();

                                $link = get_sub_field('links');


                                ?>
                                <?php if($link) {?><li><a href="<?php echo $link['url'] ?>" class="" target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>"><?php echo $link['title']; ?></a></li><?php }?>
                                    <?php
                                        wp_reset_postdata();
                                    } ?>
                                </ul>
                                <?php }  ?>

                    </div>
                </div>
            </div>
            
            
            
            
        </div>
</section>
