<?php
require_once __DIR__ . '/includes/env.php';
loadEnv(__DIR__ . '/.env');
require_once __DIR__ . '/includes/home_forms.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kensho Project - Mental Health & Wellness</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css"/>
    <script src="https://cdn.tailwindcss.com"></script>

     <!-- Favicon -->
    <link rel="icon" type="image/png" href="/my-favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/my-favicon/favicon.svg" />
    <link rel="shortcut icon" href="/my-favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/my-favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Kensho Project" />
    <link rel="manifest" href="/my-favicon/site.webmanifest" />
</head>
<body class="bg-gray-50">
    
    <!-- Navigation -->
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

<!--<div id="mobile-menu" class="md:hidden hidden bg-white px-6 pt-2 pb-4 shadow-md z-50 relative">-->
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


    
    <!-- Hero Section -->
<section id="home" class="hero-gradient text-white py-12 sm:py-16 md:py-20 px-4">
  <div class="container mx-auto flex flex-col md:flex-row items-center">
    <div class="md:w-1/2 mb-8 md:mb-0">
      <h1 class="typewriter text-2xl sm:text-3xl md:text-5xl font-bold mb-4 sm:mb-6">
  Heal. Rise. Thrive.
</h1>
      <p class="text-base sm:text-lg md:text-xl mb-6 sm:mb-8 opacity-90">
        Welcome to Kensho Project — Where every challenge becomes a chance for transformation.
      </p>
      <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
        <a href="/health-quiz" class="bg-white text-primary font-bold px-6 py-2 sm:px-8 sm:py-3 rounded-full hover:bg-gray-100 transition duration-300 text-center">
          Take mental health quiz
        </a>
        <a href="#programs" class="border-2 border-white text-white font-bold px-6 py-2 sm:px-8 sm:py-3 rounded-full hover:bg-white hover:text-primary transition duration-300 text-center">
          Our Programs
        </a>
      </div>
    </div>

    <!-- Banner Image -->
    <div class="md:w-1/2 flex justify-center mt-8 md:mt-0">
      <div class="relative w-full max-w-xl">
        <div class="absolute -top-4 -left-4 w-full h-full border-4 border-accent rounded-lg"></div>
        <img 
          src="assets/img/kensho-rf.png"
          alt="Kensho Project Banner"
          class="relative rounded-lg shadow-2xl border-4 border-white w-full object-cover sm:object-cover h-[240px] sm:h-80 md:h-[28rem]"
        />
      </div>
    </div>
  </div>
</section>


    <!-- About Section -->
<section id="about" class="py-20 px-4 bg-white">
  <div class="container mx-auto">
    <div class="text-center mb-16">
      <span class="text-accent font-bold">ABOUT US</span>
      <h2 class="text-3xl md:text-4xl font-bold text-primary mt-2 mb-4">Who We Are</h2>
      <div class="w-24 h-1 bg-secondary mx-auto"></div>
    </div>

    <div class="max-w-5xl mx-auto">
      <p class="text-lg mb-6 text-gray-700">
        Kensho Project was born from lived experience, professional wisdom, and an unshakable belief:  
        <br />
        <p class="text-xl md:text-2xl text-primary font-bold text-left mb-8 leading-relaxed">
  “Healing is possible. And it gets to feel empowering.”
