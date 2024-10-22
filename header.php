<?php
$menu_nav_data_url = new WP_REST_Request('GET', '/myplugin/v1/all-nav-menus-data');
$menu_nav_data  = rest_do_request($menu_nav_data_url)->data;

$curr_location_id =  get_queried_object_id();
$services_page_id = 835;
$location_page_id = 401;
$find_a_dentist_page_id = 446;


//   if (is_singular()) {
//     // For single posts, pages, or custom post types
//     $canonical_url = get_permalink();
//   } elseif (is_home() || is_front_page()) {
//     // For the homepage or blog page
//     $canonical_url = home_url('/');
//   } elseif ($curr_location_id === $find_a_dentist_page_id) {   
//     $canonical_url = get_permalink($find_a_dentist_page_id);
//   } elseif ($curr_location_id === $location_page_id) {   
//     $canonical_url = get_permalink($location_page_id);
//   }  else {
// 	  $canonical_url = get_permalink();
//   }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QJB0FREJNQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-QJB0FREJNQ');
    </script>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <?php

    if (is_page()) {
        if (is_page(1088)) {
            include get_template_directory() . '/template-parts/meta/meta-events.php';
        } elseif (is_page(446)) {
            include get_template_directory() . '/template-parts/meta/meta-find-a-dentist.php';
        } elseif (is_page(401)) {
            include get_template_directory() . '/template-parts/meta/meta-location.php';
        } elseif (is_page(752)) {
            include get_template_directory() . '/template-parts/meta/meta-service.php';
        }
    } else  if (is_post_type_archive()) {
        if (is_post_type_archive("specialty")) {
            include  get_template_directory() . '/template-parts/meta/meta-archive-specialty.php';
        } else  if (is_post_type_archive("testimonial")) {
            include  get_template_directory() . '/template-parts/meta/meta-archive-testimonial.php';
        }
    } else if (is_single()) {
        $post_id = get_the_ID();

        if (is_single(('dentist'))) {
    ?>
            <title>Dr. <?php echo esc_html(get_field("first-name", $post_id)); ?> <?php echo esc_html(get_field("last-name", $post_id)); ?> &mdash; <?php echo esc_html(get_field("profession", $post_id)); ?> at Barnet Dental</title>
            <meta name="keywords" content="Dr. <?php echo esc_attr(get_field('first-name', $post_id)); ?> <?php echo esc_attr(get_field('last-name', $post_id)); ?>, <?php echo esc_attr(get_field('profession', $post_id)); ?>, <?php echo esc_attr(get_field('title', $post_id)); ?>, Barnet Dental, dental care, dentistry, <?php echo esc_attr(get_field('state', $post_id)); ?>">
            <meta name="description" content="Learn more about Dr. <?php echo esc_html(get_field('first-name', $post_id)); ?> <?php echo esc_html(get_field('last-name', $post_id)); ?>, a <?php echo esc_html(get_field('title', $post_id)); ?> dentist at Barnet Dental. Specializing in <?php echo esc_html(get_field('specialties', $post_id)); ?>, Dr. <?php echo esc_html(get_field('last-name', $post_id)); ?> is committed to providing exceptional dental care.">
            <meta property="og:title" content="Dr. <?php echo esc_html(get_field("first-name", $post_id)); ?> <?php echo esc_html(get_field("last-name", $post_id)); ?> &mdash; <?php echo esc_html(get_field("profession", $post_id)); ?> at Barnet Dental">
            <meta property="og:description" content="<?php echo esc_attr(get_field("meta-og-description", $post_id)); ?>">
            <meta property="og:image" content="<?php echo esc_url(get_field("meta-og-image", $post_id)); ?>">
            <meta property="og:url" content="<?php echo esc_url(get_field("meta-og-url", $post_id)); ?>">
    <?
        } elseif (is_single(('Event'))) {

        }
    }

    ?>
    <link rel="icon" href="<?php echo get_template_directory_uri() ?>/images/Barnet_no_text.ico" type="image/x-icon">
    <?php wp_head(); ?>
    <style>
        <?php
        echo '.relative::after {
                content: "";
                background-image: url("' . get_theme_file_uri('images/bkg.jpg') . '");
                opacity: .7;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-size: contain;
                background-repeat: repeat;
                position: absolute;
                z-index: -1;
            }';
        ?>
    </style>

    <link rel="canonical" href="<?php echo esc_url($canonical_url); ?>">

