<?php
get_header();

pageBanner(array(
    'title' => 'Warsztaty',
    'subtitle' => 'Ćwiczenia dla Twojej głowy'
));
?>

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