
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
    }
  },
  'app-view': {
    'render': function () {
      console.log('paevik')
    }
  },
  'user-view': {
    'render': function () {
      console.log('user')
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

ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
  // The type of chart we want to create
  type: 'line',
  // The data for our dataset
  data: {
    labels: ["10.06.2018", "11.06.2018", "12.06.2018", "13.06.2018", "14.06.2018",],
    datasets: [{
      label: "Keskmine",
      borderColor: 'rgb(25, 99, 132)',
      data: [1, 2, 5, 3, 4],
      "fill": false,
      }]
  },
// Configuration options go here
  options: {
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
          beginAtZero:true
        }
      }]
    }
  }
});

window.onload = function () {
  const app = new MainApp()
  window.app = app
}