</p>
      </p>

      <p class="text-lg mb-6 text-gray-700">
        Founded by trauma-informed therapist <b>Cauviya Madhiyazhagan</b>, Kensho Project blends science-backed therapy, nervous system regulation, community support, and emotional intelligence to support your growth — personally and professionally.
      </p>

      <p class="text-lg mb-10 text-gray-700">
        We serve individuals, communities, and corporate leaders who are tired of surviving and are ready to start thriving.
      </p>

      <!-- 3 Columns: Mission, Approach, Values -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Our Mission -->
        <div>
          <h3 class="text-xl font-bold mb-2 text-primary">Our Mission</h3>
          <p class="text-gray-600">
            To help 100,000+ individuals break free from trauma patterns, rewire their emotional world, and unlock their full potential — with compassion, courage, and clarity.
          </p>
        </div>

        <!-- Our Approach -->
        <div>
          <h3 class="text-xl font-bold mb-2 text-primary">Our Approach</h3>
          <p class="text-gray-600">
            We blend somatic healing, talk therapy, and nervous system regulation with real-world tools that support lasting emotional transformation — rooted in safety and connection.
          </p>
        </div>

        <!-- Our Values -->
        <div>
  <h3 class="text-xl font-bold mb-2 text-primary">Our Values</h3>
  <ul class="text-gray-600 space-y-2">
    <li><i class="fas fa-circle text-secondary mr-2" style="font-size: 0.45rem;"></i> Trauma-Informed Care</li>
    <li><i class="fas fa-circle text-secondary mr-2" style="font-size: 0.45rem;"></i> Authentic Connection</li>
    <li><i class="fas fa-circle text-secondary mr-2" style="font-size: 0.45rem;"></i> Nervous System Awareness</li>
    <li><i class="fas fa-circle text-secondary mr-2" style="font-size: 0.45rem;"></i> Somatic Wisdom</li>
    <li><i class="fas fa-circle text-secondary mr-2" style="font-size: 0.45rem;"></i> Radical Growth</li>
  </ul>
</div>

      </div>
    </div>
  </div>
</section>


    <!-- Programs Section -->
    <section id="programs" class="py-20 px-4 bg-gray-50">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <span class="text-accent font-bold">OUR OFFERINGS</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary mt-2 mb-4">What we offer</h2>
                <div class="w-24 h-1 bg-secondary mx-auto"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Program 1 -->
                <div onclick="window.open('https://kensho-project.setmore.com/#our-team', '_blank')" class="bg-white rounded-lg overflow-hidden shadow-lg hover-scale cursor-pointer">
                    <img src="assets/img/1:1.png" alt="One-on-One Therapy" class="w-full h-56 object-contain" />
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-primary rounded-full p-3">
                                <i class="fas fa-chair text-white text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold ml-4 text-primary">1:1 Trauma-Informed Therapy</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Our individual sessions go beyond symptom management — we help you gently unravel emotional patterns, reconnect with your body, and rewire safety into your system.</p>
                        <div class="flex justify-between items-center">
                            <!--<span class="text-secondary text-sm font-bold">2018 - Present</span>-->
                            <a href="/services" class="text-accent font-medium hover:underline">Learn More</a>
                        </div>
                    </div>
                </div>
                
                <!-- Program 2 -->
                <div onclick="window.open('https://kensho-project.setmore.com/#our-team', '_blank')" class="bg-white rounded-lg overflow-hidden shadow-lg hover-scale cursor-pointer">
                    <img src="assets/img/art-therapy.png" alt="Art Therapy" class="w-full h-56 object-contain" />
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-primary rounded-full p-3">
                                <i class="fas fa-palette text-white text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold ml-4 text-primary">Art Therapy</h3>
                        </div>
                        <p class="text-gray-600 mb-4">Explore your emotions, trauma, and inner world through creative expression. Art therapy helps you access subconscious patterns and release what's stuck — even without saying a word.</p>
                        <div class="flex justify-between items-center">
                            <!--<span class="text-secondary text-sm font-bold">2015 - Present</span>-->
                            <a href="/services" class="text-accent font-medium hover:underline">Learn More</a>
                        </div>
                    </div>
                </div>
                
                <!-- Program 3 -->
                <div onclick="window.open('https://kensho-project.setmore.com/#our-team', '_blank')" class="bg-white rounded-lg overflow-hidden shadow-lg hover-scale cursor-pointer">
                    <img src="assets/img/couple-therapy.png" alt="Couples Counseling" class="w-full h-56 object-contain" />
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-primary rounded-full p-3">
                                <i class="fas fa-user-friends text-white text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold ml-4 text-primary">Couple Counseling</h3>
                        </div>
                        <p class="text-gray-600 mb-4"> For couples navigating emotional disconnection, communication breakdown, trauma histories, or transitions — our sessions help you build safety, clarity, and intimacy without blame.</p>
                        <div class="flex justify-between items-center">
                            <!--<span class="text-secondary text-sm font-bold">2020 - Present</span>-->
                            <a href="/services" class="text-accent font-medium hover:underline">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            
           <div class="text-center mt-12">
  <a href="/services" id="viewAllBtn" class="inline-block border-2 border-accent text-accent font-bold px-8 py-3 rounded-full hover:bg-accent hover:text-white transition duration-300">
    View All Programs
  </a>
