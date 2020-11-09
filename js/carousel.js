const carousel = document.querySelector('.images_carousel');
const carouselImages = document.querySelectorAll('.images_carousel img');

//Compteur
let counter = 1;
const size = carouselImages[0].clientWidth;
const taille = carouselImages.length - 1 + "";

carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';


//Buttons
const prev_Button = document.querySelector('#prev_Button');
const next_Button = document.querySelector('#next_Button');

//Buttons listeners
next_Button.addEventListener('click',()=>{
    if (counter >= carouselImages.length - 1) return;
    carousel.style.transition = "transform 0.5s ease-in-out";
    counter++;
    carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
});

prev_Button.addEventListener('click',()=>{
    if (counter <= 0) return;
    carousel.style.transition = "transform 0.5s ease-in-out";
    counter--;
    carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
});
carousel.addEventListener('transitionend', () => {
    if (carouselImages[counter].id === taille) {
        carousel.style.transition = "none";
        counter = carouselImages.length - 1;
        carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }
    if (carouselImages[counter].id === '1') {
        carousel.style.transition = "none";
        counter = carouselImages.length - counter;
        carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }
});

setInterval(function(){
    carouselImages[counter].checked = true;
    carousel.style.transition = "transform 0.5s ease-in-out";
    counter++;
    carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
    if (counter > carouselImages.length - 1) {
        counter = 1;
    }
},5000);

