<!-- =========================
     KENSHO CHAT COMPANION
     ========================= -->

<style>
#kc-root {
  --kc-primary: #1B3592;
  --kc-secondary: #0F7EC3;
  --kc-accent: #678C25;
  --kc-ink: #1f2937;
  --kc-muted: #6b7280;
  --kc-bg: #f7f8fc;
  font-family: 'Nunito', 'Segoe UI', system-ui, -apple-system, sans-serif;
}

#kc-root *,
#kc-root *::before,
#kc-root *::after {
  box-sizing: border-box;
}

/* Launcher */
#kc-launcher {
  position: fixed;
  right: 32px;
  bottom: 100px;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  border: none;
  cursor: pointer;
  z-index: 9999;
  color: #fff;
  background: linear-gradient(145deg, var(--kc-primary), var(--kc-secondary));
  box-shadow: 0 12px 30px rgba(27, 53, 146, 0.35);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform 0.25s ease, box-shadow 0.25s ease;
}

#kc-launcher:hover {
  transform: translateY(-2px) scale(1.03);
  box-shadow: 0 16px 36px rgba(27, 53, 146, 0.45);
}

#kc-launcher:focus-visible {
  outline: 3px solid rgba(15, 126, 195, 0.45);
  outline-offset: 3px;
}

#kc-launcher svg {
  width: 26px;
  height: 26px;
  transition: transform 0.25s ease, opacity 0.2s ease;
}

#kc-launcher .kc-icon-close {
  position: absolute;
  opacity: 0;
  transform: rotate(-90deg) scale(0.6);
}

#kc-root.kc-open #kc-launcher .kc-icon-chat {
  opacity: 0;
  transform: rotate(90deg) scale(0.6);
}

#kc-root.kc-open #kc-launcher .kc-icon-close {
  opacity: 1;
  transform: rotate(0) scale(1);
}

#kc-launcher::after {
  content: '';
  position: absolute;
  inset: 0;
  border-radius: 50%;
  border: 2px solid rgba(15, 126, 195, 0.5);
  animation: kc-ring 2.8s ease-out infinite;
  pointer-events: none;
}

#kc-root.kc-open #kc-launcher::after,
#kc-root.kc-seen #kc-launcher::after {
  display: none;
}

@keyframes kc-ring {
  0% { transform: scale(1); opacity: 0.8; }
  70%, 100% { transform: scale(1.45); opacity: 0; }
}

/* Teaser bubble */
#kc-teaser {
  position: fixed;
  right: 104px;
  bottom: 110px;
  max-width: 230px;
  background: #fff;
  color: var(--kc-ink);
  font-size: 14px;
  line-height: 1.4;
  padding: 12px 34px 12px 14px;
  border-radius: 14px 14px 4px 14px;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.14);
  z-index: 9998;
  cursor: pointer;
  opacity: 0;
  transform: translateY(8px);
  pointer-events: none;
  transition: opacity 0.3s ease, transform 0.3s ease;
}

#kc-teaser.kc-show {
  opacity: 1;
  transform: translateY(0);
  pointer-events: auto;
}

#kc-teaser button {
  position: absolute;
  top: 6px;
  right: 6px;
  width: 22px;
  height: 22px;
  border: none;
  background: transparent;
  color: var(--kc-muted);
  font-size: 16px;
  line-height: 1;
  cursor: pointer;
  border-radius: 50%;
}

#kc-teaser button:hover {
  background: #f1f5f9;
}

/* Window */
#kc-window {
  position: fixed;
  right: 32px;
  bottom: 172px;
  width: 370px;
  height: min(580px, calc(100vh - 200px));
  background: #fff;
  border-radius: 20px;
  box-shadow: 0 24px 60px rgba(15, 23, 42, 0.22);
  z-index: 9999;
  display: flex;
  flex-direction: column;
  overflow: hidden;
  opacity: 0;
  visibility: hidden;
  transform: translateY(16px) scale(0.98);
  transform-origin: bottom right;
  transition: opacity 0.25s ease, transform 0.25s ease, visibility 0s linear 0.25s;
}

#kc-root.kc-open #kc-window {
  opacity: 1;
  visibility: visible;
  transform: translateY(0) scale(1);
  transition: opacity 0.25s ease, transform 0.25s ease;
}

