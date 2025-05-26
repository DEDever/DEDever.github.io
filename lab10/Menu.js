function showMenu(event) {
  const menu = document.getElementById("custommenu");
  menu.style.left = event.pageX + "px";
  menu.style.top = event.pageY + "px";
  menu.style.visibility = "visible";
}

function hideMenu() {
  const menu = document.getElementById("custommenu");
  menu.style.visibility = "hidden";
}

function doAction(action) {
  switch (action) {
    case "copy":
      navigator.clipboard.writeText(document.body.innerText)
        .then(() => alert("Скопійовано!"));
      break;

    case "close":
      window.close();
      break;

    case "fontIncrease":
      changeFontSize(2);
      break;

    case "fontDecrease":
      changeFontSize(-2);
      break;

    case "changeBkg":
      const colors = ["#f0f8ff", "#ffe4e1", "#e6ffe6", "#fff0f5", "#ffffcc"];
      document.body.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
      break;
  }

  hideMenu(); 
}

function changeFontSize(delta) {
  const currentSize = parseFloat(getComputedStyle(document.body).fontSize);
  document.body.style.fontSize = (currentSize + delta) + "px";
}