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
get_header(); ?>

<section class="page_header" id="row-<?php echo $row; ?>">
    <div class="fade_background <?php if($fade_banner) { ?> fade_banner <?php } ?>"
        style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/svg/'; ?>');"></div>
    <div class="container">
        <div class="page_header_title_wrap">
            <div class="title_wrap">
                <h1 class="page_title">Publications</h1>
                <!-- <?php if($subtitle) { ?> <p class="subtitle"><?php echo $subtitle; ?></p> <?php } ?> -->
            </div>
            <a href="#row-2">
                <img class="scroll_arrow"
                    src="<?php echo get_template_directory_uri() . '/assets/images/svg/arrow-down.svg'; ?>">
            </a>
        </div>
        <div class="fade_trigger"></div>
        <div class="page_header_image"
            style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/jpeg/mussels.jpg'; ?>');">
        </div>
    </div>
</section>

<section class="pub_loop">
    <div class="port_sort container">
        <div class="cat_loop">
            <?php
                    $cat_loop = new WP_Query( array( 'cat' => $ct_id, 'posts_per_page' => -1 ) );
                    $port_cats = array();
                    while ( $cat_loop->have_posts() ) : $cat_loop->the_post();
                        $single_cat = get_the_category();
                        foreach ($single_cat as $sc) {
                            // Exclude 'Uncategorized' category by name
                                if ($sc->cat_name !== 'Uncategorised') {
                                    array_push($port_cats, $sc->cat_name);
                            }
                        }
                    endwhile; wp_reset_query();

                    $port_cats = array_unique($port_cats);
                    echo '<a class="category-all active">All</a>';
                    foreach ($port_cats as $port_cat) {
                        $ct_id = get_cat_ID($port_cat);
                        echo '<a class="category-' . sanitize_title($port_cat) . '">' . get_the_category_by_ID( $ct_id ) . '</a>';
                    }
                    // Add a link for "All Categories"

                    ?>
        </div>
    </div>

    <div class="container">
        <div class="pub_wrap">
            <?php
			if( have_posts() ) {
			  while( have_posts() ) {
				the_post();
				?>
            <?php 
                    $description = get_field('short_description');
                    $download = get_field('download');
				?>

            <div
                class="flex_wrap <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?>">
                <div class="cat_col">
                    <?php
                        $categories = get_the_category();
                        $separator = ' ';
                        $output = '';
                        if ( ! empty( $categories ) ) {
                            foreach( $categories as $category ) {
                                $output .= '<a class="btn_fourth ' . esc_html( $category->name ) . '" href="' . esc_url($download) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                            }
                            echo trim( $output, $separator );
                        }
                    ?>
                </div>
                <div class="pub_title">
                    <h4 class="post-title"><?php the_title(); ?></h4>
                </div>
                <div class="description">
                    <p><?php echo $description; ?></p>
                </div>
                <div class="down_butt">
                    <a href="<?php echo $download; ?>" download>Download <svg xmlns="http://www.w3.org/2000/svg"
                            width="11.135" height="11.135" viewBox="0 0 11.135 11.135">
                            <path id="Icon_open-data-transfer-download" data-name="Icon open-data-transfer-download"
                                d="M4.175,0V4.175H1.392L5.567,8.351,9.743,4.175H6.959V0ZM0,9.743v1.392H11.135V9.743Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <?php
			  }
			}
			?>


        </div>
        <div class="navigation">
            <div class="alignleft prev_butt">
                <h4><em><?php previous_posts_link( 'Previous Page' ); ?></em></h4>
            </div>
            <div class="alignright next_butt">
                <h4><em><?php next_posts_link( 'Next Page', '' ); ?></em></h4>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>