class Search {
    constructor() {
        this.liveResultsContainer = document.getElementById("live-results-container")
        this.liveResultsContainerMobile = document.getElementById("live-results-container-mobile")
        this.searchBtn = document.getElementById("search-btn")
        this.searchNavBtn = document.getElementById("search-nav-btn")
        this.heroSectionSearchContainerMobile = document.getElementById("hero-section-search-container-mobile")
        this.closeBtn = document.getElementById("close-search")
        this.inputField = document.getElementById("search-input")
        this.inputFieldMobile = document.getElementById("search-input-mobile")
        this.searchHeading = document.getElementById("search-heading")
        this.searchInputContainer = document.getElementById("search-input-container-1")
        this.searchInputContainerMobile = document.getElementById("search-input-container-1-mobile")
        this.overlay = document.getElementById("background-overlay")
        this.overlayMobile = document.getElementById("background-overlay-mobile")
        this.searchSuggestedCat = document.getElementById("search-suggested-categories-id")
        this.searchSuggestedCatMobile = document.getElementById("search-suggested-categories-id-mobile")
        this.sidebarMenuMobile = document.getElementById("sidebar-menu-mobile")
        // this.spinner = document.getElementById("spinner-1-blue")
        // this.spinnerMobile = document.getElementById("spinner-1-blue-mobile")
        this.headerContainer = document.querySelector(".header-container-home")
        this.navContainer = document.querySelector(".nav-container")
        this.typingTimer;
        // this.spinnerVisible = false
        this.previousInputFieldValue
        this.previousInputFieldMobile
        this.events()
    }

    events() {
        this.inputField && this.overlay && this.inputField.addEventListener("click", this.openOverlay.bind(this))
        this.inputFieldMobile && this.overlayMobile && this.inputFieldMobile.addEventListener("click", this.openMobileSearch.bind(this))
        this.searchHeading && this.inputField.addEventListener("click", this.highlightSearchHeading.bind(this))
        this.searchHeading && this.inputField.addEventListener("blur", this.removeHighlightSearchHeading.bind(this))
        this.searchHeading && this.inputFieldMobile && this.inputFieldMobile.addEventListener("click", this.highlightSearchHeading.bind(this))
        this.searchHeading && this.inputFieldMobile && this.inputFieldMobile.addEventListener("blur", this.removeHighlightSearchHeading.bind(this))
        this.searchBtn && this.searchBtn.addEventListener("click", this.openOverlay)
        this.searchNavBtn && this.searchNavBtn.addEventListener("click", this.openMobileSearch.bind(this))
        this.closeBtn && this.closeBtn.addEventListener("click", this.closeOverlay.bind(this))
        this.overlayMobile && this.overlayMobile.addEventListener("click", this.closeOverlay.bind(this))
        this.overlay && this.overlay.addEventListener("click", this.closeOverlay.bind(this))
        this.searchInputContainer && this.searchInputContainer.addEventListener('keyup', this.typingLogic.bind(this))
        this.searchInputContainerMobile && this.searchInputContainerMobile.addEventListener('keyup', this.typingLogic.bind(this))
        document.addEventListener("click", (e) => {
            e.target.tagName !== "INPUT" && document.getElementById("suggested-doctor-results") && document.getElementById("suggested-doctor-results").remove()
            e.target.tagName !== "INPUT" && document.getElementById("suggested-service-results") && document.getElementById("suggested-service-results").remove()
            e.target.tagName !== "INPUT" && document.getElementById("suggested-profession-results") && document.getElementById("suggested-profession-results").remove()

            e.target.tagName !== "INPUT" && document.getElementById("suggested-results-mobile") && document.getElementById("suggested-results-mobile").remove()
        })
    }

