
document.addEventListener("DOMContentLoaded", () => {
    const acfFields = document.querySelector(".acf-fields")
    const childElements = acfFields.children;
    let lat, lon, zipValue, stateValue, cityValue, addressValue, latFieldKey, lonFieldKey, addressFieldKey, zipFieldKey, stateFieldKey, cityFieldKey


    const queryWithKeys = () => {
        addressValue = document.querySelector(`#acf-${addressFieldKey}`).value
        zipValue = document.querySelector(`#acf-${zipFieldKey}`).value
        stateValue = document.querySelector(`#acf-${stateFieldKey}`).value
        cityValue = document.querySelector(`#acf-${cityFieldKey}`).value
    }

    const queryACF = () => {
        for (let index = 0; index < acfFields.children.length; index++) {
            const element = acfFields.children[index];
            if (element.textContent.replace(/\s\s\s*/g, "") === "Name") {
                console.log("Name")
            }
            else if (element.textContent.replace(/\s\s\s*/g, "") === "Zip") {
                zipFieldKey = element['dataset']['key']
                element.querySelector('input').addEventListener('change', (e) => {
                    zipValue = e.target.value
                })

                element.querySelector('input').addEventListener('blur', (e) => {
                    queryWithKeys()
                    if (zipValue && stateValue !== 'None' && stateValue && cityValue && addressValue) {
                        fillLatLon()
                    } else {
                        console.log("All Data not Filled yet")
                    }
                })
            }
            else if (element.textContent.replace(/\s\s\s*/g, "").includes("Street Address")) {
                addressFieldKey = element['dataset']['key']
                element.querySelector('input').addEventListener('change', (e) => {
                    addressValue = e.target.value
                })
                element.querySelector('input').addEventListener('blur', (e) => {
                    queryWithKeys()
                    if (zipValue && stateValue !== 'None' && cityValue && addressValue) {
                        fillLatLon()
                    } else {
                        queryACF()
                        console.log("All Data not Filled yet", zipValue, stateValue, cityValue, addressValue)
                    }
                })
            }
            else if (element.textContent.replace(/\s\s\s*/g, "") === "City") {
                cityFieldKey = element['dataset']['key']
                element.querySelector('input').addEventListener('change', (e) => {
                    cityValue = e.target.value
                })
                element.querySelector('input').addEventListener('blur', (e) => {
                    queryWithKeys()
                    if (zipValue && stateValue !== 'None' && cityValue && addressValue) {
                        fillLatLon()
                    } else {
                        console.log("All Data not Filled yet")
                    }
                })
            }
            else if (element.textContent.replace(/\s\s\s*/g, "").includes("State")) {
                stateFieldKey = element['dataset']['key']
                element.querySelector('select').addEventListener('change', (e) => {
                    stateValue = e.target.value
                })
                element.querySelector('select').addEventListener('blur', (e) => {
                    queryWithKeys()
                    if (zipValue && stateValue !== 'None' && cityValue && addressValue) {
                        fillLatLon()
                    } else {
                        console.log("All Data not Filled yet")
                    }
                })
            }
            else if (element.textContent.replace(/\s\s\s*/g, "") === ("lattitude")) {
                lat = element.querySelector('input').value ? element.querySelector('input').value : undefined
                element.querySelector('input').disabled = true;
                latFieldKey = element['dataset']['key']
            }
            else if (element.textContent.replace(/\s\s\s*/g, "") === ("longitude")) {
                lon = element.querySelector('input').value ? element.querySelector('input').value : undefined
                element.querySelector('input').disabled = true;
                lonFieldKey = element['dataset']['key']

            }
        }
    }
    queryACF()
    const fillLatLon = () => {
        for (let i = 0; i < childElements.length; i++) {
            const child = childElements[i];
            const dataName = child.getAttribute("data-name"); // Get the value of the data-name attribute

            if (dataName === "lattitude") {
                const inputFields = child.querySelectorAll("input");
                inputFields.forEach(input => {
                    // Testing Purposes
                    input.addEventListener("click", () => {
                        fetchUpdatedData()
                    })
                    const address = `${addressValue} ${cityValue}  ${stateValue} ${zipValue}`;
                    const formattedAddress = encodeURIComponent(address);
                    const url = `https://nominatim.openstreetmap.org/search?q=${formattedAddress}&format=json`;
                    console.log(url)
                    if (url.includes('undefined')) return
                    fetch(url)
                        .then(locationData => locationData.json())
                        .then(data => {
                            if (data.length > 0) {
                                lat = data[0].lat
                                updateLat(lat)
                                console.log(latFieldKey)
                                document.querySelector(`#acf-${latFieldKey}`).value = lat
                            }
                        })
                });

            } else if (dataName === "longitude") {
                const inputFields = child.querySelectorAll("input");
                inputFields.forEach(input => {
                    const address = `${addressValue} ${cityValue}  ${stateValue} ${zipValue}`;
                    const formattedAddress = encodeURIComponent(address);

                    const url = `https://nominatim.openstreetmap.org/search?q=${formattedAddress}&format=json`;
                    if (url.includes('undefined')) return
                    fetch(url)
                        .then(locationData => locationData.json())
                        .then(data => {
                            // Check if any results were returned
                            if (data.length > 0) {
                                lon = data[0].lon
                                updateLon(lon)
                                document.querySelector(`#acf-${lonFieldKey}`).value = lon
                            }
                        })
                });
            }
        }
    }

    if (lat === undefined && lon === undefined && postData.street && postData.city && postData.state && postData.zip) {
        fillLatLon()
    }

 

    // Function to be called whenever data needs to be updated
    function updateLat(lat) {
        // Make the AJAX request
        fetch(`/wp-json/wp/v2/location/${postData.id}?_fields=acf`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                "X-WP-Nonce": postData.nonce
            },
            body: JSON.stringify({
                acf: {
                    lattitude: lat,
                }
            }),
        })
            .then(response => response.json())
            .then(data => {
                // Handle the response data
                console.log(data);
            })
            .catch(error => {
                // Handle errors
                console.error('Error fetching updated data:', error);
            });

    }
    function updateLon(lon) {
        // Make the AJAX request
        fetch(`/wp-json/wp/v2/location/${postData.id}?_fields=acf`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                "X-WP-Nonce": postData.nonce
            },
            body: JSON.stringify({
                acf: {
                    longitude: lon,
                }
            }),
        })
            .then(response => response.json())
            .then(data => {
                // Handle the response data
                console.log(data);
            })
            .catch(error => {
                // Handle errors
                console.error('Error fetching updated data:', error);
            });

    }




})