<?php get_header() ?>
<?php

$events = new WP_Query(array(
    "post_type" => 'event',
    'nopaging' => true,
));
$types = get_field_object("field_6645a9fb02f9b")["choices"];
$locations_url = new WP_REST_Request('GET', '/myplugin/v1/venues');
$locations = rest_do_request($locations_url);

?>
<div class="relative">
    <section id="header-location" class="header-margin header-location">
        <div style="background: rgba(0, 107, 222, 1);top:0; mix-blend-mode: color-burn; position: absolute; width: 100%; height: 100%">
        </div>
        <div class="header-location-title-container">
            <h1 style="color: white; font-size: 3rem; margin: 0">Events</h1>
            <div class="responsive-toggle-display-flex" style="align-items: center;  isolation: isolate;">
                <button id="filter-location-btn-mobile" style="color: white; background: orange;width: 150px; padding: 10px 0;letter-spacing:1px; font-weight:bold; border-radius: 15px; border: 0">Show Filter</button>
            </div>
        </div>

        <div class="filter-events-container-mobile">
            <div class="filter-location-item">
                <div style="font-weight: bold; font-size: 18px;">
                    Event Type
                </div>
                <div style="background: blue; height: 50px; position: relative; cursor: pointer;" class="dropdown">
                    <input readonly class="dropdown" style="padding: 0 0 0px 8px; height: 100%; width: 100%;  cursor: pointer; margin: 0; border-radius: 5px; border: 0;color: black;" type="text" id="dropdown-event-type-input-mobile" placeholder="Nothing Selected">
                    <i style="position: absolute; color: black; top: 50%; transform: translateY(-50%); right: 8px;" class="fa fa-chevron-down"></i>
                    <ul class="dropdown-menu" id="dropdown-facility-menu">
                        <li style="height: 14.29%"></li>
                        <?php
                        foreach ($types as $type) {
                            echo '<li>' . $type . '</li>';
                        }
                        ?>

                    </ul>
                </div>
            </div>

            <div class="filter-location-item">
                <div style="font-weight: bold; font-size: 18px;">
                    Keyword Search
                </div>
                <div style="background: blue; height: 50px; position: relative; cursor: pointer;">
                    <input id="event-keyword-input-mobile" style="padding: 0 0 0px 8px; height: 100%; width: 100%;  cursor: pointer; margin: 0; border-radius: 5px; border: 0;color: black;" type="text">
                </div>
            </div>
            <div class="filter-location-item">
                <div style="font-weight: bold; font-size: 18px;">
                    Event Date
                </div>
                <div style="background: blue; height: 50px; position:relative" class="dropdown">
                    <input readonly class="dropdown" style="padding: 0 0 0px 8px;height: 100%; width: 100%;  margin: 0;color: black; border-radius: 5px; border: 0; cursor: pointer;" type="text" id="dropdown-date-input-mobile" placeholder="Nothing Selected">
                    <i style="position: absolute; color: black; top: 50%; transform: translateY(-50%); right: 8px;" class="fa fa-chevron-down"></i>
                    <?php include(dirname(__FILE__) . "/template-parts/event-date-selector.php") ?>
                </div>
            </div>
            <div class="filter-location-item">
                <div style="font-weight: bold; font-size: 18px;">
                    Event Venue
                </div>
                <div style="background: blue; height: 50px; position:relative" class="dropdown">
                    <input readonly class="dropdown" style="padding: 0 0 0px 8px;height: 100%; width: 100%;  margin: 0;color: black; border-radius: 5px; border: 0; cursor: pointer;" type="text" id="dropdown-venue-input-mobile" placeholder="Nothing Selected">
                    <i style="position: absolute; color: black; top: 50%; transform: translateY(-50%); right: 8px;" class="fa fa-chevron-down"></i>
                    <?php include(dirname(__FILE__) . "/template-parts/event-venue-selector.php") ?>
                </div>
            </div>
        </div>
    </section>
    <div style="width: 100%; position: relative;">
        <div style="width: 100%; height: 100%;  display:flex; ">
            <div class="events-filter-container">
                <div style="display: flex; flex-direction: column; position: relative; width:90%; justify-content: space-between; margin-top: 25px; height: 1000px">
                    <div style="flex:.7;display: flex; flex-direction: column; justify-content: center">
                        <div>
                            <h1 style="padding: 0; margin: 0;">Filter Results</h1>
                        </div>
                        <div style="  display: flex;  justify-content: space-between; align-items: center;">
                            <div class="grey-color no-events" id="clear-filters" style="font-weight: bold; cursor: pointer; ">Clear Filters</div>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div style="flex:1;display: flex; flex-direction: column; padding-left: 10%; justify-content: center">
                        <div>
                            <h3 style="margin-top: 0;">Event Type</h2>
                        </div>
                        <div style="height: 50px; width: 80%; position: relative; cursor: pointer;">
                            <input id="dropdown-event-type-input" style="overflow: hidden; padding: 0 15px 0px 8px; height: 100%; width: 100%; cursor: pointer; margin: 0; border-radius: 5px; border: 0; color: black; text-overflow: ellipsis; box-sizing: border-box; white-space: nowrap;" type="text" class="dropdown" placeholder="Nothing Selected">
                            <i style="position: absolute; color: black; top: 50%; transform: translateY(-50%); right: 8px;" class="fa fa-chevron-down"></i>
                            <?php include(dirname(__FILE__) . "/template-parts/event-type-selector.php") ?>
                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div style="flex:1;display: flex; flex-direction: column; padding-left: 10%; justify-content: center">
                        <div>
                            <h3 style="margin-top: 0;">Keyword Search</h2>
                        </div>
                        <div style=" height: 50px;width: 80%; position: relative; cursor: pointer;">
                            <input id="event-keyword-input" style="overflow: hidden; padding: 0 15px 0px 8px; height: 100%; width: 100%; cursor: pointer; margin: 0; border-radius: 5px; border: 0; color: black; text-overflow: ellipsis; box-sizing: border-box; white-space: nowrap;" type="text">
                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div style="flex:1;display: flex; flex-direction: column; padding-left: 10%; justify-content: center">
                        <div>
                            <h3 style="margin-top: 0;">Event Date</h2>
                        </div>
                        <div style=" height: 50px;width: 80%;    position: relative; cursor: pointer;" class="dropdown">
                            <input id="dropdown-date-input" style="overflow: hidden; padding: 0 15px 0px 8px; height: 100%; width: 100%; cursor: pointer; margin: 0; border-radius: 5px; border: 0; color: black; text-overflow: ellipsis; box-sizing: border-box; white-space: nowrap;" type="text" class="dropdown">
                            <i style="position: absolute; color: black; top: 50%; transform: translateY(-50%); right: 8px;" class="fa fa-chevron-down"></i>
                            <?php include(dirname(__FILE__) . "/template-parts/event-date-selector.php") ?>
                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div style="flex:1;display: flex; flex-direction: column; padding-left: 10%; justify-content: center">
                        <div>
                            <h3 style="margin-top: 0;">Event Venue</h2>
                        </div>
                        <div style=" height: 50px;width: 80%;    position: relative; cursor: pointer;" class="dropdown">
                            <input id="dropdown-venue-input" style="overflow: hidden; padding: 0 15px 0px 8px; height: 100%; width: 100%; cursor: pointer; margin: 0; border-radius: 5px; border: 0; color: black; text-overflow: ellipsis; box-sizing: border-box; white-space: nowrap;" type="text" class="dropdown">
                            <i style="position: absolute; color: black; top: 50%; transform: translateY(-50%); right: 8px;" class="fa fa-chevron-down"></i>
                            <?php include(dirname(__FILE__) . "/template-parts/event-venue-selector.php") ?>
                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="events-main-content">
                <ul id="events-list-container" style="width: 100%; position:relative; display: flex; flex-direction: column;  align-items: center; ">
                    <?php
                    foreach ($events->posts as $event) {
                        $title = get_field("title", $event->ID);
                        $start_time = get_field("start_time", $event->ID);
                        $end_time = get_field("end_time", $event->ID);
                        $date_string = get_field("date", $event->ID);
                        $date = DateTime::createFromFormat('mdY', str_replace('/', '', $date_string));
                        $price = get_field("price", $event->ID);
                        $free = get_field("free", $event->ID);
                        $type = get_field("type", $event->ID);
                        $event_url = get_permalink($event->ID)
                    ?>
                        <li class="event-list-item">
                            <div style="display: flex; flex-direction: row; margin-bottom: 30px">
                                <div style="width: 80px; height: 80px; background: purple; border-radius: 10px; text-align:center; color: white; justify-content: center; display:flex; align-items:center; flex-direction: column; ">
                                    <div style="font-size: 25px; line-height: 20px;"><?php echo $date->format('M') ?></div>
                                    <div style="font-size: 35px; font-weight: bolder;"><?php echo $date->format('d') ?></div>
                                </div>
                                <div class="blue-color" style="font-size:30px; font-weight:bold;margin-left: 20px"><?php echo $date->format('l') ?></div>
                            </div>
                            <div style="background: white; border-radius: 10px; height: 250px; display:flex; align-items: center; justify-content: space-between; padding: 0 20px">
                                <div style="flex: .6">
                                    <div>
                                        <h1><?php echo $title ?></h1>
                                    </div>
                                    <div style="font-size: 16px; color:grey">
                                        <button style="border-radius: 10px; color: grey; background: transparent; border: 1px solid grey; padding: 15px"><?php echo $type ?></button>
                                    </div>
                                    <div style="font-size: 16px; color:grey"><?php echo $start_time ?> - <?php echo $end_time ?></div>
                                    <div style="font-size: 16px; color:grey">Organizer: Barnet Health</div>
                                </div>
                                <div style="display: flex; flex:.4; flex-direction: row; justify-content: space-between; ">
                                    <div style="flex: .3; font-size: 26px; color:grey"><?php echo $free ? "FREE" : '$' . $price ?></div>
                                    <div style="display: flex; justify-content: space-around; flex:.7;">
                                        <a href="<?php echo $event_url ?>" class="cursor-pointer" style=" border-radius: 30px; color: rgb(26,113,200); border: 0; background:white; border: 2px solid rgb(26,113,200); font-size: 14px; padding: 10px 15px; display: flex; align-items: center;margin-right: 15px; text-decoration: none;">More details</a>
                                        <button class="cursor-pointer" style=" border-radius: 30px; color:white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 14px; padding: 10px 15px; display: flex; align-items: center; ">Email to Register</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list-item-mobile">
                            <div style="display: flex; flex-direction: row; align-items: center; justify-content: flex-start;">
                                <div class="blue-bkg" style="width: 70px; height: 70px;   text-align: center; border-radius: 10px; font-size: 20px; color:white; justify-content: center; display: flex; flex-direction: column; align-items: center;"><?php echo $date->format('M') ?><br><span style="font-weight:bold"><?php echo $date->format('d') ?></span></div>
                                <div class="blue-color" style="margin-left: 15px;">
                                    <h1 style="line-height: 0;"><?php echo $date->format('l') ?></h1>
                                </div>
                            </div>
                            <div class="shadow-sharp" style="width: 100%; flex: .9; border-radius: 15px; background: white; display: flex; justify-content: space-around; flex-direction: column;">
                                <div style="margin-left:15px">
                                    <h1 style="margin-bottom: 0;"><?php echo $title ?></h1>
                                </div>
                                <div style="margin-left:15px">
                                    <button style="border-radius: 10px; color: grey; background: transparent; border: 1px solid grey; padding: 10px"><?php echo $type ?></button>
                                </div>
                                <div style="margin-left:15px">
                                    <div><?php echo $start_time ?> - <?php echo $end_time ?></div>
                                </div>
                                <div style="margin-left:15px; font-size:16px">
                                    <div><?php echo $price ? "$" . $price : "FREE" ?></div>
                                </div>
                                <div style="display: flex; flex-direction: row; justify-content: center; ">
                                    <a href="<?php echo $event_url ?>" class="cursor-pointer" style="border-radius: 30px; color: rgb(26,113,200); border: 0; background:white; border: 2px solid rgb(26,113,200); font-size: 14px; padding: 10px 15px; display: flex; align-items: center;margin-right: 15px; text-decoration: none;">More Details</a>
                                    <button class=" cursor-pointer" style=" border-radius: 30px; color:white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 14px; padding: 10px 15px; display: flex; align-items: center; ">Email to Register</button>
                                </div>
                                <div>
                                    <hr style="  height: 1px; box-sizing: border-box;">
                                </div>
                            </div>

                        </li>
                    <?php
                    };
                    ?>
                </ul>
            </div>

        </div>
    </div>
</div>
<?php get_footer() ?>