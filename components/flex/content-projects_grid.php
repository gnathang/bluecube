<?php 

$row = get_row_index() - 0;

    $projects_title = get_sub_field('projects_title');
    $see_all_link = get_sub_field('see_all_link');
    $latest_or_selected = get_sub_field('latest_or_selected');
    $column_count = get_sub_field('column_count');
    $add_featured_project = get_sub_field('add_featured_project');

?>

<section class="section_projects_grid fade-in" id="row-<?php echo $row; ?>">
    <div class="container">
        <?php if($projects_title) {?>
        <div class="title_wrap ">
            <h3 class="title two_col_text_title"><?php echo $projects_title; ?></h3>
            <a href="/our-projects/" class="btn_fourth">View All</a>
        </div>
        <?php } ?>
        <div
            class="projects_grid <?php if($column_count == true) { ?> three_columns <?php } else { ?> two_columns <?php } ?> <?php if ($add_featured_project == true) { ?> featured_project <?php } ?>">

            <?php if ($latest_or_selected){ ?>
            <?php if( have_rows('selected_projects') ): ?>

            <?php while( have_rows('selected_projects') ): the_row(); ?>
            <?php
                    $post_object = get_sub_field('project');
                    ?>
            <?php if( $post_object ): 
                        $post = $post_object;
                        setup_postdata( $post );
                    ?>
            <?php $location = get_field('location'); ?>
            <?php $overview = get_field('overview'); ?>
            <?php $make_featured = get_sub_field('make_featured'); ?>
            <div class="project_wrap <?php if ($make_featured) { ?> featured <?php } ?>">
                <a class="remove_hov_effect text_link" href="<?php the_permalink(); ?>">
                    <div class="image_wrap"
                        style="<?php if (has_post_thumbnail()) { ?> background-image: url('<?php the_post_thumbnail_url();?>'); <?php } else { ?> background: grey <?php } ?>;">
                    </div>
                    <div class="text_wrapper">
                        <div class="text_title_wrapper">
                            <h3 class=""><?php the_title(); ?></h3>
                            <p class="divider">|</p>
                            <p class="date"><?php the_date(); ?></p>
                            <!-- <p class="divider">|</p> -->
                            <div class="partners_wrap">
                                <?php if($location) { ?> <h6><?php echo $location; ?></h6> <?php } ?>
                                <?php if (have_rows('partners')) : while (have_rows('partners')) : the_row(); ?>
                                <?php $partner = get_sub_field('partner'); ?>
                                <h6><?php echo $partner; ?></h6>
                                <?php endwhile; endif; ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="read_more btn_default">Read
                                more</a>
                        </div>
                        <div class="text_body_wrapper">
                            <p><?php echo $overview; ?></p>
                            <!-- <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/arrow-right.svg'; ?>"> -->
                        </div>
                    </div>
                </a>
            </div>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
            <?php endwhile; ?>
            <!-- <a href="/projects/" class="btn_fourth">View All</a> -->
            <?php endif; ?>



            <?php } else { ?>
            <?php $args = array(
                'post_type' => 'project',
                'posts_per_page' => '3',
                'order' => 'DSC',
                );
                $loop = new WP_Query( $args );
                ?>
            <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
            <?php $location = get_field('location'); ?>
            <?php $overview = get_field('overview'); ?>
            <div class="project_wrap">
                <a class="remove_hov_effect" href="<?php the_permalink(); ?>">
                    <div class="image_wrap"
                        style="<?php if (has_post_thumbnail()) { ?> background-image: url('<?php the_post_thumbnail_url();?>'); <?php } else { ?> background: grey <?php } ?>;">
                    </div>
                    <div class="text_wrapper">
                        <div class="text_title_wrapper">
                            <h3 class=""><?php the_title(); ?></h3>
                            <p class="divider">|</p>
                            <p><?php the_date(); ?></p>
                            <p class="divider">|</p>
                            <h6><?php echo $location; ?></h6>
                            <?php if (have_rows('partners')) : while (have_rows('partners')) : the_row(); ?>
                            <?php $partner = get_sub_field('partner'); ?>
                            <h6><?php echo $partner; ?></h6>
                            <?php endwhile; endif; ?>
                        </div>
                        <div class="text_body_wrapper">
                            <p><?php echo $overview; ?></p>
                            <a href="<?php the_permalink(); ?>" class="read_more btn_default">Read
                                more</a>
                            <!-- <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/arrow-right.svg'; ?>"> -->
                        </div>
                    </div>
                </a>
            </div>

            <?php wp_reset_postdata(); ?>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php } ?>

        </div> <!-- ! projects grid -->
    </div> <!-- container -->
</section>