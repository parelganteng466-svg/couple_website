<?php
$data = json_decode(file_get_contents(__DIR__ . '/data.json'), true);
$photos = $data['photos'] ?? [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($data['nama1']) ?> & <?= htmlspecialchars($data['nama2']) ?> 🌸</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Nunito:wght@300;400;600;700;800&display=swap');

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --pink: #e07090;
  --pink-light: #ffb3c6;
  --dark: #0a0a0a;
  --dark2: #0f0f0f;
  --dark3: #111;
  --border: #222;
  --text-muted: #666;
  --text-dim: #444;
}

html { scroll-behavior: smooth; }

body {
  font-family: 'Nunito', sans-serif;
  background: var(--dark);
  color: #fff;
  overflow-x: hidden;
}

/* ─── HERO ─── */
.hero {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 2rem;
  position: relative;
  background: radial-gradient(ellipse at 50% 65%, #1a0a1a 0%, var(--dark) 70%);
}

.floating-hearts {
  position: absolute;
  inset: 0;
  pointer-events: none;
  overflow: hidden;
}

.fh {
  position: absolute;
  font-size: 16px;
  opacity: 0;
  animation: floatUp linear infinite;
}

@keyframes floatUp {
  0%   { transform: translateY(100vh) rotate(-15deg); opacity: 0; }
  10%  { opacity: 0.12; }
  90%  { opacity: 0.08; }
  100% { transform: translateY(-50px) rotate(15deg); opacity: 0; }
}

.hero-tag {
  font-size: 10px;
  letter-spacing: .35em;
  text-transform: uppercase;
  color: var(--pink);
  margin-bottom: 1.5rem;
  opacity: 0;
  animation: fadeUp .8s ease .3s forwards;
}

.hero-title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(52px, 12vw, 108px);
  font-weight: 700;
  line-height: 1;
  margin-bottom: 1.25rem;
  opacity: 0;
  animation: fadeUp .8s ease .5s forwards;
}

.n1 { color: #fff; }
.amp { color: var(--pink); font-style: italic; display: block; font-size: .7em; }
.n2 { color: var(--pink-light); }

.hero-sub {
  font-size: 12px;
  color: var(--text-muted);
  letter-spacing: .1em;
  margin-bottom: 3rem;
  opacity: 0;
  animation: fadeUp .8s ease .7s forwards;
}

.hero-hearts {
  font-size: 24px;
  letter-spacing: 12px;
  opacity: 0;
  animation: fadeUp .8s ease .9s forwards;
}

.scroll-hint {
  position: absolute;
  bottom: 2rem;
  left: 50%;
  transform: translateX(-50%);
  font-size: 10px;
  letter-spacing: .25em;
  color: #333;
  text-transform: uppercase;
  animation: bounce 2.2s ease-in-out infinite;
}

@keyframes fadeUp {
  from { opacity: 0; transform: translateY(20px); }
  to   { opacity: 1; transform: translateY(0); }
}
@keyframes bounce {
  0%, 100% { transform: translateX(-50%) translateY(0); }
  50%       { transform: translateX(-50%) translateY(-8px); }
}

/* ─── GALLERY ─── */
.gallery-section {
  padding: 5rem 1.5rem;
  max-width: 1100px;
  margin: 0 auto;
}

.sec-header {
  text-align: center;
  margin-bottom: 3rem;
}

.sec-label {
  font-size: 10px;
  letter-spacing: .3em;
  text-transform: uppercase;
  color: var(--pink);
  margin-bottom: .6rem;
}

.sec-title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(28px, 5vw, 44px);
  font-weight: 700;
  color: #fff;
}

.gallery-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
}

.g-item {
  position: relative;
  border-radius: 14px;
  overflow: hidden;
  aspect-ratio: 3/4;
  cursor: pointer;
  background: var(--dark3);
}

.g-item:nth-child(3n+1) { grid-column: span 2; aspect-ratio: 16/9; }

.g-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform .5s ease;
  display: block;
}

.g-item:hover img { transform: scale(1.07); }

.g-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(0,0,0,.6) 0%, transparent 55%);
  opacity: 0;
  transition: opacity .3s;
  display: flex;
  align-items: flex-end;
  padding: 1rem;
}

