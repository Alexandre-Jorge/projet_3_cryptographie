function check_uid(){
    var uid = document.getElementById("uid").value;
    //check that uid match the regex "11:22:aa:bb"
    var regex = new RegExp("^[0-9a-fA-F]{2}(:[0-9a-fA-F]{2}){3}$");
    if(!regex.test(uid)){
        alert("uid is not valid");
        return false;
    }
    else{
        return true;
    }
}

function check_hash(){
    var hash = document.getElementById("hash").value;
    //check that hash match the regex of sha256
    var regex = new RegExp("^[a-fA-F0-9]{64}$");
    if(!regex.test(hash)){
        alert("hash is not valid");
        return false;
    }
    else{
        return true;
    }
}

function check(){
    if(check_uid() && check_hash()){
        return true;
    }
    else{
        return false;
    }
}

function check_product_number(){
    var product_number = document.getElementById("product_number").value;
    //check that product_number match the regex "20231215123456"
    var regex = new RegExp("^[0-9]{14}$");
    if(!regex.test(product_number)){
        alert("product_number is not valid");
        return false;
    }
    else{
        return true;
    }
}

function check_pers_number(){
    var pers_number = document.getElementById("pers_number").value;
    //check that pers_number match the regex "1 02 01 91 123 456"
    var regex = new RegExp("^[1-2]{1} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{3} [0-9]{3}$");
    if(!regex.test(pers_number)){
        alert("pers_number is not valid");
        return false;
    }
    else{
        return true;
    }
}

function check_insert(){
    if(check_product_number() && check_pers_number() && check_uid()){
        return true;
    }
    else{
        return false;
    }

}