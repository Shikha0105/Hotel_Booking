const blinkText = document.getElementById("blinkText");

setInterval(() => {
    blinkText.style.visibility = (blinkText.style.visibility === 'hidden') ? 'visible' : 'hidden';
}, 500);