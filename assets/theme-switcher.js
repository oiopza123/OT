(function () {
  const themeLink = document.getElementById('theme-stylesheet');
  const label = document.getElementById('active-theme-label');

  document.querySelectorAll('.theme-btn').forEach((btn) => {
    btn.addEventListener('click', () => {
      const theme = btn.getAttribute('data-theme');
      if (!themeLink || !theme) return;
      themeLink.setAttribute('href', `themes/${theme}.css`);
      if (label) label.textContent = `${theme} (preview)`;
    });
  });

  const splashBtn = document.getElementById('water-splash-btn');
  splashBtn?.addEventListener('click', () => {
    for (let i = 0; i < 18; i += 1) {
      const dot = document.createElement('span');
      dot.className = 'water-drop';
      dot.style.left = `${window.innerWidth / 2 + (Math.random() * 220 - 110)}px`;
      dot.style.top = `${window.innerHeight / 2 + (Math.random() * 120 - 60)}px`;
      document.body.appendChild(dot);
      setTimeout(() => dot.remove(), 950);
    }
  });
})();
