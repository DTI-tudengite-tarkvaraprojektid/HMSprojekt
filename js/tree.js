window.onload = function () {
	document.getElementById("section2").style.display = "none";
	document.getElementById("section3").style.display = "none";
	document.getElementById("section4").style.display = "none";
	document.getElementById("section5").style.display = "none";
	document.getElementById("section61").style.display = "none";
	document.getElementById("section62").style.display = "none";
	document.getElementById("section7").style.display = "none";
	document.getElementById("section8").style.display = "none";
	document.getElementById("send1").style.display = "none";
	document.getElementById("send2").style.display = "none";
	document.getElementById("end1").style.display = "none";
	document.getElementById("end2").style.display = "none";
	
	if(document.getElementById("send1").value=="1"){
		document.getElementById("header").innerHTML = "Arvuti sõltuvuse enesejälgimise päevik";
	}else if(document.getElementById("send1").value=="2"){
		document.getElementById("header").innerHTML = "Hasartmängu sõltuvuse enesejälgimise päevik";
	}
	
	document.getElementById("goBack").addEventListener("click", goBack);
	
	var otherCheckbox = document.querySelector('input[value="Midagi muud"]');
	var otherText = document.querySelector('input[id="otherValue"]');
	otherText.style.display = 'none';

	otherCheckbox.onchange = function() {
	  if(otherCheckbox.checked) {
		otherText.style.display = 'block';
		otherText.value = '';
	  } else {
		otherText.style.display = 'none';
	  }
	};
}

var Answer1=null, Answer2=null, Answer3=null, Answer4=null, Answer5=null;
var Answer61=null, Answer62=null, Answer7=null, Answer8=null, type=null;
let allCheckboxes;

function goBack() {
	window.location.href='main.php#diary-view';
}

function button1() {
	if(document.getElementById("answer11").checked == true){
		document.getElementById("section2").style.display = "block";
		Answer1 = "0";
	}
	if(document.getElementById("answer12").checked == true){
		document.getElementById("section2").style.display = "block";
		Answer1 = "1";
	}
	if(document.getElementById("answer13").checked == true){
		document.getElementById("section2").style.display = "block";
		Answer1 = "2";
	}
	if(document.getElementById("answer14").checked == true){
		document.getElementById("section2").style.display = "block";
		Answer1 = "3";
	}
	if(document.getElementById("answer15").checked == true){
		document.getElementById("section2").style.display = "block";
		Answer1 = "4";
	}
	
	
	//console.log(Answer1);
}

function button2() {
	if(document.getElementById("answer21").checked == true){
		document.getElementById("section3").style.display = "block";
		Answer2 = "0";
	}
	if(document.getElementById("answer22").checked == true){
		document.getElementById("section3").style.display = "block";
		Answer2 = "1";
	}
	if(document.getElementById("answer23").checked == true){
		document.getElementById("section3").style.display = "block";
		Answer2 = "2";
	}
	if(document.getElementById("answer24").checked == true){
		document.getElementById("section3").style.display = "block";
		Answer2 = "3";
	}
	if(document.getElementById("answer25").checked == true){
		document.getElementById("section3").style.display = "block";
		Answer2 = "4";
	}
	
	//console.log(Answer2);
}

function button3() {
	if(document.getElementById("answer31").checked == true){
		document.getElementById("section4").style.display = "block";
		Answer3 = "0";
	}
	if(document.getElementById("answer32").checked == true){
		document.getElementById("section4").style.display = "block";
		Answer3 = "1";
	}
	if(document.getElementById("answer33").checked == true){
		document.getElementById("section4").style.display = "block";
		Answer3 = "2";
	}
	if(document.getElementById("answer34").checked == true){
		document.getElementById("section4").style.display = "block";
		Answer3 = "3";
	}
	if(document.getElementById("answer35").checked == true){
		document.getElementById("section4").style.display = "block";
		Answer3 = "4";
	}
	
	//console.log(Answer3);
}

