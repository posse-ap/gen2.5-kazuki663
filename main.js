'use strict'

//image列挙
let img = ["https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png",//画像１
"https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png",//画像２
"https://d1khcm40x1j0f.cloudfront.net/quiz/ad4f8badd896f1a9b527c530ebf8ac7f.png",//画像３
"https://d1khcm40x1j0f.cloudfront.net/quiz/ee645c9f43be1ab3992d121ee9e780fb.png",//画像４
"https://d1khcm40x1j0f.cloudfront.net/quiz/6a235aaa10f0bd3ca57871f76907797b.png",//画像５
"https://d1khcm40x1j0f.cloudfront.net/quiz/0b6789cf496fb75191edf1e3a6e05039.png",//画像６
"https://d1khcm40x1j0f.cloudfront.net/quiz/23e698eec548ff20a4f7969ca8823c53.png",//画像７
"https://d1khcm40x1j0f.cloudfront.net/quiz/50a753d151d35f8602d2c3e2790ea6e4.png",//画像８
"https://d1khcm40x1j0f.cloudfront.net/words/8cad76c39c43e2b651041c6d812ea26e.png",//画像９
"https://d1khcm40x1j0f.cloudfront.net/words/34508ddb0789ee73471b9f17977e7c9c.png",//画像１０
]

//選択肢
let option = [["たかなわ", "こうわ", "たかわ"],//問１
["かめいど", "かめと", "かめど"],//問２
["こうじまち", "おかとまち", "かゆまち"],//問３
["おなりもん", "おかどもん", "ごせいもん"],//問４
["とどろき", "たたりき", "たたら"],//問５
["しゃくじい", "せきこうい", "いじい"],//問６
["ぞうしき", "ざっしき", "ざっしょく"],//問７
["おかちまち", "ごしろちょう", "みとちょう"],//問８
["ししぼね", "しこね", "ろっこつ"],//問９
["こぐれ", "こしゃく", "こばく"]//問１０
]

//正解の配列
let answerOption = ["たかなわ", "かめいど", "こうじまち", "おなりもん", "とどろき", "しゃくじい", "ぞうしき", "おかちまち", "ししぼね", "こぐれ"]


//HTML書き換え
let questionArea = document.getElementById('question_area');
//h1タグ 番号 画像 選択肢
for (let i = 0; i < 10; i++) {

  let question = `<h1> ${i+1}.この地名はなんと読む？</h1>`
  +`<div class = "image-container">`
  + `<img src = ${img[i]}></div>`
  +`<ul>
  <li id = "selection${i}_0" class = "selections" onclick = "clickNum(${i}, 0)">${option[i][0]}</li>
  <li id = "selection${i}_1" class = "selections" onclick = "clickNum(${i}, 1)">${option[i][1]}</li>
  <li id = "selection${i}_2" class = "selections" onclick = "clickNum(${i}, 2)">${option[i][2]}</li>
  </ul>`
  +`<div id ="answerBox${i}" class="answerBox" name="answerBox"></div>`


  
  //  document.write(question);
  question_area.insertAdjacentHTML('beforebegin', question);

};

  let clickNum = function (quizNum, num) {
    const clickedSelection = document.getElementById(`selection${quizNum}_${num}`);
    clickedSelection.className = "incorrect_answer";
    const answerClick = document.getElementById(`selection${quizNum}_0`);
    answerClick.className = "correct_answer";
    // clickedSelection.style.backgroundColor = "#FF5028";
    // clickedSelection.style.color = "#FFFFFF";
    console.log("こんばんわ");
    
    let answerBox = document.getElementById(`answerBox${quizNum}`);
    
    const answerDiv = document.createElement("div");
    answerDiv.className = "answerDiv";
    answerBox.appendChild(answerDiv);
    
    if( num === 0 ){
      const el = document.createElement("h3");
      el.setAttribute("id", "answerBox");
      el.textContent = "正解!";
      answerDiv.appendChild(el);
      const ol = document.createElement("div");
      ol.setAttribute("id", "answerInstruction");
      ol.textContent="正解は「"+`${answerOption[quizNum]}`+"」です！";
      ol.className = "answer";
      answerDiv.appendChild(ol);
    }else{
      const ul = document.createElement("h2");
      ul.setAttribute("id", "falseBox");
      ul.textContent = "不正解！";
      answerDiv.appendChild(ul);
      const ol = document.createElement("div");
      ol.setAttribute("id", "answerInstruction");
      ol.textContent="正解は「"+`${answerOption[quizNum]}`+"」です！";
      answerDiv.appendChild(ol);
    }

    for(let i = 0; i < 3; i++){
      document.getElementById(`selection${quizNum}_${i}`).classList.add('oneClick');
    }

    // const ol = document.createElement("div");
    // ol.setAttribute("id", "answerInstruction");
    // ol.textcoment="正解は"+`${option[i][0]}`+"です！";
    // document.body.appendChild(ol);
  }    
// };


// window.onload 

//ボタンの色変え
// let correct = document.getElementById("correctselection");

// let incorrect = document.getElementById("incorrectselection1");

// let incorrect2 = document.getElementById("incorrectselection2");

// correct.onclick = function() {
//   correct.style.backgroundColor = "#297DFE";
//   correct.style.color = "#FFFFFF";
//   correct.classList.add('oneClick');
//   incorrect.classList.add("oneClick");
//   incorrect2.classList.add("oneClick");  
// }

// incorrect2.onclick = function() {
//   incorrect2.style.backgroundColor = "#FF5028"
//   incorrect2.style.color = "#FFFFFF";
//   correct.classList.add('oneClick');
//   incorrect.classList.add("oneClick");
//   incorrect2.classList.add("oneClick");
// }


//正解 不正解 表示
// if( num === 0 ){
//   const el = document.createElement("h1");  
//   el.setAttribute("id", "answerBox");
//   el.textContent = "正解!";
//   document.body.appendChild(el);
// }else{
//   const ul = document.createElement("h1");  
//   ul.setAttribute("id", "falseBox");
//   ul.textContent = "不正解！";
// }
// const ol = document.createElement("div");
// ol.setAttribute("id", "answerInstruction");
// ol.textcoment="正解は"+`${option[i][0]}`+"です！";
// document.body.appendChild(ol);

//  let correctselect = function(){
  //   correct.style.backgroundColor = "#297DFE";
  //   correct.style.color = "#FFFFFF"
  //   console.log("こんにちはい");
  // }

// if(correct.onclick){
//   correct.style.backgroundColor = "#297DFE";  
//   correct.style.color = "#FFFFFF"
//   console.log(correct);
// }else if(incorrect.onclick){
//   incorrect.style.backgroundColor = "#FF5028"  
//   incorrect.style.color = "#FFFFFF"
//   console.log(incorrect);
// }else if(incorrect2.onclick){
//   incorrect2.style.backgroundColor = "#FF5028"  
//   incorrect2.style.color = "#FFFFFF"
//   console.log(incorrect2);
// }

// let questionNumber = '';

// for (let i = 0; i < 10; i++){
//   questionNumber = questionNumber + i;  

//   console.log(questionNumber);
// }

// //正解 不正解表示
