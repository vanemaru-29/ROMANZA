window.onscroll = function() {
    if (document.documentElement.scrollTop > 100) {
        document.querySelector('.inicio__top').classList.add('inicio__top-mostrar');
    } else {
        document.querySelector('.inicio__top').classList.remove('inicio__top-mostrar');
    }
}

document.querySelector('.inicio__top').addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});