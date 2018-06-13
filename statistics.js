function starter(){
  document.getElementById("diaryEntry").addEventListener("click", diaryEntry);
  document.getElementById("entrys1").addEventListener("click", entrys);
  document.getElementById("usersCount1").addEventListener("click", usersCount);
  document.getElementById("sendAverage").addEventListener("click", sendAverage);
  document.getElementById("sendMinimum").addEventListener("click", sendMinimum);
  document.getElementById("sendMaximum").addEventListener("click", sendMaximum);
}

var id = null, date = null, idchoice2 = null, answerNr1 = null;
var idchoice3 = null, answerNr2 = null, idchoice4 = null, answerNr3 = null;

function entrys() {
	var xhr=new XMLHttpRequest();
	var aadress="entrys.php";
	xhr.open("GET", aadress, true);	
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
			document.getElementById("entrys").innerHTML = this.responseText;
		}
	}
	xhr.send();
}

function diaryEntry() {
	let allInputs = document.getElementById("datesToSelect").getElementsByTagName("input");
	
	let selectedDates = [];
	for(let i = 0; i < allInputs.length; i ++){
		if(allInputs[i].checked){
			selectedDates.push(allInputs[i].value);
		}
	}
	//console.log(selectedDates);
	var xhr=new XMLHttpRequest();
    var aadress="diaryentry.php?dates="+selectedDates;
    xhr.open("GET", aadress, true);	
    xhr.onreadystatechange=function(){
      if(xhr.readyState==4){
        console.log(xhr.responseText);
        document.getElementById("diaryAnswers").innerHTML = this.responseText;
      }
    }
	xhr.send(); 
  }

function usersCount() {
	var xhr=new XMLHttpRequest();
	var aadress="userscount.php";
	xhr.open("GET", aadress, true);	
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
			document.getElementById("usersCount").innerHTML = this.responseText;
		}
	}
	xhr.send();
}

function sendAverage() {
	id = document.getElementById("idchoice2").value;
	answerNr1 = document.getElementById("answerNr1").value;
	var xhr=new XMLHttpRequest();
	var aadress="average.php?a1="+id+"&a2="+answerNr1;
	xhr.open("GET", aadress, true);	
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
			document.getElementById("average").innerHTML = this.responseText;
		}
	}
	xhr.send();
}

function sendMinimum() {
	id = document.getElementById("idchoice3").value;
	answerNr2 = document.getElementById("answerNr2").value;
	var xhr=new XMLHttpRequest();
	var aadress="minimum.php?a1="+id+"&a2="+answerNr2;
	xhr.open("GET", aadress, true);	
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
			document.getElementById("minimum").innerHTML = this.responseText;
		}
	}
	xhr.send();
}

function sendMaximum() {
	id = document.getElementById("idchoice4").value;
	answerNr3 = document.getElementById("answerNr3").value;
	var xhr=new XMLHttpRequest();
	var aadress="maximum.php?a1="+id+"&a2="+answerNr3;
	xhr.open("GET", aadress, true);	
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
			document.getElementById("maximum").innerHTML = this.responseText;
		}
	}
	xhr.send();
}