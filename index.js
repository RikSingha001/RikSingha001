let boxes = document.querySelectorAll(".box"); // get all boxes
let resetBtn = document.querySelector("#reset-btn"); // get reset button
let newGameBtn = document.querySelector("#new-btn"); // get new game button
let msgContainer = document.querySelector(".msg-container"); // get message container
let msg = document.querySelector("#msg"); // get message

let turn0 = true; // set turn to player 1
let count = 0; // set count to 0

const winPatterns = [ // set winning patterns
    [0,1,2], [0,3,6], [0,4,8], [1,4,7], 
    [2,5,8], [2,4,6], [3,4,5], [6,7,8],
];

const enableBoxes = () => { // enable boxes
    boxes.forEach(box => {// loop through each box
        box.disabled = false;// enable box
        box.innerText = "";// clear box value
    });
};

const resetGame = () => { // reset game
    turn0 = true;//    set turn to player 1
    count = 0;//    set count to 0
    enableBoxes();
    msgContainer.classList.add("hide"); // hide message container
};

const disableBoxes = () => { // disable boxes
    boxes.forEach(box => box.disabled = true);//    loop through each box and disable
};

const showWinner = (winner) => { // show winner
    msg.innerText = `Congratulations, Winner is ${winner}`;//   set message
    msgContainer.classList.remove("hide");//    show message container
    disableBoxes();//    disable boxes
};

const gameDraw = () => { // handle draw
    msg.innerText = "It's a Draw!";//    set message
    msgContainer.classList.remove("hide");//    show message container
    disableBoxes();//    disable boxes
};

const checkWinner = () => { // check winner
    for (let pattern of winPatterns) {
        let pos1Val = boxes[pattern[0]].innerText;
        let pos2Val = boxes[pattern[1]].innerText;
        let pos3Val = boxes[pattern[2]].innerText;
        
        if (pos1Val !== "" && pos1Val === pos2Val && pos2Val === pos3Val) {
            showWinner(pos1Val);
            return true; // Winner found
        }
    }
    return false; // No winner found
};

const computerMove = () => { // computer move
    if (turn0) return; // check if it is player 1 turn

    let emptyBoxes = [];//    create empty boxes array
    boxes.forEach((box, index) => {
        if (box.innerText === "") emptyBoxes.push(index);
    });

    if (emptyBoxes.length > 0) {//    check if there are empty boxes
        let randomIndex = emptyBoxes[Math.floor(Math.random() * emptyBoxes.length)];
        boxes[randomIndex].innerText = "X";//    set box value to X
        boxes[randomIndex].disabled = true;//    disable box
        turn0 = true;//    set turn to player 1
        count++;//    increment count by 1

        if (!checkWinner() && count === 9) {//    check if there is no winner and board is full
            gameDraw();
        }
    }
};

boxes.forEach((box) => { // loop through each box and add click event listener
    box.addEventListener("click", () => {// add click event to each box and set box value
        if (turn0) {
            box.innerText = "O";// set box value to O
            turn0 = false;
        } else {
            box.innerText = "X";// set box value to X
            turn0 = true;
        }
        box.disabled = true;
        count++;

        if (!checkWinner() && count === 9) {
            gameDraw(); // Only trigger draw when board is full and no winner
        } else {
            setTimeout(computerMove, 200); // Call computer move after 500ms
        }
    });
});

newGameBtn.addEventListener("click", resetGame);// add click event to new game button
resetBtn.addEventListener("click", resetGame);
