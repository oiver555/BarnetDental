<?php

if (is_page(49)) {
?>

    <section style="height: 300px; width: 100%;   position:relative;background-image: url('<?php echo get_theme_file_uri("/images/basic-hero.svg"); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="flex-row-around" style="width:95%; margin-left: auto; position: relative;   height: 100%; align-items:center">
            <div class="flex-column-around" style="flex:.5; height: 80% ">
                <h1 style="font-size: 3rem; line-height: 0;"><?php echo get_the_title() ?></h1>
                <div style="font-size: 20px; line-height: 22px;">Elevating healthcare for the local community by doing the extraordinary & delivering the exceptional every day.</div>
                <div style="  display: flex;  ">
                    <button style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 15px; padding: 15px 50px; display: flex; align-items: center;">Find a Location<i style="font-size: 16px;" class="fa fa-chevron-right chevron"></i></button>
                    <button style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 15px; padding: 15px 50px; display: flex; align-items: center;margin-left: 15px;">Find a Dentist<i style="font-size: 16px;" class="fa fa-chevron-right chevron"></i></button>

                </div>
            </div>
            <div style="flex:.5; width: 100%; height: 80%; ">
                <div style="width: 90%; height: 100%; background: gold; display: flex; border-radius: 15px; align-items:center; justify-content: center;">
                    <i style="font-size: xx-large;" class="fa fa-play"></i>
                </div>
            </div>
        </div>
    </section>
<?php

} else if (is_page(66)) {
    $post_id = get_the_ID();

    // Get the value of the custom field "banner_text" for the current post
    $banner_text = get_post_meta($post_id, 'banner_text', true);
    $banner_button_left_text = get_post_meta($post_id, 'banner_button_left_text', true);
    $banner_button_right_text = get_post_meta($post_id, 'banner_button_right_text', true);

    // Output the value of the custom field

?>
    <section style="height: 100%;max-height: 400px; width: 100%; padding: 25px 0;  position:relative; background-image: url('<?php echo get_theme_file_uri("/images/basic-hero.svg"); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div style="height: 100%; display:flex; align-items:center;margin-left: auto;  right:0;position: relative; width:95%; ">
            <div class="flex-column-around" style=" height: 80%; flex:.5; padding-right: 30px;  ">
                <h1 style="font-size: 3rem;   width: 80%; margin: 0 0 15px 0;"><?php echo get_the_title() ?></h1>
                <div style="width: 80%;  display: flex; justify-content: space-between; font-size: 22px; line-height: 28px;">
                    <?php echo $banner_text; ?>

                </div>
                <div style="width: 80%; margin-top: 15px; display: flex;  ">
                    <button style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 15px; padding: 15px 50px; display: flex; align-items: center;"><?php echo $banner_button_left_text ?><i style="font-size: 16px;" class="fa fa-chevron-right chevron"></i></button>
                    <button style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 15px; padding: 15px 50px; display: flex; align-items: center;margin-left: 15px"><?php echo $banner_button_left_text ?><i style="font-size: 16px;" class="fa fa-chevron-right chevron"></i></button>

                </div>
            </div>
            <div style=" width:70%; flex:.5; ">
                <img style=" height: 70%; max-height: 350px; border-radius: 15px; " src="<?php echo get_site_url() ?>/wp-content/uploads/2024/04/d-dental-office-BiknMFl7iOw-unsplash-scaled.jpg" />
            </div>
        </div>
    </section>
<?php

} else if (is_page(1041)) {
    $post_id = get_the_ID();
    // Get the value of the custom field "banner_text" for the current post
    $banner_text = get_post_meta($post_id, 'banner_text', true);
    $banner_button_left_text = get_post_meta($post_id, 'banner_button_left_text', true);
    $banner_button_right_text = get_post_meta($post_id, 'banner_button_right_text', true)
?>
    <section class="template-banner-full-width-1-mobile">
        <div>
            <img style="width: 100%; object-fit: cover; height: 100%" src="<?php echo get_site_url() ?>/wp-content/uploads/2024/05/telehealth_banner.jpeg">
        </div>
        <div style="height: 100%; display:flex; flex-direction: column; align-items: center;   ">
        <h1 style="font-size: 3rem;   width: 80%; margin: 0 0 15px 0;"><?php echo get_the_title() ?></h1>
                <div style="width: 80%;  display: flex; justify-content: space-between; font-size: 22px; line-height: 28px;">
                    <?php echo $banner_text; ?> 
                </div>
                <div style="width: 80%; margin-top: 15px; display: flex; flex-wrap: wrap; gap: 15px  ">
                    <button class="shadow blue-color" style="border-radius: 30px; background: white; border: 0; border: 2px solid rgb(26,113,200); font-size: 15px; padding: 15px 25px; display: flex; align-items: center;"><?php echo $banner_button_left_text ?><i style="font-size: 16px;" class="fa fa-chevron-right chevron "></i></button>
                    <button class="shadow" style="border-radius: 30px; color: white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 15px; padding: 15px 25px; display: flex; align-items: center; ">Join Our Mailing List<i style="font-size: 16px;" class="fa fa-chevron-right chevron"></i></button>

                </div>
            
        </div>
    </section>
    <section class="template-banner-full-width-1" style="background-image: linear-gradient(to left,rgba(255, 255, 255, 0.2) 0%,rgba(255, 255, 255, 1) 100%), url('<?php echo get_site_url() ?>/wp-content/uploads/2024/05/telehealth_banner.jpeg'); background-size: cover; background-position: center; background-repeat: no-repeat">
        <div style="height: 100%; display:flex; align-items:center;margin-left: auto;  right:0;position: relative; width:95%; ">
            <div class="flex-column-around" style=" height: 80%; flex:.5; padding-right: 30px;  ">
                <h1 style="font-size: 3rem;   width: 80%; margin: 0 0 15px 0;"><?php echo get_the_title() ?></h1>
                <div style="width: 80%;  display: flex; justify-content: space-between; font-size: 22px; line-height: 28px;">
                    <?php echo $banner_text; ?>

                </div>
                <div style="width: 80%; margin-top: 15px; display: flex;  ">
                    <button style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 15px; padding: 15px 50px; display: flex; align-items: center;"><?php echo $banner_button_left_text ?><i style="font-size: 16px;" class="fa fa-chevron-right chevron"></i></button>
                    <button style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 15px; padding: 15px 50px; display: flex; align-items: center;margin-left: 15px">Join Our Mailing List<i style="font-size: 16px;" class="fa fa-chevron-right chevron"></i></button>

                </div>
            </div>
            <div style=" width:70%; flex:.5; ">

            </div>
        </div>
    </section>
<?php

} else if (is_page(82)) {
?>
    <section style="height:400px; width: 100%;   position:relative; background-image: url('<?php echo get_theme_file_uri("/images/basic-hero.svg"); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="flex-row-around" style="height: 100%; align-items:center; justify-content: flex-end; width:100% ">
            <div style=" height: 80%; width: 95%; display:flex; justify-content: space-around;  ">
                <h1 style="font-size: 3rem; line-height: 0;flex:.6;  "><?php echo get_the_title() ?></h1>
                <div style="border-left: 2px lightgrey solid;padding-left: 25px; width: 100%; height: 90%; flex:.4;display: flex; flex-direction: column; justify-content: space-around; ">
                    <div>
                        <h2 style="margin: 0;">Contact Information:</h2>
                        <div style="font-size: 22px;margin-top: 8px;">Corporate Compliance Office</div>
                        <div style="font-size: 22px;margin-top: 8px;">Barnet Health Medical Center – Catskills: <a style="color:  rgb(0, 107, 222)">845-397-3516</a></div>
                        <div style="font-size: 22px;margin-top: 8px;">Barnet Health Medical Center: <a style="color:  rgb(0, 107, 222)">845-397-3516</a></div>
                        <div style=" margin-top: 15px;">
                            <a style="font-size: 22px; color:  rgb(0, 107, 222)">dotherightthing@barnethealth.org</a>
                        </div>
                    </div>
                    <div>
                        <button style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 15px; padding: 15px 50px; display: flex; align-items: center;">Call Annonymous Hotline<i style="font-size: 16px;" class="fa fa-chevron-right chevron"></i></button>

                    </div>
                </div>
            </div>

        </div>
    </section>

<?php
} else {
?>
    <section style="height: 200px; width: 100%;   position:relative; background-image: url('<?php echo get_theme_file_uri("/images/basic-hero.svg"); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="flex-row-around" style="height: 100%; align-items:center; justify-content: flex-end; width:100% ">
            <div class="flex-column-around" style=" height: 80%; width: 95%; ">
                <h1 style="font-size: 3rem; line-height: 0;"><?php echo get_the_title() ?></h1>
                <div style="width: 100%; display: flex; justify-content: space-between;">
                </div>
            </div>

        </div>
    </section>
<?php

}
?>