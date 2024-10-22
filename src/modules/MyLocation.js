
document.addEventListener('DOMContentLoaded', function () {

    const locationInput = document.getElementById('my-location-input');
    const useLocationBtn = document.getElementById('useLocationBtn');
    const loading1Anim = document.getElementById('loading-1-animation');
    const container2 = document.getElementById('loading-2-animation');
    const container2AnimBkg = document.getElementById('loading-2-animation-bkg');

    useLocationBtn.addEventListener('click', function () {
        locationInput.classList.add("my-location-input-fade-in")
        loading1Anim.classList.add("reveal")
        loading1Anim.classList.remove("hide")
        container2 && container2.classList.replace("remove", "restore")
        container2 && container2AnimBkg.classList.replace("hide", "reveal")
        // Request the user's location
        navigator.geolocation.getCurrentPosition(success, error, options);
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                const userLatitude = position.coords.latitude;
                const userLongitude = position.coords.longitude;
                // Use latitude and longitude to fetch address using reverse geocoding API
                fetch(`https://nominatim.openstreetmap.org/reverse?lat=${userLatitude}&lon=${userLongitude}&format=json`)
                    .then(response => response.json())
                    .then(data => {
                        const address = data.display_name;
                        locationInput.value = address;
                        const syntheticEvent = new Event('change');
                        locationInput.dispatchEvent(syntheticEvent);
                        locationInput.classList.remove("my-location-input-fade-in")
                        loading1Anim.classList.add("hide")
                        loading1Anim.classList.remove("reveal")
                    })
                    .catch(error => {
                        locationInput.classList.remove("my-location-input-fade-in")
                        loading1Anim.classList.add("hide")
                        loading1Anim.classList.remove("reveal")
                        console.error('Error fetching address:', error);
                    });
            }, function (error) {
                console.error('Error getting user location:', error);
            });
        } else {
            locationInput.classList.remove("my-location-input-fade-in")
            loading1Anim.classList.add("hide")
            loading1Anim.classList.remove("reveal")
            console.error('Geolocation is not supported by this browser.');
        }
    });

    // Function to handle successful retrieval of the user's location
    function success(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);
    }

    // Function to handle errors in retrieving the user's location
    function error(err) {
        console.warn(`ERROR(${err.code}): ${err.message}`);
    }

    // Options for geolocation retrieval
    const options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    };
})

// Function to calculate distance between two points using Haversine formula
function calculateDistance(lat1, lon1, lat2, lon2) {
    const R = 6371; // Radius of the Earth in kilometers
    const dLat = (lat2 - lat1) * Math.PI / 180;
    const dLon = (lon2 - lon1) * Math.PI / 180;
    const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    const distance = R * c; // Distance in kilometers
    return distance;
}


export { calculateDistance }
