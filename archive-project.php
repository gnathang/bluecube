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



<section class="news_header" id="row-1">
    <div class="fade_background <?php if($fade_banner) { ?> fade_banner <?php } ?>"  style="<?php if ($fade_banner) { ?> background-image: url('<?php echo $fade_banner; ?>'); <?php } ?>" ></div>
    <div class="container">
        <div class="page_header_title_wrap">
            <h2 class="page_title">Projects</h2>
        </div>
        <div class="fade_trigger"></div>
    </div>

</section>

<section class="section_projects_grid">
    <div class="container">
        <div class="projects_grid">
           <?php
			if( have_posts() ) {
			  while( have_posts() ) {
				the_post();
				?>
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
				<?php
			  }
			}
			?>


        </div>
		<div class="navigation">
            <div class="alignleft prev_butt"><h4><em><?php previous_posts_link( 'Previous Page' ); ?></em></h4></div>
            <div class="alignright next_butt"><h4><em><?php next_posts_link( 'Next Page', '' ); ?></em></h4></div>
		</div>
    </div>
            </section>

           
<?php get_footer(); ?>