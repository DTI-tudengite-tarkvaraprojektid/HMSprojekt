window.onload = function () {
    document.getElementById("question2").style.visibility = "hidden";
    document.getElementById("question3").style.visibility = "hidden";
    document.getElementById("question4").style.visibility = "hidden";
    document.getElementById("question5").style.visibility = "hidden";
    document.getElementById("question6").style.visibility = "hidden";
    document.getElementById("question7").style.visibility = "hidden";
    document.getElementById("answer21").style.visibility = "hidden";
    document.getElementById("answer22").style.visibility = "hidden";
    document.getElementById("answer23").style.visibility = "hidden";
    document.getElementById("answer24").style.visibility = "hidden";
    document.getElementById("answer25").style.visibility = "hidden";
    document.getElementById("option21").style.visibility = "hidden";
    document.getElementById("option22").style.visibility = "hidden";
    document.getElementById("option23").style.visibility = "hidden";
    document.getElementById("option24").style.visibility = "hidden";
    document.getElementById("option25").style.visibility = "hidden";
    document.getElementById("answer31").style.visibility = "hidden";
    document.getElementById("answer32").style.visibility = "hidden";
    document.getElementById("answer33").style.visibility = "hidden";
    document.getElementById("answer34").style.visibility = "hidden";
    document.getElementById("answer35").style.visibility = "hidden";
    document.getElementById("option31").style.visibility = "hidden";
    document.getElementById("option32").style.visibility = "hidden";
    document.getElementById("option33").style.visibility = "hidden";
    document.getElementById("option34").style.visibility = "hidden";
    document.getElementById("option35").style.visibility = "hidden";
    document.getElementById("answer41").style.visibility = "hidden";
    document.getElementById("answer42").style.visibility = "hidden";
    document.getElementById("answer5start").style.visibility = "hidden";
    document.getElementById("answer5center").style.visibility = "hidden";
    document.getElementById("answer5end").style.visibility = "hidden";
    document.getElementById("answer61").style.visibility = "hidden";
    document.getElementById("answer62").style.visibility = "hidden";
    document.getElementById("answer7").style.visibility = "hidden";
    document.getElementById("hours").style.visibility = "hidden";
    document.getElementById("minutes").style.visibility = "hidden";
    document.getElementById("option41").style.visibility = "hidden";
    document.getElementById("option42").style.visibility = "hidden";
    document.getElementById("option61").style.visibility = "hidden";
    document.getElementById("option41").style.visibility = "hidden";
    document.getElementById("option62").style.visibility = "hidden";
    document.getElementById("option42").style.visibility = "hidden";
    document.getElementById("button2").style.visibility = "hidden";
    document.getElementById("button3").style.visibility = "hidden";
    document.getElementById("button4").style.visibility = "hidden";
    document.getElementById("button5").style.visibility = "hidden";
    document.getElementById("button6").style.visibility = "hidden";
    document.getElementById("button7").style.visibility = "hidden";
    document.getElementById("button8").style.visibility = "hidden";
    document.getElementById("button9").style.visibility = "hidden";
    document.getElementById("end1").style.visibility = "hidden";
    document.getElementById("end2").style.visibility = "hidden";
    document.getElementById("reasons").style.visibility = "hidden";
    document.getElementById("what").style.visibility = "hidden";
    document.getElementById("whatnew").style.visibility = "hidden";
    document.getElementById("newreason").style.visibility = "hidden";
}

function button1() {
    if(document.getElementById("answer11").checked == true ||
        document.getElementById("answer12").checked == true ||
        document.getElementById("answer13").checked == true ||
        document.getElementById("answer14").checked == true ||
        document.getElementById("answer15").checked == true ){
            document.getElementById("question2").style.visibility = "visible";
            document.getElementById("answer21").style.visibility = "visible";
            document.getElementById("answer22").style.visibility = "visible";
            document.getElementById("answer23").style.visibility = "visible";
            document.getElementById("answer24").style.visibility = "visible";
            document.getElementById("answer25").style.visibility = "visible";
            document.getElementById("option21").style.visibility = "visible";
            document.getElementById("option22").style.visibility = "visible";
            document.getElementById("option23").style.visibility = "visible";
            document.getElementById("option24").style.visibility = "visible";
            document.getElementById("option25").style.visibility = "visible";
            document.getElementById("button2").style.visibility = "visible";
    }    
}

