<?php

function university_files()
{
    // Enqueue main stylesheet
    wp_enqueue_style('barnet_dental_main_styles', get_stylesheet_uri());
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4');
    wp_enqueue_script('lottie', 'https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.12/lottie.min.js', array(), '5.7.12', true);
    wp_enqueue_script('lottie', 'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.8.1/lottie.min.js', array(), '5.8.1', true);
    wp_enqueue_script('animations', get_theme_file_uri('/src/modules/Animations.js'), array(), null, true);
    wp_localize_script('animations', 'themeData', array(
        'themeUri' => get_template_directory_uri()
    ));
    if (is_page('location')) {
        wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css', array(), '1.9.4');
        wp_enqueue_style('range-slider-css', 'https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.3/rangeslider.min.css', array(), '2.3.3');
        wp_enqueue_script('range-slider-js', 'https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.3/rangeslider.min.js', array('jquery'), '2.3.3', true);
        wp_enqueue_script('leaflet-js', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', array(), '1.9.4', true);
        wp_enqueue_script('map', get_theme_file_uri('src/modules/Map.js'), array('leaflet-js'), null, true);
        wp_enqueue_script('my-location', get_theme_file_uri('/build/location.js'), array(), null, true);
        $location_names = explode('/', get_query_var('locations'));
        if (!empty(array_filter($location_names))) {
            foreach ($location_names as $location_name) {

                $location_ids[] = get_post_id_by_slug($location_name, "location");
            }
        }

        wp_localize_script('my-location', 'wpDataLocation', array(
            "location_ids" => !empty(array_filter($location_names)) ? $location_ids : [],
            'themeUri' => get_template_directory_uri()
        ));
    } else if (is_page('find-a-dentist')) {
        $media_library_url = admin_url('upload.php');
        wp_enqueue_script('find-dentist', get_theme_file_uri('/build/dentists.js'), array(), '2.0', true);
        $dentist_names = explode('/', get_query_var('dentists'));

        $dentist_ids = array();
        if (!empty(array_filter($dentist_names))) {
            foreach ($dentist_names as $dentist_name) {
                $dentist_ids[] = get_post_id_by_slug($dentist_name, "dentist");
            }
        }

        $specialties = get_query_var('specialties');
        wp_localize_script('find-dentist', 'wpDataLocation', array(
            'baseUrl' => esc_url_raw(rest_url()),
            'mediaUrl' =>  $media_library_url,
            'specialties' => $specialties,
            'dentistNames' =>  !empty(array_filter($dentist_names)) ? $dentist_ids : "",
            'themeUri' => get_template_directory_uri()
        ));
        wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css', array(), '1.9.4');
        wp_enqueue_script('leaflet-js', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', array(), '1.9.4', true);
        wp_enqueue_script('map', get_theme_file_uri('src/modules/Map.js'), array('leaflet-js'), null, true);
    } else if (is_page('events')) {
        wp_enqueue_script('events', get_theme_file_uri('build/events.js'), array(), null, true);
        wp_localize_script('events', 'wpDataLocation', array(
            'baseUrl' => home_url()
        ));
    } else if (is_singular('location')) {
        wp_enqueue_script('clamp', get_theme_file_uri('/build/clamp.js'), array(), null, false);
        wp_enqueue_script('locationPost', get_theme_file_uri('/build/locationPost.js'), array(), null, false);
        wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css', array(), '1.9.4');
        wp_enqueue_script('leaflet-js', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', array(), '1.9.4', true);

        wp_enqueue_script('map', get_theme_file_uri('src/modules/Map.js'), array('leaflet-js'), null, true);
    }

    // Enqueue index script
    wp_enqueue_script('index-js', get_theme_file_uri('build/index.js'), array(), '3.0', false);
    wp_localize_script('index-js', 'wpData', array(
        'baseUrl' => home_url()
    ));
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap');
    wp_enqueue_script('nav-bar', get_theme_file_uri('js/NavBar.js'), array(), null, false);
}
add_action('wp_enqueue_scripts', 'university_files');

function get_post_id_by_slug($slug, $type)
{
    // Get the post object by its slug
    $post = get_page_by_path($slug, OBJECT, $type);

    // Check if the post exists
    if ($post) {
        // Return the post ID
        return $post->ID;
    } else {
        // Return false if no post was found
        return false;
    }
}


function my_admin_enqueue_scripts()
{
    $current_screen = get_current_screen();
    if ($current_screen && $current_screen->post_type === 'location' && $current_screen->base === 'post') {

        $nonce = wp_create_nonce('wp_rest');

        // Enqueue the JavaScript file only for the location post type editing/creation screen
        wp_enqueue_script('my-admin-js', get_template_directory_uri() . '/build/dashboard.js', array(), '1.0.0', true);
        wp_localize_script('my-admin-js', 'postData', array(
            'street' => get_field('street_address'),
            'state' => get_field('state'),
            'city' => get_field('city'),
            'zip' => get_field('zip'),
            "id" => get_the_ID(),
            'nonce' =>   $nonce,
            'ajaxurl' => admin_url('admin-ajax.php')
            // Add more data as needed
        ));
    }
}

add_action('acf/input/admin_enqueue_scripts', 'my_admin_enqueue_scripts');

function handle_ajax_request()
{
    // Check if the post ID is provided in the AJAX request
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;

    if ($post_id > 0) {
        // Get the post data based on the post ID
        $post = get_post($post_id);

        // Check if the post exists and is of the 'location' post type
        if ($post && $post->post_type === 'location') {
            // Retrieve additional data or perform any other necessary actions
            $updated_data = array(
                // Example data
                'street' => get_field('street_address', $post_id),
                'state' => get_field('state', $post_id),
                'city' => get_field('city', $post_id),
                'zip' => get_field('zip', $post_id),
                // Add more data as needed
            );

            wp_send_json_success($updated_data); // Send a success response with updated data
        }
    }

    // If the post ID is not provided or the post does not exist or is not of the correct post type
    wp_send_json_error('Invalid post ID or post type');
}

add_action('wp_ajax_get_updated_data', 'handle_ajax_request');


// Handle AJAX request to update post
add_action('wp_ajax_update_post', 'update_post_callback');
function update_post_callback()
{
    // Verify nonce
    check_ajax_referer('update_location_post', 'nonce');

    // Get post ID and data from AJAX request
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    $data = isset($_POST['data']) ? json_decode(wp_unslash($_POST['data']), true) : array();

    // Update post data
    if ($post_id && !empty($data)) {
        $post_data = array();

        // Example: Update post title
        if (isset($data['title'])) {
            // $post_data['post_title'] = sanitize_text_field($data['title']);
        }

        // Update other post fields as needed...

        // Update the post
        // wp_update_post(array(
        //     'ID' => $post_id,
        //     'post_title' => $post_data['post_title'] // Example: Update post title
        //     // Add other fields here...
        // ));

        // Return success response
        wp_send_json_success('Post updated successfully');
    } else {
        // Return error response
        wp_send_json_error('Invalid request');
    }

    // Always exit to avoid extra output
    wp_die();
}


function add_type_module($tag, $handle, $src)
{

    if ('index-js' === $handle || 'map' === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
        return $tag;
    }
    return $tag;
}
add_filter('script_loader_tag', 'add_type_module', 10, 3);

function add_google_fonts_preconnect()
{
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action('wp_head', 'add_google_fonts_preconnect');

function medical_theme_features()
{
    // add_theme_support('title-tag');
    add_theme_support('page-templates');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'medical_theme_features');

add_action('save_post', 'update_custom_post_slug', 10, 3);
function update_custom_post_slug($post_id, $post, $update)
{
    // Check if this is an autosave or a revision
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (wp_is_post_revision($post_id)) {
        return;
    }

    // Check if this is the right post type
    if ($post->post_type !== 'dentist') {
        return;
    }

    // Get the values of the custom fields
    $first_name = get_field('first_name', $post_id);
    $last_name = get_field('last_name', $post_id);
    // Generate the new slug based on custom fields
    $new_slug = sanitize_title($first_name . '-' . $last_name);
    remove_action('save_post', 'update_custom_post_slug');

    // Update the post slug
    wp_update_post(array(
        'ID' => $post_id,
        'post_name' => $new_slug,
    ));
    // unhook this function so it doesn't loop infinitely

    add_action('save_post', 'update_custom_post_slug', 10, 3);
}



function display_dentist_meta_box($post)
{
    // Retrieve the current value of the meta field
    $dentist = get_post_meta($post->ID, 'dentist', true);
?>
    <label style=" vertical-align: top;" for="dentist">Qualified Dentists:</label>
    <textarea style="background: lightgrey; height: 500px; user-select: none;" disabled type="text" id="dentist" name="dentist"><?php echo esc_attr($dentist); ?></textarea>
<?php
}




// This Goes throguh all the Professions and assigns Dentists that match
// add_action('init', 'set_qualified_dentist_for_profession');
function set_qualified_dentist_for_profession()
{
    $dentist_query = new WP_Query(array(
        'post_type' => 'dentist',
        'posts_per_page' => -1,
    ));
    if ($dentist_query->have_posts()) {
        while ($dentist_query->have_posts()) {
            $dentist_query->the_post();
            $professions = get_field("professions"); //Get Services that the Dentist performs
            $name = get_field("first_name") . " " . get_field("last_name");
            //For Each Service that the Dentist performs add their Name to the Dentist Meta Box in the Service Post 
            foreach ($professions as $profession) {
                if (!empty($profession->post_title)) {
                    $query = new WP_Query(array(
                        'post_type' => 'profession',
                        'post_status' => 'publish',
                        'posts_per_page' => 1,
                        'title' => sanitize_text_field($profession->post_title),
                    ));
                    if ($query->have_posts()) {
                        $query->the_post();
                        $profession_id = get_the_ID();
                        $current_value = get_post_meta($profession_id, 'dentist', true);
                        $new_value = '';

                        if ($current_value && strpos($current_value, $name) === false) {
                            $new_value = $current_value  . ', ' . $name;
                        } else if (strpos($current_value, $name) !== false) {
                            $new_value =  $current_value;
                        } else {
                            $new_value = $name;
                        }
                        update_post_meta($profession_id, 'dentist', $new_value);
                    }
                    wp_reset_postdata();
                }
            }
        }
        wp_reset_postdata(); // Restore global post data
    }
}

// This turns the Service's Metabox called Dentist into an Array before getting returned by the REST api
add_action('rest_api_init', function () {
    register_rest_field('service', 'dentist', array(
        'get_callback' => function ($post_arr) {
            $dentists_string = get_post_meta($post_arr['id'], 'dentist', true);
            $dentists_array = explode(', ', $dentists_string);
            return $dentists_array;
        },
    ));
});

//Keeps the Profession Posts Synced with the Profession ACF Field Choices.
//Each ACF Profession Choice must be a Post in order to search by a profession with the REST API
function create_profession_posts($field)
{
    $existing_professions = get_posts(array(
        'post_type' => 'profession',
        'posts_per_page' => -1,
        'fields' => 'ids' // Retrieve only post IDs for faster processing
    ));
    $existing_professions_names = array();
    foreach ($existing_professions as $profession_id) {
        $profession_name = get_the_title($profession_id);
        $existing_professions_names[$profession_name] = $profession_id;
    }

    foreach (array_values($field["choices"]) as $profession) {
        // Check if profession post already exists
        if (isset($existing_professions_names[$profession])) {
            // Remove the profession from the existing array
            unset($existing_professions_names[$profession]);
        } else {
            // Create a new profession post
            wp_insert_post(array(
                'post_title' => $profession,
                'post_type' => 'profession',
                'post_status' => 'publish'
            ));
        }
    }

    return $field;
}
// add_filter('acf/update_field/key=field_661eea304a4b2', 'create_profession_posts', 10, 1);
function set_specialty_for_dentists()
{
    $dentist_query = new WP_Query(array(
        'post_type' => 'dentist',
        'posts_per_page' => -1,
    ));
    if ($dentist_query->have_posts()) {
        while ($dentist_query->have_posts()) {
            $dentist_query->the_post();
            $professions = get_field("profession"); //Get professions that the Dentist performs
            $name = get_field("first_name") . " " . get_field("last_name");
            //For Each Service that the Dentist performs add their Name to the Dentist Meta Box in the Service Post 
            foreach ($professions as $profession) {
                if (!empty($profession->post_title)) {
                    $query = new WP_Query(array(
                        'post_type' => 'profession',
                        'post_status' => 'publish',
                        'posts_per_page' => 1,
                        'title' => sanitize_text_field($profession->post_title),
                    ));
                    if ($query->have_posts()) {
                        $query->the_post();
                        $service_id = get_the_ID();
                        $current_value = get_post_meta($service_id, 'dentist', true);
                        $new_value = '';

                        if ($current_value && strpos($current_value, $name) === false) {
                            $new_value = $current_value  . ', ' . $name;
                        } else if (strpos($current_value, $name) !== false) {
                            $new_value =  $current_value;
                        } else {
                            $new_value = $name;
                        }
                        update_post_meta($service_id, 'dentist', $new_value);
                    }
                    wp_reset_postdata();
                }
            }
        }
        wp_reset_postdata(); // Restore global post data
    }
}

function get_qualified_dentists($request, $type)
{
    $dentist_query = new WP_Query(array(
        'post_type' => 'dentist',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => $type === "service" ? 'procedures' : $type, // Replace 'your_acf_field_name' with the name of your ACF field
                'value' => sanitize_text_field(strtolower($request)),
                'compare' => 'LIKE' // Use '=' for exact value matching
            )
        )
    ));
    $response = array();
    foreach ($dentist_query->posts as $post) {
        $response[] =   $post->ID;
    }
    return rest_ensure_response($response);
}
function get_all_dentists()
{
    $dentist_query = new WP_Query(array(
        'post_type' => 'dentist',
        'posts_per_page' => -1,
    ));
    $post_data = array();
    while ($dentist_query->have_posts()) {
        $dentist_query->the_post();
        $locationID = get_field("location")[0]->ID;
        $post_data[] = array(
            'ID' => get_the_ID(),
            'name' => get_field("first_name") . " " . get_field("last_name"),
            'title' => get_field("title"),
            'type' => get_field("type"),
            'available' => get_field("available"),
            'language' => get_field("language"),
            'locationName' =>  get_field("name", $locationID),
            'locationLat' => get_field("lattitude", $locationID),
            'locationLon' =>  get_field("longitude", $locationID),
            'locationCity' =>  get_field("city", $locationID),
            'locationAddress' =>  get_field("street_address", $locationID),
            'locationZip' =>  get_field("zip", $locationID),
            'locationState' =>  get_field("state", $locationID),
            "locationID" => $locationID,
            'link' => get_permalink(get_the_ID()),
            'featured_media' => get_the_post_thumbnail_url(get_the_ID(), 'full'), // Get featured media URL 
        );
    }
    return rest_ensure_response($post_data);
}
function get_all_locations()
{
    $location_query = new WP_Query(array(
        'post_type' => 'location',
        'nopaging' => true,
    ));
    $post_data = array();
    while ($location_query->have_posts()) {
        $location_query->the_post();

        $post_data[] = array(
            'name' =>  get_field("name"),
            'lat' => get_field("lattitude"),
            'lon' =>  get_field("longitude"),
            'city' =>  get_field("city"),
            'address' =>  get_field("street_address"),
            'zip' =>  get_field("zip"),
            'state' =>  get_field("state"),
            'link' => get_permalink(get_the_ID()),
            "id" => get_the_ID(),
            "phone" => get_field("phone_number"),
            "type" => get_field("type")
        );
    }
    return rest_ensure_response($post_data);
}

function get_all_insurance()
{
    return    array_values(get_field_object("field_661eebb94a4bd")["choices"]);
}
function get_all_languages()
{
    return array_values(get_field_object("field_662bcec5bfebd")["choices"]);
}
function get_all_specialties()
{
    return array_values(get_field_object("field_661eea304a4b2")["choices"]);
}
function get_all_location_types()
{
    return array_values(get_field_object("field_6622fbf295055")["choices"]);
}
function get_all_services()
{
    return array_values(get_field_object("field_6631a34219dab")["choices"]);
}

function get_dentists_by_service($request)
{
    $services = get_field_object("field_6631a34219dab")["choices"];
    $request =  strtolower(urldecode($request->get_param('service')));
    $services = array_values($services);
    $matching_services = array();


    foreach (array_values($services) as $service) {
       
      
        if (stripos($service, $request) !== false) {
            $dentists = get_qualified_dentists($service, "service");
            $service_post = new WP_Query(array(
                'post_type' => 'service',
                'posts_per_page' => 1,
                'title'          => $service,
            ));

            $post_data = array();

            foreach ($dentists->data as $dentistID) {
                $post_data[] = get_post($dentistID)->post_name;
            }



            $matching_services[] = array($service => [
                "img_url" => get_the_post_thumbnail_url($service_post->posts[0]->ID, 'thumbnail'),
                "data" => $post_data
            ]);
        }
    }


    return $matching_services;
}

function get_matching_professions($request)
{

    try {


        $test = new WP_Query(array(
            'post_type' => "specialty",
            'nopaging' => true,
        ));

        $professions = get_field_object("field_661eea304a4b2")["choices"]; //Get the ACF Values for profession
        $params = $request->get_params();
        $request = isset($params['specialty']) ? $params['specialty'] : '';
        $request = preg_replace('/-/', ' ', $request);


        foreach ($test->posts as $profession) {
            if (strpos(strtolower($profession->post_title), strtolower($request)) !== false) {
                $dentistsIDs = get_qualified_dentists($profession->post_title, "type");

                $dentistsString = implode(',', $dentistsIDs->data);
                $dentistsString = str_replace(array('[', ']'), '', $dentistsString);
                $request2 = new WP_REST_Request('GET', '/myplugin/v1/specific-dentists/');
                $request2->set_param('dentist_ids', $dentistsString);
                $dentists = get_dentists_by_ids($request2);
                $featured_image_html = wp_get_attachment_image_url(get_post_thumbnail_id($profession->ID), 'thumbnail');
                $matching_professions[] = array($profession->post_title => array("data" => $dentists, "featured_image" => $featured_image_html));
            }
        }

        return isset($matching_professions) ? $matching_professions : array();
    } catch (Exception $e) {
        error_log('Error in REST API endpoint: ' . $e->getMessage());
        return new WP_Error('rest_error', __('Error occurred', 'text-domain'), array('status' => 500));
    }
}

function get_locations_by_type($request)
{
    $type = strtolower(urldecode($request->get_param('type')));

    $locations = new WP_Query(array(
        'post_type' => 'location',
        'nopaging' => true,
        'meta_query' => array(
            array(
                'key' => "type", // Replace 'your_acf_field_name' with the name of your ACF field
                'value' => sanitize_text_field($type),
                'compare' => 'LIKE' // Use '=' for exact value matching
            )
        )
    ));

    $data = [];
    while ($locations->have_posts()) {
        $locations->the_post();
        $data[] = array(
            "name" => get_field("name"),
            "address" => get_field("street_address"),
            "city" => get_field("city"),
            "state" => get_field("state"),
            "zip" => get_field("zip"),
            "phone" => get_field("phone_number"),
            "type" => get_field("type"),
            "id" => get_the_id(),
            "link" => get_the_permalink(),
            "lat" => get_field("lattitude"),
            "lon" => get_field("longitude"),
        );
    }

    return $data;
}

function get_locations_by_id($request)
{

    $ids = urldecode($request->get_param('ids'));

    $locations = new WP_Query(array(
        'post_type' => 'location',
        'nopaging' => true,
        'post__in' => json_decode($ids, true)
    ));

    $data = [];
    while ($locations->have_posts()) {
        $locations->the_post();
        $data[] = array(
            "name" => get_field("name"),
            "address" => get_field("street_address"),
            "city" => get_field("city"),
            "state" => get_field("state"),
            "zip" => get_field("zip"),
            "phone" => get_field("phone_number"),
            "type" => get_field("type"),
            "id" => get_the_id(),
            "link" => get_the_permalink(),
            "lat" => get_field("lattitude"),
            "lon" => get_field("longitude"),
        );
    }

    return $data;
}

// First get dentists the can perform service
// Then get the location of the dentists
function get_locations_by_service($id)
{

    $dentists = new WP_Query(array(
        'post_type' => 'dentist', // Change 'dentist' to your custom post type name 
        'meta_query' => array(
            array(
                'key' => 'procedures', // Change 'location' to the actual ACF field name used for storing the location
                'value' => sanitize_text_field(str_replace("&#8217;", "'", get_the_title($id))),
                'compare' => 'LIKE',
            ),
        ),

    ));


    $location_ids = [];
    foreach ($dentists->posts as $dentist) {
        $location_ids[] = get_field("location", $dentist->ID,)[0]->ID;
    }
    return $location_ids;
}

function get_dentists_by_ids($request)
{
    // Get the URL parameter 'dentist_ids' from the request
    $dentist_ids = $request->get_param('dentist_ids');
    $dentist_ids = urldecode($dentist_ids);


    $dentist_ids = array_map('intval', explode(',', $dentist_ids));
    // print_r($dentist_ids);
    $args = array(
        'post_type'      => 'dentist', // Change 'dentist' to your custom post type name
        'nopaging' => true,
        'post__in'       => $dentist_ids,
    );

    // Perform the query
    $query = new WP_Query($args);

    while ($query->have_posts()) {
        $query->the_post();
        $locationID = get_field("location")[0]->ID;

        $post_data[] = array(
            'ID' => get_the_ID(),
            'name' => get_field("first_name") . " " . get_field("last_name"),
            'title' => get_field("title"),
            'type' => get_field("type"),
            'available' => get_field("available"),
            'language' => get_field("language"),
            'insuranceAccepted' => get_field("insurance_accepted"),
            'locationName' =>  get_field("name", $locationID),
            'locationLat' => get_field("lattitude", $locationID),
            'locationLon' =>  get_field("longitude", $locationID),
            'locationCity' =>  get_field("city", $locationID),
            'locationState' =>  get_field("state", $locationID),
            'locationZip' =>  get_field("zip", $locationID),
            'locationAddress' =>  get_field("street_address", $locationID),
            "locationID" => $locationID,
            'link' => get_permalink(get_the_ID()),
            'featured_media' => get_the_post_thumbnail_url(get_the_ID(), 'full'), // Get featured media URL 
        );
    }

    return $post_data;
}
function get_dentists_by_name($request)
{
    // Get the URL parameter 'dentist_ids' from the request 
    $params = $request->get_params();
    $name = isset($params['name']) ? $params['name'] : '';

    // Initialize meta_query array
    $meta_query = array('relation' => 'OR');

    if (strpos($name, '%20') !== false) {
        // $name contains at least one space 
        $nameArray = explode('%20', $name);
    } else {
        // Only one word, wrap it in an array to keep the logic consistent
        $nameArray = array($name);
    }

    // Loop through all words (whether one or more) and add meta query for both first and last names
    foreach ($nameArray as $word) {
        $meta_query[] = array(
            'relation' => 'OR',
            array(
                'key'     => 'first_name',
                'value'   => $word,
                'compare' => 'LIKE'
            ),
            array(
                'key'     => 'last_name',
                'value'   => $word,
                'compare' => 'LIKE'
            )
        );
    }

    // Query arguments
    $args = array(
        'post_type'   => 'dentist', // Change 'dentist' to your custom post type name
        'nopaging'    => true,
        'meta_query'  => $meta_query, // Include the meta_query in the query arguments
    );

    // Perform the query
    $query = new WP_Query($args);

    // Initialize post_data array
    $post_data = array();

    // Gather post data
    while ($query->have_posts()) {
        $query->the_post();
        $post_data[] = array(
            'ID' => get_the_ID(),
            'name' => get_field("first_name", get_the_ID()) . " " . get_field("last_name", get_the_ID()),
            'title' => get_field("title", get_the_ID()),
            'type' => get_field("type", get_the_ID()),
            'link' => get_permalink(get_the_ID()),
            'featured_media' => get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'), // Get featured media URL 
        );
    }

    // Return results or an empty array if no posts found
    return isset($post_data) ? $post_data : [];
}


function get_dentists_by_location($request)
{

    // Get the URL parameter 'dentist_ids' from the request
    $location_id = $request->get_param('location_id');
    $location_id = urldecode($location_id);


    // Perform the query
    $query = new WP_Query(array(
        'post_type' => 'dentist', // Change 'dentist' to your custom post type name 
        'meta_query' => array(
            array(
                'key' => 'location', // Change 'location' to the actual ACF field name used for storing the location
                'value' => sanitize_text_field($location_id),
                'compare' => 'LIKE',
            )
        )
    ));

    while ($query->have_posts()) {
        $query->the_post();
        $post_data[] = array(
            'name' => get_field("first_name") . " " . get_field("last_name"),
            'title' => get_field("title"),
            'type' => get_field("type"),
            'link' => get_permalink(get_the_ID()),
            'featured_media' => get_the_post_thumbnail_url(get_the_ID(), 'full'), // Get featured media URL 
        );
    }

    return $post_data;
}

function get_dentists_filtered($request)
{
    $gender = $request->get_param('gender');
    $language = $request->get_param('language');
    $insruance = $request->get_param('insruance');
    $onlyShowAvailable = $request->get_param('available');
    $onlyShowAvailable = filter_var($onlyShowAvailable, FILTER_VALIDATE_BOOLEAN);
    $only_barnet_dentists = $request->get_param('only-barnet-dentists');
    $only_barnet_dentists = filter_var($only_barnet_dentists, FILTER_VALIDATE_BOOLEAN);
    $dentists_by_location = $request->get_param('location');

    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'dentist',
        'meta_query' => array()
    );

    // Add meta query for gender if it's set
    if ($gender) {
        $args['meta_query'][] = array(
            'key' => 'gender',
            'value' =>  sanitize_text_field($gender),
            'compare' => '='
        );
    }

    // Add meta query for only_barnet_dentists if it's set
    if ($only_barnet_dentists) {
        $args['meta_query'][] = array(
            'key' => 'barnet_dentist',
            'value' => true, // Assuming 0 indicates false
            'compare' => '='
        );
    }

    if ($onlyShowAvailable) {
        $args['meta_query'][] = array(
            'key' => 'available',
            'value' => sanitize_text_field($onlyShowAvailable), // Assuming true/false values for availability
            'compare' => '='
        );
    }
    if ($dentists_by_location) {
        $args['meta_query'][] = array(
            'key' => 'location',
            'value'   => '"' . sanitize_text_field($dentists_by_location) . '"', // Get Dentists that have the same location
            'compare' => 'LIKE'
        );
    }
    if ($language) {
        $args['meta_query'][] = array(
            'key' => 'language',
            'value'   => sanitize_text_field($language),
            'compare' => 'LIKE'
        );
    }
    if ($insruance) {
        $args['meta_query'][] = array(
            'key' => 'insruance',
            'value'   => sanitize_text_field($insruance),
            'compare' => 'LIKE'
        );
    }


    $posts = new WP_Query($args);

    $data = [];
    while ($posts->have_posts()) {
        $posts->the_post();
        $locationID = get_field("location")[0]->ID;
        $data[] = array(
            'ID' => get_the_ID(),
            'name' => get_field("first_name") . " " . get_field("last_name"),
            'title' => get_field("title"),
            'type' => get_field("type"),
            'available' => get_field("available"),
            'language' => get_field("language"),
            'insuranceAccepted' => get_field("insurance_accepted"),
            'locationName' =>  get_field("name", $locationID),
            'locationLat' => get_field("lattitude", $locationID),
            'locationLon' =>  get_field("longitude", $locationID),
            'locationCity' =>  get_field("city", $locationID),
            "locationID" => $locationID,
            'link' => get_permalink(get_the_ID()),
            'featured_media' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
        );
    }

    return $data;
}
function get_locations_filtered($request)
{
    $type = $request->get_param('type');
    $service = $request->get_param('service');

    // Add meta query for gender if it's set
    if ($type && $service) {

        $args = array(
            'post_type'      => 'dentist',
            'posts_per_page' => -1, // Retrieve all dentists
            'meta_query'     => array(
                array(
                    'key'     => 'services', // ACF field key
                    'value'   => sanitize_text_field($service),   // Value to search for
                    'compare' => 'LIKE'        // Match the value anywhere in the meta_value
                )
            )
        );
        $posts = new WP_Query($args);
        $data = [];
        while ($posts->have_posts()) {
            $posts->the_post();
            //Get the Location Details For Each Dentist
            $locationID = get_field("location")[0]->ID;

            if ($type == get_field("type", $locationID)) {
                $data[] = array(
                    "name" => get_field("name", $locationID),
                    "address" => get_field("street_address", $locationID),
                    "city" => get_field("city", $locationID),
                    "state" => get_field("state", $locationID),
                    "zip" => get_field("zip", $locationID),
                    "phone" => get_field("phone_number", $locationID),
                    "type" => get_field("type", $locationID),
                    "id" => $locationID,
                    "link" => get_the_permalink($locationID),
                    "lat" => get_field("lattitude", $locationID),
                    "lon" => get_field("longitude", $locationID),
                );
            }
        }
        //Return the Locations where the service is offered
        return $data;
    } else if ($type) {
        $args = array(
            'nopaging' => true,
            'post_type' => 'location',
            'meta_query' => array()
        );
        $args['meta_query'][] = array(
            'key' => 'type',
            'value' => sanitize_text_field($type),
            'compare' => '='
        );

        $posts = new WP_Query($args);

        $data = [];
        while ($posts->have_posts()) {
            $posts->the_post();
            $data[] = array(
                "name" => get_field("name"),
                "address" => get_field("street_address"),
                "city" => get_field("city"),
                "state" => get_field("state"),
                "zip" => get_field("zip"),
                "phone" => get_field("phone_number"),
                "type" => get_field("type"),
                "id" => get_the_id(),
                "link" => get_the_permalink(),
                "lat" => get_field("lattitude"),
                "lon" => get_field("longitude"),
            );
        }

        return $data;
    } else  if ($service) {

        //Get Dentists the Offer service
        $args = array(
            'post_type'      => 'dentist',
            'posts_per_page' => -1, // Retrieve all dentists
            'meta_query'     => array(
                array(
                    'key'     => 'services', // ACF field key
                    'value'   => sanitize_text_field(urldecode($service)),   // Value to search for
                    'compare' => 'LIKE'        // Match the value anywhere in the meta_value
                )
            )
        );
        $posts = new WP_Query($args);
        $data = [];
        while ($posts->have_posts()) {
            $posts->the_post();
            //Get the Location Details For Each Dentist
            $locationID = get_field("location")[0]->ID;
            $data[] = array(
                "name" => get_field("name", $locationID),
                "address" => get_field("street_address", $locationID),
                "city" => get_field("city", $locationID),
                "state" => get_field("state", $locationID),
                "zip" => get_field("zip", $locationID),
                "phone" => get_field("phone_number", $locationID),
                "type" => get_field("type", $locationID),
                "id" => $locationID,
                "link" => get_the_permalink($locationID),
                "lat" => get_field("lattitude", $locationID),
                "lon" => get_field("longitude", $locationID),
            );
        }
        //Return the Locations where the service is offered
        return $data;
    }
}


function get_all_venues()
{
    $events = new WP_Query(array(
        'post_type' => 'event',
        'nopaging' => true,
    ));
    $locations = array();
    foreach ($events->posts as $post) {

        $locations[] = array(
            "id" => get_field("venue", $post->ID)[0]->ID,
            "name" => get_field("venue", $post->ID)[0]->post_title,
        );
    }
    return $locations;
}
function get_all_events()
{
    $events_query = new WP_Query(array(
        'post_type' => 'event',
        'nopaging' => true,
    ));
    $events = array();
    foreach ($events_query->posts as $event) {
        $title = get_field("title", $event->ID);
        $start_time = get_field("start_time", $event->ID);
        $end_time = get_field("end_time", $event->ID);
        $date_string = get_field("date", $event->ID);
        $date_obj = DateTime::createFromFormat('mdY', str_replace('/', '', $date_string));
        $month = $date_obj->format('M');
        $date = $date_obj->format('d');
        $year = $date_obj->format('Y');
        $day = $date_obj->format('l');
        $price = get_field("price", $event->ID);
        $free = get_field("free", $event->ID);
        $event_url = get_permalink($event->ID);

        $events[] = array(
            "title" => $title,
            "start_time" => $start_time,
            "end_time" => $end_time,
            "day" => $day,
            "month" => $month,
            "date" => $date,
            "year" => $year,
            "price" => $price,
            "free" => $free,
            "event_url" => $event_url
        );
    }
    return $events;
}

function get_events_by_type($request)
{
    $type = $request->get_param('type');

    $events = new WP_Query(array(
        'post_type' => 'event',
        'nopaging' => true,
        'meta_query'  => array(
            array(
                'key' => 'type',
                'value' => sanitize_text_field($type),
                'compare' => 'LIKE'
            )
        )
    ));

    $results = array();

    foreach ($events->posts as $event) {
        $title = get_field("title", $event->ID);
        $start_time = get_field("start_time", $event->ID);
        $end_time = get_field("end_time", $event->ID);
        $date_string = get_field("date", $event->ID);
        $date_obj = DateTime::createFromFormat('mdY', str_replace('/', '', $date_string));
        $month = $date_obj->format('M');
        $date = $date_obj->format('d');
        $year = $date_obj->format('Y');
        $day = $date_obj->format('l');
        $price = get_field("price", $event->ID);
        $free = get_field("free", $event->ID);
        $event_url = get_permalink($event->ID);
        $results[] = array(
            "title" => $title,
            "start_time" => $start_time,
            "end_time" => $end_time,
            "day" => $day,
            "month" => $month,
            "date" => $date,
            "year" => $year,
            "price" => $price,
            "free" => $free,
            "event_url" => $event_url
        );
    }
    return $results;
}
function get_events_by_venue($request)
{
    $location_id = urldecode($request->get_param('location_id'));

    $events = new WP_Query(array(
        'post_type' => 'event',
        'nopaging' => true,
        'meta_query'  => array(
            array(
                'key' => 'venue',
                'value' => sanitize_text_field($location_id),
                'compare' => 'LIKE'
            )
        )
    ));
    $results = array();

    foreach ($events->posts as $event) {
        $title = get_field("title", $event->ID);
        $start_time = get_field("start_time", $event->ID);
        $end_time = get_field("end_time", $event->ID);
        $date_string = get_field("date", $event->ID);
        $date_obj = DateTime::createFromFormat('mdY', str_replace('/', '', $date_string));
        $month = $date_obj->format('M');
        $date = $date_obj->format('d');
        $year = $date_obj->format('Y');
        $day = $date_obj->format('l');
        $price = get_field("price", $event->ID);
        $free = get_field("free", $event->ID);
        $event_url = get_permalink($event->ID);
        $results[] = array(
            "title" => $title,
            "start_time" => $start_time,
            "end_time" => $end_time,
            "month" => $month,
            "date" => $date,
            "day" => $day,
            "year" => $year,
            "price" => $price,
            "free" => $free,
            "event_url" => $event_url
        );
    }
    return $results;
}

function get_date_range($date_range)
{

    $start_date = new DateTime();
    $end_date = new DateTime();
    switch ($date_range) {
        case 'This Week':
            $start_date->modify('this week');
            $end_date->modify('this week +6 days');
            break;
        case 'Next Week':
            $start_date->modify('next week');
            $end_date->modify('next week +6 days');
            break;
        case 'This Month':
            $start_date->modify('first day of this month');
            $end_date->modify('last day of this month');
            break;
        case 'Next 3 Months':
            $start_date->modify('first day of this month');
            $end_date->modify('last day of +2 months');
            break;
        case 'Next 6 Months':
            $start_date->modify('first day of this month');
            $end_date->modify('last day of +5 months');
            break;
        default:
            // Default to this week if no filter is provided
            // $start_date->modify('this week');
            // $end_date->modify('this week +6 days');
            break;
    }

    return array($start_date->format('Ymd'), $end_date->format('Ymd'));
}

function get_events_by_date_range($filter)
{

    list($start_date, $end_date) = get_date_range($filter);
    // print_r($end_date);
    $events = new WP_Query(array(
        'post_type' => 'event',
        'nopaging' => true,
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'date',
                'value' => sanitize_text_field($start_date),
                'compare' => '>=',
                'type' => 'DATE'
            ),
            array(
                'key' => 'date',
                'value' => sanitize_text_field($end_date),
                'compare' => '<=',
                'type' => 'DATE'
            )
        )
    ));

    return $events->posts;
}