.g-item:hover .g-overlay { opacity: 1; }

.no-photo {
  text-align: center;
  padding: 4rem 2rem;
  color: #333;
  font-size: 14px;
  grid-column: span 3;
}

/* ─── QUOTE ─── */
.quote-section {
  padding: 6rem 2rem;
  text-align: center;
  background: var(--dark2);
  border-top: 1px solid #181818;
  border-bottom: 1px solid #181818;
}

.big-quote {
  font-family: 'Playfair Display', serif;
  font-size: clamp(18px, 3.5vw, 30px);
  font-style: italic;
  color: var(--pink-light);
  max-width: 720px;
  margin: 0 auto 1.5rem;
  line-height: 1.6;
}

.quote-attr {
  font-size: 11px;
  color: #444;
  letter-spacing: .2em;
  text-transform: uppercase;
}

/* ─── ABOUT ─── */
.about-section {
  padding: 5rem 2rem;
  max-width: 900px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 2rem;
}

.about-card {
  background: var(--dark3);
  border: 1px solid var(--border);
  border-radius: 18px;
  padding: 2.25rem 2rem;
  text-align: center;
}

.avatar {
  width: 72px;
  height: 72px;
  border-radius: 50%;
  border: 2px solid var(--pink);
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Playfair Display', serif;
  font-size: 24px;
  font-weight: 700;
  color: var(--pink);
  margin: 0 auto 1rem;
  background: #1a0a14;
}

.avatar.z { border-color: var(--pink-light); color: var(--pink-light); }

.about-name {
  font-family: 'Playfair Display', serif;
  font-size: 22px;
  font-weight: 700;
  color: #fff;
  margin-bottom: .3rem;
}

.about-nick {
  font-size: 11px;
  color: var(--pink);
  letter-spacing: .08em;
  margin-bottom: 1rem;
}

