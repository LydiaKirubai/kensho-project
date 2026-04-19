<nav class="bg-white shadow-md sticky top-0 z-50">

        <!--<div class="container mx-auto px-6 py-3">-->
        <div class="container mx-auto px-6 pt-2 pb-2 md:pt-1 md:pb-0">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-4">
                    <div class="logo-container" title="Kensho Project Logo">
                        <img src="assets/img/logo.png" alt="Kensho Project logo" onerror="this.style.display='none'" />
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="nav-link text-primary font-medium">Home</a>
                    <a href="/#about" class="nav-link text-primary font-medium">About</a>
                    <a href="/#programs" class="nav-link text-primary font-medium">Services</a>
                    <a href="/courses" class="nav-link text-primary font-medium">Courses</a>
                    <a href="/#team" class="nav-link text-primary font-medium">Team</a>
                    <a href="/faq" class="nav-link text-primary font-medium">FAQs</a>
                </div>

                <!-- Hamburger Button (Mobile) -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-primary focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>

                <!-- Desktop Contact Button -->
                <div class="hidden md:block">
                    <a href="/#team" class="bg-accent hover:bg-green-700 text-white font-medium px-6 py-2 rounded-full transition duration-300">Start your healing journey</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Dropdown -->
<!--<div id="mobile-menu" clss="md:hidden hidden bg-white px-6 pt-2 pb-4 shadow-md z-50 relative">-->
    <div id="mobile-menu" class="fixed top-[96px] left-0 right-0 md:hidden hidden bg-white px-6 pt-4 pb-4 shadow-md z-50">

    <a href="/" class="block text-primary font-medium py-2">Home</a>
    <a href="/#about" class="block text-primary font-medium py-2">About</a>
    <a href="/#programs" class="block text-primary font-medium py-2">Services</a>
    <a href="/courses" class="block text-primary font-medium py-2">Courses</a>
    <a href="/#team" class="block text-primary font-medium py-2">Team</a>
    <a href="/faq" class="block text-primary font-medium py-2">FAQs</a>
    <a href="/#team" class="block bg-accent text-white font-medium px-4 py-2 mt-2 rounded-full text-center w-full">Start your healing journey</a>
</div>

<!-- Overlay -->
<div id="menu-overlay" class="fixed top-[96px] left-0 right-0 bottom-0 bg-black bg-opacity-50 hidden z-40"></div>
