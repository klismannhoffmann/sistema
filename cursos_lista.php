
<?php $mensagem = filter_input(INPUT_GET, 'mensagem', FILTER_SANITIZE_STRING);?>
<span><?=(isset($mensagem)) ? $mensagem :'';?></span>
<br/>
<div class="row">
	<h1>Cursos</h1>
	<ol class="breadcrumb">
		<li><a href="index2.php?pagina=eu"><b>Maestro</b></a></li>
		<li class="active"><b>Cursos</b></li>
	</ol>
</div>
<a href="index2.php?pagina=curso_formulario" class="btn btn-success">Adicionar</a>
<?php 
	//Abrir de conexão
	$link = mysqli_connect('localhost', 'root','', 'maestro');
	//Fazer o uso
	$query = 'SELECT * FROM curso';
	$handle = mysqli_query($link, $query);
	?>
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>ID</td>
			<td>Nome</td>
			<td>Professor</td>
			<td>Carga Horaria</td>
			<td>Data Inicio</td>
			<td>Data Fim</td>
			<td>Vagas</td>
			<td>Acões</td>
		</tr>
		<?php while($row = mysqli_fetch_assoc($handle)){ ?>
		<tr>
			<td><?php echo $row['id_curso'];?></td>
			<td><?php echo $row['nome'];?></td>
			<td><?php echo $row['id_professor'];?></td>
			<td><?php echo $row['carga_horaria'];?></td>
			<td><?php echo $row['data_inicio'];?></td>
			<td><?php echo $row['data_fim'];?></td>
			<td><?php echo $row['vagas'];?></td>
			<td>
				<a href="index2.php?pagina=requisitos&id=<?php echo $row['id_curso'];?>" class="btn btn-primary">Requisitos</a>
				<a href="index2.php?pagina=curso_formulario&id=<?php echo $row['id_curso'];?>" class="btn btn-primary">Editar</a>
				<a href="index2.php?pagina=curso_deleta&id=<?php echo $row['id_curso'];?>"  class="btn btn-danger">Deletar</a>
			</td>
		</tr>
		<?php } ?>
</table>
<?php
	//Fechar conexão
	mysqli_close($link);
?>