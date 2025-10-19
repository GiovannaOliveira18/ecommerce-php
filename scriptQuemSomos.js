document.addEventListener("DOMContentLoaded", () => {
  const slides = Array.from(document.querySelectorAll(".slide"));
  if (!slides.length) {
    console.error("Nenhum .slide encontrado.");
    return;
  }

  // pega todos os botões prev/next (se houver duplicados, todos funcionarão)
  const prevButtons = Array.from(document.querySelectorAll(".prev"));
  const nextButtons = Array.from(document.querySelectorAll(".next"));

  if (!prevButtons.length || !nextButtons.length) {
    console.warn("Um ou ambos os botões .prev / .next não foram encontrados. Verifique o HTML.");
    // continua mesmo se não encontrar, mas os botões não existirão
  }

  let current = 0;
  const total = slides.length;

  function show(index) {
    // garante índice válido
    index = ((index % total) + total) % total;
    slides.forEach((s, i) => {
      s.classList.toggle("active", i === index);
    });
    current = index;
  }

  // funções de navegação
  function next() { show(current + 1); }
  function prev() { show(current - 1); }

  // liga todos os botões encontrados
  prevButtons.forEach(btn => btn.addEventListener("click", (e) => { e.preventDefault(); prev(); }));
  nextButtons.forEach(btn => btn.addEventListener("click", (e) => { e.preventDefault(); next(); }));

  // atalho com teclado (opcional)
  document.addEventListener("keydown", (e) => {
    if (e.key === "ArrowRight") next();
    if (e.key === "ArrowLeft") prev();
  });

  // mostra primeiro slide
  show(0);

  // debug rápido no console
  console.log(`Carrossel inicializado: ${total} slides. Botões prev=${prevButtons.length}, next=${nextButtons.length}`);
});