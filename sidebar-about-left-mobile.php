<?php
$current_url = get_permalink();
$path = parse_url($current_url)["path"];
$endpoint = basename($path);
$endpoint = str_replace("/", "", $endpoint);
$cleanedSlug = str_replace("-", " ", $endpoint);

$child_pages = [];
// Remove the leading slash if present 

$current_page_id = get_the_ID();

// Check if the current page is a descendant of Parent Page ID 1128
if (in_array(1128, get_post_ancestors($current_page_id)) || $current_page_id == 1128) {
    // Current page is a descendant of Parent Page ID 1128
    $root_ancestor_id = 1128;
}
// Check if the current page is a descendant of Parent Page ID 49
else if (in_array(49, get_post_ancestors($current_page_id)) || $current_page_id == 49) {
    // Current page is a descendant of Parent Page ID 49 
    $root_ancestor_id = 49;
}

$child_pages = get_pages(array(
    'child_of' => $root_ancestor_id,
    'sort_column' => 'menu_order', // Sort by menu order
    'sort_order' => 'ASC', // Sort in ascending order
    'post_type' => 'page', // Retrieve only pages
    'post_status' => 'publish', // Retrieve only published pages
)); 
?>
<nav class="sidebar-nav-left-mobile breadcrumb-nav-mobile" >
    <ul style=" display: flex; flex-direction: column; justify-content: space-around; padding: 0 10px 20px 10px;">
        <div style="padding: 0 0 5px 0; margin: 0; border-bottom: 1px lightgrey solid">
            <?php
            // IF the current page slug === to the ancestor page title then add a custom bullet point to the first li item and make the text Bold
            if (strcasecmp($cleanedSlug, get_the_title($root_ancestor_id)) == 0) {
                echo '<li  >
                            <a class="li-color-heading" style="filter: hue-rotate(-240deg); text-decoration: none;" href="' . get_permalink($root_ancestor_id) . '">
                                <h3 style="line-height: 0; font-weight: bold;">' . get_the_title($root_ancestor_id) . '</h3>
                            </a> 
                        </li>';
            } else {
                echo '<li >
                            <a class="li-color-heading" style=" text-decoration: none;" href="' . get_permalink($root_ancestor_id) . '">
                                <h3 style="line-height: 0; font-weight: 100;">' . get_the_title($root_ancestor_id) . '</h3>
                            </a>
                        </li>';
            }
            ?>
        </div>

        <?php

        foreach ($child_pages as $child_page) {

            $child_pages = get_pages(array(
                'child_of' => $child_page->ID,
                'sort_column' => 'menu_order', // Sort by menu order
                'sort_order' => 'ASC', // Sort in ascending order
                'post_type' => 'page', // Retrieve only pages
                'post_status' => 'publish', // Retrieve only published pages
            ));


            // if the current page has children or if the current page has no children and the ancestor count != 2 then add margin-top 10px
            if (strcasecmp(str_replace([",", "amp;", "& "], "", $child_page->post_title), $cleanedSlug) == 0 && $child_pages || strcasecmp(str_replace([",", "amp;", "& "], "", $child_page->post_title), $cleanedSlug) == 0 && !$child_pages && count(get_post_ancestors($child_page->ID)) != 2) {
                echo '<li   style="margin-top:10px; position:relative;">';
            } else if (strcasecmp(str_replace([",", "amp;", "& "], "", $child_page->post_title), $cleanedSlug) == 0) {
                echo '<li   style="position:relative; ">';
            }

            //Output the title and link of each child page 
            //If the page title === the slug add a custom bullet to the li item.
            if (strcasecmp(str_replace([",", "amp;", "& "], "", $child_page->post_title), $cleanedSlug) == 0) {

                //if the current page has child pages then output each child page as li items
                //if not the output only the current child page as a li item
                if (!empty($child_pages)) {

                    echo  '<a class="li-color" style=" font-weight:bold;filter: hue-rotate(-240deg);  text-decoration: none;" href="' . get_permalink($child_page->ID) . '">' . $child_page->post_title . '</a> 
                                    <i style="position: absolute;top: 5%; transform: translateY(0%);right: 10px; font-size: 14px;" class="fa fa-chevron-down chevron"></i>
                                    <ul style=" margin-left: 30px;filter: hue-rotate(-240deg); list-style-image: none; padding-bottom: 15px;">';

                    // Grandchild Pages
                    foreach ($child_pages as $child_page) {
                        // Process each child page
                        echo '<li style="margin-top:15px;"><a style="color: inherit; text-decoration: none" href="' . get_permalink($child_page->ID) . '">' . $child_page->post_title . '</a></li>';
                    }
                    echo '</ul>
                                    <hr style="border: .5px lightgrey solid;"/>';
                }
                //If the current page has 2 ancestors than output all the children of the parent as li items
                else if (count(get_post_ancestors($child_page->ID)) == 2) {
                    $child_pages = get_pages(array(
                        'child_of' => wp_get_post_parent_id($child_page->ID),
                        'sort_column' => 'menu_order', // Sort by menu order
                        'sort_order' => 'ASC', // Sort in ascending order
                        'post_type' => 'page', // Retrieve only pages
                        'post_status' => 'publish',
                    ));
                    echo  '<ul style="margin-left: 30px;  list-style-image: none; padding-bottom: 15px;">';

                    foreach ($child_pages as $child_page) {
                        if (strcasecmp(str_replace([",", "amp;", "& "], "", $child_page->post_title), $cleanedSlug) == 0) {
                            echo '<li   style="margin-top:15px;"><a style="color: inherit; font-weight: bold;';
                        } else {
                            echo '<li   style="margin-top:15px;"><a style="color: inherit; ';
                        }
                        echo ' text-decoration: none" href="' . get_permalink($child_page->ID) . '">' . $child_page->post_title . '</a></li>';
                    }
                    echo '</ul>
                                <hr style="border: .5px lightgrey solid;"/>';
                } else {
                    echo '<a class="li-color" style=" font-weight:bold; filter: hue-rotate(-240deg); text-decoration: none;" href="' . get_permalink($child_page->ID) . '">' . $child_page->post_title . '</a>    
                                </li>';
                }
            } else {


                $child_pages = get_pages(array(
                    'child_of' => $child_page->ID,
                ));
                if ($child_pages) {

                    echo '<li  style="margin-top:10px; position: relative; padding-right: 10px">
                                <a class="li-color" style="text-decoration: none; line-height:0" href="' . get_permalink($child_page->ID) . '">' . $child_page->post_title . '</a>
                                <i style="position: absolute; top: 20%; right: 0px; font-size: 14px;" class="fa fa-chevron-right chevron"></i>
                            </li>';
                } else if (wp_get_post_parent_id($child_page->ID) ===  $root_ancestor_id) {

                    echo '<li style="margin-top:10px; position: relative">
                                    <a class="li-color" style="text-decoration: none;" href="' . get_permalink($child_page->ID) . '">' . $child_page->post_title . '</a> 
                                </li>';
                }
            }
        }
        ?>
    </ul>
</nav>