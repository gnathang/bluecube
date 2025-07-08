<?php $row = get_row_index() - 0; ?>
<?php $author = get_field('author'); ?>
<?php get_header() ; ?>

<?php
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'landscape'); 
 ?>

<section class="news_single_header" id="row-1">
    <div class="fade_background <?php if($fade_banner) { ?> fade_banner <?php } ?>"
        style="<?php if ($fade_banner) { ?> background-image: url('<?php echo $fade_banner; ?>'); <?php } ?>"></div>
    <div class="container">
        <div class="page_header_title_wrap">
            <div class="title_wrap">
                <h1 class="page_title"><?php the_title(); ?></h1>
                <div class="sub_title">
                    <div>
                        <?php
                            $categories = get_the_category();
                            $separator = ' ';
                            $output = '';
                            if ( ! empty( $categories ) ) {
                                foreach( $categories as $category ) {
                                    $output .= '<a class="btn_fourth" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                                }
                                echo trim( $output, $separator );
                            }
                        ?>
                        Author:
                        Date: <?php $post_date = get_the_date( 'd/m/Y' ); echo $post_date; ?>
                    </div>
                </div>
                <img class="scroll_arrow"
                    src="<?php echo get_template_directory_uri() . '/assets/images/svg/arrow-down.svg'; ?>">
            </div>
        </div>
        <div class="fade_trigger"></div>
        <?php if($featured_img_url) { ?>
        <div class="page_header_image" style="background-image: url('<?php echo $featured_img_url; ?>')">
        </div>
        <?php } ?>
    </div>

</section>

<?php $pass_masterPost = get_post();
if ( post_password_required(  $pass_masterPost->ID ) ) { ?>
<div class="full_width">
    <div class="container">

        <?php echo get_the_password_form(); 
		    echo '<p>THIS POST IS PASSWORD PROTECTED: PLEASE ENTER IT!</p>'; ?>

    </div>
</div>
<?php } else { ?>


<?php  if( get_field('post_type') == 'externallink' ) { ?>
<section class="news_header" id="row-1">
    <div class="container">
        <?php $description = get_field('short_description'); ?>
        <?php $externalurl = get_field('external_url'); ?>
        <div class="post_wrapper external_link">

            <div class="post-detail">
                <p><?php echo $description; ?></p>
                <a class="btn_fourth" href="<?php echo $externalurl; ?>" target="_blank">Download here</a>
            </div>

        </div>
    </div>
</section>

<?php } elseif( get_field('post_type') == 'simplepost' ) { ?>
<section class="full_width image-text-col fade-in" id="row-<?php echo $row; ?>">

    <div class="container">
        <div class="wrap_<?php if ($reverse){?>image_right<?php } else { ?>image_left<?php } ?> ">
            <div class="content">
                <div class="one_half image">
                    <?php $simplepost = get_field('simple_post'); ?>

                </div>

                <div class="one_half text">
                    <?php echo $simplepost; ?>

                </div>
            </div>
        </div>

    </div>
</section>

<?php get_template_part('components/flex/content'); ?>


<?php } elseif( get_field('post_type') == 'flexpost' ) { ?>

<?php get_template_part('components/flex/content'); ?>

<?php } else{ ?>

<?php get_template_part('components/flex/content'); ?>

<?php } ?>

<?php } ?>

<section class="full-width two-text-col accordion_wrap">

    <div class="container">

        <div class="flex_between">

            <h3 class="single_other">Other News Stories</h3>

            <p>Take a look at the latest news stories to stay up to date with the current marine climate.</p>


            <div class="clear"></div>
        </div>

        <div class="post_loop">

            <?php $args = array(
                  'post_type' => $chosen_post_type,
                  'posts_per_page' => '3',
                  'order' => 'DSC'
                );
                $loop = new WP_Query( $args );
                ?>
            <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php get_template_part('components/includes/post-wrap'); ?>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>


    </div>

</section>


<?php get_footer() ; ?>