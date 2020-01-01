 window.onload = function(){
  var teste= new Date();
  var mes= +teste.getUTCMonth()+1;
  var dia= +teste.getDate();
  var ano= +teste.getFullYear();
  var dataatual = ano+'-'+mes+'-'+dia;
  var dateControl = document.querySelector('input[type="date"]');
  dateControl.value = dataatual;
  BuscaLucroHoje();
  BuscaPedidosHoje();
  BuscaUsuarios('');
  BuscaPizzas(1,'');
  BuscaLanches(2,'');
  BuscaBebidas(3,'');
  BuscaAdicionaisPizzas(4,'');
  BuscaAdicionaisLanches(5,'');
  BuscaBordas(6,'');
  BuscaCidades();
  BuscaBairros(1);
  BuscaPedidosPendentes('');
  BuscaPedidosAndamento('');
  BuscaPedidosFinalizados('');
  BuscaPedidosArquivados('',dataatual);
  $('#btn-pedidos-pendentes').click();
  $('#nav-pizzas-tab').click();

  setInterval("BuscaPedidosPendentes(''); document.getElementById('input-pedidos-pendentes').value=''; ",30000); 
  setInterval("BuscaLucroHoje(); document.getElementById('lucro_hoje').value=''; ",30000); 
  setInterval("BuscaPedidosHoje(); document.getElementById('pedidos_hoje').value=''; ",30000); 
  
  bootbox.alert("<h4>Seja Bem Vindo Administrador! </h4><br> Navegue pelas abas laterais para organizar seus pedidos e informações.").find('.modal-content').css({ 'color' : 'black', 'text-align' : 'left'} );;


  
}






