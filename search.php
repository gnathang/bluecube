<?php get_header(); 

$row = get_row_index() - 1;


$post = '';
        $s=get_search_query();

        $search = $_SERVER['REQUEST_URI'];

        $search = explode('=' , $search);
        $search = str_replace('+', ' ' , $search);

        $args = array(
            'post_type' => array('post', 'page', 'Events', 'Downloads' , 'Team Members'),
            'post_status' => 'publish',
            's' => $s
        );

        ?>

<section class="page_header_search" id="row-1">
    <div class="fade_background <?php if($fade_banner) { ?> fade_banner <?php } ?>"
        style="<?php if ($fade_banner) { ?> background-image: url('<?php echo $fade_banner; ?>'); <?php } ?>"></div>
    <div class="container">
        <div class="page_header_title_wrap">
            <h1 class="page_title">Search results for: <?php echo get_query_var('s') ?></h1>
            <!-- <a href="#row-2">
                <img class="scroll_arrow"
                    src="<?php echo get_template_directory_uri() . '/assets/images/svg/arrow-down.svg'; ?>">
            </a> -->
        </div>
        <div class="fade_trigger"></div>
        <?php if($page_header_image) { ?>
        <div class="page_header_image" style="background-image: url('<?php echo $page_header_image; ?>')">
        </div>
        <?php } ?>
    </div>

</section>


<div class="full_width">
    <div class="container blog_loop search">
        <?php 
        if ( have_posts() ) { ?>
        <div class="pub_wrap">
            <?php while ( have_posts() ) {
                the_post(); ?>

            <?php get_template_part('components/includes/post-wrap-row'); ?>

            <?php  } // end while ?>
        </div>
        <?php } else { ?>
        <h2>No results found...sorry.</h2>
        <?php } // end if
        ?>

        <div class="clear"></div>

    </div>
</div>
</div>





<?php get_footer(); ?>