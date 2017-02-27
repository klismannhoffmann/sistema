<html>
<head>
<title>Maestro Autenticação</title>
<link rel="stylesheet" href='./css/bootstrap.css' />
<link rel="stylesheet" href='./css/estilos2.css' />
<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script src="./js/bootstrap.js"></script>
</head>
<body>
			<div class="container">
			<div class="row">
				<div class="col-lg-4" id="logo2">
					<img src="./img/maestro.png" alt="Logo do sistema Maestro" />
				</div>
				</div>
				</div>
				
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
		<p> <?php echo $mensagem;?></p>
		<form method="post">
			<label>Usuario</label>
			<input type="text" name="usuario" value="<?php echo $usuario?>" placeholder="Digite a Usuario"/>
			<label>Senha</label>			
			<input type="password" name="senha" placeholder="Digite a Senha"/>
			<button type="submit"> Acessar</button>
		</form>
	</body>


</html>