// A $( document ).ready() block.
$( document ).ready(function(){
  


  
  $('#select_cidades_clientes').change(function(){
    var e = document.getElementById("select_cidades_clientes");
    var itemSelecionado = e.options[e.selectedIndex].value;

    if (itemSelecionado==0) {
      document.getElementById('select_bairros_clientes').innerHTML='<option value=""> Bairros </option>';
      var like= document.getElementById('input-clientes').value;
      BuscaUsuarios(like);
      return false;
    }

          //chamada da controller e passando o ID estado via GET
          $.get('php/consulta_bairros.php?search=' + itemSelecionado, function (data) {
    //procurando a tag OPTION com id do bairro e removendo 
    $('#select_bairros_clientes').find("option").remove();
      //motando a combo do bairro
      document.getElementById('select_bairros_clientes').innerHTML='<option value=""> Todos </option>';
      $('#select_bairros_clientes').append(data);
      
      var like= document.getElementById('input-clientes').value;
      
      BuscaUsuarios(like);

    });

        });

    $('#select_bairros_clientes').change(function(){
   
       var like= document.getElementById('input-clientes').value;
       BuscaUsuarios(like);


        });

//Ação ao clicar Botao no Dashboard;
$('#nav-pizzas-tab').click(function(){
  $('#nav-pizzas').fadeIn(1000); 
  $('#nav-lanches').css({'display': 'none'}); 
  $('#nav-bebidas').css({'display': 'none'}); 
  $('#nav-adicionais-pizzas').css({'display': 'none'}); 
  $('#nav-adicionais-lanches').css({'display': 'none'}); 
  $('#nav-bordas').css({'display': 'none'}); 

  $('#input-pizzas').fadeIn(1000);
  $('#input-lanches').css({'display': 'none'}); 
  $('#input-bebidas').css({'display': 'none'}); 
  $('#input-adicionais-pizzas').css({'display': 'none'});
  $('#input-adicionais-lanches').css({'display': 'none'});
  $('#input-bordas').css({'display': 'none'});
});

$('#nav-lanches-tab').click(function(){
  $('#nav-pizzas').css({'display': 'none'});   
  $('#nav-lanches').fadeIn(1000);
  $('#nav-bebidas').css({'display': 'none'}); 
  $('#nav-adicionais-pizzas').css({'display': 'none'}); 
  $('#nav-adicionais-lanches').css({'display': 'none'}); 
  $('#nav-bordas').css({'display': 'none'}); 

  $('#input-pizzas').css({'display': 'none'});  
  $('#input-lanches').fadeIn(1000);
  $('#input-bebidas').css({'display': 'none'}); 
  $('#input-adicionais-pizzas').css({'display': 'none'});
  $('#input-adicionais-lanches').css({'display': 'none'});
  $('#input-bordas').css({'display': 'none'});
  
});



$('#nav-bebidas-tab').click(function(){
  $('#nav-pizzas').css({'display': 'none'}); 
  $('#nav-lanches').css({'display': 'none'}); 
  $('#nav-bebidas').fadeIn(1000); 
  $('#nav-adicionais-pizzas').css({'display': 'none'}); 
  $('#nav-adicionais-lanches').css({'display': 'none'}); 
  $('#nav-bordas').css({'display': 'none'}); 

  $('#input-pizzas').css({'display': 'none'});  
  $('#input-lanches').css({'display': 'none'}); 
  $('#input-bebidas').fadeIn(1000);
  $('#input-adicionais-pizzas').css({'display': 'none'});
  $('#input-adicionais-lanches').css({'display': 'none'});
  $('#input-bordas').css({'display': 'none'}); 
  
});

$('#nav-adicionaispizzas-tab').click(function(){
  $('#nav-pizzas').css({'display': 'none'}); 
  $('#input-pizzas').css({'display': 'none'});  
  $('#nav-lanches').css({'display': 'none'}); 
  $('#nav-bebidas').css({'display': 'none'}); 
  $('#nav-adicionais-pizzas').fadeIn(1000);
  $('#nav-adicionais-lanches').css({'display': 'none'}); 
  $('#nav-bordas').css({'display': 'none'}); 

  $('#input-pizzas').css({'display': 'none'});  
  $('#input-lanches').css({'display': 'none'}); 
  $('#input-bebidas').css({'display': 'none'}); 
  $('#input-adicionais-pizzas').fadeIn(1000);
  $('#input-adicionais-lanches').css({'display': 'none'});
  $('#input-bordas').css({'display': 'none'}); 
  
});

$('#nav-adicionaislanches-tab').click(function(){
  $('#nav-pizzas').css({'display': 'none'}); 
  $('#input-pizzas').css({'display': 'none'});  
  $('#nav-lanches').css({'display': 'none'}); 
  $('#nav-bebidas').css({'display': 'none'}); 
  $('#nav-adicionais-pizzas').css({'display': 'none'}); 
  $('#nav-adicionais-lanches').fadeIn(1000);
  $('#nav-bordas').css({'display': 'none'}); 

  $('#input-pizzas').css({'display': 'none'});  
  $('#input-lanches').css({'display': 'none'}); 
  $('#input-bebidas').css({'display': 'none'}); 
  $('#input-adicionais-pizzas').css({'display': 'none'});
  $('#input-adicionais-lanches').fadeIn(1000);
  $('#input-bordas').css({'display': 'none'}); 
  
});

$('#nav-bordas-tab').click(function(){
  $('#nav-pizzas').css({'display': 'none'}); 
  $('#input-pizzas').css({'display': 'none'});  
  $('#nav-lanches').css({'display': 'none'}); 
  $('#nav-bebidas').css({'display': 'none'}); 
  $('#nav-adicionais-pizzas').css({'display': 'none'}); 
  $('#nav-adicionais-lanches').css({'display': 'none'}); 
  $('#nav-bordas').fadeIn(1000);

  $('#input-pizzas').css({'display': 'none'});  
  $('#input-lanches').css({'display': 'none'}); 
  $('#input-bebidas').css({'display': 'none'}); 
  $('#input-adicionais-pizzas').css({'display': 'none'});
  $('#input-adicionais-lanches').css({'display': 'none'});
  $('#input-bordas').fadeIn(1000);
  
});


  //Ação ao clicar Botao no Dashboard;
  $('#btn-produtos').click(function(){

   $('#div-graficos').css({'display': 'none'});  
   $('#div-pedidos').css({'display': 'none'}); 
   $('#div-enderecos-entrega').css({'display': 'none'}); 
   $('#tabela_pedidos_pendentes').css({'display': 'none'}); 
   $('#tabela_pedidos_andamento').css({'display': 'none'}); 
   $('#tabela_pedidos_finalizados').css({'display': 'none'}); 

   $('#div-informacoes-pedidos').css({'display': 'none'}); 
   $('#tabela_detalhes_pedidos').css({'display': 'none'}); 
   $('#div-produtos').css({'display': 'block'});  
   $('#tabela_produtos').fadeIn(1000);
   $('#tabela_clientes').css({'display': 'none'}); 
   $('#div-clientes').css({'display': 'none'});  
 });

  //Ação ao clicar Botao no Dashboard;
  $('#btn-enderecos-entrega').click(function(){

    $('#div-produtos').css({'display': 'none'}); 
    $('#div-pedidos').css({'display': 'none'});

    $('#tabela_clientes').css({'display': 'none'}); 
    $('#div-clientes').css({'display': 'none'});  

    $('#tabela_pedidos_pendentes').css({'display': 'none'}); 
    $('#tabela_pedidos_andamento').css({'display': 'none'}); 
    $('#tabela_pedidos_finalizados').css({'display': 'none'}); 

    $('#div-informacoes-pedidos').css({'display': 'none'}); 
    $('#tabela_detalhes_pedidos').css({'display': 'none'});
    $('#div-graficos').css({'display': 'none'});  

    $('#div-enderecos-entrega').fadeIn(500);
    $('#tabela_cidades').css({'display': 'block'}); 
    $('#tabela_bairros').css({'display': 'block'}); 
  });

    //Ação ao clicar Botao no Dashboard;
    $('#btn-graficos').click(function(){
      $('#tabela_detalhes_pedidos').css({'display': 'none'}); 
      $('#div-produtos').css({'display': 'none'}); 
      $('#div-enderecos-entrega').css({'display': 'none'});  
      $('#tabela_pedidos_pendentes').css({'display': 'none'});  
      $('#tabela_pedidos_andamento').css({'display': 'none'});  
      $('#tabela_pedidos_finalizados').css({'display': 'none'});  
      $('#tabela_pedidos_arquivados').css({'display': 'none'}); 
      $('#tabela_clientes').css({'display': 'none'}); 
      $('#div-clientes').css({'display': 'none'});   
       //Mostra as divs ocultas
       $('#div-pedidos').css({'display': 'none'}); 
       $('#div-informacoes-pedidos').css({'display': 'block'}); 
       $('#div-graficos').fadeIn(1000);



     });

  //Ação ao clicar Botao no Dashboard;
  $('#btn-pedidos-pendentes').click(function(){

    $('#tabela_detalhes_pedidos').css({'display': 'block'}); 
    $('#div-graficos').css({'display': 'none'});  
    $('#div-produtos').css({'display': 'none'}); 
    $('#div-enderecos-entrega').css({'display': 'none'});  
    $('#tabela_pedidos_andamento').css({'display': 'none'});  
    $('#tabela_pedidos_finalizados').css({'display': 'none'});  
    $('#tabela_pedidos_arquivados').css({'display': 'none'}); 
    $('#tabela_clientes').css({'display': 'none'}); 
    $('#div-clientes').css({'display': 'none'});   
       //Mostra as divs ocultas
       $('#div-pedidos').css({'display': 'block'}); 
       $('#tabela_pedidos_pendentes').fadeIn(1000);
       $('#div-informacoes-pedidos').css({'display': 'none'}); 
     });

  $('#btn-usuarios').click(function(){

    $('#tabela_detalhes_pedidos').css({'display': 'block'}); 
    $('#div-graficos').css({'display': 'none'});  
    $('#div-produtos').css({'display': 'none'}); 
    $('#div-enderecos-entrega').css({'display': 'none'});  
    $('#tabela_pedidos_andamento').css({'display': 'none'});  
    $('#tabela_pedidos_finalizados').css({'display': 'none'});  
    $('#tabela_pedidos_arquivados').css({'display': 'none'});  
    $('#div-pedidos').css({'display': 'none'}); 
    $('#tabela_pedidos_pendentes').css({'display': 'none'}); 
    $('#div-informacoes-pedidos').css({'display': 'none'}); 
    
       //Mostra as divs ocultas
       $('#tabela_clientes').fadeIn(1000);
       $('#div-clientes').css({'display': 'block'}); 


     });


  //Ação ao clicar Botao no Dashboard;
  $('#btn-pedidos-andamento').click(function(){

    $('#tabela_detalhes_pedidos').css({'display': 'block'}); 

    $('#div-produtos').css({'display': 'none'});  
    $('#div-graficos').css({'display': 'none'});  
    $('#div-enderecos-entrega').css({'display': 'none'}); 
    $('#tabela_pedidos_pendentes').css({'display': 'none'});  
    $('#tabela_pedidos_finalizados').css({'display': 'none'}); 
    $('#tabela_pedidos_arquivados').css({'display': 'none'}); 
    $('#tabela_clientes').css({'display': 'none'}); 
    $('#div-clientes').css({'display': 'none'});    
       //Mostra as divs ocultas
       $('#div-pedidos').css({'display': 'block'}); 

       $('#tabela_pedidos_andamento').fadeIn(1000);
       $('#div-informacoes-pedidos').css({'display': 'none'}); 
     });

  //Ação ao clicar Botao no Dashboard;
  $('#btn-pedidos-finalizados').click(function(){


   $('#tabela_detalhes_pedidos').css({'display': 'block'}); 
   $('#div-graficos').css({'display': 'none'});  
   $('#div-produtos').css({'display': 'none'});
   $('#div-enderecos-entrega').css({'display': 'none'});   
   $('#tabela_pedidos_pendentes').css({'display': 'none'});  
   $('#tabela_pedidos_andamento').css({'display': 'none'});  
   $('#tabela_pedidos_arquivados').css({'display': 'none'});
   $('#tabela_clientes').css({'display': 'none'}); 
   $('#div-clientes').css({'display': 'none'});    
       //Mostra as divs ocultas
       $('#div-pedidos').css({'display': 'block'}); 
       $('#tabela_pedidos_finalizados').fadeIn(1000);
       $('#div-informacoes-pedidos').css({'display': 'none'}); 
     });

  //Ação ao clicar Botao no Dashboard;
  $('#btn-pedidos-arquivados').click(function(){


   $('#tabela_detalhes_pedidos').css({'display': 'block'}); 
   $('#div-graficos').css({'display': 'none'});  
   $('#div-produtos').css({'display': 'none'});  
   $('#div-enderecos-entrega').css({'display': 'none'}); 
   $('#tabela_pedidos_pendentes').css({'display': 'none'});  
   $('#tabela_pedidos_andamento').css({'display': 'none'}); 
   $('#tabela_pedidos_finalizados').css({'display': 'none'});  
   $('#tabela_clientes').css({'display': 'none'}); 
   $('#div-clientes').css({'display': 'none'});   
       //Mostra as divs ocultas
       $('#div-pedidos').css({'display': 'block'}); 
       $('#tabela_pedidos_arquivados').fadeIn(1000);
       $('#div-informacoes-pedidos').css({'display': 'none'}); 
     });

  
   //Ação ao clicar Botao de Cadastro de Produtos
   $('#btn-cadastro-produto').click(function(){

    var nome= document.getElementById("nome-cadastro").value;
    var descricao = document.getElementById("descricao-cadastro").value;
    var preco= document.getElementById("preco-cadastro").value;
    var categoria = document.getElementById("categoria-cadastro").value;
    
    var url = "php/cadastro_produtos.php"; 
    $.ajax({
      type: "POST",
      url: url,
      data:{'nome':nome , 'descricao':descricao , 'preco' : preco , 'categoria' : categoria}, 
      success: function(data)
      {
        bootbox.alert('Cadastrado com Sucesso!!' ).find('.modal-content').css({'color': 'black'} );
        document.getElementById("nome-cadastro").value = null;
        document.getElementById("descricao-cadastro").value =null;
        document.getElementById("preco-cadastro").value =null;
                //Atualiza Lista de Produtos
                BuscaPizzas(1,'');
                BuscaLanches(2,'');
                BuscaBebidas(3,'');
                BuscaAdicionaisPizzas(4,'');
                BuscaAdicionaisLanches(5,'');
                BuscaBordas(6,'');
                
              }
            });
  });

     //Ação ao clicar Botao de Cadastro de Produtos
     $('#btn-cadastro-bairro').click(function(){

      var nome= document.getElementById("nome_bairro").value;
      var cidade = document.getElementById("select_cidades").value;
      var taxa= document.getElementById("taxa_bairro").value;
      var acao = 'insert';
      var tipo = 'bairro';
      
      var url = "php/cadastro_enderecos.php"; 
      $.ajax({
        type: "POST",
        url: url,
        data:{'nome':nome , 'cidade':cidade , 'taxa' : taxa, 'acao':acao , 'tipo':tipo }, 
        success: function(data)
        {
          bootbox.alert('Cadastrado com Sucesso!!' ).find('.modal-content').css({'color': 'black'} );
          document.getElementById("nome_bairro").value = null;
          document.getElementById("select_cidades").value =4;
          document.getElementById("taxa_bairro").value ='0.5';

          BuscaBairros(cidade);
          
          
        }
      });
    });

       //Ação ao clicar Botao de Cadastro de Produtos
       $('#btn-cadastro-cidade').click(function(){

        var nome= document.getElementById("nome_cidade").value;
        var estado = document.getElementById("select_estados").value;
        
        var acao = 'insert';
        var tipo = 'cidade';
        
        var url = "php/cadastro_enderecos.php"; 
        $.ajax({
          type: "POST",
          url: url,
          data:{'nome':nome , 'estado':estado ,'acao':acao , 'tipo':tipo }, 
          success: function(data)
          {
            bootbox.alert('Cadastrado com Sucesso!!' ).find('.modal-content').css({'color': 'black'} );
            document.getElementById("nome_cidade").value = null;
            document.getElementById("select_estados").value ='AC';
            
            
            BuscaCidades();
            
            
          }
        });
      });



       $("#input-pedidos-pendentes").on('keyup', function (e) {

         var textPendente = document.getElementById('input-pedidos-pendentes').value;
         BuscaPedidosPendentes(textPendente);
         
       });

       $("#input-pedidos-andamento").on('keyup', function (e) {

         var textAndamento = document.getElementById('input-pedidos-andamento').value;
         BuscaPedidosAndamento(textAndamento);
         
       });

       $("#input-pedidos-finalizados").on('keyup', function (e) {

         var textFinalizado = document.getElementById('input-pedidos-finalizados').value;
         BuscaPedidosFinalizados(textFinalizado);
         
       });

       $("#input-pedidos-arquivados").on('keyup', function (e) {

         var textArquivado = document.getElementById('input-pedidos-arquivados').value;
         var data=document.getElementById('input-date-arquivados').value;
         BuscaPedidosArquivados(textArquivado,data);

       });

       $('#input-date-arquivados').change(function(){
        document.getElementById('input-pedidos-arquivados').value='';
        var data=document.getElementById('input-date-arquivados').value;
        BuscaPedidosArquivados('',data);
      });




     });


 function AlteraSistema(tipo){
  var url_sistema = "php/alteracoes_sistema.php"; 
  $.ajax({
    type: "POST",
    url: url_sistema,
    data: {'tipo':tipo }, 
    success: function(data)
    {

      bootbox.alert({ 
        size: "small",
        message: data, 
      callback: function(){ /* your callback code */ }
    }).find('.modal-content').css({ 'color' : 'black', 'text-align' : 'left'} );;



    }
  });
} 

