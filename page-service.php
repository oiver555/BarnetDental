<?php get_header() ?>
<div class="relative">
    <section class="services-header-section">
        <div style="flex:.2">
            <div style=" top:0; left:0; mix-blend-mode: color-burn; position: absolute;  border-right: 500px   solid transparent; border-top: 500px  solid  rgba(0, 107, 222, 1);  ">
            </div>
            <div style="isolation: isolate; margin-left:10%;  text-align: left;  ">
                <h1 style="color: white; font-size: 3rem; margin:0">Services</h1>
            </div>
        </div>
        <div id="search-input-container-1" style="isolation: isolate; width: 100%; flex:.7; bottom: 20px; position: relative; display: flex;  justify-content: flex-end; align-items: flex-end; z-index:60">
            <div style="height: 50px; width:90%; position: relative">
                <h3 id="search-heading" class="black-color">SERVICE, TREATMENT, OR CONDITION</h3>
                <input id="search-input" style="box-sizing: border-box;width: 100%; height: 100%; border-radius: 5px; position:relative; background: white; border: 1px solid  rgb(0, 107, 222); padding-left: 15px;z-index: 50;" placeholder="Search" />
                <div id="live-results-container" style=" transform: none; bottom: auto;" class="shadow">
                    <div id="spinner-1-blue" class="hide remove spinner-1-blue"></div>
                </div>
            </div>
        </div>
    </section>
    <div class="background-overlay" id="background-overlay-mobile"></div>
    <section class="header-margin services-header-section-mobile">
        <div style="background: rgba(0, 107, 222, 1);  top:0; mix-blend-mode: color-burn; position: absolute; width: 100%; height: 100%">
        </div>
        <div style="isolation: isolate;  flex:.3;  display: flex; align-items: center;   ">
            <h1 style="color: white; margin: 0; line-height: 0; font-size: 3rem;">Service</h1>
        </div>
        <div id="search-input-container-1" style="isolation: isolate;width: 90%;  flex:.3;   position: relative; display: flex;  justify-content: center; align-items: center; z-index:60">
            <div class="search-input-width" style="height: 50px;  position: relative">
                <h3 style="color: white; line-height: 0; margin-top: 0; font-size: 1rem;">SERVICE, TREATMENT, OR CONDITION</h3>
                <input id="search-input" style="box-sizing: border-box;width: 100%; height: 100%; border-radius: 5px; position:relative; background: white; border: 1px solid  rgb(0, 107, 222); padding-left: 15px;z-index: 50;" placeholder="Search" />

                <div id="live-results-container" style=" transform: none; bottom: auto; " class="shadow">
                    <div id="spinner-1-blue" class="hide remove spinner-1-blue"></div>
                </div>
            </div>
        </div>
        <div class="responsive-toggle-display-flex" style="flex: .3; align-items: center;  isolation: isolate;">
        </div>
    </section>
    <section class="services-list-section">
        <div style="flex: .2;left: 2%; position: relative;  ">
            <div class="shadow featured-services">
                <h1 style="font-weight:bold;  margin: 15px auto; width: 80%; ">Featured Services</h1>
                <ul class="darker-blue-color " style=" text-align:left; width: 80%; margin: auto; font-size: 18px;padding: 10px 0">
                    <?php
                    $posts = new WP_Query(array(
                        'post_type' => 'service',
                        'posts_per_page' => 10,
                        'orderby' => 'rand',
                    ));
                    foreach ($posts->posts as $post) {
                        $post_link = get_permalink($post->id);
                    ?>
                        <li class="cursor-pointer" style="margin-bottom: 10px"><a style="color: inherit; text-decoration: none;" href="<?php echo $post_link ?>"><?php echo  $post->post_title ?></a></li>
                        <hr class="grey-border-color">
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="services-list-div">
            <div style="width: 90%;  position: relative;margin: 0 auto;">
                <div class="services-a-z-container">
                    <div class="services-browse-a-z">BROWSE A-Z</div>
                    <?php
                    $posts = new WP_Query(array(
                        'post_type' => "service",
                        'post_per_page' => -1,
                        'nopaging' => true,
                    ));

                    $sorted_services = [];

                    foreach ($posts->posts as $post) {

                        $first_letter = substr($post->post_title, 0, 1);
                        if (!isset($sorted_services[$first_letter])) {
                            // If not, initialize it as an empty array
                            $sorted_services[$first_letter] = [];
                        }

                        // Add the post title to the array indexed by the first letter
                        $sorted_services[$first_letter][] = $post->post_title;
                    }

                    ksort($sorted_services);
                    $keys = array_keys($sorted_services);
                    $alphabet = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
                    ?>
                    <nav style="overflow-x: auto; overflow-y: clip;">
                        <ul id="alphabet-list" style="list-style: none; display:flex; flex-direction: row; justify-content: space-between; font-size: 18px; font-weight: bold">
                            <?php
                            foreach ($alphabet as $letter) {

                                $letter_exists =  in_array($letter, $keys);

                                echo $letter_exists ? '
                                <li>
                                    <a class="service-letter-true-li"  href="#' . $letter . '">
                                        <span class="shadow circle-backdrop-white ">
                                            <span style=" position: relative;  right: 10px">' . $letter . '</span>
                                        </span>
                                    </a>
                                </li>'
                                    :
                                    '<li>
                                    <span class="no-events shadow circle-backdrop-white  service-letter-false-li"><span>' . $letter . '</span></span>
                                </li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
                <hr style="margin-bottom: 50px;">
                <div>
                    <?php
                    foreach ($sorted_services as $first_letter => $titles) {
                    ?>
                        <div id="<?php echo $first_letter ?>" class="shadow" style="margin-bottom: 60px; background: white; border-radius: 15px;  padding: 10px 0px 50px 30px">
                            <h1><?php echo strtoupper($first_letter) ?></h1>
                            <div style="display: flex; flex-direction: row; flex-wrap:wrap; gap:50px; font-size:18px">
                                <?php foreach ($titles as $title) {
                                    $args = array(
                                        'post_type'   => 'service',  // Specify the post type ('post', 'page', or your custom post type)
                                        'post_status' => 'publish',  // Only fetch published posts
                                        'title'       => $title,     // Title parameter (although this might still be inclusive, you can filter it after the query)
                                        'posts_per_page' => 1        // Limit to 1 post
                                    );

                                    $query = new WP_Query($args);

                                    if ($query->have_posts()) {
                                        $query->the_post(); // Set up the post data
                                ?>
                                        <a class="darker-blue-color" href="<?php echo get_permalink(); ?>" style="flex:max(400px, (100% - 20px)/3); text-decoration: none;">
                                            <?php echo esc_html($title); ?>
                                        </a>
                                <?php
                                        wp_reset_postdata(); // Reset post data to avoid conflicts
                                    } else {
                                        echo '<p>No post found for title: ' . esc_html($title) . '</p>';
                                    }
                                } ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <div id="topButton" class="shadow cursor-pointer" style="position:fixed;  bottom: 50px; width: 50px; height: 50px; right: 50px; background: white; border-radius: 50px; display: flex; justify-content: center; align-items: center; color:grey">
        TOP
    </div>
</div>
<script>
    // Get a reference to the button
    const topButton = document.getElementById('topButton');

    // Add a click event listener to the button
    topButton.addEventListener('click', function() {
        // Scroll to the top of the page smoothly
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
<?php get_footer() ?>