function showContent(sectionId) {
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(section => section.classList.remove('active'));

    document.getElementById(sectionId).classList.add('active');

    const dashboardBox = document.getElementById('mainBox');
    if (sectionId === 'dashboard') {
        dashboardBox.classList.remove('d-none');
    } else {
        dashboardBox.classList.add('d-none');
    }

    const navLinks = document.querySelectorAll('.sidebar .nav-link');
    navLinks.forEach(link => link.classList.remove('active'));

    const clickedLink = document.querySelector(`.nav-link[data-target="${sectionId}"]`);
    if (clickedLink) {
        clickedLink.classList.add('active');
    }
}

function toggleProfileDropdown() {
    const dropdown = document.getElementById('profileDropdown');
    if (dropdown.style.display === 'block') {
        dropdown.style.display = 'none';
    } else {
        dropdown.style.display = 'block';
    }
}



document.addEventListener('click', function (e) {
    const dropdown = document.getElementById('profileDropdown');
    const profileImg = document.querySelector('.profile-img');
    if (!dropdown.contains(e.target) && !profileImg.contains(e.target)) {
        dropdown.style.display = 'none';
    }
});


window.onload = function () {
    let alertBox = document.getElementById("welcome-alert");
    alertBox.style.display = "block";

    setTimeout(function () {
        alertBox.style.opacity = "0";
        setTimeout(() => alertBox.style.display = "none", 500);
    }, 3000);
};


$(document).ready(function () {
    $("#birthdate").persianDatepicker({
        format: 'YYYY/MM/DD',
        observer: true,
        autoClose: true
    });
});

