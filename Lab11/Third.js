const checkboxes = document.querySelectorAll('#checkboxes input[type="checkbox"]');
const warning = document.getElementById('warning');

checkboxes.forEach(cb => cb.addEventListener('change', checkSelection));

function checkSelection() {
  const checkedCount = Array.from(checkboxes).filter(cb => cb.checked).length;
  if (checkedCount < 5) {
    warning.classList.remove('hidden');
  } else {
    warning.classList.add('hidden');
  }
}
