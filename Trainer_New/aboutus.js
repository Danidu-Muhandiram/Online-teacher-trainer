// Smooth scroll to sections
document.querySelectorAll('.navbarlist a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Animation on scroll
window.addEventListener('scroll', function() {
    const content = document.querySelectorAll('.content, .info div, .staff-list .staff');
    content.forEach((element) => {
        const position = element.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.3;
        if (position < screenPosition) {
            element.style.animation = 'fadeIn 2s ease-in-out';
        }
    });
});