.about-line { width: 28px; height: 1px; background: #2a2a2a; margin: .9rem auto; }

.about-desc { font-size: 13px; color: #777; line-height: 1.85; }

/* ─── CLOSING ─── */
.closing-section {
  padding: 6rem 2rem;
  text-align: center;
  background: radial-gradient(ellipse at 50% 100%, #1a0a1a 0%, var(--dark) 65%);
}

.closing-emoji { font-size: 48px; display: block; margin-bottom: 1.5rem; }

.closing-title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(24px, 5vw, 42px);
  font-weight: 700;
  color: var(--pink-light);
  margin-bottom: 1rem;
}

.closing-text {
  font-size: 14px;
  color: #666;
  max-width: 500px;
  margin: 0 auto 2rem;
  line-height: 1.9;
}

.closing-names {
  font-family: 'Playfair Display', serif;
  font-size: 18px;
  color: var(--pink);
}

/* ─── FOOTER ─── */
footer {
  padding: 1.5rem;
  text-align: center;
  font-size: 11px;
  color: #2a2a2a;
  letter-spacing: .1em;
  border-top: 1px solid #111;
}

/* ─── LIGHTBOX ─── */
.lightbox {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,.94);
  z-index: 999;
  align-items: center;
  justify-content: center;
}

.lightbox.on { display: flex; }

.lightbox img {
  max-width: 90vw;
  max-height: 90vh;
  border-radius: 10px;
  object-fit: contain;
}

.lb-close {
  position: absolute;
  top: 1.5rem;
  right: 1.75rem;
  background: none;
  border: none;
  color: #fff;
  font-size: 30px;
  cursor: pointer;
  line-height: 1;
}

/* ─── RESPONSIVE ─── */
@media (max-width: 640px) {
  .gallery-grid { grid-template-columns: repeat(2, 1fr); }
  .g-item:nth-child(3n+1) { grid-column: span 2; aspect-ratio: 4/3; }
  .about-section { grid-template-columns: 1fr; }
}
</style>
</head>
<body>

<!-- HERO -->
<section class="hero">
  <div class="floating-hearts" id="fh"></div>
  <div class="hero-tag">Our Story ✦ <?= htmlspecialchars($data['nama1']) ?> &amp; <?= htmlspecialchars($data['nama2']) ?></div>
  <h1 class="hero-title">
    <span class="n1"><?= htmlspecialchars($data['nama1']) ?></span>
    <span class="amp">&</span>
    <span class="n2"><?= htmlspecialchars($data['nama2']) ?></span>
  </h1>
  <div class="hero-sub"><?= htmlspecialchars($data['nickname1']) ?> &nbsp;✦&nbsp; <?= htmlspecialchars($data['nickname2']) ?></div>
  <div class="hero-hearts">🌸 💕 🌸</div>
  <div class="scroll-hint">↓ scroll ↓</div>
</section>

<!-- GALLERY -->
<section class="gallery-section">
  <div class="sec-header">
    <div class="sec-label">Momen Kita</div>
    <h2 class="sec-title">Kenangan Bareng 📸</h2>
  </div>
  <div class="gallery-grid">
    <?php if (empty($photos)): ?>
      <div class="no-photo">Belum ada foto. Upload di <a href="admin/" style="color:#e07090;">halaman admin</a> ya!</div>
    <?php else: ?>
      <?php foreach ($photos as $i => $photo): ?>
        <div class="g-item" onclick="openLB('uploads/<?= htmlspecialchars($photo) ?>')">
          <img src="uploads/<?= htmlspecialchars($photo) ?>" alt="Foto <?= $i+1 ?>" loading="lazy">
          <div class="g-overlay"></div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<!-- QUOTE -->
<section class="quote-section">
  <div class="big-quote">"<?= htmlspecialchars($data['quote']) ?>"</div>
  <div class="quote-attr">— <?= htmlspecialchars($data['quote_attr']) ?> 🌸</div>
</section>

<!-- ABOUT -->
<section class="about-section">
  <div class="about-card">
    <div class="avatar"><?= strtoupper(substr($data['nama1'], 0, 2)) ?></div>
    <div class="about-name"><?= htmlspecialchars($data['nama1']) ?></div>
    <div class="about-nick"><?= htmlspecialchars($data['nickname1']) ?></div>
    <div class="about-line"></div>
    <div class="about-desc"><?= htmlspecialchars($data['desc1']) ?></div>
  </div>
  <div class="about-card">
    <div class="avatar z"><?= strtoupper(substr($data['nama2'], 0, 2)) ?></div>
    <div class="about-name"><?= htmlspecialchars($data['nama2']) ?></div>
    <div class="about-nick"><?= htmlspecialchars($data['nickname2']) ?></div>
    <div class="about-line"></div>
    <div class="about-desc"><?= htmlspecialchars($data['desc2']) ?></div>
  </div>
</section>

<!-- CLOSING -->
<section class="closing-section">
  <span class="closing-emoji">💌</span>
  <h2 class="closing-title"><?= htmlspecialchars($data['closing_title']) ?></h2>
  <p class="closing-text"><?= htmlspecialchars($data['closing_text']) ?></p>
  <div class="closing-names"><?= htmlspecialchars($data['nama1']) ?> 🌸 <?= htmlspecialchars($data['nama2']) ?></div>
</section>

<footer><?= htmlspecialchars($data['footer_text']) ?></footer>

<!-- LIGHTBOX -->
<div class="lightbox" id="lb" onclick="closeLB()">
  <button class="lb-close">✕</button>
  <img id="lbImg" src="" alt="">
</div>

<script>
// Floating hearts
const fh = document.getElementById('fh');
['🌸','💕','💖','🌺','💝','✨'].forEach((e, i) => {
  for (let j = 0; j < 3; j++) {
    const el = document.createElement('div');
    el.className = 'fh';
    el.textContent = e;
    el.style.left = (Math.random() * 100) + '%';
    el.style.animationDuration = (7 + Math.random() * 9) + 's';
    el.style.animationDelay = (Math.random() * 10) + 's';
    el.style.fontSize = (12 + Math.random() * 14) + 'px';
    fh.appendChild(el);
  }
});

// Lightbox
function openLB(src) {
  document.getElementById('lbImg').src = src;
  document.getElementById('lb').classList.add('on');
}
function closeLB() {
  document.getElementById('lb').classList.remove('on');
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLB(); });
</script>
</body>
</html>
