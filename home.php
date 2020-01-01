
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php?erro=1');
}
?>


<?php
if ($_SESSION['email'] == "admin@admin") {
    header('Location: central.php');
}
?>

<?php
$nome = $_SESSION['usuario'];
$email = $_SESSION['email'];
?>

<?php
require_once('php/db.class.php');
$objDb = new db();
$link = $objDb->conecta_mysql();

$sql_cidade_usuario = "select cidades.nome_cidade, cidades.id_cidade, bairros.nome_bairro, bairros.id_bairro FROM `usuarios`, `cidades`, `bairros` WHERE usuarios.id_bairro= bairros.id_bairro and bairros.id_cidade=cidades.id_cidade and usuarios.id_usuario=" . $_SESSION['id_usuario'];

$resultado_cidade_usuario = mysqli_query($link, $sql_cidade_usuario);
$dados_cidade_usuario = mysqli_fetch_array($resultado_cidade_usuario);
?> 


<?php
$sql_cidades = " select * from cidades where cidades.id_cidade <>" . $dados_cidade_usuario['id_cidade'];
$resultado_id_cidades = mysqli_query($link, $sql_cidades);
?>


<?php
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sua Pizza Online</title>

    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />

    <script src="Jquery/Jquery.js"></script>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link href="bootstrap/fonts/icons.css" rel="stylesheet">
    

    <script type="text/javascript" src="Script/home.js"></script>


</head>

