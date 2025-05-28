document.getElementById('dropdown').addEventListener('change', function () {
  const btn = document.getElementById('submitBtn');
  btn.disabled = this.selectedIndex === 0;
});
