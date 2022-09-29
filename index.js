"use strict";

// $("#modal-open").click(

//   console.log('OK'),

// 	function(){
// 		//[id:modal-open]をクリックしたら起こる処理
//     //キーボード操作などにより、オーバーレイが多重起動するのを防止する
//     $(this).blur() ;	//ボタンからフォーカスを外す
//     if($("#modal-overlay")[0]) return false ;		//新しくモーダルウィンドウを起動しない [下とどちらか選択]
//     //if($("#modal-overlay")[0]) $("#modal-overlay").remove() ;		//現在のモーダルウィンドウを削除して新しく起動する [上とどちらか選択]

//     //オーバーレイ用のHTMLコードを、[body]内の最後に生成する
//     $("body").append('<div id="modal-overlay"></div>');

//     //[$modal-overlay]をフェードインさせる
//     $("#modal-overlay").fadeIn("slow");

//     //[$modal-content]をフェードインさせる
//     $("#modal-content").fadeIn("slow");

// 	}
// );

$(function () {
  $("#modal-open").click(function () {
    $("#modal-overlay").fadeIn();
  });
  $("#modal-close").click(function () {
    $("#modal-overlay").fadeOut();
  });
});

// ここから完了画面とloading画面

$(function () {
  $("#finish-btn").click(function () {
    $("#loading-overlay").fadeIn();
    $("#modal-overlay").fadeOut();
    setTimeout(
      function() {
        $("#loading-overlay").fadeOut();
      }, 3000
    );
      setTimeout(
        function() {
          $("#finish-overlay").fadeIn();
        }, 3000
      );
      // $('loading').addClass('active');
  });
  });

  $("#finish-close").click(function () {
    $("#finish-overlay").fadeOut();
  });


// let trigger = document.getElementsByClassName("option-btn");
// let triggers = Array.from(trigger);

// let check = document.getElementsByClassName("check");
// let checks = Array.from(check);

// triggers.forEach(function (btn) {
//   btn.addEventListener("click", function () {
//     btn.classList.toggle('off-option-btn');
//     btn.classList.toggle('option-btn');
//   });
// });

// checks.forEach(function (button) {
//   button.addEventListener("click", function() {
//     button.classList.toggle('on-check');
//     button.classList.toggle('check');
//   });
// });

// ここからチェックボックス
let check = document.getElementsByClassName('content-options');
let checks = Array.from(check);

// let onoff = "off";

// const element = document.getElementsByName("fruits");

// const elements = Array.from(element);

// for (let i=0; i<elements.length; i++){
//   if (elements[i].checked){
//     checks[i].classList.add('on-contetnt-options');
//     checks[i].classList.remove('content-options');
//   }else{
// };}

checks.forEach(function (btn) {
  btn.addEventListener("click", function () {
    btn.classList.toggle('on-content-options');
    btn.classList.toggle('content-options');
    // if(onoff === "off"){
    //   onoff = "on";
    //   btn.style.Backgroundcolor = "#e7f5ff";
    // }else{
    //   onoff = "off";
    //   btn.style.Backgroundcolor = "#f5f5f8";
    // }
  });
});

// let onoff = "off";

let bigcheck = document.getElementById("Bigcheck");

bigcheck.addEventListener('click', function () {
  bigcheck.classList.toggle('off-bigcheck');
  bigcheck.classList.toggle('bigcheck');
//   if(onoff === "off"){
//     onoff = "on";
//     bigcheck.style.Backgroundcolor = "#cccccc";
// }
//   else if(onoff === "on"){
//     onoff = "off";
//     bigcheck.style.Backgroundcolor = "#0f70bd";
// }
  }
);


// ここから画像回転

// function func1() {
//   var loading = document.getElementById("loading-img");
//   loading.classList.add('active');
// };


// ここからグラフ

