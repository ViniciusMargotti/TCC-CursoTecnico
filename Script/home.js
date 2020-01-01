    
//Permite alterar senha do usuario
$(document).ready( function(){

 $("#seguranca_usuario").submit(function(e) {
  var url = "php/alteracoes_seguranca_usuario.php"; 
  
  $.ajax({
    type: "POST",
    url: url,
    data: $("#seguranca_usuario").serialize(),
    success: function(data)
    {
   
      if (data=='true') { 
        bootbox.alert({ 
        size: "small",
        message: "Senha alterada com Sucesso!!   ", 
        callback: function(){ /* your callback code */ }
      }).find('.modal-content').css({ 'color' : 'black', 'text-align' : 'left'} );;
         $('#modalconta').modal('hide');
      }else{
        bootbox.alert(data);
      }

              //utilizar o dado retornado para alterar algum dado da tela.
              $("#senha").val('');
              $("#nova_senha").val('');
              $("#repetir_nova_senha").val('');

            }
          });


         e.preventDefault();// esse comando serve para previnir que o form realmente realize o submit e atualize a tela.
       });

 $("#dados_usuario").submit(function(e) {
  var url = "php/alteracoes_usuario.php"; 
  $.ajax({
    type: "POST",
    url: url,
    data: $("#dados_usuario").serialize(),
    success: function(data)
    {
     $('#modalconta').modal('hide');
      bootbox.alert({ 
        size: "small",
        message: "Salvo com Sucesso!!   ", 
        callback: function(){ /* your callback code */ }
      }).find('.modal-content').css({ 'color' : 'black', 'text-align' : 'left'} );;

              //utilizar o dado retornado para alterar algum dado da tela.
            }
          });

         e.preventDefault();// esse comando serve para previnir que o form realmente realize o submit e atualize a tela.
       });

 
           //Ação ao clicar Botao Meus Pedidos;
           $('#btn-meus-pedidos').click(function(){
            
            var tipo= 'pendentes';
            var url_Teste = "php/buscar_meus_pedidos.php"; 
            $.ajax({
              type: "POST",
              url: url_Teste,
              data: {'tipo':tipo}, 
              success: function(data)
              {

                document.getElementById("tabela_meus_pedidos_pendentes").innerHTML=""; 
                $('#tabela_meus_pedidos_pendentes').append(data);


                
              }
            });

            var tipo= 'finalizados';
            var url_Teste = "php/buscar_meus_pedidos.php"; 
            $.ajax({
              type: "POST",
              url: url_Teste,
              data: {'tipo':tipo}, 
              success: function(data)
              {

                document.getElementById("tabela_meus_pedidos_finalizados").innerHTML=""; 
                $('#tabela_meus_pedidos_finalizados').append(data);


                
              }
            });


            var tipo= 'andamento';
            var url_Teste = "php/buscar_meus_pedidos.php"; 
            $.ajax({
              type: "POST",
              url: url_Teste,
              data: {'tipo':tipo}, 
              success: function(data)
              {

                document.getElementById("tabela_meus_pedidos_andamento").innerHTML=""; 
                $('#tabela_meus_pedidos_andamento').append(data);


                
              }
            });
            

            
          });

           

           



         });
 //---------------------Fim------------ 

function DetalhesMeusPedidos(id){

  $('#detalhes-pedidos').css({'display': 'block'});
   
  var url_busca_info_pedidos = "php/buscar_detalhes_meus_pedido.php"; 
  $.ajax({
    type: "POST",
    url: url_busca_info_pedidos,
    data: {'id_item':id }, 
    success: function(data)
    {
       bootbox.alert(data);
      //document.getElementById("tabela_detalhes_meus_pedidos").innerHTML=""; 
       //$('#tabela_detalhes_meus_pedidos').append(data);
       //$('#btn-detalhes-pedido').click();

      
    }
  });  

}




//Permite somente numeros em Campos
function SomenteNumero(e){
  var tecla=(window.event)?event.keyCode:e.which;
  if((tecla>47 && tecla<58)) return true;
  else{
    if (tecla==8 || tecla==0) return true;
    else  return false;
  }
}
//---------------------Fim------------ 




//verificar bairros conforme cidade selecionada
$(document).ready( function(){

  $('#select_cidades').change(function(){

    var e = document.getElementById("select_cidades");
    var itemSelecionado = e.options[e.selectedIndex].value;

          //chamada da controller e passando o ID estado via GET
          $.get('php/consulta_bairros.php?search=' + itemSelecionado, function (data) {
    //procurando a tag OPTION com id do bairro e removendo 
    $('#select_bairros').find("option").remove();
      //motando a combo do bairro
      $('#select_bairros').append(data);
    });
        });
});    
//---------------------Fim------------ 

function somenteNumeros(num) {
  var er = /[^0-9.]/;
  er.lastIndex = 0;
  var campo = num;
  if (er.test(campo.value)) {
    campo.value = "";
  }
}

function mascara(t, mask)
{
  var i = t.value.length;
  var saida = mask.substring(1,0);
  var texto = mask.substring(i)
  if (texto.substring(0,1) != saida)
  {
   t.value += texto.substring(0,1);
 }
}



