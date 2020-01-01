 


 //Contadores para validação do pedido;
 
 var contador_lista =0;
 var contador_produtos =0;
//Variavel para controle de novo produto no seq_interno (BD)
var seq_interno = "novo_seq_interno";

$(document).ready( function(){


    //Funcões que ocorreram quando a pagina ser iniciada ou recarregada;
    window.onload = function(){

      document.getElementById("btn-pizza").click();
      document.getElementById("btn-adicional-pizzas").disabled=true;
      document.getElementById("btn-adicional-lanches").disabled=true;
      document.getElementById("r4").click();
      verificaSabores(1);
      LimpaCarrinho();



//Adiciona todas as pizzas na tabela
var url = "php/buscar_pizzas.php"; 
$.ajax({
  type: "POST",
  url: url,
  data: $("#tabela_pizzas").serialize(),
  success: function(data)
  {

              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("tabela_pizzas").innerHTML=""; 
              $('#tabela_pizzas').append(data);
            }
          });

//Adiciona todas os lanches na tabela
var url_lanche = "php/buscar_lanches.php"; 
$.ajax({
  type: "POST",
  url: url_lanche,
  data: $("#tabela_lanches").serialize(),
  success: function(data)
  {

              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("tabela_lanches").innerHTML=""; 
              $('#tabela_lanches').append(data);

            }
          });


//Adiciona todas os adicionais de pizzas na tabela
var url_adicional = "php/buscar_adicionais_pizzas.php"; 
$.ajax({
  type: "POST",
  url: url_adicional,
  data: $("#tabela_adicionais_pizzas").serialize(),
  success: function(data)
  {

              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("tabela_adicionais_pizzas").innerHTML=""; 
              $('#tabela_adicionais_pizzas').append(data);
              

            }
          });

          //Adiciona todas os adicionais de lanches na tabela
          var url_adicional = "php/buscar_adicionais_lanches.php"; 
          $.ajax({
            type: "POST",
            url: url_adicional,
            data: $("#tabela_adicionais_lanches").serialize(),
            success: function(data)
            {

              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("tabela_adicionais_lanches").innerHTML=""; 
              $('#tabela_adicionais_lanches').append(data);
              

            }
          });

//Adiciona todas as bebidas na tabela
var url_bebida = "php/buscar_bebidas.php"; 
$.ajax({
  type: "POST",
  url: url_bebida,
  data: $("#tabela_bebidas").serialize(),
  success: function(data)
  {

              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("tabela_bebidas").innerHTML=""; 
              $('#tabela_bebidas').append(data);

            }
          });


}



 //Busca informaçoes do carrinho
 $('#btn-produtos-carrinho').click(function(){


   var url_carrinho = "php/buscar_carrinho.php"; 
   $.ajax({
    type: "POST",
    url: url_carrinho,
    data: $("#tabela_carrinho").serialize(),
    success: function(data)
    {

              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("tabela_carrinho").innerHTML=""; 
              $('#tabela_carrinho').append(data);

            }
          });   

   $('#escolha_tamanho').css({'display': 'block'}); 

   if(document.getElementById("tabela_carrinho").style.display == "none")
     document.getElementById("tabela_carrinho").style.display = 'block';

   
   if(document.getElementById("tabela_adicionais_pizzas").style.display == "block")
     document.getElementById("tabela_adicionais_pizzas").style.display = 'none';

   if(document.getElementById("tabela_adicionais_lanches").style.display == "block")
     document.getElementById("tabela_adicionais_lanches").style.display = 'none';    

   if(document.getElementById("tabela_bebidas").style.display == "block"){
     document.getElementById("tabela_bebidas").style.display = 'none'; 
     document.getElementById("InputBebidas").style.display = 'none'; 
   }
   
   $('#escolha_tamanho').css({'display': 'none'});   
   if(document.getElementById("tabela_pizzas").style.display == "block"){
     document.getElementById("tabela_pizzas").style.display = 'none'; 
     document.getElementById("InputPizzas").style.display = 'none'; 
   }

   if(document.getElementById("tabela_lanches").style.display == "block"){
     document.getElementById("InputLanches").style.display = 'none';
     document.getElementById("tabela_lanches").style.display = 'none';
   }
 });    


//Aciona o Botao Pizzas
$('#btn-pizza').click(function(){

  $('#escolha_tamanho').css({'display': 'block'});

  if(document.getElementById("tabela_lanches").style.display == "block"){
   document.getElementById("tabela_lanches").style.display = 'none';
   document.getElementById("InputLanches").style.display = 'none';
  }

 if(document.getElementById("tabela_bebidas").style.display == "block"){
   document.getElementById("tabela_bebidas").style.display = 'none'; 
    document.getElementById("InputBebidas").style.display = 'none'; 
 }

 if(document.getElementById("tabela_pizzas").style.display == "none"){
   document.getElementById("tabela_pizzas").style.display = 'block';
    document.getElementById("InputPizzas").style.display = 'block';
 }

 if(document.getElementById("tabela_adicionais_pizzas").style.display == "block")
   document.getElementById("tabela_adicionais_pizzas").style.display = 'none';

 if(document.getElementById("tabela_adicionais_lanches").style.display == "block")
   document.getElementById("tabela_adicionais_lanches").style.display = 'none';

 if(document.getElementById("tabela_carrinho").style.display == "block")
   document.getElementById("tabela_carrinho").style.display = 'none';      
});

//Aciona o Botao Lanches      
$('#btn-lanche').click(function(){

 $('#escolha_tamanho').css({'display': 'none'});

 if(document.getElementById("tabela_bebidas").style.display == "block"){
   document.getElementById("tabela_bebidas").style.display = 'none'; 
    document.getElementById("InputBebidas").style.display = 'none'; 
 }

 if(document.getElementById("tabela_pizzas").style.display == "block"){
   document.getElementById("tabela_pizzas").style.display = 'none'; 
   document.getElementById("InputPizzas").style.display = 'none';
 }

 if(document.getElementById("tabela_lanches").style.display == "none"){
   document.getElementById("InputLanches").style.display = 'block';
   document.getElementById("tabela_lanches").style.display = 'block';
 }

 if(document.getElementById("tabela_adicionais_pizzas").style.display == "block")
   document.getElementById("tabela_adicionais_pizzas").style.display = 'none';  


 if(document.getElementById("tabela_adicionais_lanches").style.display == "block")
   document.getElementById("tabela_adicionais_lanches").style.display = 'none';       

 if(document.getElementById("tabela_carrinho").style.display == "block")
   document.getElementById("tabela_carrinho").style.display = 'none';        
});

//Aciona o Botao Adicionais pizzas (Oculto)
$('#btn-adicional-pizzas').click(function(){

  $('#escolha_tamanho').css({'display': 'block'}); 
  
  if(document.getElementById("tabela_adicionais_pizzas").style.display == "none")
   document.getElementById("tabela_adicionais_pizzas").style.display = 'block';

 if(document.getElementById("tabela_bebidas").style.display == "block"){
   document.getElementById("tabela_bebidas").style.display = 'none'; 
    document.getElementById("InputBebidas").style.display = 'none'; 
 }
 
 $('#escolha_tamanho').css({'display': 'none'});   
 if(document.getElementById("tabela_pizzas").style.display == "block"){
   document.getElementById("tabela_pizzas").style.display = 'none'; 
    document.getElementById("InputPizzas").style.display = 'none';
 }

 if(document.getElementById("tabela_lanches").style.display == "block"){
   document.getElementById("tabela_lanches").style.display = 'none';
   document.getElementById("InputLanches").style.display = 'none';
 }
 if(document.getElementById("tabela_carrinho").style.display == "block")
   document.getElementById("tabela_carrinho").style.display = 'none';          
});

//Aciona o Botao Adicionais lanches (Oculto)
$('#btn-adicional-lanches').click(function(){

  $('#escolha_tamanho').css({'display': 'block'}); 
  
  if(document.getElementById("tabela_adicionais_lanches").style.display == "none")
   document.getElementById("tabela_adicionais_lanches").style.display = 'block';

 if(document.getElementById("tabela_bebidas").style.display == "block"){
   document.getElementById("tabela_bebidas").style.display = 'none'; 
    document.getElementById("InputBebidas").style.display = 'none'; 
 }
 
 $('#escolha_tamanho').css({'display': 'none'});   
 if(document.getElementById("tabela_pizzas").style.display == "block"){
   document.getElementById("tabela_pizzas").style.display = 'none'; 
    document.getElementById("InputPizzas").style.display = 'none';
 }

 if(document.getElementById("tabela_lanches").style.display == "block"){
   document.getElementById("tabela_lanches").style.display = 'none';
     document.getElementById("InputLanches").style.display = 'none';
 }

 if(document.getElementById("tabela_carrinho").style.display == "block")
   document.getElementById("tabela_carrinho").style.display = 'none';          
});



//Aciona o Botao Bebidas
$('#btn-bebida').click(function(){

 if(document.getElementById("tabela_bebidas").style.display == "none"){
   document.getElementById("tabela_bebidas").style.display = 'block'; 
    document.getElementById("InputBebidas").style.display = 'block'; 
 }
 
 $('#escolha_tamanho').css({'display': 'none'});   
 if(document.getElementById("tabela_pizzas").style.display == "block"){
   document.getElementById("tabela_pizzas").style.display = 'none'; 
    document.getElementById("InputPizzas").style.display = 'none';
 }

 if(document.getElementById("tabela_lanches").style.display == "block"){
   document.getElementById("tabela_lanches").style.display = 'none';
     document.getElementById("InputLanches").style.display = 'none';
 }

 if(document.getElementById("tabela_carrinho").style.display == "block")
   document.getElementById("tabela_carrinho").style.display = 'none';           
});

//Adiona ao Carrinho (Faz validações de contadores, botões, e produtos)
$('#btn-adicionar-carrinho').click(function(){
 document.getElementById("btn-pizza").disabled=false;
 document.getElementById("btn-lanche").disabled=false;
 document.getElementById("btn-bebida").disabled=false;
 document.getElementById('select_borda').disabled=false;
 document.getElementById('select_borda').value=0;

 document.getElementById("btn-produtos-carrinho").disabled = false;
 contador_lista= 0;
 contador_produtos=0;
 document.getElementById("produtos-escolhidos").innerHTML=" ";

 var elementosTeste = document.getElementsByClassName('btn-prod');
 var divsTeste = Array.prototype.filter.call(elementosTeste, function(elementoTeste) {
   elementoTeste.disabled=false;
   document.getElementById("btn-pizza").click();
   seq_interno = "novo_seq_interno";
   document.getElementById("r1").disabled=false;
   document.getElementById("r2").disabled=false;
   document.getElementById("r3").disabled=false;
   document.getElementById("r4").disabled=false;
   document.getElementById("btn-adicionar-carrinho").disabled = true;
   document.getElementById("select-qtd").disabled = false;
   document.getElementById('total_sabores').value = "00.00"; 


   

 }); 


});


});
 
   //Finaliza o pedido.
   function  FinalizaPedido(){

    var formapagamento = document.getElementById("select-pagamento").value;

    document.getElementById('btn-finalizar-pedido').disabled = true;

    var url_finaliza_pedido = "php/finalizar_pedido.php"; 
    $.ajax({
      type: "POST",
      url: url_finaliza_pedido,
      data: {'formapagamento': formapagamento},
      success: function(data)
      {

         bootbox.alert({ 
        size: "small",
        message: "Pedido Finalizado com Sucesso!! <br> <br> Qualquer dúvida entre em contato com o estabelecimento. Agradecemos a preferência!! <br>   ", 
        callback: function(){ /* your callback code */ }
      }).find('.modal-content').css({ 'color' : 'black', 'text-align' : 'left'} );

        document.getElementById("total").innerHTML=""; 
        $('#total').append(data); 
                document.getElementById("btn-produtos-carrinho").click(); //Atualiza os dados na Tabela carrinho;
                document.getElementById("btn-pizza").click();  //aciona o botao pizzas;
              }
            });
  }


     //Limpa o carrinho do Usuario.
     function  LimpaCarrinho(){
       var url_limpar_carrinho = "php/limpar_carrinho.php"; 

       $.ajax({
        type: "POST",
        url: url_limpar_carrinho,
        data: $("#total").serialize(),
        success: function(data)
        {
          document.getElementById("total").innerHTML=""; 
          $('#total').append(data);
                document.getElementById("btn-produtos-carrinho").click(); //Atualiza os dados na Tabela
                document.getElementById("btn-pizza").click();  //aciona o botao pizzas;

                
    

              }
            });
     }



 //Função de Atualização da Observação na tabela carrinho;
 function  atualizaProdutoCarrinho(id){

  var observacao = document.getElementById("obs"+id).value;
  var acao="update";
  
  var url = "php/alteracoes_carrinho.php"; 
  $.ajax({
    type: "POST",
    url: url,
    data:{'id_item_carrinho':id , 'acao':acao , 'observacao' : observacao}, 
    success: function(data)
    {

      bootbox.alert({ 
        size: "small",
        message: data, 
        callback: function(){ /* your callback code */ }
      }).find('.modal-content').css({ 'color' : 'black', 'text-align' : 'left'} );

    }
  });
}

 //Função para deletar o produto na tabela carrinho;
 function  removeProdutoCarrinho(id, categoria){


  var acao="delete";
  
  var url = "php/alteracoes_carrinho.php"; 
  $.ajax({
    type: "POST",
    url: url,
    data:{'id_item_carrinho':id , 'acao':acao ,'categoria': categoria}, 
    success: function(data)
    {
      bootbox.alert({ 
        size: "small",
        message: data, 
        callback: function(){ /* your callback code */ }
      }).find('.modal-content').css({ 'color' : 'black', 'text-align' : 'left'} );
  
              BuscarTotalCarrinho();   //Atualiza o valor total do pedido;
              document.getElementById("btn-produtos-carrinho").click(); //Atualiza os dados na Tabela

            }
          });
}



