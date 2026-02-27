document.addEventListener('DOMContentLoaded', function() {
  const dropdowns = document.querySelectorAll('.dropdown');

  dropdowns.forEach(dropdown => {
    const toggle = dropdown.querySelector('.dropdown-toggle');
    const menu = dropdown.querySelector('.dropdown-menu');

    toggle.addEventListener('click', function(e) {
      e.preventDefault();

      if (menu.classList.contains('showing')) {
        // fermer
        menu.classList.remove('showing');
        setTimeout(() => {
          menu.style.display = 'none';
        }, 300);
      } else {
        // ouvrir
        menu.style.display = 'block';
        setTimeout(() => {
          menu.classList.add('showing');
        }, 5); // petit délai pour déclencher la transition
      }
    });

    // fermer si clic en dehors
    document.addEventListener('click', function(e) {
      if (!dropdown.contains(e.target) && menu.classList.contains('showing')) {
        menu.classList.remove('showing');
        setTimeout(() => {
          menu.style.display = 'none';
        }, 300);
      }
    });
  });
});