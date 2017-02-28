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
	$id = isset($_POST['id']) ? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) : filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
	$usuario=filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha=filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$mensagem='';
	//verificar se foram informados
	if($id){
		if(!$usuario){
			//imformar para preencher o usuario
			$mensagem='Informe o Usuario';
		}elseif(!$senha){
			//informar para preencher a senha
			$mensagem='Informe o Senha';
		}else{
			//verificar se existe usuario e senha informados
			if($usuario=='cabral' && $senha=='brasil'){
			$_SESSION['autenticado']=true;
			header('location:index2.php?pagina=dashboard2');
			}else{
			$mensagem='Usuario ou Senha Incorretas';
			}
		}
		
	}
	?>
	<p><b> <?php echo $mensagem;?></b></p>
	<form method="post">
		<label>Usuario</label>
		<input type="text" name="usuario" value="<?php echo $usuario?>" placeholder="Digite a Usuario"/>
		<label>Senha</label>			
		<input type="password" name="senha" placeholder="Digite a Senha"/>
		<button type="submit" name="id" value="1"> Acessar</button>
	</form>

</body>
</html>