function button2() {
    if(document.getElementById("answer21").checked == true ||
        document.getElementById("answer22").checked == true ||
        document.getElementById("answer23").checked == true ||
        document.getElementById("answer24").checked == true ||
        document.getElementById("answer25").checked == true ){
            document.getElementById("question3").style.visibility = "visible";
            document.getElementById("answer31").style.visibility = "visible";
            document.getElementById("answer32").style.visibility = "visible";
            document.getElementById("answer33").style.visibility = "visible";
            document.getElementById("answer34").style.visibility = "visible";
            document.getElementById("answer35").style.visibility = "visible";
            document.getElementById("option31").style.visibility = "visible";
            document.getElementById("option32").style.visibility = "visible";
            document.getElementById("option33").style.visibility = "visible";
            document.getElementById("option34").style.visibility = "visible";
            document.getElementById("option35").style.visibility = "visible";
            document.getElementById("button3").style.visibility = "visible";
    }
}

function button3() {
    if(document.getElementById("answer31").checked == true ||
        document.getElementById("answer32").checked == true ||
        document.getElementById("answer33").checked == true ||
        document.getElementById("answer34").checked == true ||
        document.getElementById("answer35").checked == true ){
            document.getElementById("question4").style.visibility = "visible";
            document.getElementById("answer41").style.visibility = "visible";
            document.getElementById("answer42").style.visibility = "visible";
            document.getElementById("option41").style.visibility = "visible";
            document.getElementById("option42").style.visibility = "visible";
            document.getElementById("button4").style.visibility = "visible";

        }
}

function button4() {
    if(document.getElementById("answer41").checked == true){
        document.getElementById("question5").style.visibility = "visible";
        document.getElementById("answer5start").style.visibility = "visible";
        document.getElementById("answer5center").style.visibility = "visible";
        document.getElementById("answer5end").style.visibility = "visible";
        document.getElementById("hours").style.visibility = "visible";
        document.getElementById("minutes").style.visibility = "visible";
        document.getElementById("button5").style.visibility = "visible";
    }
    if(document.getElementById("answer42").checked == true){
        document.getElementById("end1").style.visibility = "visible"; 
    }
}

function button5() {
    if(document.getElementById("hours").value!=0 || document.getElementById("minutes").value!=0){
        document.getElementById("question6").style.visibility = "visible";
        document.getElementById("answer61").style.visibility = "visible";
        document.getElementById("answer62").style.visibility = "visible";
        document.getElementById("option61").style.visibility = "visible";
        document.getElementById("option62").style.visibility = "visible";
        document.getElementById("button6").style.visibility = "visible";
    }
}

function button6() {
    if(document.getElementById("answer61").checked == true){
        document.getElementById("what").style.visibility = "visible";
        document.getElementById("reasons").style.visibility = "visible";
        document.getElementById("button8").style.visibility = "visible";
    }
    if(document.getElementById("answer62").checked == true){
        document.getElementById("question7").style.visibility = "visible";
        document.getElementById("answer7").style.visibility = "visible";
        document.getElementById("button7").style.visibility = "visible";
    }
}

function button7() {
    if(document.getElementById("answer7").value != ""){
        document.getElementById("end2").style.visibility = "visible";
    }
}

function button8() {
    if(document.getElementById("reasons").value == "Midagi muud"){
        document.getElementById("whatnew").style.visibility = "visible";
        document.getElementById("newreason").style.visibility = "visible";
        document.getElementById("button9").style.visibility = "visible";
    }else{
        document.getElementById("question7").style.visibility = "visible";
        document.getElementById("answer7").style.visibility = "visible";
        document.getElementById("button7").style.visibility = "visible";
    }
}

function button9() {
    if(document.getElementById("newreason").value != ""){
        document.getElementById("question7").style.visibility = "visible";
        document.getElementById("answer7").style.visibility = "visible";
        document.getElementById("button7").style.visibility = "visible";
    }
}


