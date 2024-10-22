<?php get_header() ?>
<div class="relative">
    <?php
    // Check if it's a single post of the 'dentist' post type
    $testimonials_query = new WP_Query(array(
        'post_type' => 'testimonial',
        'nopaging' => true,
    ));
    ?>
    <div class="header-margin" style="padding-bottom: 50px;">
        <div class="single-dentist-main-content">
            <div style="flex: .70; display:flex; flex-wrap: wrap; gap: 25px; justify-content: space-between;">
                <div style="flex: 0 0 25%; height: 250px; background: white;"></div>
            </div>
        </div>

        <div style="flex: .25; height: 800px; display: flex; flex-direction: column;">

        </div>
    </div>
</div>
<?php get_footer() ?>