function filter_events($request)
{
    $type = $request->get_param('type');
    $location_id = $request->get_param('location_id');
    if ($location_id) $location_id = urldecode($location_id);
    $date_range = $request->get_param('date-range');
    if ($date_range) $date_range = urldecode($date_range);
    $keyword = $request->get_param('keyword');
    if ($keyword) $keyword = urldecode($keyword);

    $arg = array();
    if ($type) {
        $arg[] = array(
            'key' => 'type',
            'value' => $type,
            'compare' => 'LIKE'
        );
    }
    if ($location_id) {
        $arg[] =   array(
            'key' => 'venue',
            'value' => $location_id,
            'compare' => 'LIKE'
        );
    }
    if ($date_range) {

        list($start_date, $end_date) = get_date_range($date_range);
        $arg[] = array(
            'relation' => 'AND',
            array(
                'key' => 'date',
                'value' => $start_date,
                'compare' => '>=',
                'type' => 'DATE'
            ),
            array(
                'key' => 'date',
                'value' => $end_date,
                'compare' => '<=',
                'type' => 'DATE'
            )
        );
    }
    if ($keyword) {
        $arg[] =   array(
            'key' => 'title',
            'value' => $keyword,
            'compare' => 'LIKE'
        );
    }

    if ($type || $location_id || $date_range || $keyword) {
        $events = new WP_Query(array(
            'post_type' => 'event',
            'nopaging' => true,
            'meta_query'  => sanitize_text_field($arg)
        ));

        $results = array();

        foreach ($events->posts as $event) {
            $title = get_field("title", $event->ID);
            $start_time = get_field("start_time", $event->ID);
            $end_time = get_field("end_time", $event->ID);
            $date_string = get_field("date", $event->ID);
            $date_obj = DateTime::createFromFormat('mdY', str_replace('/', '', $date_string));
            $month = $date_obj->format('M');
            $date = $date_obj->format('d');
            $year = $date_obj->format('Y');
            $day = $date_obj->format('l');
            $price = get_field("price", $event->ID);
            $free = get_field("free", $event->ID);
            $event_url = get_permalink($event->ID);
            $results[] = array(
                "title" => $title,
                "start_time" => $start_time,
                "end_time" => $end_time,
                "day" => $day,
                "month" => $month,
                "date" => $date,
                "year" => $year,
                "price" => $price,
                "free" => $free,
                "event_url" => $event_url
            );
        }
        return $results;
    } else {
        return array();
    }
}

