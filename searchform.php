<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<div class="h_search_box clearfix">
		<input type="text" name='s' class="input_search" value="<?php echo get_search_query() ?>" placeholder="<?php esc_attr_e( 'Search', 'hill' ) ?>">
		<input type="hidden" class="" name="post_type" value="product">
		<button type="submit" class="btn_search "><i class="fa fa-search"></i></button>
	</div>
</form>