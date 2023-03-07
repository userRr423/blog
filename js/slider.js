const images = document.querySelectorAll('.slider .slider-line img');
const sliderLine = document.querySelector('.slider .slider-line');
let count = 0;
let width;

function init() {
    console.log('resize');
    width = document.querySelector('.slider').offsetWidth;
    sliderLine.style.width = width * (images.length / 3) + 'px';
    images.forEach(item => {
        item.style.width = width  + 'px';
        item.style.height = '200px';
    });
    rollSlider();
}

init();
window.addEventListener('resize', init);



function rollSlider() {
    sliderLine.style.transform = 'translate(-' + count * (width/3) + 'px)';

}



let carrot_count = 10;

console.log("KK");

var timer = setInterval(function() {
    //document.querySelector('.slider-line').style.transition = 'all ease 1s;';
    count++;
    if (count < 0) {
        count = images.length + 1;
    }
    if (count >= 5)
    {
        count = 0;
        //document.querySelector('.slider-line').style.transition = 'all ease 0.01s';
    }
    rollSlider();
}, 5000);

