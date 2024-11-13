<?php get_header(); ?>

<main id="main" class="site-main">
    <header class="page-header">
        <h1 class="page-title">Projects</h1>
    </header>

    <div class="project-list">
        <?php
        // Set up a custom query for displaying six projects per page
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => 6,
            'paged' => $paged,
        );
        $projects_query = new WP_Query($args);

        if ($projects_query->have_posts()) :
            while ($projects_query->have_posts()) : $projects_query->the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2 class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="project-content">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
                <?php
            endwhile;

            // Pagination
            ?>
            <div class="pagination">
                <?php
                previous_posts_link('&laquo; Previous');
                next_posts_link('Next &raquo;', $projects_query->max_num_pages);
                ?>
            </div>
            <?php
        else :
            echo '<p>No projects found.</p>';
        endif;

        // Reset post data
        wp_reset_postdata();
        ?>
    </div>
</main>

<?php get_footer(); ?>