// function migrate_procedure_to_service() {
//     $args = array(
//         'post_type' => 'procedure',
//         'posts_per_page' => -1,
//         'post_status' => 'any'
//     );

//     $posts = get_posts($args);

//     foreach ($posts as $post) {
//         set_post_type($post->ID, 'service');
//     }
// }

// add_action('init', 'migrate_procedure_to_service');


function get_all_nav_menus_data()
{
    $specialties = get_all_specialties();
    $location_types =  get_all_location_types();
    $services_ids = new WP_Query(array(
        'post_type' => 'service',
        'posts_per_page' => 6,
        'orderby'        => 'rand',
        'fields'    => 'ids'
    ));
    $services = array();
    foreach ($services_ids->posts as $service) {


        $services[] = array(
            "title" => get_the_title($service),
            "link" => get_permalink($service),
        );
    }

    return array(
        'specialties' => $specialties,
        'location_types' => $location_types,
        'services' => $services,
    );
}



// This is for the single-service posts. I am batching two Get Request in this function in order to avoid doing it on the frontend.
// Im getting all Dentists and Locations that provide a specific service 
function get_dentists_and_locations_by_service($request)
{
    $service_id = $request->get_param('service_id');
    $get_request = new WP_REST_Request('GET');
    $get_request->set_param('service', urldecode(str_replace("&#8217;", "'", get_the_title($service_id))));
    $dentists_n_service = get_dentists_by_service($get_request);
    //Get Locations where service is performed  
    $location_ids = get_locations_by_service($service_id);
    $location_slugs = array();
    foreach ($location_ids as $location_id) {
        $location_slugs[] = get_post_field('post_name', $location_id);;
    };
    // error_log(print_r(array(
    //     "dentist_names" => $dentists_n_service[0][str_replace("&#8217;", "'", get_the_title($service_id))],
    //     "locations_ids"  => $location_slugs
    // ), true));
    // error_log(str_replace("&#8217;", "'", get_the_title($service_id)));
    // error_log();

    return array(
        "dentist_names" => $dentists_n_service[0][str_replace("&#8217;", "'", get_the_title($service_id))],
        "locations_ids"  => $location_slugs
    );
}

