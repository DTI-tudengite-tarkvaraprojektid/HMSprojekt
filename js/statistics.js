function starter(){
  if(document.getElementById("datesToSelect1").value==NULL || document.getElementById("datesToSelect2").value==NULL){
	document.getElementById("noEntrys").innerHTML = '(Sul ei ole veel piisavalt sissekandeid, et siia midagi kuvada)';
  }
  console.log("joppenpuhh");
}


function diaryEntry(n) {
	let allInputs = document.getElementById("datesToSelect"+n).getElementsByTagName("input");
	
	let selectedDates = [];
	for(let i = 0; i < allInputs.length; i ++){
		if(allInputs[i].checked){
			selectedDates.push(allInputs[i].value);
		}
	}
	if(selectedDates != 0){
		//console.log(selectedDates);
		var xhr=new XMLHttpRequest();
		//var aadress="diaryentry.php?dates="+selectedDates.join(",");
		var aadress="functions/diaryentry.php?t="+n+"&dates="+selectedDates;
		console.log(aadress)
		xhr.open("GET", aadress, true);	
		xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
			document.getElementById("diaryAnswers"+n).style.display = "block";
			document.getElementById("diaryAnswers"+n).innerHTML = this.responseText;
			document.getElementById("printBtn").style.visibility = "visible";
		}
		}
		xhr.send(); 
	}else{
		document.getElementById("diaryAnswers"+n).style.display = "none";
		document.getElementById("printBtn").style.visibility = "hidden";
	}
  }



 
function printDiv(eleid){
	var mywindow = window.open('', 'PRINT', 'height=900,width=1600', 'layout=landscape');

    mywindow.document.write('<html><head><title>Nõustajale näitamiseks</title>');
    mywindow.document.write('</head><body>');
    mywindow.document.write('<h1>Enesejälgimise päevik</h1>');
    mywindow.document.write(document.getElementById(eleid).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
    
}