function drawChart() {
  let column = document.getElementById('column');
  let data;
  let options = {
    width: 620,
    height: 450,
    colors: ['#0171b8'],
    animation: {
      startup: true,
      duration: 400,
      easing: 'inAndout',
    },
    enableInteractivity: false,
    legend: 'none',
    chartArea: {width: '80%', height: '60%'},

  };
  let chart = new google.visualization.ColumnChart(column);
  // data = new google.visualization.Datatable();
  // data.addColumn('number', 'day');
  // data.addColumn('number', 'time');
  // data.addRow();
  data = new google.visualization.arrayToDataTable([
    ['day', 'time'],
    [1, 3],
    [2, 4],
    [3, 5],
    [4, 3],
    [5, 0],
    [6, 0],
    [7, 4],
    [8, 2],
    [9, 2],
    [10, 8],
    [11, 8],
    [12, 2],
    [13, 2],
    [14, 1],
    [15, 7],
    [16, 4],
    [17, 4],
    [18, 3],
    [19, 3],
    [20, 3],
    [21, 2],
    [22, 2],
    [23, 6],
    [24, 2],
    [25, 2],
    [26, 1],
    [27, 1],
    [28, 1],
    [29, 7],
    [30, 8]
      
  ]);

  chart.draw(data, options);

  let column2 = document.getElementById('column-2');
  let data4;
  let options4 = {
    width: 305,
    height: 140,
    colors: ['#0171b8'],
    animation: {
      startup: true,
      duration: 400,
      easing: 'inAndout',
    },
    enableInteractivity: false,
    legend: 'none',
    chartArea: {width: '90%', height: '70%'},

  };
  let chart4 = new google.visualization.ColumnChart(column2);
  // data = new google.visualization.Datatable();
  // data.addColumn('number', 'day');
  // data.addColumn('number', 'time');
  // data.addRow();
  data4 = new google.visualization.arrayToDataTable([
    ['day', 'time'],
    [1, 3],
    [2, 4],
    [3, 5],
    [4, 3],
    [5, 0],
    [6, 0],
    [7, 4],
    [8, 2],
    [9, 2],
    [10, 8],
    [11, 8],
    [12, 2],
    [13, 2],
    [14, 1],
    [15, 7],
    [16, 4],
    [17, 4],
    [18, 3],
    [19, 3],
    [20, 3],
    [21, 2],
    [22, 2],
    [23, 6],
    [24, 2],
    [25, 2],
    [26, 1],
    [27, 1],
    [28, 1],
    [29, 7],
    [30, 8]
      
  ]);

  chart4.draw(data4, options4);

  let pie1 = document.getElementById('pie-1');
  let data2;
  let options2 = {
    width: 280,
    height: 580,
    title: '学習言語',
    pieHole: 0.5,
    colors: ['#0042e5', '#0070b9', '#01bdda', '#02cdfa', '#b29dee', '#6c43e5', '#460ae8', '#460ae8'],
    legend: {position: 'bottom'},
    chartArea: {width: '100%', height: '80%'},
    enableInteractivity: false,
    pieSliceTextStyle: {fontSize: 10},
  };
  let chart2 = new google.visualization.PieChart(pie1);

data2 = new google.visualization.arrayToDataTable([
  ['学習言語', 'time'],
  ['HTML', 30],
  ['CSS', 20],
  ['JavaScript', 10],
  ['PHP', 5],
  ['Laravel', 5],
  ['SQL', 20],
  ['SHELL]', 20],
  ['その他', 10]
]);

chart2.draw(data2, options2);

let pie2 = document.getElementById('pie-2');
  let data3;
  let options3 = {
    width: 280,
    height: 580,
    title: '学習コンテンツ',
    pieHole: 0.5,
    colors: ['#0070b9', '#0042e5', '#01bddb'],
    legend: {position: 'bottom'},
    chartArea: {width: '100%', height: '80%'},
    enableInteractivity: false,
    pieSliceTextStyle: {fontSize: 10},
  };
  let chart3 = new google.visualization.PieChart(pie2);

data3 = new google.visualization.arrayToDataTable([
  ['学習コンテンツ', 'time'],
  ['N予備校', 40],
  ['ドットインストール', 20],
  ['課題', 40],
]);

chart3.draw(data3, options3);

let pie3 = document.getElementById('pie-3');
  let data5;
  let options5 = {
    width: 150,
    height: 210,
    title: '学習言語',
    pieHole: 0.5,
    colors: ['#0042e5', '#0070b9', '#01bdda', '#02cdfa', '#b29dee', '#6c43e5', '#460ae8', '#460ae8'],
    legend: {position: 'bottom'},
    chartArea: {width: '80%', height: '80%'},
    enableInteractivity: false,
    pieSliceTextStyle: {fontSize: 10},
  };
  let chart5 = new google.visualization.PieChart(pie3);

data5 = new google.visualization.arrayToDataTable([
  ['学習言語', 'time'],
  ['HTML', 30],
  ['CSS', 20],
  ['JavaScript', 10],
  ['PHP', 5],
  ['Laravel', 5],
  ['SQL', 20],
  ['SHELL]', 20],
  ['その他', 10]
]);

chart5.draw(data5, options5);

let pie4 = document.getElementById('pie-4');
  let data6;
  let options6 = {
    width: 150,
    height: 210,
    title: '学習コンテンツ',
    pieHole: 0.5,
    colors: ['#0070b9', '#0042e5', '#01bddb'],
    legend: {position: 'bottom'},
    chartArea: {width: '80%', height: '80%'},
    enableInteractivity: false,
    pieSliceTextStyle: {fontSize: 10},
  };
  let chart6 = new google.visualization.PieChart(pie4);

data6 = new google.visualization.arrayToDataTable([
  ['学習コンテンツ', 'time'],
  ['N予備校', 40],
  ['ドットインストール', 20],
  ['課題', 40],
]);

chart6.draw(data6, options6);
}

// function drawChart() {
//   let pie1 = document.getElementById('pie-1');
//   let data2;
//   let options2 = {
//     width: 300,
//     height: 600,
//     title: '学習言語'
//   };
//   let chart2 = new google.visualization.PieChart();

// data2 = new google.visualization.arrayToDataTable([
//   ['学習言語', 'time'],
//   ['HTML', 30],
//   ['CSS', 20],
//   ['JavaScript', 10],
//   ['PHP', 5],
//   ['Laravel', 5],
//   ['SQL', 20],
//   ['SHELL]', 20],
//   ['その他', 10]
// ]);

// chart2.draw(data2, options2);
// }




google.charts.load('current', {packages: ['corechart']});
google.charts.setOnLoadCallback(drawChart);


// ここからカレンダー

let studyday = document.getElementById('study-box');
let fp = flatpickr(studyday);