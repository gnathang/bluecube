<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage designdough
 * @since 1.0
 * @version 1.0
 */

$my_c = get_query_var( 'designdough-blogs' );

if(!empty($my_c)) {
    $ct_id = get_cat_ID($my_c);
    $loop = new WP_Query( array( 'post_type' => 'post', 'cat' => $ct_id, 'posts_per_page' => -1, 'orderby' => 'date', 'order' => 'ASC'  ) );
}


get_header(); ?>



<section class="page_header" id="row-1">
    <div class="fade_background <?php if($fade_banner) { ?> fade_banner <?php } ?>"
        style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/png/latest-header-image.png'; ?>')';'">
    </div>
    <div class="container">
        <div class="page_header_title_wrap">
            <h1 class="page_title">Archive</h1>
            <a href="#row-2">
                <img class="scroll_arrow"
                    src="<?php echo get_template_directory_uri() . '/assets/images/svg/arrow-down.svg'; ?>">
            </a>
        </div>
        <div class="fade_trigger"></div>
        <?php if($page_header_image) { ?>
        <div class="page_header_image" style="background-image: url('<?php echo $page_header_image; ?>')">
        </div>
        <?php } ?>
    </div>

</section>


<div class="full_width">
    <div class="container blog_loop">


        <?php
        if(!empty($loop)) {
            if ( $loop->have_posts() ): ?>
        <div class="post_wrapper">
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php get_template_part('components/includes/post-wrap'); ?>
            <?php endwhile; ?>
        </div>
        <?php else: ?>
        <h2>No posts to display</h2>
        <?php endif;
        } else {

            if ( have_posts() ): ?>
        <div class="post_loop">
            <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part('components/includes/post-wrap'); ?>

            <?php endwhile; ?>
        </div>
        <?php else: ?>
        <h2>No posts to display</h2>
        <?php endif; } ?>

        <div class="clear"></div>

    </div>
</div>
</div>


<?php
if(empty($loop)) {
    ?>
<div class="full_width">
    <div class="container blog_loop">

        <div class="navigation p-top-5">
            <div class="alignleft prev_butt">
                <h3><em><?php previous_posts_link( 'Previous Page' ); ?></em></h3>
            </div>
            <div class="alignright next_butt">
                <h3><em><?php next_posts_link( 'Next Page', '' ); ?></em></h3>
            </div>
        </div>

    </div>
</div>
<?php
}
?>



<?php get_footer(); ?>