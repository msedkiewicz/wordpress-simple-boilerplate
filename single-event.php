<?php
get_header();

while(have_posts()) {
    the_post();
    pageBanner();
    ?>
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Wydarzenia&nbsp;&nbsp;</a>&nbsp;&nbsp;<?php the_title(); ?></span>&nbsp;&nbsp;</p>
        </div>
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