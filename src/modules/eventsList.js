
window.addEventListener("DOMContentLoaded", () => {
    const filterLocationBtnMobile = document.querySelector("#filter-location-btn-mobile")
    const dropdownEventTypeMobile = document.querySelector("#dropdown-event-type-input-mobile")
    const dropdownEventType = document.querySelector("#dropdown-event-type-input")
    const dropdownEventDateMobile = document.querySelector("#dropdown-date-input-mobile")
    const dropdownEventDate = document.querySelector("#dropdown-date-input")
    const dropdownEventVenueMobile = document.querySelector("#dropdown-venue-input-mobile")
    const dropdownEventVenue = document.querySelector("#dropdown-venue-input")
    const keywordInputMobile = document.querySelector("#event-keyword-input-mobile")
    const keywordInput = document.querySelector("#event-keyword-input")
    const headerLocation = document.querySelector("#header-location")
    const eventsListContainer = document.querySelector("#events-list-container")
    const clearFilterBtn = document.querySelector("#clear-filters")
    let eventType = null;
    let eventDateRange = null;
    let eventVenue = null;
    let keyword = null;


    filterLocationBtnMobile.addEventListener("click", () => {
        headerLocation.classList.toggle("header-location-elongated-mobile")
        document.querySelector(".filter-events-container-mobile").classList.toggle("reveal")
    })

    clearFilterBtn.addEventListener("click", () => {
        dropdownEventType.value = ""
        dropdownEventDate.value = ""
        dropdownEventVenue.value = ""
        keywordInput.value = ""
    })

    dropdownEventTypeMobile.addEventListener("change", (e) => {
        eventType = e.target.value
        inputHanlder(eventType) 
    })
    dropdownEventType.addEventListener("change", (e) => {
        eventType = e.target.value
        inputHanlder(eventType) 
    })

    dropdownEventDateMobile.addEventListener("change", (e) => {
        eventDateRange = e.target.value
        inputHanlder(eventDateRange)
    })
    dropdownEventDate.addEventListener("change", (e) => {
        eventDateRange = e.target.value
        inputHanlder(eventDateRange)
    })
    dropdownEventVenueMobile.addEventListener("change", (e) => {
        const venueListContainer = document.querySelector("#dropdown-venue-menu")
        if (e.target.value) {
            for (let i = 0; i < venueListContainer.children.length; i++) {
                const child = venueListContainer.children[i];
                // Do something with each child element, for example:
                if (child.textContent === e.target.value) {
                    eventVenue = child.id
                }
            }
        } else if (e.target.value === "") {
            eventVenue = null
        }
       inputHanlder(eventVenue)
    })
    dropdownEventVenue.addEventListener("change", (e) => {
        const venueListContainer = document.querySelector("#dropdown-venue-menu")
        if (e.target.value) {
            for (let i = 0; i < venueListContainer.children.length; i++) {
                const child = venueListContainer.children[i];
                // Do something with each child element, for example:
                if (child.textContent === e.target.value) {
                    eventVenue = child.id
                }
            }
        } else if (e.target.value === "") {
            eventVenue = null
        }
       inputHanlder(eventVenue)
    })
    keywordInputMobile.addEventListener("change", (e) => {
        keyword = e.target.value
        inputHanlder(keyword)
    })
    keywordInput.addEventListener("change", (e) => {
        keyword = e.target.value
        inputHanlder(keyword)
    })

    const insertEventItem = (post) => {
        eventsListContainer.insertAdjacentHTML("beforeend", `
    <li class="event-list-item">
            <div style="display: flex; flex-direction: row; margin-bottom: 30px">
                <div style="width: 80px; height: 80px; background: purple; border-radius: 10px; text-align:center; color: white; justify-content: center; display:flex; align-items:center; flex-direction: column; ">
                    <div style="font-size: 25px; line-height: 20px;">${post.month}</div>
                    <div style="font-size: 35px; font-weight: bolder;">${post.date}</div>
                </div>
                <div class="blue-color" style="font-size:30px; font-weight:bold;margin-left: 20px">${post.day}</div>
            </div>
            <div style="background: white; border-radius: 10px;height: 250px; display:flex; align-items: center; justify-content: space-between; padding: 0 20px">
                <div style="flex: .6">
                    <div>
                        <h1>${post.title}</h1>
                    </div>
                    <div style="font-size: 16px; color:grey">${post.start_time} - ${post.end_time}</div>
                    <div style="font-size: 16px; color:grey">Organizer: Barnet Health</div>
                </div>
                <div style="display: flex; flex:.4; flex-direction: row; justify-content: space-between; ">
                    <div style="flex: .3; font-size: 26px; color:grey">${post.free ? "FREE" : "$" + post.price}</div>
                    <div style="display: flex; justify-content: space-around; flex:.7;">
                        <a href="${post.event_url}" class="cursor-pointer" style=" border-radius: 30px; color: rgb(26,113,200); border: 0; background:white; border: 2px solid rgb(26,113,200); font-size: 14px; padding: 10px 15px; display: flex; align-items: center;margin-right: 15px; text-decoration: none;">More details</a>
                        <button class="cursor-pointer" style=" border-radius: 30px; color:white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 14px; padding: 10px 15px; display: flex; align-items: center; ">Email to Register</button>
                    </div>
                </div>
            </div>
        </li>
        <li class="event-list-item-mobile">
            <div style="display: flex; flex-direction: row; align-items: center; justify-content: flex-start;">
                <div class="blue-bkg" style="width: 70px; height: 70px;   text-align: center; border-radius: 10px; font-size: 20px; color:white; justify-content: center; display: flex; flex-direction: column; align-items: center;">${post.month}<br><span style="font-weight:bold">${post.date}</span></div>
                <div class="blue-color" style="margin-left: 15px;">
                    <h1 style="line-height: 0;">${post.day}</h1>
                </div>
            </div>
            <div class="shadow-sharp" style="width: 100%; flex: .9; border-radius: 15px; background: white; display: flex; justify-content: space-around; flex-direction: column;">
                <div style="margin-left:15px">
                    <h1>${post.title}</h1>
                </div>
                <div style="margin-left:15px">
                    <div>${post.start_time} - ${post.end_time}</div>
                </div>
                <div style="margin-left:15px; font-size:16px">
                    <div>${post.free ? "FREE" : "$" + post.price}</div>
                </div>
                <div style="display: flex; flex-direction: row; justify-content: center; ">
                    <a href="${post.event_url}" class="cursor-pointer" style="border-radius: 30px; color: rgb(26,113,200); border: 0; background:white; border: 2px solid rgb(26,113,200); font-size: 14px; padding: 10px 15px; display: flex; align-items: center;margin-right: 15px; text-decoration: none;">More Details</a>
                    <button class=" cursor-pointer" style=" border-radius: 30px; color:white; border: 0; background:rgb(26,113,200); border: 2px solid rgb(26,113,200); font-size: 14px; padding: 10px 15px; display: flex; align-items: center; ">Email to Register</button>
                </div>
                <div>
                    <hr style="height: 1px; box-sizing: border-box;">
                </div>
            </div>

        </li>
    `)
    }

    const init = () => {
        console.log("[EventList.js] init()",)
        fetch(`${wpDataLocation.baseUrl}/wp-json/myplugin/v1/all-events`)
            .then(res => res.json())
            .then(posts => {
                posts.forEach(post => {
                    insertEventItem(post)
                })
            })
    }
    const areSomeParamsTrue = () => eventType || eventDateRange || eventVenue || keyword ? true : false
    const eventsFiltered = (eventType, eventDateRange, eventVenue, keyword) => {
        fetch(`${wpDataLocation.baseUrl}/wp-json/myplugin/v1/filter-events?${eventType && "type=" + eventType}${eventDateRange && "&date-range=" + eventDateRange}${eventVenue && "&location_id=" + eventVenue}${keyword && "&keyword=" + keyword}`.replace(/null/g, ""))
            .then(res => res.json())
            .then(posts => {
                eventsListContainer.innerHTML = ""
                posts.forEach((post) => {

                    insertEventItem(post)
                })
            })
    }
    const inputHanlder = (eventValue) => {
        if (eventValue || areSomeParamsTrue()) {
            clearFilterBtn.classList.replace("grey-color", "blue-color")
            clearFilterBtn.classList.replace("no-events", "yes-events")
            eventsFiltered(eventType, eventDateRange, eventVenue, keyword)
        } else if (areSomeParamsTrue() === false) {
            clearFilterBtn.classList.replace("blue-color", "grey-color")
            clearFilterBtn.classList.replace("yes-events", "no-events")
            eventsListContainer.innerHTML = ""
            init()
        }
    }

})
