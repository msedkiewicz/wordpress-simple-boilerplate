<?php
get_header();

while(have_posts()) {
    the_post(); ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>DONT FORGET TO REPLACE ME LATER</p>
            </div>
        </div>
    </div>
    <div class="container container--narrow page-section">
        <div>
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="generic-content"><?php the_content(); ?></div>
        <?php
        $relatedWorkshops = get_field('related_workshops');

        if($relatedWorkshops) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">Powiązane warsztaty:</h2>';
            echo '<ul class="link-list min-list">';
            foreach($relatedWorkshops as $workshop){
                ?>
                <li><a href="<?php echo get_the_permalink($workshop) ?>"><?php echo get_the_title($workshop); ?></a></li>
            <?php }
            echo "</ul>";
        }
        ?>
    </div>
    <?php
}
get_footer();
?>