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
    //check that hash match the regex "of sha256
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