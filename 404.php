<?php get_header(); ?>

	<div class="container promo">
		<h2 class="title"><?php esc_html_e( 'Похоже ничего не было найдено, вернитесь обратно', 'specialpile' ); ?></h2>
		<a class="button_404" href="<?php echo esc_url(home_url("/")); ?>">
			<button class="button ">вернуться обратно</button>
		</a>
	</div>
	
<?php
get_footer();
