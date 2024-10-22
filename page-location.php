<?php get_header() ?>

<?php
$response =  new WP_REST_Request('GET', "/myplugin/v1/all-services");
$services = rest_do_request($response)->data;

$location_types_url = new WP_REST_Request('GET', '/myplugin/v1/all-location-types');
$location_types = rest_do_request($location_types_url)->data;
?>


<div class="relative">
    <section id="header-location" class="header-margin header-location">
        <div style="background: rgba(0, 107, 222, 1);top:0; mix-blend-mode: color-burn; position: absolute; width: 100%; height: 100%">
        </div>
        <div class="header-location-title-container">
            <h1 style="color: white; margin: 0; font-size: 3rem;">Find a Location</h1>
            <div class="responsive-toggle-display-flex" style="align-items: center;  isolation: isolate;">
                <button id="filter-location-btn-mobile" style="color: white; background: orange;width: 150px; padding: 10px 0;letter-spacing:1px; font-weight:bold; border-radius: 15px; border: 0">Show Filter</button>
            </div>
        </div>
        <div class="filter-location-container remove">
            <div class="filter-location-item">
                <div style="font-weight: bold; font-size: 18px; ">
                    MY ADDRESS
                </div>
                <div style="height: 50px; position: relative; display:flex;align-items: center; justify-content: center;">
                    <div class="hide" id="loading-1-animation"></div>
                    <input type="text" id="my-location-input" placeholder="My Address">
                </div>
                <div>
                    <button style="background: transparent; color:white; font-size: 18px;cursor:pointer; border:0; font-family:Tilt Neon, sans-serif;" id="useLocationBtn">Use My Location</button>
                </div>
            </div>
            <div class="filter-location-item" style="align-items: center; width: 90%;">
                <div style="width: 80%;">
                    <div style="font-weight: bold; font-size: 18px;">Miles Away: <span id="miles" style="color:rgb(255, 165, 0);"></span></div>
                </div>
                <div style="height: 50px; width: 100%;  display: flex; align-items: center; justify-content: center;">
                    <div class="slider-container">
                        <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                    </div>
                </div>
                <div class="responsive-toggle-display" style="user-select: none; opacity: 0; ">
                    Use my location
                </div>
            </div>
            <div class="filter-location-item">
                <div style="font-weight: bold; font-size: 18px;">
                    Facility Type
                </div>
                <div style="background: blue; height: 50px; position: relative; cursor: pointer;" class="dropdown">
                    <input readonly class="dropdown" style="padding: 0 0 0px 8px; height: 100%; width: 100%;  cursor: pointer; margin: 0; border-radius: 5px; border: 0;color: black;" type="text" id="dropdown-facility-input" placeholder="Facility Type">
                    <i style="position: absolute; color: black; top: 50%; transform: translateY(-50%); right: 8px;" class="fa fa-chevron-down"></i>
                    <ul class="dropdown-menu" id="dropdown-facility-menu">
                        <li style="height: 14.29%"></li>
                        <?php
                        foreach ($location_types as $location_type) {
                            echo "<li>" . $location_type . "</li>";
                        }
                        ?>

                    </ul>
                </div>
                <div style="user-select: none; opacity: 0;">
                    Use my location
                </div>
            </div>
            <div class="filter-location-item">
                <div style="font-weight: bold; font-size: 18px;">
                    Service
                </div>
                <div style="background: blue; height: 50px; position:relative" class="dropdown">
                    <input readonly class="dropdown" style="padding: 0 0 0px 8px;height: 100%; width: 100%;  margin: 0;color: black; border-radius: 5px; border: 0; cursor: pointer;" type="text" id="dropdown-service-input" placeholder="Service">
                    <i style="position: absolute; color: black; top: 50%; transform: translateY(-50%); right: 8px;" class="fa fa-chevron-down"></i>
                    <ul class="dropdown-menu" id="dropdown-service-menu">
                        <li style="height: 14.29%"></li>
                        <?php
                        foreach ($services as $service) {

                            echo "<li>" . $service . "</li>";
                        }
                        ?>
                    </ul>
                </div>
                <div style="user-select: none; opacity: 0;">
                    Use my location
                </div>
            </div>
        </div>
    </section>
    <div class="background-overlay" id="background-overlay-mobile"></div>
    <section class="location-list-map-section">
        <div class="shadow" style="opacity:0;position: absolute; transform: translateY(-50%); height: 60px; width: 40%; background: white; border-radius: 10px; display: flex; align-items: center; justify-content: center; z-index: 450;">
            <div style="width: 60%; display: flex; justify-content: space-between;position: relative">
                <div style="display: flex; align-items: center; position: relative">
                    <i class="fa fa-check" style="margin-right: 8px; font-size: 18px; color: orange"></i>
                    <span id="locations-amount">7</span> Locations Facility Type Service
                    <button class="blue-bkg" style="font-size: 14px; color: white; padding: 8px 20px; text-wrap: nowrap; border-radius: 25px; border: 0; cursor: pointer;">Clear Filters</button>
                </div>
                <div>
                </div>
            </div>
        </div>
        <div class="location-list-map-container">
            <div id="location-list-container" style="flex:.35; background: rgba(255,255,255,.6); display: flex; padding: 20px 0; flex-direction: column; align-items: center;overflow: auto; ">
            </div>
            <div id="map" style="flex:.65; min-height: 500px; margin-top: 30px; background: blue;"></div>
        </div>
    </section>
</div>
<script type="text/javascript">
    // $('input[type="range"]').rangeslider();
</script>
<?php get_footer() ?>