add_action('rest_api_init', function () {

    register_rest_route('myplugin/v1', '/all-dentists', array(
        'methods'  => 'GET',
        'callback' => 'get_all_dentists',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/specific-dentists/(?P<dentist_ids>[^/]+)', array(
        'methods'  => 'GET',
        'callback' => 'get_dentists_by_ids',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/dentists-by-name/(?P<name>[^/]+)', array(
        'methods'  => 'GET',
        'callback' => 'get_dentists_by_name',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/dentists-by-location/(?P<location_id>[^/]+)', array(
        'methods'  => 'GET',
        'callback' => 'get_dentists_by_location',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/services/(?P<service>[^/]+)/', array(
        'methods'  => 'GET',
        'callback' => 'get_dentists_by_service',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/dentists-by-specialty/(?P<specialty>[^/]+)', array(
        'methods'  => 'GET',
        'callback' => 'get_matching_professions',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/filtered-dentist', array(
        'methods'  => 'GET',
        'callback' => 'get_dentists_filtered',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/insurances', array(
        'methods'  => 'GET',
        'callback' => 'get_all_insurance',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/languages', array(
        'methods'  => 'GET',
        'callback' => 'get_all_languages',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/all-specialties', array(
        'methods'  => 'GET',
        'callback' => 'get_all_specialties',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/all-location-types', array(
        'methods'  => 'GET',
        'callback' => 'get_all_location_types',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/get-locations-by-type', array(
        'methods'  => 'GET',
        'callback' => 'get_locations_by_type',
        'permission_callback' => '__return_true',
    ));

    register_rest_route('myplugin/v1', '/get-location-by-id', array(
        'methods'  => 'GET',
        'callback' => 'get_locations_by_id',
        'permission_callback' => '__return_true',
    ));

    register_rest_route('myplugin/v1', '/get-dentists-and-locations-by-service/(?P<service_id>[^/]+)', array(
        'methods'  => 'GET',
        'callback' => 'get_dentists_and_locations_by_service',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/all-locations', array(
        'methods'  => 'GET',
        'callback' => 'get_all_locations',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/locations-filtered', array(
        'methods'  => 'GET',
        'callback' => 'get_locations_filtered',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/all-services', array(
        'methods'  => 'GET',
        'callback' => 'get_all_services',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/venues', array(
        'methods'  => 'GET',
        'callback' => 'get_all_venues',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/all-events', array(
        'methods'  => 'GET',
        'callback' => 'get_all_events',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/filter-events', array(
        'methods'  => 'GET',
        'callback' => 'filter_events',
        'permission_callback' => '__return_true',
    ));
    register_rest_route('myplugin/v1', '/all-nav-menus-data', array(
        'methods'  => 'GET',
        'callback' => 'get_all_nav_menus_data',
        'permission_callback' => '__return_true',
    ));
});

