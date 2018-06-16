window.onload = function () {
	document.getElementById("start").style.visibility = "hidden";
	document.getElementById("send1").style.visibility = "hidden";
	document.getElementById("send2").style.visibility = "hidden";
	
	var otherCheckbox = document.querySelector('input[value="Midagi muud"]');
	var otherText = document.querySelector('input[id="otherValue"]');
	otherText.style.visibility = 'hidden';

	otherCheckbox.onchange = function() {
	  if(otherCheckbox.checked) {
		otherText.style.visibility = 'visible';
		otherText.value = '';
	  } else {
		otherText.style.visibility = 'hidden';
	  }
	};
}

var Answer1=null, Answer2=null, Answer3=null, Answer4=null, Answer5=null;
var Answer6=null, Answer7=null;

function button1() {
	if(document.getElementById("answer11").checked == true){
		document.getElementById("section2").style.visibility = "visible";
		Answer1 = "0";
	}
	if(document.getElementById("answer12").checked == true){
		document.getElementById("section2").style.visibility = "visible";
		Answer1 = "1";
	}
	if(document.getElementById("answer13").checked == true){
		document.getElementById("section2").style.visibility = "visible";
		Answer1 = "2";
	}
	if(document.getElementById("answer14").checked == true){
		document.getElementById("section2").style.visibility = "visible";
		Answer1 = "3";
	}
	if(document.getElementById("answer15").checked == true){
		document.getElementById("section2").style.visibility = "visible";
		Answer1 = "4";
	}
}

function button2() {
	if(document.getElementById("answer21").checked == true){
		document.getElementById("section3").style.visibility = "visible";
		Answer2 = "0";
	}
	if(document.getElementById("answer22").checked == true){
		document.getElementById("section3").style.visibility = "visible";
		Answer2 = "1";
	}
	if(document.getElementById("answer23").checked == true){
		document.getElementById("section3").style.visibility = "visible";
		Answer2 = "2";
	}
	if(document.getElementById("answer24").checked == true){
		document.getElementById("section3").style.visibility = "visible";
		Answer2 = "3";
	}
	if(document.getElementById("answer25").checked == true){
		document.getElementById("section3").style.visibility = "visible";
		Answer2 = "4";
	}
}

function button3() {
	if(document.getElementById("answer31").checked == true){
		document.getElementById("section4").style.visibility = "visible";
		Answer3 = "0";
	}
	if(document.getElementById("answer32").checked == true){
		document.getElementById("section4").style.visibility = "visible";
		Answer3 = "1";
	}
	if(document.getElementById("answer33").checked == true){
		document.getElementById("section4").style.visibility = "visible";
		Answer3 = "2";
	}
	if(document.getElementById("answer34").checked == true){
		document.getElementById("section4").style.visibility = "visible";
		Answer3 = "3";
	}
	if(document.getElementById("answer35").checked == true){
		document.getElementById("section4").style.visibility = "visible";
		Answer3 = "4";
	}
}

function button4() {
    if(document.getElementById("answer41").checked == true){
		document.getElementById("end1").style.visibility = "hidden"; 
		document.getElementById("send1").style.visibility = "hidden";
        document.getElementById("section5").style.visibility = "visible";
		document.getElementById("button5").style.visibility = "visible";
		Answer4 = "0";
    }
    if(document.getElementById("answer42").checked == true){
        document.getElementById("end1").style.visibility = "visible"; 
		document.getElementById("send1").style.visibility = "visible";
		document.getElementById("section5").style.visibility = "hidden";
		document.getElementById("button5").style.visibility = "hidden";
		document.getElementById("section7").style.visibility = "hidden";
		document.getElementById("section6").style.visibility = "hidden";
		document.getElementById("button7").style.visibility = "hidden";
		document.getElementById("otherValue").style.visibility = "hidden";
		document.getElementById("end2").style.visibility = "hidden";
		document.getElementById("send2").style.visibility = "hidden";
		document.getElementById("send1").addEventListener("click", send1);
		Answer4 = "1";
    }
}

function button5() {
	document.getElementById("button6").addEventListener("click", button6);
    if(document.getElementById("hours").value!=0 || document.getElementById("minutes").value!=0){
		document.getElementById("button6").addEventListener("click", button6);
		document.getElementById("button5").style.visibility = "visible";
		document.getElementById("section6").style.visibility = "visible";
		Answer5 = document.getElementById("hours").value*60 + parseInt(document.getElementById("minutes").value);
    }
}

function button6() {
	document.getElementById("section7").style.visibility = "visible";
	document.getElementById("button7").style.visibility = "visible";
    Answer6 = document.getElementById("reasons").value;
}

function button7() {
    if(document.getElementById("answer7").value != ""){
        document.getElementById("end2").style.visibility = "visible";
		document.getElementById("send2").style.visibility = "visible";
		document.getElementById("send2").addEventListener("click", send2);
		Answer7 = document.getElementById("answer7").value;
    }
}

function send1(){
	var xhr=new XMLHttpRequest();
	var aadress="../functions/send1.php?a1="+Answer1+"&a2="+Answer2+"&a3="+Answer3+"&a4="+Answer4;
	xhr.open("GET", aadress, true);
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
		}
	}
	xhr.send();
	window.location.href='main.php';
}

function send2(){
	var xhr=new XMLHttpRequest();
	var aadress="../functions/send2.php?a1="+Answer1+"&a2="+Answer2+"&a3="+Answer3+"&a4="+Answer4+"&a5="+Answer5+"&a6="+Answer6+"&a7="+Answer7;
	xhr.open("GET", aadress, true);
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
		}
	}
	xhr.send();
	window.location.href='main.php';
}
