<?php get_header(); ?>
<div class="relative">
    <section class="header-margin" style="width: 100%; min-height: 200px;  flex-direction: column; display: flex; justify-content: space-around; align-items: center; padding: 25px 0; position: relative;   ">
        <div style="background: rgba(0, 107, 222, 1);  top:0; mix-blend-mode: color-burn; position: absolute; width: 100%; height: 100%">
        </div>
        <div style="isolation: isolate;  flex:.3;  display: flex; align-items: center;   ">
            <h1 style="color: white; margin: 0; line-height: 0; font-size: 3rem;">Find a Dentist</h1>
        </div>
        <div id="search-input-container-1" class="search-input-container-1">

            <div class="search-input-width" style="height: 50px;  position: relative">
                <h3 style="color: white; line-height: 0; margin-top: 0; font-size: 1rem;">NAME, SERVICE, OR SPECIALTY</h3>
                <input id="search-input" style="box-sizing: border-box;width: 100%; height: 100%; border-radius: 5px; position:relative; background: white; border: 1px solid  rgb(0, 107, 222); padding-left: 15px;z-index: 50;" placeholder="Search" />

                <div id="live-results-container" style=" transform: none; bottom: auto;  " class="shadow">
                    <!-- <div id="spinner-1-blue" class="hide remove spinner-1-blue"></div> -->
                </div>
            </div>
        </div>
        <div id="search-input-container-1-mobile" class="search-input-container-1-mobile">

            <div class="search-input-width" style="height: 50px;  position: relative">
                <h3 style="color: white; line-height: 0; margin-top: 0; font-size: 1rem;">NAME, SERVICE, OR SPECIALTY</h3>
                <input id="search-input" style="box-sizing: border-box;width: 100%; height: 100%; border-radius: 5px; position:relative; background: white; border: 1px solid  rgb(0, 107, 222); padding-left: 15px;z-index: 50;" placeholder="Search" />

                <div id="live-results-container" style=" transform: none; bottom: auto; " class="shadow">
                    <!-- <div id="spinner-1-blue" class="hide remove spinner-1-blue"></div> -->
                </div>
            </div>
        </div>
        <div class="responsive-toggle-display-flex" style="flex: .3; align-items: center;  isolation: isolate;">
            <button id="filter-btn-mobile" style="color: white; background: orange;width: 150px; height: 30px; font-weight:bold; border-radius: 15px; border: 0">Filter Results</button>
        </div>
    </section>
    <div class="background-overlay" id="background-overlay-mobile"></div>
    <aside id="filter-menu-mobile" class="filter-container-mobile hide-menu-mobile-left">
        <div style="display: flex; flex-direction: column; position: relative; width:100%; justify-content: space-between; height: 1000px">
            <div style="flex:1; display: flex; flex-direction: column; align-items: center; min-height:110px; font-size: 18px;  letter-spacing: 1px;">
                <div style="display: flex; flex-direction: row; width: 100%; flex: 1; align-items: center; font-weight: bold; ">
                    <div class="blue-color" style=" flex: 1; display:flex; align-items: center; justify-content: center; height:100%; text-align: center; background: rgb(230,230,230)">
                        <i class="fas fa-times" style="margin-right: 5%;"></i>
                        <span id="filter-close-btn-mobile">Cancel</span>
                    </div>
                    <div id="filter-apply-mobile" class="blue-bkg" style=" flex: 1; display:flex; align-items: center; justify-content: center; height:100%; text-align: center; color: white">
                        <span>Apply</span>
                        <i class="fa fa-search" style="margin-left: 5%;"></i>

                    </div>
                </div>
                <div class="blue-color" style="display: flex; flex: 1;  justify-content: center; align-items: center; width:100%; height: 100%;">
                    <div class="no-events" id="clear-filters-mobile" style="font-weight: bold; cursor: pointer; width:100%; height:100%; display:flex; align-items:center; justify-content: center;">Clear Filters</div>
                </div>
            </div>
            <div>
                <hr>
            </div>
            <div style="flex:.8;display: flex; align-items: center; justify-content: center;  ">
                <div style="flex: .23;">
                    <label class="switch">
                        <input id="only-barnet-dentist-mobile" type="checkbox">
                        <span class="slider-switch round"></span>
                    </label>
                </div>
                <div style="flex: .6;">Only show Barnet Dentists</div>
            </div>
            <div>
                <hr>
            </div>
            <div style="flex:.8;display: flex; align-items: center; justify-content: center; ">
                <div style="flex: .23;">
                    <label class="switch">
                        <input id="accepting-new-patients-mobile" type="checkbox">
                        <span class="slider-switch round"></span>
                    </label>
                </div>
                <div style="flex: .6;">Only show providers accepting new patients</div>
            </div>
            <div>
                <hr>
            </div>
            <div style="flex:1.5;display: flex; flex-direction: column; padding: 0px 20px; justify-content: space-around; ">
                <div>
                    <h3 style="margin: 0;">Address</h3>
                </div>
                <div style="display: flex; align-items:center; justify-content: space-between; width: 40%; margin: 10px 0">
                    <button id="useLocationBtn-mobile" class="blue-bkg" style="font-size: 14px; color: white; padding: 8px 20px;  border-radius: 25px; border: 0; cursor: pointer;"> <i class="fa fa-paper-plane" style="color: white; margin-right: 5px"></i> Near Me</button>
                    <div>or</div>
                </div>
                <div style="position: relative; display: flex; justify-content: center; align-items: center;">
                    <div class="hide" id="loading-1-animation-mobile"></div>
                    <input type="text" id="my-location-input-mobile" style="height: 40px; border-radius: 5px; border:2px lightgrey solid" placeholder="Address" />
                </div>

            </div>
            <div>
                <hr>
            </div>
            <div class="miles-slider-container">
                <div>
                    <div>Miles I'm willing to Travel: <span id="miles-mobile" style="color:rgb(255, 165, 0);"></span></div>
                </div>
                <div class="slider-container">
                    <input type="range" min="1" max="100" value="50" class="slider d3d3d3 slider-thumb-grey no-events" id="myRange-mobile">
                </div>
            </div>

            <div>
                <hr>
            </div>
            <div style="flex:1;display: flex; justify-content: space-around; align-items: center;">
                <div style="position:relative;margin: 10px 0">
                    <button style="display: flex;font-size: 14px; align-items: center;width: 150px; height: 50px;  padding: 12px 15px; border-radius: 8px; border: 2px grey solid;">
                        <input id="female-btn-mobile" name="female-btn" style="width: 20px; height:20px; padding: 0;position:relative; right: 5px; appearance: none; -webkit-appearance: none; -moz-appearance: none; border: 1px solid grey; border-radius: 3px; outline: none;" type="radio" />
                        <label for="female-btn">Female</label>
                    </button>
                </div>
                <div style="position:relative;">
                    <button style="display: flex;font-size: 14px; align-items: center;width: 150px; height: 50px;  padding: 12px 15px; border-radius: 8px; border: 2px grey solid;">
                        <input id="male-btn-mobile" name="male-btn" style="width: 20px; height:20px; padding: 0;position:relative; right: 5px; appearance: none; -webkit-appearance: none; -moz-appearance: none; border: 1px solid grey; border-radius: 3px; outline: none;" type="radio" />
                        <label for="male-btn">Male</label>
                    </button>
                </div>

            </div>
            <div>
                <hr>
            </div>
            <div style="flex:1;display: flex; flex-direction: column; padding-left: 10%;">
                <div>
                    <h2>Office or Location Name</h2>
                </div>
                <div style=" height: 50px;width: 80%;    position: relative; cursor: pointer;">
                    <input id="location-mobile" style="padding: 0 0 0px 8px; height: 100%; width: 100%;  cursor: pointer; margin: 0; border-radius: 5px; border: 0;color: black;" type="text" class="dropdown" placeholder="Facility Type">
                    <i style="position: absolute; color: black; top: 50%; transform: translateY(-50%); right: 8px;" class="fa fa-chevron-down"></i>
                    <ul class="dropdown-menu" id="dropdown-location-menu-mobile">
                        <li style="height: 14.29%;"></li>
                        <?php
                        $locations = new WP_Query(array(
                            'post_type' => "Location",
                            // 'posts_per_page' => -1
                            'nopaging' => true,
                        ));
                        if ($locations->have_posts()) {
                            // Start the loop
                            while ($locations->have_posts()) {
                                $locations->the_post();
                                $locationID = get_the_ID();
                                $name = get_field('name');
                                // Output each location within <li> tags
                                echo '<li data-locationid="' . $locationID . '">' . $name . '</li>';
                            }                                     // Restore original post data
                            wp_reset_postdata();
                        }
                        ?>

                    </ul>
                </div>
            </div>
            <div>
                <hr>
            </div>
            <div style="flex:1;display: flex; flex-direction: column; padding-left: 10%;">
                <div>
                    <h2>Insurance Accepted</h2>
                </div>
                <div style=" height: 50px;width: 80%;    position: relative; cursor: pointer;">
                    <input id="insurance-mobile" style="padding: 0 0 0px 8px; height: 100%; width: 100%;  cursor: pointer; margin: 0; border-radius: 5px; border: 0;color: black;" type="text" class="dropdown" placeholder="Any">
                    <i style="position: absolute; color: black; top: 50%; transform: translateY(-50%); right: 8px;" class="fa fa-chevron-down"></i>
                    <ul class="dropdown-menu" id="dropdown-insurance-menu-mobile">
                        <li style="height: 14.29%;"></li>
                        <?php
                        $insurances_url = new WP_REST_Request('GET', '/myplugin/v1/insurances');
                        $insurances_response = rest_do_request($insurances_url);
                        if (is_wp_error($insurances_response)) {
                            echo "Error: $insurances_response";
                        } else {
                            $insurances_data = rest_get_server()->response_to_data($insurances_response, false);
                            foreach ($insurances_data as $insurance) {
                                echo '<li>' . $insurance . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div>
                <hr>
            </div>
            <div style="flex:1;display: flex; flex-direction: column; padding-left: 10%;">
                <div>
                    <h2>Languages Spoken</h2>
                </div>
                <div style=" height: 50px;width: 80%;    position: relative; cursor: pointer;" class="dropdown">
                    <input id="language-mobile" style="padding: 0 0 0px 8px; height: 100%; width: 100%;  cursor: pointer; margin: 0; border-radius: 5px; border: 0;color: black;" type="text" class="dropdown" placeholder="Any">
                    <i style="position: absolute; color: black; top: 50%; transform: translateY(-50%); right: 8px;" class="fa fa-chevron-down"></i>
                    <ul class="dropdown-menu" id="dropdown-languages-menu-mobile">
                        <li style="height: 14.29%;"></li>
                        <?php

                        $language_url = new WP_REST_Request('GET', '/myplugin/v1/languages');
                        $language_response = rest_do_request($language_url);
                        if (is_wp_error($language_response)) {
                            echo "Error: $language_response";
                        } else {
                            $response_data = rest_get_server()->response_to_data($language_response, false);
                            foreach ($response_data as $language) {
                                echo '<li>' . $language . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div>
                <hr>
            </div>
        </div>
    </aside>
    <section style="width: 100%; height: 100%;isolation: isolate;  justify-content:  center; display: flex; position: relative; z-index: 50;">
        <div class="shadow dentists-map-switch-container ">
            <div style="flex:.95; display: flex; justify-content: space-between; position: relative; ">
                <div style="display: flex; flex:1; justify-content: center; align-items: center; position: relative; text-wrap: nowrap;">
                    <i class="fa fa-check" style="margin-right: 8px; font-size: 18px; color: orange"></i>
                    <span id="dentist-amount"></span>&nbsp;dentist results
                </div>

                <div class="switch-container">
                    <input type="radio" id="list-option" name="view-option" checked>
                    <input type="radio" id="map-option" name="view-option">
                    <div class="switch-label">
                        <label for="list-option">List</label>
                        <label for="map-option">Map</label>
                        <div class="list-map-slider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div style="width: 100%; height: 100%;  display:flex;  ">
            <aside class="filter-container">
                <div style="  display: flex; flex-direction: column; position: relative; width:90%; justify-content: space-between; margin-top: 25px; height: 1000px">
                    <div style="flex:1;display: flex; flex-direction: column;">
                        <div>
                            <h1 style="padding: 0; margin: 0;">Filter Results</h1>
                        </div>
                        <div style="  display: flex;  justify-content: space-between; align-items: center;">
                            <div class="grey-color no-events" id="clear-filters" style="font-weight: bold; cursor: pointer; ">Clear Filters</div>
                            <div>
                                <button id="filter-apply" class="grey-bkg grey-color no-events" style="font-size: 18px;transition: color .3s ease;   padding: 12px 60px; font-weight: bold; border-radius: 25px; border: 0; cursor: pointer; user-select: none;">Apply</button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div style="flex:.8;display: flex; align-items: center;   ">
                        <div style="flex: .23;">
                            <label class="switch">
                                <input id="only-barnet-dentist" type="checkbox">
                                <span class="slider-switch round"></span>
                            </label>
                        </div>
                        <div style="flex: .4;">Only show Barnet Dentists</div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div style="flex:.8;display: flex; align-items: center;  ">
                        <div style="flex: .23;">
                            <label class="switch">
                                <input id="accepting-new-patients" type="checkbox">
                                <span class="slider-switch round"></span>
                            </label>
                        </div>
                        <div style="flex: .5;">Only show providers accepting new patients</div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div style="flex:1.5;display: flex; flex-direction: column;   justify-content: space-around; ">
                        <div>
                            <h3 style="margin: 0;">Address</h3>
                        </div>
                        <div style="display: flex; align-items:center; justify-content: space-between; width: 40%">
                            <button id="useLocationBtn" class="blue-bkg" style="font-size: 14px; color: white; padding: 8px 20px;  border-radius: 25px; border: 0; cursor: pointer;"> <i class="fa fa-paper-plane" style="color: white; margin-right: 5px"></i> Near Me</button>
                            <div>or</div>
                        </div>
                        <div style="position: relative; display: flex; justify-content: center; align-items: center;">
                            <div class="hide" id="loading-1-animation"></div>
                            <form autocomplete="off">
                                <input type="text" id="my-location-input" style="height: 40px; border-radius: 5px; border:2px lightgrey solid" placeholder="Address" />
                            </form>         
                        </div>

                    </div>
                    <div>
                        <hr>
                    </div>
                    <div style="display: flex;flex:1; flex-direction: column;  justify-content: center;">
                        <div>
                            <div>Miles I'm willing to Travel: <span id="miles" style="color:rgb(255, 165, 0);"></span></div>
                        </div>
                        <div class="slider-container">
                            <input type="range" min="1" max="100" value="50" class="slider d3d3d3 slider-thumb-grey no-events" id="myRange">
                        </div>
                    </div>

                    <div>
                        <hr>
                    </div>
                    <div style="flex:1;display: flex; justify-content: space-around; align-items: center;">
                        <div style="position:relative;">
                            <button style="display: flex;font-size: 14px; align-items: center;width: 150px; height: 50px;  padding: 12px 15px; border-radius: 8px; border: 2px grey solid;">
                                <input id="female-btn" name="female-btn" style="width: 20px; height:20px; padding: 0;position:relative; right: 5px; appearance: none; -webkit-appearance: none; -moz-appearance: none; border: 1px solid grey; border-radius: 3px; outline: none;" type="radio" />
                                <label for="female-btn">Female</label>
                            </button>
                        </div>
                        <div style="position:relative;">
                            <button style="display: flex;font-size: 14px; align-items: center;width: 150px; height: 50px;  padding: 12px 15px; border-radius: 8px; border: 2px grey solid;">
                                <input id="male-btn" name="male-btn" style="width: 20px; height:20px; padding: 0;position:relative; right: 5px; appearance: none; -webkit-appearance: none; -moz-appearance: none; border: 1px solid grey; border-radius: 3px; outline: none;" type="radio" />
                                <label for="male-btn">Male</label>
                            </button>
                        </div>

                    </div>
                    <div>
                        <hr>
                    </div>
                    <div style="flex:1;display: flex; flex-direction: column; padding-left: 10%;">
                        <div>
                            <h2>Office or Location Name</h2>
                        </div>
                        <div style=" height: 50px;width: 80%;    position: relative; cursor: pointer;">
                            <input id="location" style="padding: 0 0 0px 8px; height: 100%; width: 100%;  cursor: pointer; margin: 0; border-radius: 5px; border: 0;color: black;" type="text" class="dropdown" placeholder="Facility Type">
                            <i style="position: absolute; color: black; top: 50%; transform: translateY(-50%); right: 8px;" class="fa fa-chevron-down"></i>
                            <ul class="dropdown-menu" id="dropdown-location-menu">
                                <li style="height: 14.29%;"></li>
                                <?php
                                $locations = new WP_Query(array(
                                    'post_type' => "Location",
                                    // 'posts_per_page' => -1
                                    'nopaging' => true,
                                ));
                                if ($locations->have_posts()) {
                                    // Start the loop
                                    while ($locations->have_posts()) {
                                        $locations->the_post();
                                        $locationID = get_the_ID();
                                        $name = get_field('name');
                                        // Output each location within <li> tags
                                        echo '<li data-locationid="' . $locationID . '">' . $name . '</li>';
                                    }
                                    wp_reset_postdata();
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div style="flex:1;display: flex; flex-direction: column; padding-left: 10%;">
                        <div>
                            <h2>Insurance Accepted</h2>
                        </div>
                        <div style=" height: 50px;width: 80%;    position: relative; cursor: pointer;">
                            <input id="insurance" style="padding: 0 0 0px 8px; height: 100%; width: 100%;  cursor: pointer; margin: 0; border-radius: 5px; border: 0;color: black;" type="text" class="dropdown" placeholder="Any">
                            <i style="position: absolute; color: black; top: 50%; transform: translateY(-50%); right: 8px;" class="fa fa-chevron-down"></i>
                            <ul class="dropdown-menu" id="dropdown-insurance-menu">
                                <li style="height: 14.29%;"></li>
                                <?php
                                $insurances_url = new WP_REST_Request('GET', '/myplugin/v1/insurances');
                                $insurances_response = rest_do_request($insurances_url);
                                if (is_wp_error($insurances_response)) {
                                    echo "Error: $insurances_response";
                                } else {
                                    $insurances_data = rest_get_server()->response_to_data($insurances_response, false);
                                    foreach ($insurances_data as $insurance) {
                                        echo '<li>' . $insurance . '</li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div style="flex:1;display: flex; flex-direction: column; padding-left: 10%;">
                        <div>
                            <h2>Languages Spoken</h2>
                        </div>
                        <div style=" height: 50px;width: 80%;    position: relative; cursor: pointer;" class="dropdown">
                            <input id="language" style="padding: 0 0 0px 8px; height: 100%; width: 100%;  cursor: pointer; margin: 0; border-radius: 5px; border: 0;color: black;" type="text" class="dropdown" placeholder="Any">
                            <i style="position: absolute; color: black; top: 50%; transform: translateY(-50%); right: 8px;" class="fa fa-chevron-down"></i>
                            <ul class="dropdown-menu" id="dropdown-languages-menu">
                                <li style="height: 14.29%;"></li>
                                <?php
                                $language_url = new WP_REST_Request('GET', '/myplugin/v1/languages');
                                $language_response = rest_do_request($language_url);
                                if (is_wp_error($language_response)) {
                                    echo "Error: $language_response";
                                } else {
                                    $response_data = rest_get_server()->response_to_data($language_response, false);
                                    foreach ($response_data as $language) {
                                        echo '<li>' . $language . '</li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                </div>
            </aside>


            <main id="list-container" class="flex list-container">
                <div class="remove" id="loading-2-animation"></div>
                <div class="hide" id="loading-2-animation-bkg"></div>
                <div>
                    <h1 style="padding: 0; margin: 0; opacity: 0; user-select: none;">Filter Results</h1>
                </div>
            </main>
            <div class="remove page-find-a-dentist-map" id="map"></div>
        </div>
    </section>
</div>

<?php get_footer() ?>