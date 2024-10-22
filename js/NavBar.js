document.addEventListener('DOMContentLoaded', function () {
  const findDentistMenu = document.querySelector('#find-a-dentist-menu');
  const serviceMenu = document.querySelector('#service-menu');
  const locationsMenu = document.querySelector('#locations-menu');
  const patientsVisitorsMenu = document.querySelector('#patients-visitors-menu');
  const contactUsMenu = document.querySelector('#contact-us-menu');
  const findDentistBtn = document.querySelector('#find-a-dentist-btn');
  const specialtyBtn = document.querySelector('#specialty-btn');
  const specialtyMenu = document.querySelector('#specialty-menu');
  const serviceBtn = document.querySelector('#service-btn');
  const locationsBtn = document.querySelector('#locations-btn');
  const patientsVisitorsBtn = document.querySelector('#patients-visitors-btn');
  const contactUsBtn = document.querySelector('#contact-us-btn');
  const specialtyChevron = document.querySelector('#specialty-btn .chevron-down')
  const dentistChevron = document.querySelector('#find-a-dentist-btn .chevron-down')
  const serviceChevron = document.querySelector('#service-btn .chevron-down')
  const locationsChevron = document.querySelector('#locations-btn .chevron-down')
  const patientsVisitorsChevron = document.querySelector('#patients-visitors-btn .chevron-down')
  const contactUsChevron = document.querySelector('#contact-us-btn .chevron-down')
  const viewAllLocationsBtn = document.getElementById('view-all-locations-btn');
  const viewAllDentistsBtn = document.getElementById('view-all-dentists-btn'); 

  // Add a click event listener to the button
  viewAllDentistsBtn.addEventListener('click', function () {
    // Define the URL you want to redirect to
    const url = `${wpDataLocation.baseUrl}/find-a-dentist/`;
    window.location.href = url;
  });

  specialtyBtn.addEventListener('click', function () {
    specialtyMenu.classList.toggle("nav-sub-menu-container-up");
    specialtyChevron.classList.toggle("chevron-rotate")
  });
  findDentistBtn.addEventListener('click', function () {
    findDentistMenu.classList.toggle("nav-sub-menu-container-up");
    dentistChevron.classList.toggle("chevron-rotate")
  });

  serviceBtn.addEventListener('click', function () {
    serviceMenu.classList.toggle("nav-sub-menu-container-up");
    serviceChevron.classList.toggle("chevron-rotate")
  });
  locationsBtn.addEventListener('click', function () {
    locationsMenu.classList.toggle("nav-sub-menu-container-up");
    locationsChevron.classList.toggle("chevron-rotate")
  });
  patientsVisitorsBtn.addEventListener('click', function () {
    patientsVisitorsMenu.classList.toggle("nav-sub-menu-container-up");
    patientsVisitorsChevron.classList.toggle("chevron-rotate")
  });
  contactUsBtn.addEventListener('click', function () {
    contactUsMenu.classList.toggle("nav-sub-menu-container-up");
    contactUsChevron.classList.toggle("chevron-rotate")
  });

  specialtyBtn.addEventListener("mouseover", () => {
    specialtyBtn.classList.add("hovered-nav")
    specialtyChevron.classList.add("reveal")
  })
  findDentistBtn.addEventListener("mouseover", () => {
    findDentistBtn.classList.add("hovered-nav")
    dentistChevron.classList.add("reveal")
  })

  serviceBtn.addEventListener("mouseover", () => {
    serviceBtn.classList.add("hovered-nav")
    serviceChevron.classList.add("reveal")
  })
  locationsBtn.addEventListener("mouseover", () => {
    locationsBtn.classList.add("hovered-nav")
    locationsChevron.classList.add("reveal")
  })

  specialtyMenu.addEventListener("mouseover", () => {
    specialtyBtn.classList.add("hovered-nav")
    specialtyChevron.classList.add("reveal");
  })
  findDentistMenu.addEventListener("mouseover", () => {
    findDentistBtn.classList.add("hovered-nav")
    dentistChevron.classList.add("reveal");
  })
  patientsVisitorsBtn.addEventListener("mouseover", () => {
    patientsVisitorsBtn.classList.add("hovered-nav")
    patientsVisitorsChevron.classList.add("reveal");
  })
  contactUsBtn.addEventListener("mouseover", () => {
    contactUsBtn.classList.add("hovered-nav")
    contactUsChevron.classList.add("reveal");
  })
  specialtyBtn.addEventListener("mouseleave", () => {
    specialtyBtn.classList.remove("hovered-nav")
    specialtyChevron.classList.remove("reveal")
    specialtyMenu.classList.remove("nav-sub-menu-container-up");
  })
  findDentistBtn.addEventListener("mouseleave", () => {
    findDentistBtn.classList.remove("hovered-nav")
    dentistChevron.classList.remove("reveal")
    findDentistMenu.classList.remove("nav-sub-menu-container-up");
  })
  serviceBtn.addEventListener("mouseleave", () => {
    serviceBtn.classList.remove("hovered-nav")
    serviceChevron.classList.remove("reveal")
    serviceMenu.classList.remove("nav-sub-menu-container-up");
  })
  locationsBtn.addEventListener("mouseleave", () => {
    locationsBtn.classList.remove("hovered-nav")
    locationsChevron.classList.remove("reveal")
    locationsMenu.classList.remove("nav-sub-menu-container-up");
  })
  patientsVisitorsBtn.addEventListener("mouseleave", () => {
    patientsVisitorsBtn.classList.remove("hovered-nav")
    patientsVisitorsChevron.classList.remove("reveal")
    patientsVisitorsMenu.classList.remove("nav-sub-menu-container-up");
  })
  contactUsBtn.addEventListener("mouseleave", () => {
    contactUsBtn.classList.remove("hovered-nav")
    contactUsChevron.classList.remove("reveal")
    contactUsMenu.classList.remove("nav-sub-menu-container-up");
  })

  window.addEventListener('scroll', function () {
    specialtyBtn.classList.remove("hovered-nav")
    findDentistBtn.classList.remove("hovered-nav")
    serviceBtn.classList.remove("hovered-nav")
    specialtyChevron.classList.remove("reveal")
    dentistChevron.classList.remove("reveal")
    serviceChevron.classList.remove("reveal")
    specialtyMenu.classList.remove("nav-sub-menu-container-up");
    findDentistMenu.classList.remove("nav-sub-menu-container-up");
    serviceMenu.classList.remove("nav-sub-menu-container-up");
  }); 
});