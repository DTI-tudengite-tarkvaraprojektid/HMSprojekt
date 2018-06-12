document.getElementById("button1").addEventListener("click", button1);

window.onload = function () {
	document.getElementById("start").style.visibility = "hidden";
	document.getElementById("send1").style.visibility = "hidden";
	document.getElementById("send2").style.visibility = "hidden";
}

var Answer1=null, Answer2=null, Answer3=null, Answer4=null, Answer5=null;
var Answer61=null, Answer62=null, Answer63=null, Answer7=null;
var otsitav=null, muudetav=null;

function button1() {
	document.getElementById("button2").addEventListener("click", button2);
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
	document.getElementById("button3").addEventListener("click", button3);
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
	document.getElementById("button4").addEventListener("click", button4);
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
	document.getElementById("button5").addEventListener("click", button5);
	document.getElementById("send1").addEventListener("click", send1);
    if(document.getElementById("answer41").checked == true){
        document.getElementById("section5").style.visibility = "visible";
		document.getElementById("end1").style.visibility = "hidden";
		Answer4 = "0";
    }
    if(document.getElementById("answer42").checked == true){
        document.getElementById("end1").style.visibility = "visible"; 
		document.getElementById("send1").style.visibility = "visible";
		Answer4 = "1";
    }
}

function button5() {
	document.getElementById("button61").addEventListener("click", button61);
    if(document.getElementById("hours").value!=0 || document.getElementById("minutes").value!=0){
        document.getElementById("section61").style.visibility = "visible";
		Answer5 = document.getElementById("hours").value*60 + parseInt(document.getElementById("minutes").value);
    }
}

function button61() {
	document.getElementById("button62").addEventListener("click", button62);
    if(document.getElementById("answer61").checked == true){
        document.getElementById("section62").style.visibility = "visible";
		Answer61 = "0";
    }
    if(document.getElementById("answer62").checked == true){
        document.getElementById("section7").style.visibility = "visible";
		Answer61 = "1";
    }
}

function button62() {
	document.getElementById("button63").addEventListener("click", button63);
    if(document.getElementById("reasons").value == "Midagi muud"){
        document.getElementById("section63").style.visibility = "visible";
		Answer62 = document.getElementById("reasons").value;
    }else{
        document.getElementById("section7").style.visibility = "visible";
		Answer62 = document.getElementById("reasons").value;
    }
}

function button63() {
	document.getElementById("button7").addEventListener("click", button7);
    if(document.getElementById("newreason").value != ""){
        document.getElementById("section7").style.visibility = "visible";
		Answer63 = document.getElementById("newreason").value;
    }
}

function button7() {
	document.getElementById("send2").addEventListener("click", send2);
    if(document.getElementById("answer7").value != ""){
        document.getElementById("end2").style.visibility = "visible";
		document.getElementById("send2").style.visibility = "visible";
		Answer7 = document.getElementById("answer7").value;
    }
}

function send1(){
	var xhr=new XMLHttpRequest();
	var aadress="send1.php?a1="+Answer1+"&a2="+Answer2+"&a3="+Answer3+"&a4="+Answer4;
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
	var aadress="send2.php?a1="+Answer1+"&a2="+Answer2+"&a3="+Answer3+"&a4="+Answer4+"&a5="+Answer5+"&a61="+Answer61+"&a62="+Answer62+"&a63="+Answer63+"&a7="+Answer7;
	xhr.open("GET", aadress, true);
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
		}
	}	
	xhr.send();
	window.location.href='main.php';
}
