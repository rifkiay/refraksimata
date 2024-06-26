// Require Bootstrap if needed
// require('./bootstrap');

document.addEventListener("DOMContentLoaded", function() {
    const hamburgerMobile = document.querySelector(".navbar-toggler");
    const hamburger = document.querySelector(".toggle-btn");
    const sidebar = document.querySelector("#sidebar");

    // Function to check device type
    function checkDeviceType() {
        const isDesktop = window.innerWidth >= 768;
        const isTablet = window.innerWidth >= 480 && window.innerWidth < 768;
        const isMobile = window.innerWidth < 480;

        return { isDesktop, isTablet, isMobile };
    }
    const { isDesktop, isTablet, isMobile } = checkDeviceType();

    if(isDesktop){
        sidebar.classList.add("expand");

    }

    // Function to toggle sidebar visibility
    function toggleSidebar() {
        sidebar.classList.toggle("expand");
    }



    // Add click event listener to hamburger icon
    hamburger.addEventListener("click", toggleSidebar);
    hamburgerMobile.addEventListener("click", toggleSidebar);


    // Highlight active link in sidebar based on current URL
    const currentUrl = window.location.href;
    const sidebarLinks = document.querySelectorAll('.sidebar-link');

    sidebarLinks.forEach(link => {
        if (link.href === currentUrl) {
            link.parentElement.classList.add('active');
        }
    });
});