<body>

    <nav class="navbar navbar-fixed-top navbar-inverse navbar-transparente">
        <div class="container">

            <!-- header -->
            <div class="navbar-header">
                <!-- botao toggle -->
                <button type="button" class="navbar-toggle collapsed"
                data-toggle="collapse" data-target="#barra-navegacao">
                <span class="sr-only">alternar navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>
        </div>
       
        <!-- navbar -->
        <div class="collapse navbar-collapse" id="barra-navegacao">
         

            <ul class="nav navbar-nav navbar-left" style=" margin:3px;">

                <li><a href="home.php">Home</a></li>
                <li><a href="faca_seu_pedido.php">Faça um pedido</a></li>
                <li><a href=" quemsomos.php">Quem somos</a></li>
                <li><a id="btn-meus-pedidos" title="Adicionar Produto" data-toggle="modal" href="#modalpedidos" > Meus Pedidos</a></li>

                <li> <a style="cursor: pointer;" data-toggle="modal" data-target="#modalconta" >Sua conta</a> </li>
                <li><a href="php/sair.php">Sair</a></li> 
             </ul>
                <li> <span style="float: right; color: white; "><h4><?php echo "Bem Vindo!! " . $_SESSION['usuario']?></h4></span></li>

              



            </div>
            
        </div><!-- /container -->
    </nav><!-- /nav -->



    <!-- capa -->
    <div class="capa" > 

        <center>
            <img  class="logo" src="imagens/logo-pizza.png">
        </center>
    </div>
    <!-- /capa -->


    
    <section class="informacao-capa">
        <div class="container ">
            <div class="row ">

                <!-- informaçoes-->
                <div class="col-md-12">
                    <div class="col-md-5">
                        <center>
                            <div class="col-md-2">
                                <img src="imagens/icone-compra.png" style="width: 55px;">
                            </div>

                            <div class="col-md-6" style="margin-top: 15px;">
                                <h4>Faça seu pedido</h4>
                                <span>  Escolha entre uma variedade de lanches e sabores</span>
                            </div>
                        </center>
                    </div>   

                    <div class="col-md-4">
                        <center>
                            <div class="col-md-2">
                                <img src="imagens/icone-pagamento.png" style=" width: 55px;">
                            </div>

                            <div class="col-md-6">
                                <h4>Pagamento Facilitado </h4>                                        
                                <span>Você paga na hora da entrega.</span>
                            </div>
                        </center>
                    </div> 

                    <div class="col-md-3">
                        <center>
                            <div class="col-md-3">
                                <img src="imagens/icone-entrega.png" style=" width: 55px;">
                            </div>

                            <div class="col-md-9">
                                <h4>Entrega Rápida</h4>
                                <span> Escolha rápida <br> Entrega rápida.</span>
                            </div>
                        </center>   
                    </div> 
                </div>
            </div >
        </div>
    </section> 



    <div id="modalconta" class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
        <div class="modal-dialog"  >
            <div class="panel panel-primary"  >

                <div class="well" >
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#informacoes" data-toggle="tab">Informações</a></li>
                        <li><a href="#seguranca" data-toggle="tab">Segurança</a></li>
                        <button type="button" class="btn btn-default close" data-dismiss="modal"> <span style="color: black; font-size: 20px;" aria-hidden="true">&times;</span></button>
                    </ul>
                    <div id="myTabContent" class="tab-content">

                        <div class="tab-pane active in" id="informacoes">
                            <form id="dados_usuario" method="post" action="php/alteracoes_usuario.php" id="formAlteracoes" >
                                <h4>Dados do Usuário</h4>
                                <?php
                                $sql_usuario = "select * from usuarios where id_usuario =" . $_SESSION['id_usuario'];
                                $resultado_id_usuario = mysqli_query($link, $sql_usuario);
                                $dados_usuario = mysqli_fetch_array($resultado_id_usuario);
                                ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome:</label>
                                    <input type="text" class="form-control"  id="usuario" name="usuario" placeholder="Usuário" required="requiored" maxlength="50"
                                    value= "<?php echo($dados_usuario['nome_usuario']) ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email:</label>
                                    <input type="email" class="form-control" id="email" disabled="false" name="email" placeholder="Email" required="requiored" maxlength="100" value="<?php echo($dados_usuario['email_usuario']) ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">CPF:</label>
                                    <input type="text" class="form-control"  id="cpf" name="cpf" placeholder="CPF" required="requiored" onkeyup="somenteNumeros(this);" onkeypress=" mascara(this, '###.###.###.##')" maxlength="13" disabled="false" value= "<?php echo($dados_usuario['cpf_usuario']) ?>">
                                </div>

                                <div class="form-group">

                                    <select class="form-control" id="select_cidades">
                                        <option value="<?php echo $dados_cidade_usuario['id_cidade'] ?>"><?php echo $dados_cidade_usuario['nome_cidade'] ?></option>


                                        <?php while ($dados_cidade = mysqli_fetch_array($resultado_id_cidades)) { ?>
                                            <option value="<?php echo $dados_cidade['id_cidade'] ?>"><?php echo $dados_cidade['nome_cidade'] ?></option>
                                        <?php } ?>

                                    </select>


                                    <select class="form-control" name="select_bairros" id="select_bairros" style="margin-top: 5px;">
                                        <option value="<?php echo $dados_cidade_usuario['id_bairro'] ?>"><?php echo $dados_cidade_usuario['nome_bairro'] ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contato:</label>
                                    <input type="text" class="form-control"  id="contato" name="contato" placeholder="Contato" required="requiored" onkeyup="somenteNumeros(this);" onkeypress=" mascara(this, '#####.####')" maxlength="10" value= "<?php echo($dados_usuario['contato_usuario']) ?>">
                                </div> 

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nome do endereço:</label>
                                    <input type="text" class="form-control "  id="nomerua" name="nomeendereco" placeholder="Nome da rua:" required="requiored" maxlength="60" value= "<?php echo($dados_usuario['nome_endereco']) ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Número da Casa:</label>
                                    <input onkeyup="somenteNumeros(this);" maxlength="4" type="text" class="form-control"  id="numerocasa" name="numerocasa" placeholder="Número:" required="requiored"  value= "<?php echo($dados_usuario['num_casa_usuario']) ?>">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Referência:</label>
                                    <input type="text" class="form-control"  id="referencia" name="referencia" placeholder="Referência:" required="requiored" maxlength="100" value= "<?php echo($dados_usuario['referencia_usuario']) ?>">
                                </div>
                                
                                
                                <button style="width: 100%; margin-bottom: 10px;" type="submit" class="btn btn-success">Salvar Alterações</button>
                                <br>
                               
                                
                            </form>
                        </div>

                        <div class="tab-pane fade" id="seguranca">

                            <form id="seguranca_usuario" method="post" >
                                <h4>Dados de Segurança</h4>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Senha Antiga:</label>
                                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored" maxlength="32">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nova senha:</label>
                                    <input type="password" class="form-control" id="nova_senha" name="nova_senha" placeholder="Nova senha" required="requiored" maxlength="32">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Repita a nova senha:</label>

                                    <input type="password" class="form-control" id="repetir_nova_senha" name="repetir_nova_senha" placeholder="Repita a nova senha" required="requiored" maxlength="32">
                                </div>


                                <button style="width: 100%;" id="btn-alterar-senha"  type="submit" class="btn btn-success">Salvar Alterações</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div style="height: auto;"  id="modalpedidos" class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
        <div class="modal-dialog"   >
            <div class="panel panel-primary" >

                <div class="well"  >
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#pedidos-pendentes" data-toggle="tab">Pendentes</a></li>
                        <li><a href="#pedidos-andamento" data-toggle="tab">Em Andamento</a></li>
                        <li><a href="#pedidos-finalizados" data-toggle="tab">Finalizados</a></li>

                        <li><a style="display: none" id="btn-detalhes-pedido" data-toggle="tab">Detalhes</a></li>
                        <button type="button" class="btn btn-default close" data-dismiss="modal"> <span style="color: black; font-size: 20px;" aria-hidden="true">&times;</span></button>
                    </ul>
                    <div id="myTabContent" class="tab-content">

                        <div class="tab-pane active in" id="pedidos-pendentes">


                            <!-- Tabela com todos os pedidos Pendentes  -->
                            <table style="display: block;  overflow: auto; "   id="tabela_meus_pedidos_pendentes" class=" table ">
                            </table>


                        </div>

                        <div class="tab-pane  fade" id="pedidos-andamento">


                            <!-- Tabela com todos os pedidos Pendentes  -->
                            <table style="display: block;  overflow: auto; "   id="tabela_meus_pedidos_andamento" class=" table ">
                            </table>


                        </div>

                        <div class="tab-pane fade" id="pedidos-finalizados">

                            <!-- Tabela com todos os pedidos Finalizados  -->
                            <table style="display: block;  overflow: auto; "   id="tabela_meus_pedidos_finalizados" class=" table ">
                            </table>
                        </div>

                        <div style="display: none;"  class="tab-pane fade" id="detalhes-pedidos">

                            <!-- Tabela com todos os pedidos Finalizados  -->
                            <table style="display: block;  overflow: auto; "   id="tabela_detalhes_meus_pedidos" class=" table ">
                                
                            </table>
                        </div>




                    </div>

                </div>
            </div>
        </div>
    </div>






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="Ajax/ajax.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="bootstrap/js/bootbox.min.js" ></script>




</body>
</html>

<?php 

$sql_sistema = " select * from sistema where id_sistema=1";
$resultado_sistema = mysqli_query($link, $sql_sistema);
$registro_sistema= mysqli_fetch_array($resultado_sistema); 

if ($erro==1) {
    echo "<script>    bootbox.alert({ 
        size: 'small',
        message: '<h4 >Ainda não estamos atendendo pedidos!</h4><br> Teremos grande prazer em Atendê-lo no Horário de abertura : ".$registro_sistema['hora_abertura']." <br><br> Att Sua Pizzaria   ', 
        callback: function(){ /* your callback code */ }
      })
 </script> "; 
}
if ($erro==2) {
    echo "<script>    bootbox.alert({ 
        size: 'small',
        message: '<h4 >Atualmente o estabelecimento não realiza entrega em  sua localidade!</h4><br> Teremos grande prazer em Atendê-lo, venha nos conhecer!! <br><br> Att Sua Pizzaria   ', 
        callback: function(){ /* your callback code */ }
      })
 </script> "; 
}
 
 ?>