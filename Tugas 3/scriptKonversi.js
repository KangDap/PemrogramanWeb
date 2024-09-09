function convertNum(){
    var input = parseInt(document.convert.num.value);
    var result = document.getElementById("result");
    
    if(input >= 0 && input <= 40){
        result.value = "E";
    }
    else if(input > 40 && input <= 55){
        result.value = "D";
    }
    else if(input > 55 && input <= 60){
        result.value = "C";
    }
    else if(input > 60 && input <= 65){
        result.value = "BC";
    }
    else if(input > 65 && input <= 70){
        result.value = "B";
    }
    else if(input > 70 && input <= 80){
        result.value = "AB";
    }
    else if(input > 80 && input <= 100){
        result.value = "A";
    }
    else{
        result.value = "Input tidak valid";
    }
}