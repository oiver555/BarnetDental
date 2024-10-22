<?php get_header() ?>
<?php
// Get Dentists that perform this service 
$request_url = site_url('/wp-json/myplugin/v1/get-dentists-and-locations-by-service/') .  get_the_ID();
$response = wp_remote_get($request_url);
$response_body = wp_remote_retrieve_body($response);
$dentist_and_location_ids = json_decode($response_body);

$dentist_names = "";
$locations_ids = "";
?>
<div class="relative">
    <?php
    // Check if it's a single post of the 'dentist' post type
    if (is_singular('service')) {
        $featured_image = get_the_post_thumbnail_url(null, 'medium');
    }
    ?>
    <section class="header-margin" style="min-height: 300px; width: 100%;   position:relative;background-image: url('<?php echo get_theme_file_uri("/images/basic-hero.svg"); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="blue-bkg white-color relative relative view-all-container">
            <div style="isolation: isolate;"><i class="fa fa-chevron-left white-color"></i><a href="<?php echo site_url() ?>/services" style="color: inherit; text-decoration: none;">View All</a></div>
        </div>

        <div class="single-procedure-title-image-container">
            <div class="flex-column-around single-procedure-title-container">
                <div>
                    <h1 style="font-size: 3rem;  margin-bottom: 0;"><?php echo  get_the_title() ?></h1>
                </div>
                <div style="font-size: 20px; line-height: 22px;">At Barnet Health, we offer diagnosis and treatment of <?php echo  strtolower(get_the_title()) ?>.</div>
                <div style="display: flex; margin-top: 20px ">
                    <?php
                    foreach ($dentist_and_location_ids->dentist_names->data as $dentist_name) {
                        $dentist_names = $dentist_names . $dentist_name . "/";
                    };
                    foreach ($dentist_and_location_ids->locations_ids as $location_id) {
                        $locations_ids = $locations_ids . $location_id . "/";
                    };
                    ?>
                    <a href="<?php echo site_url() ?>/find-a-dentist/dentists/<?php echo $dentist_names ?>"><button class="cursor-pointer" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 15px; padding: 15px 50px; display: flex; align-items: center;">Find a Provider<i style="font-size: 16px;" class="fa fa-chevron-right chevron"></i></button></a>
                    <a href="<?php echo site_url() ?>/location/locations/<?php echo $locations_ids ?>"><button class="cursor-pointer" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 15px; padding: 15px 50px; display: flex; align-items: center;margin-left: 15px;">Search Locations<i style="font-size: 16px;" class="fa fa-chevron-right chevron"></i></button></a>
                </div>
            </div>
            <div class="single-procedure-title-container-mobile">
                <div>
                    <h1><?php echo  get_the_title() ?></h1>
                </div>
                <div style="font-size: 20px; line-height: 22px;">At Barnet Health, we offer diagnosis and treatment of <?php echo  strtolower(get_the_title()) ?>.</div>
                <div style="  display: flex; margin-top: 20px; flex-wrap: wrap; gap:15px ">
                    <?php
                    foreach ($dentist_and_location_ids->dentist_names->data as $dentist_name) {
                        // $dentist_names = $dentist_names . $dentist_name . "/";
                    };
                    foreach ($dentist_and_location_ids->locations_ids as $location_id) {
                        // $locations_ids = $locations_ids . $location_id . "/";
                    };
                    ?>
                    <a href="<?php echo site_url() ?>/find-a-dentist/dentists/<?php echo $dentist_names ?>"><button class="cursor-pointer" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 15px; padding: 15px 50px; display: flex; align-items: center;">Find a Provider<i style="font-size: 16px;" class="fa fa-chevron-right chevron"></i></button></a>
                    <a href="<?php echo site_url() ?>/location/locations/<?php echo $locations_ids ?>"><button class="cursor-pointer" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 15px; padding: 15px 50px; display: flex; align-items: center; ">Search Locations<i style="font-size: 16px;" class="fa fa-chevron-right chevron"></i></button></a>
                </div>
            </div>
            <div style="flex:.5; width: 100%; height: 80%; ">
                <div class="single-procedure-image-container">
                    <img style="border-radius: 15px; max-height: 100%" src="<?php echo $featured_image ?>">
                </div>
            </div>
        </div>
    </section>
    <section class="single-procedure-description">

        <div style="letter-spacing: 2px; line-height: 30px; font-size: 20px; background: white; border-radius: 15px; padding: 40px">
            <div>
                <h1 style="font-size: xx-large; margin-top: 0;">What is it?</h1>
            </div>
            <?php echo  the_content() ?>
        </div>

    </section>
    <?php get_footer() ?>