//Função de remoção de sabores da lista;
function removeProdutoLista(id, categoria, idproduto){

 $('#'+id).remove();
 
 if (categoria==1){
  contador_lista= contador_lista-1;
  var num = contador_lista.toString();
  if (num < document.getElementById("select-qtd").value) {
    document.getElementById("btn-pizza").disabled = false;
    document.getElementById("btn-pizza").click();
    document.getElementById("btn-adicionar-carrinho").disabled = true;
  }
  
  document.getElementById(idproduto).disabled = false; 

  if (contador_lista==0) {
    document.getElementById("btn-produtos-carrinho").disabled = false;    
    document.getElementById("btn-lanche").disabled = false;
    document.getElementById("btn-bebida").disabled = false;
    document.getElementById("r1").disabled = false;
    document.getElementById("r2").disabled = false;
    document.getElementById("r3").disabled = false;
    document.getElementById("r4").disabled = false;
    document.getElementById("select-qtd").disabled = false;
    document.getElementById("btn-adicionar-carrinho").disabled = true;

    
  }
}

if (categoria==2 | categoria==3 ) {
  contador_produtos= contador_produtos-1;
  
  if (contador_produtos==0) {
    document.getElementById("btn-produtos-carrinho").disabled = false;
    document.getElementById("btn-pizza").disabled = false;
    document.getElementById("btn-bebida").disabled = false;
    document.getElementById("btn-lanche").disabled = false;
    document.getElementById("btn-lanche").click();
    document.getElementById("r1").disabled = false;
    document.getElementById("r2").disabled = false;
    document.getElementById("r3").disabled = false;
    document.getElementById("r4").disabled = false;
    document.getElementById("select-qtd").disabled = false;
    document.getElementById("btn-adicionar-carrinho").disabled = true;
  }

  document.getElementById(idproduto).disabled = false;
}

if (categoria==4 || categoria==5) {

 document.getElementById(idproduto).disabled = false;

}

if (categoria==6) {

  document.getElementById('select_borda').disabled=false;
  document.getElementById('select_borda').value=0;
  document.getElementById("btn-lanche").disabled = false;
  document.getElementById("btn-bebida").disabled = false;
  document.getElementById("btn-pizza").disabled = false;
  document.getElementById("btn-produtos-carrinho").disabled = false;
}


var acao ="excluir";
var url = "php/lista_carrinho.php"; 
$.ajax({
  type: "POST",
  url: url,
  data:{'idproduto':id , 'acao':acao}, 
  success: function(data)
  {

   $('#produtos-escolhidos').append(data);
              //utilizar o dado retornado para alterar algum dado da tela.
              

            }
          });


BuscarTotalCarrinho();

}

