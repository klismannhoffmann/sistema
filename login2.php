
<?php
session_start();

$usuario=filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha=filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
//verificar se foram informados

$mensagem='';
if(!$usuario){
	//imformar para preencher o usuario
	$mensagem='Informe o usuario';
}elseif(!$senha){
	//informar para preencher a senha
	$mensagem='Informe o senha';
}else{
	//verificar se existe usuario e senha informados
	if($usuario=='cabral' && $senha=='brasil'){
		$_SESSION['autenticado']=true;
		header('location:index2.php?pagina=dashboard2');
	}else{
		$mensagem='usuario ou senha incorretas';
	}
}

?>
<html>
	<head>
	<title>Autenticação</title>
	
	
	</head>
	<body>
		<p> <?php echo $mensagem;?></p>
		<form method="post">
			<label>Usuario</label>
			<input type="text" name="usuario" value="<?php echo $usuario?>"/>
			<label>Senha</label>			
			<input type="password" name="senha"/>
			<button type="submit"> Acessar</button>
		</form>
		

	</body>


</html>