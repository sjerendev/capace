document.addEventListener('DOMContentLoaded', function () {
  const colorButton = document.getElementById('color-button');
  const colorDisplay = document.getElementById('color-display');

  const colors = ['color1', 'color2', 'color3', 'color4', 'color5'];
  let currentIndex = 0;

  function changeBackgroundColor() {
    document.body.className = colors[currentIndex];
    colorDisplay.textContent = getComputedStyle(document.body).backgroundColor;
    currentIndex = (currentIndex + 1) % colors.length;
  }

  colorButton.addEventListener('click', changeBackgroundColor);
});
