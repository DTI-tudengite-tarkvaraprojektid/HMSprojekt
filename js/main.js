let ctx;
let chartLabels1 = [];
let chartLabels6 = [];
let chartData1 = [];
let chartData2 = [];
let chartData3 = [];
let chartData6 = [];
let chartData7 = [];
let chartData8 = [];
let pieChartLabels = [];
let pieChartData = [];
let ansYes;
let ansNo;

const MainApp = function () {
  if (MainApp.instance) {
    return MainApp.instance
  }
  MainApp.instance = this

  this.routes = MainApp.routes
  this.currentRoute = null

  this.init()
}

MainApp.routes = {
  'home-view': {
    'render': function () {
      document 
      .querySelector('#daySeven') 
      .addEventListener('click', arrayHere1)
      document 
      .querySelector('#dayMonth') 
      .addEventListener('click', arrayHere6)
    }
  },
  'diary-view': {
    'render': function () {
    }
  }
}

MainApp.prototype = {
  init: function () {

    window.addEventListener('hashchange', this.routeChange.bind(this))

    if (!window.location.hash) {
      window.location.hash = 'home-view'
    } else {
      this.routeChange()
    }
  },

  routeChange: function (event) {
    this.currentRoute = location.hash.slice(1)
    if (this.routes[this.currentRoute]) {
      this.updateMenu()

      this.routes[this.currentRoute].render()
    } else {
      /// 404 - ei olnud
    }
  },
  
  updateMenu: function () {
    // http://stackoverflow.com/questions/195951/change-an-elements-class-with-javascript
    document.querySelector('.active-menu').className = document.querySelector('.active-menu').className.replace('active-menu', '')
    document.querySelector('.' + this.currentRoute).className += ' active-menu'
  },
}//main

/* < <   A J A X   > > */
//7days

function arrayHere1() {
  let xmlhttp = new XMLHttpRequest();
  var aadress="functions/answer1.php?q=answer1&v=date";
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          let myObj = JSON.parse(this.responseText)
          let tempLabels = []
          let tempData = []
          for (i=0; i<myObj.length; i++){
            tempLabels.push(myObj[i][0])
            tempData.push(myObj[i][1])
          }
          chartData1 = tempData.slice(-7)
          chartLabels1 = tempLabels.slice(-7)
          addData1();
          arrayHere2();
          arrayHere3();

      }
  };
  
  xmlhttp.open("GET", aadress, true);
  xmlhttp.send()
}

function arrayHere2() {
  let xmlhttp = new XMLHttpRequest();
  var aadress="functions/answer1.php?q=answer2&v=date";
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          let myObj = JSON.parse(this.responseText)
          let tempLabels = []
          let tempData = []
          for (i=0; i<myObj.length; i++){
            tempLabels.push(myObj[i][0])
            tempData.push(myObj[i][1])
          }
          chartData2 = tempData.slice(-7)
          chartLabels1 = tempLabels.slice(-7)
          addData2();
      }
  };
  xmlhttp.open("GET", aadress, true);
  xmlhttp.send()
}

function arrayHere3() {
  let xmlhttp = new XMLHttpRequest();
  var aadress="functions/answer1.php?q=answer3&v=date";
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          let myObj = JSON.parse(this.responseText)
          let tempData = []
          let tempLabels = []
          for (i=0; i<myObj.length; i++){
            tempLabels.push(myObj[i][0])
            tempData.push(myObj[i][1])
        }
          chartData3 = tempData.slice(-7)
          chartLabels1 = tempLabels.slice(-7)
          addData3();
      }
  };
  xmlhttp.open("GET", aadress, true);
  xmlhttp.send()
}

function arrayHere4() {
  let xmlhttp = new XMLHttpRequest();
  var aadress="functions/answer1.php?q=answer4&v=date";
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          let myObj = JSON.parse(this.responseText)
          let newPieChartLabels = []
          let newPieChartData = []
          for (i=0; i<myObj.length; i++){
            newPieChartLabels.push(myObj[i][0])
            newPieChartData.push(myObj[i][1])
          }
          pieChartData = newPieChartData
          pieChartLabels = newPieChartLabels
          addData4();
      }
  };
  xmlhttp.open("GET", aadress, true);
  xmlhttp.send()
}

function arrayHere6() {
  let xmlhttp = new XMLHttpRequest();
  var aadress="functions/answer1.php?q=answer1&v=date";
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          let myObj = JSON.parse(this.responseText)
          let tempLabels = []
          let tempData = []
          for (i=0; i<myObj.length; i++){
            tempLabels.push(myObj[i][0])
            tempData.push(myObj[i][1])
          }
          chartData6 = tempData.slice(-30)
          chartLabels6 = tempLabels.slice(-30)
          addData6();
          arrayHere7();
          arrayHere8();
      }
  };
  xmlhttp.open("GET", aadress, true);
  xmlhttp.send()
}

