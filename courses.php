<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Courses Coming Soon</title>
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body, html {
      height: 100%;
      overflow: hidden;
      background: linear-gradient(135deg, #1B3592, #0F7EC3);
      color: white;
      position: relative;
    }

    /* Floating peacock feathers */
    .feather {
      position: absolute;
      width: 60px;
      height: 60px;
      background: radial-gradient(circle at 30% 30%, rgba(103,140,37,0.6), rgba(15,126,195,0.1));
      border-radius: 50%;
      animation: float 10s infinite ease-in-out;
      opacity: 0.3;
      z-index: 0;
      pointer-events: none; /* feathers don't block clicks */
    }

    @keyframes float {
      0% { transform: translateY(0) rotate(0deg); }
      50% { transform: translateY(-50px) rotate(15deg); }
      100% { transform: translateY(0) rotate(0deg); }
    }

    #app {
      position: relative;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      height: 100%;
      padding: 20px;
      z-index: 1;
      animation: fadeIn 1.5s ease forwards;
    }

    h1 {
      font-size: 3rem;
      margin-bottom: 20px;
      opacity: 0;
      transform: translateY(-20px);
      animation: slideDown 1s forwards 0.5s;
    }

    p {
      font-size: 1.2rem;
      margin-bottom: 40px;
      max-width: 500px;
      opacity: 0;
      transform: translateY(-10px);
      animation: slideDown 1s forwards 1s;
    }

    /* Email form */
    .email-form {
      display: flex;
      justify-content: center;
      flex-direction: row;
      max-width: 450px;
      width: 100%;
      border-radius: 50px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0,0,0,0.3);
      opacity: 0;
      animation: slideUp 1s forwards 1.5s;
    }

    .email-form input[type="email"] {
      flex: 1;
      padding: 15px 20px;
      border: none;
      outline: none;
      font-size: 1rem;
      height: 50px;
    }

    .email-form button {
      background-color: #678C25;
      color: white;
      padding: 0 25px;
      border: none;
      cursor: pointer;
      font-size: 1rem;
      height: 50px;
      transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .email-form button:hover {
      background-color: #5a7a1e;
      transform: scale(1.05);
    }

    @media(min-width: 501px) {
      .email-form input[type="email"] {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
      }
      .email-form button {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
      }
    }

    @media (max-width: 500px) {
      .email-form {
        flex-direction: column;
        align-items: center;
      }
      .email-form input[type="email"], .email-form button {
        width: 90%;
        margin: 5px 0;
        border-radius: 50px;
      }
      .email-form button {
        padding: 15px 0;
      }
    }

    .success-message {
      margin-top: 20px;
      color: #FFEB3B;
      font-weight: bold;
      opacity: 0;
      animation: fadeIn 1s forwards 0.5s;
    }

    /* Go Back link spacing */
    .go-back {
      margin-top: 3rem; /* larger top margin */
      z-index: 10;
    }

    @keyframes fadeIn { from {opacity:0;} to {opacity:1;} }
    @keyframes slideDown { from {opacity:0; transform:translateY(-20px);} to {opacity:1; transform:translateY(0);} }
    @keyframes slideUp { from {opacity:0; transform:translateY(20px);} to {opacity:1; transform:translateY(0);} }
  </style>
</head>
<body>

  <!-- App -->
  <div id="app">
    <h1>Courses Coming Soon!</h1>
    <p>Get ready for amazing courses inspired by nature and creativity. Enter your email below to stay updated!</p>
    
    <form @submit.prevent="submitEmail" class="email-form">
      <input type="email" placeholder="Enter your email" v-model="email" required>
      <button type="submit">Notify Me</button>
    </form>

    <p v-if="message" class="success-message">{{ message }}</p>

    <!-- Go Back Link -->
    <div class="go-back">
      <a href="/" class="text-[#FFEB3B] font-semibold hover:underline inline-block">
        ← Go Back to Home
      </a>
    </div>
  </div>

  <!-- Vue JS -->
  <script>
    const { createApp } = Vue;

    createApp({
      data() {
        return {
          email: '',
          message: ''
        }
      },
      mounted() {
        // create multiple floating feather divs
        const body = document.body;
        for(let i=0; i<15; i++){
          const feather = document.createElement('div');
          feather.className = 'feather';
          feather.style.left = Math.random()*100 + 'vw';
          feather.style.top = Math.random()*100 + 'vh';
          feather.style.width = 30 + Math.random()*50 + 'px';
          feather.style.height = 30 + Math.random()*50 + 'px';
          feather.style.animationDuration = 8 + Math.random()*7 + 's';
          feather.style.opacity = 0.2 + Math.random()*0.3;
          body.appendChild(feather);
        }
      },
      methods: {
        submitEmail() {
          if(!this.email) return;

          fetch('submit-email.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ email: this.email })
          })
          .then(res => res.text())
          .then(data => {
            this.message = data;
            this.email = '';
          })
          .catch(() => {
            this.message = 'Something went wrong. Please try again.';
          });
        }
      }
    }).mount('#app');
  </script>
</body>
</html>
