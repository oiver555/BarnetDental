document.addEventListener("DOMContentLoaded", () => {

     const filterCloseBtn = document.querySelector("#filter-close-btn-mobile")
     const filterBtn = document.querySelector("#filter-btn-mobile")
     const filterMenuMobile = document.querySelector("#filter-menu-mobile")


     filterCloseBtn && filterCloseBtn.addEventListener("click", (e) => {
          filterMenuMobile.classList.replace("show-menu-mobile", "hide-menu-mobile-left")
     })

     filterBtn && filterBtn.addEventListener("click", (e) => {
          filterMenuMobile.classList.replace("hide-menu-mobile-left", "show-menu-mobile")
     })
})