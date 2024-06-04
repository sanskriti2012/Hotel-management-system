let searchBtn = document.querySelector('#search-btn');
let searchBar = document.querySelector('.search-bar-container');
let formBtn = document.querySelector('#login-btn');
let loginForm= document.querySelector('.login-form-container');
let formClose= document.querySelector('#form-close');
let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let videoBtn = document.querySelectorAll('.vid-btn');
window.scroll = ()=>{
    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
}
menu.addEventListener('click', ()=>{

    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});
searchBtn.addEventListener('click', ()=>{

    searchBtn.classList.toggle('fa-times');
    searchBar.classList.toggle('active');
});
formBtn.addEventListener('click', ()=>{
    loginForm.classList.add('active');
});
formClose.addEventListener('click', ()=>{
    loginForm.classList.remove('active');
});
videoBtn.forEach(btn =>{
    btn.addEventListener('click', () =>{
        document.querySelector('.controls .active').classList.remove('active');
        btn.classList.add('active');
        let src = btn.getAttribute('data-src');
        document.querySelector('#video-slider').src = src;
    });
});

var swiper = new Swiper(".review-slider",{
    spaceBetween: 10,
    grabCursor:true,
    loop:true,
    centeredSlides:true,
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickbable: true,
    },
});
// JavaScript to handle opening and closing of the modal popup
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


document.addEventListener("DOMContentLoaded", function () {
    const videoSlider = document.getElementById("video-slider");
    const vidBtns = document.querySelectorAll(".vid-btn");

    // Play the video associated with the clicked button
    vidBtns.forEach(btn => {
        btn.addEventListener("click", function () {
            // Check if the clicked button is already active
            if (!this.classList.contains("active")) {
                // Update the video source and play the video
                videoSlider.src = this.getAttribute("data-src");
                videoSlider.play();
                
                // Remove the 'active' class from all buttons
                vidBtns.forEach(btn => btn.classList.remove("active"));
                // Add the 'active' class to the clicked button
                this.classList.add("active");
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    var dropdownBtn = document.getElementById('dropdown-btn');
    var submenu = document.getElementById('submenu');

    // Event listener for the dropdown button
    dropdownBtn.addEventListener('click', function() {
        submenu.classList.toggle('hidden');
    });
});

