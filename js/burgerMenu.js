const menu = document.getElementById('item-container-dropBurger');
const burger = document.querySelector('.burger-btn');

sw = true;

burger.addEventListener('click', () => {
    if(sw) {
        menu.style.display = 'none';
        sw = false;
    }
    else {
        menu.style.display = 'block';
        sw = true;
    }
})