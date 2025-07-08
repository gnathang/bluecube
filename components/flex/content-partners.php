<?php 

$row = get_row_index() - 0;

$title = get_sub_field('title'); 

?>

<section class="section_partners fade-in" id="row-<?php echo $row; ?>">

    <div class="container">
        <h3 class=""><?php echo $title; ?></h3>
        <div class="">
            <div class="partners_wrap slider continuous">
                <?php if(have_rows('partners_list')) : while(have_rows('partners_list')) : the_row(); ?>
                <?php $partner_logo = get_sub_field('partner_logo'); ?>
                <img src="<?php echo $partner_logo; ?>" alt="Blue Cube Associated Partenr">
                <?php   
                wp_reset_postdata(); 
                endwhile;
                endif; 
                ?>
            </div>
            <?php    /*        <div class="partners_wrap">
                <div class="partners_list">
                    <?php if(have_rows('partners_list')) : while(have_rows('partners_list')) : the_row(); ?>
            <?php $partner_logo = get_sub_field('partner_logo'); ?>
            <img src="<?php echo $partner_logo; ?>" alt="Blue Cube Associated Partenr">
            <?php   
                wp_reset_postdata(); 
                endwhile;
                endif; 
                ?>
        </div>
    </div>
    <div class="partners_wrap_clone">
        <div class="partners_list">
            <?php if(have_rows('partners_list')) : while(have_rows('partners_list')) : the_row(); ?>
            <?php $partner_logo = get_sub_field('partner_logo'); ?>
            <img src="<?php echo $partner_logo; ?>" alt="Blue Cube Associated Partenr">
            <?php   
                wp_reset_postdata(); 
                endwhile;
                endif; 
                ?>
        </div>
    </div> */ ?>
    </div>
    </div>

</section>