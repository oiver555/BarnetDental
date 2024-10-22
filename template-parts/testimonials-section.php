<?php

$testimonials_query = new WP_Query(array(
    'post_type' => 'testimonial',
    'posts_per_page' => 6,
));

// print_r($testimonials_query->posts);




?>

<div style="width: 90%; height: 100%; display:flex; align-items:center; flex-wrap:wrap; gap: 25px; justify-content: space-around; color: white">
    <?php

    foreach ($testimonials_query->posts as $key => $post) {
        # code... 
        // print_r( $post->post_title);

        $first_name = get_field("first_name", $post->ID);
        $last_name = get_field("last_name", $post->ID);
        $feature_sentence = get_field("feature_sentence", $post->ID);
        $testimony_url =  get_permalink($post->ID);
        $title =   $post->post_title;
        $featured_image_url = get_the_post_thumbnail_url($post->ID, 'medium'); // 'full' can be replaced with other sizes like 'thumbnail', 'medium', 'large'
        $service_recieved_id = get_field("service_received", $post->ID);
        $service_summary = get_field("sentence_summary",  $service_recieved_id[0]);
        $service_url = get_permalink($service_recieved_id[0]);

    ?>
        <div style="border-radius: 15px; height: 400px;   background:white;  flex:1 0 max(25%, 200px); display:flex; justify-content:space-around; align-items: flex-start; padding:10px 20px 0 20px; flex-direction: column; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); overflow: hidden;">
            <div style="max-width: 100%;flex:.1; display:flex; align-items:center; text-overflow: ellipsis; overflow: hidden;white-space:nowrap; text-wrap: wrap; ">
                <h3 style="   color:rgb(50,50,50);"><?php echo $title ?></h3>
            </div>

            <div style="flex: .10; font-size: 16px;color:rgb(50,50,50); line-height: 20px; letter-spacing: 1px; display:flex; align-items: center; "><?php echo $service_summary ?></div>
            <div style="flex: .07; ">
                <a class="pointer link-hover-color link-light" href="<?php echo $service_url ?>" >More Info<i style="font-size: 15px" class="fa fa-chevron-right chevron"></i></a>
            </div>
            <div style="flex: .63; font-size: 18px; line-height: 20px; letter-spacing: 1px; background-image: url(<?php echo $featured_image_url ?>);background-position:center; background-repeat:no-repeat ; background-size: cover; width: 100%; border-radius: 15px 15px 0 0; position: relative">
                <div style="position: absolute; box-sizing: border-box; bottom:0; background: rgba(0,50,102,.7); width: 100%; min-height: 40%; font-size: 16px; padding:10px; font-weight: 100;">"<?php echo  $feature_sentence ?>"<span style="display: inline-block;  margin-top:5px; display:flex; justify-content: space-between; width: 100%">-<?php echo $first_name . " " . $last_name ?><a class="pointer link-hover-color link-light" style="border-color: transparent;" href="<?php echo $testimony_url ?>" >Read Story <i class="fa fa-chevron-right chevron"></i></a></span></div>
            </div>
        </div>
    <?php
    }
    ?>
</div>