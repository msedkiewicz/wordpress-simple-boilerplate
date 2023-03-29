<?php
get_header();

pageBanner(array(
    'title' => 'Wydarzenia',
    'subtitle' => 'Wydarzenia, w których warto wziąć udział!'
));
?>
    <div class="container container--narrow page-section">
        <?php
        while(have_posts()) {
            the_post();
            get_template_part('template-parts/content-event');
        }
        echo paginate_links();
        ?>
        <hr class="section-break">
        <p>Chcesz zobaczyć minione wydarzenia? Zajrzyj do <a href="<?php echo site_url('/archiwum-wydarzen/') ?>">archiwum wydarzeń</a>!</p>

    </div>
<?php
get_footer();
?>