 <div style="display: flex; justify-content: space-between; align-items: center;padding-top: 5px; border-top: 3px rgb(0, 107, 222) solid ">
     <div style="padding-left: 10px; color: teal; text-align: left;">View locations, hours and contact information</div>
     <div style=" color: rgb(80,80,80); font-size: 18px; margin-right: 15px;  " class="fa fa-close"></div>
 </div>
 <div style="display: flex;height:60%; flex-direction: row; position: relative;  ">
     <div style="display: flex;  padding-left: 10px; flex-direction: row; justify-content: space-around; flex-wrap:wrap">

         <?php
            foreach ($menu_nav_data["location_types"] as $location_type) {
            ?>
             <a class="dropdown-link-color-change" style="text-decoration: none;text-align: left;  align-self: center; flex:0 0 50% " href="<?php echo get_site_url() ?>/location/?type=<?php echo $location_type ?>"><?php echo $location_type ?></a>
         <?php
            }
            ?>

     </div>
 </div>
 <div style=" display:flex;height:20%;  align-items: center; justify-content: flex-start; padding-left: 20px; position: relative">
     <a href="<?php echo get_site_url() ?>/location/" id="view-all-locations-btn" class="dropdown-button-color-change">View All Locations</a>
 </div>