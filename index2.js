let userScore =0;
let compScore =0;
const choices = document.querySelectorAll('.choice');//
const msg= document.querySelector('#msg');
let userScorePara=document.querySelector("#user-score");
let compScorePara = document.querySelector("#comp-score");
const getCompChoice=()=> {//stone paper scissor
   const options =["stone","paper", "scissor"];//return random number
   const randIdx=Math.floor(Math.random()*3);//return random number
   return options[randIdx];
};//return random number is printed in choices array and id is printed in choices array and id is printed in choices array and id is printed in choices array
const drawGame=() => {
   
    msg.innerText="game was draw";//text is printed in tempurary on div 
    msg.style.backgroundColor = '#081b31';
};
const showWinner=(userWins, userChoice, compChoice) => {//if user wins then show user wins
    if(userWins){
       userScore++;//if user wins then user score is incremented
        userScorePara.innerText=userScore;//user score is printed
       msg.innerText=`user wins! ${userChoice} beats ${compChoice}`;//msg is id of div and tempurary text is printed in div
       msg.style.backgroundColor = 'green';
     
    }else {         //if user wins then computer wins

        compScore++;// this a variable and it is incremented by 1
        //if computer wins then computer score is incremented//if computer wins then computer score is incremented
        compScorePara.innerText=compScore;//computer score is printed
        msg.innerText=`computer wins!  ${compChoice} beats your ${userChoice}`;
        msg.style.backgroundColor="red";
    }   
}
const playGame=(userChoice) => { //if user choice is clicked then play game
    
    // genetae computer choice ->modulaer operator
    const compChoice = getCompChoice();
    
    //compare choices
    if(userChoice === compChoice){//if user choice is equal to computer choice then draw game
        drawGame();//if draw game then show draw game
    }else{
         let userWins=true;
        if(userChoice === "stone"){
            userWins = compChoice === "paper" ? false : true;//if computer choice is paper then user wins
           } else if(userChoice ==="paper"){ 
            //rock ,paper,scissor
           userWins = compChoice === "scissor" ? false : true;//if computer choice is scissor then user wins
            }else{
            userWins = compChoice === "stone" ? false : true;//if computer choice is stone then user wins
            }
            showWinner(userWins,userChoice,compChoice);//if user wins then show user wins
        }
        
    
} 
choices.forEach((choice) => {// if user choice is clicked then play game

choice.addEventListener("click", () => {
    const userChoice=choice.getAttribute("id");//
    //console.log("choice clicked",userChoice);//
    playGame(userChoice); //if user choice is clicked then play game
});
});