</div>

        </div>
    </section>

    <!-- Team Section -->
    <!-- Team Section -->
<section id="team" class="py-20 px-4 bg-gray-50">
  <div class="container mx-auto">
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-4xl font-bold text-primary mt-2 mb-4">Meet Our Therapists</h2>
      <div class="w-24 h-1 bg-secondary mx-auto"></div>
    </div>

    <div class="flex justify-center px-2 sm:px-0">
      <!-- Mobile: same layout as index-7.php therapist card -->
      <div class="md:hidden bg-white rounded-lg overflow-hidden shadow-md hover-scale w-full max-w-lg mx-auto">
        <img src="assets/img/cauviya.png" alt="Cauviya Madhiyazhagan" class="w-auto max-w-xs mx-auto object-contain" />
        <div class="p-6">
          <h3 class="text-xl font-bold text-primary mb-1">Cauviya Madhiyazhagan</h3>
          <p class="text-secondary mb-4">Psychotherapist | Resilience &amp; Growth Mentor</p>
          <p class="text-gray-600 mb-4 line-clamp-6" id="desc-cauviya-m">
            With over 6 years of experience, Cauviya is a trauma-informed psychotherapist and a dedicated resilience and growth mentor. She holds a Master’s degree in HRD Psychology, along with diplomas in Counseling &amp; Guidance and Art Therapy. As a certified Animal-Assisted Therapist, her work is grounded in compassion, creativity, and connection.

            Cauviya believes in a holistic and humanistic approach to healing—creating a safe, non-judgmental space where clients feel seen, heard, and empowered. Her practice blends evidence-based techniques with expressive therapies to support individuals on their journey toward emotional clarity and inner strength.

            Whether you're navigating anxiety, depression, trauma recovery, low self-esteem, or seeking better work-life balance, Cauviya is here to guide you toward lasting change and personal growth.

            Feel free to reach out if you're ready to take a gentle, yet powerful step forward.
          </p>
          <button type="button" onclick="toggleReadMore('cauviya-m')" class="text-sm text-primary hover:underline" id="btn-cauviya-m">Read More</button>
          <div class="flex items-center justify-between mt-4">
            <div class="flex space-x-4">
              <a href="https://www.linkedin.com/in/cauviya-madhiyazhagan-83997b145?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" class="text-primary hover:text-secondary"><i class="fab fa-linkedin-in"></i></a>
              <a href="mailto:cauviya@kenshoproject.com" class="text-primary hover:text-secondary"><i class="fas fa-envelope"></i></a>
            </div>
            <a href="https://kensho-project.setmore.com/cauviya" target="_blank" rel="noopener noreferrer" class="bg-secondary hover:bg-primary text-white font-semibold py-2 px-4 rounded-full transition duration-300">Book Now</a>
          </div>
        </div>
      </div>

      <!-- Desktop: current split layout -->
      <div class="hidden md:flex bg-white rounded-lg overflow-hidden shadow-md hover-scale w-full max-w-5xl flex-row items-stretch">
        <div class="flex flex-col items-center shrink-0 p-8 pr-6 bg-gray-50/90 border-r border-gray-100 w-72 lg:w-80 self-stretch">
          <img src="assets/img/cauviya.png" alt="Cauviya Madhiyazhagan" class="w-48 sm:w-56 h-auto object-contain" />
          <h3 class="text-lg sm:text-xl font-bold text-primary mt-4 text-center">Cauviya Madhiyazhagan</h3>
          <p class="text-secondary text-sm sm:text-base text-center mt-1 px-1">Psychotherapist | Resilience &amp; Growth Mentor</p>
          <div class="flex justify-center space-x-5 mt-4">
            <a href="https://www.linkedin.com/in/cauviya-madhiyazhagan-83997b145?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" class="text-primary hover:text-secondary text-xl" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            <a href="mailto:cauviya@kenshoproject.com" class="text-primary hover:text-secondary text-xl" aria-label="Email"><i class="fas fa-envelope"></i></a>
          </div>
        </div>
        <div class="flex-1 p-8 pl-8 min-w-0 flex flex-col">
          <div class="text-gray-600 space-y-4 text-sm sm:text-base leading-relaxed">
            <p>With over 6 years of experience, Cauviya is a trauma-informed psychotherapist and a dedicated resilience and growth mentor. She holds a Master’s degree in HRD Psychology, along with diplomas in Counseling &amp; Guidance and Art Therapy. As a certified Animal-Assisted Therapist, her work is grounded in compassion, creativity, and connection.</p>
            <p>Cauviya believes in a holistic and humanistic approach to healing—creating a safe, non-judgmental space where clients feel seen, heard, and empowered. Her practice blends evidence-based techniques with expressive therapies to support individuals on their journey toward emotional clarity and inner strength.</p>
            <p>Whether you're navigating anxiety, depression, trauma recovery, low self-esteem, or seeking better work-life balance, Cauviya is here to guide you toward lasting change and personal growth.</p>
            <p>Feel free to reach out if you're ready to take a gentle, yet powerful step forward.</p>
          </div>
          <div class="flex justify-center mt-6">
            <a href="https://kensho-project.setmore.com/cauviya" target="_blank" rel="noopener noreferrer" class="inline-block bg-secondary hover:bg-primary text-white font-semibold py-3 px-6 rounded-full transition duration-300">Book Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .line-clamp-6 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 6;
    -webkit-box-orient: vertical;
  }
