// Scroll to top button functionality
// The mobile menu is handled in includes/navbar.php.
const scrollToTopBtn = document.getElementById('scrollToTop');

if (scrollToTopBtn) {
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.remove('hidden');
        } else {
            scrollToTopBtn.classList.add('hidden');
        }
    });

    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// Cursor Animation
let allowStardust = true;

// Stop the effect after 10 seconds
setTimeout(() => {
    allowStardust = false;
}, 10000); // 10 seconds = 10000ms

document.addEventListener("mousemove", function (e) {
    if (!allowStardust) return;

    const star = document.createElement("div");
    star.className = "stardust";
    star.style.left = `${e.clientX}px`;
    star.style.top = `${e.clientY}px`;
    document.body.appendChild(star);

    setTimeout(() => {
        star.remove();
    }, 1000); // each particle fades after 1 second
});
