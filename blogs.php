<?php include 'includes/header.php'; ?>
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
    <link rel="manifest" href="/my-favicon/site.webmanifest" />  <style>
    .blog-section {
      padding: 50px 20px;
      background-color: #fff9f5;
      font-family: 'Inter', sans-serif;
    }
    .blog-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
      max-width: 1200px;
      margin: 0 auto;
    }
    .blog-card {
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
      transition: transform 0.3s ease;
      cursor: pointer;
    }
    .blog-card:hover {
      transform: translateY(-5px);
    }
    .blog-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    .blog-content {
      padding: 20px;
    }
    .blog-title {
      font-size: 20px;
      font-weight: 600;
      color: #222;
      margin-bottom: 10px;
    }
    .blog-snippet {
      font-size: 16px;
      color: #555;
    }
    a.blog-link {
      text-decoration: none;
    }
    @media (max-width: 600px) {
      .blog-card img {
        height: 160px;
      }
    }
  </style>
</head>
<body>
    
<!-- Navigation -->
    <?php include "includes/navbar.php";?>
<section class="py-16 bg-gray-100">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-primary mb-10 text-center">Our Blogs</h2>
    
    <div class="grid md:grid-cols-3 gap-8">
      
      <!-- Blog Card 1 -->
      <a href="blog1.php" class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transform transition duration-300 hover:scale-105 cursor-pointer">
        <img src="assets/img/1:1.png" alt="Blog 1" class="w-full h-48 object-contain">
        <div class="p-6 h-52 flex flex-col justify-between">
          <h3 class="text-xl font-bold text-primary mb-2">Understanding Trauma & Healing</h3>
          <p class="text-gray-600 text-sm mb-4">A gentle dive into how trauma affects the body and mind — and how therapy can help you reclaim safety.</p>
          <span class="text-accent font-medium mt-auto">Read More →</span>
        </div>
      </a>

      <!-- Blog Card 2 -->
      <a href="blog1.php" class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transform transition duration-300 hover:scale-105 cursor-pointer">
        <img src="assets/img/somatic-healing.png" alt="Blog 2" class="w-full h-48 object-contain">
        <div class="p-6 h-52 flex flex-col justify-between">
          <h3 class="text-xl font-bold text-primary mb-2">Somatic Therapy Explained</h3>
          <p class="text-gray-600 text-sm mb-4">Discover how body-based approaches bring deep healing by reconnecting you with your nervous system.</p>
          <span class="text-accent font-medium mt-auto">Read More →</span>
        </div>
      </a>

      <!-- Blog Card 3 -->
      <a href="blog1.php" class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transform transition duration-300 hover:scale-105 cursor-pointer">
        <img src="/assets/img/couple-therapy.png" alt="Blog 3" class="w-full h-48 object-contain" onerror="this.onerror=null;this.src='/assets/img/couple-therapy-2.png'">
        <div class="p-6 h-52 flex flex-col justify-between">
          <h3 class="text-xl font-bold text-primary mb-2">Safe Relationships After Trauma</h3>
          <p class="text-gray-600 text-sm mb-4">Navigating connection after trauma — how to build safety, trust, and boundaries in relationships.</p>
          <span class="text-accent font-medium mt-auto">Read More →</span>
        </div>
      </a>

      <!-- You can add more blog cards here manually -->

    </div>
  </div>
</section>

<!-- Scroll to Top Button -->
<button id="scrollToTopBtn" class="fixed bottom-5 right-5 bg-primary text-white p-3 rounded-full shadow-lg hover:bg-secondary transition duration-300">
  <i class="fas fa-arrow-up"></i>
</button>

<script>
  const scrollToTopBtn = document.getElementById("scrollToTopBtn");
  window.addEventListener("scroll", () => {
    scrollToTopBtn.style.display = window.scrollY > 300 ? "block" : "none";
  });
  scrollToTopBtn.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
</script>

<?php include 'includes/footer.php'; ?>
</body>
</html>
