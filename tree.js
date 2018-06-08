window.onload = function () {
	document.getElementById("start").style.visibility = "hidden";
}

function button1() {
	if(document.getElementById("answer11").checked == true){
		document.getElementById("section2").style.visibility = "visible";
		var Answer1 = "1";
	}
	if(document.getElementById("answer12").checked == true){
		document.getElementById("section2").style.visibility = "visible";
		var Answer1 = "2";
	}
	if(document.getElementById("answer13").checked == true){
		document.getElementById("section2").style.visibility = "visible";
		var Answer1 = "3";
	}
	if(document.getElementById("answer14").checked == true){
		document.getElementById("section2").style.visibility = "visible";
		var Answer1 = "4";
	}
	if(document.getElementById("answer15").checked == true){
		document.getElementById("section2").style.visibility = "visible";
		var Answer1 = "5";
	}
}

function button2() {
	if(document.getElementById("answer21").checked == true){
		document.getElementById("section3").style.visibility = "visible";
		var Answer2 = "0";
	}
	if(document.getElementById("answer22").checked == true){
		document.getElementById("section3").style.visibility = "visible";
		var Answer2 = "1";
	}
	if(document.getElementById("answer23").checked == true){
		document.getElementById("section3").style.visibility = "visible";
		var Answer2 = "2";
	}
	if(document.getElementById("answer24").checked == true){
		document.getElementById("section3").style.visibility = "visible";
		var Answer2 = "3";
	}
	if(document.getElementById("answer25").checked == true){
		document.getElementById("section3").style.visibility = "visible";
		var Answer2 = "4";
	}
}

function button3() {
	if(document.getElementById("answer31").checked == true){
		document.getElementById("section4").style.visibility = "visible";
		var Answer3 = "0";
	}
	if(document.getElementById("answer32").checked == true){
		document.getElementById("section4").style.visibility = "visible";
		var Answer3 = "1";
	}
	if(document.getElementById("answer33").checked == true){
		document.getElementById("section4").style.visibility = "visible";
		var Answer3 = "2";
	}
	if(document.getElementById("answer34").checked == true){
		document.getElementById("section4").style.visibility = "visible";
		var Answer3 = "3";
	}
	if(document.getElementById("answer35").checked == true){
		document.getElementById("section4").style.visibility = "visible";
		var Answer3 = "4";
	}
}

function button4() {
    if(document.getElementById("answer41").checked == true){
        document.getElementById("section5").style.visibility = "visible";
		document.getElementById("end1").style.visibility = "hidden";
		var Answer4 = "0";
    }
    if(document.getElementById("answer42").checked == true){
        document.getElementById("end1").style.visibility = "visible"; 
		var Answer4 = "1";
    }
}

function button5() {
    if(document.getElementById("hours").value!=0 || document.getElementById("minutes").value!=0){
        document.getElementById("section61").style.visibility = "visible";
		var Answer5 = document.getElementById("hours").value*60 + parseInt(document.getElementById("minutes").value);
    }
}

function button61() {
    if(document.getElementById("answer61").checked == true){
        document.getElementById("section62").style.visibility = "visible";
		var Answer61 = "0";
    }
    if(document.getElementById("answer62").checked == true){
        document.getElementById("section7").style.visibility = "visible";
		var Answer61 = "1";
    }
}

function button62() {
    if(document.getElementById("reasons").value == "Midagi muud"){
        document.getElementById("section63").style.visibility = "visible";
		var Answer62 = document.getElementById("reasons").value;
    }else{
        document.getElementById("section7").style.visibility = "visible";
		var Answer62 = document.getElementById("reasons").value;
    }
}

function button63() {
    if(document.getElementById("newreason").value != ""){
        document.getElementById("section7").style.visibility = "visible";
		var Answer63 = document.getElementById("newreason").value;
    }
}

function button7() {
    if(document.getElementById("answer7").value != ""){
        document.getElementById("end2").style.visibility = "visible";
		var Answer7 = document.getElementById("answer7").value;
    }
}



