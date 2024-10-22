<?php get_header('home') ?>
<div style="background-image:url(<?php echo site_url() ?>/wp-content/uploads/2024/04/splash_image_bw-scaled.jpg); background-size: cover;background-position: center;background-repeat: no-repeat; height: 100%;width: 100%;  display:flex; justify-content:center; flex-direction: row; position: absolute">
    <div style="background: rgba(0,50,102,.7); mix-blend-mode: multiply; flex:.6; height: 100%;transform-origin: right; transform:scaleX(1.5) skewX(-20deg);"> </div>
    <div class="request-appt-container">
        <div style="position:relative; background: white; min-height: 50px; flex:1; height: 100%;transform-origin: left center; transform:  scaleX(1.5) skewX(-20deg);">
            <div style="transform: scaleX(0.67) skew(30deg);  top:2.5%; position:relative">
                <span style="display: flex; align-items:center; color:#005192;" class="tilt-neon-btn">Request Appt<i class="fas fa-chevron-right chevron"></i></span>
            </div>  
        </div>
    </div>
</div>
<div style="height: 100%;width: 100%;  display:flex; justify-content:center; flex-direction: row; position: absolute; overflow: hidden;">

    <div style="background: rgba(0,34,255,.0); mix-blend-mode: multiply; flex:.6; height: 100%;transform-origin: right; transform:  scaleX(1.5) skewX(-20deg);"> </div>
    <div class="scroll-down-container">
        <div style="transform: scaleX(1) skew(-30deg); width: 500px; height: 500px; background: rgba(0,0,0, .4); position: absolute; bottom: 7%; right:  -350px">
            <div class="tilt-neon-btn" style="background: #44B9FF; width: 100%; height: 60px; position:absolute; bottom: 0">
                <div style="color:white; transform: translateX(20px) skew(30deg); display:flex; align-items: center; height: 100%;  ">SCROLL DOWN <i class="fas fa-chevron-down chevron"></i></div>
            </div>
        </div>
        <div style="flex:1;   clip-path: polygon(-50% 93%, 100% 93%, 100% 100%, -50% 100%); height: 100%;  ">
            <div style="position:relative; background: white; min-height: 50px; flex:1;  height: 100%;transform-origin: left center; transform:  scaleX(1.5) skewX(-20deg);">
            </div>
        </div>
    </div>
</div>
<div class="hero-section">
    <div>
        <h1 class="tilt-neon-landing-h1">Consistent & Reliable</h1>
        <h1 class="tilt-neon-landing-h1">Dental Care</h1>
        <h3 class="tilt-neon-landing-h3">For Your Entire Family</h3>
    </div>
    <div>
        <a href="<?php echo site_url() ?>/about-us/" style="text-decoration: none">
            <div class="tilt-neon-btn" style="color:#005192; width: 165px;line-height: 0;border-bottom: 4px white solid; height: 55px;padding-left: 20px; background-color:#44B9FF; display:flex;  align-items: center;">Learn More<i class="fa fa-chevron-right chevron "> </i></div>
        </a>
    </div>
    <div style="position: relative; padding-top: 50px; width: 100%">
        <div id="search-input-container-1" class="search-input-container">
            <div id="live-results-container" class="shadow">
                <div id="spinner-1-blue" class="hide remove spinner-1-blue"></div>
            </div>
            <input id="search-input" class="search-input" placeholder="Search Barnet Dental" />
            <i id="search-btn" class="fa fa-search search-icon-homepage"></i>
            <div class="search-close">Close Search<i id="close-search" style="line-height:0;" class="fa fa-close chevron"></i></div>

        </div>
        <div class="background-overlay" id="background-overlay"></div>
        <div class="search-suggested-categories" id="search-suggested-categories-id">
            <div style="font-size: xx-large; flex:.3;  display: flex;   align-items: center; ">Not Sure what to Search? Others have searched for:</div>
            <div style="flex: .7; display: flex; justify-content: space-between; align-items: space-between; width: 100%;height: 100%;">
                <div style="height: 100%; display:flex; flex-direction: column; justify-content: space-between;font-size: large">
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/services/teeth-whitening/">Teeth Whitening</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/services/implants/">Dental Implants</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/services/ankyloglossia/">Ankyloglossia</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/services/lingual-tonsillitis/">Lingual Tonsillitis</a>
                </div>
                <div style="height: 100%; display:flex; flex-direction: column; justify-content: space-between;font-size: large">
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/services/stomatitis/">Stomatitis</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/services/check-ups/">Dental Check-ups</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/services/gum-disease-treatment/">Gum Disease Treatment</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/services/epulis/">Epulis</a>
                </div>
                <div style="height: 100%; display:flex; flex-direction: column; justify-content: space-between;font-size: large">
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/services/exostosis/">Exostosis</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/services/odontogenic-myxoma/">Odontogenic Myxoma</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/services/oral-cancer/">Oral Cancer</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/services/sialorrhea/">Sialorrhea</a>
                </div>
            </div>
        </div>

    </div>
    <div id="root"></div>


    <!-- <iframe src="https://master--virtual-teeth.netlify.app/" style="position: absolute; width: 500px; height: 500px;  top: 0"></iframe> -->
