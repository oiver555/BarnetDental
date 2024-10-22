

const menuCloseBtns = document.querySelectorAll(".sidebar-menu-close")
const findDentistBtn = document.querySelector("#sidebar-menu-mobile > li:first-child");
const locationsBtn = document.querySelector("#sidebar-menu-mobile > li:nth-of-type(2)");
const serviceBtn = document.querySelector("#sidebar-menu-mobile > li:nth-of-type(3)");
const patientsVisitorsBtn = document.querySelector("#sidebar-menu-mobile > li:nth-of-type(4)");
const dentistsMenu = document.querySelector("#find-a-dentist-menu-mobile")
const locationsMenu = document.querySelector("#sidebar-menu-locations-mobile")
const servicesMenu = document.querySelector("#services-menu-mobile")
const patientsVisitorsMenu = document.querySelector("#sidebar-menu-patients-visitors-mobile")
const dentistsBackBtn = document.querySelector("#sidebar-menu-dentist-header-mobile span")
const locationsBackBtn = document.querySelector("#sidebar-menu-locations-header-mobile span")
const servicesBackBtn = document.querySelector("#sidebar-menu-service-header-mobile span")
const menuBtn = document.querySelector("#sidebar-menu-btn")
const menu = document.querySelector("#sidebar-menu-mobile")
const menuMainHeaderMobile = document.querySelector("#sidebar-menu-main-header-mobile")
const menuDentistHeader = document.querySelector("#sidebar-menu-dentist-header-mobile")
const menuServiceHeader = document.querySelector("#sidebar-menu-service-header-mobile")
const menuLocationsHeader = document.querySelector("#sidebar-menu-locations-header-mobile")
const menuPatientsVisitorsHeader = document.querySelector("#sidebar-menu-patients-visitors-header-mobile")
const backgroundOverlay = document.querySelector("#background-overlay-mobile")
const searchInput = document.querySelector("#search-input-container-1")

menuCloseBtns.length && menuCloseBtns.forEach(menuCloseBtn => {
    menuCloseBtn.addEventListener("click", () => {
        backgroundOverlay.classList.remove("background-overlay-reveal")
        menu.classList.replace("sidebar-menu-mobile-open", "sidebar-menu-mobile-close")
        menuMainHeaderMobile.classList.replace("sidebar-menu-mobile-open", "sidebar-menu-mobile-close")
        menuDentistHeader.classList.replace("sidebar-menu-mobile-open", "sidebar-menu-mobile-close")
        menuServiceHeader.classList.replace("sidebar-menu-mobile-open", "sidebar-menu-mobile-close")
        dentistsMenu.classList.replace("sidebar-menu-mobile-open", "sidebar-menu-mobile-close")
        servicesMenu.classList.replace("sidebar-menu-mobile-open", "sidebar-menu-mobile-close")
        locationsMenu.classList.replace("sidebar-menu-mobile-open", "sidebar-menu-mobile-close")
        menuLocationsHeader.classList.replace("sidebar-menu-mobile-open", "sidebar-menu-mobile-close")
    })
})

dentistsBackBtn && dentistsBackBtn.addEventListener("click", (e) => {
    closeSubMenu(dentistsMenu, menuDentistHeader)
})
servicesBackBtn && servicesBackBtn.addEventListener("click", (e) => {
    closeSubMenu(servicesMenu, menuServiceHeader)
})
locationsBackBtn && locationsBackBtn.addEventListener("click", (e) => {
    closeSubMenu(locationsMenu, menuLocationsHeader)
})
findDentistBtn && findDentistBtn.addEventListener("click", (e) => {
    openSubMenu(dentistsMenu, menuDentistHeader)
})

serviceBtn && serviceBtn.addEventListener("click", () => {
    openSubMenu(servicesMenu, menuServiceHeader)
})

locationsBtn && locationsBtn.addEventListener("click", () => {
    openSubMenu(locationsMenu, menuLocationsHeader)
})
patientsVisitorsBtn && patientsVisitorsBtn.addEventListener("click", () => {
    openSubMenu(patientsVisitorsMenu, menuPatientsVisitorsHeader)
})

backgroundOverlay && backgroundOverlay.addEventListener("click", (e) => {
    menu.classList.replace("sidebar-menu-mobile-open", "sidebar-menu-mobile-close")
    menuMainHeaderMobile.classList.replace("sidebar-menu-mobile-open", "sidebar-menu-mobile-close")
})

menuBtn.addEventListener("click", (e) => {
    backgroundOverlay && backgroundOverlay.classList.add("background-overlay-reveal")
    menu.classList.replace("sidebar-menu-mobile-close", "sidebar-menu-mobile-open")
    menuMainHeaderMobile.classList.replace("sidebar-menu-mobile-close", "sidebar-menu-mobile-open")
    // if (searchInput) searchInput.style.display = "block"

})



const openSubMenu = (menu, header) => {
    menu.classList.replace("sidebar-menu-mobile-close", "sidebar-menu-mobile-open")
    header.classList.replace("sidebar-menu-mobile-close", "sidebar-menu-mobile-open")
}
const closeSubMenu = (menu, header) => {
    menu.classList.replace("sidebar-menu-mobile-open", "sidebar-menu-mobile-close")
    header.classList.replace("sidebar-menu-mobile-open", "sidebar-menu-mobile-close")
}