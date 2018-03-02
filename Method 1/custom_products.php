<?php
/**
 * Template Name: Custom Products
 *
 
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<ul class="products">
          <?php
		  
		    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	
	
	$args = array(
			'post_type' => 'product',
			'posts_per_page' => 20,
			'paged'          => $paged,
			);
			
	$loop = new WP_Query( $args );
	

    if ( $loop->have_posts() ) : ?>

                <?php

                while ( $loop->have_posts() ) : $loop->the_post();
                    wc_get_template_part( 'content', 'product' );
                endwhile;

            ?>
           

             

        

    <?php endif; ?>
   
</ul><!--/.products-->


 <?php 
            $total_pages = $loop->max_num_pages;

            if ($total_pages > 1){

                $current_page = max(1, get_query_var('paged'));

                echo paginate_links(array(
                    'base' => get_pagenum_link(1) . '%_%',
                    'format' => '/page/%#%',
                    'current' => $current_page,
                    'total' => $total_pages,
                    'prev_text'    => __('« prev'),
                    'next_text'    => __('next »'),
                ));
            }
            ?> 

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php
get_sidebar(); ?>
<?php get_footer(); ?>
