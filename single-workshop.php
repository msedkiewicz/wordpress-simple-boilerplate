<?php
    get_header();

while(have_posts()) {
    the_post();
    pageBanner();
    ?>
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('workshop'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Warsztaty&nbsp;&nbsp;</a>&nbsp;&nbsp;<?php the_title(); ?></span>&nbsp;&nbsp;</p>
        </div>
        <div>
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="generic-content"><?php the_content(); ?></div>

        <?php
        $relatedAuthors = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'blogauthor',
            'orderby' => 'title',
            'order' => 'ASC',
            array(
                'key' => 'related_workshops',
                'compare' => 'LIKE',
                'value' => '"' . get_the_ID() . '"'
            )
        ));
        if($relatedAuthors->have_posts()) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">Autorzy warsztatu ' . get_the_title() . '</h2>';
            echo '<ul class="professor-cards">';

            while ($relatedAuthors->have_posts()) {
                $relatedAuthors->the_post();
                ?>
                <li class="professor-card__list-item">
                    <a class="professor-card" href="<?php the_permalink(); ?>">
                        <img class="professor-card__image" src="<?php the_post_thumbnail_url('authorLandscape'); ?>">
                        <span class="professor-card__name"><?php the_title(); ?></span>
                    </a>
                </li>

            <?php }
            echo '</ul>';
            wp_reset_postdata();
        }

        $today = date('Ymd');
        $homeEvents = new WP_Query(array(
            'posts_per_page' => 2,
            'post_type' => 'event',
            'orderby' => 'meta_value_num',
            'meta_key' => 'event_date',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $today,
                    'type' => 'numeric'
                ),
                array(
                    'key' => 'related_workshops',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"'
                )
            )
        ));
        if($homeEvents->have_posts()) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">Wydarzenia powiązane z warsztatem ' . get_the_title() . '</h2>';

            while ($homeEvents->have_posts()) {
                $homeEvents->the_post();
                get_template_part('template-parts/content-event');
            } wp_reset_postdata();
        }
        ?>
    </div>
    <?php
}
get_footer();
?>