function AlteraUsuario(status,id_usuario){


  var url_status = "php/status_usuario.php"; 
  $.ajax({
    type: "POST",
    url: url_status,
    data: {'status':status , 'id_usuario':id_usuario }, 
    success: function(data)
    {

      bootbox.alert({ 
        size: "small",
        message: data, 
      callback: function(){ /* your callback code */ }
    }).find('.modal-content').css({ 'color' : 'black', 'text-align' : 'left'} );;

      BuscaUsuarios('');

    }
  });
} 

//Busca as informaçoes para o form de alteração.
function  BuscaInformacoesProduto(id){
 var url_busca_info_produtos = "php/buscar_produtos_informacoes.php"; 
 $.ajax({
  type: "POST",
  url: url_busca_info_produtos,
  data: {'id_item':id }, 
  success: function(data)
  {

    document.getElementById("modal-body-edit").innerHTML=""; 
    $('#modal-body-edit').append(data);


    
  }
});
}

//Busca as informaçoes para o form de alteração.
function  BuscaInformacoesCidade(id){
 
 var url_busca_info_produtos = "php/buscar_cidades_informacoes.php"; 
 $.ajax({
  type: "POST",
  url: url_busca_info_produtos,
  data: {'id_cidade':id }, 
  success: function(data)
  {
    
    document.getElementById("modal-body-edit").innerHTML=""; 
    $('#modal-body-edit').append(data);


    
  }
});
}

