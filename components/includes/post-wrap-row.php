<?php  if( get_field('post_type') == 'externallink' ) { ?>

<?php $description = get_field('short_description'); ?>
<?php $externalurl = get_field('external_url'); ?>

<div class="flex_wrap_search">
    <div class="bottom_wrap">
        <div class="cat_butt">
            <?php if ( get_post_type() === 'post' ) { ?>
            <a class="btn_fourth news_butt" href="/news/">News</a>
            <?php } elseif ( get_post_type() === 'event' ) { ?>
            <a class="btn_fourth events_butt" href="/events/">Events</a>
            <?php } elseif ( get_post_type() === 'view' ) { ?>
            <a class="btn_fourth views_butt" href="/views/">Views</a>
            <?php } else { ?>
            <p class="btn_fourth"><?php printf( __( '%s', 'textdomain' ), get_post_type( get_the_ID() ) ); ?></p>
            <?php } ?>
        </div>
    </div>

    <div class="pub_title">
        <h4 class="post-title"><?php the_title(); ?></h4>
    </div>

    <div class="details">
        <?php the_time( 'F jS, Y' ); ?>
    </div>

    <div class="description">
        <p><?php echo $description; ?></p>
    </div>

    <div class="cat_col">
        <?php
            // $categories = get_the_category();
            // $separator = ' ';
            // $output = '';
            // if ( ! empty( $categories ) ) {
            //     foreach( $categories as $category ) {
            //         $output .= '<p class="btn_fourth ' . esc_html( $category->name ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</p>' . $separator;
            //     }
            //     echo trim( $output, $separator );
            // }
        ?>
        <a class="btn_fourth" href="<?php the_permalink(); ?>">Visit</a>
    </div>
</div>

<?php } elseif( get_field('post_type') == 'simplepost' ) { ?>

<div class="flex_wrap_search">
    <div class="bottom_wrap">
        <div class="cat_butt">
            <?php if ( get_post_type() === 'post' ) { ?>
            <a class="btn_fourth news_butt" href="/news/">News</a>
            <?php } elseif ( get_post_type() === 'event' ) { ?>
            <a class="btn_fourth events_butt" href="/events/">Events</a>
            <?php } elseif ( get_post_type() === 'view' ) { ?>
            <a class="btn_fourth views_butt" href="/views/">Views</a>
            <?php } else { ?>
            <p class="btn_fourth"><?php printf( __( '%s', 'textdomain' ), get_post_type( get_the_ID() ) ); ?></p>
            <?php } ?>
        </div>
    </div>

    <div class="pub_title">
        <h4 class="post-title"><?php the_title(); ?></h4>
    </div>

    <div class="details">
        <?php the_time( 'F jS, Y' ); ?>
    </div>

    <div class="description">
        <p><?php echo $description; ?></p>
    </div>

    <div class="cat_col">
        <?php
            // $categories = get_the_category();
            // $separator = ' ';
            // $output = '';
            // if ( ! empty( $categories ) ) {
            //     foreach( $categories as $category ) {
            //         $output .= '<p class="btn_fourth ' . esc_html( $category->name ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</p>' . $separator;
            //     }
            //     echo trim( $output, $separator );
            // }
        ?>
        <a class="btn_fourth" href="<?php the_permalink(); ?>">Visit</a>
    </div>
</div>


<?php } elseif( get_field('post_type') == 'flexpost' ) { ?>

<div class="flex_wrap_search">
    <div class="bottom_wrap">
        <div class="cat_butt">
            <?php if ( get_post_type() === 'post' ) { ?>
            <a class="btn_fourth news_butt" href="/news/">News</a>
            <?php } elseif ( get_post_type() === 'event' ) { ?>
            <a class="btn_fourth events_butt" href="/events/">Events</a>
            <?php } elseif ( get_post_type() === 'view' ) { ?>
            <a class="btn_fourth views_butt" href="/views/">Views</a>
            <?php } else { ?>
            <p class="btn_fourth"><?php printf( __( '%s', 'textdomain' ), get_post_type( get_the_ID() ) ); ?></p>
            <?php } ?>
        </div>
    </div>

    <div class="pub_title">
        <h4 class="post-title"><?php the_title(); ?></h4>
    </div>

    <div class="details">
        <?php the_time( 'F jS, Y' ); ?>
    </div>

    <div class="description">
        <p><?php echo $description; ?></p>
    </div>

    <div class="cat_col">
        <?php
            // $categories = get_the_category();
            // $separator = ' ';
            // $output = '';
            // if ( ! empty( $categories ) ) {
            //     foreach( $categories as $category ) {
            //         $output .= '<p class="btn_fourth ' . esc_html( $category->name ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</p>' . $separator;
            //     }
            //     echo trim( $output, $separator );
            // }
        ?>
        <a class="btn_fourth" href="<?php the_permalink(); ?>">Visit</a>
    </div>
</div>

<?php } else { ?>

<?php $description = get_field('short_description'); ?>

<div class="flex_wrap_search">
    <div class="bottom_wrap">
        <div class="cat_butt">
            <?php if ( get_post_type() === 'post' ) { ?>
            <a class="btn_fourth news_butt" href="/news/">News</a>
            <?php } elseif ( get_post_type() === 'event' ) { ?>
            <a class="btn_fourth events_butt" href="/events/">Events</a>
            <?php } elseif ( get_post_type() === 'view' ) { ?>
            <a class="btn_fourth views_butt" href="/views/">Views</a>
            <?php } else { ?>
            <p class="btn_fourth"><?php printf( __( '%s', 'textdomain' ), get_post_type( get_the_ID() ) ); ?></p>
            <?php } ?>
        </div>
    </div>

    <div class="pub_title">
        <h4 class="post-title"><?php the_title(); ?></h4>
    </div>

    <div class="details">
        <?php the_time( 'F jS, Y' ); ?>
    </div>

    <div class="description">
        <p><?php echo $description; ?></p>
    </div>

    <div class="cat_col">
        <?php
            // $categories = get_the_category();
            // $separator = ' ';
            // $output = '';
            // if ( ! empty( $categories ) ) {
            //     foreach( $categories as $category ) {
            //         $output .= '<p class="btn_fourth ' . esc_html( $category->name ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</p>' . $separator;
            //     }
            //     echo trim( $output, $separator );
            // }
        ?>
        <a class="btn_fourth" href="<?php the_permalink(); ?>">Visit</a>
    </div>
</div>



<?php } ?>