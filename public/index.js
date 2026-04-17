var textArray = ["Web Developer ","Web Designer", "Content Creator"]; // Teks yang akan ditampilkan secara berurutan
var speed = 100; 
var i = 0;
var j = 0;
var currentText = "";
var isdelete = false;

function typeText() {
    currentText = textArray[i];
    if (isdelete) {
        document.querySelector('.multitext').textContent = currentText.substring(0, j - 1);
        j--;
    } else {
        document.querySelector('.multitext').textContent = currentText.substring(0, j + 1);
        j++;
    }

    var typingSpeed = isdelete ? speed / 1 : speed;

    if (!isdelete && j === currentText.length) {
        typingSpeed = 2000;
        isdelete = true;
    } else if (isdelete && j === 0) {
        // Setelah menghapus, pindah ke teks berikutnya
        isdelete = false;
        i++;
        if (i === textArray.length) {
            i = 0;
        }
    }
    setTimeout(typeText, typingSpeed);
}
window.addEventListener('DOMContentLoaded', typeText);