</div>
<div class="hero-section-mobile">
    <div>
        <h1 style="font-size: 2rem; margin: 0; letter-spacing: 3px;">Consistent & Reliable</h1>
        <h2 style="margin-bottom: 0;  padding: 0; letter-spacing: 2px;">Dental Care<br>For Your Entire Family</h2>

        <a style="color: white">Learn More <i class="fa fa-chevron-right chevron "> </i></a>
    </div>
    <div class="hero-section-search-container-mobile" id="hero-section-search-container-mobile">
        <div id="search-input-container-1-mobile" class="search-input-container-mobile">
            <div id="live-results-container-mobile" class="shadow" style="position: absolute; width: 100%; height: 100%; background: white;">
                <div id="spinner-1-blue-mobile" class="hide remove spinner-1-blue"></div>
            </div>

            <input id="search-input-mobile" class="search-input" placeholder="Search Barnet Dental" />
            <i id="search-btn" class="fa fa-search search-icon-homepage-mobile"></i>
            <div class="search-close">Close Search<i id="close-search" style="line-height:0;" class="fa fa-close chevron"></i></div>

        </div>

        <div class="search-suggested-categories-mobile" id="search-suggested-categories-id-mobile">
            <div style="font-size: x-large; flex:.3; width: 80%;  margin: 0 auto;">Not Sure what to Search? Others have searched for:</div>
            <div style="flex: .7; display: flex; justify-content: space-around;   width: 100%;height: 100%;">
                <div style="height: 100%; display:flex; flex-direction: column; justify-content: space-between;font-size: large">
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/service/teeth-whitening/">Teeth Whitening</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/service/implants/">Dental Implants</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/service/ankyloglossia/">Ankyloglossia</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/service/odontogenic-myxoma/">Odontogenic Myxoma</a>
                </div>
                <div style="height: 100%; display:flex; flex-direction: column; justify-content: space-between;font-size: large">
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/service/stomatitis/">Stomatitis</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/service/check-ups/">Dental Check-ups</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/service/gum-disease-treatment/">Gum Disease Treatment</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/service/epulis/">Epulis</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/service/oral-cancer/">Oral Cancer</a>
                    <a style="color: inherit; text-decoration: none;" href="<?php echo site_url() ?>/service/sialorrhea/">Sialorrhea</a>
                </div>

            </div>
        </div>

    </div>
    <div class="background-overlay" id="background-overlay-mobile"></div>

</div>
</div>

