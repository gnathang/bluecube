<?php /**
 * Template Name: News Page
*/
?>
<?php get_header(); 

$title = get_field('page_title');
$subtitle = get_field('page_header_content');
$image = get_field('page_image');
$selectpost = get_field('post_type_selector');


// end
?>

<section class="page_header" id="row-1">
    <div class="fade_background fade_banner"
        style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/png/latest-header-image.png'; ?>');">
    </div>
    <div class="container">
        <div class="page_header_title_wrap">
            <div class="title_wrap news_wrap">
                <p class="newstitle">Latest</p>
                <h1 class="page_title">News, Views and Events</h1>
            </div>
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


<div>
    <?php get_template_part('components/flex/content'); ?>

</div>

<!-- <section class="full_width staggered_section " id="row-<?php echo $row; ?>">

    <div class="full_width stag_trig stag_trig_<?php echo $rowcount; ?> seagreen">
        <div class="container">
            <div class="flex_start">
                <h2 class="title">Featured News</h2>
            </div>

            <div class="flex_wrap feat_news">
                <?php 
                    $post_object = get_field('featured');
                    if( $post_object ):
                    $post = $post_object;
                    setup_postdata( $post );
                ?>
                <div class="image_wrap">
                    <?php $thumb = get_post_thumbnail_id(); ?>
                    <?php $bannerArgs = array(
								'class' => '' ,
								'id' => $thumb,
								'lazyload' => false
							);
							
						echo build_srcset('landscape', $bannerArgs); ?>
                </div>
                <div class="post_box">
                    <div class="flex_between">
                        <?php
								foreach((get_the_category()) as $category) {
									$postcat= $category->cat_ID;
									$catname =$category->cat_name;
								}
							?>
                        <p class="post_cat"><?php echo $catname;?></p>
                        <p><?php the_time( 'F jS, Y' ); ?></p>
                    </div>
                    <h2><?php the_title(); ?></h2>
                    <?php  if( get_field('post_type') == 'externallink' ) { ?>

                    <?php $externalurl = get_field('external_url'); ?>
                    <a class="btn_second" href="<?php echo $externalurl; ?>" target="_blank">Read More</a>
                    <?php } elseif( get_field('post_type') == 'simplepost' ) { ?>
                    <a class="btn_second" href="<?php the_permalink(); ?>">Read More</a>
                    <?php } elseif( get_field('post_type') == 'flexpost' ) { ?>
                    <a class="btn_second" href="<?php the_permalink(); ?>">Read More</a>
                    <?php } else{ ?>
                    <a class="btn_second" href="<?php the_permalink(); ?>">Read More</a>
                    <?php } ?>

                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="54.484" height="54.484" viewBox="0 0 54.484 54.484">
                    <path id="Path_54102" data-name="Path 54102" d="M8.121,0,0,8.557H30.187V38.744l8.121-8.557V0Z"
                        transform="translate(27.396) rotate(45)" fill="#edede4" />
                </svg>

                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>

            </div>

        </div>
    </div>

</section> -->