    getResults() {
        if (this.inputField.value === '') return
        Promise.all([
            fetch(`${wpData.baseUrl}/wp-json/myplugin/v1/dentists-by-name/${this.inputField.value ? this.inputField.value : this.inputFieldMobile.value}`),
            fetch(`${wpData.baseUrl}/wp-json/myplugin/v1/services/${encodeURIComponent(this.inputField.value ? this.inputField.value : this.inputFieldMobile.value)}`),
            fetch(`${wpData.baseUrl}/wp-json/myplugin/v1/dentists-by-specialty/${encodeURIComponent(this.inputField.value ? this.inputField.value : this.inputFieldMobile.value)}`),
        ])
            .then(responses => {
                const allResponsesOk = responses.every(response => response.ok);
                if (!allResponsesOk) {
                    throw new Error('One or more network responses were not ok');
                }
                // Parse JSON from each response
                return Promise.all(responses.map(response => response.json()));
            })
            .then(data => {
                if (data.length && document.getElementById("suggested-doctor-results")) {
                    // DENTISTS
                    data[0].forEach(dentist => {
                        document.getElementById("doctor-spinner-1-blue").classList.add("hide", "remove")
                        document.getElementById("suggested-doctor-results").insertAdjacentHTML("beforeend", `
                            <li class="search-suggested-item" style="padding: 10px 0 10px 0px; ">
                            <a href="${dentist.link}" style="text-decoration: none;color: inherit;"> 
                                <div style="width :225px; display: flex; flex-direction: row; justify-content: space-between; align-items: center; margin-left:50px">
                                    <div style="flex:1">
                                        <div style="width: 50px; height: 50px; ">
                                            <img style="width: 100%; height: 100%; object-fit: cover;" src="${dentist.featured_media}"/>
                                        </div>
                                    </div>
                                  <div  style="height:50px; display: flex; align-items: center;justify-content:flex-start; flex:1">${dentist['name']}</div>
                                </div>
                            </a>
                            </li>`)
                    })
                    // SERVICES
                    data[1].forEach(resp => {

                        document.getElementById("service-spinner-1-blue").classList.add("hide", "remove",)
                        const service = Object.keys(resp)[0]; // Get the first (and only) key                         
                        const href = `${wpData.baseUrl}/find-a-dentist/?dentists=${JSON.stringify(resp[service]["data"])}`;
                        document.getElementById("suggested-service-results").insertAdjacentHTML("beforeend", `
                            <li class="search-suggested-item" style="padding: 10px 0 10px 0px; ">
                                <a href="${href}" style="text-decoration: none;color: inherit;"> 
                                    <div style="width :225px; display: flex; flex-direction: row; justify-content: space-between; align-items: center; margin-left:50px">
                                        <div style="flex:1">    
                                            <div style="width: 50px; height: 50px; ">
                                                <img style="width: 100%; height: 100%; object-fit: cover;" src="${resp[service]['img_url']}"/>
                                            </div>
                                        </div>
                                        <div style="height:50px; display: flex; align-items: center;justify-content:flex-start;flex:1 ">${service}</div>
                                    </div>
                                </a>
                            </li>
                            `);
                    })
                    data[2].forEach(resp => {
                        document.getElementById("profession-spinner-1-blue").classList.add("hide", "remove",)
                        const profession = Object.keys(resp)[0]; // Get the first (and only) key                         
                        const href = `${wpData.baseUrl}myplugin/v1/dentists-by-specialty/${profession}`;
                        document.getElementById("suggested-profession-results").insertAdjacentHTML("beforeend", `
                             <li class="search-suggested-item" style="padding: 10px 0 10px 0px; ">
                                <a href="${href}" style="text-decoration: none;color: inherit;"> 
                                    <div style="width: 225px; display: flex; flex-direction: row; justify-content: space-between; align-items: center; margin-left:50px">
                                        <div style="flex:1">    
                                            <div style="width: 50px; height: 50px; ">
                                                <img style="width: 100%; height: 100%; object-fit: cover;" src="${resp[profession]["featured_image"]}"/>                                                
                                            </div>
                                        </div>
                                        <div style="height:50px; display: flex; align-items: center;justify-content:flex-start;flex:1 ">${profession}</div>
                                    </div>
                                </a>
                            </li>`);
                    })
                } else if (data.length && document.getElementById("suggested-results-mobile")) {
                    // DENTISTS
                    data[0].forEach(dentist => {
                        document.getElementById("suggested-results-mobile").insertAdjacentHTML("beforeend", `<li class="search-suggested-item"><a style="cursor:pointer; color: inherit;height:50px; display: flex; align-items: center; text-decoration: none;" href="${dentist.link}">${dentist['acf']['first_name']} ${dentist['acf']['last_name']}</a></li>`)
                    })
                    // PROCEDURES
                    data[1].forEach(resp => {
                        const service = Object.keys(resp)[0]; // Get the first (and only) key                         
                        const href = `${wpData.baseUrl}/find-a-dentist/?dentists=${encodeURIComponent(JSON.stringify(resp[service]))}`;
                        document.getElementById("suggested-results-mobile").insertAdjacentHTML("beforeend", `<li class="search-suggested-item"><a style="cursor:pointer; color: inherit;height:50px; display: flex; align-items: center; text-decoration: none;" href="${href}">${service}</a></li>`);
                    })
                    data[2].forEach(resp => {

                        const profession = Object.keys(resp)[0]; // Get the first (and only) key                         
                        const href = `${wpData.baseUrl}/find-a-dentist/?dentists=${encodeURIComponent(JSON.stringify(resp[profession]))}`;
                        document.getElementById("suggested-results-mobile").insertAdjacentHTML("beforeend", `
                            <li class="search-suggested-item">
                                <a style="cursor:pointer; color: inherit;height:50px; display: flex; align-items: center; text-decoration: none;" href="${href}">${profession}</a>
                            </li>`);
                    })
                } else {
                    document.getElementById("suggested-results-mobile").insertAdjacentHTML("beforeend", `<li class="search-suggested-item" style="height:50px; display: flex; align-items: center;">No Dentists Match Results.</li>`)
                }


                if (document.getElementById("suggested-doctor-results") && data[0].length === 0) {
                    document.getElementById("doctor-spinner-1-blue").classList.add("hide")
                    document.getElementById("doctor-spinner-1-blue").classList.add("remove",)
                    document.getElementById("suggested-doctor-results").insertAdjacentHTML("beforeend", `<li class="search-suggested-item" style="height:50px;pointer-events:none; display: flex; align-items: center;">No Matches</li>`)
                }
                if (document.getElementById("suggested-service-results") && data[1].length === 0) {
                    document.getElementById("service-spinner-1-blue").classList.add("hide")
                    document.getElementById("service-spinner-1-blue").classList.add("remove",)
                    document.getElementById("suggested-service-results").insertAdjacentHTML("beforeend", `<li class="search-suggested-item" style="height:50px;pointer-events:none; display: flex; align-items: center;">No Matches</li>`)
                }
                if (document.getElementById("suggested-profession-results") && data[2].length === 0) {
                    document.getElementById("profession-spinner-1-blue").classList.add("hide")
                    document.getElementById("profession-spinner-1-blue").classList.add("remove",)
                    document.getElementById("suggested-profession-results").insertAdjacentHTML("beforeend", `<li class="search-suggested-item" style="height:50px;pointer-events:none; display: flex; align-items: center;">No Matches</li>`)
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    getServices() {
        this.spinner.classList.replace("reveal", "hide",)
        this.spinner.classList.replace("restore", "remove",)
        this.spinnerMobile.classList.replace("reveal", "hide",)
        this.spinnerMobile.classList.replace("restore", "remove",)
        this.liveResultsContainer.insertAdjacentHTML("beforeend", `<ul id='suggested-doctor-results' /><h2 style="margin:0; color: rgb(60, 60, 60);">Service Results:</h2></ul>`)
        this.liveResultsContainer.insertAdjacentHTML("beforeend", `<ul id='suggested-service-results' /><h2 style="margin:0; color: rgb(60, 60, 60);">Service Results:</h2></ul>`)
        this.liveResultsContainer.insertAdjacentHTML("beforeend", `<ul id='suggested-profession-results' /><h2 style="margin:0; color: rgb(60, 60, 60);">Service Results:</h2></ul>`)
        this.liveResultsContainerMobile.insertAdjacentHTML("beforeend", `<ul id='suggested-results-mobile' /><h2 style="margin:0; color: rgb(60, 60, 60);">Service Results:</h2></ul>`)

        fetch(`${wpData.baseUrl}/wp-json/myplugin/v1/services/${encodeURIComponent(this.inputField.value ? this.inputField.value : this.inputFieldMobile.value)}`)
            .then(response => response.json())
            .then(data => {
                // PROCEDURES
                data.forEach(resp => {
                    const service = Object.keys(resp)[0]; // Get the first (and only) key                         
                    const href = `${wpData.baseUrl}/services/${encodeURIComponent(service.replace(/\s/g, "-"))}`;
                    document.getElementById("suggested-service-results").insertAdjacentHTML("beforeend", `<li class="search-suggested-item"><a style="cursor:pointer; color: inherit;height:50px; display: flex; align-items: center; text-decoration: none;" href="${href}">${service}</a></li>`);
                    document.getElementById("suggested-results-mobile").insertAdjacentHTML("beforeend", `<li class="search-suggested-item"><a style="cursor:pointer; color: inherit;height:50px; display: flex; align-items: center; text-decoration: none;" href="${href}">${service}</a></li>`);
                })
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    typingLogic(e) {
        if (this.inputField.value && (this.inputField.value !== this.previousInputFieldValue)) {
            document.getElementById("suggested-doctor-results") && document.getElementById("suggested-doctor-results").remove()
            document.getElementById("suggested-service-results") && document.getElementById("suggested-service-results").remove()
            document.getElementById("suggested-profession-results") && document.getElementById("suggested-profession-results").remove()
            document.getElementById("suggested-results-mobile") && document.getElementById("suggested-results-mobile").remove()
            clearTimeout(this.typingTimer)

            const currentUrl = window.location.href;
            const urlParts = currentUrl.split('/').filter(frag => frag != '');
            const lastPart = urlParts[urlParts.length - 1];

            if (this.inputField.value) {
                // this.spinner.classList.replace("hide", "reveal")
                // this.spinner.classList.replace("remove", "restore",)
                this.liveResultsContainer.insertAdjacentHTML("beforeend", `
                    <ul id='suggested-doctor-results' />
                        <h2 style="margin:10px 0 0 10px; color: rgb(60, 60, 60); padding-bottom:10px">Doctor Results:</h2>
                        <div id="doctor-spinner-1-blue" style="margin-left: 20px; padding: 10px 0" class="spinner-1-blue lottie" data-animation-path="../../lottie/spinner_blue.json" data-anim-loop="true" data-name="spinner_blue"></div>
                    </ul>`)
                this.liveResultsContainer.insertAdjacentHTML("beforeend", `
                    <ul id='suggested-service-results' />
                        <h2 style="margin:10px 0 0 10px; color: rgb(60, 60, 60); padding-bottom:10px">Service Results:</h2>
                        <div id="service-spinner-1-blue" style="margin-left: 20px; padding: 10px 0" class="spinner-1-blue"></div>
                    </ul>`)
                this.liveResultsContainer.insertAdjacentHTML("beforeend", `
                    <ul id='suggested-profession-results' />
                        <h2 style="margin:10px 0 0 10px; color: rgb(60, 60, 60);  padding-bottom:10px">Profession Results:</h2>
                        <div id="profession-spinner-1-blue" style="margin-left: 20px; padding: 10px 0" class="spinner-1-blue"></div>
                    </ul>`)
                lottie.loadAnimation({
                    container: document.getElementById("doctor-spinner-1-blue"),
                    renderer: 'svg', // Choose renderer: svg, canvas, html
                    loop: true, // Whether the animation should loop
                    autoplay: true, // Whether the animation should start playing automatically
                    path: themeData.themeUri + '/lottie/spinner_blue.json', // Path to the animation json file

                });
                lottie.loadAnimation({
                    container: document.getElementById("service-spinner-1-blue"),
                    renderer: 'svg', // Choose renderer: svg, canvas, html
                    loop: true, // Whether the animation should loop
                    autoplay: true, // Whether the animation should start playing automatically
                    path: themeData.themeUri + '/lottie/spinner_blue.json', // Path to the animation json file
                });
                lottie.loadAnimation({
                    container: document.getElementById("profession-spinner-1-blue"),
                    renderer: 'svg', // Choose renderer: svg, canvas, html
                    loop: true, // Whether the animation should loop
                    autoplay: true, // Whether the animation should start playing automatically
                    path: themeData.themeUri + '/lottie/spinner_blue.json' // Path to the animation json file
                });
                this.liveResultsContainer.style.transform = this.searchBtn ? "translateY(100%)" : "translateY(0%)"
                this.typingTimer = lastPart === 'services' ? setTimeout(this.getServices.bind(this), 750) : setTimeout(this.getResults.bind(this), 750)
            } else {
                if (document.getElementById("suggested-doctor-results")) document.getElementById("suggested-doctor-results").innerHTML = ""
                if (document.getElementById("suggested-profession-results")) document.getElementById("suggested-profession-results").innerHTML = ""
                if (document.getElementById("suggested-service-results")) document.getElementById("suggested-service-results").innerHTML = ""
                this.liveResultsContainer.style.transform = "translateY(0%)"
            }

        } else if (this.inputFieldMobile?.value && (this.inputFieldMobile.value !== this.previousInputFieldMobile)) {

            document.getElementById("suggested-results-mobile") && document.getElementById("suggested-results-mobile").remove()
            clearTimeout(this.typingTimer)

            const currentUrl = window.location.href;
            const urlParts = currentUrl.split('/').filter(frag => frag != '');
            const lastPart = urlParts[urlParts.length - 1];
            if (this.inputFieldMobile.value) {
                this.liveResultsContainerMobile.style.transform = this.searchBtn ? "translateY(100%)" : "translateY(0%)"
                this.typingTimer = lastPart === 'services' ? setTimeout(this.getServices.bind(this), 750) : setTimeout(this.getResults.bind(this), 750)
            } else {
                if (document.getElementById("suggested-results-mobile")) document.getElementById("suggested-results-mobile").innerHTML = ""
                // this.spinnerMobile.classList.replace("reveal", "hide",)
                // this.spinnerMobile.classList.replace("restore", "remove",)
                this.liveResultsContainerMobile.style.transform = "translateY(0%)"
            }
        }
        if (this.inputField.value) {
            this.previousInputFieldValue = this.inputField.value
        } else if (this.inputFieldMobile?.value) {
            this.previousInputFieldMobile = this.inputFieldMobile.value
        } else if (this.inputField.value === '') {
            document.getElementById("doctor-spinner-1-blue") && document.getElementById("doctor-spinner-1-blue").classList.add("hide", "remove")
            document.getElementById("service-spinner-1-blue") && document.getElementById("service-spinner-1-blue").classList.add("hide", "remove",)
            document.getElementById("profession-spinner-1-blue") && document.getElementById("profession-spinner-1-blue").classList.add("hide", "remove",)
            document.getElementById("suggested-doctor-results") && document.getElementById("suggested-doctor-results").remove()
            document.getElementById("suggested-service-results") && document.getElementById("suggested-service-results").remove()
            document.getElementById("suggested-profession-results") && document.getElementById("suggested-profession-results").remove()
            document.getElementById("suggested-results-mobile") && document.getElementById("suggested-results-mobile").remove()
            document.getElementById("suggested-doctor-results") && document.getElementById("suggested-doctor-results").insertAdjacentHTML("beforeend", `<li class="search-suggested-item" style="height:50px;pointer-events:none; display: flex; align-items: center;">No Matches</li>`)
            document.getElementById("suggested-service-results") && document.getElementById("suggested-service-results").insertAdjacentHTML("beforeend", `<li class="search-suggested-item" style="height:50px;pointer-events:none; display: flex; align-items: center;">No Matches</li>`)
            document.getElementById("suggested-profession-results") && document.getElementById("suggested-profession-results").insertAdjacentHTML("beforeend", `<li class="search-suggested-item" style="height:50px;pointer-events:none; display: flex; align-items: center;">No Matches</li>`)
        }
    }

    highlightSearchHeading() {
        this.searchHeading.classList.replace("black-color", "royal-blue-color")
    }
    removeHighlightSearchHeading() {
        this.searchHeading.classList.replace("royal-blue-color", "black-color")
    }

    openOverlay() {
        this.overlay.classList.add("background-overlay-reveal")
        this.searchSuggestedCat.classList.add("expand-input")
        this.searchInputContainer.classList.add("expand-input")
        this.headerContainer.classList.add("header-container-opaque")
        this.navContainer.style.pointerEvents = "none"
        window.onscroll = () => window.scroll(0, 0)
    }

    openMobileSearch() {
        this.overlayMobile.classList.add("background-overlay-reveal")
        this.searchSuggestedCatMobile.classList.add("expand-input-mobile")
        this.searchInputContainerMobile.classList.add("expand-input-mobile")
        this.searchInputContainerMobile.classList.add("z-index")
        this.headerContainer.classList.add("header-container-opaque")
        this.heroSectionSearchContainerMobile.classList.replace("hero-section-search-container-mobile", "hero-section-search-container-expanded-mobile")
        this.navContainer.style.pointerEvents = "none"
        window.onscroll = () => window.scroll(0, 0)
    }

    closeOverlay() {
        this.overlay?.classList.remove("background-overlay-reveal")
        this.overlayMobile.classList.remove("background-overlay-reveal")
        this.searchSuggestedCat?.classList.remove("expand-input")
        this.searchSuggestedCatMobile?.classList.remove("expand-input-mobile")
        this.searchInputContainer?.classList.remove("expand-input")
        this.searchInputContainerMobile?.classList.remove("expand-input-mobile")
        this.searchInputContainerMobile?.classList.remove("z-index")
        this.headerContainer?.classList.remove("header-container-opaque")
        this.sidebarMenuMobile?.classList.replace("sidebar-menu-mobile-open", "sidebar-menu-mobile-close")
        this.heroSectionSearchContainerMobile?.classList.replace("hero-section-search-container-expanded-mobile", "hero-section-search-container-mobile")

        if (this.navContainer) this.navContainer.style.pointerEvents = "fill"
        document.removeEventListener('scroll', this.preventScroll, { passive: false });
        window.onscroll = () => null
    }
}
const searchInstance = new Search()
