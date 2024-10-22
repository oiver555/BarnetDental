<div style="display: flex; justify-content: space-between; align-items: center;padding-top: 5px; border-top: 3px rgb(0, 107, 222) solid ">
    <div style="padding-left: 10px; color: teal; cursor:default;">Search by name, specialty and more</div>
    <div style=" color: rgb(80,80,80); font-size: 18px; margin-right: 15px;  " class="fa fa-close"></div>
</div>
<div style="display: flex;height:70%; flex-direction: row; position: relative;  ">

    <div style="display: flex;  padding-left: 10px; flex-direction: row; justify-content: space-around; flex-wrap:wrap"> 
        <?php
        foreach ($menu_nav_data["specialties"] as $specialties) {
        ?>
            <a class="dropdown-link-color-change" style="text-decoration: none;text-align: left;  align-self: center; flex:0 0 50% " href="<?php echo get_site_url() ?>/find-a-dentist/specialties/<?php echo str_replace( " ", "-", $specialties,) ?>"><?php echo $specialties ?></a>
        <?php
        }
        ?> 
    </div>
     
</div>


<div style=" display:flex;height:20%;  align-items: center; justify-content: flex-start; padding-left: 20px; position: relative">
    <a href="<?php echo get_site_url() ?>/find-a-dentist/" id="view-all-dentists-btn" class="dropdown-button-color-change">View All Dentists</a>
</div>