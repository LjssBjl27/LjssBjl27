let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');
let formBtn = document.querySelector('#admin-login-btn');
let loginform = document.querySelector('.login');
let formClose = document.querySelector('#form-close');
let readMoreText = document.querySelector('.read-more-text');
let readMore = document.querySelector('.read-more');


menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
};

var swiper = new Swiper(".home-slider", {
    loop:true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});