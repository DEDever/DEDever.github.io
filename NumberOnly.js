document.addEventListener("DOMContentLoaded", function () {
  const input = document.getElementById("digitOnly");

  input.addEventListener("input", function () {
    // Видаляємо всі символи, які не є цифрами
    this.value = this.value.replace(/\D/g, '');
  });
});
