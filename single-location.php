<?php get_header() ?>
<div class="relative header-margin ">
    <?php
    // Check if it's a single post of the 'dentist' post type
    if (is_singular('location')) {
        $type = get_field("type");
        $site = get_field("website");
        $phone = get_field("phone_number");
        $zip = get_field("zip");
        $state = get_field("state");
        $city = get_field("city");
        $address = get_field("street_address");
        $name = get_field("name");
        $description = get_field("description");
        $lat = get_field("lattitude");
        $lon = get_field("longitude");
        $hours = get_field("hours");

        echo $hours;
    }



    $services = new WP_Query(array(
        'post_type' => "service",
        'posts_per_page' => 2,
        'orderby' => 'rand',
    ));

    $dentists_url =  new WP_REST_Request('GET', "/myplugin/v1/dentists-by-location/" . get_the_ID());
    $dentists = rest_do_request($dentists_url)->data;
    ?>
    <div style="position: relative; padding-bottom: 150px;">
        <div class="blue-bkg white-color relative relative view-all-container">
            <div style="isolation: isolate;"> <i class="fa fa-chevron-left white-color"></i><a href="<?php echo site_url() ?>/location/" style="color: inherit; text-decoration: none;">View All</a></div>
        </div>

        <div class="single-location-main-content">

            <!-- HEADING  -->

            <section style="display: flex; flex-direction: column; justify-content: space-around; align-items:center; height: 300px; position:relative">
                <div class="single-location-type-label-container">
                    <button style=" font-size: 18px; margin: 0; border: 1px grey solid; font-weight: bold; padding: 5px 10px; border-radius: 5px;"><?php echo $type ?></button>
                </div>
                <div class="single-location-title-container">
                    <h1 style="font-size: xxx-large; margin: 0;"><?php echo $name ?></h1>
                    <button id="filter-apply" class="blue-bkg white-color" style="font-size: 18px; transition: color .3s ease; padding: 12px 60px; font-weight: bold; border-radius: 25px; border: 0; cursor: pointer; user-select: none;margin-top: 15px">Get Directions</button>
                </div>

                <div>
                    <a href="#providers" style="text-decoration: none; font-size: 20px;" title="View providers at this location" class="blue-color">View providers at this location</a>
                </div>

            </section>

            <!-- CONTACT -->

            <section id="location-contact-details" class="shadow-sharp" style="transition: height .3s ease; display:flex; justify-content: space-around;align-items:center; width: 100%; min-height: 575px; flex-wrap:wrap; gap:15px; background: white; border-radius: 15px; margin-top: 50px">
                <div style="flex: 1; display:flex; flex-direction: column; justify-content: space-around;  height: 100%;  font-size: 18px;">
                    <div style="flex: 1; margin-top: 20px;  margin-left: 15px">
                        <h2 style="margin: 0;">Contact</h2>
                        <div>Phone Number:<?php echo $phone ?></div>
                    </div>
                    <div style="flex: 1;  margin-left: 15px">
                        <h2 style="margin: 0;">Hours</h2>
                        <?php echo $hours ?>
                        <!-- <a class="blue-color" id="show-all" style="display: inline-block; margin: 10px 0;">
                            <span style="font-weight: bold; font-size: 25px; margin:0; line-height: 0;">+</span> Show All</a> -->
                    </div>
                    <hr style="width: 90%; opacity: .4">
                    <div style="position: relative; flex: 1;  margin-left: 15px">
                        <a href="#"><img style="position: relative; width: 80%;" src="<?php echo get_site_url() ?>/wp-content/uploads/2024/05/google-review-copy.webp"></a>
                    </div>
                </div>
                <div class="single-location-get-directions-container">
                    <div style="flex: 1; margin-bottom: 20px; ">
                        <h2 style="margin: 0;">Location</h2>
                        <div><?php echo $address ?><br><?php echo $city ?>, <?php echo $state ?> <?php echo $zip ?></div>
                    </div>
                    <div style=" justify-content: space-around; display:flex; flex-direction: column; max-width: 350px; height: 80px;    ">
                        <div style="text-align: center;">Get Directions</div>
                        <div style="display: flex; justify-content: center; ">
                            <a class="shadow-sharp"  style="display:flex;  justify-content:center; width: 50px; padding: 10px 24px; font-weight: 400; border-radius: 25px; background-color: #efefef; color: #373737; font-size: 15px;">
                                <i class="uber-icon" style="background: url('<?php echo get_site_url() ?>/wp-content/uploads/2024/05/a-icon-uber.svg') no-repeat center center;background-size: contain; "></i>
                             </a>
                            
                            <a class="shadow-sharp" style="display:flex; justify-content:center;width: 50px; padding: 10px 24px; font-weight: 400; border-radius: 25px; background-color: #efefef; color: #373737; font-size: 15px; margin-left:15px">
                                <i class="lyft-icon" style="background: url('<?php echo get_site_url() ?>/wp-content/uploads/2024/05/a-icon-lyft.svg') no-repeat center center;background-size: contain; "></i>
                                
                            </a>
                        </div>
                    </div>
                     
                </div>
                <div id="map-container" data-lat="<?php echo $lat ?>" data-lon="<?php echo $lon ?>" data-name="<?php echo $name ?>" style="z-index: 50; flex: 1; min-width:max(50%, 300px); height: 375px">
                    <div id="map" style="  height: 100%; background:black">

                    </div>
                </div>

            </section>

            <!-- DESCRIPTION -->
            <section style="width: 100%; min-height: 700px; display: flex; flex-wrap: wrap; flex-direction: row; justify-content: space-between; margin-top: 50px">
                <div class="shadow-sharp single-location-description"><?php echo $description ?></div>
                <div style="max-height: 1000px; flex:.35; display:flex; flex-direction: column; justify-content: flex-start; flex-wrap: wrap; gap: 15px;">

                    <?php
                    $count = 1;
                    foreach ($services->posts as $service) {

                    ?>
                        <div class="shadow-sharp single-location-procedures">
                            <div style="flex:.5; width: 90%; border-radius: 15px; overflow: hidden; position: relative; margin: 15px auto 0 auto">
                                <img src="<?php echo get_the_post_thumbnail_url($service->ID, "medium") ?>" style="width: 100%;  position:relative; object-fit: contain;" />
                            </div>
                            <div style="flex:.1; margin-left: 30px;">
                                <h3 style="margin: 10px 0;"><?php echo  $service->post_title  ?></h3>
                            </div>
                            <div id="procedure-description-<?php echo $count++ ?>" style="flex:.2; margin-left: 30px; overflow: hidden; text-overflow: ellipsis; width:85%;  ">
                                <?php echo $service->post_content ?>
                            </div>
                            <div style="flex:.2; margin-left: 30px; display: flex; align-items: center;">
                                <a class="blue-bkg" style="align-items:center;text-decoration: none; padding: 10px 24px; font-weight: 400; border-radius: 25px;  color: white; font-size: 15px;" href="<?php echo get_permalink($service->ID) ?>">Learn More</a>
                            </div>
                        </div>

                    <?php
                    } ?>
                </div>

            </section>
            <!-- DENTISTS -->
            <section style=" margin-top: 50px" id="providers">
                <div class="blue-color" style=" width: 100%; text-align: center; font-size: x-large;">
                    <h1>Providers at this location</h1>
                </div>
                <div style="display: flex; width: 100%; justify-content:  center; flex-wrap: wrap; gap: 20px;">
                    <?php
                    foreach ($dentists as $dentist) {

                    ?>
                        <div class="shadow-sharp" style="width: 325px; height: 250px; border-radius: 15px; background: white; overflow: hidden;">
                            <div style="height: 75%; width: 100%; display:flex; align-items: center; position: relative;">
                                <div style="flex: .4; height: 80%;   margin: 0px 0 0 15px;">
                                    <a href="<?php echo $dentist['link'] ?>"><img src="<?php echo $dentist['featured_media'] ?>" style="width: 100%; height: 100%; outline: 3px solid lightgrey"></a>
                                </div>
                                <div style="flex: .5; left: 15px; position: relative; height: 70%">
                                    <div style="font-weight: bold; letter-spacing: 2px;"><a href="<?php echo $dentist['link'] ?>" style="text-decoration: none; color:inherit"><?php echo $dentist['name'] ?>, <?php echo $dentist['title'] ?></a></div>
                                    <div>
                                        <button style="margin: 15px 0 0 0; border: 1px grey solid; font-weight: bold; padding: 5px 10px; border-radius: 5px;"><a href="<?php echo $dentist['link'] ?>" style="text-decoration: none; color:inherit"><?php echo $dentist['type'] ?></a></button>
                                    </div>
                                </div>
                            </div>
                            <hr style="margin: 0;">
                            <a class="blue-color" href="<?php echo $dentist['link'] ?>" style="height: 25%; width: 100%;  justify-content:center; font-weight:bold; display: flex; align-items: center; ">
                                View Details
                            </a>
                        </div>
                    <?php   }

                    ?>
                </div>
            </section>
        </div>
    </div>

    <script>
        // LINE CLAMPS FOR ELLIPSISES
        const procedureDescription1 = document.querySelector("#procedure-description-1")
        const procedureDescription2 = document.querySelector("#procedure-description-2")
        const locationContactDetails = document.querySelector("#location-contact-details")
        let bool = true

        $clamp(hours, {
            clamp: '2'
        });
        $clamp(procedureDescription1, {
            clamp: 'auto'
        });
        $clamp(procedureDescription2, {
            clamp: 'auto'
        });

        const showAll = document.querySelector("#show-all")
        showAll.addEventListener("click", (e) => {
            setTimeout(() => {
                bool ? $clamp(hours, {
                    clamp: '6'
                }) : $clamp(hours, {
                    clamp: '2'
                })

            }, 500)
            locationContactDetails.style.height = bool ? "450px" : "375px"
            bool = !bool
        })
    </script>
    <?php get_footer() ?>