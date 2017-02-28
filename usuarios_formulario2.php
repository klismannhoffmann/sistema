<?php
	//Captura as variaveis
	//$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);	
	//$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	$id = isset($_POST['id']) ? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) : filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$salvar = filter_input(INPUT_POST, 'salvar', FILTER_VALIDATE_INT);
	if(!$id){?>
		<div class="row">
			<h1>Usuarios</h1>
			<ol class="breadcrumb">
				<li><a href="index2.php?pagina=eu"><b>Maestro</b></a></li>
				<li><a href="index2.php?pagina=usuarios"><b>Usuarios</b></a></li>
				<li class="active"><b>Adicionar</b></li>
			</ol>
		</div>
<?php
	//CRIAR
	if($salvar){
		//Salvo os dados no arquivo
		//Verificando o preenchimento
		if(!$usuario){
			$mensagem['usuario'] = 'Preencha o usuario';
		}elseif(!$senha){
			$mensagem['senha'] = 'Preencha a senha';
		}else{
			//Abrir Conexão
			$link = mysqli_connect('localhost','root','');
			$conexao = mysqli_select_db($link, 'maestro');
			//Faz o Uso
			//Inserindo os dados
			$sql = " insert into usuarios(id,nome,usuario,senha)values(null,'$usuario','$usuario','$senha')";
			$resultado = mysqli_query($link, $sql);
			//Fechei a conexao
			mysqli_close($link);
			$mensagem['sucesso'] = 'Registro inserido. Você já pode edita-lo.';
			header('location: index2.php?pagina=usuarios&mensagem='.$mensagem['sucesso']);
		}
	}
}else{?>
<div class="row">
	<h1>Usuarios</h1>
	<ol class="breadcrumb">
		<li><a href="index2.php?pagina=eu"><b>Maestro</b></a></li>
		<li><a href="index2.php?pagina=usuarios"><b>Usuarios</b></a></li>
		<li class="active"><b>Editar</b></li>
	</ol>
</div>
<?php
	//EDITAR
	if($salvar){
		//Salvo os dados no arquivo
		//Verificando o preenchimento
		if(!$usuario){
			$mensagem['usuario'] = 'Preencha o usuario';
		}elseif(!$senha){
			$mensagem['senha'] = 'Preencha a senha';
		}else{
			//Abrir Conexão
			$link = mysqli_connect('localhost','root','');
			$conexao = mysqli_select_db($link, 'maestro');
			//Faz o Uso
			//Atualizando os dados
			$sql = "update usuarios	set	usuario = '$usuario',nome = '$usuario',	senha = '$senha' where	id= '$id'";
			$resultado = mysqli_query($link, $sql);
			//Fechei a conexao
			mysqli_close($link);
			$mensagem['sucesso'] = 'Registro Editado.';
			header('location: index2.php?pagina=usuarios&mensagem='.$mensagem['sucesso']);
		}
	}else{
		//Abrir Conexão
		$link = mysqli_connect('localhost','root','');
		$conexao = mysqli_select_db($link, 'maestro');
		//Faz o Uso
		//Buscar os dados
		$sql = "select id, usuario, senha, nome from usuarios where	id = '$id'";
		$resultado = mysqli_query($link, $sql);
		$row = mysqli_fetch_row($resultado);
		$usuario = $row[1];
		$senha = $row[2];
		//Fechei a conexao
		mysqli_close($link);
	}
}
?>

<form method="post">
	<input type="hidden" name="id" value="<?php echo $id;?>" />
	<label>Usuário</label>
	<input type="text" name="usuario" value="<?php echo $usuario;?>" placeholder="Informe o Usuário" />
	<span><?=(isset($mensagem['usuario'])) ? $mensagem['usuario'] : '';?></span>
	<br/>
	<label>Senha</label>
	<input type="text" name="senha" value="<?php echo $senha;?>"placeholder="Informe a Senha" />
	<span><?=(isset($mensagem['senha'])) ? $mensagem['senha'] : '';?></span>
	<br/>
	<button type="submit" name="salvar" value="1" class="btn btn-success">Salvar</button>
</form>