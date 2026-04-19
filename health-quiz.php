<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kensho Project - Programs</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="assets/style.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/my-favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/my-favicon/favicon.svg" />
    <link rel="shortcut icon" href="/my-favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/my-favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Kensho Project" />
    <link rel="manifest" href="/my-favicon/site.webmanifest" />
    
  <script src="https://cdn.tailwindcss.com"></script>
  
</head>
<body class="bg-gray-50 text-gray-800">

     <!-- Navigation -->
    <?php include "includes/navbar.php";?>
 
<!-- Quiz Section -->
<section class="py-16 px-4 max-w-4xl mx-auto">
  <h1 class="text-3xl md:text-4xl font-bold text-primary mb-6">🌿 Quick Wellbeing Check-In</h1>
  <p class="text-lg mb-8">Take 2 minutes to reflect on your current state of wellbeing. Your answers may surprise you—and they’ll help you take the next step toward a more balanced and thriving life.</p>

  <form id="quizForm" class="space-y-8">
    <!-- Question Template -->
    <script>
      const questions = [
        "How often do you wake up feeling calm and grounded?",
        "How is your sleep quality these days?",
        "When was the last time you truly felt joy or excitement about life?",
        "Do you feel safe expressing your emotions to someone?",
        "How often do you feel overwhelmed or emotionally drained?",
        "Do you find it hard to say 'no' or set boundaries with others?",
        "How is your body feeling physically?",
        "How do you typically handle difficult emotions like sadness, anger, or fear?",
        "How connected do you feel to a sense of purpose or meaning right now?",
        "When was the last time you truly felt at peace with yourself and your life?"
      ];

      const options = [
        ["Almost every day", "A few times a week", "Occasionally", "Rarely or never"],
        ["Deep and restful", "Interrupted, but manageable", "Light, disturbed, or filled with anxious dreams", "I struggle to sleep or feel rested at all"],
        ["This week", "This month", "A few months ago", "I honestly can't remember"],
        ["Yes, regularly", "Sometimes, depends on the person", "Rarely—I hold most things in", "No, I usually suppress or avoid emotions"],
        ["Hardly ever", "A few times a month", "A few times a week", "Almost every day"],
        ["No, I’m comfortable with it", "Sometimes, depending on the situation", "Yes, it makes me anxious or guilty", "I never say no, even when I want to"],
        ["Light, energetic, and pain-free", "Tired, but manageable", "Heaviness, aches, or tension in specific areas", "Constant fatigue, discomfort, or numbness"],
        ["I acknowledge and process them", "I distract myself and hope they pass", "I suppress or avoid them", "I get overwhelmed and stuck in them"],
        ["Very aligned and inspired", "I have some direction but feel unclear", "I feel lost or confused", "I feel like I’m just surviving, not living"],
        ["Within the past week", "In the last few months", "A year or more ago", "I don’t know if I’ve ever felt that"]
      ];

      document.addEventListener("DOMContentLoaded", () => {
        const form = document.getElementById("quizForm");
        questions.forEach((q, index) => {
          const div = document.createElement("div");
          div.innerHTML = `
            <h3 class="font-semibold mb-2">${index + 1}. ${q}</h3>
            <div class="space-y-2">
              ${options[index].map((opt, i) => `<label class="block"><input type="radio" name="q${index + 1}" value="${String.fromCharCode(65 + i)}" class="mr-2">${opt}</label>`).join('')}
            </div>
          `;
          form.insertBefore(div, form.lastElementChild);
        });

        form.addEventListener("submit", e => {
          e.preventDefault();
          let counts = { A: 0, B: 0, C: 0, D: 0 };
          for (let i = 1; i <= 10; i++) {
            const val = form[`q${i}`].value;
            if (val) counts[val]++;
          }
          const resultBox = document.getElementById("result");
          let resultText = "";
          const values = Object.values(counts);
          const max = Math.max(...values);
          const highest = Object.keys(counts).find(key => counts[key] === max);

          if (highest === 'A' || highest === 'B') {
            resultText = "You’re doing well overall, but staying attuned to your inner world will help you thrive even more.";
          } else if (highest === 'B' || highest === 'C') {
            resultText = "You’re managing, but some parts of you might be craving attention, support, or healing.";
          } else {
            resultText = "Your mind-body system could be in a prolonged stress or shutdown state. It’s time to pause, reflect, and reach out.";
          }
          resultBox.classList.remove("hidden");
          resultBox.querySelector("p").textContent = resultText;
        });
      });
    </script>
    <button type="submit" class="mt-6 bg-accent text-white font-semibold px-6 py-3 rounded-full hover:bg-primary transition">Submit</button>
  </form>

 <div id="result" class="hidden mt-12 p-6 rounded-md shadow-md bg-gradient-to-br from-blue-50 via-teal-50 to-green-50 border-l-4 border-accent relative overflow-hidden">
  
  <!-- Decorative Font Awesome Feather Icon -->
  <div class="absolute top-4 right-4 text-accent opacity-30 text-5xl transform rotate-12">
    <i class="fas fa-feather"></i>
  </div>

  <h2 class="text-xl font-semibold mb-2 text-accent">
    <i class="fas fa-peacock mr-2"></i> Your Wellbeing Snapshot
  </h2>

  <p class="text-gray-800 font-medium"></p>

  <div class="mt-4">
    <a href="/#team" class="bg-accent text-white font-semibold px-6 py-3 rounded-full inline-block hover:bg-primary transition">
      <i class="fas fa-calendar-check mr-2"></i>Book a Free Wellbeing Audit Call
    </a>
  </div>
</div>

</section>


<!--Testimonials-->
<?php include "includes/testimonials.php"; ?>


    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
    
    
    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="fixed bottom-8 right-8 bg-secondary text-white w-12 h-12 rounded-full shadow-lg hidden transition duration-300 hover:bg-blue-600">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="assets/script.js"></script>
</body>
</html>
