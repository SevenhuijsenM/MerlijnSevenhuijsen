// The first function that will be called upon starting the page
const initialize = () => {
    // Initially hide the login screen
    $(".login-background").hide();

    // Set the navigation slider
    navSlide();

    // Set up the login form
    loginForm();
}


const navSlide = () => {
    // Get the burger ( three stripes ) and the navigator of the html
    const indicatorBar = document.querySelector('.page-bar');
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    // Add a click listener that will toggle the nav-active class
    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active');
        indicatorBar.classList.toggle('nav-active-bar');

        // Animate all links
        navLinks.forEach((link, index) => {
            getBarAnimation(navLinks, link, index);
        });
            
        // Burger animation
        burger.classList.toggle('burgerToggle');
    });
}

const loginForm = () => {
    // Add an on click listener to the background of the login page to return
    $('.login-background').on('click', function(e) {
        const container = $(".login-container");
        // Only hide the login page if it is already shown and clicked outside of the page
        if (container.is(":visible") && !$(e.target).closest(container).length) {
            $('.login-background').hide();
        }
    });

    // Add an on click listener to the login button
    $('#li-login').on('click', function(e) {
        // Show the login page
        $(".login-background").show();
    })


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


initialize();
