<ul class="dropdown-menu" id="dropdown-venue-menu">
    <li style="height: 14.29%;"></li>
    <?php
    foreach ($locations->data as $location) {
        echo '<li id="'.$location["id"].'">' . $location["name"]  . '</li>';
    }
    ?>
</ul>