</head>

<body>

    <div class="shadow header-container">
        <div style="flex: .5%; width: 100%;  display: flex; flex-direction: row; justify-content: space-around; align-items: center; ">
            <div style="width: 10%; display: flex; flex-direction: row; justify-content: space-between; ">
                <i style="color: black; font-size: 18px; " class="fab fa-facebook" aria-hidden="true"></i>
                <i style="color: black; font-size: 18px;" class="fab fa-instagram" aria-hidden="true"></i>
                <i style="color: black; font-size: 18px;" class="fab fa-twitter" aria-hidden="true"></i>
            </div>
            <div style="color: black;">
                <i style="color: black; font-size: 25px; padding: 0px 10px" class="fas fa-mobile-alt" aria-hidden="true"></i>
                1-888-3289
            </div>
        </div>

        <hr style="width: 95%; margin-right: 0;margin-top: 0; margin-bottom: 0; background-color: white; height: 1px;position: relative;">

        <div style=" display: flex; flex-direction: row; flex: .5;  z-index: 50; width: 95%;color: white; align-items:center;  align-self: flex-end;">
            <div style="flex: 0.2;">
                <a href="<?php echo site_url() ?>">
                    <img style=" width: 80px" src="<?php get_site_url() ?>/wp-content/uploads/2024/04/BARNET_black_text.svg" />
                </a>
            </div>
            <div class="tilt-neon-nav" style="flex: 0.7; display: flex; justify-content: space-around; isolation: isolate; ">
                <div id="specialty-btn" style="color: black;" class="nav-btn">specialty
                    <div style="position: absolute; width:100%; margin: auto auto; pointer-events: none; bottom:0px">
                        <i id="specialty-chevron" class="fa fa-chevron-down chevron-down"></i>
                        <div style="width: 450px; height:300px; position: fixed; overflow: hidden;  ">
                            <div id="specialty-menu" class="nav-sub-menu-container">
                                <?php include(dirname(__FILE__) . "/template-parts/specialty-menu.php") ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="color: black;" id="find-a-dentist-btn" class="nav-btn">find a dentist
                    <div style="position: absolute; width:100%; margin: auto auto; pointer-events: none; bottom:0px">
                        <i id="find-a-dentist-chevron" class="fa fa-chevron-down chevron-down"></i>
                        <div style="width: 450px; height:300px; position: fixed; overflow: hidden; padding: 0 20px 20px 20px; transform: translateX(-20px)">
                            <div id="find-a-dentist-menu" class="nav-sub-menu-container shadow">
                                <?php include(dirname(__FILE__) . "/template-parts/find-dentist-menu.php") ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="color: black;" id="service-btn" class="nav-btn">services
                    <div style="position: absolute; width:100%; margin: auto auto; pointer-events: none; bottom:0px">
                        <i id="service-chevron" class="fa fa-chevron-down chevron-down"></i>
                        <div style="width: 450px;   height:300px; position: fixed; overflow: hidden;  ">
                            <div id="service-menu" class="nav-sub-menu-container">
                                <?php include(dirname(__FILE__) . "/template-parts/services-nav-menu.php") ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="color: black;" id="locations-btn" class="nav-btn">locations
                    <div style="position: absolute; width:100%; margin: auto auto; pointer-events: none; bottom:0px">
                        <i id="locations-chevron" class="fa fa-chevron-down chevron-down"></i>
                        <div style="width: 450px;   height:300px; position: fixed; overflow: hidden">
                            <div id="locations-menu" class="nav-sub-menu-container">
                                <?php include(dirname(__FILE__) . "/template-parts/locations-sub-menu.php") ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="color: black;" id="patients-visitors-btn" class="nav-btn">Patients & Visitors
                    <div style="position: absolute; width:100%; margin: auto auto; pointer-events: none; bottom:0px">
                        <i id="patients-visitors-chevron" class="fa fa-chevron-down chevron-down"></i>
                        <div style="width: 450px;   height:300px; position: fixed; overflow: hidden">
                            <div id="patients-visitors-menu" class="nav-sub-menu-container">
                                <?php include(dirname(__FILE__) . "/template-parts/patients-visitors-menu.php") ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="color: black;" id="contact-us-btn" class="nav-btn">Contact Us

                </div>

            </div>
        </div>
    </div>
    <?php include(dirname(__FILE__) . "/template-parts/sidebar-menu-mobile.php") ?>;