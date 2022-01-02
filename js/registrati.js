$(document).ready(function(){
    $("form > ul > li:last-of-type").click(function(){
        console.log(document.getElementsByName("password")[0].value);
        if(!(document.getElementsByName("password")[0].value == document.getElementsByName("confermapassword")[0].value)){
            $("form").submit(function(e){
                e.preventDefault();
            });
            alert("La password di conferma inserita non corrisponde alla password");
        } else {
            $("form").unbind('submit').submit();
        }
    });
});