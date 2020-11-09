const carousel = document.querySelector('.images_carousel');
const carouselImages = document.querySelectorAll('.images_carousel img');

//Compteur
let counter = 0;
const size = carouselImages[0].clientWidth;
const taille = carouselImages.length - 1;

//Buttons
const prev_Button = document.querySelector('#prev_Button');
const next_Button = document.querySelector('#next_Button');

// Timer
function carousel_timer() {
    counter++;
    if (counter === carouselImages.length) {
        counter = 0;
    }
    carousel.style.transition = "transform 0.5s ease-in-out";
    carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
}

var timer = setInterval(carousel_timer, 5000);

//Buttons listeners
prev_Button.addEventListener('click', () => {
    clearInterval(timer);
    timer = setInterval(carousel_timer, 5000);
    if (counter === 0) {
        counter = carouselImages.length - 1;
    }
    else {
        counter--;
    }
    carousel.style.transition = "transform 0.5s ease-in-out";
    carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
});

next_Button.addEventListener('click', () => {
    clearInterval(timer);
    timer = setInterval(carousel_timer, 5000);
    if (counter === carouselImages.length - 1) {
        counter = 0;
    }
    else {
        counter++;
    }
    carousel.style.transition = "transform 0.5s ease-in-out";
    carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
});

