import './MyLocation'
import { filterByDistance } from './RangeSlider'

const myRangeSlider = document.getElementById("myRange")
const mapContainer = document.getElementById("map")
const listContainer = document.getElementById("list-container")
const locationInput = document.getElementById('location')
const insuranceInput = document.getElementById('insurance')
const languageInput = document.getElementById('language')
const myLocationInput = document.getElementById('my-location-input')
const dentistAmount = document.getElementById('dentist-amount')
const femaleBtn = document.getElementById('female-btn')
const maleBtn = document.getElementById('male-btn')
const filterApply = document.getElementById('filter-apply')
const container2 = document.getElementById('loading-2-animation');
const onlyBarnetDentist = document.getElementById('only-barnet-dentist')
const dropdownLocationMenu = document.getElementById("dropdown-location-menu")
const clearFilters = document.getElementById("clear-filters")
const listOption = document.getElementById('list-option');
const mapOption = document.getElementById('map-option');
const listLabel = document.querySelector('label[for="list-option"]');
const mapLabel = document.querySelector('label[for="map-option"]');
let map
let onlyBarnetDentistValue = false
let acceptingNewPatientsValue = false
let languageValue = undefined
let locationValue = undefined
let locationIDValue = undefined
let insuranceValue = undefined
let genderValue = undefined
const acceptingNewPatients = document.querySelector('#accepting-new-patients')
listOption.addEventListener('change', () => {
    listLabel.style.color = listOption.checked ? 'black' : 'lightgray';
    mapLabel.style.color = mapOption.checked ? 'black' : 'lightgray';
    listContainer.classList.toggle('remove')
    mapContainer.classList.toggle('restore')

    if (listOption.checked) {
        mapLabel.style.color = 'lightgray';
        listLabel.style.color = 'black';
        listContainer.classList.add('flex')
        listContainer.classList.remove('remove')
        mapContainer.classList.add('remove')
        mapContainer.classList.remove('flex')
    } else {
        listLabel.style.color = 'lightgray';
        mapLabel.style.color = 'black';
        mapContainer.classList.add('restore')
        mapContainer.classList.remove('remove')
        listContainer.classList.remove('flex')
        listContainer.classList.add('flex')
    }
});

