 <?php get_header() ?>
 <div style="background: #006E9C; height: 17%"></div>
 <?php get_template_part('template-parts/banner', 'about'); ?>

 <nav style="height: 50px; width: 100%;  display: flex; align-items:center; ">

     <ul style="display: flex; margin-left: 50px;">
         <li><a href="<?php echo get_site_url() ?>">Home</a></li>
         <?php
            $current_url = get_permalink();
            $path = parse_url($current_url)["path"];
            // Remove the leading slash if present
            $path = ltrim($path, '/');
 
            // Split the path into an array of segments
            $segments = explode('/', $path);

            // Loop through each segment
            foreach ($segments as $segment) {
                if (!empty($segment)) {
                    // Get the post ID for the current segment
                    $post_id = url_to_postid($segment);

                    // Get the title of the post
                    $post_title = get_the_title($post_id);
                    $page_permalink = get_the_permalink($post_id);

                    // Output the list item with the post title
                    echo '<li>/<a href="' . $page_permalink . '">' . $post_title . '</a></li>';
                }
            }
            ?>
     </ul>
 </nav>


 <?php the_content() ?>

 <!-- <?php get_sidebar('about-left') ?> -->
 <?php get_sidebar('about-right') ?>

 <?php get_footer() ?>