.kc-header {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 16px 18px;
  color: #fff;
  background: linear-gradient(135deg, var(--kc-primary) 0%, #22479f 55%, var(--kc-secondary) 100%);
}

.kc-avatar {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  background: #fff;
  flex-shrink: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  position: relative;
}

.kc-avatar img {
  width: 34px;
  height: 34px;
  object-fit: contain;
}

.kc-avatar::after {
  content: '';
  position: absolute;
  right: 1px;
  bottom: 1px;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: #4ade80;
  border: 2px solid #fff;
}

.kc-title {
  flex: 1;
  min-width: 0;
}

.kc-title strong {
  display: block;
  font-size: 16px;
  font-weight: 700;
  letter-spacing: 0.2px;
}

.kc-title span {
  display: block;
  font-size: 12.5px;
  opacity: 0.85;
}

.kc-close {
  width: 34px;
  height: 34px;
  border: none;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.14);
  color: #fff;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background 0.2s ease;
}

.kc-close:hover {
  background: rgba(255, 255, 255, 0.26);
}

.kc-body {
  flex: 1;
  overflow-y: auto;
  padding: 18px 16px 8px;
  background: var(--kc-bg);
  scroll-behavior: smooth;
}

.kc-msg {
  display: flex;
  margin-bottom: 10px;
  animation: kc-in 0.3s ease both;
}

.kc-msg p {
  margin: 0;
  max-width: 82%;
  padding: 10px 14px;
  font-size: 14.5px;
  line-height: 1.5;
  white-space: pre-line;
  overflow-wrap: anywhere;
}

.kc-bot p {
  background: #fff;
  color: var(--kc-ink);
  border-radius: 4px 16px 16px 16px;
  box-shadow: 0 1px 3px rgba(15, 23, 42, 0.06);
}

.kc-user {
  justify-content: flex-end;
}

.kc-user p {
  background: var(--kc-primary);
  color: #fff;
  border-radius: 16px 4px 16px 16px;
}

@keyframes kc-in {
  from { opacity: 0; transform: translateY(6px); }
  to { opacity: 1; transform: translateY(0); }
}

.kc-typing p {
  display: inline-flex;
  gap: 4px;
  padding: 14px 16px;
}

.kc-typing i {
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #a5b4cf;
  animation: kc-dot 1.2s infinite ease-in-out;
}

.kc-typing i:nth-child(2) { animation-delay: 0.15s; }
.kc-typing i:nth-child(3) { animation-delay: 0.3s; }

@keyframes kc-dot {
  0%, 80%, 100% { transform: translateY(0); opacity: 0.5; }
  40% { transform: translateY(-4px); opacity: 1; }
}

.kc-options {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin: 4px 0 12px;
  animation: kc-in 0.3s ease both;
}

.kc-option {
  border: 1.5px solid rgba(27, 53, 146, 0.25);
  background: #fff;
  color: var(--kc-primary);
  padding: 8px 14px;
  border-radius: 999px;
  font-size: 13.5px;
  font-family: inherit;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.2s ease, border-color 0.2s ease, color 0.2s ease, transform 0.15s ease;
}

.kc-option:hover {
  border-color: var(--kc-primary);
  background: #eef2ff;
  transform: translateY(-1px);
}

.kc-cta {
  display: flex;
  flex-direction: column;
  gap: 8px;
  margin: 6px 0 14px;
  animation: kc-in 0.3s ease both;
}

.kc-cta a,
.kc-cta button {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  width: 100%;
  padding: 12px 16px;
  border-radius: 12px;
  font-size: 14.5px;
  font-weight: 700;
  font-family: inherit;
  text-decoration: none;
  cursor: pointer;
  border: none;
  transition: transform 0.15s ease, box-shadow 0.2s ease, background 0.2s ease;
}

