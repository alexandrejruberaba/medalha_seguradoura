document.addEventListener('DOMContentLoaded', function () {
  // Adicione o código de rolagem suave
  document.querySelectorAll('a.nav-item.nav-link').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();

      const targetId = this.getAttribute('href').substring(1);
      const targetElement = document.getElementById(targetId);

      if (targetElement) {
        window.scrollTo({
          top: targetElement.offsetTop - 80, // Ajuste conforme a altura do cabeçalho
          behavior: 'smooth'
        });
      }
    });
  });

  // Adicione o código de redirecionamento para a página de login
  const minhaAreaLink = document.querySelector('.nav-item.nav-link[href="login.php"]');
  if (minhaAreaLink) {
    minhaAreaLink.addEventListener('click', function (event) {
      event.preventDefault(); // Evita o comportamento padrão do link
      window.location.href = "/login.php"; // Redireciona para a página de login
    });
  }
});
