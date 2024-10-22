<div style="display: flex; justify-content: space-between; align-items: center;padding-top: 5px; border-top: 3px rgb(0, 107, 222) solid ">
    <div style="padding-left: 10px; color: teal; text-align: left;">Learn about conditions and the<br>treatments we offer</div>
    <div style=" color: rgb(80,80,80); font-size: 18px; margin-right: 15px;  " class="fa fa-close"></div>
</div>
<div style="display: flex;height:60%; flex-direction: row; position: relative;  ">
    <div style="display: flex;    padding-left: 10px;  flex-direction: row; min-width:50%; justify-content: space-around;   flex-wrap:wrap">
        <?php foreach ($menu_nav_data["services"] as $services) { ?>
            <a class="dropdown-link-color-change" style="text-decoration: none; text-overflow: ellipsis;max-width:45%; flex: 0 0 50%; text-align: left; overflow: hidden; white-space: nowrap;   align-self: center;" href="<?php echo $services["link"] ?>"><?php echo $services["title"] ?></a>
        <?php
        }
        ?>
    </div>
</div>
<div style=" display:flex;height:20%;   align-items: center; justify-content: flex-start; padding-left: 20px; position: relative">
    <a href="<?php get_site_url() ?>/service"><button class="dropdown-button-color-change">View All Services</button></a>
</div>