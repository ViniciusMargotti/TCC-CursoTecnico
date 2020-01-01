<?php

session_start();

unset($_SESSION['usuario']);
unset($_SESSION['email']);
unset($_SESSION['id_usuario']);
unset ($_SESSION['cpf'] );
unset ($_SESSION['num_casa']) ;
unset ($_SESSION['referencia'] );
unset ( $_SESSION['nome_endereco']) ;
unset ( $_SESSION['contato_usuario']) ;
header('Location:../index.php');


?>