//Busca as informaçoes para o form de alteração.
function  BuscaInformacoesBairro(id){
 
 var url_busca_info_bairros = "php/buscar_bairros_informacoes.php"; 
 $.ajax({
  type: "POST",
  url: url_busca_info_bairros,
  data: {'id_bairro':id }, 
  success: function(data)
  {
  
    document.getElementById("modal-body-edit").innerHTML=""; 
    $('#modal-body-edit').append(data);


    
  }
});
}




//Salva as alteraçoes do produto;
function  SalvaInformacoesProduto(id){

  var nome= document.getElementById("nome-editar").value;
  var descricao = document.getElementById("descricao-editar").value;
  var preco= document.getElementById("preco-editar").value;
  var categoria = document.getElementById("categoria-editar").value;
  var status = document.getElementById("status-editar").value; 

  var acao= "update"
  var url= "php/alteracoes_produtos.php"; 
  $.ajax({
    type: "POST",
    url: url,
    data: {'acao':acao , 'id_item':id ,'nome':nome , 'descricao':descricao , 'preco' : preco , 'categoria' : categoria ,'status' : status }, 
    success: function(data)
    {
      bootbox.alert('Salvo com Sucesso!!' ).find('.modal-content').css({'color': 'black'} );
      document.getElementById("nome-editar").value = null;
      document.getElementById("descricao-editar").value =null;
      document.getElementById("preco-editar").value =null;
      
                //Atualiza Lista de Produtos
                BuscaPizzas(1,'');
                BuscaLanches(2,'');
                BuscaBebidas(3,'');
                BuscaAdicionaisPizzas(4,'');
                BuscaAdicionaisLanches(5,'');
                BuscaBordas(6,'');
                //Fecha Modal;
                $('#btn-cancelar-alteracao').click();
                
              }
            });
}

