// Scroll to top button functionality
const scrollToTopBtn = document.getElementById('scrollToTop');

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

// Mobile Menu Button & Overlay
const menuBtn = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');
const overlay = document.getElementById('menu-overlay');

menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
    overlay.classList.toggle('hidden');
    document.body.classList.toggle('overflow-hidden');
});

overlay.addEventListener('click', () => {
    mobileMenu.classList.add('hidden');
    overlay.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
});

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
