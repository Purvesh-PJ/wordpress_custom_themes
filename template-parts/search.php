<?php if ( have_posts() ) : ?>
    <h1><?php printf( __( 'Search Results for: %s', 'your-theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    <?php while ( have_posts() ) : the_post(); ?>
        <article>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div><?php the_excerpt(); ?></div>
        </article>
    <?php endwhile; ?>
<?php else : ?>
    <p><?php esc_html_e( 'No results found.', 'your-theme' ); ?></p>
<?php endif; ?>