//Salva as alteraçoes do produto;
function  SalvaInformacoesCidade(id){

  var nome= document.getElementById("nome-editar").value;
  var uf = document.getElementById("descricao-editar").value;
  

  var acao= "update"
  var url= "php/alteracoes_cidades.php"; 
  $.ajax({
    type: "POST",
    url: url,
    data: {'acao':acao , 'id_cidade':id ,'nome':nome , 'uf':uf}, 
    success: function(data)
    {
     
      bootbox.alert('Salvo com Sucesso!!' ).find('.modal-content').css({'color': 'black'} );
      document.getElementById("nome-editar").value = null;
      document.getElementById("descricao-editar").value =null;
      
                //Atualiza Lista de Produtos
                BuscaCidades();
                BuscaBairros(id);
               
                //Fecha Modal;
                $('#btn-cancelar-alteracao').click();
                
              }
            });
}


//Salva as alteraçoes do produto;
function  SalvaInformacoesBairro(id){
 
  var nome= document.getElementById("nome-editar").value;
  var id_cidade = document.getElementById("select_cidades_editar").value;
   var taxa = document.getElementById("taxa-editar").value;
  
  var acao= "update"
  var url= "php/alteracoes_bairros.php"; 
  $.ajax({
    type: "POST",
    url: url,
    data: {'acao':acao , 'id_bairro':id , 'id_cidade':id_cidade ,'nome':nome , 'taxa':taxa}, 
    success: function(data)
    {
   
      bootbox.alert('Salvo com Sucesso!!' ).find('.modal-content').css({'color': 'black'} );
    
      
                BuscaBairros(id_cidade);
               
                //Fecha Modal;
                $('#btn-cancelar-alteracao').click();
                
              }
            });
}


