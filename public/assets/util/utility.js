document.addEventListener('DOMContentLoaded', function(e){
    let mobileMenu = document.querySelector('#mobile-demo');
    let carous = document.querySelector('#caro1');

    M.AutoInit();

    M.Sidenav.init(mobileMenu, {edge: "right"})
    M.Carousel.init(carous, {fullWidth: true, indicators: true});

    carous && setInterval(() => {
        M.Carousel.getInstance(carous).next()
    }, 5000)
})