</style>

    <!-- Newsletter Section -->
<section class="py-16 px-4 bg-primary text-white">
    <div class="container mx-auto max-w-3xl text-center">

        <h2 class="text-2xl md:text-3xl font-bold mb-4">
            Start Your Healing Journey with Our Free Nervous System Reset Guide
        </h2>

        <p class="mb-6 opacity-90 text-lg">
            A calming guide with 7 simple, science-backed tools to regulate your stress and reconnect with your body — in just 10 minutes a day.
        </p>

        <ul class="text-left text-sm sm:text-base mb-6 mx-auto max-w-md space-y-2 opacity-95">
            <li><i class="fas fa-feather-alt"></i> Daily grounding rituals</li>
            <li><i class="fas fa-feather-alt"></i> Somatic safety exercises</li>
            <li><i class="fas fa-feather-alt"></i> Breathwork for overwhelm</li>
            <li><i class="fas fa-feather-alt"></i> Gentle prompts for reflection</li>
            <li><i class="fas fa-feather-alt"></i> BONUS: Guided audio link for body scan</li>
        </ul>

        <!-- PHP Alert -->
        <?php if (!empty($success)): ?>
            <div class="bg-green-200 text-green-900 px-4 py-3 rounded mb-4 inline-block">
                <?= $success ?>
            </div>
        <?php elseif (!empty($error)): ?>
            <div class="bg-red-200 text-red-900 px-4 py-3 rounded mb-4 inline-block">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <form method="POST" action="" class="max-w-xl mx-auto">
            <div class="flex flex-col sm:flex-row gap-2 justify-center">
  <input type="hidden" name="form_type" value="freeguide">
  <input type="email" name="email" required placeholder="Your email address"class="px-3 py-2 rounded text-sm focus:outline-none text-gray-800 w-full sm:w-2/3" />
  
  <button type="submit" class="bg-accent hover:bg-green-700 text-white font-semibold text-sm px-4 py-2 rounded w-full sm:w-auto">GET MY FREE GUIDE
  </button>
</div>

        </form>

        <p class="text-sm mt-4 opacity-70">We respect your privacy. Unsubscribe anytime.</p>
    </div>
</section>


    
    <!-- Testimonials Section -->
