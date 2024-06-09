require('./bootstrap');


const hamburger = document.querySelector(".toggle-btn");
const sidebar = document.querySelector("#sidebar");

// Memeriksa lebar layar
const isDesktop = window.innerWidth >= 768; // Lebar desktop minimal 768px
const isTablet = window.innerWidth >= 480 && window.innerWidth < 768; // Lebar tablet antara 480px dan 768px
const isMobile = window.innerWidth < 480; // Lebar mobile kurang dari 480px

if (isDesktop) {
    sidebar.classList.add("expand");
}

// Menambahkan event listener ke tombol hamburger
hamburger.addEventListener("click", function () {
    // Memeriksa jenis perangkat
    if (isDesktop) {
        sidebar.classList.toggle("expand");
    } else if (isTablet) {
        sidebar.classList.toggle("expand");
    } else if (isMobile) {
        console.log("Mobile");
    }
});


// Highlight active page in sidebar
const currentUrl = window.location.href;
const sidebarLinks = document.querySelectorAll('.sidebar-link');

sidebarLinks.forEach(link => {
    if (link.href === currentUrl) {
        link.parentElement.classList.add('active');
    }
});
