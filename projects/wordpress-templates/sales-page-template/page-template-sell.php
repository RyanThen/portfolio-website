<?php
/*
  Template Name: Sell Page Template
*/
	
get_header(); ?>

<section id="page" class="custom-sell-page">
	<div class="content-container">
		<?php dmh_breadcrumbs(); ?>
	</div>
	
	<?php if(get_field('header_bg_image')) { ?>
	<div class="page-header-wrap sell-header-bg" style="background-image: url('<?php echo get_field('header_bg_image')['url']; ?>')">
		<div class="sell-header-txt-wrap">
			<div class="sell-header-txt">
				<?php if(get_field('header_title')): ?>
				<h1 class="page-title"><?php the_field('header_title'); ?></h1>
				<?php endif; ?>
				
				<?php if(get_field('header_text')): ?>
				<p><?php the_field('header_text'); ?></p>
				<?php endif; ?>
			</div>

			<?php if( have_rows('header_button_group') ): ?>
			<div class="sell-header-cta">
				<?php while ( have_rows('header_button_group') ) : the_row(); ?>
					<a href="<?php echo get_sub_field('header_button_url'); ?>"><?php the_sub_field('header_button_text'); ?></a>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>

			<!-- <div class="arrow-down">
				<a href="#intro-title"><img src="/image/of/down/arrow/" alt="arrow down"></a>
			</div> -->
		</div>
	</div> <!-- End Header Area-->
	<?php } ?>
	
	<div class="content-container main-sell-page-content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>">
		
			<!-- Icon Blocks -->
			<?php if(have_rows('icon_blocks')): ?>
			<section class="intro-icons-container">
				<?php if(get_field('icon_group_title')): ?>
				<div id="intro-title" class="intro-title">
					<h3><?php the_field('icon_group_title')?></h3>
				</div>
				<?php endif; ?>
				
				<div class="intro-icons-wrap">
					<?php while (have_rows('icon_blocks')) : the_row(); ?>
						<div class="icon-block-wrap">
							<img class="icon-block-graphic" src="<?php echo get_sub_field('icon_block_graphic')['url']; ?>">
							<p class="icon-block-content"><?php the_sub_field('icon_block_content'); ?></p>
							<div class="icon-block-content-more">
								<span class="vert-line"></span>
								<p class="icon-block-content-more-text"><?php the_sub_field('icon_block_content_more'); ?></p>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</section> <!-- End Icon Blocks-->
			<?php endif; ?>

			
		<!-- TAB SECTION -->
			<?php if(have_rows('sell_tabs')): ?>
			<!-- Tab Title Section -->
			<?php $sell_tab_counter = 1; ?>
	
			<section id="tab-container" class="tab-container">
				<div class="tab-title-wrap scroll">

					<?php while (have_rows('sell_tabs')) : the_row(); ?>	
					<div class="tab">
						<h2 id="tab-title-<?php echo $sell_tab_counter; ?>"><?php the_sub_field('tab_title'); ?></h2>
					</div>
					<?php $sell_tab_counter++;
					endwhile; ?>

				</div>

				<!-- Tab Content Section -->
				<?php if( have_rows('sell_tabs') ):
				$sell_content_counter = 1; ?>
				
				<div class="tab-content-container">

					<?php while ( have_rows('sell_tabs') ) : the_row(); ?>
					<div class="tab-content-wrap tab-content-wrap-<?php echo $sell_content_counter; ?>">
						<?php the_sub_field('tab_content')?>
					</div>
					<?php $sell_content_counter++;
					endwhile; ?>
					
				</div>
				<?php endif; ?>
			</section> <!-- End Tab Container -->
			<?php endif; ?>


			<!-- Trailing Wysiwyg #1 -->

			<?php if( get_field('sell_page_trailing_wysiwyg_1') ): ?>
			<div class="trailing-wysi trailing-wysi-1-container">
				<?php the_field('sell_page_trailing_wysiwyg_1'); ?>
			</div>
			<?php endif; ?>
			

			<!-- Trailing Wysiwyg #2 -->

			<?php if( get_field('sell_page_trailing_wysiwyg_2') ): ?>
			<div class="trailing-wysi trailing-wysi-2-container">
				<?php the_field('sell_page_trailing_wysiwyg_2'); ?>
			</div>
			<?php endif; ?>

		
		<!-- Widget Section (optional) -->
		
			<?php if( $fields['show_widget'] ) { ?>
			<div class="asreb-programs-widget asreb-programs-widget--interior" data-widget="1" data-program="<?php echo $fields['widget_default_program']; ?>">
				<p class="widget-title" style="margin-bottom: 20px; font-size: 1.65em;">Launch Your Career</p>
				<div class="widget-columns">
					<div class="widget-column">
						<h3 class="widget-column-title">Find your career</h3>
						<div class="styled-select">
							<select class="programs-widget-select" data-select="1">
								<option value="">Please Select</option>
							</select>
						</div>
					</div>
					<div class="widget-column">
						<h3 class="widget-column-title">Select your program</h3>
						<div class="styled-select">
							<select class="programs-widget-select" data-select="2"></select>
						</div>
					</div>
					<div class="widget-column">
						<a href="#" class="widget-cta">Go!</a>
					</div>
				</div>
			</div>
			<?php } ?>
			
		</div> <!-- end .page-content -->
		
		<?php endwhile; else : ?>
			
			<div id="post-not-found" class="hentry page-content">
				<h1>Page not found</h1>
				<div class="entry-content">
					<p>We can't find what you're looking for. Try double checking for typos.</p>
				</div> <!-- end .entry-content -->
			</div> <!-- end .page-content -->
		
		<?php endif; ?>
	</div> <!-- /.content-container -->
</section> <!-- /#page -->

<?php
include_once(TEMPLATEPATH.'/library/modules/pods.php');
get_footer();

endif;