<?php $pass_masterPost = get_post();
if ( post_password_required(  $pass_masterPost->ID ) ) { ?>
<div class="full_width">
    <div class="container ">

        <?php echo get_the_password_form(); 
		    echo '<p>THIS POST IS PASSWORD PROTECTED: PLEASE ENTER IT!</p>'; ?>

    </div>
</div>
<?php } else { ?>


<section class="full_width">
    <div class="container blog_loop">

        <!-- put this back in if we end up using the views and events again -->

        <!-- <div class="port_sort">
            <div class="cat_loop">
                <a class="cat_all active">All</a>
                <a class="cat_news">News</a>
                <a class="cat_views">Views</a>
                <a class="cat_events">Events</a>

                <?php
                // $cat_loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => -1 /*, 'orderby' => 'date', 'order' => 'ASC' */ ) );
                // $port_cats = array();
                // while ( $cat_loop->have_posts() ) : $cat_loop->the_post();
                //     $single_cat = get_the_category();
                //     foreach ($single_cat as $sc) {
                //         array_push($port_cats,$sc->cat_name);
                //     }
                // endwhile; wp_reset_query();

                // $port_cats = array_unique($port_cats);

                // foreach ($port_cats as $port_cat) {
                //     $ct_id = get_cat_ID($port_cat);
                //     echo ' <a class="cat_'.get_the_category_by_ID( $ct_id ).'" href="'.esc_url( add_query_arg( 'designdough-blogs', $port_cat ) ).'">'.get_the_category_by_ID( $ct_id ).'</a> ';
                // }
                ?>
            </div>
        </div> -->


        <div class="loop_all  active">
            <div class="post_loop">

                <?php global $paged;
				$curpage = $paged ? $paged : 1;
				$args = array(
                    // put this back in if we end up using the views and events again
					// 'post_type' => array('post', 'view', 'event'),
                    'post_type' => array('post'),
					'orderby' => 'post_date',
					'posts_per_page' => 12,
					'paged' => $paged
				);
				$query = new WP_Query($args);
				if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
				?>

                <?php get_template_part('components/includes/post-wrap'); ?>

                <?php endwhile; ?>
            </div>

            <?php echo '
				<div id="wp_pagination">
					<a class="first page button" href="'.get_pagenum_link(1).'">First Page</a>
					<a class="previous page button" href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'"><svg xmlns="http://www.w3.org/2000/svg" width="21.022" height="14.839" viewBox="0 0 21.022 14.839">
						<path id="Icon_material-arrow-forward" data-name="Icon material-arrow-forward" d="M9.6,6,8.295,7.308l5.175,5.184H-4v1.855H13.47L8.295,19.531,9.6,20.839l7.419-7.419Z" transform="translate(17.022 20.839) rotate(180)" fill="#613ca7"/>
					</svg>
					</a>';
					for($i=1;$i<=$query->max_num_pages;$i++)
						echo '<a class="'.($i == $curpage ? 'active ' : '').'page button" href="'.get_pagenum_link($i).'">'.$i.'</a>';
					echo '
					<a class="next page button" href="'.get_pagenum_link(($curpage+1 <= $query->max_num_pages ? $curpage+1 : $query->max_num_pages)).'"><svg xmlns="http://www.w3.org/2000/svg" width="21.022" height="14.839" viewBox="0 0 21.022 14.839">
						<path id="Icon_material-arrow-forward" data-name="Icon material-arrow-forward" d="M9.6,6,8.295,7.308l5.175,5.184H-4v1.855H13.47L8.295,19.531,9.6,20.839l7.419-7.419Z" transform="translate(4 -6)" fill="#613ca7"/>
					</svg>
					</a>
					<a class="last page button" href="'.get_pagenum_link($query->max_num_pages).'">Last Page</a>
				</div>
				';
				wp_reset_postdata();
			endif; ?>

        </div>

        <div class="loop_news">

            <div class="post_loop">

                <?php global $paged;
				$curpage = $paged ? $paged : 1;
				$args = array(
					'post_type' => array('post'),
					'orderby' => 'post_date',
					'posts_per_page' => 12,
					'paged' => $paged
				);
				$query = new WP_Query($args);
				if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
				?>

                <?php get_template_part('components/includes/post-wrap'); ?>

                <?php endwhile; ?>
            </div>

            <?php echo '
				<div id="wp_pagination">
					<a class="first page button" href="'.get_pagenum_link(1).'">First Page</a>
					<a class="previous page button" href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'"><svg xmlns="http://www.w3.org/2000/svg" width="21.022" height="14.839" viewBox="0 0 21.022 14.839">
						<path id="Icon_material-arrow-forward" data-name="Icon material-arrow-forward" d="M9.6,6,8.295,7.308l5.175,5.184H-4v1.855H13.47L8.295,19.531,9.6,20.839l7.419-7.419Z" transform="translate(17.022 20.839) rotate(180)" fill="#613ca7"/>
					</svg>
					</a>';
					for($i=1;$i<=$query->max_num_pages;$i++)
						echo '<a class="'.($i == $curpage ? 'active ' : '').'page button" href="'.get_pagenum_link($i).'">'.$i.'</a>';
					echo '
					<a class="next page button" href="'.get_pagenum_link(($curpage+1 <= $query->max_num_pages ? $curpage+1 : $query->max_num_pages)).'"><svg xmlns="http://www.w3.org/2000/svg" width="21.022" height="14.839" viewBox="0 0 21.022 14.839">
						<path id="Icon_material-arrow-forward" data-name="Icon material-arrow-forward" d="M9.6,6,8.295,7.308l5.175,5.184H-4v1.855H13.47L8.295,19.531,9.6,20.839l7.419-7.419Z" transform="translate(4 -6)" fill="#613ca7"/>
					</svg>
					</a>
					<a class="last page button" href="'.get_pagenum_link($query->max_num_pages).'">Last Page</a>
				</div>
				';
				wp_reset_postdata();
			endif; ?>
        </div>


        <div class="loop_view">
            <div class="post_loop">

                <?php global $paged;
			$curpage = $paged ? $paged : 1;
			$args = array(
				'post_type' => array('view'),
				'orderby' => 'post_date',
				'posts_per_page' => 12,
				'paged' => $paged
			);
			$query = new WP_Query($args);
			if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
			?>

                <?php get_template_part('components/includes/post-wrap'); ?>

                <?php endwhile; ?>
            </div>

            <?php echo '
			<div id="wp_pagination">
				<a class="first page button" href="'.get_pagenum_link(1).'">First Page</a>
				<a class="previous page button" href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'"><svg xmlns="http://www.w3.org/2000/svg" width="21.022" height="14.839" viewBox="0 0 21.022 14.839">
					<path id="Icon_material-arrow-forward" data-name="Icon material-arrow-forward" d="M9.6,6,8.295,7.308l5.175,5.184H-4v1.855H13.47L8.295,19.531,9.6,20.839l7.419-7.419Z" transform="translate(17.022 20.839) rotate(180)" fill="#613ca7"/>
				</svg>
				</a>';
				for($i=1;$i<=$query->max_num_pages;$i++)
					echo '<a class="'.($i == $curpage ? 'active ' : '').'page button" href="'.get_pagenum_link($i).'">'.$i.'</a>';
				echo '
				<a class="next page button" href="'.get_pagenum_link(($curpage+1 <= $query->max_num_pages ? $curpage+1 : $query->max_num_pages)).'"><svg xmlns="http://www.w3.org/2000/svg" width="21.022" height="14.839" viewBox="0 0 21.022 14.839">
					<path id="Icon_material-arrow-forward" data-name="Icon material-arrow-forward" d="M9.6,6,8.295,7.308l5.175,5.184H-4v1.855H13.47L8.295,19.531,9.6,20.839l7.419-7.419Z" transform="translate(4 -6)" fill="#613ca7"/>
				</svg>
				</a>
				<a class="last page button" href="'.get_pagenum_link($query->max_num_pages).'">Last Page</a>
			</div>
			';
			wp_reset_postdata();
			endif; ?>

        </div>


        <div class="loop_event">
            <div class="post_loop">

                <?php global $paged;
			$curpage = $paged ? $paged : 1;
			$args = array(
				'post_type' => array('event'),
				'orderby' => 'post_date',
				'posts_per_page' => 12,
				'paged' => $paged
			);
			$query = new WP_Query($args);
			if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
			?>

                <?php get_template_part('components/includes/post-wrap'); ?>

                <?php endwhile; ?>
            </div>

            <?php echo '
			<div id="wp_pagination">
				<a class="first page button" href="'.get_pagenum_link(1).'">First Page</a>
				<a class="previous page button" href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'"><svg xmlns="http://www.w3.org/2000/svg" width="21.022" height="14.839" viewBox="0 0 21.022 14.839">
					<path id="Icon_material-arrow-forward" data-name="Icon material-arrow-forward" d="M9.6,6,8.295,7.308l5.175,5.184H-4v1.855H13.47L8.295,19.531,9.6,20.839l7.419-7.419Z" transform="translate(17.022 20.839) rotate(180)" fill="#613ca7"/>
				</svg>
				</a>';
				for($i=1;$i<=$query->max_num_pages;$i++)
					echo '<a class="'.($i == $curpage ? 'active ' : '').'page button" href="'.get_pagenum_link($i).'">'.$i.'</a>';
				echo '
				<a class="next page button" href="'.get_pagenum_link(($curpage+1 <= $query->max_num_pages ? $curpage+1 : $query->max_num_pages)).'"><svg xmlns="http://www.w3.org/2000/svg" width="21.022" height="14.839" viewBox="0 0 21.022 14.839">
					<path id="Icon_material-arrow-forward" data-name="Icon material-arrow-forward" d="M9.6,6,8.295,7.308l5.175,5.184H-4v1.855H13.47L8.295,19.531,9.6,20.839l7.419-7.419Z" transform="translate(4 -6)" fill="#613ca7"/>
				</svg>
				</a>
				<a class="last page button" href="'.get_pagenum_link($query->max_num_pages).'">Last Page</a>
			</div>
			';
			wp_reset_postdata();
			endif; ?>
        </div>

    </div>
</section>


<?php if ( get_the_content() ) { ?>
<div class="full_width">
    <div class="container top-fix">
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    </div>
</div>
<?php } else{ ?>

<?php } ?>

<?php } ?>

<?php   $address = get_field('text', 'option');
        $tel = get_field('tel', 'option');
        $email = get_field('email', 'option');
?>


<section class="full_width contact_section fade-in coral" id="row-<?php echo $row; ?>">
    <div class="container">
        <h2 class="title">Contact us</h2>
        <div class="two_col_grid">

            <div class="get_in_touch">
                <h3>GET IN TOUCH WITH OUR TEAM TODAY!</h3>
                <p>To discuss any of our projects, or to speak to us about a development in your
                    area, please feel free to get in touch using the details below. We aim to respond to all messages as
                    soon as possible.</p>
            </div>

            <div class="address">
                <?php if($address) {?><p><?php echo $address; ?><br>
                    <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><br>
                    <?php echo $tel; ?>
                </p><?php }?>

                <?php if($email) {?><p><a class="btn_third" href="mailto:<?php echo $email; ?>">Get in touch</a></p>
                <?php }?>

            </div>

            <div class="clear"></div>

        </div>
    </div>
</section>

<?php get_footer(); ?>