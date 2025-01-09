//logica menu hamburguer e back button

document.getElementById('menu-toggler').addEventListener('click', function () {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active');
    document.getElementById('back-button').classList.toggle('active');
});

document.getElementById('back-button').addEventListener('click', function () {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.remove('active');
    document.getElementById('back-button').classList.remove('active');
});

document.getElementById('bell-icon').addEventListener('click', function () {
    this.classList.toggle('active');
    if (this.classList.contains('active')) {
        this.style.color = 'black';
        alert("Você receberá todas as novidades!");
    } else {
        this.style.color = 'white';
    }
});

// Função para verificar se os elementos estão visíveis na viewport
function checkVisibility() {
    const sections = document.querySelectorAll('.fade-in-section');
    sections.forEach(section => {
      const rect = section.getBoundingClientRect();
      if (rect.top < window.innerHeight && rect.bottom > 0) {
        section.classList.add('visible');
      }
    });
  }
  
  // Verificar visibilidade ao carregar a página
  window.addEventListener('load', checkVisibility);
  // Verificar visibilidade ao rolar a página
  window.addEventListener('scroll', checkVisibility);
  