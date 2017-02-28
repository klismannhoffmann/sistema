<?php $mensagem = filter_input(INPUT_GET, 'mensagem', FILTER_SANITIZE_STRING);?>
<span><?=(isset($mensagem)) ? $mensagem :'';?></span>
<br/>
<div class="row">
	<h1>Alunos</h1>
	<ol class="breadcrumb">
		<li><a href="index2.php?pagina=eu"><b>Maestro</b></a></li>
		<li class="active"><b>Alunos</b></li>
	</ol>
</div>
<a href="index2.php?pagina=aluno_formulario2" class="btn btn-success">Adicionar</a>
<?php 
	//Abrir de conexão
	$link = mysqli_connect('localhost', 'root','', 'maestro');
	//Fazer o uso
	$query = 'SELECT * FROM aluno';
	$handle = mysqli_query($link, $query);
?>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<td>ID</td>
		<td>Nome</td>
		<td>Telefone</td>
		<td>Email</td>
		<td>Data de Nascimento</td>
		<td>Endereço</td>
		<td>Responsavel</td>
		<td>Acões</td>
	</tr>
	<?php while($row = mysqli_fetch_assoc($handle)){ ?>
	<tr>
		<td><?php echo $row['id_aluno'];?></td>
		<td><?php echo $row['nome'];?></td>
		<td><?php echo $row['telefone'];?></td>
		<td><?php echo $row['email'];?></td>
		<td><?php echo $row['datanascimento'];?></td>
		<td><?php echo $row['endereco'];?></td>
		<td><?php echo $row['responsavel'];?></td>
		<td>
			<a href="index2.php?pagina=aluno_formulario2&id=<?php echo $row['id_aluno'];?>" class="btn btn-primary">Editar</a>
			<a href="index2.php?pagina=aluno_deleta2&id=<?php echo $row['id_aluno'];?>"  class="btn btn-danger">Deletar</a>
		</td>
	</tr>
	<?php } ?>
</table>
<?php
	//Fechar conexão
	mysqli_close($link);
?>