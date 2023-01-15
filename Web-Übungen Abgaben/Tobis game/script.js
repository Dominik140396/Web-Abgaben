'use strict'
let level = 1;
let life = 3;
let levelPassed = false;
let levelCreated = false;
let randomInt1;
let randomInt2;
let answer;
let userAnswer;
let levelOutput = "";
let colourCurrentQuestion = 'yellow';
let colourFinishedQuestion = '#2cff00';
let colourLifeDead = 'red';
let gameWon = false;
let gameOver = false;
function createTowRandomInt(maxValue, minimumValue) {
    randomInt1 = Math.floor(Math.random() * maxValue) + minimumValue;
    randomInt2 = Math.floor(Math.random() * maxValue) + minimumValue;
}
function checkAnswer() {
    getUserAnswer();
    if (randomInt1 == null && randomInt2 == null){
        alert("You look dump as you are! \nMaybe try to start the \"Dummy Game\" first?!");
        return;
    }
    if (gameOver){
        alert("It´s Game Over Dummy! Start a new Game and try again!");
        return;
    }
    if (gameWon){
        alert("You Dummy, you have already won this Game!");
        return;
    }
    if (userAnswer === answer){
        if (levelPassed){
            levelUP();
            return;
        }
        switch (level){
            case 1:
                //document.getElementById("Level1").innerHTML = randomInt1 + " + " + randomInt2 + " = " + answer;
                document.getElementById("Level"+level).innerHTML = levelOutput += answer;
                document.getElementById("one").style.backgroundColor = colourFinishedQuestion;
                break;
            case 2:
                document.getElementById("Level2").innerHTML = levelOutput += answer;
                document.getElementById("two").style.backgroundColor = colourFinishedQuestion;
                break;
            case 3:
                document.getElementById("Level3").innerHTML = levelOutput += answer;
                document.getElementById("three").style.backgroundColor = colourFinishedQuestion;
                break;
            case 4:
                document.getElementById("Level4").innerHTML = levelOutput += answer;
                document.getElementById("four").style.backgroundColor = colourFinishedQuestion;
                break;
            case 5:
                document.getElementById("Level5").innerHTML = levelOutput += answer;
                document.getElementById("five").style.backgroundColor = colourFinishedQuestion;
                break;
            case 6:
                document.getElementById("Level6").innerHTML = levelOutput += answer;
                document.getElementById("six").style.backgroundColor = colourFinishedQuestion;
                break;
            case 7:
                document.getElementById("Level7").innerHTML = levelOutput += answer;
                document.getElementById("seven").style.backgroundColor = colourFinishedQuestion;
                break;
            case 8:
                document.getElementById("Level8").innerHTML = levelOutput += answer;
                document.getElementById("eight").style.backgroundColor = colourFinishedQuestion;
                break;
            case 9:
                document.getElementById("Level9").innerHTML = levelOutput += answer;
                document.getElementById("nine").style.backgroundColor = colourFinishedQuestion;
                gameWon = true;
                break;
        }
        document.getElementById("userNumber").innerHTML = "";
        levelUP();
        levelCreated = false;
    } else {
        if (life <=0){
            alert("Game Over Dummy!");
            //document.write("LOSER") MAKE IT WITH CSS BIG AND DEPRESSIVE
            gameOver = true;
            return;
        }
        alert("You are now a Dummy, this was the wrong answer!");
        life--;
        switch (life){
            case 2:
                document.getElementById("LifeOne").style.backgroundColor = colourLifeDead;
                break;
            case 1:
                document.getElementById("LifeTwo").style.backgroundColor = colourLifeDead;
                break;
            case 0:
                document.getElementById("LifeThree").style.backgroundColor = colourLifeDead;
                break;
        }
    }
}
function levelUP() {
    if (levelPassed){
        alert("You passed this dummy Question already!");
    }else{
        level++;
        levelPassed = true;
    }
}
function dummyQuestions() {
    if (gameOver){
        alert("Game Over Dummy!");
        return;
    }
    if (levelCreated){
        if (level > 9){
            alert("You're not as dumb as you look\nBut you finished this Game already!");
            return;
        }
        alert("Ey Dummy look at Level " + level + " there is your Dummy Question");
        return;
    }
    levelPassed = false;
    switch (level){
        case 1:
            createTowRandomInt(20,1);
            answer = randomInt1 + randomInt2;
            levelOutput = randomInt1 + " + " + randomInt2 + " = "
            document.getElementById("Level1").innerHTML = levelOutput = randomInt1 + " + " + randomInt2 + " = ";
            document.getElementById("one").style.backgroundColor = colourCurrentQuestion;
            break;
        case 2:
            createTowRandomInt(25,1);
            answer = randomInt1 - randomInt2;
            document.getElementById("Level2").innerHTML = levelOutput = randomInt1 + " - " + randomInt2 + " = ";
            document.getElementById("two").style.backgroundColor = colourCurrentQuestion;
            break;
        case 3:
            createTowRandomInt(40,5);
            answer = randomInt1 - randomInt2;
            document.getElementById("Level3").innerHTML = levelOutput = randomInt1 + " - " + randomInt2 + " = ";
            document.getElementById("three").style.backgroundColor = colourCurrentQuestion;
            break;
        case 4:
            createTowRandomInt(20,5);
            answer = Math.round(randomInt1 / randomInt2);
            document.getElementById("Level4").innerHTML = levelOutput = randomInt1 + " / " + randomInt2 + " = ";
            document.getElementById("four").style.backgroundColor = colourCurrentQuestion;

            break;
        case 5:
            createTowRandomInt(30,5);
            answer = randomInt1 * randomInt2;
            document.getElementById("Level5").innerHTML = levelOutput = randomInt1 + " * " + randomInt2 + " = ";
            document.getElementById("five").style.backgroundColor = colourCurrentQuestion;

            break;
        case 6:
            createTowRandomInt(20,3);
            answer = randomInt1 - randomInt2 * randomInt1;
            document.getElementById("Level6").innerHTML = levelOutput = randomInt1 + " - " + randomInt2 + " * " + randomInt1 + " = ";
            document.getElementById("six").style.backgroundColor = colourCurrentQuestion;

            break;
        case 7:
            createTowRandomInt(20,3);
            answer = randomInt1 * randomInt2 - randomInt2;
            document.getElementById("Level7").innerHTML = levelOutput = randomInt1 + " * " + randomInt2 + " - " + randomInt2 + " = ";
            document.getElementById("seven").style.backgroundColor = colourCurrentQuestion;

            break;
        case 8:
            createTowRandomInt(20,3);
            answer = randomInt1 * randomInt2 / randomInt2;
            document.getElementById("Level8").innerHTML = levelOutput = randomInt1 + " * " + randomInt2 + " / " + randomInt2 + " = ";
            document.getElementById("eight").style.backgroundColor = colourCurrentQuestion;

            break;
        case 9:
            createTowRandomInt(20,3);
            answer = Math.round((randomInt1 * randomInt2 - randomInt1) / randomInt1);
            document.getElementById("Level9").innerHTML = levelOutput = "(" + randomInt1 + " * " + randomInt2 + " - " + randomInt1 + ")" + "/" + randomInt1 + " = ";
            document.getElementById("nine").style.backgroundColor = colourCurrentQuestion;

            break;
    }
    document.getElementById("userNumber").value = "";
    levelCreated = true;
}
function game() {
    if (level < 10) {
        document.getElementById("next").innerHTML = "Next Dummy Question";
    } else {
        document.getElementById("next").innerHTML = "You're not as dumb as you look";
    }
    dummyQuestions();
}
function getUserAnswer(){
    userAnswer = Number(document.getElementById("userNumber").value);
    return userAnswer;
}