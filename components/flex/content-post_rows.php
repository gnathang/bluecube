<?php
$row = get_row_index() - 0;

$recent_or_selected = get_sub_field('recent_or_selected_posts');
$chosen_post_type = get_sub_field('chosen_post_type');

$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$page_link = get_sub_field('page_link');


// end
?>

<section class="full_width post_rows_section fade-in" id="row-<?php echo $row; ?>">
    <div class="container">
        <?php if($title) {?>
        <div class="title_wrap">
            <h3 class="title"><?php echo $title; ?></h3>
            <div class="col_right">
                <?php if($subtitle) {?><p class=""><?php echo $subtitle; ?></p><?php }?>
                <?php if($page_link) {?> <a href="<?php echo $page_link; ?>">View all</a><?php }?>
            </div>
        </div>
        <?php }?>
        <div class="post_rows_loop">

            <?php if( get_sub_field('chosen_post_type') == 'publication' ) { ?>
            <?php if( have_rows('selected_posts_publications') ):?>

            <div class="pub_wrap">
                <?php while( have_rows('selected_posts_publications') ): the_row(); ?>
                <?php 
                    $post_object = get_sub_field('post');
                    if( $post_object ):
                    $post = $post_object;
                    setup_postdata( $post );
                ?>
                <?php 
                    $description = get_field('short_description');
                    $download = get_field('download');
                ?>

                <div class="flex_wrap">
                    <div class="cat_col">
                        <?php
                            $categories = get_the_category();
                            $separator = ' ';
                            $output = '';
                            if ( ! empty( $categories ) ) {
                                foreach( $categories as $category ) {
                                    $output .= '<a class="btn_fourth ' . esc_html( $category->name ) . '" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
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
            </div>
            <?php endif; ?>




            <?php } elseif( get_sub_field('chosen_post_type') == 'projects' ) { ?>
            <?php if( have_rows('selected_posts_projects') ): while( have_rows('selected_posts_projects') ): the_row(); ?>
            <?php 
                    $post_object = get_sub_field('post');
                    if( $post_object ):
                    $post = $post_object;
                    setup_postdata( $post );
                ?>
            <?php get_template_part('components/includes/post-wrap'); ?>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>


            <?php } elseif( get_sub_field('chosen_post_type') == 'news' ) { ?>
            <?php if( have_rows('selected_posts_news') ): while( have_rows('selected_posts_news') ): the_row(); ?>
            <?php 
                    $post_object = get_sub_field('post');
                    if( $post_object ):
                    $post = $post_object;
                    setup_postdata( $post );
                ?>
            <?php get_template_part('components/includes/post-wrap'); ?>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>

            <?php } elseif( get_sub_field('chosen_post_type') == 'events' ) { ?>

            <?php if( have_rows('selected_posts_events') ): while( have_rows('selected_posts_events') ): the_row(); ?>
            <?php 
                    $post_object = get_sub_field('post');
                    if( $post_object ):
                    $post = $post_object;
                    setup_postdata( $post );
                ?>
            <?php get_template_part('components/includes/post-wrap'); ?>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
            <?php endwhile; ?>

            <?php endif; ?>
            <?php } else { ?>

            <?php } ?>








        </div>
    </div>

</section>