// Add a filter to inspect the SQL query
add_filter('posts_request', 'my_posts_request_filter', 10, 2);

// DEBUG
function my_posts_request_filter($sql, $query)
{
    // Output the SQL query for debugging

    // Return the original SQL query
    return $sql;
}


function logData()
{

    $service_posts = new WP_Query(array(
        'post_type' => 'service',
        'post_per_page' => -1,
        'nopaging' => true,
    ));

    $log_file_path = "C:\\Users\\osain\\Local Sites\\barnet-health\\app\\public\\wp-content\\themes\\medical-theme\\logs\\logfile.log";
    $log_file = fopen($log_file_path, 'a');

    // Check if the file was opened successfully
    if ($log_file) {
        // Loop through each service post and write its title to the file
        foreach ($service_posts->posts as $service) {
            $title = $service->post_title;
            // Write the title to the file
            fwrite($log_file, $title . PHP_EOL); // PHP_EOL adds a newline character
        }
        // Close the file
        fclose($log_file);
    } else {
        // Log an error if the file couldn't be opened
    }
}

add_action('init', 'rewrite_rule_example');
/**
 * Add rewrite rule for a pattern matching "post-by-slug/<post_name>"
 */
function rewrite_rule_example()
{
    // flush_rewrite_rules();
    add_rewrite_tag('%specialties%', '([a-zA-Z-]+)', 'specialties=');
    add_rewrite_rule('^find-a-dentist/specialties/([^/]*)/?$', 'index.php?pagename=find-a-dentist&specialties=$matches[1]', 'top');

    add_rewrite_tag('%dentists%', '([^/]*)', 'dentists=');
    add_rewrite_rule(
        '^find-a-dentist/dentists/(.+)',
        'index.php?pagename=find-a-dentist&dentists=$matches[1]',
        'top'
    );

    add_rewrite_tag('%locations%', '([^/]*)', 'locations=');
    add_rewrite_rule(
        '^location/locations/(.+)',
        'index.php?pagename=location&locations=$matches[1]',
        'top'
    );
}

