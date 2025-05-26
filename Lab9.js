function showLength() {
    const str = document.getElementById("inputString").value;
    const length = str.length;
    document.getElementById("lengthResult").innerText = "Довжина рядка: " + length;
}

function checkEmail() {
    const str = document.getElementById("emailInput").value;
    if (
        str.indexOf("@") === -1 ||
        str.indexOf("@") !== str.lastIndexOf("@") ||
        str.startsWith("@") ||
        str.endsWith("@")
    ) {
        document.getElementById("emailResult").innerText = "E-mail задано неправильно";
    } else {
        document.getElementById("emailResult").innerText = "E-mail виглядає коректно";
    }
}

function convertCase(){
    const str = document.getElementById("caseInput").value;
    const loverCase = str.toLowerCase();
    const upperCase = str.toUpperCase();
    document.getElementById("caseResult").innerText = "Верхній регістр: " + upperCase + ", нижній регістр: " + loverCase;
}

function findSubstring() {
    const main = document.getElementById("mainStr").value;
    const sub = document.getElementById("subStr").value;
    const pos = main.indexOf(sub);
    if (pos !== -1) {
        document.getElementById("SubstringResult").innerText = "Підрядок знайдено на позиції: " + (pos + 1);
    } else {
        document.getElementById("SubstringResult").innerText = "Підрядок не знайдено";
    }
}

function showCurrentDate() {
    const today = new Date();
    const day = String(today.getDate()).padStart(2, '0');
    const month = String(today.getMonth() + 1).padStart(2, '0');
    const year = today.getFullYear();
    const formatted = `${day}.${month}.${year}`;
    document.getElementById("curentDateResult").innerText = "Сьогоднішня дата: " + formatted;
}



function showBirthday() {
    const day = 5;
    const month = 11;
    const year = 2004;
    const formatted = `${day}.${month}.${year}`;
    document.getElementById("birthdayDate").innerText = "Сьогоднішня дата: " + formatted;
}

function formater(date, day){
    const formatted = date.getDate() +"."+ (date.getMonth()+1) + "." + date.getFullYear() +"."+ day;
    return formatted;
}

function pastAndFutureYears() {
    const weekday = ["Неділя","Понеділок","Вівторок","Середа","Четверг","П'ятниця","Субота"];
    const myDay = 5;
    const month = 10;
    const year = 2004;
    const data1 = new Date(year-10, month, myDay);
    const data2 = new Date(year-12, month, myDay);
    const data3 = new Date(year-25, month, myDay);
    const data4 = new Date(year-38, month, myDay);
    
    const data5 = new Date(new Date().getFullYear()+3, month, myDay);
    let day1 = weekday[data1.getDay()];
    let day2 = weekday[data2.getDay()];
    let day3 = weekday[data3.getDay()];
    let day4 = weekday[data4.getDay()];
    let day5 = weekday[data5.getDay()];
    document.getElementById("yearPast1").innerText = "10 років тому: " + formater(data1 ,day1);
    document.getElementById("yearPast2").innerText = "12 років тому: " + formater(data2 ,day2);
    document.getElementById("yearPast3").innerText = "25 років тому: " + formater(data3 ,day3);
    document.getElementById("yearPast4").innerText = "38 років тому: " + formater(data4 ,day4);
    
    document.getElementById("yearFuture").innerText = "Через три роки: " + formater(data5 ,day5);
}

function calculateTimeDifference() {
  const h1 = parseInt(document.getElementById("hour1").value);
  const m1 = parseInt(document.getElementById("min1").value);
  const h2 = parseInt(document.getElementById("hour2").value);
  const m2 = parseInt(document.getElementById("min2").value);

  const t1 = h1 * 60 + m1;
  const t2 = h2 * 60 + m2;
  let diff = Math.abs(t2 - t1);
  const hours = Math.floor(diff / 60);
  const minutes = diff % 60;

  document.getElementById("timeDiffResult").textContent =
    `Інтервал: ${hours} год. ${minutes} хв.`;
}

function checkIfNumber() {
  const value = document.getElementById("checkNumberField").value;
  const result = !isNaN(value) && value.trim() !== "";

  document.getElementById("numberCheckResult").textContent = 
    result ? "Це число." : "Це не число.";
}
 
function showNumberInBases() {
  const day = 5;
  const month = 11;
  const year = 2004;
  const sum = day + month + year;

  alert(
    `Число: ${sum}\n` +
    `Двійкова: ${sum.toString(2)}\n` +
    `Шістнадцяткова: ${sum.toString(16).toUpperCase()}`
  );
}

function calculateHypotenuse() {
  const a = parseFloat(document.getElementById("cathetusA").value);
  const b = parseFloat(document.getElementById("cathetusB").value);
  const hypotenuse = Math.sqrt(a * a + b * b).toFixed(2);

  document.getElementById("hypotenuseResult").textContent =
    `Гіпотенуза: ${hypotenuse}`;
}

window.onload = function() {
        showCurrentDate();
        showBirthday();
        pastAndFutureYears();
    };