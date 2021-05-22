<?php
/*
Template Name: Gift Card Disclaimer Template
*/
	
get_header(); ?>

<div id="page" class="template__gift-card-disclaimer">
    <div id="post-<?php the_ID(); ?>" class="page-content-wrapper" >

        <?php 
        if( have_rows('gift_card_disclaimer') ): ?>

            <?php // Loop through gift card disclaimer rows
            while ( have_rows('gift_card_disclaimer') ) : the_row();

                // CASE: Headline layout
                if( get_row_layout() == 'headlines' ):
                    $page_headline = get_sub_field('headline'); ?>  
                    <div class="page-headline">
                        <h3 class="page-content-container"><?php echo $page_headline ?></h3>
                    </div>


                <?php // CASE: Instructions layout
                elseif( get_row_layout() == 'instructions' ): ?>  
                    
                    <?php if( have_rows('instruction') ): ?>
                    <section class="instructions page-content-container">

                        <?php while( have_rows('instruction') ) : the_row(); ?>
                        
                            <div class="instructions__step-container">
                                <img src="<?php echo get_sub_field('instruction_image')['url']; ?>" alt="" class="instructions__step-container--img">
                                <h3 class="instructions__step-container--headline"><?php echo get_sub_field('instruction_headline'); ?></h3>
                                <p class="instructions__step-container--text"><?php echo get_sub_field('instruction_content'); ?></p>
                            </div>

                            <div class="instructions__vertical-line"></div>
                            
                        <?php endwhile; ?>

                    </section>
                    <?php endif; ?>


                <?php // CASE: Wysiwyg layout
                elseif( get_row_layout() == 'wysiwyg' ): ?> 
                    <div class="wysiwyg-container page-content-container">
                        <?php echo get_sub_field('wysiwyg'); ?>
                    </div>


                <?php // CASE: Participating Merchants layout
                elseif( get_row_layout() == 'participating_merchants' ): ?> 
                    <section class="participating-merchants__container">

                        <?php if( get_sub_field('merchant_section_headline') ): ?>
                        <div class="page-headline">
                            <h3 class="page-content-container"><?php echo get_sub_field('merchant_section_headline'); ?></h3>
                        </div>
                        <?php endif; ?>
                        
                        <?php // Parent Repeater
                        if( have_rows('merchant_category') ):
                            while( have_rows('merchant_category') ) : the_row();

                            if( get_sub_field('merchant_category_headline') ): ?>
                            <div class="merchants__category-headline">
                                <h3 class="page-content-container"><?php echo get_sub_field('merchant_category_headline'); ?></h3>
                            </div>
                            <?php endif; ?>

                            <?php // Child Repeater
                            if( have_rows('merchant_image_repeater') ):?>
                                <div class="merchants__image-container page-content-container">

                                <?php while( have_rows('merchant_image_repeater') ) : the_row();?>
                                    <img class="merchants__image-container--img" src="<?php echo get_sub_field('merchant_image')['url']; ?>">
                                <?php endwhile; ?>

                                </div>
                            <?php endif; 
                            endwhile; ?>

                            <?php // Trailing Button
                            if( have_rows('merchant_cta') ): ?>
                            <div class="btn-container">

                                <?php while( have_rows('merchant_cta') ) : the_row(); ?>
                                <a href="<?php echo get_sub_field('merchant_cta_link'); ?>" class="btn"><?php echo get_sub_field('merchant_cta_text'); ?></a>
                                <?php endwhile ?>

                            </div>
                            <?php endif; ?>   

                        <?php endif; ?>
                    </section>
                    


                <?php endif;  // End Cases If Statement

            endwhile; // End Gift Card While loop

        else : echo '<p>Please add some content to the page!</p>'; // If user hasn't input content
        
        endif; // End Gift Card If Statement ?>    
    
    </div> <!-- End page content wrapper -->
</div> <!-- End .template__gift-card-disclaimer -->

<?php get_footer();