<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package spatovaliyski
 */

get_header();
?>
	<main id="primary" class="site-main sections">
		<section class="section section-with-sidebar">
			<div class="section-main">
                <div class="tooltip-box">
                    <h1 class="tooltip-box-title">Maybe in the near future</h1>
                    <h3>let's go <a href="<?php echo home_url(); ?>">back</a> </h3>
                </div>
            </div>
		</section>

	</main><!-- #main -->

<?php

get_footer();
