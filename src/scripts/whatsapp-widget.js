document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.getElementById('wa-toggle');
  const panel = document.getElementById('wa-panel');
  const close = document.getElementById('wa-close');
  const typing = document.getElementById('wa-typing');
  const bubble = document.getElementById('wa-bubble');
  const timeEl = document.getElementById('wa-time');
  if (!toggle || !panel) return;

  let animPlayed = false;

  function runTypingAnimation() {
    if (animPlayed) {
      if (typing) typing.classList.remove('show');
      if (bubble) bubble.classList.add('show');
      if (timeEl) timeEl.classList.add('show');
      return;
    }
    animPlayed = true;
    if (typing) typing.classList.remove('show');
    if (bubble) bubble.classList.remove('show');
    if (timeEl) timeEl.classList.remove('show');

    setTimeout(() => {
      if (timeEl) timeEl.classList.add('show');
    }, 300);

    setTimeout(() => {
      if (typing) typing.classList.add('show');
    }, 800);

    setTimeout(() => {
      if (typing) typing.classList.remove('show');
      if (bubble) bubble.classList.add('show');
    }, 2800);
  }

  function open() {
    panel.classList.add('is-open');
    panel.setAttribute('aria-hidden', 'false');
    toggle.setAttribute('aria-expanded', 'true');
    runTypingAnimation();
  }

  function shut() {
    panel.classList.remove('is-open');
    panel.setAttribute('aria-hidden', 'true');
    toggle.setAttribute('aria-expanded', 'false');
  }

  toggle.addEventListener('click', () => {
    panel.classList.contains('is-open') ? shut() : open();
  });

  if (close) close.addEventListener('click', shut);

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') shut();
  });

  document.addEventListener('click', (e) => {
    const widget = document.getElementById('wa-widget');
    if (widget && !widget.contains(e.target)) shut();
  });
});
