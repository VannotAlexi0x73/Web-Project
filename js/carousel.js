const carousel = document.querySelector('.images_carousel');
const carouselImages = document.querySelectorAll('.images_carousel img');

//Compteur
let counter = 1;
const size = carouselImages[0].clientWidth;

carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';


//Buttons
const prev_Button = document.querySelector('#prev_Button');
const next_Button = document.querySelector('#next_Button');

//Buttons listeners
next_Button.addEventListener('click',()=>{
    if (counter >= carouselImages.length - 1) return;
    carousel.style.transition = "width 1s ease-in-out 0s";
    counter++;
    // console.log(counter);
    carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
});

prev_Button.addEventListener('click',()=>{
    if (counter <= 0) return;
    carousel.style.transition = "tranform 0.4s ease-in-out;";
    counter--;
    carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
});


carousel.addEventListener('transitionend', () => {
    if (caarouselImages[counter].id === 'lastClone') {
        carousel.style.transition = "none";
        counter = carouselImages.length - 2;
        carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }
    if (caarouselImages[counter].id === 'firstClone') {
        carousel.style.transition = "none";
        counter = carouselImages.length - counter;
        carousel.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }


});
