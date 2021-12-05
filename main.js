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

//HTML書き換え
let questionArea = document.getElementById('question_area');
//h1タグ 番号 画像
for (let i = 0; i < 10; i++) {

  let question = `<h1> ${i+1}.この地名はなんと読む？</h1>`
                +`<div class = "image-container">`
                + `<img src = ${img[i]}></div>`
                +`<ul>
                   <li>${option[i][0]}</li>
                   <li>${option[i][1]}</li>
                   <li>${option[i][2]}</li>
                  </ul>`
                
  questionArea.insertAdjacentHTML("beforeEnd",question);
}








// let questionNumber = '';

// for (let i = 0; i < 10; i++){
//   questionNumber = questionNumber + i;

//   console.log(questionNumber);
// }