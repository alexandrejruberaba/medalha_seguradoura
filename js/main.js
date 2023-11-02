// Adicione este script ao final do body ou em um arquivo JavaScript externo
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
