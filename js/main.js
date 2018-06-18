let ctx;
let chartLabels = [];
let chartData = [];
var test1 = [3, 3, 1, 2, 3];
var testMonth2 = ["7.06.2018", "8.06.2018", "9.06.2018", "10.06.2018", "11.06.2018"];

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
      console.log('home')
      document 
      .querySelector('#arrayHere1') 
      .addEventListener('click', arrayHere1)
      document 
      .querySelector('#arrayHere2') 
      .addEventListener('click', arrayHere2)
      document 
      .querySelector('#arrayHere3') 
      .addEventListener('click', arrayHere3)
      document 
      .querySelector('#arrayHere4') 
      .addEventListener('click', arrayHere4)
      document 
      .querySelector('#addData') 
      .addEventListener('click', addData) 

      //window.addEventListener('click', loadData)
    }
  },
  'diary-view': {
    'render': function () {
      console.log('paevik')
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

function arrayHere1() {
  let xmlhttp = new XMLHttpRequest();
  var aadress="functions/answer1.php?q=answer1&v=date";
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          let myObj = JSON.parse(this.responseText)
          let chartLabels = []
          let chartData = []
          for (i=0; i<myObj.length; i++){
            chartLabels.push(myObj[i][0])
            chartData.push(myObj[i][1])
          }
          console.log(chartData)
          console.log(chartLabels)
          //console.log(JSON.parse(xmlhttp.responseText))
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
          let chartLabels = []
          let chartData = []
          for (i=0; i<myObj.length; i++){
            chartLabels.push(myObj[i][0])
            chartData.push(myObj[i][1])
          }
          for (i=0; i<chartLabels.length; i++){
            chartLabels.push(myObj[i][0])
          }
          console.log(chartData)
          console.log(chartLabels)
          //console.log(JSON.parse(xmlhttp.responseText))
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
          let chartLabels = []
          let chartData = []
          for (i=0; i<myObj.length; i++){
            chartLabels.push(myObj[i][0])
            chartData.push(myObj[i][1])
          }
          console.log(chartData)
          console.log(chartLabels)
          //console.log(JSON.parse(xmlhttp.responseText))
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
          let chartLabels = []
          let chartData = []
          for (i=0; i<myObj.length; i++){
            chartLabels.push(myObj[i][0])
            chartData.push(myObj[i][1])
          }
          console.log(chartData)
          console.log(chartLabels)
          //console.log(JSON.parse(xmlhttp.responseText))
      }
  };
  xmlhttp.open("GET", aadress, true);
  xmlhttp.send()
}


/* < <  C H A R T S   > > */

ctx = document.getElementById('myChart').getContext('2d');
let chart1 = new Chart(ctx, {
  // The type of chart we want to create
  type: 'line',
  // The data for our dataset
  data: {
    labels: ["2018-06-17 20:38:53", "2018-06-17 20:39:47"],
    datasets: [{
      label: "Mil määral ma tajun, et mu meelistegevuse sooritamine arvutis on kontrolli all?",
      borderColor: 'rgb(25, 99, 132)',
      data: chartData,
      "fill": false,
      }]
  },
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
          max: 4,
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
            }
          }
        }
      }]
    }
  }
});




ctx = document.getElementById('myChart2').getContext('2d');
let chart2 = new Chart(ctx, {
  // The type of chart we want to create
  type: 'line',
  // The data for our dataset
  data: {
    labels: testMonth2,
    datasets: [{
      label: "Kui tugevalt hindan meelistegevust sooritada?",
      borderColor: 'rgb(255,140,0)',
      data: test1,
      "fill": false,
      }]
  },
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
          max: 4,
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
            }
          }
        }
      }]
    }
  } 
});

// none of these update types work...

/*function addData(chart1) {
  chart1.data.datasets[0].label = 'new title';
  chart1.update();
}*/

function addData(chart1){
  chart1.data.datasets[0].data = chartData;
  chart1.data.labels[0] = chartLabels;
  chart1.update();
  console.log(chartData)
};

/*function addData(chart2) {
  chart2.data.labels.pop();
  chart2.data.datasets.forEach((dataset) => {
      dataset.data.pop();
  });
  chart2.update();
  chart.update();
};*/

/*function addData(chart1, data, labels) {
  chart1.data.label.push = 'new title';
  chart1.update();
}*/

/*function addData(chart1, chartLabels, chartData) {
  console.log(labels)
  chart1.data.labels.push(chartLabels);
  chart1.data.datasets.forEach((dataset) => {
      dataset.data.push(chartData);
  });
  chart.update();
}*/

/*function loadData () {
  // after typing init autosave
  
    const doneClicking = 1000
  
    if (timer) { clearTimeout(timer) }
    timer = window.setTimeout(function () {
      // TODO check if really changed
      saveLocal()
      console.log('loadData')
    }, doneClicking)
  }*/

window.onload = function () {
  const app = new MainApp()
  window.app = app
}