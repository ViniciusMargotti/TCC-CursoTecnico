<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header('Location: home.php');
}
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

    <script src="Jquery/Jquery.js"></script>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">

    <link rel="icon" href="imagens/icone.png" type="image/x-icon" />

    <script type="text/javascript">
        $(document).ready(function () {




                //verificar se os campos de usuário e senha foram devidamente preenchidos
                $('#btn_login').click(function () {

                    var campo_vazio = false;

                    if ($('#campo_email').val() == '') {
                        $('#campo_email').css({'border-color': '#A94442'});
                        campo_vazio = true;
                    } else {
                        $('#campo_email').css({'border-color': '#CCC'});
                    }

                    if ($('#campo_senha').val() == '') {
                        $('#campo_senha').css({'border-color': '#A94442'});
                        campo_vazio = true;
                    } else {
                        $('#campo_senha').css({'border-color': '#CCC'});
                    }
                    if (campo_vazio)
                        return false;
                });
            });
            //------------------Fim----------------

        </script>

    </head>

    <body >

        <nav class="navbar navbar-fixed-top navbar-inverse navbar-transparente">
            <div class="container">
                <!-- header -->
                <div class="navbar-header">
                    <!-- botao toggle -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-navegacao">
                        <span class="sr-only">alternar navegação</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- navbar -->
                <div class="collapse navbar-collapse" id="barra-navegacao">
                    <ul class="nav navbar-nav navbar-right">
                      <li style=" margin-top: 15px; font-size: 18px; text-align: center;"><span style="color: white;">Pedidos por telefone:(48) 3445-4523 </span></li>
                       <li style=" margin-top: 15px; margin-left: 15px;  font-size: 18px; text-align: center;"><span style="color: white;">  Aberto : 19h as 2h </span></li>
                    
                  </ul>

                  <ul class="nav navbar-nav navbar-left" style=" margin:3px;">

                    <li><a href="index.php">Home</a></li>
                    <li><a href="faca_seu_pedido.php">Faça um pedido</a></li>
                    <li><a href=" quemsomos.php">Quem somos</a></li>
                    <li><a href="inscricao.php">Inscrever-se</a> </li>
                    <li  class="<?= $erro == 1 ? 'open' : '' ?> "> 
                        <a id="entrar" data-target="" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a> 
                        <ul class="dropdown-menu" aria-labelledby="entrar">
                            <div class="col-md-12">
                                <center> <h4 style="color: #0080FF;">Você possui uma conta?</h4></center> 
                                <form method="post" action="php/validar_acesso2.php" id="formLogin">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="campo_email" name="campo_email" placeholder="E-mail:" />
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" id="campo_senha" name="senha_usuario" placeholder="Senha" />
                                    </div>

                                    <button style="width: 100%;" type="buttom" class="btn btn-primary" id="btn_login">Entrar</button> <br><br>
                                </form>

                                <?php
                                if ($erro == 1) {
                                    echo '<font color="#FF0000">Usuário e ou senha inválido(s)</font>';
                                }
                                ?>
                            </div>
                        </ul>
                    </li>

                </ul>
            </div>
        </div><!-- /container -->
    </nav><!-- /nav -->
    <!-- capa -->
    <div class="capa" > 
        <center>
            <img class="logo" src="imagens/logo-pizza.png">
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="Ajax/ajax.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>