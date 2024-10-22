<?php get_header() ?>
<div class="relative" style="background: #f5f5f5;">
    <?php
    // Check if it's a single post of the 'dentist' post type
    if (is_singular('event')) {
        $date_string  = get_field("date");
        $date = DateTime::createFromFormat('mdY', str_replace('/', '', $date_string));
        $start_time = get_field("start_time");
        $end_time = get_field("end_time");
        $title = get_field("title");
        $tickets_left = get_field("tickets_left");
        $summary = get_field("summary");
        $free = get_field("free");
        $price = get_field("price");
        $desciption_text = get_field("desciption_text");
        $venue = get_field("venue");
        $desciption_text = get_field("desciption_html");
        $repeat = get_field("repeat");
        $location_type = get_field("type", $venue[0]->ID);
    }
    ?>
    <div class="header-margin">
        <div class="blue-bkg white-color relative view-all-container">
            <div class="cursor-pointer" style="isolation: isolate; display: inline-block">
                <i class="fa fa-chevron-left white-color" style="margin-right: 5px;"></i>
                <a href="<?php echo get_site_url() ?>/events/" style="text-decoration: none;">View All</a>
            </div>
        </div>
        <div class="single-event-main-content">
            <section style="width: 100vw">
                <div class="single-event-date-container">
                    <div style="height: 150px; width: 120px; border-radius: 0 0 10px 10px; background: purple; color:white; font-weight: bold;   position: relative;">
                        <hr style="color: orange; background: orange; border-color: orange; border-width: 1px; position: absolute; width: 100%; top: 20px; box-sizing: border-box;">
                        <div style="position: absolute; top: 55px; left: 50%; right: 0; text-align: center; transform: translateX(-50%);">
                            <span style="font-size: x-large;"><?php echo $date->format('M') ?></span><br><span style="font-size: xxx-large; line-height: 55px;"><?php echo $date->format('d') ?></span>
                        </div>
                        <div style="color: black; position: absolute; top: 55px; left: 115%">
                            <div class="darker-blue-color" style="font-size: 22px; font-weight: bold"><?php echo $date->format('l') ?></div>
                            <div class=" blue-color" style="text-wrap: nowrap; font-size: 22px;"><?php echo $start_time ?> - <?php echo $end_time ?></div>
                        </div>
                    </div>
                    <div>

                    </div>
                </div>

                <div class="single-event-date-container-mobile">
                    <div class="blue-color" style="height: 120px; width: 120px; display:flex; align-items:center; border-radius: 0 0 10px 10px; background: transparent; border: 1px grey solid;   font-weight: bold;left:0; position: relative;">
                        <div style="position: absolute; left: 50%; right: 0; text-align: center; transform: translateX(-50%);">
                            <span style="font-size: x-large;"><?php echo $date->format('M') ?></span><br><span style="font-size: xxx-large; line-height: 55px;"><?php echo $date->format('d') ?></span>
                        </div>
                        <div style="color: black; position: absolute; left: 115%">
                            <div class="darker-blue-color" style="font-size: 22px; font-weight: bold"><?php echo $date->format('l') ?></div>
                            <div class=" blue-color" style="text-wrap: nowrap; font-size: 22px;"><?php echo $start_time ?> - <?php echo $end_time ?></div>
                        </div>
                    </div>
                </div>
            </section>
            <section style="width: 100vw">
                <div class="single-event-title-container">
                    <div style="flex: .6;   display: flex; flex-direction: column; justify-content: space-between; position: relative;  ">
                        <div class="darker-blue-color" style="flex:1;  font-size: xx-large; border-bottom: 1px solid lightgrey; font-weight: bold; line-height: 100px; text-align: left;"><?php echo $title ?></div>
                        <div style="flex:1; display: flex; flex-direction: row;  justify-content: space-around; align-items: center; margin: 30px 0">
                            <div class="shadow" style="font-size: 28px; background:white; padding: 15px 25px; border-radius: 5px"><span style='color:grey'><?php echo $free ?  "FREE" : "PRICE" ?></span>&nbsp;&nbsp;&nbsp;<span style="color: yellowgreen">20 Spots Open</span></div>
                            <div>
                                <button class="cursor-pointer" style=" box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 15px; padding: 15px 50px; display: flex; align-items: center;margin-left: 15px">REGISTER</button>
                            </div>
                        </div>
                        <div style="flex:1; display: flex; flex-direction: row; align-items:center; border-top: 1px solid lightgrey;">
                            <div>
                                <button class="cursor-pointer" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: rgb(26,113,200); border: 0; background:white; border: 2px solid rgb(26,113,200); font-size: 14px; padding: 10px 30px; display: flex; align-items: center;margin-left: 15px">Add to Calendar</button>
                            </div>
                            <div>
                                <button class="cursor-pointer" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: rgb(26,113,200); border: 0; background:white; border: 2px solid rgb(26,113,200); font-size: 14px; padding: 10px 30px; display: flex; align-items: center;margin-left: 15px">View Other Dates</button>
                            </div>
                        </div>
                    </div>
                    <div style="flex: .3; ">
                        <div class="shadow cursor-pointer" style="background: white; border-radius: 15px; width: 250px; height: 150px; text-align: center; margin: 0 auto; position:relative">
                            <div style="height: 65%; display: flex; flex-direction: column ">
                                <div style="font-size: 25px;flex:1; font-weight:bold; display:flex; flex-direction: column; justify-content: center; align-items: center; ">Organizer</div>
                                <div style=" display:flex; flex:1; flex-direction: column; align-items: center; justify-content: center;padding: 0 10px"><?php echo $venue[0]->post_title; ?></div>
                            </div>
                            <hr>
                            <div class="blue-color" style="display:flex; flex-direction: column; align-items: center; justify-content: center;  height: 20% ">More events by this organizer</div>
                        </div>
                    </div>
                </div>
                <div class="single-event-title-container-mobile" style="text-align: center;">
                    <div class="darker-blue-color" style=" margin:15px 0; font-size: xx-large; font-weight: bold; "><?php echo $title ?></div>
                    <div style="display: flex; flex-direction: row; justify-content: space-around;">
                        <div style="font-size: 28px;  text-align: center;  "><span style='color:grey'><?php echo $free ?  "FREE" : "PRICE" ?></span></div>
                        <div>
                            <button class="cursor-pointer" style=" box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 15px; padding: 15px 50px; display: flex; align-items: center;margin-left: 15px">REGISTER</button>
                        </div>
                    </div>
                </div>
                <div>

                </div>
            </section>
            <section class="single-event-description-container">
                <div class="shadow-sharp" style="flex:.4; min-width: 300px; background-color: white; border-radius: 10px; padding: 15px; height: 90%; color: rgb(50,50,50)">
                    <h1>Description</h1>
                    <p style="font-size: large; line-height: 25px"><?php echo $summary ?></p>
                </div>
                <div class="shadow-sharp" style="flex:.4; min-width: 300px; display: flex; background: green; justify-content: center; border-radius: 10px;align-items:center; padding: 15px; height: 90%;background-color: white; ">
                    <div style="width:90%; height: 90%; border-radius: 10px; overflow: hidden;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>">
                    </div>
                </div>
            </section>
            <?php if ($repeat) {
            ?>
                <section class="single-event-repeats-container">
                    <h1 style="font-weight: bold; text-align: center; font-size: xx-large; color: rgb(50,50,50)">Other Dates</h1>
                    <ul style="width: 100%; ">
                        <?php
                        for ($i = 1; $i <= $repeat; $i++) {
                            $date->modify('+1 week')
                        ?>
                            <li class="shadow" style="width: 90%; background: white;  margin: 40px auto; border-radius: 10px; min-height: max(150px, 100vh* .3); display: flex; flex-direction: row;align-items: center; justify-content: space-between; padding: 0 20px; box-sizing: border-box; flex-wrap: wrap; gap: 15px;">
                                <div>
                                    <div style="font-size:x-large; font-weight: bold; color: rgb(50,50,50)"><?php echo $date->format('l') ?>,&nbsp;&nbsp;<?php echo $date->format('M') . " " . $date->format('d') ?></div>
                                    <div style="text-align: center;font-size:large; color: rgb(50,50,50)"><?php echo $start_time ?> - <?php echo $end_time ?></div>
                                </div>
                                <div style="font-size: x-large;"><span style='color:grey'>Free</span>&nbsp;&nbsp;<span style="color: yellowgreen;">29 spots open</span></div>
                                <div style="display: flex; justify-content: space-around; ">
                                    <div style="display: flex; justify-content: space-around; ">
                                        <button class="cursor-pointer" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: rgb(26,113,200); border: 0; background:white; border: 2px solid rgb(26,113,200); font-size: 14px; padding: 10px 30px; display: flex; align-items: center;margin-left: 15px">More Details</button>
                                        <button class="cursor-pointer blue-bkg" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color:white; border: 0;   border: 2px solid rgb(26,113,200); font-size: 14px; padding: 10px 30px; display: flex; align-items: center;margin-left: 15px">Register</button>
                                    </div>
                                </div>

                            </li>
                        <?php
                        } ?>
                    </ul>

                    <div style="display: flex; justify-content: center;">
                        <button class="cursor-pointer" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 30px; color: rgb(26,113,200); border: 0; background:white; border: 2px solid rgb(26,113,200); font-size: 14px; padding: 10px 30px;">View More</button>
                    </div>
                </section>

            <?php } ?>
        </div>

    </div>
    <?php get_footer() ?>