<footer class="bg-gray-900 text-gray-300 py-12 px-4">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <p class="text-gray-600 font-bold text-xl tracking-wide uppercase pb-4">Kensho Project</p>
                <p class="mb-4">
                    Fostering lasting change by nurturing mental wellness and emotional resilience through collective care.
                </p>
                <div class="flex space-x-4">
                    <a href="https://www.instagram.com/kensho.project?igsh=bnphNHB6N3hmdWwy" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/kensho-project/" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-white font-bold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="/#home" class="hover:text-white transition duration-300">Home</a></li>
                    <li><a href="/#about" class="hover:text-white transition duration-300">About Us</a></li>
                    <li><a href="/services" class="hover:text-white transition duration-300">Services</a></li>
                    <li><a href="/courses" class="hover:text-white transition duration-300">Courses</a></li>
                    <li><a href="/#team" class="hover:text-white transition duration-300">Team</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold mb-4">Programs</h4>
                <ul class="space-y-2">
                    <li><a href="https://kensho-project.setmore.com/#our-team" class="hover:text-white transition duration-300">1:1 therapy</a></li>
                    <li><a href="https://kensho-project.setmore.com/#our-team" class="hover:text-white transition duration-300">Art Therapy</a></li>
                    <li><a href="https://kensho-project.setmore.com/#our-team" class="hover:text-white transition duration-300">Couple Counselling</a></li>
                    <li><a href="https://kensho-project.setmore.com/#our-team" class="hover:text-white transition duration-300">Somatic Healing Sessions</a></li>
                    <li><a href="https://kensho-project.setmore.com/#our-team" class="hover:text-white transition duration-300">Group Counselling</a></li>
                    <li><a href="https://kensho-project.setmore.com/#our-team" class="hover:text-white transition duration-300">Workshops & Retreats</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold mb-4">Contact</h4>
                <ul class="space-y-2">
                    <li>
                        <a href="mailto:contact@kenshoproject.com" class="hover:text-white transition duration-300">
                            <i class="fas fa-envelope"></i> contact@kenshoproject.com
                        </a>
                    </li>
                    <li>
                        <a href="tel:+919080565434" class="hover:text-white transition duration-300">
                            <i class="fas fa-phone-alt"></i> +91 87546 68234
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-12 pt-8 text-center">
            <p>© 2025 Kensho Project. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- =========================
     KENSHO INTERACTIVE CHATBOT
     ========================= -->

<style>
/* CHAT ICON */
#kensho-chat-btn {
  position: fixed;
  bottom: 100px;
  right: 32px;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background: linear-gradient(135deg, #0f766e, #1e3a8a);
  color: #ffffff;
  font-size: 26px;
  border: none;
  cursor: pointer;
  z-index: 9999;
  box-shadow: 0 10px 30px rgba(15, 118, 110, 0.35);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

#kensho-chat-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 14px 36px rgba(15, 118, 110, 0.45);
}

/* CHAT BOX */
#kensho-chat-box {
  position: fixed;
  bottom: 170px;
  right: 32px;
  width: 92%;
  max-width: 320px;
  background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
  border-radius: 16px;
  box-shadow: 0 18px 45px rgba(30, 58, 138, 0.25);
  padding: 16px;
  display: none;
  z-index: 9999;
  animation: fadeUp 0.25s ease;
}

@keyframes fadeUp {
  from { opacity: 0; transform: translateY(10px); }
  to   { opacity: 1; transform: translateY(0); }
}

#kensho-chat-box p {
  font-size: 14px;
  line-height: 1.45;
  color: #1f2937;
  margin-bottom: 12px;
}

/* INPUT */
.kensho-input {
  width: 100%;
  padding: 9px 10px;
  margin-bottom: 10px;
  border-radius: 8px;
  border: 1px solid #cbd5e1;
  font-size: 13px;
  background-color: #ffffff;
}

.kensho-input:focus {
  outline: none;
  border-color: #0f766e;
  box-shadow: 0 0 0 2px rgba(15, 118, 110, 0.15);
}

/* BUTTONS */
.kensho-btn {
  width: 100%;
  padding: 10px;
  margin-bottom: 8px;
  border: none;
  border-radius: 10px;
  font-size: 13px;
  font-weight: 600;
  cursor: pointer;
  background: linear-gradient(135deg, #0f766e, #14b8a6);
  color: #ffffff;
  transition: transform 0.15s ease, box-shadow 0.15s ease, opacity 0.15s ease;
}

.kensho-btn:hover {
  transform: translateY(-1px);
  box-shadow: 0 8px 20px rgba(20, 184, 166, 0.35);
  opacity: 0.95;
}

/* MOBILE */
@media (max-width: 480px) {
  #kensho-chat-box {
    right: 16px;
    bottom: 160px;
  }
  #kensho-chat-btn {
    right: 16px;
    bottom: 96px;
  }
}
</style>

<button id="kensho-chat-btn">🦚</button>

<div id="kensho-chat-box">
  <p id="chat-text">Hi 👋 What’s your name?</p>
  <input id="chat-input" class="kensho-input" placeholder="Your name" />
  <button class="kensho-btn" onclick="nextStep()">Continue</button>
</div>

<script>
let step = 1;
let userName = "";
let userEmail = "";

const chatBtn = document.getElementById("kensho-chat-btn");
const chatBox = document.getElementById("kensho-chat-box");
const chatText = document.getElementById("chat-text");
const chatInput = document.getElementById("chat-input");

chatBtn.onclick = () => {
  chatBox.style.display = chatBox.style.display === "block" ? "none" : "block";
};

function nextStep() {
  if (step === 1) {
    userName = chatInput.value.trim();
    if (!userName) return;
    chatText.textContent = `Thanks ${userName}! What’s your email?`;
    chatInput.value = "";
    chatInput.placeholder = "Your email";
    step++;
  } 
  else if (step === 2) {
    userEmail = chatInput.value.trim();
    if (!userEmail.includes("@")) return;

    fetch("/chatbot_lead.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        name: userName,
        email: userEmail,
        source: "Website Chatbot"
      })
    });

    chatBox.innerHTML = `
      <p>Thank you ${userName}! How can I help you next?</p>
      <button class="kensho-btn" onclick="window.open('https://kensho-project.setmore.com/', '_blank')">📅 Book a Session</button>
      <button class="kensho-btn" onclick="window.open('https://wa.me/918754668234','_blank')">💬 Chat on WhatsApp</button>
    `;
  }
}
</script>
