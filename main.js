
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
  }

}//main

/*new Chartist.Line('.ct-chart', {
  labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
  series: [
    //[2, 3, 2, 4, 5, 3],
    [0, 2.5, 3, 2, 3, 1],
    //[1, 2, 3, 4, 1, 5],
    [1, ,2, 3, 4, 5, 2],
  ]
}, {
  width: 600,
  height: 300
});//chartist.js*/

function diaryEntry() {
	var xhr=new XMLHttpRequest();
	var aadress="diaryentry.php";
	xhr.open("GET", aadress, true);	
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
			document.getElementById("diaryAnswers").innerHTML = this.responseText;
		}
	}
	xhr.send();
}

window.onload = function () {
  const app = new MainApp()
  window.app = app
}