mapOption.addEventListener('change', () => {
    if (mapOption.checked) {
        mapLabel.style.color = 'black';
        listLabel.style.color = 'lightgray';
        mapContainer.classList.add('restore')
        mapContainer.classList.remove('remove')
        const dentistLocations = []
        const dentists = new Object
        for (let index = 0; index < listContainer.children.length; index++) {
            const lat = listContainer.children[index].dataset.locationlat
            const lon = listContainer.children[index].dataset.locationlon
            const locationName = listContainer.children[index].dataset.locationname
            const locationCity = listContainer.children[index].dataset.locationcity
            const locationState = listContainer.children[index].dataset.locationstate
            const locationAddress = listContainer.children[index].dataset.locationaddress
            const locationZip = listContainer.children[index].dataset.locationzip

            if (lat !== undefined && lon !== undefined) {
                const dentistName = listContainer.children[index].querySelector("#dentist-name").textContent
                const dentistTitle = listContainer.children[index].querySelector("#dentist-title").textContent
                const featuredImage = listContainer.children[index].querySelector("img").src
                const dentistType = listContainer.children[index].querySelector("#dentist-specialty").textContent
                const postLink = listContainer.children[index].querySelector("#title-container").href
                dentistLocations.push({ coordinates: [lat, lon], locationName, locationCity, locationState, locationAddress, locationZip, })
                if (dentists.hasOwnProperty(locationName))
                    dentists[locationName].push({ dentistName, dentistTitle, featuredImage, dentistType, postLink })
                else {
                    dentists[locationName] = [{ dentistName, dentistTitle, featuredImage, dentistType, postLink }]
                }
            }
        }

        listContainer.classList.add('remove')
        listContainer.classList.remove('flex')

        if (!map) map = L.map('map', { scrollWheelZoom: false }).setView(dentistLocations[0].coordinates, 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        console.log(dentists)
        dentistLocations.forEach((location, index) => {
            L.marker(location.coordinates).bindPopup(`
            <div style="width: 250px; height: 200px;  display:flex; flex-direction:column">
                <div style="flex:.25; position: relative; display:flex; justify-content:center; flex-direction:column; padding-bottom: 10px">
                    <div> 
                        ${location.locationName}
                    </div>
                    <div>
                        ${location.locationAddress}  
                    </div>
                    <div>
                        ${location.locationCity}, ${location.locationState} ${location.locationZip} 
                    </div> 
                    <hr style="margin:0; position: absolute; bottom: 0; width: 100%">
                </div> 
                <div style="flex:.75; overflow:auto">
                    <ul style="height: 100%; overflow:auto"> 
                        ${dentists[location.locationName].map(dentistData => `
                        <li style="height: 100px; width: 100%; display:flex; align-items:center; position:relative">
                            <a href="${dentistData.postLink}" style="  display:flex; align-items:center; position:relative ">
                                <div style="height: 85%; width: 25%; margin-left: 10%; position:relative">
                                    <img style=" border-radius: 8px ; width: 100%; height: 100%; object-fit: cover;" src="${dentistData.featuredImage}">
                                </div>
                                <div style="margin-left: 5%">
                                    <div>${dentistData.dentistName} ${dentistData.dentistTitle}</div> 
                                    <div>${dentistData.dentistType}</div>
                                </div>
                            </a>
                            <hr style="margin:0; position: absolute; bottom: 0; width: 100%">
                        </li>
                        `).join('')} 
                    </ul>
                </div>          
            </div>
            `).addTo(map);
        })

    } else {
        listLabel.style.color = 'black';
        mapLabel.style.color = 'lightgray';
        mapContainer.classList.add('remove')
        mapContainer.classList.remove('restore')
        listContainer.classList.add('flex')
        listContainer.classList.remove('flex')
    }

});

// Get All Dentists and Filter them according to the users settings
const getDentists = (miles) => {

    let filterArgs = ""
    if (genderValue) {
        filterArgs += `gender=${genderValue}&`
    }
    if (onlyBarnetDentistValue) {
        filterArgs += `only-barnet-dentists=${onlyBarnetDentistValue}&`
    }
    if (acceptingNewPatientsValue) {
        filterArgs += `available=${acceptingNewPatientsValue}&`
    }
    if (insuranceValue) {
        filterArgs += `available=${insuranceValue}&`
    }
    if (languageValue) {
        filterArgs += `language=${languageValue}&`
    }
    if (locationIDValue) {
        filterArgs += `location=${locationIDValue}&`
    }

    fetch(`${wpDataLocation.baseUrl}myplugin/v1/filtered-dentist?${filterArgs}`)
        .then(response => response.json())
        .then(posts => {
            console.log(posts)
            dentistAmount.innerHTML = posts.length
            posts.forEach((post, index) => {
                insertDentistItem(post,)
            })

        })
        .catch(error => {
            console.error('Error fetching location posts:', error);
        });

}

const getAllDentists = () => {
    fetch(wpDataLocation.baseUrl + 'myplugin/v1/all-dentists')
        .then(response => response.json())
        .then(posts => {
            dentistAmount.innerHTML = posts.length
            posts.forEach((post,) => {
                insertDentistItem(post,)
            })
        })
        .catch(error => {
            console.error('Error fetching location posts:', error);
        });
}

const getDentistsBySpecialty = (specialty) => {
    fetch(`${wpDataLocation.baseUrl}myplugin/v1/dentists-by-specialty/${specialty}`)
        .then(response => response.json())
        .then(posts => {
            console.log(posts)
            dentistAmount.innerHTML = posts.length
            posts.forEach((post,) => {
                insertDentistItem(post)
            })

        })
        .catch(error => {
            console.error('Error fetching location posts:', error);
        });
}

const emptyResultsList = () => {
    // filterApply.classList.replace("blue-bkg", "grey-bkg")
    // filterApply.classList.replace("white-color", "grey-color")
    listContainer.innerHTML = `
    <div>
        <h1 style="padding: 0; margin: 0; opacity: 0; user-select: none;">Filter Results</h1>
    </div>
    `
    // filterApply.style.pointerEvents = 'none'
}

const activateClearFiltersBtn = () => {
    clearFilters.classList.replace("grey-color", "blue-color",)
    clearFilters.classList.replace("no-events", "yes-events",)
}
const deactivateClearFiltersBtn = () => {
    clearFilters.classList.replace("blue-color", "grey-color")
    clearFilters.classList.replace("yes-events", "no-events",)
}

const insertDentistItem = (post) => {
     
    const dentistID = post['ID'];
    const featuredImage = post['featured_media'];
    const name = post["name"];
    const title = post["title"];
    const type = post["type"];
    const available = post["available"];
    const locationId = post["locationID"];
    const locationName = post["locationName"]
    const lattitude = post["locationLat"];
    const longitude = post["locationLon"];
    const locationCity = post["locationCity"];
    const locationAddress = post["locationAddress"];
    const locationState = post["locationState"];
    const locationZip = post["locationZip"];
    const postLink = post["link"];
    listContainer.insertAdjacentHTML("beforeend", `<div data-locationlat="${lattitude}" data-locationlon="${longitude}"  data-dentistid="${dentistID}" data-locationaddress="${locationAddress}"  data-locationzip="${locationZip}" data-locationstate="${locationState}"  data-locationcity="${locationCity}" data-locationname="${locationName}" data-locationid="${locationId}" class="dentist-item">
    <div style="display: flex; flex: .17; min-height: 220px; align-items: center; justify-content: center; ">
        <a href="${postLink}" style=" width: 90%; height: 90%;">
            <img src="${featuredImage}" style="border-radius: 8px ; width: 100%; height: 100%; object-fit: cover;"></img>
        </a>
    </div>
    <div style="display: flex; flex:.83; align-items: center; justify-content: center; ">
        <div style=" flex: .6;  padding-left: 15px; border-radius: 8px ;  width: 100%; height: 90%; display: flex; justify-content: space-around; flex-direction: column; ">
            <div style="flex:.7; display: flex; align-items: flex-start">
                <a id="title-container" style="color: inherit;" href="${postLink}">
                    <h2 style="  margin: 0;"><span id="dentist-name">${name}</span>, <span id="dentist-title">${title}</span></h2>
                </a>
            </div>
            <div style="flex:1; display: flex; justify-content: space-around; flex-direction: column;">
                <div>
                    <button  id="dentist-specialty" class="dentist-specialty">${type}</button>
                </div>
                <div style=" font-size: 18px; font-weight: 600; ">Barnet Dentist</div>
            </div> 
            <div style="flex:.7; display:flex; flex-direction: column;  justify-content: space-around;">
                <div>Primary Locations:</div>
                <div><a>${locationName} - ${locationCity}</a>|<a>More Locations</a></div>
            </div>
        </div>
        <div style="display: flex; flex: .4; flex-direction: column;  border-left: 1px lightgrey solid; height: 80%; padding-left: 25px; justify-content: space-between; "> 
            ${available ? `
            <div style="display: flex;">
                <i class="fa fa-check"></i>
                <div>Accepting New Patients</div>
            </div>
            <div style="display: flex;flex-direction: column; justify-content: space-around;">
                <div style="font-weight: bold; letter-spacing: 2px; font-size: 18px;">For Appointments:</div>
                <div>Call 845-333-7575 or schedule now</div>
            </div> 
            <div>
                <button class="blue-bkg" style="border: 0; font-size: 16px; font-weight: bold; color:white; border-radius: 20px; padding: 12px 45px">Book Online</button>
            </div>` : ''} 
    </div>
</div>
</div>

<div data-locationlat="${lattitude}" data-locationlon="${longitude}"  data-dentistid="${dentistID}" data-locationaddress="${locationAddress}"  data-locationzip="${locationZip}" data-locationstate="${locationState}"  data-locationcity="${locationCity}" data-locationname="${locationName}" data-locationid="${locationId}" class="dentist-item-mobile shadow-sharp" >
    <div style="display:flex; justify-content:flex-start; flex:.5; align-items:center; padding: 15px">
        <a  href="${postLink}" >
            <img src="${featuredImage}" style="border-radius: 8px ; width: 120px; object-fit: cover;"/> 
        </a> 
        <div style="margin-left: 15px">
            <a id="title-container" style="color: inherit; text-decoration:none" href="${postLink}">
                <h4 style=" letter-spacing:1px; margin: 0;"><span id="dentist-name">${name}</span>, <span id="dentist-title">${title}</span></h4>
            </a> 
            <div>
                <button  id="dentist-specialty" class="dentist-specialty">${type}</button>
            </div>
        </div>
    </div> 
    <hr style="width:70%;  ">
    <div style="flex:1; display:flex; flex-direction: column; align-items: center; padding: 0 25px">
        <div>Primary Locations:</div>
        <div style="text-align:center">
            <a class="blue-color" style="text-decoration:underline">${locationName} - ${locationCity}</a> 
        </div>
        ${available ? `
        <div style="width:100%; height: 200px; margin: 20px 0; background:white; border-radius: 15px; display:flex; align-items:center; flex-direction:column; justify-content:space-around" class="shadow">
            <div style="display: flex;">
                <i class="fa fa-check"></i>
                <div>Accepting New Patients</div>
            </div>
            <div style="display: flex;flex-direction: column; justify-content: space-around;">
                <div style="font-weight: bold;text-align:center; letter-spacing: 2px; font-size: 18px;">For Appointments:</div>
                <div>Call 845-333-7575 or schedule now</div>
            </div> 
            <div>
                <button class="blue-bkg" style="border: 0; font-size: 16px; font-weight: bold; color:white; border-radius: 20px; padding: 12px 45px">Book Online</button>
            </div>
            
        </div>` : ''}  
         
    </div>

  
</div>
    
 
`)
}

filterApply.addEventListener('click', () => {
    emptyResultsList()
    getDentists()
    activateClearFiltersBtn()
})

const toggleApplyBtn = () => {
    if (onlyBarnetDentistValue || acceptingNewPatientsValue || genderValue || insuranceValue || languageValue || locationIDValue) {
        activateApplyBtn()
    } else {
        deactivateApplyBtn()
    }
}

onlyBarnetDentist.addEventListener('click', (e) => {


    onlyBarnetDentistValue = e.target.checked
    toggleApplyBtn()
})

acceptingNewPatients.addEventListener('click', (e) => {

    acceptingNewPatientsValue = e.target.checked
    toggleApplyBtn()
})

const activateApplyBtn = () => {
    filterApply.classList.replace("grey-bkg", "blue-bkg")
    filterApply.classList.replace("grey-color", "white-color")
    filterApply.classList.remove("no-events")
    activateClearFiltersBtn()
}

const clearFilter = () => {
    console.log(onlyBarnetDentist)
    onlyBarnetDentist.checked = false
    acceptingNewPatients.checked = false
    maleBtn.classList.remove("blue-bkg")
    femaleBtn.classList.remove("blue-bkg")
    genderValue = undefined
    locationInput.value = ""
    locationValue = undefined
    locationIDValue = undefined
    insuranceInput.value = ""
    insuranceValue = undefined
    languageInput.value = ""
    languageValue = undefined
    myLocationInput.value = ""
}
const deactivateApplyBtn = () => {
    filterApply.classList.add("no-events")
    filterApply.classList.replace("blue-bkg", "grey-bkg",)
    filterApply.classList.replace("white-color", "grey-color",)

}
femaleBtn.addEventListener('click', (e) => {
    activateApplyBtn()
    femaleBtn.classList.toggle("blue-bkg");

    if (femaleBtn.classList.contains("blue-bkg")) {
        genderValue = "Female"
        maleBtn.classList.remove("blue-bkg");
    } else {
        genderValue = undefined
    }
})
maleBtn.addEventListener('click', (e) => {
    activateApplyBtn()
    maleBtn.classList.toggle("blue-bkg");
    if (maleBtn.classList.contains("blue-bkg")) {
        genderValue = "Male"
        femaleBtn.classList.remove("blue-bkg");
    } else {
        genderValue = undefined
    }

})
locationInput.addEventListener('change', (e) => {
    activateApplyBtn()
    locationValue = e.target.value ? e.target.value : undefined

})
dropdownLocationMenu.addEventListener("click", (e) => {
    locationIDValue = e.target.dataset.locationid
})
insuranceInput.addEventListener('change', (e) => {
    activateApplyBtn()
    insuranceValue = e.target.value ? e.target.value : undefined
})
languageInput.addEventListener('change', (e) => {
    activateApplyBtn()
    languageValue = e.target.value ? e.target.value : undefined
})
myLocationInput.addEventListener('change', (e) => {
    if (e.target.value) {
        myRangeSlider.classList.replace("slider-thumb-grey", "slider-thumb-active")
        myRangeSlider.classList.remove("no-events",)
        myRangeSlider.classList.add("cursor-pointer",)

    } else {
        myRangeSlider.classList.replace("slider-thumb-active", "slider-thumb-grey",)
        myRangeSlider.classList.add("no-events",)
    }
})
myLocationInput.addEventListener('blur', (e) => {
    if (e.target.value) {
        myRangeSlider.classList.replace("slider-thumb-grey", "slider-thumb-active")
        myRangeSlider.classList.remove("no-events",)
        myRangeSlider.classList.add("cursor-pointer",)
        container2.classList.replace("remove", "restore")

    } else {
        myRangeSlider.classList.replace("slider-thumb-active", "slider-thumb-grey",)
        myRangeSlider.classList.add("no-events",)
        myRangeSlider.classList.remove("cursor-pointer",)

    }

})

listContainer.addEventListener("click", (e) => {

    if (e.target.classList.contains("dentist-specialty")) {

        emptyResultsList()
        getDentistsBySpecialty(e.target.innerText)
        activateClearFiltersBtn()
    }
})

clearFilters.addEventListener("click", (e) => {
    emptyResultsList()
    clearFilter()
    getAllDentists()
    deactivateClearFiltersBtn()
    window.location.search = ''
})

// JavaScript code to parse the dentists array from the URL parameter 
if (wpDataLocation.specialties) {

    console.log(wpDataLocation.specialties)
    activateClearFiltersBtn()
    fetch(`${wpDataLocation.baseUrl}myplugin/v1/dentists-by-specialty/${wpDataLocation.specialties}`)
        .then(response => response.json())
        .then(posts => {
            const profession = wpDataLocation.specialties.replace(/-/g, " ")
            dentistAmount.innerHTML = posts[0][profession]['data'].length
            posts[0][profession]['data'].forEach((post) => insertDentistItem(post))
        })
}
else if (wpDataLocation.dentistNames) {
    console.log(wpDataLocation.dentistNames)
    activateClearFiltersBtn()
    fetch(`${wpDataLocation.baseUrl}myplugin/v1/specific-dentists/${JSON.stringify(wpDataLocation.dentistNames).replace(/[\[|\]]/g, "")}`)
        .then(response => response.json())
        .then(posts => {

            dentistAmount.innerHTML = posts.length
            posts.forEach((post) => {insertDentistItem(post)})
        })
}
else {
    getAllDentists()
} 