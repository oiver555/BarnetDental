<?php
/* Template Name: Left Right Sidebars Main Content
@package WordPress
@subpackage Medical Theme
@since Twenty Twenty-Four 1.0
*/
?>
<?php get_header() ?>
<div style="position: relative; display: flex;padding-bottom: 50px; flex-direction: column; width: 100%;font-size: 22px; line-height: 30px; background-image: url('<?php echo get_theme_file_uri("/images/basic-hero.svg"); ?>');">
    <?php get_template_part('template-parts/banner-about') ?>
    <button id="nav-button-mobile" class="blue-color section-menu-btn-mobile" ><span style="position: relative; margin-left: 15px; font-size: 16px">Section Menu</span><i class="fa fa-chevron-down blue-color" style="margin-right: 15px;"></i></button>
    <?php get_sidebar('about-left-mobile') ?>
    <nav class="breadcrumb-nav">
        <ul style="display: flex;">
            <li class="normal-text" style="font-size: 14px;"><a class="li-color-heading" style="font-weight: bold;font-size: 14px; text-decoration: none" href="<?php echo get_site_url() ?>">Home</a></li>
            <?php
            $current_url = get_permalink();
            $path = parse_url($current_url)["path"];
            $endpoint = basename($path);
            // Remove the leading slash if present
            $path = ltrim($path, '/');
            $path = rtrim($path, '/');
            // echo $path;
            // Split the path into an array of segments
            $segments = explode('/', $path);

            // Loop through each segment
            foreach ($segments as $segment) {
                $breadCrumbPage = new WP_Query(array(
                    'post_type' => 'page',
                    'posts_per_page' => 1,
                    'name' => $segment,
                ));

                if ($breadCrumbPage->have_posts()) {
                    while ($breadCrumbPage->have_posts()) {
                        $breadCrumbPage->the_post();
                        $post_id = get_the_ID();
                        $post_slug = get_post_field('post_name', $post_id);
                        $post_title = get_the_title($post_id);
                        $page_permalink = get_the_permalink($post_id);

                        echo '<li class="normal-text" style="font-size: 14px;"><span style="margin: 0px 5px; color:lightgrey">/</span><a';

                        if ($post_slug !== $endpoint) {
                            echo ' class="li-color-heading"';
                        }

                        echo 'style="font-size: 14px; font-weight: bold; text-decoration: none;';

                        if ($post_slug === $endpoint) {
                            echo 'color: grey; ';
                        }
                        echo '"';

                        if ($post_slug !== $endpoint) {
                            echo  'href="' . $page_permalink . '"';
                        };
                        echo   '>' .
                            $post_title .
                            '</a></li>';
                    }
                    wp_reset_postdata(); // Reset post data after each WP_Query loop
                } else {
                    // Handle case when page is not found
                    // You can output a default link or handle it as needed
                    // For example:
                    // echo '<li class="normal-text">Page not found</li>';
                }
            }

            ?>
        </ul>
    </nav>
    <div style="display:flex; flex-direction: row; justify-content: space-between; ">
        <?php get_sidebar('about-left') ?>
        <main class="template-main-content">
            <?php the_content() ?>
        </main>
        <?php get_sidebar('about-right') ?>

    </div>
</div>
<?php
$custom_field_value = get_field('footer_banner');
if ($custom_field_value) {
    $banner_left = get_field('banner_left');

    echo '<div style="width:100%; height: 200px; background: rgb(230,230,230); display: flex; justify-content: center; ">
    <div style="display: flex; width: 80%; justify-content: space-between;">' .
        $banner_left .
        '</div>
</div>';
}
?>


<?php
get_footer()
?>