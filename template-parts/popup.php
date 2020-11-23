<div class="modal fade hill_popup" id="hill_popup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<button type="button" class="close hill_popup_close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
			<div class="hill-subscrib-pan hill_sp_fill_bg">
				<div class="hill_popup_text_container">
					<h4><?php echo esc_html( hill_get_option( 'popup_title' ) ); ?></h4>
					<?php echo do_shortcode( wpautop( hill_get_option( 'popup_subtitle' ) ) ); ?>
				</div>
				<div class="hill-subscribe-form">
					<?php print hill_get_option( 'popup_mc_form' ); ?>
					<div class="hill_popup_remove">
						<label for="dont_show_again"><input type="checkbox" id="dont_show_again"> <?php echo esc_html( hill_get_option( 'popup_nomore_text' ) ); ?></label>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>