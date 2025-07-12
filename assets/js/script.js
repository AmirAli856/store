var swiper = new Swiper(".swiperHeader ", {
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },pagination: {
        el: ".swiperHeader .swiper-pagination",
        dynamicBullets: true
    },
});
var swiper = new Swiper(".swiperNewItem", {
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        576: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 25
        },
        992: {
            slidesPerView: 4,
            spaceBetween: 30
        },
        1200: {
            slidesPerView: 5,
            spaceBetween: 30
        },
        1400: {
            slidesPerView: 7,
            spaceBetween: 30
        }
    }
});


// Get user device height and set it as a CSS variable
function bodySize() {
    document.documentElement.style.setProperty('--body-size', `${window.visualViewport.height}px`);
}
bodySize();
window.visualViewport.addEventListener('resize', bodySize);

// For 'index.html' page
if(location.pathname.split("/").pop() === "register.html") {
    // Checking the correctness of the repeated password
    document.getElementById("registerPasswordRepeatInput").addEventListener("input", function(){
        const input = document.getElementById("registerPasswordInput")
        const error_element = document.getElementById("registerPasswordRepeatInputError")
        if(input.value !== this.value){
            error_element.classList.remove('d-none')
        }else{
            error_element.classList.add('d-none')
        }
    })
    // Filter number and character limit
    document.getElementById("registerNumberInput").addEventListener("input", function(){
        this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11)
    })
}

// For 'login.html' page
if(location.pathname.split("/").pop() === "login.html"){
    // Filter number and character limit
    document.getElementById("loginNumberInput").addEventListener("input", function(){
        this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11)
    })
}

  $(document).ready(function () {
    $('#myTable').DataTable({
      language: {
        "search": "جستجو:",
        "paginate": {
          "previous": "قبلی",
          "next": "بعدی"
        },
        "lengthMenu": "نمایش _MENU_ رکورد",
        "info": "نمایش _START_ تا _END_ از _TOTAL_ رکورد",
        "infoEmpty": "رکوردی یافت نشد",
        "zeroRecords": "موردی برای نمایش وجود ندارد",
        "infoFiltered": "(فیلتر شده از مجموع _MAX_ رکورد)"
      },
      dom: '<"row mb-3"<"col-sm-6 text-end"f><"col-sm-6 text-start"l>>t<"row mt-3"<"col-sm-6 text-end"i><"col-sm-6 text-start"p>>',
      ordering: true
    });
    
        
   
  });


