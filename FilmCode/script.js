document.addEventListener('DOMContentLoaded', () => {
  const bios = document.querySelectorAll('.bio h3');

  bios.forEach(bio => {
    bio.addEventListener('click', () => {
      const parent = bio.parentElement;
      parent.classList.toggle('expanded');
    });
  });
});