function button4() {
    if(document.getElementById("answer41").checked == true){
        document.getElementById("section5").style.display = "block";
		document.getElementById("section7").style.display = "none";
		document.getElementById("section8").style.display = "none";
		document.getElementById("button5").style.display = "inline-block";	
		document.getElementById("end1").style.display = "none";
		document.getElementById("end2").style.display = "none";
		document.getElementById("send1").style.display = "none";
		document.getElementById("send2").style.display = "none";
		Answer4 = "0";
    }
    if(document.getElementById("answer42").checked == true){
		document.getElementById("section5").style.display = "none";
		document.getElementById("section61").style.display = "none";
		document.getElementById("section62").style.display = "none";
		document.getElementById("section7").style.display = "block";
		document.getElementById("section8").style.display = "none";
		document.getElementById("end1").style.display = "none";
		document.getElementById("end2").style.display = "none";
		document.getElementById("send1").style.display = "none";
		document.getElementById("send2").style.display = "none";
		document.getElementById("button7").addEventListener("click", button7);
		Answer4 = "1";
    }
	
	//console.log(Answer4);
}

function button5() {
	if(document.getElementById("hours").value!=0 || document.getElementById("minutes").value!=0){
		if(document.getElementById("send1").value==1){	
			document.getElementById("button61").addEventListener("click", button61);
			document.getElementById("section61").style.display = "block";
			
			console.log("Arvuti");
		}
		if(document.getElementById("send1").value==2){	
			document.getElementById("button62").addEventListener("click", button62);
			document.getElementById("section62").style.display = "block";
			console.log("Mängur");
		}
		
		document.getElementById("button5").style.display = "inline-block";	
		Answer5 = document.getElementById("hours").value*60 + parseInt(document.getElementById("minutes").value);
	}
	
	//console.log(Answer5);
}

function goneFunction() {
	
	allCheckboxes = document.getElementById("section61").getElementsByTagName("input");
	console.log(allCheckboxes.length-1);
	
	if(document.getElementById(allCheckboxes[0].id).checked == true){
		for(var i=1; i<allCheckboxes.length-1; i++){
			allCheckboxes[i].style.display = "none";
		}
	}else{
		for(var i=1; i<allCheckboxes.length-1; i++){
			allCheckboxes[i].style.display = "inline-block";
		}
	}
}

function button61() {
	allCheckboxes = document.getElementById("section61").getElementsByTagName("input");
	
	for(var i=0; i<allCheckboxes.length-1; i++){
		if(document.getElementById(allCheckboxes[i].id).checked == true){
			document.getElementById("section7").style.display = "block";
			document.getElementById("button7").style.display = "inline-block";
			if(allCheckboxes[i].id!="Midagi muud"){
				document.getElementById("button7").addEventListener("click", button7);
				document.getElementById("section7").style.display = "block";
				Answer61 = allCheckboxes[i].id;
			}else if(allCheckboxes[i].id=="Ei kannatanud"){
				goneFunction();
			}else{
				document.getElementById("button7").addEventListener("click", button7);
				document.getElementById("section7").style.display = "block";
				Answer61 = document.getElementById("otherValue").value;
			}
		}
	}
	
	//console.log(Answer61);
}

function button62() {
	if(document.getElementById("money").value!=0){
		document.getElementById("button7").addEventListener("click", button7);
		document.getElementById("section7").style.display = "block";
		document.getElementById("button7").style.display = "inline-block";
		Answer62 = document.getElementById("money").value;
	}
	
	//console.log(Answer62);
}

function button7() {
	if(document.getElementById("answer7").value!=""){
		document.getElementById("section8").style.display = "inline-block";
		Answer7 = document.getElementById("answer7").value;
	}
	
	//console.log(Answer7);
}