<section style="width: 100%; padding: 25px 0; min-height:1200px; display:flex; flex-direction: column;align-items: center; justify-content: space-around; position:relative; overflow: hidden;">
    <div class="collage-container">
        <img style=" filter:brightness(100%) blur(5px); width: 50%;position:absolute; right: 20%;  transform: skewX(-40deg);" src="<?php echo get_theme_file_uri('/images/amanda-sofia-pellenz-YuidWzM37C0-unsplash.jpg') ?>" />

        <img style=" filter:brightness(100%) blur(5px); width: 20%;position:absolute; left:10%; bottom:-50px;  transform: skewX(-40deg); " src="<?php echo get_theme_file_uri('/images/gideon-hezekiah-57-0lgqwQOY-unsplash.jpg') ?>" />

        <div style="width: 40%; height: 50%;  transform: skewX(-40deg);  position:absolute; left: 0px;   display:flex; align-items: flex-start;    ">
            <img style=" filter:brightness(100%) blur(2px); width: 100%;" src="<?php echo get_theme_file_uri('/images/towfiqu-barbhuiya-rr0cuFV-0Mo-unsplash.jpg') ?>" />
        </div>
        <div style="width: 50%; height: 100%;   transform: skewX(-60deg); overflow: hidden; position:relative">

            <img style=" filter:brightness(100%) blur(5px); width: 80%; transform: skewX(40deg); top: 0px; right: 0; position:absolute;" src="<?php echo get_theme_file_uri('/images/marek-studzinski-8zNDmxBWZdU-unsplash.webp') ?>" />

            <div style="width: 50%; height: 100%;  transform: skewX(60deg); display:flex; align-items: center;">
                <img style=" filter:brightness(100%) blur(5px); width: 200%; transform: skewX(-40deg); bottom: 0%; position:absolute;" src="<?php echo get_theme_file_uri('/images/diana-polekhina-Er3c9JVvUZM-unsplash.jpg') ?>" />

                <img style=" filter:brightness(40%) blur(5px); width: 100%; transform: skewX(-40deg); " src="<?php echo get_theme_file_uri('/images/michael-dam-mEZ3PoFGs_k-unsplash.webp') ?>" />
            </div>
            <div style="width: 50%; height: 100%;  transform: skewX(-0deg);  position:absolute; right: 0; top: 0;  display:flex; align-items: flex-start;  overflow: hidden; ">
                <img style=" filter:brightness(100%) blur(5px); width: 180%; transform: skewX(41deg);" src="<?php echo get_theme_file_uri('/images/diana-polekhina-fmB7IdFjhTM-unsplash.jpg') ?>" />
            </div>
            <div style="width: 50%; height: 100%;  position:relative; transform: skewX(60deg); position:absolute; right: 0; top: 0; overflow: hidden; display:flex; align-items: center; ">
                <img style=" filter:brightness(100%) blur(5px); width: 120%; transform: skewX(-40deg); top: 10px; position:absolute;" src="<?php echo get_theme_file_uri('/images/s-b-vonlanthen-FaiZNiofP-U-unsplash.jpg') ?>" />
                <img style=" filter:brightness(70%) blur(5px); width: 100%; transform: skewX(-40deg);" src="<?php echo get_theme_file_uri('/images/isaiah-mcclean-DrVJk1EaPSc-unsplash.jpg') ?>" />
            </div>

        </div>


    </div>
    <div class="collage-container-mobile">
        <div style="background: blue; width: 50%; height: 100%; transform: skew(30deg); position: absolute;">
            <div style="background: lime; height: 50%; width: 100%; position: relative; overflow: hidden; display: flex; flex-direction: column; align-items:center; justify-content: center;">
                <img style=" width: 250%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/amanda-sofia-pellenz-YuidWzM37C0-unsplash.jpg') ?>" />
                <img style=" width: 250%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/amanda-sofia-pellenz-YuidWzM37C0-unsplash.jpg') ?>" />
            </div>
            <div style="background: lightblue; height: 25%; width: 100%; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                <img style=" width: 200%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/gideon-hezekiah-57-0lgqwQOY-unsplash.jpg') ?>" />
            </div>
            <div style="background: teal; height: 25%; width: 100%; overflow: hidden;  display: flex; align-items: center; justify-content: center;">
                <img style=" width: 200%;   object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/amanda-sofia-pellenz-YuidWzM37C0-unsplash.jpg') ?>" />
            </div>
        </div>
        <div style="background: yellow; width: 50%; height: 100%; transform: skew(30deg) translateX(100%); position: absolute;">
            <div style="background: yellowgreen; height: 25%; width: 100%; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/michael-dam-mEZ3PoFGs_k-unsplash.webp') ?>" />
            </div>
            <div style="background: goldenrod; height: 25%; width: 100%; overflow: hidden; display: flex; align-items:center ; justify-content: center;position: relative; flex-direction: column;">
                <img style="display: block;  width: 250%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/gideon-hezekiah-57-0lgqwQOY-unsplash.jpg') ?>" />
                <img style="display: block;  width: 250%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/gideon-hezekiah-57-0lgqwQOY-unsplash.jpg') ?>" />
                <img style="display: block;  width: 250%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/gideon-hezekiah-57-0lgqwQOY-unsplash.jpg') ?>" />

            </div>
            <div style="background: red; height: 50%; width: 100%; overflow: hidden; display: flex; align-items: flex-start; justify-content: center;">
                <img style="display: block; width: 300%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/s-b-vonlanthen-FaiZNiofP-U-unsplash.jpg') ?>" />

            </div>
        </div>
        <div style="background: red; width: 50%; height: 100%; transform: skew(30deg) translateX(200%); position: absolute;">
            <div style="background: aqua; height: 50%; width: 100%; overflow: hidden; display: flex; align-items: flex-start; justify-content: center;">
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/isaiah-mcclean-DrVJk1EaPSc-unsplash.jpg') ?>" />
            </div>
            <div style="background: blue; height: 50%; width: 100%; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                <img style=" width: 200%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/gideon-hezekiah-57-0lgqwQOY-unsplash.jpg') ?>" />
            </div>
            <div style="background: darkblue; height: 50%; width: 100%; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                <img style=" width: 200%;   object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/amanda-sofia-pellenz-YuidWzM37C0-unsplash.jpg') ?>" />
            </div>
        </div>
        <div style="background: yellow; width: 50%; height: 100%; transform: skew(30deg) translateX(-100%); position: absolute;">
            <div style="background: darkblue; height: 50%; width: 100%; display: flex; align-items: center; justify-content: center;overflow: hidden; flex-direction: column;">
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/isaiah-mcclean-DrVJk1EaPSc-unsplash.jpg') ?>" />
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/isaiah-mcclean-DrVJk1EaPSc-unsplash.jpg') ?>" />
            </div>
            <div style="background: red; height: 50%; width: 100%; display: flex; align-items: center; justify-content: center;overflow: hidden; flex-direction: column;">
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/isaiah-mcclean-DrVJk1EaPSc-unsplash.jpg') ?>" />
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/isaiah-mcclean-DrVJk1EaPSc-unsplash.jpg') ?>" />
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/isaiah-mcclean-DrVJk1EaPSc-unsplash.jpg') ?>" />
            </div>
            <div style="background: blue; height: 50%; width: 100%; display: flex; align-items: center; justify-content: center;overflow: hidden;">
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/isaiah-mcclean-DrVJk1EaPSc-unsplash.jpg') ?>" />
            </div>
        </div>
        <div style="background: cyan; width: 50%; height: 100%; transform: skew(30deg) translateX(-200%); position: absolute;">
            <div style="background: darkorchid; height: 50%; width: 100%; display: flex; align-items: flex-start; justify-content: center;overflow: hidden;">
                <img style="  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/diana-polekhina-Er3c9JVvUZM-unsplash.jpg') ?>" />
            </div>
            <div style="background: purple; height: 50%; width: 100%; display: flex; align-items: center; justify-content: center;overflow: hidden; flex-direction: column;">
                <img style="  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/diana-polekhina-Er3c9JVvUZM-unsplash.jpg') ?>" />
                <img style="  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/marek-studzinski-8zNDmxBWZdU-unsplash.webp') ?>" />
            </div>
            <div style="background: darkmagenta; height: 50%; width: 100%; display: flex; align-items: center; justify-content: center;overflow: hidden;">
                <img style="  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/diana-polekhina-Er3c9JVvUZM-unsplash.jpg') ?>" />
            </div>
        </div>
        <div style="background: lime; width: 50%; height: 100%; transform: skew(30deg) translateX(300%); position: absolute;">
            <div style="background: darkorchid; height: 20%; width: 100%; display: flex; align-items: flex-start; justify-content: center;overflow: hidden;">
                <img style="  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/diana-polekhina-Er3c9JVvUZM-unsplash.jpg') ?>" />
            </div>
            <div style="background: yellow; height: 50%; width: 100%; display: flex; align-items: flex-start; justify-content: flex-end;overflow: hidden;">
                <img style=" width: 250%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/isaiah-mcclean-DrVJk1EaPSc-unsplash.jpg') ?>" />
            </div>
            <div style="background: darkmagenta; height: 50%; width: 100%; display: flex; align-items: center; justify-content: center;overflow: hidden;">
                <img style="  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/diana-polekhina-Er3c9JVvUZM-unsplash.jpg') ?>" />
            </div>
        </div>
        <div style="background: lime; width: 50%; height: 100%; transform: skew(30deg) translateX(400%); position: absolute;">
            <div style="background: darkorchid; height: 50%; width: 100%; display: flex; align-items: flex-start; justify-content: center;overflow: hidden;">
                <img style=" object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/marek-studzinski-8zNDmxBWZdU-unsplash.webp') ?>" />
            </div>
            <div style="background: purple; height: 50%; width: 100%; display: flex; align-items: center; justify-content: center;overflow: hidden;">
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/isaiah-mcclean-DrVJk1EaPSc-unsplash.jpg') ?>" />
            </div>
            <div style="background: darkmagenta; height: 50%; width: 100%; display: flex; align-items: center; justify-content: center;overflow: hidden;">
                <img style="  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/diana-polekhina-Er3c9JVvUZM-unsplash.jpg') ?>" />
            </div>
        </div>
        <div style="background: lime; width: 50%; height: 100%; transform: skew(30deg) translateX(500%); position: absolute;">
            <div style="background: darkorchid; height: 50%; width: 100%; display: flex; align-items: flex-start; justify-content: center;overflow: hidden;">
                <img style=" object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/marek-studzinski-8zNDmxBWZdU-unsplash.webp') ?>" />
            </div>
            <div style="background: purple; height: 50%; width: 100%; display: flex; align-items: center; justify-content: center;overflow: hidden;">
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/isaiah-mcclean-DrVJk1EaPSc-unsplash.jpg') ?>" />
            </div>
            <div style="background: darkmagenta; height: 50%; width: 100%; display: flex; align-items: center; justify-content: center;overflow: hidden;">
                <img style="  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/diana-polekhina-Er3c9JVvUZM-unsplash.jpg') ?>" />
            </div>
        </div>
        <div style="background: lime; width: 50%; height: 100%; transform: skew(30deg) translateX(-300%); position: absolute;">
            <div style="background: darkorchid; height: 50%; width: 100%; display: flex; align-items: flex-start; justify-content: center;overflow: hidden;">
                <img style=" object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/marek-studzinski-8zNDmxBWZdU-unsplash.webp') ?>" />
            </div>
            <div style="background: purple; height: 50%; width: 100%; display: flex; align-items: center; justify-content: center;overflow: hidden; flex-direction: column;">
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/isaiah-mcclean-DrVJk1EaPSc-unsplash.jpg') ?>" />
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/isaiah-mcclean-DrVJk1EaPSc-unsplash.jpg') ?>" />
            </div>
            <div style="background: darkmagenta; height: 50%; width: 100%; display: flex; align-items: center; justify-content: center;overflow: hidden;">
                <img style="  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/diana-polekhina-Er3c9JVvUZM-unsplash.jpg') ?>" />
            </div>
        </div>
        <div style="background: lime; width: 50%; height: 100%; transform: skew(30deg) translateX(-400%); position: absolute;">
            <div style="background: darkorchid; height: 50%; width: 100%; display: flex; align-items: flex-start; justify-content: center;overflow: hidden;">
                <img style=" object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/marek-studzinski-8zNDmxBWZdU-unsplash.webp') ?>" />
            </div>
            <div style="background: purple; height: 50%; width: 100%; display: flex; align-items: center; justify-content: center;overflow: hidden; flex-direction: column;">
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/diana-polekhina-fmB7IdFjhTM-unsplash.jpg') ?>" />
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/diana-polekhina-fmB7IdFjhTM-unsplash.jpg') ?>" />
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/diana-polekhina-fmB7IdFjhTM-unsplash.jpg') ?>" />
            </div>
            <div style="background: darkmagenta; height: 50%; width: 100%; display: flex; align-items: center; justify-content: center;overflow: hidden;">
                <img style="  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/diana-polekhina-Er3c9JVvUZM-unsplash.jpg') ?>" />
            </div>
        </div>
        <div style="background: lime; width: 50%; height: 100%; transform: skew(30deg) translateX(-500%); position: absolute;">
            <div style="background: darkorchid; height: 50%; width: 100%; display: flex; align-items: flex-start; justify-content: center;overflow: hidden;">
                <img style=" object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/amanda-sofia-pellenz-YuidWzM37C0-unsplash.jpg') ?>" />
                <img style=" object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/amanda-sofia-pellenz-YuidWzM37C0-unsplash.jpg') ?>" />
            </div>
            <div style="background: purple; height: 50%; width: 100%; display: flex; align-items: center; justify-content: center;overflow: hidden; flex-direction: column;">
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/amanda-sofia-pellenz-YuidWzM37C0-unsplash.jpg') ?>" />
                <img style=" width: 350%;  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/amanda-sofia-pellenz-YuidWzM37C0-unsplash.jpg') ?>" />
            </div>
            <div style="background: darkmagenta; height: 50%; width: 100%; display: flex; align-items: center; justify-content: center;overflow: hidden;">
                <img style="  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/amanda-sofia-pellenz-YuidWzM37C0-unsplash.jpg') ?>" />
                <img style="  object-fit: cover; transform: skew(-30deg); " src="<?php echo get_theme_file_uri('/images/amanda-sofia-pellenz-YuidWzM37C0-unsplash.jpg') ?>" />
            </div>
        </div>
    </div>
    <div style="width: 80%;  flex:.25;  display:flex; align-items:center; position:relative;  justify-content: space-around; color: white; z-index: 2; flex-wrap: wrap; gap: 15px;">
        <div class="medium-content-card">
            <div style="flex: .25; width: 25%;  display:flex; align-items:center; justify-content: center;"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2024/05/icon-telehealth.svg" /></div>
            <h2 style=" line-height: 0; display:flex; align-items:center; padding:0; margin: 0 ">Telehealth</h2>
            <div style="flex: .15; font-size: 18px; line-height: 20px; letter-spacing: 1px">Telephone and video visits for new & existing patients.</div>
            <div style="flex: .15; ">
                <a class="cursor-pointer" href="<?php echo get_site_url() ?>/telehealth/" style="border-radius: 20px; text-decoration: none; color: orange; border: 0; background: white; font-size: 15px; padding: 10px 15px">Learn More</a>
            </div>
        </div>
        <div class="medium-content-card">
            <div style="flex: .25; width: 25%;  display:flex; align-items:center; justify-content: center;"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2024/05/icon-appointment.svg" /></div>
            <h2 style=" line-height: 0; display:flex; align-items:center; padding:0; margin: 0 ">Classes & Support</h2>
            <div style="flex: .15; font-size: 18px; line-height: 20px; letter-spacing: 1px">Discover our support groups & community classes.</div>
            <div style="flex: .15; ">
                <a class="cursor-pointer" href="<?php echo get_site_url() ?>/events/" style="border-radius: 20px; color: orange; border: 0; background: white; font-size: 15px; padding: 10px 15px; text-decoration: none;">Learn More</a>
            </div>
        </div>
        <div class="medium-content-card">
            <div style="flex: .25; width: 25%;  display:flex; align-items:center; justify-content: center;"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2024/05/icon-bill-pay.svg" /></div>
            <h2 style=" line-height: 0; display:flex; align-items:center; padding:0; margin: 0 ">Bill Pay Options</h2>
            <div style="flex: .15; font-size: 18px; line-height: 20px; letter-spacing: 1px">Convient options for paying for your medical services.</div>
            <div style="flex: .15; ">
                <a href="<?php echo get_site_url() ?>/pay-my-bill/" class="cursor-pointer" style="border-radius: 20px; color: orange; border: 0; background: white; font-size: 15px; padding: 10px 15px; text-decoration: none;">Learn More</a>
            </div>
        </div>
    </div>

    <div style="width: 100%; flex:.6; display:flex; flex-direction: column;   position:relative; color: white; text-align:center">
        <div>
            <h1>Find Care Near You</h1>
            <h3>We provide exceptional health care services in Orange County, Sullivan County and its surrounding areas.</h3>
        </div>

        <div style=" display:flex;   flex-direction: column; width: 80%;flex:1; align-self: center; text-align:left; margin-top: 15px">
            <div style="display:flex;  flex:.94; flex-wrap: wrap; gap: 15px ">
                <div class="location-medical-center-link" style="flex:600px; min-height: 250px;  background-image: url(<?php echo get_theme_file_uri('/images/532f4d87bdced52ed6eda31fbd50dd7f.jpg') ?>); background-repeat: no-repeat; background-size: cover ; border-radius: 21px; display:flex; flex-direction: column; justify-content: space-between; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7);">
                    <div style="background: rgba(0,0,0,.5); width: 100%; border-radius: 20px 20px 0 0px; padding: 12px 0px ">
                        <h2 style=" margin:0; margin-left: 30px">Medical Centers</h2>
                    </div>
                    <div style="margin-bottom: 25px; margin-left: 25px">
                        <button style="background: rgb(26,113,200);color: white;  padding: 5px 25px ; border-radius: 30px; border: 0; font-size: medium;">View All<i class="fa fa-chevron-right chevron"></i></button>
                    </div>
                </div>
                <div class="location-urgent-care-link" style="flex:  250px; min-height: 250px; background-image: url(<?php echo get_theme_file_uri('/images/R.jpg') ?>); background-repeat: no-repeat; background-size: cover ; border-radius: 21px; display:flex; flex-direction: column; justify-content: space-between; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7);">
                    <div style="background: rgba(0,0,0,.5); width: 100%; border-radius: 20px 20px 0 0px; padding: 12px 0px ">
                        <h2 style=" margin:0; margin-left: 30px">Urgent Care</h2>
                    </div>
                    <div style="margin-bottom: 25px; margin-left: 25px">
                        <button style="background: rgb(26,113,200);color: white;  padding: 5px 25px ; border-radius: 30px; border: 0; font-size: medium;">View All<i class="fa fa-chevron-right chevron"></i></button>
                    </div>
                </div>
                <div class="location-school-link" style="flex: 250px; min-height: 250px; background-image: url(<?php echo get_theme_file_uri('/images/dental-clinic-25.jpg') ?>); background-repeat: no-repeat; background-size: cover ; border-radius: 21px; display:flex; flex-direction: column; justify-content: space-between; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7);">
                    <div style="background: rgba(0,0,0,.5); width: 100%; border-radius: 20px 20px 0 0px; padding: 12px 0px ">
                        <h2 style=" margin:0; margin-left: 30px">School</h2>
                    </div>
                    <div style="margin-bottom: 25px; margin-left: 25px">
                        <button style="background: rgb(26,113,200);color: white;  padding: 5px 25px ; border-radius: 30px; border: 0; font-size: medium;">View All<i class="fa fa-chevron-right chevron"></i></button>
                    </div>
                </div>

                <div class="location-specialty-care-link" style="flex:250px; min-height: 250px;   background-image: url(<?php echo get_theme_file_uri('/images/Dental-Procedures-scaled.jpg') ?>); background-repeat: no-repeat; background-size: cover ; border-radius: 21px; display:flex; flex-direction: column; justify-content: space-between; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7);">
                    <div style="background: rgba(0,0,0,.5); width: 100%; border-radius: 20px 20px 0 0px; padding: 12px 0px ">
                        <h2 style=" margin:0; margin-left: 30px">Specialty Care</h2>
                    </div>
                    <div style="margin-bottom: 25px; margin-left: 25px">
                        <button style="background: rgb(26,113,200);color: white;  padding: 5px 25px ; border-radius: 30px; border: 0; font-size: medium;">View All<i class="fa fa-chevron-right chevron"></i></button>
                    </div>
                </div>
                <div class="location-orthodontics-link" style="flex:600px; min-height: 250px;  background-image: url(<?php echo get_theme_file_uri('/images/13-290-VA-Durham-Specialty-Care-10-1-870x570.jpg') ?>); background-repeat: no-repeat; background-size: cover ; border-radius: 21px; display:flex; flex-direction: column; justify-content: space-between; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7);">
                    <div style="background: rgba(0,0,0,.5); width: 100%; border-radius: 20px 20px 0 0px; padding: 12px 0px ">
                        <h2 style=" margin:0; margin-left: 30px">Orthodontics</h2>
                    </div>
                    <div style="margin-bottom: 25px; margin-left: 25px">
                        <button style="background: rgb(26,113,200);color: white;  padding: 5px 25px ; border-radius: 30px; border: 0; font-size: medium;">View All<i class="fa fa-chevron-right chevron"></i></button>
                    </div>
                </div>
                <div class="location-all-link" style="flex:250px; min-height: 250px; background:rgba(0,114,179,1); border-radius: 21px; display:flex; flex-direction: column; justify-content: space-between; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7); position: relative">
                    <div style=" width: 100%; border-radius: 20px 20px 0 0px; padding: 16px 32px; position: relative ">
                        <h2 style=" margin:0;  letter-spacing: 1px;">Not Sure Which to Choose?</h2>
                        <div style="font-size: 20px;top: 15px; position: relative">View All<i style="font-size: 15px;" class="fa fa-chevron-right chevron"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="width: 100%; display:flex; padding-bottom:50px; justify-content: center; min-height: 500px; align-items:center; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.7); position: relative;">
    <div style="display: flex; width: 80%;gap:15px;   flex-wrap: wrap; justify-content: space-around;">
        <div style="flex:400px; display:flex; justify-content: center; flex-direction: column ; gap: 15px">
            <h1 style="font-size: xx-large; margin-bottom: 0;  letter-spacing: 1.5px;">How is Your Dental Health?</h1>
            <p style="font-size: 20px; line-height: 24px; letter-spacing: 1px;">Heart disease is the leading cause of death in America and knowing your risk of developing it can help you lower your chances. Our online tool can help you find out if your heart age is higher or lower than your actual age.</p>
            <div style="width: 100%; display: flex; justify-content: center;">
                <button style="font-size: 22px;background: rgb(26,113,200);color: white;  padding: 18px 18px ; border-radius: 30px; border: 0">Take the Dental Health Risk Assessment<i style="font-size: 20px" class="fa fa-chevron-right chevron"></i></button>
            </div>
        </div>

        <div style="  flex: 0 450px;; display: flex; justify-content: center; align-items: center;">
            <img style="width:110%" src="<?php echo get_theme_file_uri('/images/caroline-lm-JiBssiZVPZA-unsplash.jpg') ?>" />
        </div>
    </div>
</section>

<section style="width: 100%; display:flex; box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5); align-items: center; justify-content: space-around; flex-direction: column; min-height: 900px; padding: 50px 0px; background: rgb(225,225,225); position: relative;">
  <?php include(dirname(__FILE__)."/template-parts/testimonials-section.php")  ?>

  <div style=" top: 25px; position: relative">
        <button style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);border-radius: 20px; color: white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 15px; padding: 8px 20px;"><a style="text-decoration: inherit; color: inherit;" href="<?php echo get_site_url() ?>/testimonial/">All Stories</a></button>
    </div>
    
</section>
<?php get_footer() ?>