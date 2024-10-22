<?php
$menu_nav_data_url = new WP_REST_Request('GET', '/myplugin/v1/all-nav-menus-data');
$menu_nav_data  = rest_do_request($menu_nav_data_url)->data;

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
    <title>Barnet Dental - Consistent and Reliable Dental Care</title>
    <meta name="keywords" content="Barnet Dental, General Dentistry, Cosmetic Dentistry, Pediatric Dentistry, Orthodontics, Periodontics, Oral Surgery, Prosthodontics, Endodontics, Barnet Dental Testimonials">
    <meta name="description" content="Barnet Dental offers comprehensive dental care including general, cosmetic, and pediatric dentistry. Our expert team ensures reliable and consistent dental services for all your needs.">
    <meta property="og:title" content="Barnet Dental - Consistent and Reliable Dental Care">
    <meta property="og:description" content="Barnet Dental offers comprehensive dental care including general, cosmetic, and pediatric dentistry.">
    <meta property="og:image" content="<?php echo get_template_directory_uri() ?>/images/child-visits-barnet-dental.jpg">
    <meta property="og:url" content="https://barnet-dental-sample.online/">
    <link rel="icon" href="<?php echo get_template_directory_uri() ?>/images/Barnet_no_text.ico" type="image/x-icon">
    <?php wp_head() ?>
</head>

<body>
    <div style="height: 100vh;">
        <div class="header-container-home">
            <div class="social-media-container">
                <div class="social-media-trim">
                    <div style="width: 10%; display: flex; flex-direction: row; justify-content: space-between; pointer-events: fill ">
                        <i style="color: white; font-size: 18px; cursor: pointer;" class="fab fa-facebook" aria-hidden="true"></i>
                        <i style="color: white; font-size: 18px;cursor: pointer;" class="fab fa-instagram" aria-hidden="true"></i>
                        <i style="color: white; font-size: 18px;cursor: pointer;" class="fab fa-twitter" aria-hidden="true"></i>
                    </div>
                    <div style="color: white;"><i style="color: white; font-size: 25px; padding: 0px 10px;  cursor: pointer" class="fas fa-mobile-alt" aria-hidden="true"></i>1-888-3289</div>
                    <div></div>
                </div>
            </div>

            <div style="width: 100%; margin-left: 15%; background-color: white; height: 1px;"></div>

            <div class="nav-container">
                <div style="flex: 0.2; margin-top: 0px">
                    <a href="<?php echo site_url() ?>">
                        <img style=" width: 80px" src="<?php echo get_site_url() ?>/wp-content/uploads/2024/04/BARNET_white_text.svg" />
                    </a>
                </div>
                <div class="tilt-neon-nav" style="flex: 0.8; display: flex; justify-content: space-around; flex-wrap: wrap; min-width: 200px;">
                    <div id="specialty-btn" class="nav-btn">specialty
                        <div style="position: absolute; width:100%; margin: auto auto; pointer-events: none; bottom:0px">
                            <i id="specialty-chevron" class="fa fa-chevron-down chevron-down"></i>
                            <div style="width: 450px; height:300px; position: fixed; overflow: hidden;  ">
                                <div id="specialty-menu" class="nav-sub-menu-container">
                                    <?php include(dirname(__FILE__) . "/template-parts/specialty-menu.php") ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="find-a-dentist-btn" class="nav-btn">find a dentist
                        <div style="position: absolute; width:100%; margin: auto auto; pointer-events: none; bottom:0px">
                            <i id="find-a-dentist-chevron" class="fa fa-chevron-down chevron-down"></i>
                            <div style="width: 450px; height:300px; position: fixed; overflow: hidden;  ">
                                <div id="find-a-dentist-menu" class="nav-sub-menu-container">
                                    <?php include(dirname(__FILE__) . "/template-parts/find-dentist-menu.php") ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="service-btn" class="nav-btn">services
                        <div style="position: absolute; width:100%; margin: auto auto; pointer-events: none; bottom:0px">
                            <i id="service-chevron" class="fa fa-chevron-down chevron-down"></i>
                            <div style="width: 450px;   height:300px; position: fixed; overflow: hidden;  ">
                                <div id="service-menu" class="nav-sub-menu-container">
                                    <?php include(dirname(__FILE__) . "/template-parts/services-nav-menu.php") ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="locations-btn" class="nav-btn">locations
                        <div style="position: absolute; width:100%; margin: auto auto; pointer-events: none; bottom:0px">
                            <i id="locations-chevron" class="fa fa-chevron-down chevron-down"></i>
                            <div style="width: 450px;   height:300px; position: fixed; overflow: hidden">
                                <div id="locations-menu" class="nav-sub-menu-container">
                                    <?php include(dirname(__FILE__) . "/template-parts/locations-sub-menu.php") ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="patients-visitors-btn" class="nav-btn">Patients & Visitors
                        <div style="position: absolute; width:100%; margin: auto auto; pointer-events: none; bottom:0px">
                            <i id="patients-visitors-chevron" class="fa fa-chevron-down chevron-down"></i>
                            <div style="width: 450px;   height:300px; position: fixed; overflow: hidden">
                                <div id="patients-visitors-menu" class="nav-sub-menu-container">
                                    <?php include(dirname(__FILE__) . "/template-parts/patients-visitors-menu.php") ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="contact-us-btn" class="nav-btn">Contact Us
                    </div>

                </div>
            </div>
        </div>

        <?php include(dirname(__FILE__) . "/template-parts/sidebar-menu-mobile.php") ?>