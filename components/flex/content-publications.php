<?php
$row = get_row_index() - 0;

$title = get_sub_field('title');
$subtitle = get_sub_field('content');

// end
?>

<section class="full_width publications pub_loop fade-in " id="row-<?php echo $row; ?>">
    <div class="container">
        <div class="flex_between col_header">
            <?php if($title) {?><h3 class=""><?php echo $title; ?></h3><?php }?>
            <?php if($subtitle) {?><p><?php echo $subtitle; ?></p><?php }?>
        </div>


        <div class="port_sort">
            <div class="cat_loop">
                <?php
                    $port_cats = get_categories(); // Get all categories

                    // Create an array to store the category IDs to exclude
                    $exclude_ids = array();

                    foreach ($port_cats as $cat) {
                        // Exclude 'Uncategorized' category by name
                        if ($cat->name !== 'Uncategorised') {
                            $exclude_ids[] = $cat->term_id;
                        }
                    }

                    $args = array(
                        'post_type' => 'post', // Adjust the post type if needed
                        'posts_per_page' => -1,
                        'category__not_in' => $exclude_ids, // Exclude categories by their IDs
                    );

                    $cat_loop = new WP_Query($args);

                    echo '<a class="category-all active">All</a>';
                    foreach ($port_cats as $cat) {
                        echo '<a class="category-' . sanitize_title($cat->name) . '">' . esc_html($cat->name) . '</a>';
                    }
                    ?>
            </div>

        </div>

        <div class="pub_wrap">

            <?php if( have_rows('publications_repeater') ): ?>

            <?php while( have_rows('publications_repeater') ): the_row(); ?>
            <?php
                $post_object = get_sub_field('publications');
            ?>
            <?php if( $post_object ): 
                  $post = $post_object;
                  setup_postdata( $post );
            ?>
            <?php 
                $description = get_field('short_description');
                $download = get_field('download');
            ?>


            <!-- getting the category name  -->
            <div
                class="flex_wrap <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?> ">
                <div class="cat_col">
                    <?php
                        $categories = get_the_category();
                        $separator = ' ';
                        $output = '';
                        if ( ! empty( $categories ) ) {
                            foreach( $categories as $category ) {
                                // turn these back into a tags when we want to
                                $output .= '<a class="btn_fourth ' . esc_html( $category->name ) . '" href="' . esc_url($download) . '">' . esc_html( $category->name ) . '</a>' . $separator;
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
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
            <?php endwhile; ?>
            <!-- <a href="/publications/" class="btn_fourth">View All</a> -->
            <?php endif; ?>

        </div>
    </div>
</section>