const locationMedicalCenter = document.querySelectorAll(".location-medical-center-link")
const locationUrgentCare = document.querySelectorAll(".location-urgent-care-link")
const locationSchool = document.querySelectorAll(".location-school-link")
const locationSpecialtyCare = document.querySelectorAll(".location-specialty-care-link")
const locationOrthodontics = document.querySelectorAll(".location-orthodontics-link")
const locationAll = document.querySelectorAll(".location-all-link")




locationMedicalCenter.forEach(element => {
    element.addEventListener("click",() => {
        window.location = `${wpDataLocation.baseUrl}/location/?type=medical center`
    })
})
locationUrgentCare.forEach(element => {
    element.addEventListener("click",() => {
        window.location = `${wpDataLocation.baseUrl}/location/?type=urgent care`
    })
})
locationSchool.forEach(element => {
    element.addEventListener("click",() => {
        window.location = `${wpDataLocation.baseUrl}/location/?type=school`
    })
})
locationSpecialtyCare.forEach(element => {
    element.addEventListener("click",() => {
        window.location = `${wpDataLocation.baseUrl}/location/?type=specialty`
    })
})
locationOrthodontics.forEach(element => {
    element.addEventListener("click",() => {
        window.location = `${wpDataLocation.baseUrl}/location/?type=orthodontics`
    })
})
locationAll.forEach(element => {
    element.addEventListener("click",() => {
        window.location = `${wpDataLocation.baseUrl}/location/`
    })
})



