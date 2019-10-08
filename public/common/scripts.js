
let host = window.location.pathname.split('/');
function hostIdentifier(){
    if(host[1] == "armonya-v2.local") {
        return "/armonya-v2.local";
    }else {
        return "";
    }

}