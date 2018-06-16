function starter(){
  document.getElementById("entrys1").addEventListener("click", entrys);
  document.getElementById("usersCount1").addEventListener("click", usersCount);
  document.getElementById("sendAverage").addEventListener("click", sendAverage);
  document.getElementById("sendMinimum").addEventListener("click", sendMinimum);
  document.getElementById("sendMaximum").addEventListener("click", sendMaximum);
  document.getElementById("sendFrequencys").addEventListener("click", sendFrequencys);
}

var id = null, date = null, idchoice2 = null, answerNr1 = null;
var idchoice3 = null, answerNr2 = null, idchoice4 = null, answerNr3 = null;
var idchoice5 = null, answerNr4 = null;

function entrys() {
	var xhr=new XMLHttpRequest();
	var aadress="../functions/entrys.php";
	xhr.open("GET", aadress, true);	
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
			document.getElementById("entrys").innerHTML = this.responseText;
		}
	}
	xhr.send();
}

function diaryEntry(n) {
	let allInputs = document.getElementById("datesToSelect"+n).getElementsByTagName("input");
	
	let selectedDates = [];
	for(let i = 0; i < allInputs.length; i ++){
		if(allInputs[i].checked){
			selectedDates.push(allInputs[i].value);
		}
	}
	//console.log(selectedDates);
	var xhr=new XMLHttpRequest();
	//var aadress="diaryentry.php?dates="+selectedDates.join(",");
	var aadress="functions/diaryentry.php?t="+n+"&dates="+selectedDates;
	console.log(aadress)
    xhr.open("GET", aadress, true);	
    xhr.onreadystatechange=function(){
      if(xhr.readyState==4){
        console.log(xhr.responseText);
		document.getElementById("diaryAnswers"+n).innerHTML = this.responseText;
		document.getElementById("printBtn").style.visibility = "visible";
      }
    }
	xhr.send(); 
  }



 
function printDiv(eleid){
    var PW = window.open('', '_blank', 'Print content');
 
    PW.document.write('<link rel="stylesheet" type="text/css" href="css/style.css"/>');
 
    PW.document.write(document.getElementById(eleid).innerHTML);
    PW.document.close();
    PW.focus();
    PW.print();
    PW.close();
}


function usersCount() {
	var xhr=new XMLHttpRequest();
	var aadress="../functions/userscount.php";
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
	var aadress="../functions/average.php?a1="+id+"&a2="+answerNr1;
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
	var aadress="../functions/minimum.php?a1="+id+"&a2="+answerNr2;
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
	var aadress="../functions/maximum.php?a1="+id+"&a2="+answerNr3;
	xhr.open("GET", aadress, true);	
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
			document.getElementById("maximum").innerHTML = this.responseText;
		}
	}
	xhr.send();
}

function sendFrequencys() {
	id = document.getElementById("idchoice5").value;
	answerNr4 = document.getElementById("answerNr4").value;
	var xhr=new XMLHttpRequest();
	var aadress="../functions/frequencys.php?a1="+id+"&a2="+answerNr4;
	xhr.open("GET", aadress, true);	
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
			document.getElementById("frequencys").innerHTML = this.responseText;
		}
	}
	xhr.send();
}