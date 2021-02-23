document.addEventListener('DOMContentLoaded', function(e){
    let mobileMenu = document.querySelector('#mobile-demo');
    let carous = document.querySelector('#caro1');
    let sideNavShow = document.querySelector('#sideNavShow');
    let mySideNav = document.querySelector('#slide-out');

    M.AutoInit();

    M.Sidenav.init(mobileMenu, {edge: "right"});
    // M.Sidenav.init(mySideNav, {inDuration: 500, outDuration: 500});
    M.Carousel.init(carous, {fullWidth: true, indicators: true});

    carous && setInterval(() => {
        M.Carousel.getInstance(carous).next()
    }, 5000)

    sideNavShow && sideNavShow.addEventListener('click', function(e){
        // console.log('clickdd')
        // e.preventDefault();
        let navInst = M.Sidenav.getInstance(mySideNav, {inDuration: 500, outDuration: 500});
        if(document.body.classList.contains('padSide')){
            console.log('padded');
            document.body.classList.toggle('padSide')
            navInst.close();
        } else {
            document.body.classList.toggle('padSide')
            navInst.open();
            console.log('Not Padded')
        }
    })


})