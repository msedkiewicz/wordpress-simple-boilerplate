<?php
get_header();
?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">Blog</h1>
            <div class="page-banner__intro">
                <p>Najnowsze wpisy</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
    <?php
    while(have_posts()) {
        the_post(); ?>
            <div class="post-item">
                <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="metabox">
                    <p>Autor: <?php the_author_posts_link(); ?>, opublikowane: <?php the_time('l, j F Y'); ?>, kategoria: <?php echo get_the_category_list(', '); ?></p>
                </div>
                <div class="generic-content">
                    <?php the_excerpt(); ?>
                    <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Więcej &raquo</a></p>
                </div>
            </div>
    <?php
    } ?>
    </div>
<?php
    get_footer();
?>