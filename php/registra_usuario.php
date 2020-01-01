<?php

	require_once('db.class.php');

	$nome_usuario = $_POST['usuario'];
	$cpf_usuario = $_POST['cpf'];
	$senha_usuario = md5($_POST['senha']);
	$email_usuario = ($_POST['email']);
	$num_casa_usuario = ($_POST['numerocasa']);
	$nome_endereco = $_POST['nomeendereco'];
	$referencia_usuario = $_POST['referencia'];
	$id_bairro = $_POST['select_bairros'];
    $contato_usuario = $_POST['contato'];

    $objDb = new db();
	$link = $objDb->conecta_mysql();

	$usuario_existe = false;
	$email_existe = false;



	$j=0;
			for($i=0; $i<(strlen($cpf_usuario)); $i++)
				{
					if(is_numeric($cpf_usuario[$i]))
						{
							$num[$j]=$cpf_usuario[$i];
							$j++;
						}
				}
			//Etapa 2: Conta os dígitos, um cpf válido possui 11 dígitos numéricos.
			if(count($num)!=11)
				{
					$isCpfValid=false;
				}
			//Etapa 3: Combinações como 00000000000 e 22222222222 embora não sejam cpfs reais resultariam em cpfs válidos após o calculo dos dígitos verificares e por isso precisam ser filtradas nesta parte.
			else
				{
					for($i=0; $i<10; $i++)
						{
							if ($num[0]==$i && $num[1]==$i && $num[2]==$i && $num[3]==$i && $num[4]==$i && $num[5]==$i && $num[6]==$i && $num[7]==$i && $num[8]==$i)
								{
									$isCpfValid=false;
									break;
								}
						}
				}
			//Etapa 4: Calcula e compara o primeiro dígito verificador.
			if(!isset($isCpfValid))
				{
					$j=10;
					for($i=0; $i<9; $i++)
						{
							$multiplica[$i]=$num[$i]*$j;
							$j--;
						}
					$soma = array_sum($multiplica);	
					$resto = $soma%11;			
					if($resto<2)
						{
							$dg=0;
						}
					else
						{
							$dg=11-$resto;
						}
					if($dg!=$num[9])
						{
							$isCpfValid=false;
						}
				}
			//Etapa 5: Calcula e compara o segundo dígito verificador.
			if(!isset($isCpfValid))
				{
					$j=11;
					for($i=0; $i<10; $i++)
						{
							$multiplica[$i]=$num[$i]*$j;
							$j--;
						}
					$soma = array_sum($multiplica);
					$resto = $soma%11;
					if($resto<2)
						{
							$dg=0;
						}
					else
						{
							$dg=11-$resto;
						}
					if($dg!=$num[10])
						{
							$isCpfValid=false;
						}
					else
						{
							$isCpfValid=true;
						}
				}
			//Trecho usado para depurar erros.
			/*
			if($isCpfValid==true)
				{
					echo "<font color="GREEN">Cpf é Válido</font>";
				}
			if($isCpfValid==false)
				{
					echo "<font color="RED">Cpf Inválido</font>";
				}
			*/
			//Etapa 6: Retorna o Resultado em um valor booleano.
			if ($isCpfValid==true) {
					$cpf_existe = false;	
							
								}else{
									$cpf_existe=true;
								}				
		



	//verificar se o e-mail já
	$sql = " select * from usuarios where email_usuario = '$email_usuario' ";
	if($resultado_id = mysqli_query($link, $sql)) {

		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['email_usuario'])){
			$email_existe = true;
		} 
	} else {
		echo 'Erro ao tentar localizar o registro de email';
	}


	if( $email_existe  || $cpf_existe){

		$retorno_get = '';

	

		if($email_existe){
			$retorno_get.= "erro_email=1&";

		}

		if($cpf_existe){
			$retorno_get.= "erro_cpf=1&";

		}

		header('Location: ../inscricao.php?'.$retorno_get);
		die();
	}

	$sql = " insert into usuarios(nome_usuario, email_usuario, senha_usuario, cpf_usuario,num_casa_usuario,referencia_usuario,id_bairro,nome_endereco,contato_usuario) values ('$nome_usuario', '$email_usuario', '$senha_usuario','$cpf_usuario','$num_casa_usuario','$referencia_usuario','$id_bairro','$nome_endereco','$contato_usuario') ";

	//executar a query
	if(mysqli_query($link, $sql)){
		header('Location: ../index.php');

		


	} else {
		echo 'Erro ao registrar o usuário!';
	}


?>