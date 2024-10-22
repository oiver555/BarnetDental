<?php get_header();

$dentist_query = new WP_Query(array(
    'post_type' => 'dentist',
    'orderby' => 'rand',
    'posts_per_page' => 2
));



?>
<div class="relative">
    <div class="header-margin" style="margin-bottom: 100px;">
        <div class="blue-bkg white-color relative relative view-all-container">
            <div style="isolation: isolate;">
                <i class="fa fa-chevron-left white-color"></i>
                <a href="<?php echo site_url() ?>/specialty/" style="color: inherit; text-decoration: none;">View All</a>
            </div>
        </div>
        <div class="single-dentist-main-content" style="padding-top: 30px; gap: 50px">
            <section style="flex: .70; ">
                <div style=" display: flex; position: relative;  justify-content:space-between ;   mix-blend-mode: hard-light;">
                    <div class="shadow single-dentist-description-container">
                        <div>
                            <h1 style="font-size: xx-large;"><?php the_title() ?></h1>
                        </div>
                        <div style="padding-bottom: 50px;">
                            <p style="font-size:18px; letter-spacing: 2px; line-height: 25px;"><?php the_content() ?></p>
                        </div>

                    </div>
                </div>
            </section>

            <section style="flex: .25; height: 800px; display: flex; flex-direction: column; gap: 50px">
                <?php
                foreach ($dentist_query->posts as $key => $dentist_post) {
                    $featured_image_url = get_the_post_thumbnail_url($dentist_post->ID, 'medium');
                    $first_name = get_field("first_name", $dentist_post->ID,);
                    $last_name = get_field("last_name", $dentist_post->ID,);
                    $dentist_title = get_field("title", $dentist_post->ID,);
                    $profession = get_field("type", $dentist_post->ID,);
                    $location = get_field("location", $dentist_post->ID,);
                    $dentist_permalink = get_permalink($dentist_post->ID);
                    $location_name = get_field("name", $location[0]->ID); 
                ?>
                    <div class="shadow" style="flex: 1; min-width: 275px; min-height: 450px; justify-content: space-around; border-radius: 15px; overflow: hidden; position: relative; display: flex; flex-direction: column;background:white; ">
                        <div style="flex:  0 1 60%; position: relative; display: flex; justify-content: center; overflow: hidden;">
                            <img style="max-width: 100%; max-height: 100%; object-fit: contain;" src="<?php echo esc_url($featured_image_url) ?>" alt="picture of <?php esc_attr($dentist_post->post_title) ?>">
                        </div>
                        <div style="flex: .4; left:15px; width: 90%; font-size: 18px;  position: relative;  display:flex; flex-direction: column; justify-content: space-around">
                            <div>Dr. <?php echo $first_name . " " . $last_name ?>, <?php echo $dentist_title ?></div>
                            <div><?php echo $profession ?></div>
                            <div><?php echo $location_name ?></div>
                            <div style="text-align: center; ">
                                <a href="<?php echo $dentist_permalink ?>">
                                    <button class="blue-bkg white-color" style="font-size: 18px;cursor: pointer; transition: color .3s ease; padding: 12px 60px;border-radius: 25px; border: 0; text-decoration: none; user-select: none;">More Info</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php

                } ?>
            </section>
        </div>
    </div>
    <?php get_footer() ?>