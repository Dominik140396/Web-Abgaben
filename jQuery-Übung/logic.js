'use strict'

const myPTag = document.getElementById("myPTag");
const myInput = document.getElementById("myInput");
const overrideBtn = document.getElementById("overrideBtn");

overrideBtn.addEventListener("click", function() {
    myPTag.innerHTML = myInput.value;
});



function divBoxExamples() {
    $('#cube').onmouseout(MouseGoesOut);
}

function MouseGoesOut() {
    $('#cube').text('Goodbye');
}

divBoxExamples();





