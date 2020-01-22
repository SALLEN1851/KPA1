<?php 
	/**
	 * @author  TommusRhodus
	 * @version 9.9.9
	 */
	get_header(); 
	
	$display_archive = get_option( 'woocommerce_shop_page_display' );
	$args            = array();
	
	if( is_tax() ){
		$term              = get_queried_object();
		$display_archive   = get_option( 'woocommerce_category_archive_display' );
		$args['parent_id'] = $term->term_id;
	}
	
	echo ebor_breadcrumb_section( get_option( 'stack_shop_title', 'Our Shop' ), false, get_option( 'stack_shop_breadcrumb_image', '' ) );
	
	if( 0 == $wp_query->found_posts ) :
?>

	<div class="row">
		<div class="col-md-6 col-md-offset-3 text-center">
			<h3><?php esc_html_e( 'No search results found', 'stack' ); ?></h3>
			<form class="form--horizontal" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="col-sm-8">
					<input type="text" name="s" placeholder="<?php esc_attr_e( 'Type search keywords here', 'stack' ); ?>" />
				</div>
				<div class="col-sm-4">
					<button type="submit" class="btn btn--primary type--uppercase"><?php esc_html_e( 'Search', 'stack' ); ?></button>
				</div>
				<input type="hidden" name="post_type" value="product" />
			</form>
		</div>
	</div>
	
<?php endif; ?>

<section class="space--sm">
	<div class="container">
		<?php 
			if( 'both' == $display_archive || 'subcategories' == $display_archive ){
				
				get_template_part( 'loop/loop-product-categories', 'before' );
				woocommerce_output_product_categories( $args );
				get_template_part( 'loop/loop-product-categories', 'after' );
				
			}
			
			if( have_posts() && !( 'subcategories' == $display_archive ) ){
				get_template_part( 'loop/loop-product', get_option( 'stack_shop_layout', 'column-3' ) ); 
			}
		?>
	</div><!--end of container-->
</section>
            
<?php get_footer();