.kc-cta .kc-primary {
  color: #fff;
  background: linear-gradient(135deg, var(--kc-accent), #7ea530);
  box-shadow: 0 8px 20px rgba(103, 140, 37, 0.3);
}

.kc-cta .kc-primary:hover {
  transform: translateY(-1px);
  box-shadow: 0 12px 26px rgba(103, 140, 37, 0.38);
}

.kc-cta .kc-secondary {
  color: var(--kc-primary);
  background: #fff;
  border: 1.5px solid rgba(27, 53, 146, 0.2);
}

.kc-cta .kc-secondary:hover {
  background: #eef2ff;
}

.kc-cta .kc-link {
  background: none;
  color: var(--kc-muted);
  font-weight: 600;
  font-size: 13px;
  padding: 6px;
}

.kc-cta .kc-link:hover {
  color: var(--kc-primary);
}

.kc-cta svg {
  width: 18px;
  height: 18px;
  flex-shrink: 0;
}

.kc-footer {
  border-top: 1px solid #eef0f5;
  background: #fff;
  padding: 10px 12px 8px;
}

.kc-form {
  display: flex;
  gap: 8px;
}

.kc-form[hidden] {
  display: none;
}

.kc-form input {
  flex: 1;
  min-width: 0;
  border: 1.5px solid #e2e8f0;
  border-radius: 12px;
  padding: 11px 14px;
  font-size: 16px;
  font-family: inherit;
  color: var(--kc-ink);
  outline: none;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.kc-form input:focus {
  border-color: var(--kc-secondary);
  box-shadow: 0 0 0 3px rgba(15, 126, 195, 0.12);
}

.kc-form input.kc-invalid {
  border-color: #e11d48;
}

.kc-form button {
  width: 46px;
  flex-shrink: 0;
  border: none;
  border-radius: 12px;
  background: var(--kc-primary);
  color: #fff;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background 0.2s ease;
}

.kc-form button:hover {
  background: var(--kc-secondary);
}

.kc-form button svg {
  width: 18px;
  height: 18px;
}

.kc-safety {
  margin: 8px 2px 0;
  font-size: 11.5px;
  line-height: 1.4;
  color: var(--kc-muted);
  text-align: center;
}

.kc-safety a {
  color: var(--kc-primary);
  font-weight: 700;
  text-decoration: none;
}

@media (max-width: 480px) {
  #kc-launcher {
    right: 16px;
    bottom: 92px;
    width: 56px;
    height: 56px;
  }

  #kc-teaser {
    right: 84px;
    bottom: 100px;
    max-width: calc(100vw - 110px);
  }

  #kc-window {
    right: 10px;
    left: 10px;
    bottom: 160px;
    width: auto;
    height: calc(100dvh - 180px);
    max-height: 620px;
    border-radius: 18px;
  }
}

@media (prefers-reduced-motion: reduce) {
  #kc-root *,
  #kc-launcher::after {
    animation: none !important;
    transition: none !important;
  }
}
</style>

<div id="kc-root">
  <div id="kc-teaser" role="status">
    Need someone to talk to? I'm here to help you find support.
    <button type="button" aria-label="Dismiss">&times;</button>
  </div>

  <button id="kc-launcher" type="button" aria-label="Open chat" aria-expanded="false" aria-controls="kc-window">
    <svg class="kc-icon-chat" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
      <path d="M21 12a8.5 8.5 0 0 1-12.4 7.6L3 21l1.4-5.1A8.5 8.5 0 1 1 21 12z"/>
      <path d="M8.5 11.5h.01M12 11.5h.01M15.5 11.5h.01" stroke-width="2.6"/>
    </svg>
    <svg class="kc-icon-close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
      <path d="M6 6l12 12M18 6L6 18"/>
    </svg>
  </button>

  <section id="kc-window" role="dialog" aria-label="Kensho Project chat" aria-hidden="true">
    <header class="kc-header">
      <div class="kc-avatar"><img src="/assets/img/logo.png" alt=""></div>
      <div class="kc-title">
        <strong>Kensho Companion</strong>
        <span>A gentle first step towards support</span>
      </div>
      <button class="kc-close" type="button" aria-label="Close chat">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
      </button>
    </header>

    <div class="kc-body" id="kc-body" aria-live="polite"></div>

    <footer class="kc-footer">
      <form class="kc-form" id="kc-form" hidden novalidate>
        <input id="kc-input" type="text" autocomplete="off" aria-label="Your reply">
        <button type="submit" aria-label="Send">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </button>
      </form>
      <p class="kc-safety">In crisis or feeling unsafe? Call Tele-MANAS <a href="tel:14416">14416</a> (free, 24&times;7).</p>
    </footer>
  </section>
</div>

