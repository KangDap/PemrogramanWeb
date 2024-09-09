function addNum(){
    var num1 = parseInt(document.getElementById("num1").value);
    var num2 = parseInt(document.getElementById("num2").value);
    var result = document.getElementById("result");
    result.value = num1 + num2;
}

function subNum(){
    var num1 = parseInt(document.getElementById("num1").value);
    var num2 = parseInt(document.getElementById("num2").value);
    var result = document.getElementById("result");
    result.value = num1 - num2;
}

function mulNum(){
    var num1 = parseInt(document.getElementById("num1").value);
    var num2 = parseInt(document.getElementById("num2").value);
    var result = document.getElementById("result");
    result.value = num1 * num2;
}

function divNum(){
    var num1 = parseInt(document.getElementById("num1").value);
    var num2 = parseInt(document.getElementById("num2").value);
    var result = document.getElementById("result");
    result.value = num1 / num2;
}