//Salva as alteraçoes do produto;
function  DeletaProduto(id){
 var acao= "delete"
 var url= "php/alteracoes_produtos.php"; 
 $.ajax({
  type: "POST",
  url: url,
  data: {'acao':acao , 'id_item':id }, 
  success: function(data)
  {
       bootbox.alert(data).find('.modal-content').css({ 'color' : 'black', 'text-align' : 'left'} );;
                //Atualiza Lista de Produtos
                BuscaPizzas(1,'');
                BuscaLanches(2,'');
                BuscaBebidas(3,'');
                BuscaAdicionaisPizzas(4,'');
                BuscaAdicionaisLanches(5,'');
                BuscaBordas(6,'');        
              }
            });
}


//Adiciona todas as pizzas na tabela
function  BuscaPizzas(tipo,texto){

 var url = "php/buscar_produtos_central.php"; 
 $.ajax({
  type: "POST",
  url: url,
  data: {'tipo': tipo, 'like':texto},
  success: function(data)
  {

              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("nav-pizzas").innerHTML=""; 
              $('#nav-pizzas').append(data);
            }
          });
}

//Adiciona todas os lanches na tabela
function  BuscaLanches(tipo,texto){

 var url = "php/buscar_produtos_central.php"; 
 $.ajax({
  type: "POST",
  url: url,
  data: {'tipo': tipo, 'like':texto},
  success: function(data)
  {

              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("nav-lanches").innerHTML=""; 
              $('#nav-lanches').append(data);
            }
          });
}

