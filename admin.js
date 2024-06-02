let formBtn = document.querySelector('#adminlogin-btn');
let loginform = document.querySelector('.adminlogin-form-container');
let formClose = document.querySelector('#form-close');


menu.addEventListener('click', () =>{
    adminloginform.classList.remove('active');
});

formBtn.AddEventListener('click', () =>{
    adminloginform.classList.add('active');
});

formClose.AddEventListener('click', () =>{
    adminloginform.classList.remove('active');
});
