const menu = document.getElementById('item-container-dropBurger');
const burger = document.querySelector('.burger-btn');


sw = true;
menu.style.display = 'none';
burger.addEventListener('click', () => {
    if(sw) {
        menu.style.display = 'block';
        sw = false;
    }
    else {
        menu.style.display = 'none';
        sw = true;
    }
})