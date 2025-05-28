const streetsByDistrict = {
  center: ['Шевченка', 'Грушевського', 'Соборна'],
  north: ['Миру', 'Залізнична', 'Героїв'],
  south: ['Лісова', 'Польова', 'Садова']
};

document.getElementById('district').addEventListener('change', function () {
  const selectedDistrict = this.value;
  const streetsSelect = document.getElementById('streets');
  const text = document.getElementById('text');

  // Очистити попередні опції
  streetsSelect.innerHTML = '';

  let streets = [];

  if (selectedDistrict === '') {
    streetsSelect.style.visibility = 'hidden';
    text.style.visibility = 'hidden';
    streetsSelect.innerHTML = '<option value="">-- Спочатку оберіть район --</option>';
    return;
  }

  if (selectedDistrict === 'all') {
    // Об'єднати всі вулиці
    for (const district in streetsByDistrict) {
      streets = streets.concat(streetsByDistrict[district]);
    }
  } else {
    streets = streetsByDistrict[selectedDistrict] || [];
  }

  // Заповнити список вулиць
  streetsSelect.style.visibility = 'visible';
    text.style.visibility = 'visible';
  streetsSelect.innerHTML = '<option value="">-- Оберіть вулицю --</option>';
  streets.forEach(street => {
    const option = document.createElement('option');
    option.value = street;
    option.textContent = street;
    streetsSelect.appendChild(option);
  });
});
