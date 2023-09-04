document.addEventListener("DOMContentLoaded", function () {
  const colors = ["#ACEBE2", "#EDE6CC", "#C4F3FA", "#F9D9F5", "#F8F1E9"];
  const colorButton = document.getElementById("colorButton");
  const colorHex = document.getElementById("colorHex");
  let currentColorIndex = 0;

  function changeBackgroundColor() {
    document.body.style.backgroundColor = colors[currentColorIndex];
    colorHex.textContent = `Hex: ${colors[currentColorIndex]}`;
    currentColorIndex = (currentColorIndex + 1) % colors.length;
  }

  colorButton.addEventListener("click", changeBackgroundColor);
});
