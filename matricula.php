<?php $mensagem = filter_input(INPUT_GET, 'mensagem', FILTER_SANITIZE_STRING);?>
<span><?=(isset($mensagem)) ? $mensagem :'';?></span>
<br/>
<div class="row">
	<h1>Matriculas</h1>
	<ol class="breadcrumb">
		<li><a href="index2.php?pagina=eu"><b>Maestro</b></a></li>
		<li class="active"><b>Matriculas</b></li>
	</ol>
</div>
<a href="index2.php?pagina=matricula_formulario" class="btn btn-success">Adicionar</a>
<?php 
	//Abrir de conexão
	$link = mysqli_connect('localhost', 'root','', 'maestro');
	//Fazer o uso
	$query = 'SELECT * FROM matricula';
	$handle = mysqli_query($link, $query);
?>
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>ID</td>
			<td>ID Aluno</td>
			<td>ID Professor</td>
			<td>Data da Matricula</td>
			<td>Status Pagamento</td>
			<td>Acões</td>
		</tr>
		<?php while($row = mysqli_fetch_assoc($handle)){ ?>
		<tr>
			<td><?php echo $row['id_matricula'];?></td>
			<td><?php echo $row['id_aluno'];?></td>
			<td><?php echo $row['id_curso'];?></td>
			<td><?php echo $row['data_matricula'];?></td>
			<td><?php echo $row['status_pagamento'];?></td>
			<td>
				<a href="index2.php?pagina=matricula_formulario&id=<?php echo $row['id_matricula'];?>" class="btn btn-primary">Editar</a>
				<a href="index2.php?pagina=matricula_deleta&id=<?php echo $row['id_matricula'];?>"  class="btn btn-danger">Deletar</a>
			</td>
		</tr>
		<?php } ?>
	</table>
<?php
	//Fechar conexão
	mysqli_close($link);
?>
