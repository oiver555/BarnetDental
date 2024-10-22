<?php get_header() ?>
<div class="relative">
    <?php
    // Check if it's a single post of the 'dentist' post type
    if (is_singular('dentist')) {
        $featured_image = get_the_post_thumbnail_url(null, 'large');
        $name = get_field("first_name",) . " " . get_field("last_name",);
        $type = get_field("type",);
        $title = get_field("title",);
        $bio = get_field("biography",);
        $edu = get_field("education");
        $residency = get_field("residency");
        $languages = get_field('language');
        $insurances = get_field('insurance_accepted');
        $locationID = get_field("location")[0]->ID;
        $location_link = get_permalink($locationID);
        $location_name  = get_field("name",  $locationID);
        $location_address = get_field("street_address",  $locationID);
        $location_city = get_field("city",  $locationID);
        $location_state = get_field("state",  $locationID);
        $location_zip = get_field("zip",  $locationID);
        $location_web = get_field("website",  $locationID);
        $location_phone = get_field("phone_number",  $locationID);
        $location_featured_image = get_the_post_thumbnail_url($locationID);
        $services = get_field("procedures");
    }
    ?>
    <div class="header-margin">
        <div class="blue-bkg white-color relative relative view-all-container">
            <div style="isolation: isolate;"> <i class="fa fa-chevron-left white-color"></i><a href="<?php echo site_url() ?>/find-a-dentist/" style="color: inherit; text-decoration: none;">View All</a></div>
        </div>
        <div class="single-dentist-main-content">
            <div style="flex: .70;">
                <section style="display: flex;  mix-blend-mode: hard-light;  margin-top: 30px; ">
                    <div style="width:100%; display: flex; overflow: hidden;  background: transparent; flex-wrap: wrap;  ">
                        <div class="single-dentist-profile-container">
                            <img src="<?php echo  esc_url($featured_image) ?>" alt="Featured Image" class="fill relative fit-image-cover">
                        </div>
                        <div class="single-dentist-name-container">
                            <h1 style="font-size: xx-large;"><?php echo $name ?></h1>
                            <div>
                                <button style=" font-size: 18px; margin: 0; border: 1px grey solid; font-weight: bold; padding: 5px 10px; border-radius: 5px;"><?php echo $type ?></button>
                            </div>
                        </div>
                    </div>
                </section>
                <section style=" display: flex; position: relative; margin-top: 30px; justify-content:space-between ;   mix-blend-mode: hard-light;">
                    <div class="shadow single-dentist-description-container">
                        <div>
                            <h1>About <?php echo  $name ?>, <?php echo $title ?></h1>
                        </div>
                        <div>
                            <p style="font-size:18px; letter-spacing: 2px; line-height: 25px;"><?php echo $bio ?></p>
                        </div>

                    </div>
                </section>
                <section style=" display: flex;  position: relative;  margin-top: 30px;  mix-blend-mode: hard-light;">
                    <div class="shadow single-dentist-description-container">
                        <div style=" position: relative;width: 80%;">
                            <h1>Education</h1>
                        </div>
                        <div>
                            <ul>
                                <li><span class="bold">Medical/Gradute School:</span><?php echo $edu ?></li>
                                <li><span class="bold">Residency:</span><?php echo $residency ?></li>

                            </ul>
                        </div>
                    </div>
                </section>
                <section class="relative" style=" display: flex; margin-top: 30px; justify-content:space-between;  mix-blend-mode: hard-light;">
                    <div class="shadow single-dentist-description-container">
                        <div class="relative">
                            <h1>Langues Spoken</h1>
                        </div>
                        <div class="relative">
                            <ul style="font-size:18px; letter-spacing: 2px; line-height: 25px; list-style-type: none;      ">
                                <?php if (!empty($languages)) {
                                    // Loop through the $languages array
                                    foreach ($languages as $language) {
                                        // Output each language within an <li> element
                                        echo '
                              <li>' . htmlspecialchars($language) . '</li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </section>
                <section style=" display: flex;  position: relative;margin-top: 30px; justify-content:space-between;  mix-blend-mode: hard-light;">
                    <div class="shadow single-dentist-description-container">
                        <div style="left: 40px; position: relative; width: 80%;">
                            <h1>Insurance Accepted</h1>
                        </div>
                        <div style="left: 40px;  position: relative;width: 80%;">
                            <ul style="font-size:18px; letter-spacing: 2px; line-height: 25px; list-style-type: none;      ">
                                <?php if (!empty($insurances)) {
                                    // Loop through the $languages array
                                    foreach ($insurances as $insurance) {
                                        echo '
                       <li>' . htmlspecialchars($insurance) . '</li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>

                    </div>
                </section>
                <section class="relative " style=" display: flex; margin: 30px 0 50px 0; border-radius: 15px;justify-content:space-between ; mix-blend-mode: hard-light;">
                    <div class="shadow single-dentist-description-container">
                        <div class="relative" style="left: 40px; width: 80%;">
                            <h1>Services Offered</h1>
                        </div>
                        <div class="relative" style="left: 40px; width: 80%;">
                            <ul style="font-size:18px; letter-spacing: 2px; line-height: 25px; list-style-type: none;      ">
                                <?php if (!empty($services)) {
                                    foreach ($services as $service) {
                                        $service_permalink = '';
                                        $query = new WP_Query(array(
                                            'name' => $service,
                                            'post_type' => 'service', // or your custom post type
                                            'posts_per_page' => 1
                                        ));

                                        if ($query->have_posts()) {
                                            $service_post_id = $query->post->ID;
                                            $service_permalink = get_permalink($service_post_id);
                                            wp_reset_postdata();
                                        }
                                        echo '<li><a href="'.esc_url($service_permalink).'" >' . htmlspecialchars($service) . '</a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                </section>
            </div>

            <div style="flex: .25; height: 800px; display: flex; flex-direction: column;">
                <section class="single-dentist-fill-in">
                    <div style="width:100%; display: flex;  background: yellow;">
                        <div style="height: 300px; width: 200px;  border-radius: 15px; overflow: hidden;">
                            <img src="<?php echo  esc_url($featured_image) ?>" alt="Featured Image" class="fill relative fit-image-cover">
                        </div>
                        <div class="relative" style="left: 20px;">
                            <h1 style="font-size: xx-large;"><?php echo $name ?></h1>
                            <div>
                                <button style=" font-size: 18px; margin: 0; border: 1px grey solid; color: grey; font-weight: bold; padding: 5px 10px; border-radius: 5px;"><?php echo $type ?></button>
                            </div>
                        </div>
                    </div>
                </section>

                <div style="flex: .1;  margin-top: 30px;">
                    <h1 style="margin-top: 0; font-size: xx-large; text-wrap: nowrap;">Office Location</h1>
                </div>
                <a href="<?php echo $location_link ?>" style="flex: .9; min-width: 275px; min-height: 400px; border-radius: 15px; overflow: hidden; position: relative; display: flex; flex-direction: column;" class="white-bkg">
                    <div style="flex: .4; position: relative;">
                        <img src="<?php echo  esc_url($location_featured_image) ?>" alt="location Featured Image" class="fill relative fit-image-cover">
                    </div>
                    <div style="flex: .6; top: 15px; left:15px; width: 90%; font-size: 18px;  position: relative;">
                        <div class="blue-color" style="font-weight: bold;">
                            <h3 style="margin: 0;"><?php echo  $location_name  ?></h3>
                        </div>
                        <div><?php echo  $location_address  ?></div>
                        <div><?php echo  $location_city  ?>, <?php echo  $location_state  ?> <?php echo  $location_zip  ?></div>
                        <div class="blue-color" style="font-weight: bold; text-decoration: underline;"><?php echo  $location_phone  ?></div>
                        <div style="text-align: center; margin-top: 15px">
                            <button id="filter-apply" class="blue-bkg white-color" style="font-size: 18px;transition: color .3s ease;   padding: 12px 60px; font-weight: bold; border-radius: 25px; border: 0; cursor: pointer; user-select: none;">Get Directions</button>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <?php get_footer() ?>