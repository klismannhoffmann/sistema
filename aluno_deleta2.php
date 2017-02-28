<div class="row">
	<h1>Alunos</h1>
	<ol class="breadcrumb">
		<li><a href="index2.php?pagina=eu"><b>Maestro</b></a></li>
		<li><a href="index2.php?pagina=aluno"><b>Alunos</b></a></li>
		<li class="active"><b>Excluir</b></li>
	</ol>
</div>
<?php
	//Abrir Conexão
	$link = mysqli_connect('localhost','root','','maestro');
	$id_aluno = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
	if($id_aluno){
		$query = "SELECT * FROM `aluno` WHERE `aluno`.`id_aluno` = $id_aluno";
		$result = mysqli_query($link, $query);
		if(mysqli_num_rows($result)){
			$delete_aluno = filter_input(INPUT_POST, 'delete_aluno', FILTER_VALIDATE_INT);
			if($delete_aluno){
			//Faz uso
			//Deletando o registro
				$query = "DELETE FROM `aluno` WHERE `aluno`.`id_aluno` = $id_aluno";
				mysqli_query($link, $query);
				mysqli_close($link);
				$mensagem['sucesso'] = 'Registro Apagado.';
				header('location: index2.php?pagina=aluno&mensagem='.$mensagem['sucesso']);
		}
?>
<form method="post">
	<p><b>Você tem certeza que deseja excluir este registro?</b></p>
	<button name="delete_aluno" type="submit" value="1" class="btn btn-danger">Sim</button>
	<a href="index2.php?pagina=aluno" class="btn btn-default"><b>Não</b></a>
</form>
<?php }else{?>
		<p><b> Registro não encontrado</b></p>
		<a href="aluno_lista2.php">Retornar para a Lista</a>
	<?php } ?>
<?php }else{ ?>
	<p><b>Informe um registro para avaliar a deleção.</b></p>
<?php } ?>