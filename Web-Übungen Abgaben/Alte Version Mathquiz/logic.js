'use strict';

let operators = ["+", "-", "*", "/"];


const startBtn = document.getElementById("start-btn");

const question = document.getElementById("question");

const result = document.getElementById("result");

const submitBtn = document.getElementById("submit-btn");

const errorMessage = document.getElementById("error-msg");

//Error von beginn an verstecken
errorMessage.classList.add("hide");

let answerValue;
let operatorQuestion;

// Random Value Generator
const randomValue = (min, max) => Math.floor(Math.random() * (max - min)) + min;

    function questionGenerator() {

        let level = 1;
        switch (level) {
            case 0:
                level = 1 || 2 || 3;
                break;
            case 1:
                level = 4 || 5 || 6;
                break;
            case 2:
                level = 7 || 8;
                break;
            case 3:
                level = 9;
                break;
        }

        if (level === 1 || 2) {
            [num1, num2] = [randomValue(1, 20), randomValue(1, 20)];
        } else if (level === 3 || 4) {
            [num1, num2] = [randomValue(1, 50), randomValue(1, 50)];
        } else if (level === 5 || 6) {
            [num1, num2] = [randomValue(1, 100), randomValue(1, 100)];
        } else if (level === 7 || 8) {
            [num1, num2] = [randomValue(1, 150), randomValue(1, 150)];
        } else {
            [num1, num2] = [randomValue(1, 200), randomValue(1, 200)];
        }

    // For placing the input at random position
    // (1 for num1, 2 for num2, 3 for Operator, anything else solution
    let randomVar = randomValue(1, 6);
    if (randomVar === 1) {
        answerValue = num1;
        question.innerHTML = `<input type ="number" id="inputValue" placeholder="?"\> ${randomOperator} ${num2} = ${solution}`;
    } else if (randomVar === 2) {
        answerValue = num2;
        question.innerHTML = `${num1} ${randomOperator} <input type ="number" id="inputValue" placeholder="?"\> = ${solution}`;
    } else if (randomVar === 3) {
        answerValue = randomOperator;
        operatorQuestion = true;
        question.innerHTML = `${num1} <input type ="text" id="inputValue" placeholder="?"\> ${num2} = ${solution}`;
    } else {
        answerValue = solution;
    question.innerHTML = `${num1} ${randomOperator} ${num2} = <input type ="number" id="inputValue" placeholder="?"\>`;
    }

    //User Input Check
    submitBtn.addEventListener("click", () => {
        errorMessage.classList.add("hide");
        let userInput = document.getElementById("inputValue").value;

        //LevelAufstieg
        for (level = 1; level > 9; level++) {
            //Wenn Input nicht leer ist
        if (userInput) {
            //Wenn richtig abgegeben wurde
            if (userInput === answerValue) {
                errorMessage.classList.remove("hide");
                errorMessage.innerHTML = "RICHTIGE LÖSUNG";
                level++;
            } else if (operatorQuestion && !operators.includes(userInput)) {
                errorMessage.classList.remove("hide");
                errorMessage.innerHTML = "Bitte einen korrekten Operator eingeben!";
            } else {
                errorMessage.classList.remove("hide");
                errorMessage.innerHTML = "Leider die falsche Lösung";
            }
        } else {
            errorMessage.classList.remove("hide");
            errorMessage.innerHTML = "Bitte etwas eingeben";
        }
    }
    });
};

// Start game
startBtn.addEventListener("click", () => {
    operatorQuestion = false;
    answerValue = "";
    errorMessage.innerHTML = "";

    questionGenerator();
});