<?php include "includes/testimonials.php"; ?>
    <!-- Contact Section -->
    <section id="contact" class="py-20 px-4 bg-gray-50">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <span class="text-accent font-bold">GET IN TOUCH</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary mt-2 mb-4">Reach Out</h2>
                <div class="w-24 h-1 bg-secondary mx-auto"></div>
            </div>
            
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 mb-10 md:mb-0 md:pr-8">
                    <h3 class="text-2xl font-bold text-primary mb-6">Let's Connect</h3>
                    <p class="text-gray-700 mb-8">If you're reaching out for guidance, connection, or collaboration, know that you're welcome here. We're ready to listen.</p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-secondary p-3 rounded-full text-white mr-4">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-primary mb-1">Headquarters</h4>
                                <p class="text-gray-600">136, Arcot Rd, Saligramam, <br /> Chennai, Tamil Nadu 600093.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-secondary p-3 rounded-full text-white mr-4">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-primary mb-1">Email Us</h4>
                                <p class="text-gray-600">contact@kenshoproject.com</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-secondary p-3 rounded-full text-white mr-4">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-primary mb-1">Call Us</h4>
                                <p class="text-gray-600">+91 90805 65434</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8">
                        <h4 class="font-bold text-primary mb-4">Follow Us</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="bg-white p-2 rounded-full shadow hover-scale">
                                <i class="fab fa-facebook-f text-primary"></i>
                            </a>
                            <a href="#" class="bg-white p-2 rounded-full shadow hover-scale">
                                <i class="fab fa-twitter text-primary"></i>
                            </a>
                            <a href="#" class="bg-white p-2 rounded-full shadow hover-scale">
                                <i class="fab fa-instagram text-primary"></i>
                            </a>
                            <a href="#" class="bg-white p-2 rounded-full shadow hover-scale">
                                <i class="fab fa-linkedin-in text-primary"></i>
                            </a>
                            <a href="#" class="bg-white p-2 rounded-full shadow hover-scale">
                                <i class="fab fa-youtube text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="md:w-1/2">
                    <div class="bg-white rounded-lg shadow-md p-8">
                        <form method="POST" id="contactForm" action="">
                            <input type="hidden" name="form_type" value="contact">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">First Name</label>
                                    <input type="text" name="first_name" class="w-full p-2 border border-gray-300 rounded focus:border-secondary focus:ring-secondary" />
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">Last Name</label>
                                    <input type="text" name="last_name" class="w-full p-2 border border-gray-300 rounded focus:border-secondary focus:ring-secondary" />
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-gray-700 font-medium mb-2">Email Address</label>
                                <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded focus:border-secondary focus:ring-secondary" />
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-gray-700 font-medium mb-2">Subject</label>
                                <select name="subject" class="w-full p-2 border border-gray-300 rounded focus:border-secondary focus:ring-secondary">
                                    <option>General Inquiry</option>
                                    <option>Corporate Counselling</option>
                                    <option> Others </option>
                                </select>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-gray-700 font-medium mb-2">Message</label>
                                <textarea name="message" rows="4" class="w-full p-2 border border-gray-300 rounded focus:border-secondary focus:ring-secondary"></textarea>
                            </div>
                            
                            <button type="submit" class="w-full bg-secondary hover:bg-blue-600 text-white font-bold py-3 px-4 rounded transition duration-300">Send Message</button>
                        </form>
                        <?php if ($success): ?>
    <p class="text-green-600 font-medium mb-4"><?php echo $success; ?></p>
<?php elseif ($error): ?>
    <p class="text-red-600 font-medium mb-4"><?php echo $error; ?></p>
<?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
    
    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="fixed bottom-8 right-8 bg-secondary text-white w-12 h-12 rounded-full shadow-lg hidden transition duration-300 hover:bg-blue-600">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
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
  
  
    </script>
    <script>
  function scrollTestimonials(direction) {
    const container = document.getElementById("testimonialContainer");
    const scrollAmount = 400 * direction;
    container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
  }
</script>
<script>
  function toggleReadMore(id) {
    const desc = document.getElementById('desc-' + id);
    const btn = document.getElementById('btn-' + id);
    if (!desc || !btn) return;
    desc.classList.toggle('line-clamp-6');
    btn.innerText = desc.classList.contains('line-clamp-6') ? 'Read More' : 'Read Less';
  }
</script>
    <script>
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

</script>

</body>
</html>