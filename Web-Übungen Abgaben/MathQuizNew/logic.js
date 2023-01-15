'use strict'

let level = 1;
let levelPassed = false;
let answerValue;
let operatorQuestion;

let operators = ["+", "-", "*", "/"];

const startBtn = document.getElementById("start-btn");

const submitBtn = document.getElementById("submit-btn");

const question = document.querySelector(".controls-container");

const result = document.getElementById("result");

const errorMessage = document.getElementById("error-msg");

// Random numbers
const randomValue = (min, max) => Math.floor(Math.random() * (max - min)) + min;

function questionGenerator () {
    let [num1, num2] = [randomValue(1, 20), randomValue(1, 20)];

    let randomOperator = operators[Math.floor(Math.random() * operators.length)];

    //Falls es ins Minus geht
    if (randomOperator === "-" && num2 > num1) {
        [num1, num2] = [num2, num1];
    }
    //console.log(num1, randomOperator, num2, solution);

    // Solution
    answerValue = eval(`${num1}${randomOperator}${num2}`);
    question.innerHTML = `${num1} ${randomOperator} ${num2} = <input type="number" id="inputValue" placeholder ="?"\>`

}

function levelCounter() {
    if (levelPassed){
        alert("You passed this dummy Question already!");
    }else{
        level++;
        levelPassed = true;
    }
}

// Start the Game
startBtn.addEventListener("click", () => {

    questionGenerator();

})


