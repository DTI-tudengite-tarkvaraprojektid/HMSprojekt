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