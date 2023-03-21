<?php
get_header();
?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">Warsztaty</h1>
            <div class="page-banner__intro">
                <p>Ćwiczenia dla Twojej głowy</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <?php
        while(have_posts()) {
            the_post(); ?>
            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <p><?php echo wp_trim_words(get_the_content(), 15); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Więcej</a></p>
            <?php
        }
        echo paginate_links();
        ?>
    </div>
<?php
get_footer();
?>