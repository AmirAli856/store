document.addEventListener('DOMContentLoaded', function () {
    showContent('chart');
});

// function showContent(sectionId) {
//     document.querySelectorAll('.content-section').forEach(section => {
//         section.style.display = 'none';
//     });

//     document.querySelector(`#${sectionId}`).style.display = 'block';

//     document.querySelectorAll('.nav-link').forEach(nav => nav.classList.remove('active'));

//     document.querySelector(`.nav-link[data-target="${sectionId}"]`).classList.add('active');
// }

// document.querySelectorAll('.nav-link').forEach(link => {
//     link.addEventListener('click', function (e) {
//         e.preventDefault();
//         const targetId = this.getAttribute('data-target');
//         showContent(targetId);
//     });
// });

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

new DataTable('#productsTable',{
    language: {
        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/fa.json'
    }
});
new DataTable('#usersTable',{
    language: {
        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/fa.json'
    }
});
new DataTable('#commentsTable',{
    language: {
        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/fa.json'
    }
});
new DataTable('#categoriesTable',{
    language: {
        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/fa.json'
    }
});
new DataTable('#faqTable',{
    language: {
        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/fa.json'
    }
});
new DataTable('#orderTable',{
    language: {
        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/fa.json'
    }
});

$(document).ready(function () {
    $("#userBirthday").persianDatepicker({
        format: 'YYYY/MM/DD'
    });
});