<?php $row = get_row_index() - 0; ?>
<?php $author = get_field('author'); ?>
<?php get_header() ; ?>

<?php
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'landscape'); 
 ?>

<section class="news_header" id="row-1">

    <?php if(is_single(1610)) { ?>
    <!-- Custom header for Seawall Project page (#1610) -->
    <div class="seawall_header">
        <div class="seawall_main_background" 
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/svg/mumbles-seawall-texture-green.svg');">
            <div class="seawall_background_texture" 
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/svg/mumbles-header-texture.svg');">
            </div>
        </div>
        <div class="seawall_header_container">
            <div class="seawall_header_wrap">
                <img class="seawall_logo" style="width: 40%;" src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/mumbles-seawall-logo.svg"></img>
                <div class="seawall_subheadings_container">
                    <p class="seawall_subheading_left"><?php echo get_field('subheading_left'); ?></p>
                    <p class="seawall_subheading_right"><?php echo get_field('subheading_right'); ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- END CUSTOM HEADER -->
    <?php } else { ?>
    <div class="fade_background <?php if($fade_banner) { ?> fade_banner <?php } ?>"
        style="<?php if ($fade_banner) { ?> background-image: url('<?php echo $fade_banner; ?>'); <?php } ?>"></div>
    <div class="container">
        <div class="page_header_title_wrap">
            <div class="title_wrap news_wrap">
                <h1 class="page_title"><?php the_title(); ?></h1>
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
                    <?php if($author) { ?>Author: &nbsp; <?php echo $author; ?> &nbsp; / &nbsp; <?php } ?>
                    Date:&nbsp; <?php $post_date = get_the_date( 'd/m/Y' ); echo $post_date; ?>
                </div>
                <a href="#row-2">
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
     <?php } ?>
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



<?php get_footer() ; ?>

<style>
    @font-face {
        font-family: 'DMSans-Variable';
        src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/DMSans-Variable.ttf');
    }
</style>