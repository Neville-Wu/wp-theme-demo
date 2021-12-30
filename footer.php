<?php
/*
 *
 * */
?>

	<footer class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'demo' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Powered by %s', 'demo' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'demo' ), 'demo', '<a href="#">whom</a>' );
			?>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
