<div class="row">
	<h1>Usuarios</h1>
	<ol class="breadcrumb">
		<li><a href="index2.php?pagina=eu"><b>Maestro</b></a></li>
		<li><a href="index2.php?pagina=usuarios"><b>Usuarios</b></a></li>
		<li class="active"><b>Excluir</b></li>
	</ol>
</div>
<?php
	//Abrir Conexão
	$link = mysqli_connect('localhost','root','','maestro');
	$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
	if($id){
		$query = "SELECT * FROM `usuarios` WHERE `usuarios`.`id` = $id";
		$result = mysqli_query($link, $query);
		if(mysqli_num_rows($result)){
			$delete = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT);
			if($delete){
			//Faz uso
			//Deletando o registro
			$query = "DELETE FROM `usuarios` WHERE `usuarios`.`id` = $id";
			mysqli_query($link, $query);
			mysqli_close($link);
			$mensagem['sucesso'] = 'Registro Apagado.';
			header('location: index2.php?pagina=usuarios&mensagem='.$mensagem['sucesso']);
		}
?>
<form method="post">
	<p><b> Você tem certeza que deseja excluir este registro?</b> </p>
	<button name="delete" type="submit" value="1" class="btn btn-danger">Sim</button>
	<a href="index2.php?pagina=usuarios" class="btn btn-default">Não</a>
</form>
<?php }else{?>
	<p><b>Registro não encontrado</b></p>
	<a href="usuario_lista2.php"><b>Retornar para a Lista</b></a>
<?php } ?>
<?php }else{ ?>
	<p><b>Informe um registro para avaliar a deleção.</b></p>
<?php } ?>