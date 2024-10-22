const breadcrumbNavMobile = document.querySelector(".breadcrumb-nav-mobile")
const navButtonMobile = document.querySelector("#nav-button-mobile")



navButtonMobile && navButtonMobile.addEventListener("click", (e) => {
    breadcrumbNavMobile.classList.toggle("breadcrumb-nav-mobile-elongated")
})