function add_custom_query_vars($vars)
{
    $vars[] = 'specialties';
    $vars[] = 'dentists';
    $vars[] = 'locations';

    return $vars;
}
add_filter('query_vars', 'add_custom_query_vars');


function check_and_add_profession_choice($post_id)
{
    // Check if this is an auto-save routine. If it is, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check if it's the correct post type (e.g., 'specialty')
    if (get_post_type($post_id) != 'specialty') {
        return;
    }

    // Avoid infinite loop by checking post status
    $post_status = get_post_status($post_id);
    if ($post_status === 'draft' && isset($_GET['message']) && $_GET['message'] === 'duplicate_specialty') {
        return;
    }

    // Get the new specialty title (assuming it's the post title)
    $specialty_title = get_the_title($post_id);

    // Get the current choices for the Profession select field
    $field_key = 'field_661eea304a4b2'; // Replace with your actual ACF field key for 'Profession'
    $field = get_field_object($field_key, 'option');
    $choices = $field['choices'];

    // Check if the specialty already exists in the Profession choices
    if (array_key_exists($specialty_title, $choices)) {
        return;
    }

    // If it doesn't exist, add it to the Profession choices
    $choices[$specialty_title] = $specialty_title;
    // Update the Profession field with the new choices
    update_field($field_key, $choices, 'option');
}

add_action('save_post', 'check_and_add_profession_choice');


function generateDentistMeta()
{

    $dentist_query = new WP_Query(
        array(
            "post_type" => "dentist",
            'posts_per_page' => -1,
        )
    );

    while ($dentist_query->have_posts()) {
        $dentist_query->the_post();
        $professions = get_field("professions");
        $name = get_field("first_name") . " " . get_field("last_name");

        wp_reset_postdata(); // Restore global post data
    }
}