function arrayHere7() {
  let xmlhttp = new XMLHttpRequest();
  var aadress="functions/answer1.php?q=answer2&v=date";
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          let myObj = JSON.parse(this.responseText)
          let tempLabels = []
          let tempData = []
          for (i=0; i<myObj.length; i++){
            tempLabels.push(myObj[i][0])
            tempData.push(myObj[i][1])
          }
          chartData7 = tempData.slice(-30)
          chartLabels6 = tempLabels.slice(-30)
          addData7();
      }
  };
  xmlhttp.open("GET", aadress, true);
  xmlhttp.send()
}

function arrayHere8() {
  let xmlhttp = new XMLHttpRequest();
  var aadress="functions/answer1.php?q=answer3&v=date";
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          let myObj = JSON.parse(this.responseText)
          let tempData = []
          let tempLabels = []
          for (i=0; i<myObj.length; i++){
            tempLabels.push(myObj[i][0])
            tempData.push(myObj[i][1])
        }
          chartData8 = tempData.slice(-30)
          chartLabels6 = tempLabels.slice(-30)
          addData8();
      }
  };
  xmlhttp.open("GET", aadress, true);
  xmlhttp.send()
}

/*   C H A R T S   */

ctx = document.getElementById('myPieChart').getContext('2d');
let myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    datasets: [{
      data: [ansYes, ansNo],
      backgroundColor: [
        'rgb(25, 99, 132)',
        'rgb(255,140,0)',
      ],
      label: 'Kas ma sooritasin oma meelistegevust?'
    }],
    labels: ["ei", "jah"],
  },
  options: {
    responsive: true,
    title: {
      display: true,
      text: 'Kas ma sooritasin oma meelistegevust?'
    }
  }
});

ctx = document.getElementById('myChart1').getContext('2d');
let chart1 = new Chart(ctx, {
  // The type of chart we want to create
  type: 'line',
  // The data for our dataset
  data: {
    labels: chartLabels1,
    datasets: [{
      label: "Mil määral ma tajun, et mu meelistegevuse sooritamine arvutis on kontrolli all?",
    borderColor: 'rgb(25, 99, 132)',
    data: chartData1,
    "fill": false,
    }, { 
      label: "Kui tugevalt hindan meelistegevust sooritada täna?",
      borderColor: 'rgb(255,140,0)',
      data: chartData2,
      "fill": false,
    }, {
    label: "Kui tõenäoliselt ma suudan soovile meelistegevust (liigselt) sooritada vastu seista?",
    borderColor: 'rgb(75, 16, 30)',
    data: chartData3,
    "fill": false,
    }
  ]},
// Configuration options go here
  options: {
    spangap: false,
    animation: {
      duration: 0,
      },
    hover: {
      animationDuration: 0,
      },
    responsiveAnimationDuration: 0,
    scales: {
      yAxes: [{
        ticks: {
          min: 0,
          max: 5,
          stepSize: 1,
          callback: function(label, index, labels){
            switch (label) {
              case 0:
                return 'Üldiselt mitte';
              case 1:
                return 'Vähe';  
              case 2:
                return 'Keskmiselt';
              case 3:
                return 'Palju';
              case 4:
                return 'Täiesti';
              case 5:
                return '';
            }
          }
        }
      }]
    }
  }
});

function addData1(){
  chart1.data.datasets[0].data = chartData1;
  chart1.data.labels = chartLabels1;
  chart1.update();
};
function addData2(){
  chart1.data.datasets[1].data = chartData2;
  chart1.data.labels = chartLabels1;
  chart1.update();
};
function addData3(){
  chart1.data.datasets[2].data = chartData3;
  chart1.data.labels = chartLabels1;
  chart1.update();
};
function addData6(){
  chart1.data.datasets[0].data = chartData6;
  chart1.data.labels = chartLabels6;
  chart1.update();
};
function addData7(){
  chart1.data.datasets[1].data = chartData7;
  chart1.data.labels = chartLabels6;
  chart1.update();
};
function addData8(){
  chart1.data.datasets[2].data = chartData8;
  chart1.data.labels = chartLabels6;
  chart1.update();
};

function addData4(){
  let one = 0;
  let otherone = 0;
  for(let i = 0; i < pieChartData.length; ++i){
    if(pieChartData[i] === 1) 
      one++;
  } 
  for(let i = 0; i < pieChartData.length; ++i){
    if(pieChartData[i] === 0) 
      otherone++;
  } 
  ansYes = one;
  ansNo = otherone;
  myPieChart.data.datasets[0].data[0] = ansYes;
  myPieChart.data.datasets[0].data[1] = ansNo;
  myPieChart.update();
}

function noEntry(){

  if(document.getElementById("datesToSelect1").childNodes.length < 2 || document.getElementById("datesToSelect2").childNodes.length < 2){
    document.getElementById("noEntrys").innerHTML = '(Sul ei ole veel piisavalt sissekandeid, et siia midagi kuvada)';
    }
}

window.onload = function () {
  const app = new MainApp()
  window.app = app
  arrayHere1()
  arrayHere2()
  arrayHere3()
  arrayHere4()
  
  noEntry()
}