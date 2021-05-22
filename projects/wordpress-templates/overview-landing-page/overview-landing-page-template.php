<?php
/*
Template Name: Overview Landing Page Template
*/
	
get_header(); ?>

<section id="page" class="program-overview-page">
	<div class="content-container">

		<?php dmh_breadcrumbs(); ?>
		
		<div id="post-<?php the_ID(); ?>">
			<?php if( $fields['show_widget'] ): ?>
			<div class="entry-content">

				<div class="programs-widget programs-widget--interior" data-widget="1" data-program="<?php echo $fields['widget_default_program']; ?>" style="background-image: url(<?php echo get_field('widget_background_image')['url'] ?>);">
					<?php if( !$fields['hide_headline'] ):
						$headline = ( $fields['alternative_headline'] ) ? $fields['alternative_headline'] : get_the_title();
						echo '<h1 class="widget-title">'.$headline.'</h1>';
					endif ?>
					<p class="widget-text"><?php the_field('widget_header_text'); ?></p>
					<div class="widget-columns">
						<div class="widget-column">
							<h3 class="widget-column-title">Select your education program</h3>
							<div class="styled-select">
								<select class="programs-widget-select" data-select="1">
									<option value="">Please Select</option>
								</select>
							</div>
						</div>
						<div class="widget-column">
							<h3 class="widget-column-title">Select your state</h3>
							<div class="styled-select">
								<select class="programs-widget-select" data-select="2"></select>
							</div>
						</div>
						<div class="widget-column">
							<h3 class="widget-column-title">Select your course</h3>
							<div class="styled-select">
								<select class="programs-widget-select" data-select="3"></select>
							</div>
						</div>
						<div class="widget-column">
							<a href="#" class="widget-cta">Go!</a>
						</div>
					</div>
					<?php if( have_rows('widget_icon_group') ): ?>
					<div class="icons-info-container">
						<?php while( have_rows('widget_icon_group') ) : the_row();
							
							$widget_icon = get_sub_field('widget_icon');
							$widget_icon_text = get_sub_field('widget_icon_text'); ?>

							<div class="icon-info-wrap">
								<?php echo $widget_icon; ?>
								<p><?php echo $widget_icon_text; ?></p>
							</div>
						
						<?php endwhile; ?>
					</div>
					<?php endif; ?>
				</div>
				<script src="<?php (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}"; ?>/wp-content/themes/hondros/library/js/homepage-widget.js"></script>
			</div> <!-- end .entry-content -->
			<?php endif ?>
			 
			<!-- Begin page content wrap -->
			<div class="program-overview-template-content">
				
				<div class="po-card-callouts-section-wrap">
					<div class="po-headline">
						<h2><?php the_field('program_overview_headline_1'); ?></h2>
					</div>
					
					<?php if( have_rows('program_overview_card') ): ?>
					<div class="po-cards-callouts-wrap">
						<?php while( have_rows('program_overview_card') ) : the_row(); ?>
						<div class="po-card-callout-wrap">
							<div class="po-card-callout-img">
								<a href="<?php the_sub_field('po_card_cta_link'); ?>">
									<img src="<?php echo get_sub_field('po_card_image')['url']; ?>" alt="">
								</a>
							</div>
							<div class="po-card-callout-headline">
								<a href="<?php the_sub_field('po_card_cta_link'); ?>">
									<h3><?php the_sub_field('po_card_headline'); ?></h3>
								</a>
							</div>
							<div class="po-card-callout-text-content">
								<p><?php the_sub_field('po_card_text'); ?></p>
							</div>
							<div class="po-card-callout-button">
								<a href="<?php the_sub_field('po_card_cta_link'); ?>"><?php the_sub_field('po_card_cta_text'); ?></a>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
					<?php endif; ?>
				</div>

				
				<?php if(get_field('program_overview_headline_2')): ?>
				<div class="two-col-img-txt">
					<div class="po-headline">
						<h2><?php the_field('program_overview_headline_2'); ?></h2>
						<p><?php the_field('program_overview_headline_2_sub-text'); ?></p>
					</div>
					
					<div class="two-col-section-container">
						<div class="two-col-three-img-left">
							<div class="mobile-img-overlay"></div>
							<div class="img-design-wrap">
								<img src="<?php echo get_field('two_column_image_left')['url']; ?>" alt="">
							</div>
							<div class="text-right-wrap">
								<?php echo get_field('two_column_text_right'); ?>
							</div>
						</div>
						
						<div class="two-col-one-img-right">
							<div class="text-left-wrap">
								<?php echo get_field('two_column_text_left'); ?>
							</div>
							<div class="reg-img-container">
								<img class="reg-img" src="<?php echo get_field('two_column_image_right')['url']; ?>" alt="">
							</div>
						</div>
					</div>
					
				</div>
				<?php endif ?>
				
				<!-- Section -->
				<?php if(get_field('program_overview_student_reviews')): ?>
				<div class="student-reviews-section-container">
					<div class="po-headline">
						<h2><?php the_field('program_overview_headline_3'); ?></h2>
						<p><?php the_field('program_overview_headline_3_sub-text'); ?></p>
					</div>
					<div class="student-reviews-wrap">
						<?php echo get_field('program_overview_student_reviews'); ?>
					</div>
				</div>
				<?php endif ?>
				
				<!-- Instructor Section -->
				<?php if(get_field('program_overview_headline_4') && get_field('program_overview_instructor_image_group')): ?>
				<div class="instructor-section-container">
					<div class="instructor-text-wrap">
						<div class="instructor-text-inner-wrap">
							<h2 class="po-headline"><?php the_field('program_overview_headline_4') ?></h2>
							<p class="instructor-text-paragraph"><?php the_field('program_overview_headline_4_sub-text') ?></p>
						</div>
					</div>
					
					<?php if( have_rows('program_overview_instructor_image_group') ): ?>
					<div class="instructor-images-wrap">
						<div class="instructor-images-inner-wrap">
							<?php while( have_rows('program_overview_instructor_image_group') ) : the_row(); ?>
							<div class="instructor-image-text-group">
								<img class="instructor-image-text-img" src="<?php echo get_sub_field('program_overview_instructor_image')['url'] ?>" alt="">
								<h5 class="instructor-image-text-headline"><?php the_sub_field('program_overview_instructor_name'); ?></h5>
								<p class="instructor-image-text-desc"><?php the_sub_field('program_overview_instructor_descriptor'); ?></p>
							</div>
							<div class="mobile-horizontal-scroll-hint"><span><i class="fas fa-chevron-circle-right"></i></span></div>
							<?php endwhile; ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
				<?php endif ?>

				<!-- Overlay Section -->
				<?php if(get_field('overlay_section_left')): ?>
				<div class="faq-section-container" style="background-image: url('<?php echo get_field('overlay_bg_image')['url'] ?>');">
				  	<div class="faq-column-left">
					  <?php echo get_field('overlay_section_left'); ?>

					<!-- HTML to insert into wysiwyg -->
					  	<!-- <h2 class="po-headline">FAQs</h2>
						<ul class="faq-col-list">
						  	<li><a href="#">Is there financial aid?</a></li>
							<li><a href="#">How long does it take to complete the real estate courses?</a></li>
							<li><a href="#">Do I have to take all the classes at once?</a></li>
							<li><a href="#">How do I schedule an online class?</a></li>
						</ul> -->
				  	</div>
					<div class="faq-vertical-line"></div>
					<div class="faq-column-right">
						<?php echo get_field('overlay_section_right'); ?>

					<!-- HTML to insert into wysiwyg -->
						<!-- <h2 class="po-headline">Useful Information</h2>
						<div class="faq-column-right-inner">
							<div class="faq-column-right-inner-link-wrap"><a href="#">Course Schedules <i class="fas fa-angle-right"></i></a></div>
							<div class="faq-column-right-inner-link-wrap"><a href="#">Exam Prep <i class="fas fa-angle-right"></i></a></div>
							<div class="faq-column-right-inner-link-wrap"><a href="#">Contact an Enrollment Specialist <i class="fas fa-angle-right"></i></a></div>
						</div> -->
					</div>
				</div>
				<?php endif ?>
				
				<!-- Trailing Wysiwyg -->
				<?php if(get_field('program_overview_trailing_wysiwyg')): ?>
				<div class="trailing-wysiwyg">
					<?php echo get_field('program_overview_trailing_wysiwyg'); ?>
				</div>
				<?php endif ?>
				
			</div> <!-- END PROGRAM OVERVIEW PAGE CONTENT CONTAINER -->
		
		</div> <!-- end .page-content -->
	
	
	</div> <!-- /.content-container -->
</section> <!-- /#page -->

<?php get_footer(); ?>