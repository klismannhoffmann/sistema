<?php
	//Captura as variaveis
	//$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
	//$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	$id = isset($_POST['id']) ? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) : filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
	$salvar = filter_input(INPUT_POST, 'salvar', FILTER_VALIDATE_INT);
	if(!$id){ ?>
		<div class="row">
			<h1>Professor</h1>
			<ol class="breadcrumb">
				<li><a href="index2.php?pagina=eu"><b>Maestro</b></a></li>
				<li><a href="index2.php?pagina=professor"><b>Professor</b></a></li>
				<li class="active"><b>Adicionar</b></li>
			</ol>
		</div>
<?php
	//CRIAR
	if($salvar){
		//Salvo os dados no arquivo
		//Verificando o preenchimento
		if(!$nome){
			$mensagem['nome'] = 'Preencha o Nome';
		}elseif(!$telefone){
			$mensagem['telefone'] = 'Preencha o Telefone';
		}elseif(!$email){
			$mensagem['email'] = 'Preencha O Email';
		}elseif(!$endereco){
			$mensagem['endereco'] = 'Preencha o Endereço';
		}else{
			//Abrir Conexão
			$link = mysqli_connect('localhost','root','');
			$conexao = mysqli_select_db($link, 'maestro');
			//Faz o Uso
			//Inserindo os dados
			$sql = " insert into professor(id_professor,nome,telefone,endereco,email)
			values(	null,'$nome','$telefone','$endereco','$email')";
			$resultado = mysqli_query($link, $sql);
			//Fechei a conexao
			mysqli_close($link);
			$mensagem['sucesso'] = 'Registro inserido. Você já pode edita-lo.';
			header('location: index2.php?pagina=professor&mensagem='.$mensagem['sucesso']);
		}
	}
}else{?>
<div class="row">
	<h1>Professor</h1>
	<ol class="breadcrumb">
		<li><a href="index2.php?pagina=eu"><b>Maestro</b></a></li>
		<li><a href="index2.php?pagina=professor"><b>Professor</b></a></li>
		<li class="active"><b>Editar</b></li>
	</ol>
</div>
<?php 
	//EDITAR
	if($salvar){
		//Salvo os dados no arquivo
		//Verificando o preenchimento
		if(!$nome){
			$mensagem['nome'] = 'Preencha o Nome';
		}elseif(!$telefone){
			$mensagem['telefone'] = 'Preencha o Telefone';
		}elseif(!$email){
			$mensagem['email'] = 'Preencha O Email';
		}elseif(!$endereco){
			$mensagem['endereco'] = 'Preencha o Endereço';
		}else{
			//Abrir Conexão
			$link = mysqli_connect('localhost','root','');
			$conexao = mysqli_select_db($link, 'maestro');
			//Faz o Uso
			//Atualizando os dados
			$sql = "update professor set	nome= '$nome',telefone = '$telefone',	endereco = '$endereco', email='$email' where	id_professor= '$id'";
			$resultado = mysqli_query($link, $sql);
			//Fechei a conexao
			mysqli_close($link);
			$mensagem['sucesso'] = 'Registro Editado.';
			header('location: index2.php?pagina=professor&mensagem='.$mensagem['sucesso']);
		}
	}else{
		//Abrir Conexão
		$link = mysqli_connect('localhost','root','');
		$conexao = mysqli_select_db($link, 'maestro');
		//Faz o Uso
		//Buscar os dados
		$sql = "select id_professor, nome, telefone, endereco, email from professor where	id_professor = '$id'";
		$resultado = mysqli_query($link, $sql);
		$row = mysqli_fetch_row($resultado);
		$nome = $row[1];
		$telefone = $row[2];
		$endereco = $row[3];
		$email = $row[4];
		//Fechei a conexao
		mysqli_close($link);
	}
}
?>
<form method="post">
	<input type="hidden" name="id" value="<?php echo $id;?>" />
	<label>Nome</label>
	<input type="text" name="nome" value="<?php echo $nome;?>" placeholder="Informe Professor"/>
	<span><?=(isset($mensagem['nome'])) ? $mensagem['nome'] : '';?></span>
	<br/>
	<label>Telefone</label>
	<input type="text" name="telefone" value="<?php echo $telefone;?>"placeholder="Informe o Telefone"/>
	<span><?=(isset($mensagem['telefone'])) ? $mensagem['telefone'] : '';?></span>
	<br/>
	<label>Endereço</label>
	<input type="text" name="endereco" value="<?php echo $endereco;?>" placeholder="Informe o Enderço"/>
	<span><?=(isset($mensagem['endereco'])) ? $mensagem['endereco'] : '';?></span>
	<br/>
	<label>Email</label>
	<input type="text" name="email" value="<?php echo $email;?>" placeholder="Informe o Email"/>
	<span><?=(isset($mensagem['email'])) ? $mensagem['email'] : '';?></span>
	<br/>
	<br/>
	<button type="submit" name="salvar" value="1" class="btn btn-success">Salvar</button>
</form>