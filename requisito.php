<?php $mensagem = filter_input(INPUT_GET, 'mensagem', FILTER_SANITIZE_STRING);?>
<span><?=(isset($mensagem)) ? $mensagem :'';?></span>
<br/>

<div class="row">
<h1>Curos Requisitos</h1>
<ol class="breadcrumb">
<li><a href="#">Maestro</a></li>
<li class="active">Cursos Requisitos</li>
</ol>
</div>
<a href="index2.php?pagina=matricula_formulario" class="btn btn-success">Adicionar</a>
<?php 
//Abrir de conexão
	$link = mysqli_connect('localhost', 'root','', 'maestro');
//Fazer o uso
	$query = 'SELECT * FROM curso_requisitos';
	$handle = mysqli_query($link, $query);
	?>
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>ID</td>
			<td>Curso</td>
			<td>Requisitos</td>
			<td>Acões</td>
		</tr>
		<?php while($row = mysqli_fetch_assoc($handle)){ ?>
		<tr>
			<td><?php echo $row['id_matricula'];?></td>
			<td><?php echo $row['id_aluno'];?></td>
			<td><?php echo $row['id_curso'];?></td>
		<td>
			<a href="index2.php?pagina=aluno_deleta2&id=<?php echo $row['id_aluno'];?>"  class="btn btn-danger">Deletar</a>
			</td>
		</tr>
		<?php } ?>
		
	</table>

<?php
//Fechar conexão
	mysqli_close($link);
?>

