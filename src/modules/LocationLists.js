import { clearMarkers, setupMap } from "./Map"
const dropdownFacilityInput = document.querySelector("#dropdown-facility-input")
const dropdownServiceInput = document.querySelector("#dropdown-service-input")
const locationsAmount = document.querySelector("#locations-amount")
const locationListContainer = document.querySelector("#location-list-container")
const filterLocationBtnMobile = document.querySelector("#filter-location-btn-mobile")
const headerLocation = document.querySelector("#header-location")
let dropdownFacilityInputValue = ""
let dropdownServiceInputValue = ""
let prevDropdownFacilityInput = ""

dropdownFacilityInput.addEventListener("change", (e) => {

    dropdownFacilityInputValue = e.target.value

    prevDropdownFacilityInput == e.target.value ?
        console.log("no change") : e.target.value ?
            fetch(`${wpData.baseUrl}/wp-json/myplugin/v1/locations-filtered?type=${dropdownFacilityInputValue}&service=${dropdownServiceInputValue}`)
                .then(response => response.json())
                .then(posts => {
                    locationsAmount.textContent = posts.length
                    clearLocationList()
                    posts.forEach((data, index) => {
                        insertLocationItem(data, ++index)
                    })
                    setupMap()
                }) : getAlllocations()

    prevDropdownFacilityInput = e.target.value
})
dropdownServiceInput.addEventListener("change", (e) => {
    dropdownServiceInputValue = e.target.value
    fetch(`${wpData.baseUrl}/wp-json/myplugin/v1/locations-filtered?type=${dropdownFacilityInputValue}&service=${dropdownServiceInputValue}`)
        .then(response => response.json())
        .then(posts => {
            locationsAmount.textContent = posts.length
            clearLocationList()
            posts.forEach((data, index) => {
                insertLocationItem(data, ++index)
            })
            setupMap()
        })
})

filterLocationBtnMobile.addEventListener("click", () => {
    headerLocation.classList.toggle("header-location-elongated-mobile")
    document.querySelector(".filter-location-container").classList.toggle("reveal")
    document.querySelector(".filter-location-container").classList.toggle("remove")
})

const getAlllocations = () => {
    console.log("getAllLocations")
    fetch(`${wpData.baseUrl}/wp-json/myplugin/v1/all-locations`)
        .then(response => response.json())
        .then(posts => {
            locationsAmount.textContent = posts.length
            posts.forEach((post, index) => {
                insertLocationItem(post, ++index)
            })
            var event = new Event('change', {
                bubbles: true,  // Indicates whether the event bubbles up through the DOM or not
                cancelable: true  // Indicates whether the event is cancelable or not
            });

            // Dispatch the synthetic event on the target element
            locationListContainer.dispatchEvent(event);
        })
        .finally(() => { if (locationListContainer.children.length > 0) setupMap() })
}
const clearLocationList = () => {
    locationListContainer.innerHTML = ""
}
const init = () => {
    console.log("init()")
    console.log(wpDataLocation)

    const urlParams = new URLSearchParams(window.location.search);
    if (wpDataLocation.location_ids) {

        fetch(`${wpData.baseUrl}/wp-json/myplugin/v1/get-location-by-id?ids=${JSON.stringify(wpDataLocation.location_ids)}`)
            .then(response => response.json())
            .then((posts) => {
                console.log(posts)
                locationsAmount.textContent = posts.length
                clearLocationList()
                posts.forEach((data, index) => {
                    insertLocationItem(data, ++index)
                })
                setupMap()
            })
    } else if (urlParams.size !== 0) {
        const typeParam = urlParams.get('type');
        if (typeParam) {
            fetch(`${wpData.baseUrl}/wp-json/myplugin/v1/get-locations-by-type?type=${typeParam}`)
                .then(response => response.json())
                .then((posts) => {

                    locationsAmount.textContent = posts.length
                    clearLocationList()
                    posts.forEach((data, index) => {
                        insertLocationItem(data, ++index)
                    })
                    setupMap()
                })
        }
    } else {
        clearLocationList()
        getAlllocations()
    }
}

const insertLocationItem = (data, index) => {

    locationListContainer.insertAdjacentHTML("beforeend", `
    <div class="location" id="post-${data["id"]}" data-lat="${data["lat"]}" data-lon="${data["lon"]}" style="width: 95%; height: 350px; background: rgb(245,245,245); flex-shrink: 0; display:flex; flex-direction: column; margin-bottom: 20px; border-radius: 15px;   box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1) ">
        <div style="display: flex; flex: .8; flex-direction: column; margin-left: 10px; padding-top: 20px;">
            <div style="flex: .2; width: 100%;  display: flex; align-items: center; padding:15px 0 0 0px; position: relative;">
                <div style="width: 30px; height: 30px; border-radius: 20px; background:  rgba(0, 107, 222, 1); display: flex; justify-content: center; font-size: 12px; color: white; align-items: center;">${index}</div>
                <div style="margin-left: 35px; position: absolute;">
                    <button style="background: white; border-radius: 6px; margin: 0; padding: 8px 15px; font-weight: bold; font-size: 14px;">${data["type"]}</button>
                </div>
            </div>
            <div style="margin-left: 35px;  width: 75%; display: flex; flex-direction: column; flex: .8 ">
                <div style="flex: .33;  display:flex; flex-direction: column; justify-content: center;">
                    <h3 id="" style="line-height: 25px; font-size: 22px; margin: 10px 0 ">${data["name"]}</h3>
                </div>
                <div style="flex: .33; font-size: 18px; width: 90%; display:flex; align-items:center">
                ${data['address']}<br>
                ${data["city"]}, ${data["state"]} ${data["zip"]}
                </div>
                <div style="flex: .33; ">
                    <h3>Phone: ${data["phone"]}</h3>
                </div>
            </div>
        </div>
        <hr style="width: 100%; border: 0; background: lightgray; height: 1px; margin: 0;">
        <div style="flex: .2; display: flex; justify-content: center; align-items: center; margin-left: 10px">
            <a href="${data["link"]}" style="font-weight: bold; ">View more info</a>
        </div>
    </div>
    `)
}

document.addEventListener("DOMContentLoaded", () => {
    init()
})



