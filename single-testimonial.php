<?php get_header() ?>
<div class="relative" >
    <?php
    // Check if it's a single post of the 'dentist' post type
    if (is_singular('testimonial')) {

        while (have_posts()) {
            the_post();
            $service_id =    get_field("service_received", get_the_ID());
            $first_name =    get_field("first_name", get_the_ID());
            $last_name =    get_field("last_name", get_the_ID());
            $age =    get_field("age", get_the_ID());
            $service_summary = get_field("sentence_summary", $service_id[0]);
            $service_receieved = get_the_title( $service_id[0]);
            $service_title = get_the_title($service_id[0]);
            $service_featured_image_url = get_the_post_thumbnail_url($service_id[0], 'medium');
            $service_post_url = get_permalink($service_id[0])
    ?>
            <div class="header-margin" style="padding-bottom: 50px;">
                <div class="blue-bkg white-color relative relative view-all-container">
                    <div style="isolation: isolate;"> <i class="fa fa-chevron-left white-color"></i><a href="<?php echo site_url() ?>/testimonial" style="color: inherit; text-decoration: none;">View All</a></div>
                </div>
                <div class="single-dentist-main-content">
                    <div style="flex: .70;">
                        <?php
                        // Get the URL of the featured image
                        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'medium'); // 'medium' can be replaced with other sizes
                        echo "<h1>" . get_the_title() . "</h1>";

                        if ($featured_image_url) {
                            echo '<div ><img style="border-radius:15px; overflow:hidden" src="' . esc_url($featured_image_url) . '" alt="' . esc_attr(get_the_title()) . '"></div>';
                        }

                       if ($first_name) {
                        echo '<div style="font-size:20px">Name: '.$first_name." ".$last_name."</div>";
                       }
                       if ($age) {
                        echo '<div style="font-size:20px">Age: '.$age."</div>";
                       }
                       if ($service_receieved) {
                        echo '<div style="font-size:20px">Service Receieved: '.$service_receieved."</div>";
                       }


                        echo '<div style="font-size:20px; background: white; border-radius:15px; padding: 20px; margin-top:50px">';
                        the_content(); ?>
                    </div>
                </div>

                <div style="flex: .25; height: 800px; display: flex; flex-direction: column;">
                    <div style="width: 100%; height: 300px; border-radius: 15px; background: white; display:flex; flex-direction: column; justify-content: space-between;">
                        <?php

                        if ($service_featured_image_url) {
                            echo '<div style="height: 70%; overflow:hidden"><a href="' . $service_post_url . '"><img style="width:100%; border-radius:15px" src="' . esc_url($service_featured_image_url) . '" alt="' . esc_attr(get_the_title()) . '"></a></div>';
                        }
                        echo "<a href='" . $service_post_url  . "' stylye='text-align:center; color: black;  text-decoration: none; outline: none; -webkit-tap-highlight-color: transparent;'><h3 style='text-align:center; line-height: 0; color:black; text-decoration:none; outline: none; -webkit-tap-highlight-color: transparent;'>" . $service_title . "</h3></a>";
                        echo "<div style='align-self:center'>" . $service_summary . "</div>";
                        ?>

                        <div class="pointer link-hover-color " style="align-self: center; border-radius: 0 0px 15px 15px; width: 100%; height: 35px; display: flex; align-items: center; justify-content: center;">
                            <a href="<?php echo  $service_post_url ?>" class="link-light link-hover-color" style=" border:0; padding:0; background: transparent;">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
</div>
<?php
        }
    }
    get_footer() ?>