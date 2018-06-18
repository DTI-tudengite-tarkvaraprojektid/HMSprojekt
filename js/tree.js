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
var Answer61=null, Answer62=null, Answer7=null, Answer8=null, type=null;

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
	
	console.log(Answer1);
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
	
	console.log(Answer2);
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
	
	console.log(Answer3);
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
		document.getElementById("section8").style.visibility = "hidden";
		document.getElementById("section61").style.visibility = "hidden";
		document.getElementById("section62").style.visibility = "hidden";
		document.getElementById("button7").style.visibility = "hidden";
		document.getElementById("otherValue").style.visibility = "hidden";
		document.getElementById("end2").style.visibility = "hidden";
		document.getElementById("send2").style.visibility = "hidden";
		document.getElementById("send1").addEventListener("click", send1);
		Answer4 = "1";
    }
	
	console.log(Answer4);
}

function button5() {
	if(document.getElementById("send1").value==1){	
		document.getElementById("button61").addEventListener("click", button61);
		document.getElementById("section61").style.visibility = "visible";
		
		console.log("Arvuti");
	}
	if(document.getElementById("send1").value==2){	
		document.getElementById("button62").addEventListener("click", button62);
		document.getElementById("section62").style.visibility = "visible";
		console.log("Mängur");
	}
	
	document.getElementById("button5").style.visibility = "visible";	
	Answer5 = document.getElementById("hours").value*60 + parseInt(document.getElementById("minutes").value);
	
	console.log(Answer5);
}

function button61() {	
	if(document.getElementById("hours").value!=0 || document.getElementById("minutes").value!=0){
		document.getElementById("button7").addEventListener("click", button7);
		document.getElementById("section7").style.visibility = "visible";
		
		if(document.getElementById("reasons1").checked == true){
			document.getElementById("section7").style.visibility = "visible";
			document.getElementById("button7").style.visibility = "visible";
			Answer61 = document.getElementById("reasons1").value;
		}
		if(document.getElementById("reasons2").checked == true){
			document.getElementById("section7").style.visibility = "visible";
			document.getElementById("button7").style.visibility = "visible";
			Answer61 = document.getElementById("reasons2").value;
		}
		if(document.getElementById("reasons3").checked == true){
			document.getElementById("section7").style.visibility = "visible";
			document.getElementById("button7").style.visibility = "visible";
			Answer61 = document.getElementById("reasons3").value;
		}
		if(document.getElementById("reasons4").checked == true){
			document.getElementById("section7").style.visibility = "visible";
			document.getElementById("button7").style.visibility = "visible";
			Answer61 = document.getElementById("reasons4").value;
		}
		if(document.getElementById("reasons5").checked == true){
			document.getElementById("section7").style.visibility = "visible";
			document.getElementById("button7").style.visibility = "visible";
			Answer61 = document.getElementById("reasons5").value;
		}
		if(document.getElementById("reasons6").checked == true){
			document.getElementById("section7").style.visibility = "visible";
			document.getElementById("button7").style.visibility = "visible";
			Answer61 = document.getElementById("reasons6").value;
		}
		if(document.getElementById("reasons7").checked == true){
			document.getElementById("section7").style.visibility = "visible";
			document.getElementById("button7").style.visibility = "visible";
			Answer61 = document.getElementById("reasons7").value;
		}
		if(document.getElementById("reasons8").checked == true){
			document.getElementById("section7").style.visibility = "visible";
			document.getElementById("button7").style.visibility = "visible";
			Answer61 = document.getElementById("otherValue").value;
		}
	}
	
	console.log(Answer61);
}

function button62() {
	if(document.getElementById("money").value!=0){
		document.getElementById("button7").addEventListener("click", button7);
		document.getElementById("section7").style.visibility = "visible";
		document.getElementById("button7").style.visibility = "visible";
		Answer62 = document.getElementById("money").value;
	}
	
	console.log(Answer62);
}

function button7() {
	document.getElementById("section8").style.visibility = "visible";
	Answer7 = document.getElementById("answer7").value;
	
	console.log(Answer7);
}

function button8() {
	document.getElementById("send2").addEventListener("click", send2);
	document.getElementById("end2").style.visibility = "visible";
	document.getElementById("send2").style.visibility = "visible";
	if(document.getElementById("answer81").checked == true){
		document.getElementById("section2").style.visibility = "visible";
		Answer8 = "0";
	}
	if(document.getElementById("answer82").checked == true){
		document.getElementById("section2").style.visibility = "visible";
		Answer8 = "1";
	}
	if(document.getElementById("answer83").checked == true){
		document.getElementById("section2").style.visibility = "visible";
		Answer8 = "3";
	}
	if(document.getElementById("answer84").checked == true){
		document.getElementById("section2").style.visibility = "visible";
		Answer8 = "4";
	}
	if(document.getElementById("answer85").checked == true){
		document.getElementById("section2").style.visibility = "visible";
		Answer8 = "4";
	}
	
	console.log(Answer8);
}

function send1(){
	type = document.getElementById("send1").value;
	console.log(type);
	var xhr=new XMLHttpRequest();
	var aadress="functions/send1.php?type="+type+"&a1="+Answer1+"&a2="+Answer2+"&a3="+Answer3+"&a4="+Answer4;
	xhr.open("GET", aadress, true);
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
		}
	}
	console.log(Answer1);
	console.log(Answer2);
	console.log(Answer3);
	console.log(Answer4);
	xhr.send();
	window.location.href='main.php';
}

function send2(){
	type = document.getElementById("send2").value;
	var xhr=new XMLHttpRequest();
	if(type==1){
		var aadress="functions/send2.php?type="+type+"&a1="+Answer1+"&a2="+Answer2+"&a3="+Answer3+"&a4="+Answer4+"&a5="+Answer5+"&a61="+Answer61+"&a7="+Answer7+"&a8="+Answer8;
	}
	if(type==2){
		var aadress="functions/send2.php?type="+type+"&a1="+Answer1+"&a2="+Answer2+"&a3="+Answer3+"&a4="+Answer4+"&a5="+Answer5+"&a62="+Answer62+"&a7="+Answer7+"&a8="+Answer8;
	}
	xhr.open("GET", aadress, true);
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
		}
	}
	xhr.send();
	window.location.href='main.php';
}
