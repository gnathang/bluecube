<?php $row = get_row_index() - 0; ?>

<?php get_header() ; ?>

<?php
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'landscape'); 
 ?>

<section class="news_header" id="row-">
    <div class="fade_background <?php if($fade_banner) { ?> fade_banner <?php } ?>"
        style="<?php if ($fade_banner) { ?> background-image: url('<?php echo $fade_banner; ?>'); <?php } ?>"></div>
    <div class="container">
        <div class="page_header_title_wrap">
            <h2 class="page_title"><?php the_title(); ?></h2>
            <div class="sub_title flex_start">
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
                <!-- Author: <?php // $current_user = wp_get_current_user(); echo $current_user->display_name; ?> &nbsp; -->
                <?php if($author) { ?>Author: <?php echo $author; ?> <?php } ?>
                Date:<?php $post_date = get_the_date( 'd/m/Y' ); echo $post_date; ?>
                <a href="#row-1">
                    <img class="scroll_arrow"
                        src="<?php echo get_template_directory_uri() . '/assets/images/svg/arrow-down.svg'; ?>">
                </a>
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

<?php if ( get_the_content() ) { ?>
<div class="full_width">
    <div class="container">
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    </div>
</div>

<?php get_template_part('components/flex/content'); ?>

<?php } else{ ?>

<?php get_template_part('components/flex/content'); ?>

<?php } ?>

<?php } ?>

<section class="full-width  next_blog">

    <div class="container">

        <div class="one_third left">

            <h3 class="text_right">Read Next</h3>

        </div>


        <?php
$prev_post = get_previous_post();
$next_post = get_next_post();
if (!empty( $prev_post )): ?>
        <div class="one_third next_wrap right last">
            <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
                <?php echo get_the_post_thumbnail( $prev_post->ID, '' ); ?>
                <h3><?php echo esc_attr( $prev_post->post_title ); ?></h3>
                <p><?php echo esc_attr( $prev_post->post_excerpt );?></p>
            </a>
        </div>
        <?php endif;
if (!empty( $next_post )): ?>
        <div class="one_third next_wrap right ">
            <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
                <?php echo get_the_post_thumbnail( $next_post->ID, '' ); ?>
                <h3><?php echo esc_attr( $next_post->post_title ); ?></h3>
                <p><?php echo esc_attr( $next_post->post_excerpt );?></p>
            </a>
        </div>
        <?php endif; ?>


    </div>

</section>


<?php get_footer() ; ?>