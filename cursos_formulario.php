<?php
//Captura as variaveis
//$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
//$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$id = isset($_POST['id']) ? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) : filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$professor = filter_input(INPUT_POST, 'professor', FILTER_SANITIZE_STRING);
$carga_horaria = filter_input(INPUT_POST, 'carga_horaria', FILTER_SANITIZE_STRING);
$data_inicio = filter_input(INPUT_POST, 'data_inicio', FILTER_SANITIZE_STRING);
$data_fim = filter_input(INPUT_POST, 'data_fim', FILTER_SANITIZE_STRING);
$vagas = filter_input(INPUT_POST, 'vagas', FILTER_SANITIZE_STRING);
$salvar = filter_input(INPUT_POST, 'salvar', FILTER_VALIDATE_INT);
if(!$id){?>

	
<div class="row">
<h1>Cursos</h1>
<ol class="breadcrumb">
<li><a href="index2.php?pagina=eu">Maestro</a></li>
<li><a href="index2.php?pagina=cursos">Cursos</a></li>
<li class="active">Adicionar</li>
</ol>
</div>
<?php
	//CRIAR

	if($salvar){
		//Salvo os dados no arquivo
		//Verificando o preenchimento
		if(!$nome){
			$mensagem['nome'] = 'Preencha o Nome';
		}elseif(!$professor){
			$mensagem['professor'] = 'Preencha a professor';
			}
		
			elseif(!$data_inicio){
				$mensagem['data_inicio'] = 'Informe a Data do Inicio do Curso';
			}
			elseif(!$data_fim){
				$mensagem['data_fim'] = 'Informe a Data Do Final DO Curso ';
			}
			elseif(!$vagas){
				$mensagem['vagas'] = 'Informe o Numero de Vagas';
			}
		
			
		else{


			//Abrir Conexão
			$link = mysqli_connect('localhost','root','');
			$conexao = mysqli_select_db($link, 'maestro');
			//Faz o Uso
			//Inserindo os dados
			$sql = " insert into curso(id_curso,nome,id_professor,cara_horaria,data_inicio,data_fim,vagas)	values  (null,'$nome','$professor','$carga_horaria','$data_incio','$data_fim','$vagas')";
			$resultado = mysqli_query($link, $sql);
			//Fechei a conexao
			mysqli_close($link);
			$mensagem['sucesso'] = 'Registro inserido. Você já pode edita-lo.';

			header('location: index2.php?pagina=cursos&mensagem='.$mensagem['sucesso']);

		}
	}


}
else
{ ?>
<div class="row">
<h1>Cursos</h1>
<ol class="breadcrumb">
<li><a href="index2.php?pagina=eu">Maestro</a></li>
<li><a href="index2.php?pagina=cursos">Cursos</a></li>
<li class="active">Editar</li>
</ol>
</div>
<?php 
//EDITAR
	if($salvar){
		//Salvo os dados no arquivo
		//Verificando o preenchimento
		if(!$nome){
			$mensagem['nome'] = 'Preencha o Nome';
		}elseif(!$professor){
			$mensagem['professor'] = 'Preencha a professor';
		}
		
		elseif(!$data_inicio){
			$mensagem['data_inicio'] = 'Informe a Data do Inicio do Curso';
		}
		elseif(!$data_fim){
			$mensagem['data_fim'] = 'Informe a Data Do Final DO Curso ';
		}
		elseif(!$vagas){
			$mensagem['vagas'] = 'Informe o Numero de Vagas';
		}
		
		
		
		else{

			//Abrir Conexão
			$link = mysqli_connect('localhost','root','');
			$conexao = mysqli_select_db($link, 'maestro');
			//Faz o Uso
			//Atualizando os dados
			$sql = "update curso set nome = '$nome',id_professor = '$professor',	carga_horaria = '$carga_horaria', data_inicio='$data_inicio', data_fim='$data_fim', vagas='$vagas'  where	id_curso='$id'";

			$resultado = mysqli_query($link, $sql);
			//Fechei a conexao
			mysqli_close($link);

			$mensagem['sucesso'] = 'Registro Editado.';
			header('location: index2.php?pagina=cursos&mensagem='.$mensagem['sucesso']);

		}
	}else{

		//Abrir Conexão
		$link = mysqli_connect('localhost','root','');
		$conexao = mysqli_select_db($link, 'maestro');
		//Faz o Uso
		//Buscar os dados
		$sql = "select id_curso, nome, id_professor,  carga_horaria, data_inicio, data_fim, vagas from curso where id_curso = '$id'";

		$resultado = mysqli_query($link, $sql);
		$row = mysqli_fetch_row($resultado);

		$nome = $row[1];
		$professor = $row[2];
		$carga_horaria = $row[3];
		$data_inicio = $row[4];
		$data_fim = $row[5];
		$vagas = $row[6];
		


		//Fechei a conexao
		mysqli_close($link);

	}
}
?>


<form method="post">
	
	<input type="hidden" name="id" value="<?php echo $id;?>" />
	
	<label>Nome</label>
	<input type="text" name="nome" value="<?php echo $nome;?>" placeholder="Informe  Curso" />
	<span><?=(isset($mensagem['nome'])) ? $mensagem['nome'] : '';?></span>
	<br/>
	<label>Professor</label>
	<input type="text" name="professor" value="<?php echo $professor;?>" placeholder="Informe  Professor"/>
	<span><?=(isset($mensagem['telefone'])) ? $mensagem['professor'] : '';?></span>
	<br/>
	<label>Carga Horaria</label>
	<input type="text" name="carga_horaria" value="<?php echo $carga_horaria;?>" placeholder="Informe a Carga Horaria"/>
	<span><?=(isset($mensagem['carga_horaria'])) ? $mensagem['carga_horaria'] : '';?></span>
	<br/>

	<label>Data de Inicio</label>
		<input type="text" name="data_inicio" value="<?php echo $data_inicio;?>" placeholder="Informe a Data de Inicio" />
	<span><?=(isset($mensagem['data_inicio'])) ? $mensagem['data_inicio'] : '';?></span>

	<br/>
	<label >Data de Enceramento</label>
	<input type="text" name="data_fim" value="<?php echo $data_fim;?>" placeholder="Informe a Data de Encerramento"/>
	<span><?=(isset($mensagem['data_fim'])) ? $mensagem['data_fim'] : '';?></span>
	<br/>
	<label>Numero de Vagas</label>
	<input type="text" name="vagas" value="<?php echo $vagas;?>" placeholder="Informe o Numero de Vagas"/>
	<span><?=(isset($mensagem['vagas'])) ? $mensagem['vagas'] : '';?></span>
	<br/>
	
	<br/>
	<br/>
	<button type="submit" name="salvar" value="1" class="btn btn-success">Salvar</button>
	
</form>