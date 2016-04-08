$(document).ready(function(e){
     $(".menuPrincipal a").click(function(e){
       e.preventDefault();
       var href = $(this).attr('href');
       $(".conteudo").load(href + ".conteudo");
       });
  });    

 function confirma(){
 	   $(function dialogo(){
          $("#dialogo-confirm").dialog({
          	 resizable:false,
          	 width:400,
          	 height:200,
             modal:true;
             buttons: {
             	"Confirma": function () {
             		validacao();
             		 $(this).dialog("close");
                },
                "Cancelar": function () {
                	 $(this).dialog("close");
                 }
             }
          });
        });
 }




 function validacao(){
    var n1 = document.querySelector("#nome").value;
    var n2 = document.querySelector("#email").value;
    var ni=n1.length();
    var ne=n2.length();
    var v=false;
    var cont=0;
    var cont2=-1;
      for(var i=0;i<ni;i++){
        cont=cont + 1;
         if(n[i]=='@'){
            if(cont>=3){
              v=true;
              cont2=cont2+1;
            }  
         }
      }
      if((v!=true) or (cont2<4)){
        alert("Dados preenchidos incorretamente");
     }
     for(i=0;i<ne;i++){
        cont=cont + 1;
         if(n[i]==" "){
            if(cont>=3){
              v=true;
              cont2=cont2+1;
            }  
         }
      }
      if((v!=true) or (cont2<4)){
        alert("Dados preenchidos incorretamente");
      }
 }

