$(document).ready(function(e){
	$("#dialog-confirm").hide();
	$(".menuPrincipal a").click(function(e){
		e.preventDefault();
		var href=$(this).attr('href');
		$(".conteudo").load(href + " .conteudo");
 });
});
function dialogo(){
	$("#dialog-confirm").dialog({
		resizable: false,
		width:400,
		modal: true,
		buttons: {
			"Confirma": function() {
			
								var testeE=0;
 								var testeN=0;
								
 								var nomeI = document.querySelector("#nome").value;
 								var emailI = document.querySelector("#email").value;
	
								for (var i=0; i<emailI.length; i++) {
 									if(emailI[i]=="@"){
										testeE=1;		
 									}
 								}
 		
 								for (var j=0; j<nomeI.length; j++) {
 									if(nomeI[j]==" "){
								 		testeN=1;		
 									}
 								}									
								var nomeI = document.querySelector("#nome").value.split(" ");
 								var emailI = document.querySelector("#email").value.split("@");
								
 								var nome = nomeI[0];
 								var sobrenome = nomeI[1];
 		
 								var emailant = emailI[0];
 								var emaildps = emailI[1];
 		
 								
 		
 								if (nome.length<3 || sobrenome < 4 || testeN==0) {
 								alert("Você preencheu campos de forma incorreta");
 								}else if (emailant.length <3 || emaildps<4||testeE==0) {
 									alert("Você preencheu campos de forma incorreta");
 								}
 		 							
				$(this).dialog( "close" );
			},
			Cancelar: function() {
				$(this).dialog( "close" );
			}
		}
});
};






  
