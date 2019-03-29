$("#resposta").removeClass();
              
var nome = $("#txtnome").val();
var n1 = parseFloat ($("#txtn1").val());
var n2 = parseFloat ($("#txtn2").val());
 
var media = (n1 + n2) / 2;            
$("#resposta").html(nome + ", " + media);
 
if(media >= 7){
    $("#resposta").addClass("aprovado");
}else{
    $("#resposta").addClass("reprovado");
}