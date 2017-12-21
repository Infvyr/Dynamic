$().ready(function(){
/*	
	$("#name,#surname,#password,#aned,#pret").focus(function(){
         $(this).attr("placeholder","");
     });
    $("#name").blur(function(){
        $(this).attr("placeholder","Introduceti denumirea cartii");
    });
    $("#surname").blur(function(){
        $(this).attr("placeholder","Numele Autorului trebuie sa contina 3 sau mai multe caractere");
    });
    $("#password").blur(function(){
        $(this).attr("placeholder","Editura trebuie sa contina 4 sau mai multe caractere");
    });
    $("#aned").blur(function(){
        $(this).attr("placeholder","Anul ediției trebuie să conțină 4 cifre");
    });
    $("#pret").blur(function(){
        $(this).attr("placeholder","Prețul trebuie să fie completat");
    });
*/
    /* animate scroll to top link */
    $('.scrollToTop').click(function(){
       $('html, body').animate({scrollTop : 0},500);
       return false;
    });
});