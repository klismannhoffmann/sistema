<?php
	//Captura as variaveis
	//$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
	//$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	$id = isset($_POST['id']) ? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) : filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
	$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
	$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$responsavel = filter_input(INPUT_POST, 'responsavel', FILTER_SANITIZE_STRING);
	$datanascimento= filter_input(INPUT_POST, 'datanascimento', FILTER_SANITIZE_STRING);
	$salvar = filter_input(INPUT_POST, 'salvar', FILTER_VALIDATE_INT);
	if(!$id){?>
		<div class="row">
		<h1>Alunos</h1>
		<ol class="breadcrumb">
			<li><a href="index2.php?pagina=eu"><b>Maestro</b></a></li>
			<li><a href="index2.php?pagina=aluno"><b>Alunos</b></a></li>
			<li class="active"><b>Adicionar</b></li>
		</ol>
		</div>
<?php
	//CRIAR
	if($salvar){
		//Salvo os dados no arquivo
		//Verificando o preenchimento
		if(!$nome){
			$mensagem['usuario'] = 'Preencha o Nome';
		}elseif(!$telefone){
			$mensagem['telefone'] = 'Preencha a telefone';
			}elseif(!$endereco){
				$mensagem['endereco'] = 'Preencha a endereço';
			}elseif(!$cpf){
				$mensagem['cpf'] = 'Preencha a cpf';
			}elseif(!$email){
				$mensagem['email'] = 'Preencha a email';
			}elseif(!datanascimento){
				$mensagem['datanascimento'] = 'Preencha a data de nascimento';
			}else{
				//Abrir Conexão
				$link = mysqli_connect('localhost','root','');
				$conexao = mysqli_select_db($link, 'maestro');
				//Faz o Uso
				//Inserindo os dados
				$sql = " insert into aluno(id_aluno,nome,telefone,endereco,cpf,email,datanascimento,responsavel)	values  (null,'$nome','$telefone','$endereco','$cpf','$email','$datanascimento','$responsavel')";
				$resultado = mysqli_query($link, $sql);
				//Fechei a conexao
				mysqli_close($link);
				$mensagem['sucesso'] = 'Registro inserido. Você já pode edita-lo.';
				header('location: index2.php?pagina=aluno&mensagem='.$mensagem['sucesso']);
		}
	}
} else{?>
	<div class="row">
	<h1>Alunos</h1>
	<ol class="breadcrumb">
		<li><a href="index2.php?pagina=eu"><b>Maestro</b></a></li>
		<li><a href="index2.php?pagina=aluno"><b>Alunos</b></a></li>
		<li class="active"><b>Editar</b></li>
	</ol>
	</div>
<?php 
	//EDITAR
	if($salvar){
		//Salvo os dados no arquivo
		//Verificando o preenchimento
		if(!$nome){
			$mensagem['usuario'] = 'Preencha o Nome';
		}elseif(!$telefone){
			$mensagem['telefone'] = 'Preencha a telefone';
		}elseif(!$endereco){
			$mensagem['endereco'] = 'Preencha a endereço';
		}elseif(!$cpf){
			$mensagem['cpf'] = 'Preencha a cpf';
		}elseif(!$email){
			$mensagem['email'] = 'Preencha a email';
		}elseif(!datanascimento){
			$mensagem['datanascimento'] = 'Preencha a data de nascimento';
		}else{
			//Abrir Conexão
			$link = mysqli_connect('localhost','root','');
			$conexao = mysqli_select_db($link, 'maestro');
			//Faz o Uso
			//Atualizando os dados
			$sql = "update aluno set	nome = '$nome',telefone = '$telefone',	endereco = '$endereco', cpf='$cpf', email='$email', datanascimento='$datanascimento', responsavel='$responsavel'  where	id_aluno='$id'";
			$resultado = mysqli_query($link, $sql);
			//Fechei a conexao
			mysqli_close($link);
			$mensagem['sucesso'] = 'Registro Editado.';
			header('location: index2.php?pagina=aluno&mensagem='.$mensagem['sucesso']);
		}
	}else{
		//Abrir Conexão
		$link = mysqli_connect('localhost','root','');
		$conexao = mysqli_select_db($link, 'maestro');
		//Faz o Uso
		//Buscar os dados
		$sql = "select id_aluno, nome, telefone,  endereco, cpf, email, datanascimento, responsavel from aluno where id_aluno = '$id'";
		$resultado = mysqli_query($link, $sql);
		$row = mysqli_fetch_row($resultado);
		$nome = $row[1];
		$telefone = $row[2];
		$endereco = $row[3];
		$cpf = $row[4];
		$email = $row[5];
		$datanascimento = $row[6];
		$responsavel = $row[7];
		//Fechei a conexao
		mysqli_close($link);
	}
}
?>
<form method="post">
	<input type="hidden" name="id" value="<?php echo $id;?>" />
	<label>Nome</label>
	<input type="text" name="nome" value="<?php echo $nome;?>" placeholder="Informe o Nome"/>
	<span><?=(isset($mensagem['nome'])) ? $mensagem['nome'] : '';?></span>
	<br/>
	<label>Telefone</label>
	<input type="text" name="telefone" value="<?php echo $telefone;?>" placeholder="Informe o Telefone"/>
	<span><?=(isset($mensagem['telefone'])) ? $mensagem['telefone'] : '';?></span>
	<br/>
	<label>Endereço</label>
	<input type="text" name="endereco" value="<?php echo $endereco;?>" placeholder="Informe o Endereço"/>
	<span><?=(isset($mensagem['endereco'])) ? $mensagem['endereco'] : '';?></span>
	<br/>
	<label>cpf</label>
	<input type="text" name="cpf" value="<?php echo $cpf;?>" placeholder="Informe o CPF"/>
	<span><?=(isset($mensagem['cpf'])) ? $mensagem['cpf'] : '';?></span>
	<br/>
	<label>Email</label>
	<input type="text" name="email" value="<?php echo $email;?>" placeholder="Informe o Email"/>
	<span><?=(isset($mensagem['email'])) ? $mensagem['email'] : '';?></span>
	<br/>
	<label>Data de Nascimento</label>
	<input type="text" name="datanascimento" value="<?php echo $datanascimento;?>" placeholder="Informe a Data"/>
	<span><?=(isset($mensagem['datanascimento'])) ? $mensagem['datanascimento'] : '';?></span>
	<br/>
	<label >Responsavel</label>
	<input type="text" name="responsavel" value="<?php echo $responsavel;?>" placeholder="Informe o Responsavel"/>
	<span><?=(isset($mensagem['responsavel'])) ? $mensagem['responsavel'] : '';?></span>
	<br/>
	<br/>
	<button type="submit" name="salvar" value="1" class="btn btn-success">Salvar</button>
</form>