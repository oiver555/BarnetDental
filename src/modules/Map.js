const mapContainer = document.querySelector("#map-container")
const markers = {}
let map

const setupMap = () => {
    clearMarkers()

    const locations = document.querySelectorAll(".location").length > 0 ? document.querySelectorAll(".location") : undefined

    locations.forEach(location => {
        // Add Hover Listener foreach item
        location.addEventListener("mouseenter", (e) => {
            const postID = e.target.id.split("post-")[1]
            const marker = markers[postID];
            const latlng = marker.getLatLng();
            // Move the map view to the marker's location
            map.setView(latlng, map.getZoom());
            marker.openPopup()
        });
        location.addEventListener("click", (e) => {
            const postID = e.target.id.split("post-")[1]
            const marker = markers[postID];
            const latlng = marker.getLatLng();
            // Move the map view to the marker's location
            map.setView(latlng, map.getZoom());
            marker.openPopup()
        });

        const lon = location.getAttribute("data-lon")
        const lat = location.getAttribute("data-lat")
        const id = location.id.split("post-")[1]
        const name = location.querySelector('div:nth-child(1) > div:nth-child(2) > div:nth-child(1) > h3')

        if (!map) {

            map = L.map('map', { scrollWheelZoom: false }).setView([lat, lon], 13);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            var marker = L.marker([lat, lon]).addTo(map);
            marker.bindPopup(name.innerHTML).openPopup();
        } else {
            var marker = L.marker([lat, lon]).addTo(map);
            marker.bindPopup(name.innerHTML)
        }
        markers[id] = marker
    })

}

document.addEventListener("DOMContentLoaded", () => {

    if (mapContainer && !map) {
        map = L.map('map', { scrollWheelZoom: false }).setView([mapContainer.getAttribute("data-lat"), mapContainer.getAttribute("data-lon")], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        L.marker([mapContainer.getAttribute("data-lat"), mapContainer.getAttribute("data-lon")]).addTo(map).bindPopup(mapContainer.getAttribute("data-name")).openPopup();
    }
})

//Removes all Markers from the map
const clearMarkers = () => {
    
    map && map.remove()
    map = undefined
}

export { clearMarkers, setupMap }