//Adiciona todas os usuarios na tabela
function  BuscaUsuarios(texto){

 var cidade = document.getElementById('select_cidades_clientes').value;
 var bairro = document.getElementById('select_bairros_clientes').value;

 var url = "php/buscar_usuarios_central.php"; 
 $.ajax({
  type: "POST",
  url: url,
  data: {'like':texto , 'cidade':cidade , 'bairro':bairro},
  success: function(data)
  {

              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("tabela_clientes").innerHTML=""; 
              $('#tabela_clientes').append(data);
            }
          });
}

//Adiciona todas os bebidas na tabela
function  BuscaBebidas(tipo,texto){

 var url = "php/buscar_produtos_central.php"; 
 $.ajax({
  type: "POST",
  url: url,
  data: {'tipo': tipo, 'like':texto},
  success: function(data)
  {

              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("nav-bebidas").innerHTML=""; 
              $('#nav-bebidas').append(data);
            }
          });
}

//Adiciona todas os adicionaisPizzas na tabela
function  BuscaAdicionaisPizzas(tipo,texto){

 var url = "php/buscar_produtos_central.php"; 
 $.ajax({
  type: "POST",
  url: url,
  data: {'tipo': tipo, 'like':texto},
  success: function(data)
  {

              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("nav-adicionais-pizzas").innerHTML=""; 
              $('#nav-adicionais-pizzas').append(data);
            }
          });
}

//Adiciona todas os adicionaisPizzas na tabela
function  BuscaAdicionaisLanches(tipo,texto){

 var url = "php/buscar_produtos_central.php"; 
 $.ajax({
  type: "POST",
  url: url,
  data: {'tipo': tipo, 'like':texto},
  success: function(data)
  {

              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("nav-adicionais-lanches").innerHTML=""; 
              $('#nav-adicionais-lanches').append(data);
            }
          });
}

