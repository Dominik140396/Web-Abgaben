'use strict'

let operators = ["+", "-", "*", "/"];
let answerValue;

const startBtn = document.getElementById("start-btn");
const question = document.getElementById("question");
const controls = document.querySelector(".controls-container");
const result = document.getElementById("result");
const submitBtn = document.getElementById("start-btn");
const errorMessage = document.getElementById("error-msg");

const randomValue = (min, max) => Math.floor(Math.random() * (max - min)) + min;



function questionGenerator() {
    let [num1, num2] = [randomValue(1,20), randomValue(1,20)];

    let randomOperator = operators[Math.floor(Math.random() * operators.length)];

    if (randomOperator === "-" && num2 > num1) {
        [num1, num2] = [num2, num1];
    }

    let solution = eval(`${num1}${randomOperator}${num2}`);
    console.log(num1, randomOperator, num2, solution);

    answerValue = solution;
    question.innerHTML = `${num1} ${randomOperator} ${num2} = <input type="number" id="inputValue" placeholder="?"\>`;


    submitBtn.addEventListener("click", () => {
        errorMessage.classList.add("hide");
        let userInput = document.getElementById("inputValue").value;

        if (userInput) {
            if (userInput === answerValue) {
                stopGame(`Yippie! You did it.`)
            }
            else if(userInput !== answerValue) {
                errorMessage.classList.remove("hide");
                errorMessage.innerHTML = "The solution is wrong";
            }
            else {
                errorMessage.classList.remove("hide");
                errorMessage.innerHTML = "Input feld kann nicht leer bleiben";
            }
        }
    });
}


startBtn.addEventListener("click", () => {
    answerValue = "";
    errorMessage.innerHTML = "";
    errorMessage.classList.add("hide");

    controls.classList.add("hide");
    controls.classList.add("hide");
    questionGenerator();
});

const stopGame = (resultText) => {
    result.innerHTML = resultText;
    startBtn.innerText = "Restart";
    controls.classList.remove("hide");
    startBtn.classList.add("hide");
}