<script>
(function () {
  const BOOKING_URL = 'https://kensho-project.setmore.com/cauviya-madhiyazhagan';
  const WHATSAPP_URL = 'https://wa.me/918754668234';

  const CONCERNS = [
    { label: 'Anxiety or stress', reply: "Living with constant worry can be exhausting. You don't have to carry it alone." },
    { label: 'Feeling low or stuck', reply: 'Feeling low or stuck is more common than you might think, and it can change.' },
    { label: 'Relationship challenges', reply: 'Relationships shape so much of how we feel. It makes sense to want support here.' },
    { label: 'Healing from past experiences', reply: 'Thank you for trusting me with that. Healing is possible, gently and at your own pace.' },
    { label: 'Burnout or work-life balance', reply: 'Running on empty takes a real toll. Let\'s find a way to help you breathe again.' },
    { label: 'Just exploring', reply: "That's perfectly okay. Curiosity is a wonderful place to begin." }
  ];
  const DURATIONS = ['Just recently', 'A few months', 'A year or longer'];
  const THERAPY = ['Yes, I have', "No, this would be my first time", "I'm not sure"];

  const root = document.getElementById('kc-root');
  if (!root) return;
  const launcher = document.getElementById('kc-launcher');
  const win = document.getElementById('kc-window');
  const body = document.getElementById('kc-body');
  const form = document.getElementById('kc-form');
  const input = document.getElementById('kc-input');
  const teaser = document.getElementById('kc-teaser');

  const lead = { name: '', email: '', concern: '', duration: '', therapy: '' };
  let started = false;
  let leadSent = false;
  let onSubmit = null;

  const wait = (ms) => new Promise((r) => setTimeout(r, ms));

  function scrollDown() {
    body.scrollTop = body.scrollHeight;
  }

  function addMessage(text, who) {
    const row = document.createElement('div');
    row.className = 'kc-msg kc-' + who;
    const p = document.createElement('p');
    p.textContent = text;
    row.appendChild(p);
    body.appendChild(row);
    scrollDown();
    return row;
  }

  async function botSay(text, delay) {
    const typing = document.createElement('div');
    typing.className = 'kc-msg kc-bot kc-typing';
    typing.innerHTML = '<p><i></i><i></i><i></i></p>';
    body.appendChild(typing);
    scrollDown();
    await wait(delay || Math.min(1400, 450 + text.length * 12));
    typing.remove();
    addMessage(text, 'bot');
  }

  function askText(placeholder, type, handler) {
    input.value = '';
    input.type = type;
    input.placeholder = placeholder;
    input.autocomplete = type === 'email' ? 'email' : 'given-name';
    input.classList.remove('kc-invalid');
    form.hidden = false;
    onSubmit = handler;
    setTimeout(() => input.focus(), 50);
  }

  function hideInput() {
    form.hidden = true;
    onSubmit = null;
  }

  function askOptions(options) {
    return new Promise((resolve) => {
      const wrap = document.createElement('div');
      wrap.className = 'kc-options';
      options.forEach((label) => {
        const b = document.createElement('button');
        b.type = 'button';
        b.className = 'kc-option';
        b.textContent = label;
        b.addEventListener('click', () => {
          wrap.remove();
          addMessage(label, 'user');
          resolve(label);
        });
        wrap.appendChild(b);
      });
      body.appendChild(wrap);
      scrollDown();
    });
  }

  function sendLead() {
    if (leadSent || !lead.email) return;
    leadSent = true;
    fetch('/chatbot_lead.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(Object.assign({ source: 'Website Chatbot', page: location.pathname }, lead))
    }).catch(() => {});
  }

  function icon(path) {
    return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' + path + '</svg>';
  }

  function showBookingActions() {
    const wrap = document.createElement('div');
    wrap.className = 'kc-cta';

    const book = document.createElement('a');
    book.className = 'kc-primary';
    book.href = BOOKING_URL;
    book.target = '_blank';
    book.rel = 'noopener noreferrer';
    book.innerHTML = icon('<rect x="3" y="4.5" width="18" height="16" rx="2.5"/><path d="M3 9.5h18M8 3v3M16 3v3"/>') + '<span>Book a session with Cauviya</span>';

    const wa = document.createElement('a');
    wa.className = 'kc-secondary';
    wa.href = WHATSAPP_URL;
    wa.target = '_blank';
    wa.rel = 'noopener noreferrer';
    wa.innerHTML = icon('<path d="M21 12a8.5 8.5 0 0 1-12.4 7.6L3 21l1.4-5.1A8.5 8.5 0 1 1 21 12z"/>') + '<span>Prefer to chat? Message us on WhatsApp</span>';

    const restart = document.createElement('button');
    restart.type = 'button';
    restart.className = 'kc-link';
    restart.textContent = 'Start over';
    restart.addEventListener('click', restartChat);

    wrap.append(book, wa, restart);
    body.appendChild(wrap);
    scrollDown();
  }

  async function runConversation() {
    await botSay("Hello, and welcome to Kensho Project. 🌿", 700);
    await botSay("This is a calm, private space. I'll ask a few gentle questions so we can point you to the right support.");
    await botSay('May I know your first name?');
    askText('Your first name', 'text', handleName);
  }

  async function handleName(value) {
    const name = value.trim().replace(/\s+/g, ' ').slice(0, 60);
    if (!name) return false;
    lead.name = name;
    hideInput();
    addMessage(name, 'user');
    await botSay('Lovely to meet you, ' + name + '.');
    await botSay("What's the best email to reach you? We'll only use it to follow up on your enquiry.");
    askText('you@example.com', 'email', handleEmail);
    return true;
  }

  async function handleEmail(value) {
    const email = value.trim();
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(email)) {
      input.classList.add('kc-invalid');
      input.setAttribute('aria-invalid', 'true');
      return false;
    }
    lead.email = email;
    input.removeAttribute('aria-invalid');
    hideInput();
    addMessage(email, 'user');
    await askQuestions();
    return true;
  }

  async function askQuestions() {
    await botSay('Thank you, ' + lead.name + '. What brings you here today?');
    const concern = await askOptions(CONCERNS.map((c) => c.label));
    lead.concern = concern;
    await botSay(CONCERNS.find((c) => c.label === concern).reply);

    await botSay('How long has this been on your mind?');
    lead.duration = await askOptions(DURATIONS);

    await botSay('Have you worked with a therapist before?');
    lead.therapy = await askOptions(THERAPY);

    sendLead();

    await botSay('Thank you for sharing that with me, ' + lead.name + '. Reaching out is a meaningful first step.');
    await botSay(
      lead.therapy.indexOf('first time') !== -1
        ? "Your first session is simply a conversation: a safe, unhurried space to talk about what you're carrying, with no pressure."
        : "Cauviya offers trauma-informed 1:1 sessions, a safe space to explore what you're carrying at your own pace."
    );
    await botSay('You can pick a time that suits you below.', 600);
    showBookingActions();
  }

  function restartChat() {
    body.innerHTML = '';
    Object.keys(lead).forEach((k) => { lead[k] = ''; });
    leadSent = false;
    hideInput();
    runConversation();
  }

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    if (!onSubmit) return;
    const handler = onSubmit;
    onSubmit = null;
    const ok = await handler(input.value);
    if (ok === false) {
      onSubmit = handler;
      input.focus();
    }
  });

  input.addEventListener('input', () => input.classList.remove('kc-invalid'));

  function hideTeaser() {
    teaser.classList.remove('kc-show');
    try { sessionStorage.setItem('kc-teaser-seen', '1'); } catch (e) {}
  }

  function setOpen(open) {
    root.classList.toggle('kc-open', open);
    launcher.setAttribute('aria-expanded', String(open));
    launcher.setAttribute('aria-label', open ? 'Close chat' : 'Open chat');
    win.setAttribute('aria-hidden', String(!open));
    if (open) {
      root.classList.add('kc-seen');
      hideTeaser();
      if (!started) {
        started = true;
        runConversation();
      } else if (!form.hidden) {
        setTimeout(() => input.focus(), 250);
      }
    }
  }

  launcher.addEventListener('click', () => setOpen(!root.classList.contains('kc-open')));
  win.querySelector('.kc-close').addEventListener('click', () => {
    setOpen(false);
    launcher.focus();
  });
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && root.classList.contains('kc-open')) setOpen(false);
  });

  teaser.addEventListener('click', (e) => {
    if (e.target.closest('button')) {
      e.stopPropagation();
      hideTeaser();
      return;
    }
    setOpen(true);
  });

  let teaserSeen = false;
  try { teaserSeen = sessionStorage.getItem('kc-teaser-seen') === '1'; } catch (e) {}
  if (!teaserSeen) {
    setTimeout(() => {
      if (!root.classList.contains('kc-open')) teaser.classList.add('kc-show');
    }, 6000);
  }
})();
</script>