// Função para a busca do Valor total do carrinho;
function BuscarTotalCarrinho(){

  var url_total = "php/buscar_total_carrinho.php"; 
  
  $.ajax({
    type: "POST",
    url: url_total,
    data:{}, 
    success: function(data)
    {
     $( '#total' ).html( '' );
     $('#total').append(data);
              //utilizar o dado retornado para alterar algum dado da tela.
              

            }
          });

}

//Função para adicionar sabores a lista do carrinho.
function adicionaProdutoLista(id, categoria){

  var qtdsabores = $('#select-qtd').val();

 if (categoria==1) {

   contador_lista= contador_lista+1;
   document.getElementById("r1").disabled = true;
   document.getElementById("r2").disabled = true;
   document.getElementById("r3").disabled = true;
   document.getElementById("r4").disabled = true;
   document.getElementById("btn-lanche").disabled = true;
   document.getElementById("btn-bebida").disabled = true;
   document.getElementById("btn-pizza").disabled = true;
   document.getElementById("btn-produtos-carrinho").disabled = true;
   document.getElementById(id).disabled = true;
   document.getElementById("select-qtd").disabled = true;

   var num = contador_lista.toString();
   

   if (num == document.getElementById("select-qtd").value) {

    document.getElementById("btn-adicional-pizzas").disabled = false;
    document.getElementById("btn-adicional-pizzas").click();
    document.getElementById("btn-adicional-pizzas").disabled = true;
    
    
    
    document.getElementById("btn-adicionar-carrinho").disabled = false;
  }
}

else if (categoria==2 ) {
  contador_produtos= contador_produtos+1;
  
  document.getElementById("btn-pizza").disabled = true;
  document.getElementById("btn-bebida").disabled = true;
  document.getElementById("btn-lanche").disabled = true;
  document.getElementById("btn-produtos-carrinho").disabled = true;
  document.getElementById(id).disabled = true;
  document.getElementById("btn-adicional-lanches").disabled = false;
  document.getElementById("btn-adicional-lanches").click();
  document.getElementById("btn-adicional-lanches").disabled = true;
  document.getElementById("btn-adicionar-carrinho").disabled = false;

  

  
}


else if (categoria==4 || categoria==5 ) {

  document.getElementById(id).disabled = true;
  
}

else if (categoria==6) {
  document.getElementById('select_borda').disabled=true;
  document.getElementById("btn-lanche").disabled = true;
  document.getElementById("btn-bebida").disabled = true;
  document.getElementById("btn-pizza").disabled = true;
  document.getElementById("btn-produtos-carrinho").disabled = true;
}

else if (categoria==3 ) {
  contador_produtos= contador_produtos+1;
  document.getElementById("btn-pizza").disabled = true;
  document.getElementById("btn-lanche").disabled = true;
  document.getElementById("btn-bebida").disabled = true;
  document.getElementById("btn-produtos-carrinho").disabled = true;
  document.getElementById("btn-adicionar-carrinho").disabled = false;
  qtdsabores= document.getElementById('qtd_b'+id).value;
  document.getElementById("btn-adicionar-carrinho").click();
  document.getElementById('qtd_b'+id).value=1;

     bootbox.alert({ 
        size: "small",
        message: "Adicionado ao carrinho!", 
        callback: function(){ /* your callback code */ }
      }).find('.modal-content').css({ 'color' : 'black', 'text-align' : 'left'} );



}



if ( $('#r4').is(':checked')) {
  var tamanho = "broto";    
}

if ( $('#r3').is(':checked')) {
  var tamanho = "media";    
}

if ( $('#r2').is(':checked')) {
  var tamanho = "grande";    
}

if ( $('#r1').is(':checked')) {
  var tamanho = "gigante";    
}




var acao ="incluir"
var url = "php/lista_carrinho.php"; 


if (id!=0) {



  $.ajax({
    type: "POST",
    url: url,
    data:{'idproduto':id , 'acao':acao , 'tamanho':tamanho ,'qtdsabores': qtdsabores, 'categoria': categoria, 'seq_interno':  seq_interno }, 
    success: function(data)
    {

     $('#produtos-escolhidos').append(data);
              //utilizar o dado retornado para alterar algum dado da tela.
              

            }
          });

  BuscarTotalCarrinho();

  seq_interno = "continuar_seq_interno";

}

}


      //Verifica a quantidade de sabores escolhida
      function verificaSabores(value){

        if (value=="1") {
         $('#select_qtd').find("option").remove();
         
         document.getElementById("select-qtd").innerHTML="<option value='1' >1 sabor</option>"; 
         return false;
       }

       if (value=="0.5") {
         $('#select_qtd').find("option").remove();
         
         document.getElementById("select-qtd").innerHTML="<option value='1'> 1 sabor  </option> <option value='2'> 2 sabores </option>"; 
         return false;
       }

       if (value=="0.3") {
         $('#select_qtd').find("option").remove();
         
         document.getElementById("select-qtd").innerHTML="<option value='1'> 1 sabor </option> <option value='2'> 2 sabores   </option> <option value='3'> 3 sabores </option>"; 
         return false;
       }

       if (value=="0.25") {
        $('#select_qtd').find("option").remove();
        
        document.getElementById("select-qtd").innerHTML="<option value='1'> 1 sabor  </option> <option value='2'> 2 sabores  </option> <option value='3'> 3 sabores  </option> <option value='4'> 4 sabores  </option>"; 
        return false;
      }
    } 

    function ConfirmacaoTermos(){
      if ( $('#checkboxTermos').is(':checked')) {
        document.getElementById("btn-finalizar-termos").disabled=false;
        document.getElementById("select-pagamento").disabled=false;
      }else{
        document.getElementById("btn-finalizar-termos").disabled=true;
        document.getElementById("select-pagamento").disabled=true;
      }

    }


      function FiltroPizzas(texto){
    
     //Adiciona todas as pizzas na tabela
var url = "php/buscar_pizzas.php"; 
$.ajax({
  type: "POST",
  url: url,
  data: {'like':texto},
  success: function(data)
  {
        
              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("tabela_pizzas").innerHTML=""; 
              $('#tabela_pizzas').append(data);
            }
          });

    }

         function FiltroLanches(texto){
    
     //Adiciona todas as pizzas na tabela
var url = "php/buscar_lanches.php"; 
$.ajax({
  type: "POST",
  url: url,
  data: {'like':texto},
  success: function(data)
  {
        
              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("tabela_lanches").innerHTML=""; 
              $('#tabela_lanches').append(data);
            }
          });

    }

     function FiltroBebidas(texto){
    
     //Adiciona todas as pizzas na tabela
var url = "php/buscar_bebidas.php"; 
$.ajax({
  type: "POST",
  url: url,
  data: {'like':texto},
  success: function(data)
  {
        
              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("tabela_bebidas").innerHTML=""; 
              $('#tabela_bebidas').append(data);
            }
          });

    }


