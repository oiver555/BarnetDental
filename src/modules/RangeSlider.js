import { calculateDistance } from "./MyLocation";

 

    var slider = document.getElementById("myRange");
    const miles = document.getElementById("miles")
    const listContainer = document.getElementById('list-container');
    let container2 = document.getElementById('loading-2-animation');
    const container2AnimBkg = document.getElementById('loading-2-animation-bkg');
    const dentistAmount = document.querySelector('#dentist-amount')
    const myLocationInput = document.querySelector('#my-location-input')
    // Function to update thumb value
    function updateThumbValue() {
        miles.innerText = slider.value
    }

    export const filterByDistance = () => {
        container2.classList.replace("remove", "restore")
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                const userLatitude = position.coords.latitude;
                const userLongitude = position.coords.longitude;
                const currMiles = Number(document.getElementById("miles").innerText)
                for (let index = 0; index < listContainer.children.length; index++) {
                    if (index > 2) {

                        const element = listContainer.children[index];
                        const locationLat = Number(element.getAttribute("data-locationlat"))
                        const locationLon = Number(element.getAttribute("data-locationlon"))
                        const distanceInKilo = calculateDistance(locationLat, locationLon, userLatitude, userLongitude)
                        const distanceInMiles = distanceInKilo * 0.621371; // Convert kilometers to miles

                        if (distanceInMiles > currMiles) {
                            if (!element.classList.contains("remove")) dentistAmount.innerHTML = Number(dentistAmount.innerHTML) - 1
                            element.classList.add("remove")
                        } else {
                            if (element.classList.contains("remove")) dentistAmount.innerHTML = Number(dentistAmount.innerHTML) + 1
                            element.classList.remove("remove")
                        }
                    }
                }

            })
        }
        container2.classList.replace("restore", "remove")
        container2AnimBkg.classList.replace("reveal", "hide")

    }

    // Event listener to update thumb value on input change
    slider.addEventListener("input", updateThumbValue);
    slider.addEventListener("change", filterByDistance);
    myLocationInput.addEventListener("change", filterByDistance);

    // Initial call to update thumb value
    updateThumbValue();
 