//Adiciona todas os adicionaisPizzas na tabela
function  BuscaBordas(tipo,texto){

 var url = "php/buscar_produtos_central.php"; 
 $.ajax({
  type: "POST",
  url: url,
  data: {'tipo': tipo, 'like':texto},
  success: function(data)
  {

              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("nav-bordas").innerHTML=""; 
              $('#nav-bordas').append(data);
            }
          });
}







 //Adiciona cidades na tabela
 function  BuscaCidades(){

   var url = "php/buscar_cidades_central.php"; 
   $.ajax({
    type: "POST",
    url: url,
    data: $("#tabela_cidades").serialize(),
    success: function(data)
    {

              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("tabela_cidades").innerHTML=""; 
              $('#tabela_cidades').append(data);
            }
          });
 }

 // Adiciona bairros na tabela
 function  BuscaBairros(id){
   var url_busca_bairros = "php/buscar_bairros_central.php"; 
   $.ajax({
    type: "POST",
    url: url_busca_bairros,
    data: {'id':id }, 
    success: function(data)
    {

      document.getElementById("tabela_bairros").innerHTML=""; 
      $('#tabela_bairros').append(data);


      
    }
  });
 }



 //Adiciona todas os pedidos pendentes na tabela
 function  BuscaPedidosPendentes(texto){

   var url = "php/buscar_pedidos_pendentes.php"; 
   $.ajax({
    type: "POST",
    url: url,
    data: {'like':texto},
    success: function(data)
    {
              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("pedidos-pendentes").innerHTML=""; 
              $('#pedidos-pendentes').append(data);


            }
          });


   
 }

  //Adiciona todas os pedidos em andamento na tabela
  function  BuscaPedidosAndamento(texto){

   var url = "php/buscar_pedidos_andamento.php"; 
   $.ajax({
    type: "POST",
    url: url,
    data: {'like':texto},
    success: function(data)
    {

               //utilizar o dado retornado para alterar algum dado da tela.
               document.getElementById("pedidos-andamento").innerHTML=""; 
               $('#pedidos-andamento').append(data);
             }
           });


 }

 //Adiciona todas os pedidos Finalizados na tabela
 function  BuscaPedidosFinalizados(texto){

   var url = "php/buscar_pedidos_finalizados.php"; 
   $.ajax({
    type: "POST",
    url: url,
    data: {'like':texto},
    success: function(data)
    {

              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("pedidos-finalizados").innerHTML=""; 
              $('#pedidos-finalizados').append(data);
            }
          });


 }

  //Adiciona todas os pedidos Finalizados na tabela
  function  BuscaPedidosArquivados(texto,data){

   var url = "php/buscar_pedidos_arquivados.php"; 
   $.ajax({
    type: "POST",
    url: url,
    data: {'like':texto , 'data':data},
    success: function(data)
    {

              //utilizar o dado retornado para alterar algum dado da tela.
              document.getElementById("pedidos-arquivados").innerHTML=""; 
              $('#pedidos-arquivados').append(data);
            }
          });

 }


 //Busca os detalhes do pedido
 function  DetalhesPedido(id){
   var url_busca_info_pedidos = "php/buscar_detalhes_pedido.php"; 
   $.ajax({
    type: "POST",
    url: url_busca_info_pedidos,
    data: {'id_item':id }, 
    success: function(data)
    {
     $('#tabela_detalhes_pedidos').fadeIn(1000);
     $('#div-graficos').css({'display': 'none'});
     document.getElementById("tabela_detalhes_pedidos").innerHTML=""; 
     bootbox.alert(data).find('.modal-content').css({ 'color' : 'black', 'text-align' : 'left'} );;


   }
 });
 }


 //Alteracao de pedido
 function AlteracaoPedido(id,acao){

   if (acao==1) {
    acao='andamento';
  }else
  {
   if (acao==2) {
     acao='finalizado';
   }else{
     if (acao==3) {
       acao='arquivado';
     }else{
      if (acao==4) {
       acao='delete';
     }
   }
 }
}



var url = "php/alteracoes_pedidos.php"; 
$.ajax({
  type: "POST",
  url: url,
  data: {'id_pedido':id, 'acao':acao }, 
  success: function(data)
  {

    BuscaPedidosPendentes('');
    BuscaPedidosAndamento('');
    BuscaPedidosFinalizados('');
    BuscaPedidosArquivados('','');
    
    $( "#alertapedidos" ).fadeIn( 300 ).delay( 1000 ).fadeOut( 200 );

    
  }
});
}    

//Alteracao do status dos enderecos
function AlteracaoEnderecos(id,tipo){

  var url = "php/alteracoes_enderecos.php"; 
  $.ajax({
    type: "POST",
    url: url,
    data: {'id':id, 'tipo':tipo }, 
    success: function(data)
    {
      BuscaCidades();
      BuscaBairros(data);
    }
  });
}    

//Busca  lucro do dia
function  BuscaLucroHoje(){

 var url = "php/buscar_lucro_dia.php"; 
 $.ajax({
  type: "POST",
  url: url,
  data: {},
  success: function(data)
  {


    document.getElementById('lucro_hoje').value=data;
  }
});

}


//Busca a Qtd de pedidos do dia
function  BuscaPedidosHoje(){

 var url = "php/buscar_pedidos_dia.php"; 
 $.ajax({
  type: "POST",
  url: url,
  data: {},
  success: function(data)
  {


    document.getElementById('pedidos_hoje').value=data;
  }
});

}