function button8() {
	if(Answer4=="0"){
		console.log("esimene");
		document.getElementById("end2").style.display = "block";
		document.getElementById("send2").style.display = "inline-block";
		document.getElementById("send2").addEventListener("click", send2);
	}else if(Answer4=="1"){
		console.log("teine");
		document.getElementById("end1").style.display = "block";
		document.getElementById("send1").style.display = "inline-block";
		document.getElementById("send1").addEventListener("click", send1);
	}
	if(document.getElementById("answer81").checked == true){
		if(Answer4=="0"){
			document.getElementById("end2").style.display = "block";
			document.getElementById("end1").style.display = "none";
		}else if(Answer4=="1"){
			document.getElementById("end1").style.display = "block";
			document.getElementById("end2").style.display = "none";
		}
		document.getElementById("section2").style.display = "block";
		Answer8 = "0";
	}
	if(document.getElementById("answer82").checked == true){
		if(Answer4=="0"){
			document.getElementById("end2").style.display = "block";
			document.getElementById("end1").style.display = "none";
		}else if(Answer4=="1"){
			document.getElementById("end1").style.display = "block";
			document.getElementById("end2").style.display = "none";
		}
		document.getElementById("section2").style.display = "block";
		Answer8 = "1";
	}
	if(document.getElementById("answer83").checked == true){
		if(Answer4=="0"){
			document.getElementById("end2").style.display = "block";
			document.getElementById("end1").style.display = "none";
		}else if(Answer4=="1"){
			document.getElementById("end1").style.display = "block";
			document.getElementById("end2").style.display = "none";
		}
		document.getElementById("section2").style.display = "block";
		Answer8 = "3";
	}
	if(document.getElementById("answer84").checked == true){
		if(Answer4=="0"){
			document.getElementById("end2").style.display = "block";
			document.getElementById("end1").style.display = "none";
		}else if(Answer4=="1"){
			document.getElementById("end1").style.display = "block";
			document.getElementById("end2").style.display = "none";
		}
		document.getElementById("section2").style.display = "block";
		Answer8 = "4";
	}
	if(document.getElementById("answer85").checked == true){
		if(Answer4=="0"){
			document.getElementById("end2").style.display = "block";
			document.getElementById("end1").style.display = "none";
		}else if(Answer4=="1"){
			document.getElementById("end1").style.display = "block";
			document.getElementById("end2").style.display = "none";
		}
		document.getElementById("section2").style.display = "block";
		Answer8 = "4";
	}
	
	//console.log(Answer8);
}

function send1(){
	type = document.getElementById("send1").value;
	console.log(type);
	var xhr=new XMLHttpRequest();
	var aadress="functions/send1.php?type="+type+"&a1="+Answer1+"&a2="+Answer2+"&a3="+Answer3+"&a4="+Answer4+"&a7="+Answer7+"&a8="+Answer8;
	xhr.open("GET", aadress, true);
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
		}
	}
	xhr.send();
	window.location.href='main.php#diary-view';
}

function send2(){
	type = document.getElementById("send2").value;
	var xhr=new XMLHttpRequest();
	if(type==1){
		var aadress="functions/send2.php?type="+type+"&a1="+Answer1+"&a2="+Answer2+"&a3="+Answer3+"&a4="+Answer4+
		"&a5="+Answer5+"&a61="+Answer61+"&a7="+Answer7+"&a8="+Answer8;
	}
	if(type==2){
		var aadress="functions/send2.php?type="+type+"&a1="+Answer1+"&a2="+Answer2+"&a3="+Answer3+"&a4="+Answer4+
		"&a5="+Answer5+"&a62="+Answer62+"&a7="+Answer7+"&a8="+Answer8;
	}
	xhr.open("GET", aadress, true);
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
		}
	}
	xhr.send();
	window.location.href='main.php#diary-view';
}

function newreasons() {
	var xhr=new XMLHttpRequest();
	var aadress="functions/newreasons.php";
	xhr.open("GET", aadress, true);
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
		}
	}
	xhr.send();
}
