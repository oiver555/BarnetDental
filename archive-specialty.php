<?php get_header();


$service_query = new WP_Query(array(
    "post_type" => "service",
    "posts_per_page" => "2",
    'orderby'       => 'rand',
));

?>
<div class="relative">
    <div class="header-margin" style="width: 100%; min-height: 200px;  flex-direction: column; display: flex; justify-content: space-around; align-items: center; padding: 25px 0; position: relative;   ">
        <div style="background: rgba(0, 107, 222, 1);  top:0; mix-blend-mode: color-burn; position: absolute; width: 100%; height: 100%">
        </div>
        <div style="isolation: isolate;  flex:.3;  display: flex; align-items: center;   ">
            <h1 style="color: white; margin: 0; line-height: 0; font-size: 3rem;">All Specialties</h1>
        </div>
    </div>
    <div class="archive-testimonial-main-container">
        <div class="archive-testimonial-main-content">
            <?php
            while (have_posts()) {
                the_post();
                $short_description =    get_field("short_description", get_the_ID());                
                $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            ?>
                <div class="shadow archive-testimonial-main-content-flex-item-1" style="background-image: url('<?php echo $featured_image_url ?>');  background-size: cover; background-position: center; font-size:20px">
                    <div class="archive-testimonial-main-content-flex-item-button">
                        <a class="pointer link-hover-color link-light" style="border-color: transparent;" href="<?php the_permalink() ?>">More Info<i class="fa fa-chevron-right chevron"></i></a>
                    </div>

                    <a class="hide-on-hover" href="<?php the_permalink() ?>" style="border-radius: 15px; text-decoration:none; background: rgba(0,50,102,.8); overflow: hidden;  height:100%; color: white; text-shadow: 1px 1px 0px black; display: flex; flex-direction: column; justify-content: space-around; ">
                        <p style="padding: 0px 15px; margin: 10px 0 0 0;"><?php echo $short_description ?></p>
                        <h3 style="color: white; padding: 0px 15px;"><?php  the_title() ?></h3>
                    </a>
                </div>

            <?php   }; ?>
        </div>
        <div class="archive-testimonial-main-content-2">
            <?php 
            foreach ($service_query->posts as $key => $service) {
                $service_summary = get_field("sentence_summary", $service->ID);
                $service_receieved = get_the_title($service->ID);
                $service_title = get_the_title($service->ID);
                $service_featured_image_url = get_the_post_thumbnail_url($service->ID, 'medium');
                $service_post_url = get_permalink($service->ID)
            ?>
                <div class="shadow-sharp" style="width: 100%; height: 300px; border-radius: 15px; background: white; display:flex; flex-direction: column; justify-content: space-between;">
                    <?php

                    if ($service_featured_image_url) {
                        echo '<div style="height: 70%; overflow:hidden"><a href="' . $service_post_url . '"><img style="width:100%; border-radius:15px 15px 0 0px" src="' . esc_url($service_featured_image_url) . '" alt="' . esc_attr(get_the_title()) . '"></a></div>';
                    }
                    echo "<a href='" . $service_post_url  . "' stylye='text-align:center; color: black;  text-decoration: none; outline: none; -webkit-tap-highlight-color: transparent;'><h3 style='text-align:center; line-height: 0; color:black; text-decoration:none; outline: none; -webkit-tap-highlight-color: transparent;'>" . $service_title . "</h3></a>";
                    echo "<div style='align-self:center; padding: 0 10px'>" . $service_summary . "</div>";
                    ?>

                    <a   href="<?php echo  $service_post_url ?>" class="pointer link-hover-color " style="align-self: center; text-decoration: none; border-radius: 0 0px 15px 15px; width: 100%; height: 35px; display: flex; align-items: center; justify-content: center;">
                        Learn More 
                    </a>
                </div>
            <?php
            }
            ?>
        </div>

    </div>
</div>
</div>
<?php get_footer(); ?>