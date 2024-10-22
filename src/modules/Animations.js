document.addEventListener('DOMContentLoaded', function () {

    let container1 = document.getElementById('loading-1-animation');
    let container2 = document.getElementById('loading-2-animation');
    let container3 = document.getElementById('spinner-1-blue');
    let container4 = document.getElementById('spinner-1-blue-mobile');
    // Specify the path to your Lottie animation file
    const animationData = themeData.themeUri + '/lottie/loading_1.json';
    const animationData2 = themeData.themeUri + '/lottie/loading_2.json';
    const spinnerWhite = themeData.themeUri + '/lottie/spinner_blue.json';

    // Load and render the animation
    container1 && lottie.loadAnimation({
        container: container1,
        renderer: 'svg', // Choose renderer: svg, canvas, html
        loop: true, // Whether the animation should loop
        autoplay: true, // Whether the animation should start playing automatically
        path: animationData // Path to the animation json file
    });
    container2 && lottie.loadAnimation({
        container: container2,
        renderer: 'svg', // Choose renderer: svg, canvas, html
        loop: true, // Whether the animation should loop
        autoplay: true, // Whether the animation should start playing automatically
        path: animationData2 // Path to the animation json file
    });
    container3 && lottie.loadAnimation({
        container: container3,
        renderer: 'svg', // Choose renderer: svg, canvas, html
        loop: true, // Whether the animation should loop
        autoplay: true, // Whether the animation should start playing automatically
        path: spinnerWhite // Path to the animation json file
    });
    container4 && lottie.loadAnimation({
        container: container4,
        renderer: 'svg', // Choose renderer: svg, canvas, html
        loop: true, // Whether the animation should loop
        autoplay: true, // Whether the animation should start playing automatically
        path: spinnerWhite // Path to the animation json file
    });

    // Remove the Duplicate SVG Animations due to Lottie Library Bug
    setTimeout(() => {
        container1 = document.getElementById('loading-1-animation');
        container1 && container1.children[0].classList.add("remove")
        container2 = document.getElementById('loading-2-animation');
        container2 && container2.children[0].classList.add("remove")
        container3 = document.getElementById('spinner-1-blue');
        container3 && container3.children[1]  && container3.children[0].classList.add("remove")
        
    }, 2000)

})