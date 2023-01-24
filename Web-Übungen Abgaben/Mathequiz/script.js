'use strict'

let answerValue;
let operatorQuestion;
let operators = ["+", "-", "*"];
let gameLevel = 1;
let levelPassed = false;
let gameWon = false;
let numbers = [2];
let life = 3;

const startBtn = document.getElementById("start-btn");
const question = document.getElementById("question");
const controls = document.querySelector(".controls-container");
const result = document.getElementById("result");
const submitBtn = document.getElementById("submit-btn");
const errorMessage = document.getElementById("error-msg");

//Random Value Generator
const randomValue = (min, max) => Math.floor(Math.random() * (max - min)) + min;

function styling() {
    switch (gameLevel) {
        case 1:
            gameLevel = 1
                document.getElementById("Level1").style.borderColor = '#00FFFF';
            break;
        case 2:
            document.getElementById("Level1").style.borderColor = '#ADFF2F';
            gameLevel = 2
                document.getElementById("Level2").style.borderColor = '#00FFFF';
            break;
        case 3:
            document.getElementById("Level2").style.borderColor = '#ADFF2F';
            gameLevel = 3
                document.getElementById("Level3").style.borderColor = '#00FFFF';
            break;
        case 4:
            document.getElementById("Level3").style.borderColor = '#ADFF2F';
            gameLevel = 4
                document.getElementById("Level4").style.borderColor = '#00FFFF';
            break;
        case 5:
            document.getElementById("Level4").style.borderColor = '#ADFF2F';
            gameLevel = 5
                document.getElementById("Level5").style.borderColor = '#00FFFF';
            break;
        case 6:
            document.getElementById("Level5").style.borderColor = '#ADFF2F';
            gameLevel = 6
                document.getElementById("Level6").style.borderColor = '#00FFFF';
            break;
        case 7:
            document.getElementById("Level6").style.borderColor = '#ADFF2F';
            gameLevel = 7
                document.getElementById("Level7").style.borderColor = '#00FFFF';
            break;
        case 8:
            document.getElementById("Level7").style.borderColor = '#ADFF2F';
            gameLevel = 8
                document.getElementById("Level8").style.borderColor = '#00FFFF';
            break;
        case 9:
            document.getElementById("Level8").style.borderColor = '#ADFF2F';
            gameLevel = 9
                document.getElementById("Level9").style.borderColor = '#00FFFF';
            break;
    }
}

function lifeCounter () {
    if (life === 2) {
        document.getElementById("Life1").style.display = "none";
    }
    if (life === 1) {
        document.getElementById("Life1").style.display = "none";
        document.getElementById("Life2").style.display = "none";
    }
    if (life === 0) {
        alert("Du hast verkakt!")
        window.location.reload();
    }
}

    function newGame() {
        if (gameLevel >= 10) {
            gameWon = true;
            alert("Congratulation! Du hast das Spiel gewonnen!")
            window.location.reload();
            }
    }

    const questionGenerator = () => {

        if (gameLevel <= 3) {
            numbers = [randomValue(1, 20), randomValue(1, 20)];
        } else if (gameLevel > 3 && gameLevel <= 6) {
            numbers = [randomValue(15, 50), randomValue(15, 50)];
        } else if (gameLevel > 6) {
            numbers = [randomValue(50, 100), randomValue(50, 100)];
        }

        //For getting random operator
        let randomOperator = operators[Math.floor(Math.random() * operators.length)];

        //Wenn es ins Minus geht
        if (randomOperator === "-" && numbers[1] > numbers[0]) {
            numbers[0] = numbers[1];
            numbers[1] = numbers[0];
        }

        //Solve equation
        let solution = eval(`${numbers[0]}${randomOperator}${numbers[1]}`);

        //For placing the input at random position
        //(1 for num1, 2 for num2, 3 for operator, anything else(4,5 & 6) for solution)
        let randomVar = randomValue(1, 6);
        if (randomVar === 1) {
            answerValue = numbers[0];
            question.innerHTML = `<input type="number" id="inputValue" placeholder="?"\> ${randomOperator} ${numbers[1]} = ${solution}`;
        } else if (randomVar === 2) {
            answerValue = numbers[1];
            question.innerHTML = `${numbers[0]} ${randomOperator}<input type="number" id="inputValue" placeholder="?"\> = ${solution}`;
        } else if (randomVar === 3) {
            answerValue = randomOperator;
            operatorQuestion = true;
            question.innerHTML = `${numbers[0]} <input type="text" id="inputValue" placeholder="?"\> ${numbers[1]} = ${solution}`;
        } else {
            answerValue = solution;
            question.innerHTML = `${numbers[0]} ${randomOperator} ${numbers[1]} = <input type="number" id="inputValue" placeholder="?"\>`;
        }
    };

//User Input Check
submitBtn.addEventListener("click", () => {
    errorMessage.classList.add("hide");
    let userInput = document.getElementById("inputValue").value;
    //If user input is not empty
    if (userInput) {
        //If the user guessed correct answer
        if (userInput == answerValue) {
            gameLevel++;
            levelPassed = true;
            nextLevel(`<span>Correct</span> Answer`);
            newGame();
            return;
        }
        //If user inputs operator other than +,-,*
        else if (operatorQuestion && !operators.includes(userInput)) {
            errorMessage.classList.remove("hide");
            errorMessage.innerHTML = "Please enter a valid operator";
        }
        //If user guessed wrong answer
        else {
            errorMessage.classList.remove("hide");
            errorMessage.innerHTML = "Your solution is wrong!";
            life--;
        }
    }
    //If user input is empty
    else {
        errorMessage.classList.remove("hide");
        errorMessage.innerHTML = "Input Cannot Be Empty";
    }
});

//Start Game
    startBtn.addEventListener("click", () => {
        operatorQuestion = false;
        answerValue = "";
        errorMessage.innerHTML = "";
        errorMessage.classList.add("hide");
        //Controls and buttons visibility
        controls.classList.add("hide");
        startBtn.classList.add("hide");
        styling();
        questionGenerator();
    });

//Stop Game
    const nextLevel = (resultText) => {
        result.innerHTML = resultText;
        startBtn.innerText = "Next Level";
        controls.classList.remove("hide");
        startBtn.classList.remove("hide");
    };
