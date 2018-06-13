document.getElementById("diaryEntry").addEventListener("click", diaryEntry);

var id = null, date =null;

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

function diaryEntry() {
	id = document.getElementById("idchoice").value;
	date = document.getElementById("date").value;
	var xhr=new XMLHttpRequest();
	var aadress="diaryentry.php?a1="+id+"&a2="+date;
	xhr.open("GET", aadress, true);	
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4){
			console.log(xhr.responseText);
			document.getElementById("diaryAnswers").innerHTML = this.responseText;
		}
	}
	xhr.send();
}