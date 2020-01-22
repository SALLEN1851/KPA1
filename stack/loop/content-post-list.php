<article id="post-<?php the_ID(); ?>" <?php post_class( 'masonry__item col-sm-12 simple-list' ); ?>>

	<div class="article__title text-center">
		<?php 
			the_title('<a href="'. get_permalink() .'"><h2>', '</h2></a>'); 
			get_template_part('inc/content-post', 'meta');	
		?>
	</div><!--end article title-->
	
	<div class="article__body">
		<?php 
			if( 'yes' == get_option( 'stack_simple_list_thumbnail', 'no' ) ){
				the_post_thumbnail( 'large', array(
					'class' => 'box-shadow-wide extend-width'
				) );
			}
			
			the_content( esc_html__( 'Continue reading &raquo;', 'stack' ) ); 
		?>
	</div>
	
</article><!--end item-->