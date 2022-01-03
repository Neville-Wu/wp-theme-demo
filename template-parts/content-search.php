<?php
/*
 *
 * */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
	            <?php
	            $time_string = sprintf(
		            '<span>Posted on <time datetime="%1$s">%2$s</time></span>',
		            esc_attr( get_the_date( DATE_W3C ) ),
		            esc_html( get_the_date() )
	            );

	            if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		            $time_string .= sprintf(
			            ' | <span>Updated on <time datetime="%1$s">%2$s</time></span>',
			            esc_attr( get_the_modified_date( DATE_W3C ) ),
			            esc_html( get_the_modified_date() )
		            );
	            }
	            ?>

                <a class="block" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		            <?php echo $time_string; ?>
                </a>
                <a class="block" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )?>">
		            <?php echo esc_html( get_the_author() ); ?>
                </a>
            </div><!-- .entry-meta -->
		<?php endif; ?>
    </header><!-- .entry-header -->

    <div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
    </div><!-- .post-thumbnail -->

    <div class="entry-summary">
		<?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

    <footer class="entry-footer">
	    <?php
	    $categories_list = get_the_category_list( esc_html__( ', ', 'demo' ) );
	    if ( $categories_list ) {
		    /* translators: 1: list of categories. */
		    printf( '<span class="cat-links">' . esc_html__( '%1$s', 'demo' ) . '</span>', $categories_list );
	    }

	    $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'demo' ) );
	    if ( $tags_list ) {
		    /* translators: 1: list of tags. */
		    printf( ' <span class="tags-links">' . esc_html__( 'Tagged %1$s', 'demo' ) . '</span>', $tags_list );
	    }
	    ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->