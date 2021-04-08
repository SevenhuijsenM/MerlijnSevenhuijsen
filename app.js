const navSlide = () => {
    // Get the burger ( three stripes ) and the navigator of the html
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    // Add a click listener that will toggle the nav-active class
    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active');

        // Animate all links
        navLinks.forEach((link, index) => {
            getBarAnimation(navLinks, link, index);
        });
            
        // Burger animation
        burger.classList.toggle('burgerToggle');
    });

}

// Gets the style animation for the navigation bar
function getBarAnimation(navLinks, link, index) {
    // Checks if mobile mode is used or not
    if (link.style.animation) {
        link.style.animation = '';
    } else if (document.documentElement.clientWidth > 768){
        link.style.animation = `navLinkFade 0.5s ease forwards ${(index) / 7}s`
    } else {
        link.style.animation = `navLinkFade 0.5s ease forwards ${(navLinks.length - index) / 7}s`
    }
  }
  
  
navSlide();